<?php

	namespace app\admin\controller;

	class Role extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();

		}


		public function assignPrivileges()
		{
			
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
