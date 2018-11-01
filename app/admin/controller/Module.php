<?php

	namespace app\admin\controller;

	use zip\phpZip;

	class Module extends PermissionAuth
	{
		/**
		 * @throws \Exception
		 */
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

		/**
		 *
		 */
		public function setDefault()
		{

		}

		/**
		 * 安装包列表
		 * @return mixed
		 */
		public function packageList()
		{
			return $this->makeView($this);
		}

		/**
		 * 删除包
		 * @throws \Exception
		 */
		public function delPackage()
		{
			$this->initLogic();
			$this->jump($this->logic->delPackage($this->param));
		}

		/**
		 *
		 */
		public function downloadPackage()
		{
			$this->initLogic();
			downloadFile($this->logic->getModulePathInfo($this->param['id'])['packagePath'] , $this->param['id'] . '.zip');
		}

		/**
		 * 备份包
		 * @throws \Exception
		 */
		public function backup()
		{
			$this->initLogic();
			$this->jump($this->logic->backup($this->param));
		}

		/**
		 * 解压包到应用文件夹
		 * @throws \Exception
		 */
		public function apply()
		{
			$this->initLogic();
			$this->jump($this->logic->apply($this->param));
		}

		public function uploadPackage()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadFile('file' , function($result) {
					$file = $result['dirname'].DS.$result['savename'];
					$info = pathinfo($file);
					$res =  phpZip::unzip([
						'zip'         => $file ,
						'destination' => PATH_TEMP ,
					]);
					$tmpHashPath = PATH_TEMP . $info['filename'];


					return $result;
				}, PATH_TEMP, function($fileName){
					return md5($fileName).'.zip';
				});

				return json($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

	}