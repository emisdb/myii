<?php

class ProdsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cats';
	public $catname;
	public $catid;
	public $picname;
	public $picid;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view','group','glob'),
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
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	 public function actionGlob($id)
	{
		$this->layout='//layouts/glob';
		$this->render('glob',array(
			'model'=>$this->loadModel($id),
		));
		$this->layout='//layouts/cats';
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prods;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prods']))
		{
			$model->attributes=$_POST['Prods'];
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

		if(isset($_POST['Prods']))
		{
			$model->attributes=$_POST['Prods'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Prods');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionGroup($id)
	{
//		$dataProvider=new CActiveDataProvider('Prods',);
		$this->catid=$id;
		$this->picid=$id;
		$this->catname="";
		$this->picname="";
		$list=$this->fetchList($id);
		$model=new Prods('search');
		$this->render('index',array(
			'model'=>$model,
			'list'=>$list,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prods('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prods']))
			$model->attributes=$_GET['Prods'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function getNames($data,$id)
	{
		$par=0;
		if($id==null) return;
		foreach($data as $row) 
		{ 
			if ($id==$row['id'])
			{
				if($this->catname=="")	$this->catname=$row['catname'];
				if($this->picname=="")
					{
						if($row['picname']!=null) 
						{ 
							$this->picname=$row['picname'];
							$this->picid=$row['picid'];
						}
						else $this->getNames($data,$row['par']);
						return;
					}
				}
		}
	}

	public function _fetchList($data,$id,&$list,$in=true)
	{
		$par=0;
		$next=0;
		array_push($list,$id);
		
		foreach($data as $row) 
		{ 
			if(($row['par']==$id)&&($row['next']==null)) $par=$row['id'];
			if($row['next']==$id) $next=$row['id'];
		}
		if($par>0) $this->_fetchList($data,$par,$list);
		if(($next>0)&&$in) $this->_fetchList($data,$next,$list);
	}
	public function fetchList($id)
	{
	
		$connection=Yii::app()->db;  
		$command=$connection->createCommand("SELECT cats.id AS id,cats.par AS par,cats.next AS next, cats.name AS catname, pics.name AS picname, pics.id AS picid FROM cats LEFT JOIN pics ON pics.id=cats.pic");
		$dataReader=$command->query();
		if($dataReader===null)
			return "";
		$list=array();
		$rows=$dataReader->readAll();
		$this->_fetchList($rows,$id,$list,false);
		$this->getNames($rows,$id);
		return $list;
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Prods::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prods-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
