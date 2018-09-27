<?php

	namespace app\admin\model;

	class Role extends AdminBase
	{
		/**
		 *  初始化模型
		 * @access protected
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		//自动完成[新增和修改时都会执行]
		protected $auto = [];

		//新增时自动验证
		protected $insert = [];


		//修改时自动验证
		protected $update = [//'status' ,
		];


		/*
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 * */


		/**
		 *  用户id  --> 角色信息
		 *
		 * @param $id
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getRoleByUserId($id)
		{
			//角色id
			$rolesId = $this->getRoleIdByUserId($id);

			$data = $this->selectData([
				'where' => [
					'id' => [
						'in' ,
						$rolesId ,
					] ,
				] ,
			]);

			return $data;
		}

		/**
		 *  用户id  --> 角色ids
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getRoleIdByUserId($id)
		{
			$where = [
				'b.user_id' => [
					'=' ,
					$id ,
				] ,
			];

			$join = [
				[
					'ithink_user_role b ' ,
					self::makeSelfAliasField('id') . '  = b.role_id ' ,
					'inner',
				] ,
			];
			$condition = [
				'where' => $where ,
				'join'  => $join ,
			];

			$this->getAvailableOnly();
			$this->getActivedOnly();
			$this->setCondition($condition);
			$data = $this->column('b.role_id');
			$data = array_flip(array_flip($data));

			return $data;
		}

	}
















