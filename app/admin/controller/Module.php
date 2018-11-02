<?php

	namespace app\admin\controller;

	use file\FileTool;
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
		 * 开发者功能，生成菜单，配置文件
		 * @return mixed
		 */
		public function devTool()
		{
			$this->initLogic();
			$action = $this->param['option'];
			switch (strtolower($action))
			{
				case 'menu' :
				case 'conf' :
					$res = $this->logic->{$action}($this->param);
					break;
				default :
					$res['message'] = '安装出错，请重试';
					$res['sign'] = RESULT_ERROR;
			}
			$this->jump($res);
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

		/**
		 * 上传包文件
		 * @return mixed|\think\response\Json
		 * @throws \LogicException
		 * @throws \RuntimeException
		 */
		public function uploadPackage()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadFile('file' , function($result) {

					//F:\localWeb\public_local14\public\temp\5478e7dc73b0cdaf11b79528ec20e647.zip
					$file = replaceToSysSeparator($result['dirname'] . DS . $result['savename']);
					$info = pathinfo($file);
					//上传临时文件夹后解压
					$res = phpZip::unzip([
						'zip'         => $file ,
						'destination' => PATH_TEMP ,
					]);

					//F:\localWeb\public_local14\public\temp\5478e7dc73b0cdaf11b79528ec20e647
					$tmpHashPath = PATH_TEMP . $info['filename'];

					$data = FileTool::listDir($tmpHashPath . DS . 'app' , function($v , $info) {
						return $v['name'];
					} , FileTool::DIRECTORY);

					//blog
					$id = $data[0];

					//F:\localWeb\public_local14\public\backup\blog\backup
					$targetPath = replaceToSysSeparator(PATH_BACKUP . $id . '/backup');

					//F:\localWeb\public_local14\public\temp\5478e7dc73b0cdaf11b79528ec20e647
					//F:\localWeb\public_local14\public\backup\blog
					$res = FileTool::recursiveMv(replaceToSysSeparator($tmpHashPath) , replaceToSysSeparator($targetPath) , function($info , $relativePath) {
						return true;
					});

					//F:\localWeb\public_local14\public\temp\5478e7dc73b0cdaf11b79528ec20e647.zip
					//F:\localWeb\public_local14\public\backup\blog.zip
					$res['sign'] && $res = FileTool::Mv(replaceToSysSeparator($file) , replaceToSysSeparator($targetPath . '.zip') , function($info , $relativePath) {
						return true;
					});


					return $result;
				} , PATH_TEMP , function($fileName) {
					return md5($fileName) . '.zip';
				});

				return json($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

	}