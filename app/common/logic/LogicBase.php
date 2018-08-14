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
		 * 控制器添加数据
		 *
		 * @param array $data 控制器传来的参数
		 *
		 * @return array
		 */
		public function add($data)
		{
			$validateResult = $this->validate_->scene('add')->check($data);

			if($validateResult)
			{
				$id = $this->model_->insertData($data);
				if(is_int($id))
				{
					$this->retureResult['message'] = '添加成功';
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
		 * 控制器编辑数据
		 *
		 * @param array      $param 控制器传来的参数
		 * @param int|string $id    要更新的id
		 *
		 * @return array
		 */
		public function edit($param , $id)
		{
			$validateResult = $this->validate_->scene('edit')->check($param);

			if($validateResult)
			{
				$where = [
					'id' => [
						'=' ,
						$id ,
					] ,
				];

				$res = $this->model_->updateData($param , $where);

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
		 * 软删除用户
		 *
		 * @param            $param
		 * @param null|array $closureList
		 *
		 * @return array
		 */
		public function delete($param , $closureList = null)
		{
			//TODO 执行前置钩子，根据结果决定是否删除
			//TODO 把删除语句加入闭包队列中最后一个都通过才删除
			//TODO 或者在执行删除语句之前执行一个前置方法，通过才删除

			$closureList[] = [
				function() use ($param) {
					$where = [
						'id' => [
							'in' ,
							explode(',' , $param['ids']) ,
						] ,
					];

					return $this->model_->recycle($where);
				} ,
			];

			$res = execClosureList($closureList , $err);

			if(($res) !== false)
			{
				$this->retureResult['message'] = '删除成功';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = $err ? $err : $this->model_->getError();
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}


		/**
		 * @param      $param
		 * @param null $closureList
		 *
		 * @return array
		 */
		public function updateField($param , $closureList = null)
		{
			//TODO 执行前置钩子，根据结果处理
			$closureList[] = [
				function() use ($param) {
					$data = [
						$param['field'] => $param['val'] ,
					];

					$where = [
						'id' => [
							'in' ,
							explode(',' , $param['ids']) ,
						] ,
					];

					return $this->model_->updateField($data , $where);
				} ,
			];

			$res = execClosureList($closureList , $err);

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


	}