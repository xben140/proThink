<?php

	namespace app\admin\model;

	class Privilege extends Base
	{
		//public $name = '';

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

		protected $update = [
			//'status' ,
			//'is_common' ,
			//'is_menu' ,
		];

		/**
		 * 所有默认方法
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getDefaultAction()
		{
			$data = $this->selectData([
				'where' => [
					self::makeSelfAliasField('action') => 'none' ,
				] ,
			]);

			//collection
			return $data;
		}


		/**
		 *  用户id --> 权限
		 *
		 * @param $uid
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getPrivilegeByUserid($uid)
		{
			$ids = array_merge(
				//角色id
				$this->getPrivilegeIdByRoleid($this->model__admin_role->getRoleIdByUserId($uid)),
				//公共权限id
				$this->getCommonPrivilegesId()
			);

			$data = $this->getPrivilegesByPrivilegesId($ids);

			return $data;
		}

		/**
		 *  角色ids --> 权限ids
		 * @access public
		 *
		 * @param array $rolesId
		 *
		 * @return array
		 */
		public function getPrivilegeIdByRoleid($rolesId = [])
		{
			$rolesId = array_flip(array_flip($rolesId));
			$where = [
				'role_id' => [
					'in' ,
					$rolesId ,
				] ,
			];

			$data = db('role_privilege')->where($where)->column('privilege_id');
			$data = array_flip(array_flip($data));

			return $data;
		}


		/**
		 *  获取公共权限ids
		 */
		public function getCommonPrivilegesId()
		{
			$this->getAvailableOnly();
			$data = $this->where([
				self::makeSelfAliasField('is_common') => [
					'=' ,
					'1' ,
				] ,
			])->column('id');

			return $data;
		}


		/**
		 *  权限ids --> 权限
		 *
		 * @param array $PrivilegesId
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getPrivilegesByPrivilegesId($PrivilegesId = [])
		{
			$PrivilegesId = array_flip(array_flip($PrivilegesId));

			$data = $this->selectData([
				'where' => [
					self::makeSelfAliasField('id') => [
						'in' ,
						$PrivilegesId ,
					] ,
				] ,
			]);

			//collection
			return $data;
		}


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
		 *
		 *
		 * */


		public function setIsCommonAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		public function setIsMenuAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}


	}











	