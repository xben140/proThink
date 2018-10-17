<?php

	namespace app\common\logic;

	use app\common\common\set;
	use builder\elementsFactory;
	use builder\integrationTags;

	//use app\common\model\ModelBase;

	class LogicBase
	{
		use set;

		//对应表的验证器实例
		public $validate_ = null;

		//对应表的模型实例
		public $model_ = null;

		/**
		 * 每个logic里自定义
		 * @var null
		 */
		//回收站删除前置回调
		public $beforeDelete = null;
		//回收站删除后置回调
		public $afterDelete = null;


		//返回结果默认值
		public $retureResult = [
			'sign'    => RESULT_SUCCESS ,
			'message' => '' ,
			'url'     => '' ,
			'data'    => [] ,
		];

		public function initBaseClass()
		{
			//当前类名
			//$this->model_ = $this->logic__common_User;
			$this->model_ = $this->{static::makeClassName(static::class , 'model')};
			$this->validate_ = $this->{static::makeClassName(static::class , 'validate')};
		}


		/**
		 * ******************************************************************************************
		 * ******************************************************************************************
		 *                        curl基础操作
		 * ******************************************************************************************
		 * ******************************************************************************************
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
					'添加失败，请稍后再试...' ,
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
					'修改失败，请稍后再试...' ,
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
		 * @param bool       $isTurlyDelte
		 *
		 * @return array
		 */
		public function delete($param , $beforeClosureList = null , $afterClosureList = null , $isTurlyDelte = false)
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
				function(&$globalVariable) use ($isTurlyDelte) {
					$where = [
						'id' => [
							'in' ,
							explode(',' , $globalVariable['ids']) ,
						] ,
					];

					return $isTurlyDelte ? $this->model_->del($where) : $this->model_->recycle($where);
				} ,
				[] ,
				'删除失败，请稍后再试...' ,
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
				'更新失败，请稍后再试...' ,
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
		 * ******************************************************************************************
		 * ******************************************************************************************
		 *                        查询数据通用信息
		 * ******************************************************************************************
		 * ******************************************************************************************
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
		 * ******************************************************************************************
		 * ******************************************************************************************
		 *                        回收站
		 * ******************************************************************************************
		 * ******************************************************************************************
		 */

		/**
		 * 已经被删除的数据
		 * 分页获取当前表所有status为2的数据
		 *
		 * @param array $param    控制器传的参数
		 * @param null  $callback 每个数据的回调
		 *
		 * @return mixed
		 */
		public function getDeletedDataWithPagination($param = [] , $callback = null)
		{

			$condition = $this->makeCondition($param);
			$pageSize = (isset($param['pagerow']) && is_numeric($param['pagerow'])) ? $param['pagerow'] : DB_LIST_ROWS;

			$data = $this->model_->selectDeletedDataWithPagination($condition , $pageSize , [
				'var_page' => 'page' ,
				'query'    => $param ,
			]);

			(is_callable($callback)) && $data->each($callback);

			$result = $data->toArray();
			$result['pagination'] = $data->render();

			return $result;
		}


		/**
		 * 读取回收站里的数据返回表格
		 *
		 * @param $params
		 *
		 * @return mixed
		 */
		public function getDeletedTab($params)
		{
			return elementsFactory::staticTable()->make(function(&$doms , $_this) use ($params) {

				$info = $this->getInfo($params);
				//$logic = $this->{'logic__' . $info['tab_db']};
				$logic = $this->{static::makeClassName($info['tab_db'] , 'logic')};

				$data = $logic->getDeletedDataWithPagination($params);

				$searchForm = $logic->getSearchForm($params);
				$_this->setSearchForm($searchForm);

				/**
				 * 设置表格头
				 */
				$_this->setHead([
					[
						'field' => 'ID' ,
						'attr'  => 'style="width:80px;"' ,
					] ,
					[
						'field' => '信息' ,
						'attr'  => '' ,
					] ,
					[
						'field' => '删除时间' ,
						'attr'  => 'style="width:240px;"' ,
					] ,
					[
						'field' => '操作' ,
						'attr'  => 'style="width:200px;"' ,
					] ,
				]);

				/**
				 * 设置表分页按钮
				 */
				$_this->setPagination($data['pagination']);

				/**
				 * 设置js请求api
				 */
				$_this->setApi([
					'deleteUrl'   => url('delete') ,
					'setFieldUrl' => url('setField') ,
					'detailUrl'   => url('detail') ,
					'editUrl'     => url('edit') ,
					'addUrl'      => url('add') ,


					'viewInfoUrl' => url('viewInfo') ,
					'setItemUrl'  => url('setItem') ,
				]);

				foreach ($data['data'] as $k => $v)
				{
					/**
					 * 构造tr
					 */
					$t = integrationTags::tr([

						//checkbox
						integrationTags::td([
							integrationTags::tdCheckbox() ,
							integrationTags::tdSimple([
								'value' => $v['id'] ,
							]) ,
						]) ,

						//字段
						integrationTags::td((function() use ($v , $info) {
							$res = [];
							$res = array_map(function($v1) use ($v , $info) {
								$re = integrationTags::tdSimple([
									'value'    => $v[$v1] ,
									'name'     => $v1 . ' : ' ,
									//'field'    => 'name' ,
									//'reg'      => '/^\S+$/' ,
									//'msg'      => '表名字必填' ,
									'editable' => 0 ,
								]);
								$re[] = '<br />';

								return $re;
							} , explode(',' , $info['field']));

							return $res;
						})()) ,

						integrationTags::td([
							integrationTags::tdSimple([
								'name'  => '添加时间' ,
								//'editable' => '0' ,
								'value' => formatTime($v['time']) ,
							]) ,
							'<br />' ,
							integrationTags::tdSimple([
								'name'  => '删除时间' ,
								//'editable' => '0' ,
								'value' => formatTime($v['del_time']) ,
							]) ,
						]) ,


						//操作
						integrationTags::td([

							integrationTags::tdButton([
								'value'      => '详细数据' ,
								'class'      => ' btn-info btn-open-pop' ,
								'data'       => [
									'src'   => url('detailInfo') ,
									'title' => '详细数据' ,
								] ,
								'param'      => [
									'id' => $v['id'] ,
								] ,
								'is_display' => 1 ,
							]) ,

							integrationTags::tdButton([
								'is_display' => 1 ,
								'class'      => ' btn-success btn-custom-event' ,
								'data'       => [
									'callback' => 'registerSetItem' ,
									'action'   => 'recover' ,
								] ,
								'value'      => '恢复记录' ,
							]) ,

							integrationTags::tdButton([
								'is_display' => 1 ,
								'class'      => ' btn-danger btn-custom-event' ,
								'data'       => [
									'callback' => 'registerSetItem' ,
									'action'   => 'delete' ,
								] ,
								'value'      => '彻底删除' ,
							]) ,


						]) ,

					] , ['id' => $v['id']]);

					$doms = array_merge($doms , $t);
				}

			});
		}


		/**
		 * 获取每个删除表格的详细数据
		 *
		 * @param $dataId  string 用户表里数据id
		 * @param $tableId string 用户表记录id
		 *
		 * @return array
		 */
		public function getDetailInfo($dataId , $tableId)
		{
			$info = $this->getInfo(['id' => $tableId ,]);
			$logic = $this->{static::makeClassName($info['tab_db'] , 'logic')};
			$data = $logic->getInfo(['id' => $dataId ,]);

			if(($data) !== null)
			{
				$this->retureResult['data'] = $data->toArray();
				$this->retureResult['message'] = '获取成功';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = '获取失败';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}


		/**
		 * 每个表格默认搜索条件，在子logic里重写
		 *
		 * @param $params
		 *
		 * @return
		 */
		public function getSearchForm($params)
		{
			$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($params) {
				$_this->setIsDisplay(1);


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


				//排序字段
				$t = integrationTags::searchFormCol([
					integrationTags::searchFormSelect([
						[
							'value' => 'id' ,
							'field' => '默认' ,
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


		/**
		 * 删除回收站
		 *
		 * @param $ids
		 * @param $tableId
		 *
		 * @return int
		 */
		public function deleteItem($ids , $tableId)
		{
			$info = $this->getInfo(['id' => $tableId ,]);
			$logic = $this->{static::makeClassName($info['tab_db'] , 'logic')};

			return $logic->delete(['ids' => $ids ,] , $logic->beforeDelete , $logic->afterDelete , 1);
		}

		/**
		 * 恢复回收站
		 *
		 * @param $ids
		 * @param $tableId
		 *
		 * @return
		 */
		public function recoverItem($ids , $tableId)
		{
			$info = $this->getInfo(['id' => $tableId ,]);
			$logic = $this->{static::makeClassName($info['tab_db'] , 'logic')};

			return $logic->updateField([
				'field' => 'status' ,
				'val'   => '0' ,
				'ids'   => $ids ,
			]);
		}


		/**
		 * @param null $beforeDelete
		 */
		public function setBeforeDelete($beforeDelete)
		{
			$this->beforeDelete = $beforeDelete;
		}

		/**
		 * @param null $afterDelete
		 */
		public function setAfterDelete($afterDelete)
		{
			$this->afterDelete = $afterDelete;
		}


		/**
		 * ******************************************************************************************
		 * ******************************************************************************************
		 *                        用户登陆通用信息
		 * ******************************************************************************************
		 * ******************************************************************************************
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

			$res = $this->model__admin_user->updateData([
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
				$privilege = $this->logic__admin_Privilege->getActivedData([
					'order_filed' => 'order' ,
					'order'       => 'desc' ,
				]);
			}
			else
			{
				$privilege = $this->model__admin_Privilege->getPrivilegeByUserid(getAdminSessionInfo(SESSOIN_TAG_USER , 'id'))->toArray();
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
			$roles = $this->logic__admin_User->getUserRolesInfo(['id' => getAdminSessionInfo(SESSOIN_TAG_USER , 'id')]);

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
			$this->updateSession(SESSOIN_TAG_USER , $this->model__admin_user->getUserInfoByUsername($username)->toArray());
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
			session(((SESSION_TAG_ADMIN . $tag)) , $info);
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