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



	namespace app\admin\logic;
	use app\common\logic\LogicBase;


	/**
	 * Class Aera
	 * @package app\common\logic
	 */
	class Area extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		public function getAreaByPid($param)
		{
			$pid = $param['pid'];
			$data = $this->model_->getAreaByPid($pid);

			//array
			return $data->toArray();
		}

	}