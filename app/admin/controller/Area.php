<?php

	namespace app\admin\controller;

	class Area extends FrontendBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		//pid=1
		public function getAreaByPid()
		{
			$this->initLogic();
			$data = $this->logic->getAreaByPid($this->param);

			return json($data);
		}
	}
