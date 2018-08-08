<?php

	namespace app\admin\controller;

	class Area extends AdminBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		public function getAreaByPid()
		{
			$this->initLogic();
			$data = $this->logic->getAreaByPid($this->param);

			return json($data);
		}
	}
