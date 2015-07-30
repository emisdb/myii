<?php

class MessageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','test','webs','wsserver','webc'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionWebc()
	{
		$this->render('server');
	}
	public function actionWebso()
	{
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);//создаём сокет
            socket_bind($socket, '127.0.0.1', 8000);//привязываем его к указанным ip и порту
            socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
            socket_listen($socket);//слушаем сокет
        }
	public function actionWebs()
	{
           try
            {    
                $socket = stream_socket_server("tcp://0.0.0.0:8000", $errno, $errstr);

                if (!$socket) {
                    die("$errstr ($errno)\n");
                }

                $connects = array();
                $ii=0;
                while ($ii<5) {
                    //формируем массив прослушиваемых сокетов:
                    $read = $connects;
                    $read []= $socket;
                    $write = $except = null;

                    if (!stream_select($read, $write, $except, null)) {//ожидаем сокеты доступные для чтения (без таймаута)
                        break;
                    }

                    if (in_array($socket, $read)) {//есть новое соединение
                        $connect = stream_socket_accept($socket, -1);//принимаем новое соединение
                        $connects[] = $connect;//добавляем его в список необходимых для обработки
                        unset($read[ array_search($socket, $read) ]);
                    }

                    foreach($read as $connect) {//обрабатываем все соединения
                        $headers = '';
                        while ($buffer = rtrim(fgets($connect))) {
                            $headers .= $buffer;
                        }
                            $model=new Message;
                            $model->mess_time=date("Y-m-d H:i:s", time());
                            $model->text=  $headers;
//                            $model->text=  substr($headers, 0, 1020);
                            $model->user_name=  strlen($headers);
                            if(!$model->save()) break;
                        fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nConnection: close\r\n\r\nПривет");
                        fclose($connect);
                        unset($connects[ array_search($connect, $connects) ]);
                    }
                    $ii++;
                }

                fclose($server);
            }
            catch (Exception $ex) {
                   throw new CHttpException(503,'Err:'.$ex);

           }

	}
        public function actionWsserver()
        {
  
            $config = array(
                'host' => '0.0.0.0',
                'port' => '8000',
                'workers' => 1,
            );

//            $WebsocketServer = new WebsocketServer($config);
            $WebsocketServer = new WebsocketServer($config);
            $WebsocketServer->start();
        }
        public function actionTest()
	{
           try
            {    
               $host= php_uname('n');
               $id=  gethostbyname($host);
               if(extension_loaded('sockets')) $ws="WebSockets OK"; 
               else $ws="WebSockets UNAVAILABLE";
               $xportlist = stream_get_transports();
                      $this->renderText("<ol><li>".Yii::app()->getBaseUrl(true)."</li><li>".$host."</li><li>".$id
                              ."</li><li>".$ws."</li><li>".print_r($xportlist,true))."</li></ol>";
         } catch (Exception $ex) {
                   throw new CHttpException(403,'Err: $ex');

           }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Message;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Message']))
		{
			$model->attributes=$_POST['Message'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Message']))
		{
			$model->attributes=$_POST['Message'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Message');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Message('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Message']))
			$model->attributes=$_GET['Message'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Message the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Message::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Message $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
