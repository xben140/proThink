<?php

	namespace app\common\model;

	class Privilege extends ModelBase
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
		protected $insert = [];

		protected $update = [
			//'status' ,
			//'is_common' ,
			//'is_menu' ,
		];


		public function getDefaultAction()
		{
			$this->getAvailableOnly();
			$this->setCondition([
				'where' => [
					self::makeSelfAliasField('action') => 'none' ,
				] ,
			]);


			$data = $this
				//->fetchSql(1)
				->select();

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




		/**
		 * 根据用户id获取角色信息
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getPrivilegeByRoleId($id)
		{
			$where = [
				'id' => [
					'=' ,
					$id,
				] ,
			];

			$condition = [
				'where' => $where,
			];

			$data = $this->findData($condition);

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
		public function getPrivilegeIdByRoleId($id)
		{
			$where = [
				'role_id' => [
					'=' ,
					$id ,
				] ,
			];

			$data = db('role_privilege')->where($where)->column('privilege_id');

			return $data;
		}

	}











	