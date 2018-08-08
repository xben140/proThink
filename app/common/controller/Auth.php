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
			$this->_loginAuth();
			$this->_initEnv();
			$this->_statusAuth();
			//$this->_authIp();
			//$this->_authPrivilege();
			//$this->_initMenu();
		}


		//登陆验证
		private function _loginAuth()
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
		private function _statusAuth()
		{
			if(!$this->model__common_User->isValidateUser($this->adminInfo))
			{
				print_r('klsdfjsdflkjf');
				exit;;
				session(null);
				$this->assign('data' , [
					'code' => '403' ,
					'msg'  => '用户已被禁用，请联系管理员' ,
				]);

			}
		}
	}