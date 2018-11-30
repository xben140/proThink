<?php

	namespace app\admin\controller;

	class Area extends FrontendBase
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();
		}

		//pid=1
		public function getAreaByPid()
		{
			$data = $this->logic->getAreaByPid($this->param);

			return json($data);
		}
	}
