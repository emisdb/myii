<?php
class WebsocketUServer
{
    private $config;
    public function __construct($config) {
        $this->config = $config;
    }

    public function start() {
        //server socket open
        $server = stream_socket_server("tcp://{$this->config['host']}:{$this->config['port']}", $errorNumber, $errorString);

        if (!$server) {
            die("error: stream_socket_server: $errorString ($errorNumber)\r\n");
        }

        list($pid, $master, $workers) = $this->spawnWorkers();//kid process

        if ($pid) {//master
            fclose($server);//master does not process master
            $WebsocketMaster = new WebsocketMaster($workers);//master uses workers
            $WebsocketMaster->start();
        } else {//worker
            $WebsocketHandler = new WebsocketHandler($server, $master);
            $WebsocketHandler->start();
        }
    }

    protected function spawnWorkers() {
        $master = null;
        $workers = array();
        $i = 0;
        while ($i < $this->config['workers']) {
            $i++;
            //socket pair
            $pair = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);

            $pid = pcntl_fork();//fork
            if ($pid == -1) {
                die("error: pcntl_fork\r\n");
            } elseif ($pid) { //master
                fclose($pair[0]);
                $workers[$pid] = $pair[1];//pair in master
            } else { //worker
                fclose($pair[1]);
                $master = $pair[0];//pair in worker
                break;
            }
        }

        return array($pid, $master, $workers);
    }
}

class WebsocketMaster
{
    protected $workers = array();
    protected $clients = array();

    public function __construct($workers) {
        $this->clients = $this->workers = $workers;
    }

    public function start() {
        while (true) {
            //подготавливаем массив всех сокетов, которые нужно обработать
            $read = $this->clients;

            stream_select($read, $write, $except, null);//обновляем массив сокетов, которые можно обработать

            if ($read) {//пришли данные от подключенных клиентов
                foreach ($read as $client) {
                    $data = fread($client, 1000);

                    if (!$data) { //соединение было закрыто
                        unset($this->clients[intval($client)]);
                        @fclose($client);
                        continue;
                    }

                    foreach ($this->workers as $worker) {//пересылаем данные во все воркеры
                        if ($worker !== $client) {
                            fwrite($worker, $data);
                        }
                    }
                }
            }
        }
    }
}

abstract class WebsocketWorker
{
    protected $clients = array();
    protected $server;
    protected $master;
    protected $pid;
    protected $handshakes = array();
    protected $ips = array();

    public function __construct($server, $master) {
        $this->server = $server;
        $this->master = $master;
        $this->pid = posix_getpid();
    }

    public function start() {
        while (true) {
            //sockets array
            $read = $this->clients;
            $read[] = $this->server;
            $read[] = $this->master;

            $write = array();
            if ($this->handshakes) {
                foreach ($this->handshakes as $clientId => $clientInfo) {
                    if ($clientInfo) {
                        $write[] = $this->clients[$clientId];
                    }
                }
            }

            stream_select($read, $write, $except, null);//update

            if (in_array($this->server, $read)) { //client call
                //handshake
                if ($client = stream_socket_accept($this->server, -1)) {
                    $address = explode(':', stream_socket_get_name($client, true));
                    if (isset($this->ips[$address[0]]) && $this->ips[$address[0]] > 5) {
                    //block more than 5
                        @fclose($client);
                    } else {
                        @$this->ips[$address[0]]++;

                        $this->clients[intval($client)] = $client;
                        $this->handshakes[intval($client)] = array();
                    //handshake
                    }
                }

                //socket delete
                unset($read[array_search($this->server, $read)]);
            }

            if (in_array($this->master, $read)) { //master data
                $data = fread($this->master, 1000);

                $this->onSend($data);//user action

                //master delete
                unset($read[array_search($this->master, $read)]);
            }

            if ($read) {//client data
                foreach ($read as $client) {
                    if (isset($this->handshakes[intval($client)])) {
                        if ($this->handshakes[intval($client)]) {//handshake was done
                            continue;//nothing to read
                        }

                        if (!$this->handshake($client)) {
                            unset($this->clients[intval($client)]);
                            unset($this->handshakes[intval($client)]);
                            $address = explode(':', stream_socket_get_name($client, true));
                            if (isset($this->ips[$address[0]]) && $this->ips[$address[0]] > 0) {
                                @$this->ips[$address[0]]--;
                            }
                            @fclose($client);
                        }
                    } else {
                        $data = fread($client, 1000);

                        if (!$data) { //close connection
                            unset($this->clients[intval($client)]);
                            unset($this->handshakes[intval($client)]);
                            $address = explode(':', stream_socket_get_name($client, true));
                            if (isset($this->ips[$address[0]]) && $this->ips[$address[0]] > 0) {
                                @$this->ips[$address[0]]--;
                            }
                            @fclose($client);
                            $this->onClose($client);//user action
                            continue;
                        }

                        $this->onMessage($client, $data);//user action
                    }
                }
            }

            if ($write) {
                foreach ($write as $client) {
                    if (!$this->handshakes[intval($client)]) {//no handshake
                        continue;//no action
                    }
                    $info = $this->handshake($client);
                    $this->onOpen($client, $info);//user action
                }
            }
        }
    }

