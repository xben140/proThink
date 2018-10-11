<?php

	namespace app\admin\model;

	class User extends Base
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
			'reg_ip'           => IP ,
			'last_login_ip'    => 0 ,
			'last_online_time' => 0 ,
			'last_login_time'  => 0 ,
			'login_count'      => 0 ,
			'user_type'        => 1 ,
		];

		public $update = [
			//'status' ,
		];


		/**
		 * 根据用户名查出用户数据
		 *
		 * @param string $username
		 * @param string $field
		 *
		 * @return array|false|\PDOStatement|string|Model
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function getUserInfoByUsername($username, $field='*')
		{

			$where = [
				'user' => [
					'=' ,
					$username
				] ,
			];

			$condition=[
				'where' => $where,
				'field' => $field ,
			];

			//每个添加的数据都加入时间字段
			return $this->findData($condition);
		}


		/**
		 * 根据id查出用户数据
		 *
		 * @param string $id
		 * @param string $field
		 *
		 * @return array|false|\PDOStatement|string|Model
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function getUserInfoByUserId($id, $field='*')
		{
			return $this->getRowById($id, $field);
		}


		/**
		 * 根据用户名查出状态是否为1
		 *
		 * @param $username
		 *
		 * @return bool
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function isValidateUserByUsername($username)
		{
			$info = $this->getUserInfoByUsername($username);

			return $this->isValidateUser($info->toArray());
		}



		/**
		 * 根据id状态是否为1
		 *
		 * @param $id
		 *
		 * @return bool
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function isValidateUserByUserId($id)
		{
			$info = $this->getUserInfoByUserId($id);

			return $this->isValidateUser($info->toArray());
		}


		/**
		 * 根据条件判断用户状态是否为1
		 *
		 * @param array $info
		 *
		 * @return bool
		 */
		final public function isValidateUser($info)
		{
			return $info['status'] == 1;
		}

	}






















