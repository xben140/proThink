<?php

	namespace app\common\logic;

	/**
	 * Class User
	 * @package app\common\logic
	 */
	class Loginlog extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * @param $uid        用户id
		 * @param $platform   前台还是后台
		 * @param $remark     备注
		 * @param $res        1登陆成功，0失败
		 *
		 * @return array
		 */
		public function addLog($uid , $platform , $remark , $res)
		{
			$data = [
				'ip'         => IP ,
				'uid'        => $uid ,
				'type'       => $platform ,
				'user_agent' => $_SERVER['HTTP_USER_AGENT'] ,
				'remark'     => $remark ,
				'res'        => $res ,
			];

			return $this->add($data);
		}


		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$join = [];
			$field = [];


			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = $this->model_::makeSelfAliasField('id');
			$order_ = 'desc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'user' :
					case 'ip' :
						$v != '' && $where['b.user'] = [
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

					case 'nickname' :
						$v != '' && $where['b.nickname'] = [
							'like' ,
							"%" . $v . "%" ,
						];
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

			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end ,
				] ,
			];

			$order[$order_filed] = $order_;

			$join[] = [
				'ithink_user b' ,
				$this->model_::makeSelfAliasField('uid') . '  = b.id ' ,
				'left' ,
			];

			$field[] = $this->model_::makeSelfAliasField('id');
			$field[] = $this->model_::makeSelfAliasField('ip');
			$field[] = $this->model_::makeSelfAliasField('remark');
			$field[] = $this->model_::makeSelfAliasField('time');
			$field[] = 'b.user,b.nickname';

			return $condition = [
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}

	}