<?php

	namespace app\common\logic;


	/**
	 * Class User
	 * @package app\common\logic
	 */
	class Role extends LogicBase
	{


		/**
		 * 获取当前用户的角色id
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getPrivilegesId($param)
		{
			$id = $param['id'];

			$roles = $this->model__common_privilege->getPrivilegeIdByRoleId($id);

			return $roles;
		}

		/**
		 * 为用户分配角色
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function assignPrivileges($param)
		{
			//用户id
			$id = $param['id'];
			//新分配角色id
			$privileges = $param['privileges'];

			$res = execClosureList([
				[
					//删除之前的角色
					function($id) {
						return db('role_privilege')->where('role_id' , $id)->delete() !== false;
					} ,
					[$id] ,
				] ,
				[
					//添加新角色
					function($privileges , $id) {
						foreach ($privileges as $v)
						{
							db('role_privilege')->insert([
								'role_id' => $id ,
								'privilege_id' => $v ,
							]);
						}

						return true;
					} ,
					[
						$privileges ,
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
		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = 'id';
			$order_ = 'asc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'order_filed' :
						$v && $order_filed = $v;
						break;

					case 'order' :
						$v && $order_ = $v;
						break;

					case 'name' :
						$v && $where[$this->model_::makeSelfAliasField($k)] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'reg_time_begin' :
						$v && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v && $reg_time_end = strtotime($v);
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

					default :
						#...
						break;
				}
			}

			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end,
				],
			];

			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}
	}