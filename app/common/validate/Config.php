<?php

	namespace app\common\validate;

	class Config extends ValidateBase
	{
		// 验证规则
		protected $rule = [
			'name'     => 'unique:config|require' ,
			'key'      => 'unique:config|alphaNum|require' ,
			'group_id' => 'number|require' ,
			'type'     => 'number|require' ,
		];

		// 验证提示
		protected $message = [

			'name.unique'  => '同样的配置名已存在' ,
			'name.require' => '配置名字必填' ,

			'key.unique'   => '同样的key已存在' ,
			'key.alphaNum' => 'key格式不合法' ,
			'key.require'  => 'key必填' ,

			'type.number'  => '类型必填' ,
			'type.require' => '类型必填' ,

			'group_id.number'  => '分组必填' ,
			'group_id.require' => '分组必填' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'key' ,
				'group_id' ,
				'type' ,
			] ,
			'edit' => [
				//'name' ,
				//'key' ,
				'group_id' ,
				'type' ,
			] ,


		];

	}

























