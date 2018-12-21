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



	namespace app\____ID__\controller;

	use app\common\controller\CustomBackendBase;
	use builder\tagConstructor;

	/**
	 * 后台控制器基类模板
	 */
	class BackendBase extends CustomBackendBase
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function initModuleStaticResource()
		{
			parent::initModuleStaticResource();

			/**
			 * 设置head
			 */
			$this->makePage()->setHead([

			]);

			/**
			 * 设置link标签
			 */
			$this->makePage()->setCss(tagConstructor::css([
				//'__STATIC__/css/custom.css' ,
			]));

			/**
			 * 设置head里的js
			 */
			$this->makePage()->setJsLib(tagConstructor::js([
				//'__HPLUS__js/plugins/layer/layer.js' ,
			]));

			/**
			 * 设置body之前的js始终加在setJsInvoke上面
			 */
			$this->makePage()->setScript(tagConstructor::js([
				//'__STATIC__/js/custom.js' ,
			]));

			/**
			 * 设置body标签闭合之前的js
			 */
			$this->makePage()->setJsInvoke(tagConstructor::js([

			]));


		}
	}