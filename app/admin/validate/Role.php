<?php

	namespace app\admin\validate;

	class Role extends Base
	{

		// 验证规则
		protected $rule = [
			'name'  => 'require|unique:role' ,
			'order' => 'number' ,
		];

		// 验证提示
		protected $message = [
			'name.require' => '角色名必须填写' ,
			'name.unique'  => '角色已存在' ,
			'order.number' => '排序数值必须为数字' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'order' ,
			] ,
			'edit' => [
				//'name' ,
				//'age' => 'require|number|between:1,120',
				'order' ,
			] ,
		];

	}

























