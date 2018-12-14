<?php

	namespace app\admin\controller;

	class Oplog extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();
		}

		public function syncLog()
		{
			$this->initLogic();
			return $this->jump($this->logic->syncLog());
		}

		public function detail()
		{
			return $this->makeView($this);
		}
	}
