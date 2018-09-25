<?php

	namespace app\portal\controller;

	class Area extends PortalBase
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
