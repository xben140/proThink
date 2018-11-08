<?php

	namespace app\common\controller;

	/**
	 * 自定义模块前台操作都要继承的基类
	 * Class CustomFrontendBase
	 * @package app\common\controller
	 */
	class CustomFrontendBase extends ControllerBase
	{
		use CustomBase;

		/**
		 * 初始化模板路径
		 */
		public function initTemplatePath()
		{
			//F:\localWeb\public_local14\public\static\module\blog\template\default\index\index.php
			$theme = config('themes');
			!$theme && $theme = 'default';
			$this->view->config([
				'view_path' => CONTROLLER_STATIC_PATH_TEMPLATE . $theme .DS ,
			]);
		}
	}