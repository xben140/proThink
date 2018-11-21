<?php

	namespace app\blog\controller;

	use app\common\controller\CustomBackendBase;
	use builder\tagConstructor;

	/**
	 * 后台基类
	 * Class AdminBase
	 * @package app\portal\controller
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
			$this->makePage()->setCss(tagConstructor::css([//'__STATIC__/css/custom.css' ,
			]));

			/**
			 * 设置head里的js
			 */
			$this->makePage()->setJsLib(tagConstructor::js([//'__HPLUS__js/plugins/layer/layer.js' ,
			]));

			/**
			 * 设置body之前的js始终加在setJsInvoke上面
			 */
			$this->makePage()->setScript(tagConstructor::js([//'__STATIC__/js/custom.js' ,
			]));

			/**
			 * 设置body标签闭合之前的js
			 */
			$this->makePage()->setJsInvoke(tagConstructor::js([

			]));


		}
	}