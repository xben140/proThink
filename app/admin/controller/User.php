<?php

	namespace app\admin\controller;

	use builder\integrationTags;

	class User extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post , [
					[
						function(&$param) {
							list($param['salt'] , $param['password']) = array_values(buildPwd($param['password']));
						} ,
						[] ,
					] ,
				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 列表页里编辑成用户信息
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 自己修改自己信息
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function modifyInfo()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$res = $this->logic->edit($this->param , $id);
				$this->logic->updateSessionByUsername(getAdminSessionInfo(SESSOIN_TAG_USER , 'user'));
				$this->jump($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 自己修改自己密码
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function modifyPwd()
		{
			if(IS_POST)
			{
				$this->initLogic();
				$this->param['id'] = getAdminSessionInfo(SESSOIN_TAG_USER , 'id');

				return $this->jump($this->logic->editPwd($this->param));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 列表页里修改用户密码
		 * @return mixed
		 * @throws \ReflectionException
		 * @throws \Exception
		 */
		public function editPwd()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->editPwd($this->param));
			}
			else
			{
				return $this->makeView($this);
			}
		}


		public function dataList()
		{
			return $this->makeView($this);
		}

		public function assignRoles()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->assignRoles($this->param));
			}
			else
			{
				return $this->makeView($this);
			}
		}

	}


















