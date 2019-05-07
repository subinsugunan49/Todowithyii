<?php
// uncomment the following to define a path alias

Yii::setPathOfAlias('chartjs', dirname(__FILE__).'/../extensions/chartjs');

return array(

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'App - Todo',

	'defaultController'=>'user/login',

	// autoloading model and component classes

	'import'=>array(

		'application.models.*',
		'application.components.*',	
		'application.modules.user.models.*',    
		'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
		'application.modules.rights.models.*',/**/
	),

	'modules'=>array(

				'user'=>array(

				'tableUsers' => 'users',

                'tableProfiles' => 'profiles',

                'tableProfileFields' => 'profiles_fields',

                     # encrypting method (php hash function)

                'hash' => 'md5',

 

                # send activation email

                'sendActivationMail' => true,

 

                # allow access for non-activated users

                'loginNotActiv' => false,

 

                # activate user on registration (only sendActivationMail = false)

                'activeAfterRegister' => false,

 

                # automatically login from registration

                'autoLogin' => true,

 

                # registration path

                'registrationUrl' => array('index.php?r=user/registration'),

 

                # recovery password path

                'recoveryUrl' => array('index.php?r=user/recovery'),

 

                # login form path

                'loginUrl' => array('index.php?r=user/login'),

 

                # page after login

                'returnUrl' => array('/user/profile'),

 

                # page after logout

                'returnLogoutUrl' => array('index.php?r=user/login'),

					),

					'rights'=>array(

					'superuserName'=>'Admin', // Name of the role with super user privileges. 

					'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 

					'userIdColumn'=>'id', // Name of the user id column in the database. 

					'userNameColumn'=>'username',  // Name of the user name column in the database. 

					'enableBizRule'=>false,  // Whether to enable authorization item business rules. 

					'enableBizRuleData'=>false,   // Whether to enable data for business rules. 

					'displayDescription'=>false,  // Whether to use item description instead of name. 

					'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 

					'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 

					'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 

					'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 

					'appLayout'=>'application.views.layouts.main', // Application layout. 

					'cssFile'=>'rights.css', // Style sheet file to use for Rights. 

					'install'=>false,  // Whether to enable installer. 

					'debug'=>false, 

					),

			 'it'=>array(),

				 'officesettings',

		// uncomment the following to enable the Gii tool

		

		'gii'=>array(

			'class'=>'system.gii.GiiModule',

			'password'=>'123',

			// If removed, Gii defaults to localhost only. Edit carefully to taste.

			'ipFilters'=>array('127.0.0.1','::1'),

		),

		

	),



	// application components

	'components'=>array(
		
		

		

		

		'chartjs' => array('class' => 'chartjs.components.ChartJs'),

			'user'=>array(

	                'class'=>'RWebUser',

	                // enable cookie-based authentication

	                'allowAutoLogin'=>true,

	                'loginUrl'=>array('/user/login'),

	        ),

			'image'=>array(

          'class'=>'application.extensions.image.CImageComponent',

            // GD or ImageMagick

            'driver'=>'GD',

            // ImageMagick setup path

            'params'=>array('directory'=>'/opt/local/bin')

			),

        'authManager'=>array(

                'class'=>'RDbAuthManager',

                'connectionID'=>'db',

                'defaultRoles'=>array('Authenticated', 'Guest'),

        ),

 

		// uncomment the following to enable URLs in path-format

		

		'urlManager'=>array(
		   'urlFormat'=>'path',
		   'rules'=>array(
			'/'=>'/view',
			'//'=>'/',
			'/'=>'/',
		   ),
		  ),

		


		// uncomment the following to use a MySQL database
		'db'=>array(

			'connectionString' => 'mysql:host=localhost;dbname=todoappdb',

			'emulatePrepare' => true,

			'username' => 'root',

			'password' => '',

			'charset' => 'utf8',

		),
		

	/*	'db'=>array(

			'connectionString' => 'mysql:host=localhost;dbname=rel8hr_bridge',

			'emulatePrepare' => true,

			'username' => 'rel8hr_bridguser',

			'password' => 'ess56^#$#$#^%95515',

			'charset' => 'utf8',

		),*/
		

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
			),

		),

	),

	// application-level parameters that can be accessed

	// using Yii::app()->params['paramName']
	'params'=>array(	
		'base_url'=>'http://localhost/shareholder/',
		'paginationCount'=>50,
		'image_path'=>'https:///images/uploads/user_image_uploads/',
		'theme'=>array(
				'primary_color_light'=>'#cb253b',

				'primary_color_dark'=>'#a30c1f',

				'secondary_color_light'=>'#666666',

				'secondary_color_dark'=>'#3e3e3e',

				'logo_img'=>'images/settings/default-logo.jpg',

				'background_img'=>'images/settings/default-background.jpg',
				),

			),
);

