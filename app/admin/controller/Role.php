<?php

	namespace app\admin\controller;

	class Role extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		public function add()
		{
			if(IS_POST)
			{
				$this->initLogic();
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				return $this->makeView($this);
			}
		}


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

		public function dataList()
		{
			return $this->makeView($this);
		}

		public function assignPrivileges()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->assignPrivileges($this->param));
			}
			else
			{
				return $this->makeView($this);
			}
		}


		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [
				[
					//看有没有用户有这个角色，有的话就不能删除
					function(&$param) {
						$res = db('user_role')->where([
							'role_id' => [
								'in' ,
								$param['ids'] ,
							] ,
						])->find();

						return !$res;
					} ,
					[] ,
					'有用户被赋予此角色，不允许删除' ,
				] ,
			]));
		}

	}
