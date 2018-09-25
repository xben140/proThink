<?php

	namespace app\common\logic;

	/**
	 * Class User
	 * @package app\common\logic
	 */
	class User extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 获取当前用户的角色id
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getUserRoles($param)
		{
			$id = $param['id'];

			$roles = $this->model__common_role->getRoleIdByUserId($id);

			return $roles;
		}

		/**
		 * 获取当前用户对应分配的刊物类型id 编辑角色才有
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getUserJournalTypes($param)
		{
			$id = $param['id'];

			$roles = $this->model__common_Journaltype->getJournalTypeIdByUserId($id);

			return $roles;
		}

		/**
		 * 获取当前用户的角色全部信息
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getUserRolesInfo($param)
		{
			$id = $param['id'];

			$roles = $this->model__common_role->getRoleByUserId($id);

			return $roles->toArray();
		}


		/**
		 * 为用户分配角色
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function assignRoles($param)
		{
			//用户id
			$id = $param['id'];
			!isset($param['roles']) && $param['roles'] = [];
			//新分配角色id
			$roles = $param['roles'];

			$res = execClosureList([
				[
					//删除之前的角色
					function($id) {
						return db('user_role')->where('user_id' , $id)->delete() !== false;
					} ,
					[$id] ,
				] ,
				[
					//添加新角色
					function($roles , $id) {
						foreach ($roles as $v)
						{
							db('user_role')->insert([
								'user_id' => $id ,
								'role_id' => $v ,
							]);
						}

						return true;
					} ,
					[
						$roles ,
						$id ,
					] ,
				] ,
			] , $err);

			if($res)
			{
				$this->retureResult['message'] = '分配成功';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$msg = $err ? $err : $this->model_->getError();
				$this->retureResult['message'] = $msg;
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}



		/**
		 * 为用户分配刊物类型
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function assignJournalTypeMap($param)
		{
			//用户id
			$id = $param['id'];
			!isset($param['roles']) && $param['roles'] = [];
			//新分配角色id
			$juornaltypes = $param['roles'];

			$res = execClosureList([
				[
					//删除之前的角色
					function($id) {
						return db('user_juornaltype')->where('user_id' , $id)->delete() !== false;
					} ,
					[$id] ,
				] ,
				[
					//添加新角色
					function($juornaltypes , $id) {
						foreach ($juornaltypes as $v)
						{
							db('user_juornaltype')->insert([
								'user_id' => $id ,
								'type_id' => $v ,
							]);
						}

						return true;
					} ,
					[
						$juornaltypes ,
						$id ,
					] ,
				] ,
			] , $err);

			if($res)
			{
				$this->retureResult['message'] = '分配成功';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$msg = $err ? $err : $this->model_->getError();
				$this->retureResult['message'] = $msg;
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}



		/**
		 * @param $param
		 *
		 * @return array
		 */
		public function editPwd($param)
		{
			$id = $param['id'];
			unset($param['id']);

			$validateResult = $this->validate_->scene('editPwd')->check($param);

			if($validateResult)
			{
				list($data['salt'] , $data['password']) = array_values(buildPwd($param['password']));

				$where = [
					'id' => [
						'=' ,
						$id ,
					] ,
				];

				$res = $this->model_->updateData($data , $where);

				if(($res) !== false)
				{
					$this->retureResult['message'] = '更新成功';
					$this->retureResult['sign'] = RESULT_SUCCESS;
				}
				else
				{
					$this->retureResult['message'] = $this->model_->getError();
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = $this->validate_->getError();
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;

		}


		/**
		 * @param $param
		 *
		 * @return array
		 */
		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$join = [];
			$field = [];


			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = 'id';
			$order_ = 'asc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'user' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'=' ,
							$v ,
						];
						break;

					case 'order_filed' :
						$v != '' && $order_filed = $v;
						break;

					case 'order' :
						$v != '' && $order_ = $v;
						break;

					case 'nickname' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'reg_time_begin' :
						$v != '' && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v != '' && $reg_time_end = strtotime($v);
						break;

					case 'status' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;

					case 'role_id' :
						if($v != -1)
						{
							$where['c.id'] = [
								'=' ,
								$v ,
							];
						}
						break;

					default :
						#...
						break;
				}
			}

			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end ,
				] ,
			];
			$order[$order_filed] = $order_;

			$join[] = [
				'ithink_user_role b',
				$this->model_::makeSelfAliasField('id') . '  = b.user_id ' ,
				'left',
			];

			$join[] = [
				'ithink_role c',
				'c.id = b.role_id',
				'left',
			];


			$field[] = $this->model_::makeSelfAliasField('*');
			$field[] = 'GROUP_CONCAT(c.`name`) as role';

			return $condition = [
				'group' => $this->model_::makeSelfAliasField('id'),
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}
	}