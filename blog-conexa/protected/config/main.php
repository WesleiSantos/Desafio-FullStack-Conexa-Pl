<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'My Web Application',
	'language' => 'pt_br',
	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => array(
		// uncomment the following to enable the Gii tool

		'gii' => array(
			'class' => 'system.gii.GiiModule',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			#'ipFilters'=>array('127.0.0.1','::1'),
			'password' => 'admin',
			#'ipFilters' => array('127.0.0.1', $_SERVER['REMOTE_ADDR'])
		),
	),

	

	// application components
	'components' => array(
		'sass' => array(
            // Path to the SassHandler class
            'class' => 'ext.yii-sass.SassHandler',
            
            // Path and filename of scss.inc.php
            'compilerPath' => __DIR__ . '/../vendor/scssphp/scss.inc.php',
            
            // Path and filename of compass.inc.php
            // Required only if Compass support is needed
            'compassPath' => __DIR__ . '/../vendor/scssphp-compass/compass.inc.php',
            
            // Enable Compass support, defaults to false
            'enableCompass' => true,
        ),

		'curl' => array(
			'class' => 'application.extensions.curl.Curl',
			'options' => array(),
		),

		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db' => require(dirname(__FILE__) . '/database.php'),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => YII_DEBUG ? null : 'site/error',
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

		'apiService' => array(
			'class' => 'application.components.ApiService',
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
		'apiBaseUrl' => 'https://my-json-server.typicode.com/WesleiSantos/Conexa-My-Json-DB/',
	),
);
