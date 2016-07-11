<?php

class GuestsController extends Controller
{
	public $layout = 'defaultColumn';

	public function init()
	{
		$cs = parent::init();
		$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/guests.css');
		return $cs;
	}
	public function actions()
	{
		return array(
			'captcha'=>array(
					'class'=>'CCaptchaAction',
					'backColor'=>0xFFFFFF,
			),
		);
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
		);
	}
	public function actionApproved()
	{
		$criteria = new CDbCriteria(array(
			'condition'=>'status=0'
		));

		if(Yii::app()->request->isPostRequest){
			$id = $_GET['id'];
			$guests = Guests::model()->findByPk($id);
			$guests->status = 1;
			$guests->save();

			$dataProvider = new CActiveDataProvider('Guests', array(
					'criteria' => $criteria,
			));

			$this->renderPartial('approved', array('dataProvider'=> $dataProvider));

			Yii::app()->end();
		}else {
			$dataProvider = new CActiveDataProvider('Guests', array(
					'criteria' => $criteria,
			));
			$this->render('approved', array('dataProvider' => $dataProvider));
		}
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guests']))
		{
			$model->attributes=$_POST['Guests'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$model = new Guests();
		$this->performAjaxValidation($model);
		if(isset($_POST['Guests'])){
			$model->attributes = $_POST['Guests'];
			if($model->validate() AND $model->save()){
				$this->redirect('/guests');
				Yii::app()->end;
			}
		}
		$criteria=new CDbCriteria(array(
				'condition'=>'status='.Guests::STATUS_PUBLISHED,
		));
		$dataProvider=new CActiveDataProvider('Guests', array(
			'pagination'=>array(
					'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
	));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model' => $model,
		));
	}

	public function actionAdmin()
	{
		$model=new Guests('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guests']))
			$model->attributes=$_GET['Guests'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Guests::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guests-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
