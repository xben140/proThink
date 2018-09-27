<?php

	namespace app\admin\validate;

	class Recovery extends AdminBase
	{

		// 验证规则
		protected $rule = [
			'name'   => 'require|unique:recovery' ,
			'tab_db' => 'require' ,
			'field'  => 'require' ,
		];

		// 验证提示
		protected $message = [
			'name.require'   => '表名必须填写' ,
			'name.unique'    => '表名已存在' ,
			'tab_db.require' => '表明必须填写' ,
			'field.require'  => '字段必须填写' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'tab_db' ,
				'field' ,
			] ,
			'edit' => [
				//'name' ,
				//'age' => 'require|number|between:1,120',

				'name' ,
				'tab_db' ,
				'field' ,
			] ,
		];

	}

























