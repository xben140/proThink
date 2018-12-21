<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\common\logic;


	class Config extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 有效的配置转为数组，可直接给config调
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
						$val = preg_split('/[\r\n]/im' , $v['value'] , -1 , PREG_SPLIT_NO_EMPTY);
						break;
					case '2' :
						#text
					case '5' :
						#image
						$val = $v['value'];
						break;
					case '3' :
						#switch
						$val = !!$v['value'];
						break;
					case '4' :
						#option
						$t = self::makeOptionsVal($v);
						$val = $t['options'][$t['selected']];
						break;
					default :
						#...
						break;
				}

				return [
					'is_const' => $v['is_const'] ,
					'field'    => $v['key'] ,
					'value'    => $val ,
				];
			} , $data);

			return $data;
		}


		/**
		 * 针对option键值的处理
		 *
		 * @param $v
		 *
		 * @return array
		 */
		public static function makeOptionsVal($v)
		{
			$selected = null;
			$t = preg_split('/[\r\n]/im' , $v['value'] , -1 , PREG_SPLIT_NO_EMPTY);
			$options = [];

			foreach ($t as $k => $v1)
			{
				if(preg_match('/!!--!!$/im' , $v1))
				{
					$selected = $k;
				}
				$options[$k] = preg_replace('/!!--!!$/im' , '' , $v1);
			}

			(is_null($selected)) && ($selected = isset($t[0]) ? 0 : "");
			!isset($options[0]) && ($options[0] = null);
			!$selected && ($selected = 0);

			return [
				'options'  => $options ,
				'selected' => $selected ,
			];
		}


		/**
		 * 获取所有类型为options的key
		 *    没有使用
		 * @return array
		 */
		public function getOptionsKey()
		{
			$data = $this->model_->getOptionsKey();

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
					case 'is_const' :
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