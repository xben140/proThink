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

		//此应用所有数据表名，带表前缀
		//备份应用数据时需要
		//检测应用是否安装完整需要
		//删除应用需要
		'database_tables' => [
			'ithink_blog_article' ,
			'ithink_blog_article_tag' ,
			'ithink_blog_tag' ,
			'ithink_blog_type' ,
		] ,
	];