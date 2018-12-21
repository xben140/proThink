<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\admin\validate;

	class Module extends Base
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

























