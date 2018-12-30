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

	class Recovery extends Base
	{

		// 验证规则
		protected $rule = [
			'name'     => 'require|unique:recovery' ,
			'tab_db'   => 'require' ,
			'field'    => 'require' ,
			'category' => 'require' ,
		];

		// 验证提示
		protected $message = [
			'name.require'     => '表名必须填写' ,
			'name.unique'      => '表名已存在' ,
			'tab_db.require'   => '表明必须填写' ,
			'field.require'    => '字段必须填写' ,
			'category.require' => '应用Id必须填写' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'tab_db' ,
				'field' ,
				'category' ,
			] ,
			'edit' => [
				//'name' ,
				//'age' => 'require|number|between:1,120',

				'name' ,
				'tab_db' ,
				'field' ,
				'category' ,
			] ,
		];

	}

























