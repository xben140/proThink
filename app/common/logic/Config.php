<?php

	namespace app\common\logic;


	/**
	 * 菜单权限
	 * Class Privilege
	 * @package app\common\logic
	 */
	class Config extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 有效的配置转为数组，可直接给config调
		 *
		 * @return array
		 */
		public function getAvailableConfig()
		{
			$data = $this->model_->getAvailableConfig()->toArray();
			$data = array_map(function($v) {
				$val = '';

				switch ($v['type'])
				{
					case '1' :
						#array
						$t = explode("\n", $v['value']);
						$tmpArr = [];
						foreach ($t as $k1 => $v1)
						{
							$t1 = explode('-----', $v1);
							$tmpArr[$t1[0]] = $t1[1];
						}
						$val = $tmpArr;
						break;

					case '2' :
						#text
						$val = $v['value'];
						break;

					default :
						#...
						break;
				}

				return [
					'field' => $v['key'] ,
					'value' => $val ,
				];
			} , $data);

			return $data;
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

					case 'key' :
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

					case 'group_id' :
					case 'type' :
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


			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}

	}