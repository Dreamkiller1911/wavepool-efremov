<?php

class ImgController extends Controller
{

	public $layout = 'galleryColumn';

	public function init()
	{
		$cs = parent::init();
		$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/gallery.css');
		$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/imgCRUD.js');
		$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/gallery.js');
		$cs->registerScript('imgGRUD',
				'var img = new imgCRUD();
				img.newLoad();
				', CClientScript::POS_LOAD
		);
		return $cs;
	}
	public function filters()
	{
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
	}

	public function accessRules()
	{
		/*return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);*/
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionAdd()
	{
		$model=new GalleryImg;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if(isset($_POST['GalleryImg']))
		{
			$model->attributes=$_POST['GalleryImg'];
			if($model->validate()){
				if(isset($_FILES['GalleryImg'])){
					$status = GalleryImg::saveImg($_FILES['GalleryImg'], $_POST['GalleryImg']);

					if($status['complete'] == false){

						$model->addError('url', $status['text']);
					}else {
						$this->redirect(array('/media/view','id'=>$_POST['GalleryImg']['album']));
					}

				}
//				if($model->save())
//					$this->redirect(array('view','id'=>$model->id));
			}

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryImg']))
		{
			$model->attributes=$_POST['GalleryImg'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		unlink(Yii::getPathOfAlias('webroot') . $model->url);
		unlink(Yii::getPathOfAlias('webroot') . $model->simple_url);
		$model->delete();


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GalleryImg');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		//$model=new GalleryImg('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['GalleryImg']))
		//	$model->attributes=$_GET['GalleryImg'];

		/*$this->render('admin',array(
			'model'=>$model,
		));*/
		$dataProvider=new CActiveDataProvider('GalleryImg');
		$this->render('admin',array(
				'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=GalleryImg::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionGetAll()
	{
		if(isset($_POST)){
			$sql = "SELECT url FROM {{gallery_img}} WHERE album=:id";
			$command = Yii::app()->db->createCommand($sql);
			$command->bindParam(":id", $_POST['id'], PDO::PARAM_INT);

			$model = $command->queryAll();
			echo json_encode($model);
		}
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-img-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
