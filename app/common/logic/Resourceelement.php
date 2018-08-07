<?php

	namespace app\common\logic;


	/**
	 * 元素权限
	 * Class Privilege
	 * @package app\common\logic
	 */
	class Resourceelement extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		public function getDefaultAction()
		{
			$data = $this->model_->getDefaultAction();

			return $data->toArray();
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
									$v && $where[$this->model_::makeSelfAliasField($k)] = [
										'like' ,
										"%" . $v . "%" ,
									];
									break;

								case 'module' :
								case 'controller' :
								case 'action' :
									$v && $where[$this->model_::makeSelfAliasField($k)] = [
										'=' ,
										$v ,
									];
									break;

								case 'order_filed' :
									$v && $order_filed = $v;
									break;

								case 'order' :
									$v && $order_ = $v;
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
						}*/

			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}

	}