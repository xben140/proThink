<?php

	namespace app\admin\controller;

	class Privilege extends PermissionAuth
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
				$this->jump($this->logic->add($this->param_post , [] , []));
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
					function(&$param) {
						//看有没有角色有这个权限，有的话就不能删除
						$res = db('role_privilege')->where([
							'privilege_id' => [
								'in' ,
								$param['ids'] ,
							] ,
						])->find();

						return !$res;
					} ,
					[] ,
					'有角色被赋予此权限，不允许删除' ,
				] ,
			]));
		}

	}
