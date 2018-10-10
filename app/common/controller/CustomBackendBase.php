<?php

	namespace app\common\controller;

	/**
	 * 自定义模块后台操作都要继承的基类
	 *
	 * Class CustomBackendBase
	 * @package app\common\controller
	 */
	class CustomBackendBase extends \app\admin\controller\PermissionAuth
	{
		use CustomBase;
	}