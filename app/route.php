<?php
	return array(
		'install'  => 'install/Index/install' ,
		'evnCheck' => 'install/Index/evnCheck' ,
		'dbCheck'  => 'install/Index/dbCheck' ,
		'createDb' => 'install/Index/createDb' ,
	);


	/*
		Route::rule([
			'new/:id'  => 'News/read' ,
			'blog/:id' => [
				'Blog/update' ,
				['ext' => 'shtml'] ,
				['id' => '\d{4}'] ,
			] ,
		] , '' , 'GET' , ['ext' => 'html'] , ['id' => '\d+']);
	*/