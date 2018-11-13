<?php

	namespace app\admin\logic;

	use db\Db;
	use file\FileTool;
	use think\Exception;
	use zip\phpZip;

	class Module extends Base
	{
		/**
		 * Module constructor.
		 */
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    应用管理
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		/**
		 * 模块列表
		 *
		 * @param array $param
		 * @param null  $callback
		 * @param bool  $isActivedOnly
		 *
		 * @return array|mixed
		 */
		public function dataList($param = [] , $callback = null , $isActivedOnly = false)
		{
			$modules = [];

			$res = FileTool::listDir(APP_PATH , function($v) use (&$modules) {
				(!in_array($v['name'] , config('system_module'))) && ($modules[] = $this->getModuleInfo($v['name']));
			} , FileTool::DIRECTORY);

			return $modules;
		}

		/**
		 * 安装的方法
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function install($param)
		{
			$info = $this->getModuleInfo($param['id']);
			$transaction = [];
			$_param = [];
			switch ($param['type'])
			{
				case 'menu' :
					//菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$menu = $info['menu'];

							//安装之前先卸载
							$this->model__admin_privilege->where(['category' => strtolower($info['info']['id']) ,])->delete();

							function recusiveParse($menu , $moduleId , callable $callback , $level = 0)
							{
								static $pid;
								$pid[0] = 0;

								foreach ($menu as $k => $v)
								{
									$data = $v;
									if(isset($data['son'])) unset($data['son']);
									if(isset($data['id'])) unset($data['id']);
									if(isset($data['pid'])) unset($data['pid']);
									if(isset($data['path'])) unset($data['path']);
									if(isset($data['level'])) unset($data['level']);

									$data['category'] = $moduleId;
									$data['pid'] = $pid[$level];
									$id = call_user_func_array($callback , [$data]);
									$pid[$level + 1] = $id;
									recusiveParse($v['son'] , $moduleId , $callback , $level + 1);
								}
							}

							recusiveParse($menu , $info['info']['id'] , function($data) {
								return $this->model__admin_privilege->insertGetId($data);
							});

							return $flag;
						} ,
						[] ,
						'菜单信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '菜单信息安装成功';
					$res = execClosureList($transaction , $err , $_param);

					break;

				case 'route' :
					//菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$route = $info['route'];

							//安装之前先卸载
							db('route')->where(['name' => strtolower($info['info']['id']) ,])->delete();
							//路由写入表
							$flag = db('route')->insertGetId([
								'name'  => $info['info']['id'] ,
								'route' => json_encode($route) ,
							]);

							return $flag !== false;
						} ,
						[] ,
						'路由信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '路由信息安装成功';
					$res = execClosureList($transaction , $err , $_param);

					break;

				case 'config' :
					//配置
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$config = $info['conf'];

							//安装之前先卸载
							$flag && $flag = $gid = db('config_group')->where(['name' => strtolower($info['info']['id']) ,])->value('id');
							$flag && $flag = ($this->model__admin_config->where(['group_id' => $gid ,])->delete() !== false);
							$flag && $flag = db('config_group')->where(['name' => strtolower($info['info']['id']) ,])->delete();

							$id = db('configGroup')->insertGetId([
								'name'   => $info['info']['id'] ,
								'status' => 1 ,
							]);

							$configModel = $this->model__common_config;
							$val = '';
							$data = [];
							foreach ($config as $k => $v)
							{
								switch ($v['type'])
								{
									case '1' :
										#array
										$val = implode("\r\n" , $v['value']);
										break;
									case '2' :
										#text
									case '5' :
										#image
										$val = $v['value'];
										break;
									case '3' :
										#switch
										$val = !!$v['value'];
										break;
									case '4' :
										#option
										isset($v['selected']) && ($v['value'][$v['selected']] .= '!!--!!');
										$val = implode("\r\n" , $v['value']);
										break;
									default :
										#...
										break;
								}
								$data[] = [
									'type'     => $v['type'] ,
									'name'     => $v['name'] ,
									'key'      => $v['key'] ,
									'value'    => $val ,
									'is_const' => isset($v['is_const']) ? (int)$v['is_const'] : '0' ,
									'group_id' => $id ,
									'status'   => 1 ,
									'time'     => TIME_NOW ,
								];
							}

							$flag = ($configModel->insertAll($data));

							return $flag !== 0;
						} ,
						[] ,
						'配置信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '配置安装成功';
					$res = execClosureList($transaction , $err , $_param);

					break;

				case 'db' :
					//数据
					$this->retureResult['message'] = '数据表安装成功';

					//基础sql配置
					$installSql = $info['sql']['install'];
					$sqls = Db::parseSql($installSql);
					$flag = true;
					foreach ($sqls as $k => $sql)
					{
						$flag && $flag = Db::exec($sql , function($sql , &$err) {
							return (querySql($sql) !== false);
						} , $err);

						if(!$flag)
						{
							break;
						}
					}

					//备份的数据sql
					$dataSql = implode("\r\n" , $info['backup']);
					$sqls = Db::parseSql($dataSql);
					foreach ($sqls as $k => $sql)
					{
						$flag && $flag = Db::exec($sql , function($sql , &$err) {
							return (querySql($sql) !== false);
						} , $err);

						if(!$flag)
						{
							break;
						}
					}

					$res = $flag;
					break;
				default :
					break;
			}


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
		 * 卸载方法
		 *
		 * @param $param
		 *
		 * @return array
		 */
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

							$flag && $flag = $this->logic__common_config->model_->updateField([
								'status' => '0' ,
							] , [
								'key' => [
									'in' ,
									'default_module,default_controller,default_action,' ,
								] ,
							]);

							return $flag;
						} ,
						[] ,
						'菜单信息删除出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '菜单信息删除成功';
					break;

				case 'route' :
					//菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$route = $info['route'];
							$flag = db('route')->where(['name' => strtolower($info['info']['id']) ,])->delete();

							return $flag !== false;
						} ,
						[] ,
						'路由信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '路由信息安装成功';
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
							$uninstallSql = $info['info']['database_tables'];
							$flag = true;
							foreach ($uninstallSql as $k => $v)
							{
								$sql = 'DROP TABLE IF EXISTS `' . $v . '`;';

								$flag && $flag = Db::exec($sql , function($sql , &$err) {
									return (executeSql($sql) !== false);
								} , $err);
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
		 * 删除应用
		 *
		 * @param      $param
		 * @param null $beforeClosureList
		 * @param null $afterClosureList
		 * @param bool $isTurlyDelte
		 *
		 * @return array
		 */
		public function delete($param , $beforeClosureList = null , $afterClosureList = null , $isTurlyDelte = false)
		{
			$moduleName = $param['ids'];

			$info = $this->getModuleInfo($moduleName);

			if($info['is_install'] != 1)
			{
				$pathInfo = $this->getModulePathInfo($moduleName);
				if(FileTool::isWritable($pathInfo['appPath']) && FileTool::isWritable($pathInfo['staticPath']))
				{
					$res = FileTool::recursiveRm($pathInfo['appPath'] , function($info , $relativePath) {
						return true;
					});

					$res['sign'] && $res = FileTool::recursiveRm($pathInfo['staticPath'] , function($info , $relativePath) {
						return true;
					});

					if($res['sign'])
					{
						$this->retureResult['message'] = '删除成功 ';
						$this->retureResult['sign'] = RESULT_SUCCESS;
					}
					else
					{
						$this->retureResult['message'] = $res['msg'];
						$this->retureResult['sign'] = RESULT_ERROR;
					}
				}
				else
				{
					$this->retureResult['message'] = '应用文件夹没有写权限，请检查';
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = '应用处于安装状态，无法删除';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 开发者生成配置文件 config.json
		 *
		 * @param $param
		 *
		 * @return array
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function conf($param)
		{
			$info = $this->getModuleInfo($param['id']);
			$infoPath = $this->getModulePathInfo($param['id']);
			$configs = [];
			$flag = true;
			$flag && $flag = $gid = db('config_group')->where(['name' => strtolower($info['info']['id']) ,])->value('id');

			if($flag)
			{
				$configs = $this->model__admin_config->where(['group_id' => $gid ,])->select();
				$result = [];
				foreach ($configs as $k => $v)
				{
					$val = [
						'is_const' => $v['is_const'] ,
						'type'     => $v['type'] ,
						'name'     => $v['name'] ,
						'key'      => $v['key'] ,
					];

					switch ($v['type'])
					{
						case '1' :
							#array
							$val['value'] = explode("\r\n" , $v['value']);
							break;
						case '2' :
							#text
						case '5' :
							#image
							$val['value'] = $v['value'];
							break;
						case '3' :
							#switch
							$val['value'] = (int)(!!$v['value']);
							break;
						case '4' :
							#option
							$temp = $this->logic__common_config->makeOptionsVal($v);
							$val['value'] = $temp['options'];
							$val['selected'] = $temp['selected'];
							break;
						default :
							#...
							break;
					}
					$result[] = $val;
				}
				$infoFile = $infoPath['appPath'] . DS . MODULE_FILE_CONFIG;
				try
				{
					file_put_contents($infoFile , json_encode($result));
					$this->retureResult['message'] = '配置文件已生成 ' . $infoFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (Exception $e)
				{
					$this->retureResult['message'] = '写入配置出错，检查文件夹是否可写 -- ' . $infoFile;
					$this->retureResult['sign'] = RESULT_ERROR;
				}

			}
			else
			{
				$this->retureResult['message'] = 'config_group 表里必须有一条 name字段的值为应用的id的记录，详细请参阅开发手册';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 开发者生成菜单 menu.json
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function menu($param)
		{
			$info = $this->getModuleInfo($param['id']);
			$infoPath = $this->getModulePathInfo($param['id']);

			$data = $this->model__admin_privilege->selectData([
				'where' => [
					'category' => [
						'=' ,
						$info['info']['id'] ,
					] ,
				] ,
				'field' => 'name,module,controller,action,order,remark,is_menu,id,pid' ,
			]);;

			if(!$data->isEmpty())
			{
				$result = makeTree($data);
				$result = \app\common\tool\permission\Auth::getInstance()::makeMenuTree($result);
				$flag = true;
				$menuFile = $infoPath['appPath'] . DS . MODULE_FILE_MENU;
				try
				{
					file_put_contents($menuFile , json_encode($result));
					$this->retureResult['message'] = '菜单文件文件已生成 ' . $menuFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (Exception $e)
				{
					$this->retureResult['message'] = '写入菜单出错，检查文件夹是否可写 -- ' . $menuFile;
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = '请确保当前应用已经添加菜单记录，即数据库里 ithink_privilege 表里有 category 字段值为 ' . $info['info']['id'] . '的记录';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 生成安装sql文件 sql.json
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function sql($param)
		{
			$info = $this->getModuleInfo($param['id']);
			$infoPath = $this->getModulePathInfo($param['id']);

			//获取表对应应用所拥有的表
			$tables = $info['info']['database_tables'];
			$flag = true;
			$err = null;
			$installSqls = [];
			foreach ($tables as $k => $v)
			{
				if($flag)
				{
					//显示表结构的sql
					$createTableSql = 'SHOW CREATE TABLE  ' . $v;
					$flag = Db::exec($createTableSql , function($sql , &$err) use (&$installSqls , $v) {
						$res = null;
						if($res = querySql($sql))
						{
							$installSqls[] = '-- start of table ' . $v . "";
							//先删除表
							$installSqls[] = 'DROP TABLE IF EXISTS `' . $v . "`;";
							//表结构
							$installSqls[] = $res[0]['Create Table'] . ";";

							//构造插入数据sql
							$installSqls[] = (function($v) {
								$data = \think\Db::table($v)->select()->toArray();
								$insertSql = \think\Db::table($v)->fetchSql(1)->insertAll($data);

								return is_string($insertSql) ? ($insertSql) : "\r\n";
							})($v);
							$installSqls[] = '-- end of table ' . $v;

							$installSqls[] = "\r\n\r\n";
						}

						return $res;
					} , $err);
				}
				else
				{
					break;
				}
			}

			if(!$err)
			{
				$sql = [
					'install' => implode("\r\n" , $installSqls) ,
				];
				$sqlFile = $infoPath['appPath'] . DS . MODULE_FILE_SQL;
				try
				{
					file_put_contents($sqlFile , json_encode($sql));
					$this->retureResult['message'] = 'sql文件文件已生成 ' . $sqlFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (Exception $e)
				{
					$this->retureResult['message'] = '写入sql文件出错，检查文件夹是否可写 -- ' . $sqlFile;
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = $err;
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 模块设置为默认模块
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function setDefault($param)
		{
			$info = $this->getModuleInfo($param['id']);

			$route = explode('/' , strtr($info['info']['default_action'] , [
				'\\' => '/' ,
			]));

			$flag = $this->logic__common_config->model_->updateField([
				'value' => $route[0] ,
			] , [
				'key' => 'default_module' ,
			]);
			$flag && $flag = $this->logic__common_config->model_->updateField([
				'value' => $route[1] ,
			] , [
				'key' => 'default_controller' ,
			]);
			$flag && $flag = $this->logic__common_config->model_->updateField([
				'value' => $route[2] ,
			] , [
				'key' => 'default_action' ,
			]);
			$flag && $flag = $this->logic__common_config->model_->updateField([
				'status' => '1' ,
			] , [
				'key' => [
					'in' ,
					'default_module,default_controller,default_action,' ,
				] ,
			]);

			if($flag)
			{
				$this->retureResult['message'] = '更新成功';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = '更新失败';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 传入应用id，获取应用全部相关信息
		 *
		 * @param $moduleName
		 *
		 * @return array
		 */
		public function getModuleInfo($moduleName)
		{
			$pathInfo = $this->getModulePathInfo($moduleName);
			//F:\localWeb\public_local14\public\..\app\blog
			$appPath = $pathInfo['appPath'];

			//F:/localWeb/public_local14/public/static/module/blog
			$staticPath = $pathInfo['staticPath'];
			//http:\\local14.cc\static\module\blog
			$staticUrl = $pathInfo['staticUrl'];

			//F:\localWeb\public_local14\public\blog
			$backupPath = $pathInfo['backupPath'];
			//http://local14.cc/blog
			$backupUrl = $pathInfo['backupUrl'];

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

			$info = [
				'ico'         => '' ,
				'is_install'  => 3 ,
				'cover'       => '' ,
				'info'        => [] ,
				'conf'        => [] ,
				'menu'        => [] ,
				'sql'         => [] ,
				'backup'      => '' ,
				'is_complete' => 1 ,
				'error'       => [] ,
				'route'       => [] ,
			];

			try
			{
				$field = [
					'id' ,
					'name' ,
					'title' ,
					'version' ,
					'description' ,
					'default_action' ,
					'update_time' ,
					'database_tables' ,
				];
				$infoFile = $appPath . DS . MODULE_FILE_INFO;
				if(is_file($infoFile))
				{
					//应用信息
					$info['info'] = json_decode(file_get_contents($infoFile) , 1);
					if(!is_array($info['info']))
					{
						$info['error'][] = MODULE_FILE_INFO . '必须返回数组';
						$info['is_complete'] = 0;
						$info['info'] = [];
						$info['info']['id'] = $moduleName;
					}
					else
					{

						foreach ($field as $k => $v)
						{
							if(!isset($info['info'][$v]))
							{
								$info['error'][] = MODULE_FILE_INFO . " 缺少 {$v} 字段";
								$info['is_complete'] = 0;
							}
						}

						if(!is_array($info['info']['database_tables']))
						{
							$info['error'][] = 'database_tables 必须为数组';
							$info['is_complete'] = 0;
						}
					}
				}
				else
				{
					$info['info'] = [];
					$info['info']['id'] = $moduleName;
				}

			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				//配置信息
				$info['conf'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_CONFIG) , 1);;

				if(!is_array($info['conf']))
				{
					$info['error'][] = MODULE_FILE_CONFIG . '必须返回数组';
					$info['is_complete'] = 0;
				}
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				//应用路由信息
				$routeFile = $appPath . DS . MODULE_FILE_ROUTE;
				if(is_file($routeFile))
				{
					$info['route'] = include_once $routeFile;

					if(!is_array($info['conf']))
					{
						$info['error'][] = MODULE_FILE_ROUTE . '必须返回数组';
						$info['is_complete'] = 0;
					}
				}

			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				//菜单信息
				$info['menu'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_MENU) , 1);;

				if(!is_array($info['menu']))
				{
					$info['error'][] = MODULE_FILE_MENU . '必须返回数组';
					$info['is_complete'] = 0;
				}
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				//安装sql语句
				$info['sql'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_SQL) , 1);;

				if(!is_array($info['sql']) || !isset($info['sql']['install']))
				{
					$info['error'][] = MODULE_FILE_SQL . '必须返回数组格式，并且必须有键为 install 的值存在';
					$info['is_complete'] = 0;
				}
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				$info['ico'] = $makeImgPath('logo');
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				$info['cover'] = $makeImgPath('cover');
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				//安装sql语句
				$info['backup'] = (function($appPath) {
					$path = $appPath . DS . 'database' . DS;
					$res = [];
					if(is_dir($path))
					{
						$res = FileTool::listDir($path , function($v) {
							return file_get_contents($v['path']);
						});
					}

					return $res;
				})($appPath);

			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				$info['is_install'] = (function($infoFormFile) use ($info) {
					$status = null;
					if(!$info['is_complete'])
					{
						$status = $this->model_::$appStatusMap[3]['value'];
					}
					else
					{
						$hasPrivileges = ($this->model__admin_privilege->where(['category' => strtolower($infoFormFile['id']) ,])->count() > 0);
						$tablesStatus = [];
						foreach ($infoFormFile['database_tables'] as $k => $v)
						{
							$sql = "SHOW TABLES LIKE '%{$v}%'";
							$tablesStatus[] = (count(querySql($sql)) > 0);
						}

						//如果有安装菜单权限，并且每个应用表都存在 -- 已安装
						if($hasPrivileges && !in_array(false , $tablesStatus))
						{
							$status = $this->model_::$appStatusMap[1]['value'];
						}
						//如果没有安装菜单权限，并且应用表个数大于0，并且一个也表也没有 -- 未安装
						elseif(!$hasPrivileges && (count($tablesStatus) > 0) && !in_array(true , $tablesStatus))
						{
							$status = $this->model_::$appStatusMap[0]['value'];
						}
						//应用信息残缺，要重新安装
						else
						{
							$status = $this->model_::$appStatusMap[2]['value'];
						}
					}

					return $status;
				})(json_decode(file_get_contents($appPath . DS . MODULE_FILE_INFO) , 1));
			} catch (Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			return $info;

		}



		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    包管理
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		/**
		 * 备份包
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function backup($param)
		{
			$moduleName = $param['id'];

			$pathInfo = $this->getModulePathInfo($moduleName);
			//F:\localWeb\public_local14\public\..\app\blog
			$appPath = $pathInfo['appPath'];

			//F:/localWeb/public_local14/public/static/module/blog
			$staticPath = $pathInfo['staticPath'];
			//http:\\local14.cc\static\module\blog
			$staticUrl = $pathInfo['staticUrl'];

			//F:\localWeb\public_local14\public\blog
			$backupPath = $pathInfo['backupPath'];
			//http://local14.cc/blog
			$backupUrl = $pathInfo['backupUrl'];


			FileTool::mkdir_($backupPath);
			if(FileTool::isDirAvailable($backupPath))
			{
				$dirs = [];
				//构造应用资源路径
				FileTool::itreatorDFS($appPath , function($info , $relativePath) use (&$dirs) {
					$dirs[] = [
						'name' => strtr($info->getPathname() , [replaceToSysSeparator(ROOT_PATH) => '' ,]) ,
						'path' => $info->getPathname() ,
					];

					return true;
				} , function($info , $relativePath) use (&$flag) {

				});

				//构造静态资源路径
				FileTool::itreatorDFS($staticPath , function($info , $relativePath) use (&$dirs) {
					$dirs[] = [
						'name' => strtr($info->getPathname() , [replaceToSysSeparator(ROOT_PATH) => '' ,]) ,
						'path' => $info->getPathname() ,
					];

					return true;
				} , function($info , $relativePath) use (&$flag) {

				});

				$res = phpZip::zip([
					//保存文件名字
					'file_name'     => replaceToSysSeparator($backupPath . DS . 'backup.zip') ,
					//'file_name'    => 'test.zip',
					//是否覆盖同名zip
					'is_overwrite'  => '1' ,

					//指定文件夹，可递归
					'dir_path'      => [] ,

					//正则过滤文件
					'skip_file_reg' => [//'#readme.txt#' ,
					] ,

					//正则过滤文件夹
					'skip_dir_reg'  => [//'#ima(?=ge)#',
					] ,

					//具体文件路径
					'file_path'     => [
						//独立文件压缩路径
						//'save_path' => '/a/b' ,
						'file_path' => $dirs ,
					] ,
				]);


				if(($res) !== false)
				{
					$this->unzipToCode($moduleName);
					$this->retureResult['message'] = '备份成功 ';
					$this->retureResult['sign'] = RESULT_SUCCESS;
				}
				else
				{
					$this->retureResult['message'] = '备份失败，请稍后重试...';
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = $backupUrl . ' 文件夹不可写，请检查权限';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 获取安装包列表
		 * @return array
		 */
		public function packageList()
		{
			$data = [];
			$data = FileTool::listDir(PATH_BACKUP , function($v , $info) {
				$res = [
					'is_available' => 1 ,
					'info'         => [] ,
					'error'        => [] ,
				];
				$id = $v['name'];
				$appPath = $v['path'] . '\backup\app' . DS . $id . DS;

				foreach ([
							 MODULE_FILE_CONFIG ,
							 MODULE_FILE_INFO ,
							 MODULE_FILE_MENU ,
							 MODULE_FILE_SQL ,
						 ] as $k => $v1)
				{
					if(!is_file(replaceToSysSeparator($appPath . $v1)))
					{
						$res['is_available'] = 0;
						$res['error'][] = '缺少文件' . $v1;
					}
				}

				$res['is_available'] && $res['info'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_INFO) , 1);

				return $res;
			} , FileTool::DIRECTORY);

			return $data;
		}

		/**
		 * 删除包文件
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function delPackage($param)
		{
			$moduleName = $param['id'];
			$pathInfo = $this->getModulePathInfo($moduleName);
			$res = FileTool::recursiveRm($pathInfo['backupPath'] , function($info , $relativePath) {
				return true;
			});

			if($res['sign'])
			{
				$this->retureResult['message'] = '删除成功 ';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = $res['msg'];
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 部署应用
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function apply($param)
		{
			$moduleName = $param['id'];
			$pathInfo = $this->getModulePathInfo($moduleName);

			if(!is_dir($pathInfo['appPath']))
			{
				$res = FileTool::recursiveCp($pathInfo['codePath'] . DS . 'app' , ROOT_PATH . DS . 'app' , function($info , $relativePath) {
					return true;
				});

				$res['sign'] && $res = FileTool::recursiveCp($pathInfo['codePath'] . DS . 'public' , ROOT_PATH . DS . 'public' , function($info , $relativePath) {
					return true;
				});

				if($res['sign'])
				{
					$this->retureResult['message'] = '部署成功';
					$this->retureResult['sign'] = RESULT_SUCCESS;
				}
				else
				{
					$this->retureResult['message'] = $res['msg'];
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = '此应用已经存在，如果需要重新部署，请先删除应用';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 指定包解压到相邻文件夹
		 * 上传包和备份包后调用
		 *
		 * @param $moduleName
		 *
		 * @return array
		 */
		public function unzipToCode($moduleName)
		{
			$pathInfo = $this->getModulePathInfo($moduleName);
			$backupPath = $pathInfo['packagePath'];
			$codePath = $pathInfo['backupPath'];

			return phpZip::unzip([
				'zip'         => $backupPath ,
				'destination' => $codePath ,
			]);
		}

		/**
		 * 获取包信息
		 *
		 * @param $moduleName
		 */
		public function getPackageInfo($moduleName)
		{
			$pathInfo = $this->getModulePathInfo($moduleName);
			//F:\localWeb\public_local14\public\..\app\blog
			$appPath = $pathInfo['appPath'];

			//F:/localWeb/public_local14/public/static/module/blog
			$staticPath = $pathInfo['staticPath'];
			//http:\\local14.cc\static\module\blog
			$staticUrl = $pathInfo['staticUrl'];

			//F:\localWeb\public_local14\public\blog
			$backupPath = $pathInfo['backupPath'];
			//http://local14.cc/blog
			$backupUrl = $pathInfo['backupUrl'];
		}





		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    其他
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		/** *
		 * @param $moduleName
		 *
		 * @return array
		 */

		public function getModulePathInfo($moduleName)
		{
			$data = [
				//F:\localWeb\public_local14\app\blog
				'appPath'     => realpath(replaceToSysSeparator(APP_PATH . $moduleName)) ,

				//F:\localWeb\public_local14\public\static\module\blog
				'staticPath'  => replaceToSysSeparator(MODEL_STATIC_PATH . $moduleName) ,
				//http://local14.cc/static/module/blog
				'staticUrl'   => replaceToUrlSeparator(MODEL_STATIC_URL . ($moduleName)) ,

				//F:\localWeb\public_local14\public\backup\blog
				'backupPath'  => replaceToSysSeparator(PATH_BACKUP . $moduleName) ,
				//http://local14.cc/backup/blog
				'backupUrl'   => replaceToUrlSeparator(URL_BACKUP . $moduleName) ,


				//F:\localWeb\public_local14\public\backup\blog\backup.zip
				'packagePath' => replaceToSysSeparator(PATH_BACKUP . $moduleName) . DS . 'backup.zip' ,
				//http://local14.cc/backup/blog/backup.zip
				'packageUrl'  => replaceToUrlSeparator(URL_BACKUP . $moduleName) . '/backup.zip' ,


				//F:\localWeb\public_local14\public\backup\blog\code
				'codePath'    => replaceToSysSeparator(PATH_BACKUP . $moduleName) . DS . 'backup' ,
				//http://local14.cc/backup/blog/code
				'codeUrl'     => replaceToUrlSeparator(URL_BACKUP . $moduleName) . '/backup' ,
			];

			return $data;
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