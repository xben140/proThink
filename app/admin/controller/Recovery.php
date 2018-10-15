<?php

	namespace app\admin\controller;

	class Recovery extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * 查看每个表的数据
		 */
		public function viewInfo()
		{
			return $this->makeView($this);
		}


		/**
		 * 每个表数据的详细信息
		 */
		public function detailInfo()
		{
			return $this->makeView($this);
		}


		/**
		 * 彻底删除数据
		 * 恢复数据
		 */
		public function setItem()
		{
			$this->initLogic();
			$tableId = session(SESSION_TAG_ADMIN . 'tab_id');
			$res = [];

			switch ($this->param['type'])
			{
				case 'recover' :
					$res = $this->logic->recoverItem($this->param['ids'] , $tableId);
					break;
				case 'delete' :
					$res = $this->logic->deleteItem($this->param['ids'] , $tableId);
					break;
				default :
					#...
					break;
			}

			return $this->jump($res);

		}

	}
