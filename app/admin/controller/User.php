<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\admin\controller;

	class User extends BackendBase
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function add()
		{
			
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
		 * 自己修改自己信息
		 */
		public function modifyInfo()
		{
			
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
		 */
		public function modifyPwd()
		{
			if(IS_POST)
			{
				
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
		 * @throws \Exception
		 */
		public function editPwd()
		{
			
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


		public function assignRoles()
		{
			
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


















