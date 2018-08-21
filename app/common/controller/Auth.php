<?php

	namespace app\common\controller;


	class Auth extends ControllerBase
	{

		public $adminInfo;

		public function __construct()
		{
			parent::__construct();
		}

		public function _initialize()
		{
			parent::_initialize();
			$this->_authIsLogin();
			$this->_initEnv();
			$this->_authUserStatus();
			//$this->_authIp();
			$this->_authPrivilege();
		}


		//登陆验证
		private function _authIsLogin()
		{
			!isAdminLogin() && $this->redirect(SYS_NON_LOGIN_INDEX);
		}

		//用户基础资料
		private function _initEnv()
		{
			$this->adminInfo = getAdminSessionInfo('user');
			$this->assign('adminInfo' , $this->adminInfo);
		}

		//用户状态验证
		private function _authUserStatus()
		{
			if(!$this->model__common_User->isValidateUser($this->adminInfo))
			{
				exception('用户状态异常，请联系管理员' , 403 );
			}
		}

		//用户权限验证
		private function _authPrivilege()
		{
			$privilege = getAdminSessionInfo('privilege');;
			$menuMap = getMenu($privilege);
			$currentAction = formatMenu(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME);

			if(!in_array($currentAction, $menuMap))
			{
				exception('未授权的访问' , 403 );
			}
		}
	}












