<?php

	namespace app\admin\controller;

	use app\common\controller\ControllerBase;

	class FrontendBase extends ControllerBase
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * 初始化模板路径
		 */
		public function initTemplatePath()
		{
			//F:\localWeb\public_local14\public\static\module\blog\template\default\index\index.php

			$theme = config(MODULE_NAME.'.themes');
			!$theme && $theme = 'default';

			//F:\localWeb\public_local14\public\static\module\blog\template\default\
			define('CURRENT_THEME_PATH' , CONTROLLER_STATIC_PATH_TEMPLATE . $theme . DS);
			//http:\\local14.cc\static\module\blog\template\default\
			define('CURRENT_THEME_URL' , CONTROLLER_STATIC_URL_TEMPLATE . $theme . DS);

			//F:\localWeb\public_local14\public\static\module\blog\template\default\static\
			define('CURRENT_THEME_STATIC_PATH' , CURRENT_THEME_PATH . 'static' . DS);
			//http:\\local14.cc\static\module\blog\template\default\static\
			define('CURRENT_THEME_STATIC_URL' , CURRENT_THEME_URL . 'static' . DS);

			$this->view->config([
				'view_path' => CURRENT_THEME_PATH ,
			]);

			$this->view->replace([
				'__CURRENT_THEME_STATIC_URL__' => CURRENT_THEME_STATIC_URL ,
			]);
		}

	}