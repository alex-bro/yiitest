<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__). '/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Extended books catalog N3',
    'language' => 'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array('bootstrap.gii')
		),
        'front',

	),

	// application components
	'components'=>array(

        // bootstrap пагинация
        'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    'header' => '',
                    'nextPageLabel'=>'Следующая <i class="fa fa-long-arrow-right"></i>',
                    'prevPageLabel'=>'<i class="fa fa-long-arrow-left"></i> Предыдущая',
                    'lastPageLabel'=>'Последняя',
                    'firstPageLabel'=>'Первая',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => 'pagination',
                    ),
                ),
            ),
        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        'bootstrap' => array('class' => 'ext.bootstrap.components.Bootstrap'),

		// uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                // стандартное правило для обработки '/' как 'site/index'
                '' => 'front',
                'admin'=>'site/index',
                // это пример добавления который заработал
                //'secondcontroller/<action:.*>'=>'secondcontroller/<action>',
                'user/<action:.*>'=>'user/<action>',
                //'<action:.*>'=>'site/<action>', //закомментил а то глючило с ним
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'alex110@list.ru',
	),
);
