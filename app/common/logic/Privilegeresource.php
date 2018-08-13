<?php

	namespace app\common\logic;

	use think\Loader;


	/**
	 * 权限映射类
	 * Class Privilegeresource
	 * @package app\common\logic
	 */
	class Privilegeresource extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 根据资源索引获取对应所有有效的资源数据
		 *
		 * @param       $index
		 * @param array $params 额外条件
		 *
		 * @return mixed
		 */
		public function getResourceByIndex($index , $params = [])
		{
			$logic = $this->{'logic__common_' . Loader::parseName(strtr(RESOURCE_MAP[$index] , ['_' => '']) , 1)};;

			return $logic->getActivedData($params);
		}


		/**
		 * 根据资源索引获取对应所有添加资源的列表页
		 *
		 * @param       $index
		 *
		 * @return mixed
		 */
		public function getAssignableResource($index)
		{
			return $this->getResourceByIndex($index , ['is_common' => '0' ,]);
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

			$order_filed = 'id';
			$order_ = 'asc';
			/*
						foreach ($param as $k => $v)
						{
							switch ($k)
							{
								case 'name' :
									$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
										'like' ,
										"%" . $v . "%" ,
									];
									break;

								case 'module' :
								case 'controller' :
								case 'action' :
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
			*/

			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}

	}