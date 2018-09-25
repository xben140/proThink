<?php

	namespace app\common\logic;


	/**
	 * 菜单权限
	 * Class Privilege
	 * @package app\common\logic
	 */
	class Address extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
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

								case 'uid' :
									$where[$this->model_::makeSelfAliasField('user_id')] = [
										'=' ,
										$v ,
									];
									break;

								default :
									#...
									break;
							}
						}
			*/

			$order[$order_filed] = $order_;


			$field = $this->model_::makeSelfAliasField('*') . ' ,
					    prov.area_name prov_name,
						city.area_name city_name,
						county.area_name county_name 
						';

			$join = [
				[
					'ithink_area prov ' ,
					$this->model_::makeSelfAliasField('province_id') . '  = prov.id ' ,
					'left' ,
				] ,
				[
					'ithink_area county ' ,
					$this->model_::makeSelfAliasField('county_id') . '  = county.id ' ,
					'left' ,
				] ,
				[
					'ithink_area city ' ,
					$this->model_::makeSelfAliasField('city_id') . '  = city.id ' ,
					'left' ,
				] ,
			];


			return $condition = [
				'where' => $where ,
				'join'  => $join ,
				'order' => $order ,
				'field' => $field ,
			];
		}

	}