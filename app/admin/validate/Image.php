<?php

	namespace app\admin\validate;

	class Image extends AdminBase
	{
		// 验证规则
		protected $rule = [
			//'pid'        => 'number' ,
			//'name'       => 'unique:resource_menu|require' ,
			//'module'     => 'alpha|require' ,
			//'controller' => 'alpha|require' ,
			//'action'     => 'alpha|require' ,
			//'order'      => 'number' ,
		];

		// 验证提示
		protected $message = [

			//'name.require' => '权限名字必填' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [//'order' ,
			] ,
			'edit' => [//'name' ,
			] ,


		];

	}

























