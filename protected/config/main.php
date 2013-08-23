<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.services.*',
		'application.extensions.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'login/'=>'site/login',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/** You can change settings of database at develpment.php/production.php  **/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),

    				array(
        				'class'=>'CWebLogRoute',
        				'levels'=>'info',
        				'categories'=>'application.firebuglog',
        				'showInFireBug' => true,
    				),
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info',
					'categories'=>'application.gameAMFInfo',
					'logFile' => 'GameAMFInfo',
				),
			),
		),
		'widgetFactory'=>array(
			'enableSkin'=>true,
		),
		/** uncomment the following to use Authorization **/
		/*'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			'itemTable' => 'auth_item',
			'itemChildTable' => 'auth_item_child',
			'assignmentTable' => 'auth_assignment',
		),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),

	/** uncomment the following to use modules **/
	/*'modules' => array(
		'module_name' => array()
	),*/
);