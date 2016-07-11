<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Бассейн Волна Ефремов',
	'language'=>'ru',
	'theme'=>'new',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
	),

	'defaultController'=>'post',

	// application components
	'modules'=>array(
			'gii'=>array(
					'class'=>'system.gii.GiiModule',
					'password'=>'123',
			)),

	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'mailer' => array(
				'class' => 'application.extensions.mailer.EMailer',
				'pathViews' => 'application.views.email',
				'pathLayouts' => 'application.views.email.layouts',
				),
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=mysql-srv69531.ht-systems.ru;dbname=srv69531_volna',
			'emulatePrepare' => true,
			'username' => 'srv69531_ht77763',
			'password' => '1234522a',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
			'post/<id:\d+>'=>'/post/view',
			'posts/<tag:.*?>'=>'post/index',
			'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			'/site/page/<view:.*?>'=>'/site/page',
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/**/
				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);