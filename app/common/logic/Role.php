<?php

	namespace app\common\logic;


	/**
	 * Class User
	 * @package app\common\logic
	 */
	class Role extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();

			//设置真正删除的前置回调
			$this->setBeforeDelete([
				[
					//删除角色对应的授权
					function(&$param) {
						//看有没有角色有这个权限，有的话就不能删除
						$res = db('role_privilege')->where([
								'role_id'   => [
									'in' ,
									$param['ids'],
								] ,
							])->delete() !== false;

						return $res;
					} ,
					[] ,
				] ,

			]);
		}


		public function getFormatedData($isPushDefault = 0)
		{
			$roles = $this->getActivedData([
				'no_global_admin' => 1,
			]);

			$roles_ = array_map(function($v) {
				return [
					'value' => $v['id'] ,
					'field' => $v['name'] ,
				];
			} , $roles);

			$isPushDefault && array_unshift($roles_ , [
				'value' => 0 ,
				'field' => '请选择' ,
			]);

			return $roles_;
		}

		/**
		 * 指定的用户是否有指定角色 。or关系
		 *
		 * @param        $uid
		 * @param  array $roles
		 *
		 * @return mixed
		 */
		public function isUserHasRoles($uid, $roles = [])
		{
			$ids = $this->model_->getRoleIdByUserId($uid);

			$flag = false;
			foreach ($ids as $k => $v)
			{
				if(in_array($v , $roles))
				{
					$flag = true;
					break;
				}
			}

			return $flag;
		}


		/**
		 * 获取当前角色有的权限
		 *
		 * @param $param
		 * @param $index
		 *
		 * @return mixed
		 */
		public function getRolesResource($param, $index)
		{
			$id = $param['id'];

			//当前角色对应的权限id
			$currPrivilegesId = $this->model__common_Privilegeresource->getPrivilegeIdByroleid([$id]);

			//根据当前权限id查对应资源
			$menusId = $this->model__common_Privilegeresource->getReourceIdByResourceIndexAndPrivilegeId($currPrivilegesId, $index);

			return $menusId;
		}


		/**
		 * 为角色分配权限
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function assignPrivileges($param)
		{
			//用户id
			$id = $param['id'];
			$resourceIndex = $param['type'];
			!isset($param['privileges']) && $param['privileges'] = [];

			//根据资源ids和资源类型查权限id
			$privileges = $this->model__common_Privilegeresource->getPrivilegesIdByResourceIndexAndResourceId($param['privileges'], $resourceIndex);

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
								'role_id'      => $id ,
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
					//不查全站管理
					case 'no_global_admin' :
						$v == 1 &&  $where[$this->model_::makeSelfAliasField('id')] = [
							'<>' ,
							'1',
						];
						break;

					case 'order_filed' :
						$v != '' && $order_filed = $v;
						break;

					case 'order' :
						$v != '' && $order_ = $v;
						break;

					case 'name' :
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


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}
	}