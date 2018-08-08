<?php

	namespace app\common\logic;


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