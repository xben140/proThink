<?php
//配置文件
	return [
		'id'              => 'blog' ,
		'name'            => 'blogname' ,
		'title'           => 'blogtitle' ,
		'version'         => 'blogversion' ,
		'description'     => 'blogdescription' ,
		'default_action'  => 'blog/blogarticle/add' ,
		'update_time'     => time() ,

		//此应用所有对应用到的数据表名，带表前缀
		'database_tables' => [
			'ithink_blog_article' ,
			'ithink_blog_article_tag' ,
			'ithink_blog_tag' ,
			'ithink_blog_type' ,
		] ,
	];