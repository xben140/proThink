<?php

	namespace app\blog\validate;


	class Blogtype extends Base
	{
		// 验证规则
		protected $rule = [
			'name'  => 'unique:blog_type|require' ,
			'order' => 'number' ,
		];

		// 验证提示
		protected $message = [

			'name.unique'  => '同样的记录已存在' ,
			'name.require' => '类名字必填' ,

			'order.number' => '排序必须为数字' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'order' ,
			] ,
			'edit' => [
				//'name' ,
				'order' ,
			] ,

		];
	}





















