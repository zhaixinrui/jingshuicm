<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$arrConf = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'易人宜家',
    'language'=>'zh_cn', 
    'sourceLanguage'=>'en_us',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),


	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'smarty'=>array(
            'class'=>'application.components.CSmarty',
        ),
        'bcs'=>array(
            'class'=>'application.components.MyBcs',
        ),
        'image'=>array(
            'class'=>'application.components.MyImage',
        ),          
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        'session' => array (
             'class' => 'system.web.CDbHttpSession',
             'connectionID' => 'db',
             'sessionTableName' => 'Session',
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
					//'levels'=>'error, warning, trace, info, profile',
					//'categories'=>'system.db.*',
				),
				// uncomment the following to show log messages on web pages
				// array(
				// 	'class'=>'CWebLogRoute',
    //                'levels'=>'trace',
    //                'categories'=>'system.db.*',
				// ),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	//'params'=>array(
		// this is used in contact page
    //    'adminEmail' => 'webmaster@example.com',
	//),
);

$apiKey = '4FIRFClqKVhBbNBKbAObET8a';
$secretKey = 'y7rRc2EzgsoGM1KXuFlXOLIKVLaqG0nL';
// 线下的话对参数进行一下调整
if(!isset($_SERVER["SERVER_ADDR"])){
    $_SERVER["SERVER_ADDR"] = '10.0.0.0';
}
if(0 === strpos($_SERVER["SERVER_ADDR"], '10.')){
    // 线下配置
    $arrConf['components']['db'] = array(
    	'connectionString' => 'mysql:host=127.0.0.1;port=3306;dbname=jutianxia',
    	'emulatePrepare' => true,
    	'username' => 'root',
    	'password' => 'root',
    	'charset' => 'utf8',
        //'enableParamLogging'=>true,
    );
	$arrConf['params'] = array(
		'apiKey'     => $apiKey,
		'secretKey'  => $secretKey,
		'imageHost'  => 'image.duapp.com',
		'bcshost'    => 'bcs.duapp.com',
        'bcsBucket'  => 'project00',
        'mongoHost'  => 'localhost',
        'mongoPort'  => 27017,
        'mongoName'  => 'VpDfNsGOshkuDoYkpmeZ', 
        'collectionName'  => 'places', 
        'mongoUser'  => '', 
        'mongoPass'  => '', 
        'geotableId' => 56128,
        'ak'         => 'Oq1helNPvzN3SH7YV6faU3Lb',
	);
}else{
    // 线上配置
    $arrConf['components']['db'] = array(
    	'connectionString' => 'mysql:host=sqld.duapp.com;port=4050;dbname=fwqIeAEeVTLXzyQyZgJi',
    	'emulatePrepare' => true,
    	'username' => $apiKey,
    	'password' => $secretKey,
    	'charset' => 'utf8',
        //'enableParamLogging'=>true,
    );
	$arrConf['params'] = array(
		'apiKey'     => $apiKey,
		'secretKey'  => $secretKey,
		'imageHost'  => 'image.duapp.com',
		'bcshost'    => 'bcs.duapp.com',
        'bcsBucket'  => 'project00',
        'mongoHost'  => 'mongo.duapp.com',
        'mongoPort'  => 8908,
        'mongoName'  => 'VpDfNsGOshkuDoYkpmeZ', 
        'collectionName'  => 'places', 
        'mongoUser'  => $apiKey, 
        'mongoPass'  => $secretKey, 
        'geotableId' => 56128,
        'ak'         => 'Oq1helNPvzN3SH7YV6faU3Lb',
	);
}
return $arrConf;
