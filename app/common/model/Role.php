<?php

	namespace app\common\model;

	class Role extends ModelBase
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
		protected $auto = [
		];

		//新增时自动验证
		protected $insert = [
		];


		//修改时自动验证
		protected $update = [
			//'status' ,
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
		 * 根据用户id获取角色信息
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
				],
			]);

			return $data;
		}

		/**
		 * 根据用户id获取角色id
		 *    查role_user映射表
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getRoleIdByUserId($id)
		{
			$where = [
				'user_id' => [
					'=' ,
					$id ,
				] ,
			];

			$data = db('user_role')->where($where)->column('role_id');

			return $data;
		}

	}