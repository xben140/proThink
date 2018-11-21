<?php

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