<?php

	namespace app\admin\logic;

	use builder\elementsFactory;
	use builder\integrationTags;

	class User extends Base
	{
		public function __construct()
		{
			$this->initBaseClass();

			//设置真正删除的前置回调
			$this->setBeforeDelete([
				[
					function(&$param) {
						//删除用户角色关联记录
						return db('user_role')->where([
								'user_id' => [
									'in' ,
									$param['ids'] ,
								] ,
							])->delete() !== false;
					} ,
					[] ,
				] ,

			]);
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

			$roles = $this->model__admin_role->getRoleIdByUserId($id);

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

			$roles = $this->model__admin_role->getRoleByUserId($id);

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
		 * 搜索条件生成
		 *
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
				'ithink_user_role b' ,
				$this->model_::makeSelfAliasField('id') . '  = b.user_id ' ,
				'left' ,
			];

			$join[] = [
				'ithink_role c' ,
				'c.id = b.role_id' ,
				'left' ,
			];


			$field[] = $this->model_::makeSelfAliasField('*');
			$field[] = 'GROUP_CONCAT(c.`name`) as role';

			return $condition = [
				'group' => $this->model_::makeSelfAliasField('id') ,
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}


		/**
		 * ******************************************************************************************
		 * ******************************************************************************************
		 *                        回收站删除相关
		 * ******************************************************************************************
		 * ******************************************************************************************
		 */
		/*
		 * 设置表格搜索框
		 */
		public function getSearchForm($params)
		{

			$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($params) {
				$_this->setIsDisplay(1);


				//用户账号
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormText([
						'field'       => '用户账号' ,
						'value'       => input('user' , '') ,
						'name'        => 'user' ,
						'placeholder' => '' ,
					]) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);

				//用户名
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormText([
						'field'       => '用户名' ,
						'value'       => input('nickname' , '') ,
						'name'        => 'nickname' ,
						'placeholder' => '' ,
					]) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);

				//注册时间
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormDate([
						'field' => '注册时间' ,

						'value1'       => input('reg_time_begin' , '') ,
						'name1'        => 'reg_time_begin' ,
						'placeholder1' => '' ,

						'value2'       => input('reg_time_end' , '') ,
						'name2'        => 'reg_time_end' ,
						'placeholder2' => '' ,
					]) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);

				//每页显示条数
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormText([
						'field'       => '每页显示条数' ,
						'value'       => (isset($params['pagerow']) && is_numeric($params['pagerow'])) ? $params['pagerow'] : DB_LIST_ROWS ,
						'name'        => 'pagerow' ,
						'placeholder' => '' ,
					]) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);


				$roles_ = $this->logic__admin_role->getFormatedData();
				$k = $roles_;
				array_unshift($k , [
					'value' => -1 ,
					'field' => '全部' ,
				]);

				//角色
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormSelect($k , 'role_id' , '用户角色' , input('role_id' , -1)) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);


				//排序字段
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormSelect([
						[
							'value' => 'id' ,
							'field' => '默认' ,
						] ,
						[
							'value' => 'last_login_time' ,
							'field' => '最后登录时间' ,
						] ,
					] , 'order_filed' , '排序字段' , input('order_filed' , 'id')) ,
				] , ['col' => '6']);
				$doms = array_merge($doms , $t);


				//排序方向
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormRadio([
						[
							'value' => 'asc' ,
							'field' => '正序' ,
						] ,
						[
							'value' => 'desc' ,
							'field' => '反序' ,
						] ,
					] , 'order' , '排序方向' , input('order' , 'asc')) ,

				] , ['col' => '6']);
				$doms = array_merge($doms , $t);


				//表格id
				$t = integrationTags::hidden([
					'name'  => 'id' ,
					'value' => $params['id'] ,
				]);
				$doms = array_merge($doms , $t);
			});

			return $searchForm;
		}


	}