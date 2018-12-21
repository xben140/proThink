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



	namespace app\blog\controller;

	use app\common\controller\CustomFrontendBase;
	use think\Route;

	/**
	 * 前台基类
	 * Class BlogBase
	 * @package app\portal\controller
	 */
	class FrontendBase extends CustomFrontendBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

	}