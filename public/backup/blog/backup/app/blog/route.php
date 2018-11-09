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
		//'tags/:id' => 'blog/Index/index/tags' ,
	);