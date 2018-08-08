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
				//'ip'     => IP,
				'uid'        => $uid ,
				'type'       => $platform ,
				'user_agent' => $_SERVER['HTTP_USER_AGENT'] ,
				'remark'     => $remark ,
				'res'        => $res ,
			];

			return $this->add($data);
		}

	}