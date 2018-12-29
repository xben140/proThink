<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\admin\controller;

	use file\FileTool;
	use zip\phpZip;

	class Module extends BackendBase
	{
		/**
		 * @throws \Exception
		 */
		public function _initialize()
		{
			parent::_initialize();
		}


		/***
		 * *********************************************************************
		 * *********************************************************************
		 *                应用管理
		 * *********************************************************************
		 * *********************************************************************
		 */


		/**
		 * 安装与卸载
		 * @return mixed
		 * @throws \ReflectionException
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
		 * 设置应用为默认应用
		 * @throws \Exception
		 */
		public function setDefault()
		{
			$this->initLogic();
			$this->jump($this->logic->setDefault($this->param));
		}

		/***
		 * *********************************************************************
		 * *********************************************************************
		 *                包管理
		 * *********************************************************************
		 * *********************************************************************
		 */


		/**
		 * 安装包列表
		 * @return mixed
		 * @throws \ReflectionException
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
		 *    下载安装包
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
		 * 上传包文件
		 * @return mixed|\think\response\Json
		 * @throws \LogicException
		 * @throws \RuntimeException
		 * @throws \ReflectionException
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



		/***
		 * *********************************************************************
		 * *********************************************************************
		 *                数据表功能
		 * *********************************************************************
		 * *********************************************************************
		 */


		/**
		 * 数据表各种功能
		 * @throws \Exception
		 */
		public function dbOperation()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$action = $this->param['option'];
				switch (($action))
				{
					//优化
					case 'optimizeDb' :
					//修复
					case 'restoreDb' :
					//备份数据
					case 'backupData' :
					//恢复备份数据
					case 'recoverData' :
					//删除备份数据
					case 'deleteData' :
						$res = $this->logic->{$action}($this->param);
						break;
					default :
						$res['message'] = '操作出错，请重试';
						$res['sign'] = RESULT_ERROR;
				}
				$this->jump($res);
			}
		}

		/**
		 * 备份sql文件列表
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function dbBackupList()
		{
			return $this->makeView($this);
		}

		/**
		 * 数据表管理
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function dbList()
		{
			return $this->makeView($this);
		}

		/**
		 *    下载sql文件
		 */
		public function downloadSql()
		{
			$this->initLogic();
			$sqlFile = (PATH_DATABASE_BACKUP . base64_decode($this->param['id']));
			downloadFile($sqlFile , base64_decode($this->param['id']));
		}

		/***
		 * *********************************************************************
		 * *********************************************************************
		 *                基础功能
		 * *********************************************************************
		 * *********************************************************************
		 */


		/**
		 * 开发者功能，生成菜单，配置文件
		 * @return mixed
		 * @throws \Exception
		 */
		public function devTool()
		{
			$this->initLogic();
			$action = $this->param['option'];
			switch (strtolower($action))
			{
				case 'menu' :
				case 'conf' :
				case 'sql' :
					$res = $this->logic->{$action}($this->param);
					break;
				default :
					$res['message'] = '安装出错，请重试';
					$res['sign'] = RESULT_ERROR;
			}
			$this->jump($res);
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function baseFunc()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$action = $this->param['option'];
				switch (($action))
				{
					case 'test_email' :
					case 'clear_cache' :
						$res = $this->logic->{$action}($this->param);
						break;
					default :
						$res['message'] = '操作出错，请重试';
						$res['sign'] = RESULT_ERROR;
				}
				$this->jump($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function appGenerator()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$action = $this->param['option'];
				switch (($action))
				{
					case 'appGeneratorCode' :
					case 'appGeneratorFramework' :
						$res = $this->logic->{$action}($this->param);
						break;
					default :
						$res['message'] = '操作出错，请重试';
						$res['sign'] = RESULT_ERROR;
				}
				$this->jump($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

	}