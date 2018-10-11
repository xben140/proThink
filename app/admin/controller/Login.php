<?php

	namespace app\admin\controller;

	class Login extends Base
	{

		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * 登陆页面
		 * @return mixed
		 * @throws \think\exception\HttpResponseException
		 */
		public function login()
		{
			$this->initLogic();
			if(isAdminLogin())
			{
				$this->redirect(SYS_LOGIN_INDEX);
			}
			else
			{
				return $this->fetch('login');
			}
		}

		/**
		 * 登陆api
		 *
		 * @return mixed
		 * @throws \Exception
		 */
		public function doLogin()
		{
			$this->initLogic();

			return $this->jump($this->logic->doLogin($this->param));
		}

		/**
		 * 退出登录
		 *
		 * @return mixed
		 * @throws \Exception
		 */
		public function logout()
		{
			$this->initLogic();
			return $this->jump($this->logic->logout($this->param));
		}

		/**
		 * 刷新session
		 *
		 * @return mixed
		 * @throws \Exception
		 */
		public function refresh()
		{
			$this->initLogic();
			return $this->jump($this->logic->refresh($this->param));
		}
	}