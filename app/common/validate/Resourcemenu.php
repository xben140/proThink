<?php

	namespace app\common\validate;

	class Resourcemenu extends ValidateBase
	{
		// 验证规则
		protected $rule = [
			'pid'        => 'number' ,
			'name'       => 'unique:privilege|require' ,
			'module'     => 'alpha|require' ,
			'controller' => 'alpha|require' ,
			'action'     => 'alpha|require' ,
			'order'       => 'number' ,
		];

		// 验证提示
		protected $message = [

			'name.number'  => '上级选择错误' ,
			'name.unique'  => '同样的记录已存在' ,
			'name.require' => '权限名字必填' ,

			'module.require'     => '权限名字必填' ,
			'module.alpha'       => '允许为英文字母' ,

			'controller.require' => '控制器名字必填' ,
			'controller.alpha'   => '允许为英文字母' ,

			'action.require'     => '方法名字必填' ,
			'action.alpha'       => '允许为英文字母' ,

			'order.number' => '排序必须为数字' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'module' ,
				'controller' ,
				'action' ,
				'order' ,
			] ,
			'edit' => [
				//'name' ,
				'module' ,
				'controller' ,
				'action' ,
				'order' ,
			] ,


		];

	}

























