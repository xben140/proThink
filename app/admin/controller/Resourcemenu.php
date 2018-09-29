<?php

	namespace app\admin\controller;

	class Resourcemenu extends PermissionAuth
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
				$this->jump($this->logic->add($this->param_post , [] , [
					[
						function(&$param) {
							//菜单添加好后把菜单id添加到权限表里
							return db('privilege_resource')->insert([
									'resource_id'   => $param['_id'] ,
									'resource_type' => RESOURCE_INDEX_MENU ,
								]) !== false;
						} ,
						[] ,
						'授权失败，请稍后再试...' ,
					] ,
				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(md5(URL_MODULE));
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

		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				[
					function(&$param) {

						//查询权限资源关联表id
						$privilegeId = db('privilege_resource')->where([
							'resource_id'   => [
								'in' ,
								$param['ids'] ,
							] ,
							'resource_type' => [
								'=' ,
								RESOURCE_INDEX_MENU ,
							] ,
						])->value('id');

						//看有没有角色有这个权限，有的话就不能删除
						$res = db('role_privilege')->where([
							'privilege_id' => [
								'in' ,
								$privilegeId ,
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
