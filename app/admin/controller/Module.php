<?php

	namespace app\admin\controller;

	class Module extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * 安装与卸载
		 * @return mixed
		 */
		public function operation()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$action = session(URL_MODULE . 'action');
				$res = $this->logic->retureResult;

				$this->param['id'] = $id;
				$this->param['action'] = $action;

				switch (strtolower($action))
				{
					case 'install' :
					case 'uninstall' :
						$res = $this->logic->{$action}($this->param);
					break;
					default :
						$res['message'] = '安装出错，请重试';
						$res['sign'] = RESULT_SUCCESS;
				}

				$this->jump($res);
			}
			else
			{
				return $this->makeView($this , 'install');
			}
		}

		public function setDefault()
		{

		}

		public function backup()
		{

		}
	}