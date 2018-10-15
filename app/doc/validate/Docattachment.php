<?php

	namespace app\doc\validate;

	class Docattachment extends Base
	{
		// 验证规则
		protected $rule = [
			//'pid'        => 'number' ,
			//'name'       => 'unique:resource_menu|require' ,
			//'module'     => 'alpha|require' ,
			//'controller' => 'alpha|require' ,
			//'action'     => 'alpha|require' ,
			'remark' => 'require' ,
		];

		// 验证提示
		protected $message = [
			'remark.require' => '必须填写备注' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				//'name' ,
				//'module' ,
				//'controller' ,
				//'action' ,
				//'order' ,
			] ,
			'edit' => [
				//'name' ,
				//'module' ,
				//'controller' ,
				//'action' ,
				//'order' ,
			] ,


		];

	}

























