<?php

	namespace app\blog\logic;


	class Blogtag extends Base
	{

		public function __construct()
		{
			$this->initBaseClass();
		}

		public function getFormatedData($isPushDefault = 0)
		{
			$tags = $this->getActivedData();

			$tags = array_map(function($v) {
				return [
					'value' => $v['id'] ,
					'field' => $v['name'] ,
				];
			} , $tags);

			$isPushDefault && array_unshift($tags , [
				'value' => 0 ,
				'field' => '请选择' ,
			]);

			return $tags;
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

								case 'is_common' :
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
						}*/


			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}

	}