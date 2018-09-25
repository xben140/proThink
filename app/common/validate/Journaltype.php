<?php

	namespace app\common\validate;

	class Journaltype extends ValidateBase
	{
		// 验证规则
		protected $rule = [
			'name' => 'unique:journal_type|require' ,

			'order' => 'number' ,
		];

		// 验证提示
		protected $message = [

			'name.unique'  => '同样的记录已存在' ,
			'name.require' => '类型名称必填' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'order' ,
			] ,
			'edit' => [//'name' ,
			] ,


		];

	}

























