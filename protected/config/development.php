<?php
/**
 * Config file for Development Environment
 */
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
					),
					
					/**  show logs in FireBug console    **/
					array(
						'class'=>'CWebLogRoute',
						'levels'=>'info',
						'showInFireBug' => true,
					),
				
				),
			),
		
		'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=rewardit',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		),
		
			/** uncomment the following to use a MySQL database **/
			/*
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=testdrive',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
			),
			*/
	
			/** uncomment the following to use redis **/
			/*'cache'=>array(
				'class'=>'ext.redis.CRedisCache',
				//if you dont set up the servers options it will use the default one
				//"host=>'127.0.0.1',port=>6379"
				'servers'=>array(
						'host'=>'127.0.0.1',
						'port'=>6379
				),
			),*/
		), 
	/**  the Gii tool has enabled by default under Development Environment  **/
    'modules' => array(
        'gii' => array('class' => 'system.gii.GiiModule', 
            'password' => 'password', 
            // If removed, Gii defaults to localhost only. Edit carefully to
            // taste.
            'ipFilters' => array('127.0.0.1', '::1' ) ) ),
	)

);