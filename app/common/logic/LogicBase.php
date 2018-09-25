<?php

	namespace app\common\logic;

	use app\common\common\set;

	//use app\common\model\ModelBase;

	class LogicBase
	{
		use set;

		//对应表的验证器实例
		public $validate_ = null;

		//对应表的模型实例
		public $model_ = null;

		//返回结果默认值
		public $retureResult = [
			'sign'    => RESULT_SUCCESS ,
			'message' => '' ,
			'url'     => '' ,
		];

		public function initBaseClass()
		{
			//当前类名
			//$this->model_ = $this->logic__common_User;
			$this->model_ = $this->{'model__common_' . getClassBase(static::class)};
			$this->validate_ = $this->{'validate__common_' . getClassBase(static::class)};
		}


		/**
		 *                        curl基础操作
		 */

		/**
		 * 控制器添加数据
		 *
		 * @param array $data 控制器传来的参数
		 * @param null  $beforeClosureList
		 * @param null  $afterClosureList
		 *
		 * @return array
		 */
		public function add($data , $beforeClosureList = null , $afterClosureList = null)
		{
			$validateResult = $this->validate_->scene('add')->check($data);

			if($validateResult)
			{
				//TODO 执行前置钩子，根据结果处理
				$globalVariable = $data;
				$globalVariable['_id'] = null;
				$closureList = [];

				//添加前置回调
				(is_array($beforeClosureList)) && $closureList = $beforeClosureList;

				//处理方法
				$closureList[] = [
					function(&$globalVariable) {
						$res = $this->model_->insertData($globalVariable);
						($res) && $globalVariable['_id'] = $this->model_->getData('id');

						return $res;
					} ,
					[] ,
					'添加失败，请稍后再试...',
				];

				//添加后置回调
				(is_array($afterClosureList)) && $closureList = array_merge($closureList , $afterClosureList);

				$res = execClosureList($closureList , $err , $globalVariable);

				if($res !== false && (((int)$globalVariable['_id']) > 0))
				{
					$this->retureResult['message'] = '添加成功';
					$this->retureResult['sign'] = RESULT_SUCCESS;
				}
				else
				{
					$msg = $err ? $err : $this->model_->getError();
					$this->retureResult['message'] = $msg;
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
		 * 控制器编辑数据
		 *
		 * @param array      $param 控制器传来的参数
		 * @param int|string $id    要更新的id
		 * @param null       $beforeClosureList
		 * @param null       $afterClosureList
		 *
		 * @return array
		 */
		public function edit($param , $id , $beforeClosureList = null , $afterClosureList = null)
		{
			$validateResult = $this->validate_->scene('edit')->check($param);

			if($validateResult)
			{
				//TODO 执行前置钩子，根据结果处理
				$globalVariable = $param;
				$closureList = [];

				//添加前置回调
				if(is_array($beforeClosureList))
				{
					$closureList = $beforeClosureList;
				}

				//处理方法
				$closureList[] = [
					function(&$globalVariable) use ($id) {
						$where = [
							'id' => [
								'in' ,
								$id ,
							] ,
						];

						return $this->model_->updateData($globalVariable , $where);
					} ,
					[] ,
					'修改失败，请稍后再试...',
				];

				//添加后置回调
				if(is_array($afterClosureList))
				{
					$closureList = array_merge($closureList , $afterClosureList);
				}

				$res = execClosureList($closureList , $err , $globalVariable);

				if(($res) !== false)
				{
					$this->retureResult['message'] = '修改成功';
					$this->retureResult['sign'] = RESULT_SUCCESS;
				}
				else
				{
					$msg = $err ? $err : $this->model_->getError();
					$this->retureResult['message'] = $msg;
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
		 * 软删除用户
		 *
		 * @param            $param
		 * @param null       $beforeClosureList
		 * @param null       $afterClosureList
		 *
		 * @return array
		 */
		public function delete($param , $beforeClosureList = null , $afterClosureList = null)
		{
			//TODO 执行前置钩子，根据结果决定是否删除
			//TODO 把删除语句加入闭包队列中最后一个都通过才删除
			//TODO 或者在执行删除语句之前执行一个前置方法，通过才删除
			$globalVariable = $param;
			$closureList = [];

			//添加前置回调
			if(is_array($beforeClosureList))
			{
				$closureList = $beforeClosureList;
			}

			//处理方法
			$closureList[] = [
				function(&$globalVariable) {
					$where = [
						'id' => [
							'in' ,
							explode(',' , $globalVariable['ids']) ,
						] ,
					];

					return $this->model_->recycle($where);
				} ,
				[] ,
				'删除失败，请稍后再试...',
			];

			//添加后置回调
			if(is_array($afterClosureList))
			{
				$closureList = array_merge($closureList , $afterClosureList);
			}

			$res = execClosureList($closureList , $err , $globalVariable);

			if(($res) !== false)
			{
				$this->retureResult['message'] = '删除成功';
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
		 * @param      $param
		 * @param null $beforeClosureList
		 * @param null $afterClosureList
		 *
		 * @return array
		 */
		public function updateField($param , $beforeClosureList = null , $afterClosureList = null)
		{
			//ids:4
			//val:0
			//field:is_pending

			//TODO 执行前置钩子，根据结果处理
			$globalVariable = $param;
			$closureList = [];

			//添加前置回调
			if(is_array($beforeClosureList))
			{
				$closureList = $beforeClosureList;
			}

			//处理方法
			$closureList[] = [
				function(&$globalVariable) {
					$data = [
						$globalVariable['field'] => $globalVariable['val'] ,
					];

					$where = [
						'id' => [
							'in' ,
							explode(',' , $globalVariable['ids']) ,
						] ,
					];

					return $this->model_->updateField($data , $where);
				} ,
				[] ,
				'更新失败，请稍后再试...',
			];

			//添加后置回调
			if(is_array($afterClosureList))
			{
				$closureList = array_merge($closureList , $afterClosureList);
			}

			$res = execClosureList($closureList , $err , $globalVariable);

			if(($res) !== false)
			{
				$this->retureResult['message'] = '更新成功';
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
		 *                        查询数据通用信息
		 */


		/**
		 * 按id获取单条数据
		 * 状态不为2的数据
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getInfo($param)
		{
			$data = $this->model_->getRowById($param['id']);

			return $data;
		}


		/**
		 * 不带分页的查询
		 *
		 * @param array $param         控制器传的参数
		 * @param null  $callback      每个数据的回调
		 * @param bool  $isActivedOnly 是否只取status为1的值
		 *
		 * @return mixed
		 */
		public function dataList($param = [] , $callback = null , $isActivedOnly = false)
		{
			$condition = $this->makeCondition($param);
			$isActivedOnly && $this->model_->getActivedOnly();

			$data = $this->model_->selectData($condition);
			(is_callable($callback)) && $data->each($callback);

			return $data->toArray();
		}


		/**
		 * 带分页的查询
		 *
		 * @param array $param         控制器传的参数
		 * @param null  $callback      每个数据的回调
		 * @param bool  $isActivedOnly 是否只取status为1的值
		 *
		 * @return mixed
		 */
		public function dataListWithPagination($param , $callback = null , $isActivedOnly = false)
		{

			$condition = $this->makeCondition($param);
			$isActivedOnly && $this->model_->getActivedOnly();

			$pageSize = (isset($param['pagerow']) && is_numeric($param['pagerow'])) ? $param['pagerow'] : DB_LIST_ROWS;

			$data = $this->model_->selectDataWithPagination($condition , $pageSize , [
				'var_page' => 'page' ,
				'query'    => $param ,
			]);

			(is_callable($callback)) && $data->each($callback);

			$result = $data->toArray();
			$result['pagination'] = $data->render();

			return $result;
		}


		/**
		 * 不分页获取当前表所有status为1的数据
		 *
		 * @param array $param    控制器传的参数
		 * @param null  $callback 每个数据的回调
		 *
		 * @return mixed
		 */
		public function getActivedData($param = [] , $callback = null)
		{
			$data = $this->dataList($param , $callback , 1);

			return $data;
		}

		/**
		 * 分页获取当前表所有status为1的数据
		 *
		 * @param array $param    控制器传的参数
		 * @param null  $callback 每个数据的回调
		 *
		 * @return mixed
		 */
		public function getActivedDataWithPagination($param = [] , $callback = null)
		{
			$data = $this->dataListWithPagination($param , $callback , 1);

			return $data;
		}


		/**
		 *                        用户登陆通用信息
		 */

		/**
		 * 登陆成功后更新用户信息
		 * @return mixed
		 */
		public function updateUserInfo()
		{
			$info = getAdminSessionInfo(SESSOIN_TAG_USER);
			$where = [
				'user' => [
					'=' ,
					$info['user'] ,
				] ,
			];

			$res = $this->model__user->updateData([
				'last_login_ip'   => IP ,
				'last_login_time' => TIME_NOW ,
				'login_count'     => $info['login_count'] + 1 ,
			] , $where);

			return $res;
		}


		/**
		 * 用户菜单信息写到session
		 * @return mixed
		 */
		public function initPrivilege()
		{
			if(isGlobalManager())
			{
				//如果id是admin的，直接查所有权限
				$privilege = $this->logic__common_Privilegeresource->getResourceByIndex(RESOURCE_INDEX_MENU , [
					'order_filed' => 'order' ,
					'order'       => 'desc' ,
				]);
			}
			else
			{
				$privilege = $this->model__common_Privilegeresource->getMenusByUserId(getAdminSessionInfo(SESSOIN_TAG_USER , 'id'))->toArray();
			}

			$privilege = makeTree($privilege);
			$this->updateSession(SESSOIN_TAG_PRIVILEGES , $privilege);
		}

		/**
		 * 用户角色信息写到session，分别是rolesId，rolesName和roles
		 * @return mixed
		 */
		public function initRole()
		{
			$roles = $this->logic__common_User->getUserRolesInfo(['id' => getAdminSessionInfo(SESSOIN_TAG_USER , 'id')]);

			$this->updateSession(SESSOIN_TAG_ROLE , $roles);

			$this->updateSession(SESSOIN_TAG_ROLE_NAME , array_map(function($v) {
				return $v['name'];
			} , $roles));

			$this->updateSession(SESSOIN_TAG_ROLE_IDS , array_map(function($v) {
				return $v['id'];
			} , $roles));
		}

		/**
		 * 根据用户名更新用户信息session
		 *
		 * @param $username
		 *
		 * @return mixed
		 */
		public function updateSessionByUsername($username)
		{
			$this->updateSession(SESSOIN_TAG_USER , $this->model__common_user->getUserInfoByUsername($username)->toArray());
		}

		/**
		 * 根据tag写入数据到session
		 *
		 * @param string $tag  用户信息，权限信息等等。。。
		 * @param mixed  $info 对应的值
		 *
		 * @return mixed
		 */
		public function updateSession($tag , $info)
		{
			session(((SESSION_TAG_ADMIN . $tag) ), $info);
		}


		/**
		 * 根据tag读出session
		 *
		 * @param string $tag 用户信息，权限信息等等。。。
		 *
		 * @return mixed
		 */
		public function getSessionInfo($tag)
		{
			return session(((SESSION_TAG_ADMIN . $tag)));
		}


	}