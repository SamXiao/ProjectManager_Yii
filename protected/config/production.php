<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
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
		
			/** send error to admin by email **/
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CEmailLogRoute',
						'levels'=>'error, warning',
						/**  set your email address   **/
						'emails'=>array('admin@site.com'),
					),
				
					/**  save logs in files    **/
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'info',
					),
			
				),
			),
		), 
	)

);