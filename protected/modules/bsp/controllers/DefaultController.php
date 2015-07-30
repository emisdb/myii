<?php

class DefaultController extends Controller
{
	public function actionIndex($id='ix')
	{
//            Yii::app()->theme='bootstrap';
            
                $this->layout='/layouts/main';
                $this->pageTitle="EMIS.DB - Продукты";
                if($id=='ix')
                    $this->render('index');
                else
                   $this->render($id);
	}
	public function actionBs()
	{
            Yii::app()->theme='bootstrap';
 		$this->render('index');
	}
        
		public function actionGo()
	{
		if(isset($_POST))
		{
			$val=$_POST['constant'];
			Constants::model()->setCvalue('dayup',$val);
		}
		$this->render('go',array('model'=>$val));
	}
}