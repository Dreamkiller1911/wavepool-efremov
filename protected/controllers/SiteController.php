<?php

class SiteController extends Controller
{
	public $layout='defaultColumn';

	public function init()
	{
		$cs = parent::init();
		$cs->registerScriptFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
		return $cs;
	}
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actiionIndex()
	{
		var_dump($_GET);
	}

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$message = $model->body;
				Yii::app()->mailer->Host = 'smtp.ht-systems.ru';
				Yii::app()->mailer->IsSMTP();
				Yii::app()->mailer->SMTPAuth=true;
				Yii::app()->mailer->Username = 'contact@wavepool-efremov.ru';
				Yii::app()->mailer->Password = 'Raz0rghbcn$';
				Yii::app()->mailer->From = $model->email;
				Yii::app()->mailer->FromName = $model->name;
				//Yii::app()->mailer->AddReplyTo('wei@pradosoft.com');
				Yii::app()->mailer->AddAddress('demolish99@yandex.ru');
				Yii::app()->mailer->CharSet = 'UTF-8';
				Yii::app()->mailer->Subject = $model->subject;
				Yii::app()->mailer->Body = $message;
				if(Yii::app()->mailer->Send()){
					Yii::app()->user->setFlash('contact','Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.');
					$this->refresh();
				}
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
