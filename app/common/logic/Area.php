<?php

	namespace app\common\logic;


	/**
	 * Class Aera
	 * @package app\common\logic
	 */
	class Area extends LogicBase
	{

		public function getAreaByPid($pid)
		{
			$data = $this->model_->getAreaByPid($pid);

			//array
			return $data->toArray();
		}

	}