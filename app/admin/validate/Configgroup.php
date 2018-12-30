<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\admin\validate;

	class Configgroup extends Base
	{
		// 验证规则
		protected $rule = [
			'name'  => 'unique:config_group|require' ,
			'order' => 'number' ,
		];

		// 验证提示
		protected $message = [

			'name.unique'  => '同样的记录已存在' ,
			'name.require' => '权限名字必填' ,

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

