    protected function handshake($client) {
        $key = $this->handshakes[intval($client)];

        if (!$key) {
            //header read
            $headers = fread($client, 10000);
            preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $headers, $match);

            if (empty($match[1])) {
                return false;
            }

            $key = $match[1];

            $this->handshakes[intval($client)] = $key;
        } else {
            //websocket protocol processing
            $SecWebSocketAccept = base64_encode(pack('H*', sha1($key . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
            $upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
                "Upgrade: websocket\r\n" .
                "Connection: Upgrade\r\n" .
                "Sec-WebSocket-Accept:$SecWebSocketAccept\r\n\r\n";
            fwrite($client, $upgrade);
            unset($this->handshakes[intval($client)]);
        }

        return $key;
    }

    protected function encode($payload, $type = 'text', $masked = false)
    {
        $frameHead = array();
        $payloadLength = strlen($payload);

        switch ($type) {
            case 'text':
                // first byte indicates FIN, Text-Frame (10000001):
                $frameHead[0] = 129;
                break;

            case 'close':
                // first byte indicates FIN, Close Frame(10001000):
                $frameHead[0] = 136;
                break;

            case 'ping':
                // first byte indicates FIN, Ping frame (10001001):
                $frameHead[0] = 137;
                break;

            case 'pong':
                // first byte indicates FIN, Pong frame (10001010):
                $frameHead[0] = 138;
                break;
        }

        // set mask and payload length (using 1, 3 or 9 bytes)
        if ($payloadLength > 65535) {
            $payloadLengthBin = str_split(sprintf('%064b', $payloadLength), 8);
            $frameHead[1] = ($masked === true) ? 255 : 127;
            for ($i = 0; $i < 8; $i++) {
                $frameHead[$i + 2] = bindec($payloadLengthBin[$i]);
            }
            // most significant bit MUST be 0
            if ($frameHead[2] > 127) {
                return array('type' => '', 'payload' => '', 'error' => 'frame too large (1004)');
            }
        } elseif ($payloadLength > 125) {
            $payloadLengthBin = str_split(sprintf('%016b', $payloadLength), 8);
            $frameHead[1] = ($masked === true) ? 254 : 126;
            $frameHead[2] = bindec($payloadLengthBin[0]);
            $frameHead[3] = bindec($payloadLengthBin[1]);
        } else {
            $frameHead[1] = ($masked === true) ? $payloadLength + 128 : $payloadLength;
        }

        // convert frame-head to string:
        foreach (array_keys($frameHead) as $i) {
            $frameHead[$i] = chr($frameHead[$i]);
        }
        if ($masked === true) {
            // generate a random mask:
            $mask = array();
            for ($i = 0; $i < 4; $i++) {
                $mask[$i] = chr(rand(0, 255));
            }

            $frameHead = array_merge($frameHead, $mask);
        }
        $frame = implode('', $frameHead);

        // append payload to frame:
        for ($i = 0; $i < $payloadLength; $i++) {
            $frame .= ($masked === true) ? $payload[$i] ^ $mask[$i % 4] : $payload[$i];
        }

        return $frame;
    }

    protected function decode($data)
    {
        $unmaskedPayload = '';
        $decodedData = array();

        // estimate frame type:
        $firstByteBinary = sprintf('%08b', ord($data[0]));
        $secondByteBinary = sprintf('%08b', ord($data[1]));
        $opcode = bindec(substr($firstByteBinary, 4, 4));
        $isMasked = ($secondByteBinary[0] == '1') ? true : false;
        $payloadLength = ord($data[1]) & 127;

        // unmasked frame is received:
        if (!$isMasked) {
            return array('type' => '', 'payload' => '', 'error' => 'protocol error (1002)');
        }

        switch ($opcode) {
            // text frame:
            case 1:
                $decodedData['type'] = 'text';
                break;

            case 2:
                $decodedData['type'] = 'binary';
                break;

            // connection close frame:
            case 8:
                $decodedData['type'] = 'close';
                break;

            // ping frame:
            case 9:
                $decodedData['type'] = 'ping';
                break;

            // pong frame:
            case 10:
                $decodedData['type'] = 'pong';
                break;

            default:
                return array('type' => '', 'payload' => '', 'error' => 'unknown opcode (1003)');
        }

        if ($payloadLength === 126) {
            $mask = substr($data, 4, 4);
            $payloadOffset = 8;
            $dataLength = bindec(sprintf('%08b', ord($data[2])) . sprintf('%08b', ord($data[3]))) + $payloadOffset;
        } elseif ($payloadLength === 127) {
            $mask = substr($data, 10, 4);
            $payloadOffset = 14;
            $tmp = '';
            for ($i = 0; $i < 8; $i++) {
                $tmp .= sprintf('%08b', ord($data[$i + 2]));
            }
            $dataLength = bindec($tmp) + $payloadOffset;
            unset($tmp);
        } else {
            $mask = substr($data, 2, 4);
            $payloadOffset = 6;
            $dataLength = $payloadLength + $payloadOffset;
        }

        /**
         * We have to check for large frames here. socket_recv cuts at 1024 bytes
         * so if websocket-frame is > 1024 bytes we have to wait until whole
         * data is transferd.
         */
        if (strlen($data) < $dataLength) {
            return false;
        }

        if ($isMasked) {
            for ($i = $payloadOffset; $i < $dataLength; $i++) {
                $j = $i - $payloadOffset;
                if (isset($data[$i])) {
                    $unmaskedPayload .= $data[$i] ^ $mask[$j % 4];
                }
            }
            $decodedData['payload'] = $unmaskedPayload;
        } else {
            $payloadOffset = $payloadOffset - 4;
            $decodedData['payload'] = substr($data, $payloadOffset);
        }

        return $decodedData;
    }

    abstract protected function onOpen($client, $info);

    abstract protected function onClose($client);

    abstract protected function onMessage($client, $data);

    abstract protected function onSend($data);

    abstract protected function send($data);
}

//пример реализации чата
class WebsocketHandler extends WebsocketWorker
{
    protected function onOpen($client, $info) {//open connection action

    }

    protected function onClose($client) {//close connection  action

    }

    protected function onMessage($client, $data) {//get message action
        $data = $this->decode($data);

        if (!$data['payload']) {
            return;
        }

        if (!mb_check_encoding($data['payload'], 'utf-8')) {
            return;
        }
        //var_export($data);
        //send to all
        $message = 'user #' . intval($client) . ' (' . $this->pid . '): ' . strip_tags($data['payload']);
        $this->send($message);

        $this->sendHelper($message);
    }

    protected function onSend($data) {//master message
        $this->sendHelper($data);
    }

    protected function send($message) {//send to master for all
        @fwrite($this->master, $message);
    }

    private function sendHelper($data) {
        $data = $this->encode($data);

        $write = $this->clients;
        if (stream_select($read, $write, $except, 0)) {
            foreach ($write as $client) {
                @fwrite($client, $data);
            }
        }
    }
}
