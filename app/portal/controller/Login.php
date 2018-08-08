<?php

	namespace app\portal\controller;

	/**
	 * Class Login
	 * @package app\portal\controller
	 */
	class Login extends PortalBase
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
			if(isAdminLogin())
			{
				$this->redirect(SYS_LOGIN_INDEX);
			}
			else
			{
				return $this->fetch(':login');
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
			$this->logic = $this->logic__login;

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
			$this->logic = $this->logic__login;

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
			$this->logic = $this->logic__login;

			return $this->jump($this->logic->refresh($this->param));
		}
	}