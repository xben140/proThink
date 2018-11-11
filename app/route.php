<?php
	return array(

		'blog' => 'blog/Index/index' ,

		'detail/:id' => [
			'blog/Index/detail' ,
			[//'ext' => 'html' ,
			] ,
			[
				'id' => '\d+' ,
			] ,
		] ,
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