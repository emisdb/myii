 <?php	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/socket.js'); ?>

Server address:
<input id="sock-addr" type="text" value="ws://127.0.0.1:8000"><br />
<!--<input id="sock-addr" type="text" value="ws://echo.websocket.org"><br />-->
Message:
<input id="sock-msg" type="text">

<input id="sock-send-butt" type="button" value="send">
<br />
<br />
<input id="sock-recon-butt" type="button" value="reconnect"><input id="sock-disc-butt" type="button" value="disconnect">
<br />
<br />

Полученные сообщения от веб-сокета: 
<div id="sock-info" style="border: 1px solid;width:600px;height:400px;overflow: auto;"> </div>
