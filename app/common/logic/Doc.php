<?php

	namespace app\common\logic;


	class Doc extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * @param $hash
		 *
		 * @return mixed
		 */
		public function fileExistsByHash($hash)
		{
			return $this->model_->isFileExists('hash' , $hash);
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
			$join = [];
			$field = [];

			$start_p = 0;
			$end_p = 50;

			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = 'id';
			$order_ = 'asc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'title' :
					case 'author' :
					case 'journal_name' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'nickname' :
						$v != '' && $where['b.nickname'] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'a' :
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

					case 'year' :
					case 'month' :
					case 'doc_type' :
					case 'journal_type' :
					case 'doc_status' :
					case 'is_pending' :
					case 'is_confirm' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;


					case 'start_p' :
						$v != '' && $start_p = (floatval($v));
						break;

					case 'end_p' :
						$v != '' && $end_p = floatval($v);
						break;

					case 'reg_time_begin' :
						$v != '' && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v != '' && $reg_time_end = strtotime($v);
						break;


					default :
						#...
						break;
				}
			}


			$order[$order_filed] = $order_;


			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end ,
				] ,
			];

			$where[$this->model_::makeSelfAliasField('page')] = [
				'between' ,
				[
					$start_p ,
					$end_p ,
				] ,
			];

			$join[] = [
				'ithink_user b ' ,
				$this->model_::makeSelfAliasField('uid') . '  = b.id ' ,
				'left' ,
			];

			$join[] = [
				'ithink_address address ' ,
				$this->model_::makeSelfAliasField('address_id') . '  = address.id' ,
				'left' ,
			];

			$join[] = [
				'ithink_area prov ' ,
				'address.province_id = prov.id ' ,
				'left' ,
			];

			$join[] = [
				'ithink_area county ' ,
				'address.county_id = county.id ' ,
				'left' ,
			];

			$join[] = [
				'ithink_area city ' ,
				'address.city_id = city.id ' ,
				'left' ,
			];


			$field[] = $this->model_::makeSelfAliasField('*');
			$field[] = 'b.nickname ';
			$field[] = 'prov.area_name prov_name';
			$field[] = 'city.area_name city_name';
			$field[] = 'county.area_name county_name';
			$field[] = ' address.address';
			$field[] = ' address.name contacts';
			$field[] = ' address.tel';


			return $condition = [
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}

	}