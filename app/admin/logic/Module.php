<?php

	namespace app\admin\logic;

	use file\FileTool;
	use think\Exception;

	class Module extends Base
	{
		public function __construct()
		{
			$this->initBaseClass();
		}


		public function dataList($param = [] , $callback = null , $isActivedOnly = false)
		{
			$modules = [];
			//F:\\localWeb\\public_local15\\public/../app/
			$dirs = scandir(APP_PATH);
			foreach ($dirs as $k => $v)
			{
				//F:\localWeb\public_local14\app\doc
				$path = replaceToSysSeparator(APP_PATH . $v);
				if(is_dir($path) && !in_array($v , [
						'.' ,
						'..' ,
					]) && !in_array($v , config('system_module')))
				{
					$modules[] = $this->getModuleInfo($v);
				}
			}

			return $modules;
		}

		public function getModuleInfo($moduleName)
		{
			//F:\localWeb\public_local14\public\..\app\blog
			$appPath = realpath(replaceToSysSeparator(APP_PATH . $moduleName));

			//F:/localWeb/public_local14/public/static/module/blog
			$staticPath = (MODEL_STATIC_PATH . $moduleName);

			//http:\\local14.cc\static\module\blog
			$staticUrl = MODEL_STATIC_URL . ($moduleName);

			$makeImgPath = function($file) use ($staticPath , $staticUrl) {
				foreach ([
							 'jpg' ,
							 'png' ,
							 'jpeg' ,
							 'gif' ,
						 ] as $k => $v)
				{
					if(is_file($staticPath . DS . 'image' . DS . $file . '.' . $v))
					{
						//http:\\local14.cc\static\module\doc\image\logo.gif
						return $staticUrl . DS . 'image' . DS . $file . '.' . $v;
					}
				}

				//http://local14.cc/upload/picture/20181009/thumb_e42e2c89e73a2cef2b2b5ea894f974da.jpg
				return generateProfilePicPath(config('default_img'));
			};

			return [
				//小图标
				'ico'        => $makeImgPath('logo') ,
				'is_install' => !($this->model__admin_privilege->where(['category' => strtolower($moduleName) ,])->count() > 0) ,
				//封面
				'cover'      => $makeImgPath('cover') ,
				//应用信息
				'info'       => include($appPath . DS . 'info.php') ,
				//应用信息
				'conf'       => include($appPath . DS . 'conf.php') ,
				//应用信息
				'menu'       => include($appPath . DS . 'menu.php') ,
				//安装sql语句
				'sql'        => include($appPath . DS . 'sql.php') ,
				//备份的数据
				//'backup'     => is_file($appPath . DS . 'data.json') ? include_once($appPath . DS . 'data.json') : '[]' ,
				'backup'     => (function($appPath){
					$path = $appPath . DS . 'database'.DS;
					$files = FileTool::listDir($path);
					$res = [];
					foreach ($files as $k => $v)
					{
						$res[] = file_get_contents($v['path']);
					}
					return $res;
				})($appPath),
			];

		}

		public function install($param)
		{

		}

		public function uninstall($param)
		{
			$info = $this->getModuleInfo($param['id']);
			$transaction = [];
			$_param = [];
			switch ($param['type'])
			{
				case 'menu' :
					//删除菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$flag && $flag = ($this->model__admin_privilege->where(['category' => strtolower($info['info']['id']) ,])->delete() !== false);

							return $flag;
						} ,
						[] ,
						'菜单信息删除出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '菜单信息删除成功';
					break;

				case 'config' :
					//删除配置
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$flag && $flag = $gid = db('config_group')->where(['name' => strtolower($info['info']['id']) ,])->value('id');
							$flag && $flag = ($this->model__admin_config->where(['group_id' => $gid ,])->delete() !== false);
							$flag && $flag = db('config_group')->where(['name' => strtolower($info['info']['id']) ,])->delete();

							return $flag !== false;
						} ,
						[] ,
						'配置信息删除出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '配置删除成功';
					break;

				case 'db' :
					//删除数据
					$transaction[] = [
						function($_param) use ($info) {
							$uninstallSql =  $info['info']['database_tables'];
							$flag = true;
							foreach ($uninstallSql as $k => $v)
							{
								$sql = 'DROP TABLE IF EXISTS '.$v;
								$flag && $flag = (executeSql($sql) !== false);
							}

							return $flag;
						} ,
						[] ,
						'数据表删除出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '数据表删除成功';
					break;
				default :
					break;
			}

			$res = execClosureList($transaction , $err , $_param);

			if($res !== false)
			{
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = $err;
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * @param $param
		 *
		 * @return array
		 */
		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$join = [];
			$field = [];


			/*
						foreach ($param as $k => $v)
						{
							switch ($k)
							{
								case 'user' :
									$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
										'=' ,
										$v ,
									];
									break;

								case 'order_filed' :
									$v != '' && $order_filed = $v;
									break;

								case 'order' :
									$v != '' && $order_ = $v;
									break;

								case 'nickname' :
									$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
										'like' ,
										"%" . $v . "%" ,
									];
									break;

								case 'reg_time_begin' :
									$v != '' && $reg_time_begin = strtotime($v);
									break;

								case 'reg_time_end' :
									$v != '' && $reg_time_end = strtotime($v);
									break;

								case 'status' :
									if($v != -1)
									{
										$where[$this->model_::makeSelfAliasField($k)] = [
											'=' ,
											$v ,
										];
									}
									break;

								case 'role_id' :
									if($v != -1)
									{
										$where['c.id'] = [
											'=' ,
											$v ,
										];
									}
									break;

								default :
									#
									break;
							}
						}*/


			$field[] = $this->model_::makeSelfAliasField('*');

			return $condition = [
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}
	}