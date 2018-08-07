<?php

	namespace app\portal\controller;

	class Login extends PortalBase
	{
		public function login()
		{
		    return $this->fetch(':login');
		}

		public function doLogin()
		{
			return $this->jump($this->logic->doLogin($this->param));
		}
	}