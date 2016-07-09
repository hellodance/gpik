<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gympik',
        // path aliases
        'aliases' => array(
        
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        ),
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'bootstrap.helpers.TbHtml',
                'ext.yii-mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths' => array('bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
                'facebook'=>array(
                        'class' => 'ext.yii-facebook-opengraph.SFacebook',
                        'appId'=>'1417032088525613', // needed for JS SDK, Social Plugins and PHP SDK
                        'secret'=>'3a08027d4bb0f284ba0f25d98348ba00', // needed for the PHP SDK
                        //'fileUpload'=>false, // needed to support API POST requests which send files
                        //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
                        //'locale'=>'en_US', // override locale setting (defaults to en_US)
                        //'jsSdk'=>true, // don't include JS SDK
                        'async'=>true, // load JS SDK asynchronously
                        //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
                        //'status'=>true, // JS SDK - check login status
                        //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
                        //'oauth'=>true,  // JS SDK - enable OAuth 2.0
                        //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
                        //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
                        //'html5'=>true,  // use html5 Social Plugins instead of XFBML
                        //'ogTags'=>array(  // set default OG tags
                            //'title'=>'MY_WEBSITE_NAME',
                            //'description'=>'MY_WEBSITE_DESCRIPTION',
                            //'image'=>'URL_TO_WEBSITE_LOGO',
                        //),
                      ),
            //image extension 
            'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
                ),
		'user'=>array(
                        'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'autoUpdateFlash' => false,
                        'loginUrl'=>array('site/userlogin'),
		),
                'bootstrap' => array(
                                'class' => 'bootstrap.components.TbApi',   
                            ),
                 'yiiwheels' => array(
                                'class' => 'yiiwheels.YiiWheels',   
                            ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        //'caseSensitive'=>false,
                        'showScriptName'=>false,
                        
			'rules'=>array(
                                'Site/<action:\w+>'=>'view',
                                'terms' => array('site/terms'),
                                'why' => array('site/why'),
                                'about' => array('site/about'),
                                'healthguide'=> array('site/healthguide'),
                                'professionals'=> array('site/trainers'),
                                'success'=> array('site/success'),
                                'faq'=> array('site/faq'),
                                'advertise'=> array('site/advertise'),
                                'privacy'=> array('site/privacy'),
                                'careers'=> array('site/careers'),
                                'contact'=> array('site/contact'),
                                'how-it-works' => array('site/page', 'defaultParams'=>array('view'=>'how')),
                                'consult'=>array('site/page', 'defaultParams'=>array('view'=>'consult')),
                                'choosing-the-right-coach'=>array('site/page', 'defaultParams'=>array('view'=>'coach')),
                                'the-basics-of-eating-right'=>array('site/page', 'defaultParams'=>array('view'=>'nutritions')),
                                'workout-guide'=>array('site/page', 'defaultParams'=>array('view'=>'workout')),
                                'eat-smart-eat-right'=>array('site/page', 'defaultParams'=>array('view'=>'smarteat')),
                                'maximize-exercise-benefits'=>array('site/page', 'defaultParams'=>array('view'=>'exercise')),
//                                'info/<view:\w+>' => 'site/page/',
//                                '<action:\w+>' => array('site/<action:\w+>', 'caseSensitive'=>false),
//                                'Site/<action:\w+>' => '/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=gympic',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'enableProfiling'=>true,
                        //'enableParamLogging'=>true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					/*'class'=>'CFileLogRoute',
					'levels'=>'error, warning',*/
                                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                                        //'ipFilters'=>array('127.0.0.1','192.168.0.105'),
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                'mail' => array(
                    'class' => 'ext.yii-mail.YiiMail',
                    'transportType' => 'smtp', // change to ?php? when running in real domain.
                    'viewPath' => 'application.views.mail',
                    'logging' => true,
                    'dryRun' => false,
                    'transportOptions' => array(
                        'host' => 'mail.area51.co.in',
                        'username' => 'test@area51.co.in',
                        'password' => 'India@123',
                        'port' => '587',
                        //'encryption' => 'STARTTLS',
                    ),
                ),
                    
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
                'siteUrl'=>'http://localhost/gympic',
		'adminEmail'=>'sudhanshu.s@rijitechsolutions.com',
                'FB_APP_ID'=> '1417032088525613', 
                'FB_SECRET_KEY' => '3a08027d4bb0f284ba0f25d98348ba00',
                'FB_API_KEY' => '<api key>',
                // url of user-controller / handshake action. including your domain etc. full valid url.
                'FB_HANDSHAKE_URL' => "http://localhost/gympic/fbuser/handshake",
                 //'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken,
	),
);