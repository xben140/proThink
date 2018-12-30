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



	namespace app\admin\model;

	class Module extends Base
	{
		/**
		 *  初始化模型
		 * @access protected
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		public static $appStatusMap = [
			[
				'color' => '#ccc' ,
				'value' => 0 ,
				'field' => '数据残缺，安装错误' ,
			] ,
			[
				'color' => '#0f0' ,
				'value' => 1 ,
				'field' => '正常' ,
			] ,
		];

		//自动完成[新增和修改时都会执行]
		protected $auto = [];

		//新增时自动验证
		protected $insert = [];


		//修改时自动验证
		protected $update = [//'status' ,
		];


		/*
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 * */


	}
















