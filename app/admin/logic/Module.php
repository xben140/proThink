<?php

	/*
	+---------------------------------------------------------------------+
	| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
	+---------------------------------------------------------------------+
	| Official site | http://www.ithinkphp.org/                           |
	+---------------------------------------------------------------------+
	| Author        | hello wf585858@yeah.net                             |
	+---------------------------------------------------------------------+
	| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
	+---------------------------------------------------------------------+
	| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
	+---------------------------------------------------------------------+
	*/


	namespace app\admin\logic;

	use db\Db;
	use file\FileTool;
	use think\Cache;
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
			$pathInfo = $this->getModulePathInfo($param['id']);

			$transaction = [];
			$_param = [];
			$err = null;
			switch ($param['type'])
			{
				case 'apply' :
					//代码从backup文件夹复制到app
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
							$res = 1;
							$this->retureResult['message'] = '应用文件部署成功，位于 app 目录下的 ' . $info['info']['id'] . '文件夹';
						}
						else
						{
							$res = false;
							$err = $res['msg'];
						}
					}
					else
					{
						$res = false;
						$err = '此应用已经存在，如需重新部署，请先到应用列表删除应用';
					}
					break;

				case 'menu' :
					//菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$menu = $info['menu'];


							//安装之前先卸载
							$this->model__admin_privilege->where(['category' => strtolower($info['info']['id']) ,])->delete();

							static::recusiveParse($menu , $info['info']['id'] , function($data) {
								return $this->model__admin_privilege->insertGetId($data);
							});

							return $flag;
						} ,
						[] ,
						'菜单信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '菜单配置写入成功，位于 ithinkphp_privilege 表中 字段category，值为 ' . $info['info']['id'] . ' 的记录';
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
					$this->retureResult['message'] = '路由配置写入成功，位于 ithinkphp_route 表中 字段name，值为 ' . $info['info']['id'] . ' 的记录';

					$res = execClosureList($transaction , $err , $_param);

					break;

				case 'recovery' :
					//回收表
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$recovery = $info['recovery'];

							//安装之前先卸载
							db('recovery')->where(['category' => strtolower($info['info']['id']) ,])->delete();
							foreach ($recovery as $k => $v)
							{
								//回收表
								$v['category'] = $info['info']['id'];
								$flag && $flag = db('recovery')->insertGetId($v);
							}

							return $flag !== false;
						} ,
						[] ,
						'回收信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '回收配置写入成功，位于 ithinkphp_rcovery 表中 字段 category，值为 ' . $info['info']['id'] . ' 的记录';

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
								'remark' => '' ,
								'status' => 1 ,
							]);

							$configModel = $this->model__admin_config;
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
									'remark'   => '' ,
									'status'   => 1 ,
									'time'     => TIME_NOW ,
								];
							}

							$flag = ($configModel->insertAll($data));

							return $flag !== 0;
						} ,
						[] ,
						'配置数据安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '设置配置写入成功，位于 ithinkphp_config 表中 分组为 ' . $info['info']['id'] . ' 的记录';

					$res = execClosureList($transaction , $err , $_param);

					break;

				case 'db' :
					//数据
					$flag = true;

					//基础sql配置
					$installSql = $info['sql']['install'];
					$sqls = Db::parseSql($installSql);
					$flag = execSqlBySqlArray($sqls , $err);

					//备份的数据sql
					$dataSql = implode("\r\n" , $info['backup']);
					$sqls = Db::parseSql($dataSql);
					$flag = execSqlBySqlArray($sqls , $err);

					$this->retureResult['message'] = '数据表安装成功';
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

				case 'apply' :
					$pathInfo = $this->getModulePathInfo($param['id']);
					$flag = true;
					if($flag && is_dir($pathInfo['appPath']) && !FileTool::isWritable($pathInfo['appPath']))
					{
						$flag = false;
						$this->retureResult['message'] = $pathInfo['appPath'] . '</ br>目录权限不足不能删除';
					}

					if($flag && is_dir($pathInfo['staticPath']) && !FileTool::isWritable($pathInfo['staticPath']))
					{
						$flag = false;
						$this->retureResult['message'] = $pathInfo['staticPath'] . '</ br>目录权限不足不能删除';
					}

					if($flag)
					{
						$res = FileTool::recursiveRm($pathInfo['appPath'] , function($info , $relativePath) {
							return true;
						});

						$res['sign'] && $res = FileTool::recursiveRm($pathInfo['staticPath'] , function($info , $relativePath) {
							return true;
						});

						if($res['sign'])
						{
							$this->retureResult['message'] = '应用文件删除成功 ';
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
						$this->retureResult['sign'] = RESULT_ERROR;
					}

					break;

				case 'menu' :
					//删除菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$flag && $flag = ($this->model__admin_privilege->where(['category' => strtolower($info['info']['id']) ,])->delete() !== false);

							$flag && $flag = $this->logic__admin_config->model_->updateField([
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
					$this->retureResult['message'] = '路由配置删除成功';
					break;

				case 'recovery' :
					//菜单
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$recovery = $info['recovery'];
							$flag = db('recovery')->where(['category' => strtolower($info['info']['id']) ,])->delete();

							return $flag !== false;
						} ,
						[] ,
						'回收信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '回收配置删除成功';
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
					$this->retureResult['message'] = '设置信息删除成功';
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
						'remark'   => $v['remark'] ,
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
							$temp = $this->logic__admin_config->makeOptionsVal($v);
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
					$this->retureResult['message'] = '配置文件已生成  <br /> ' . $infoFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (\Exception $e)
				{
					$this->retureResult['message'] = $e->getMessage() . ' <br /> 写入配置出错，检查文件夹是否可写 <br /> ' . $infoFile;
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
				'field' => 'ico,name,module,controller,action,order,remark,is_menu,id,pid' ,
			]);;

			if(!$data->isEmpty())
			{
				$result = makeTree($data);
				$result = \auth\permission\Auth::getInstance()::makeMenuTree($result);
				$flag = true;
				$menuFile = $infoPath['appPath'] . DS . MODULE_FILE_MENU;
				try
				{
					file_put_contents($menuFile , json_encode($result));
					$this->retureResult['message'] = '菜单文件文件已生成  <br /> ' . $menuFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (\Exception $e)
				{
					$this->retureResult['message'] = $e->getMessage() . ' <br /> 写入菜单出错，检查文件夹是否可写 <br /> ' . $menuFile;
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = '请确保当前应用已经添加菜单记录，即数据库里 ithinkphp_privilege 表里有 category 字段值为 ' . $info['info']['id'] . '的记录';
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
				$installSqls = array_merge($installSqls , makeSqlByTableName($v , $err));
			}

			if(!$err)
			{
				$sql = [
					'install' => implode("\r\n" , $installSqls) ,
				];
				$sqlFile = $infoPath['appPath'] . DS . MODULE_FILE_SQL;
				try
				{
					file_put_contents($sqlFile . '.sql' , implode("\r\n" , $sql));
					file_put_contents($sqlFile , json_encode($sql));
					$this->retureResult['message'] = 'sql文件文件已生成 <br /> ' . $sqlFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (\Exception $e)
				{
					$this->retureResult['message'] = $e->getMessage() . ' <br /> 写入sql文件出错，检查文件夹是否可写 <br /> ' . $sqlFile;
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

			$flag = $this->logic__admin_config->model_->updateField([
				'value' => $route[0] ,
			] , [
				'key' => 'default_module' ,
			]);
			$flag && $flag = $this->logic__admin_config->model_->updateField([
				'value' => $route[1] ,
			] , [
				'key' => 'default_controller' ,
			]);
			$flag && $flag = $this->logic__admin_config->model_->updateField([
				'value' => $route[2] ,
			] , [
				'key' => 'default_action' ,
			]);
			$flag && $flag = $this->logic__admin_config->model_->updateField([
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
				//安装状态 0-信息残缺，需重新安装 1-已安装
				'is_install'  => 0 ,
				//封面图路径
				'cover'       => '' ,
				//logo图片位置
				'ico'         => '' ,
				//info.json 里的数据
				'info'        => [] ,
				//config.json 里的数据
				'conf'        => [] ,
				//menu.json 里的数据
				'menu'        => [] ,
				//sql.json 里的数据
				'sql'         => [] ,
				//database  文件夹里的数据
				'backup'      => '' ,
				//报错信息，信息残缺时显示
				'error'       => [] ,
				//route.php 里的配置
				'route'       => [] ,
				//recovery.php 里的配置
				'recovery'    => [] ,
				//
				'is_complete' => 1 ,
			];

			//应用信息
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
					$info['info'] = json_decode(file_get_contents($infoFile) , 1);
					if(!is_array($info['info']))
					{
						$info['error'][] = MODULE_FILE_INFO . '必须返回合法的 json ，格式参考开发手册';
						$info['is_complete'] = 0;
						$info['info'] = [];
						$info['info']['id'] = $moduleName;
					}
					else
					{
						!isset($info['info']['is_deving']) && ($info['info']['is_deving'] = 0);
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
					$info['error'][] = '缺少 ' . MODULE_FILE_INFO . '文件';
					$info['is_complete'] = 0;
				}
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//配置信息
			try
			{
				$info['conf'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_CONFIG) , 1);;

				if(!is_array($info['conf']))
				{
					$info['error'][] = MODULE_FILE_CONFIG . '必须是合法json';
					$info['is_complete'] = 0;
				}
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//应用路由信息
			try
			{
				$routeFile = $appPath . DS . MODULE_FILE_ROUTE;
				if(is_file($routeFile))
				{
					$info['route'] = include_once $routeFile;

					if(!is_array($info['route']))
					{
						$info['error'][] = MODULE_FILE_ROUTE . '必须返回数组';
						$info['is_complete'] = 0;
					}
				}

			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//应用回收信息
			try
			{
				$recoveryFile = $appPath . DS . MODULE_FILE_RECOVERY;
				if(is_file($recoveryFile))
				{
					$info['recovery'] = include_once $recoveryFile;

					if(!is_array($info['recovery']))
					{
						$info['error'][] = MODULE_FILE_RECOVERY . '必须返回数组';
						$info['is_complete'] = 0;
					}
				}

			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//菜单信息
			try
			{
				$info['menu'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_MENU) , 1);;

				if(!is_array($info['menu']))
				{
					$info['error'][] = MODULE_FILE_MENU . '必须返回合法json';
					$info['is_complete'] = 0;
				}
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//安装sql语句
			try
			{
				$info['sql'] = json_decode(file_get_contents($appPath . DS . MODULE_FILE_SQL) , 1);;

				if(!is_array($info['sql']) || !isset($info['sql']['install']))
				{
					$info['error'][] = MODULE_FILE_SQL . '必须返回合法json，并且必须有键为 install 的项存在';
					$info['is_complete'] = 0;
				}
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//logo文件，放置于应用静态资源 image目录下，名为logo.png即可,运行格式为 png，jpg，jpeg，gif
			//没有此文会自动引用系统默认占位图
			//E:\localweb\public_local2\public\static\module\admin\image
			try
			{
				$info['ico'] = $makeImgPath('logo');
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//封面图
			//封面图文件，放置于应用静态资源 image目录下，名为cover.png即可,运行格式为 png，jpg，jpeg，gif
			//没有此文会自动引用系统默认占位图
			//E:\localweb\public_local2\public\static\module\admin\image
			try
			{
				$info['cover'] = $makeImgPath('cover');
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			//附加sql语句
			//位于应用的database文件夹下
			//会扫描里面所有文件
			//通常用不上
			//E:\localweb\public_local2\app\ccc\database
			try
			{
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

			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			try
			{
				(function($infoFormFile) use (&$info) {
					$info['is_install'] = 1;
					$status = null;
					$tablesStatus = [];

					//菜单表有没有对应id的记录
					$hasPrivileges = ($this->model__admin_privilege->where(['category' => strtolower($infoFormFile['id']) ,])->count() > 0);
					if(!$hasPrivileges)
					{
						$info['error'][] = '应用没有添加菜单，前往 菜单管理 中添加';
						$info['is_install'] = 0;
					}


					//config_group表里有没有分组为 id 的记录
					$hasConfig = ($this->model__admin_Configgroup->where(['name' => strtolower($infoFormFile['id']) ,])->count() > 0);
					if(!$hasConfig)
					{
						$info['error'][] = '在 配置列表 -> 配置分组 中添加一个组名为此应用 ID 的记录';
						$info['is_install'] = 0;
					}

					/*
						//路由表里有没有 name 为 id 的记录
						$hasRoute = (db('route')->where(['name' => strtolower($infoFormFile['id']) ,])->count() > 0);
						if(!$hasConfig)
						{
							$info['error'][] = '在 配置列表 > 配置分组 中添加一个组名为此应用 ID 的记录';
							$info['is_install'] = 0;
						}
					*/


					//info.json 里 database_tables 每个表是不是都在数据库有存在
					foreach ($infoFormFile['database_tables'] as $k => $v)
					{
						$sql = "SHOW TABLES LIKE '%{$v}%'";
						$tablesStatus[] = (count(querySql($sql)) > 0);
					}
					if(in_array(false , $tablesStatus))
					{
						$info['error'][] = '数据库缺少 info.json 中 database_tables 指定的表，请确认每个表都已被创建';
						$info['is_install'] = 0;
					}

					//config_group 表里有对应配置分组
					//info.json database_tables 每个应用表都存在
					//privilege 表有对应记录
					//rout 表有对应记录
					// -- 已安装
					if($hasPrivileges && $hasConfig //&& $hasRoute
						&& !in_array(false , $tablesStatus))
					{
						$info['is_install'] = (int)$this->model_::$appStatusMap[1]['value'];
					}
					//应用信息残缺，要重新安装
					else
					{
						$info['is_install'] = (int)$this->model_::$appStatusMap[0]['value'];
					}

				})(json_decode(file_get_contents($appPath . DS . MODULE_FILE_INFO) , 1));
			} catch (\Exception $e)
			{
				$info['error'][] = $e->getMessage();
				$info['is_complete'] = 0;
			}

			return $info;

		}

		/**
		 * 生成应用骨架
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function appGeneratorFramework($param)
		{
			$flag = true;
			$msg = '';
			if($flag && !preg_match('#^[a-z][a-z\d]*$#i' , $param['id']))
			{
				$flag = false;
				$msg = '应用ID格式不合法';
			}

			if($flag && !preg_match('#^\S+$#i' , $param['name']))
			{
				$flag = false;
				$msg = '应用名称必填';
			}

			$flag && $gid = $this->model__admin_configgroup->insertGetId([
				'name'   => $param['id'] ,
				'remark' => $param['id'] . ' 应用的配置分组' ,
				'time'   => TIME_NOW ,
				'status' => '1' ,
			]);

			$flag && $this->model__admin_config->insertGetId([
				'name'     => $param['id'] ,
				'key'      => $param['id'] . '.themes' ,
				'value'    => 'default' ,
				'type'     => '4' ,
				'group_id' => $gid ,
				'remark'   => '前台模板设置' ,
				'time'     => TIME_NOW ,
				'status'   => '1' ,
			]);

			$modulePathInfo = $this->getModulePathInfo($param['id']);
			!isset($param['is_cover']) && ($param['is_cover'] = 0);

			if($flag)
			{
				$fileConfig = [
					//控制器
					[
						//后台基类控制器
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\controller\BackendBase.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__controller_backend_base.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__' => $param['id'] ,
						] ,
					] ,
					[
						//前台基类控制器
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\controller\FrontendBase.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__controller_frontend_base.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__' => $param['id'] ,
						] ,
					] ,
					[
						//前台通用控制器
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\controller\Index.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__controller_frontend.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__'              => $param['id'] ,
							'____CONTEOLLER_NAME__' => 'Index' ,
						] ,
					] ,

					//模型
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\model\Base.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__model_base.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__' => $param['id'] ,
						] ,
					] ,

					//logic 基类
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\logic\Base.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__logic_base.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__' => $param['id'] ,
						] ,
					] ,

					//validate 基类
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\validate\Base.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__validate_base.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							'____ID__' => $param['id'] ,
						] ,
					] ,
					//回收站配置 文件
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\recovery.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__recovery.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//路由配置 文件
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\route.php') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__route.php')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//info.json
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\info.json') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__info.json')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [
							"____ID__"          => $param['id'] ,
							"____AUTHOR__"      => $param['author'] ,
							"____NAME__"        => $param['name'] ,
							"____DESCRIPTION__" => $param['description'] ,
							"____PAGE_URL__"    => $param['page_url'] ,
							"____TIME__"        => TIME_NOW ,
						] ,
					] ,

					//menu.json
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\menu.json') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__menu.json')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//config.json
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\config.json') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__config.json')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//sql.json
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\sql.json') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__sql.json')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//composer.json
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\composer.json') ,
						'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__composer.json')) ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,


					//common.php
					[
						'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\common.php') ,
						'content'     => "<?php \r\n//自定义函数文件\r\n" ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//custom.css
					[
						'path'        => replaceToSysSeparator($modulePathInfo['staticPath'] . '\css\custom.css') ,
						'content'     => "" ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//custom.js
					[
						'path'        => replaceToSysSeparator($modulePathInfo['staticPath'] . '\js\custom.js') ,
						'content'     => "" ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//image
					[
						'path'        => replaceToSysSeparator($modulePathInfo['staticPath'] . '\image\\') ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,

					//template
					[
						'path'        => replaceToSysSeparator($modulePathInfo['staticPath'] . '\template\default\\') ,
						'is_cover'    => $param['is_cover'] ,
						'replacement' => [] ,
					] ,


				];

				$flag = static::writeFile($fileConfig , $msg);
			}

			if($flag)
			{
				$this->retureResult['sign'] = RESULT_SUCCESS;
				$this->retureResult['message'] = implode('' , [
					'生成成功 </br>' ,
					'应用目录 : ' . $modulePathInfo['appPath'] . ' </br>' ,
					'资源目录 : ' . $modulePathInfo['staticPath'] ,
				]);
			}
			else
			{
				$this->retureResult['sign'] = RESULT_ERROR;
				$this->retureResult['message'] = $msg;
			}

			return $this->retureResult;
		}

		/**
		 * 生成应用逻辑文件
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function appGeneratorCode($param)
		{
			$flag = true;
			$msg = '';
			$modulePathInfo = $this->getModulePathInfo($param['id']);
			!isset($param['is_cover']) && ($param['is_cover'] = 0);

			if($flag && !preg_match('#^[a-z][a-z\d]*$#i' , $param['id']))
			{
				$flag = false;
				$msg = '应用ID格式不合法';
			}

			if($flag && !is_dir($modulePathInfo['appPath']))
			{
				$flag = false;
				$msg = '应用不存在，先在左边的应用生成器生成应用';
			}

			$tables = preg_split('/[\r\n]/im' , $param['tables'] , -1 , PREG_SPLIT_NO_EMPTY);
			if($flag && !count($tables))
			{
				$flag = false;
				$msg = '请填写表名，每行一个';
			}

			if($flag)
			{
				array_map(function($v) use (&$flag , &$msg , $param , $modulePathInfo) {
					$name = ucwords(strtr($v , ['_' => '' ,]));

					$fileConfig = [
						//控制器
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\controller\\' . $name . '.php') ,
							'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__controller_backend.php')) ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [
								'____ID__'              => $param['id'] ,
								'____CONTEOLLER_NAME__' => $name ,
							] ,
						] ,
						//模型
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\model\\' . $name . '.php') ,
							'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__model.php')) ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [
								'____ID__'              => $param['id'] ,
								'____CONTEOLLER_NAME__' => $name ,
								'____TABLE_NAME__'      => $v ,
							] ,
						] ,
						//logic
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\logic\\' . $name . '.php') ,
							'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__logic.php')) ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [
								'____ID__'              => $param['id'] ,
								'____CONTEOLLER_NAME__' => $name ,
							] ,
						] ,
						//validate
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\validate\\' . $name . '.php') ,
							'content'     => file_get_contents(replaceToSysSeparator(ITHINKPHP_COMMON . '/view/__validate.php')) ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [
								'____ID__'              => $param['id'] ,
								'____CONTEOLLER_NAME__' => $name ,
							] ,
						] ,

						//视图文件 添加 add.view.php
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\view\\' . strtolower(strtr($v , ['_' => '' ,])) . '/add.view.php') ,
							'content'     => "<?php \r\n//添加数据的视图文件，前往 admin 模块下的 view/user 文件夹复制 add.view.php 来修改\r\n" ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [] ,
						] ,
						//视图文件 编辑 edit.view.php
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\view\\' . strtolower(strtr($v , ['_' => '' ,])) . '/edit.view.php') ,
							'content'     => "<?php \r\n//编辑数据的视图文件，前往 admin 模块下的 view/user 文件夹复制 edit.view.php 来修改\r\n" ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [] ,
						] ,
						//视图文件 列表 data_list.view.php
						[
							'path'        => replaceToSysSeparator($modulePathInfo['appPath'] . '\view\\' . strtolower(strtr($v , ['_' => '' ,])) . '/data_list.view.php') ,
							'content'     => "<?php \r\n//数据列表的视图文件，前往 admin 模块下的 view/user 文件夹复制 data_list.view.php 来修改\r\n" ,
							'is_cover'    => $param['is_cover'] ,
							'replacement' => [] ,
						] ,
					];

					$flag = static::writeFile($fileConfig , $msg);

					if($flag)
					{
						$menu = [
							[
								'name'       => $v . '管理' ,
								'module'     => $param['id'] ,
								'controller' => $name ,
								'action'     => 'none' ,
								'order'      => 0 ,
								'remark'     => '' ,
								'ico'        => 'fa-circle-o' ,
								'is_menu'    => 1 ,
								'son'        => [
									[
										'name'       => $v . '添加数据' ,
										'module'     => $param['id'] ,
										'controller' => $name ,
										'action'     => 'add' ,
										'order'      => 0 ,

										'ico'     => 'fa-plus-circle' ,
										'remark'  => '' ,
										'is_menu' => 1 ,
										'son'     => [] ,
									] ,
									[
										'name'       => '设置字段' ,
										'module'     => $param['id'] ,
										'controller' => $name ,
										'action'     => 'setField' ,
										'order'      => 0 ,
										'ico'        => 'fa-circle' ,
										'remark'     => '' ,
										'is_menu'    => 0 ,
										'son'        => [] ,
									] ,
									[
										'name'       => '编辑数据' ,
										'module'     => $param['id'] ,
										'controller' => $name ,
										'action'     => 'edit' ,
										'order'      => 0 ,
										'ico'        => 'fa-edit' ,
										'remark'     => '' ,
										'is_menu'    => 0 ,
										'son'        => [] ,
									] ,
									[
										'name'       => '删除数据' ,
										'module'     => $param['id'] ,
										'controller' => $name ,
										'action'     => 'delete' ,
										'order'      => 0 ,
										'ico'        => 'fa-remove' ,
										'remark'     => '' ,
										'is_menu'    => 0 ,
										'son'        => [] ,
									] ,
									[
										'name'       => $v . '列表' ,
										'module'     => $param['id'] ,
										'controller' => $name ,
										'ico'        => 'fa-list' ,
										'action'     => 'dataList' ,
										'order'      => 0 ,
										'remark'     => '' ,
										'is_menu'    => 1 ,
										'son'        => [] ,
									] ,
								] ,
							] ,
						];

						static::recusiveParse($menu , $param['id'] , function($data) {
							return $this->model__admin_privilege->insertGetId($data);
						});

					}
				} , $tables);

			}

			if($flag)
			{
				$this->retureResult['sign'] = RESULT_SUCCESS;
				$this->retureResult['message'] = '生成成功，点击全局刷新更新菜单';
			}
			else
			{
				$this->retureResult['sign'] = RESULT_ERROR;
				$this->retureResult['message'] = $msg;
			}

			return $this->retureResult;
		}


		/**
		 * 代码生成器 写文件方法
		 *
		 * @param array $config
		 * @param null  $msg
		 *
		 * @return bool
		 */
		public static function writeFile($config = [] , &$msg = null)
		{
			$flag = true;
			try
			{
				array_map(function($v) {

					if(isset($v['content']))
					{
						FileTool::mkdir_(dirname($v['path']));
						if(!is_file($v['path']) || (is_file($v['path']) && isset($v['is_cover']) && ($v['is_cover'])))
						{
							file_put_contents($v['path'] , strtr(($v['content']) , $v['replacement']));
						}
					}
					else
					{
						FileTool::mkdir_(($v['path']));
					}

				} , $config);

			} catch (\Exception $exception)
			{
				$flag = false;
				$msg = $exception->getMessage();
			}

			return $flag;

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
					$this->retureResult['message'] = '备份成功，点击 安装包管理 查看 <br /> 位置 ：' . $backupPath;
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
					'is_applyed'   => 0 ,
					'info'         => [] ,
					'error'        => [] ,
				];

				$id = $v['name'];
				$info = $this->getModuleInfo($id);

				$infoPath = $this->getModulePathInfo($id);

				$res['is_applyed'] = !!is_dir($infoPath['appPath']);

				//E:\localweb\public_local2\public\backup\blog\backup\app\blog\
				$appPath = replaceToSysSeparator($v['path'] . '\backup\app' . DS . $id . DS);
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
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    通用功能
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		public function test_email()
		{
			$title = '来自 iThinkphp 的测试邮件';
			$body = '来自 iThinkphp 的测试邮件';
			$to = [
				getAdminSessionInfo(SESSOIN_TAG_USER , 'email') => 'by hello' ,
			];
			$res = sendEmail($title , $body , $to , $err);

			if($res)
			{
				$this->retureResult['message'] = '发送成功，登录管理员邮箱查收';
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
		 * 清除缓存
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function clear_cache($param)
		{
			$flag = true;
			$this->retureResult['message'] = '清除成功';
			switch ($param['type'])
			{
				case 'template' :
					$res = FileTool::recursiveRm(TEMP_PATH , function($info , $relativePath) { return true; });
					if(!$res['sign'])
					{
						$flag = false;
						$this->retureResult['message'] = '删除失败，请检查目前权限';
					}
					break;
				case 'log' :
					$res = FileTool::recursiveRm(LOG_PATH , function($info , $relativePath) {
						return true;
					});

					if(!$res['sign'])
					{
						$flag = false;
						$this->retureResult['message'] = '删除失败，请检查目前权限';
					}
					break;
				case 'cache' :
					if(!Cache::clear())
					{
						$flag = false;
						$this->retureResult['message'] = '删除失败，请检查目前权限';
					}
					break;

				default :
					#...
					break;
			}


			if($flag)
			{
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}



		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    数据库功能
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		/**
		 * 数据表列表
		 * @return array|mixed
		 */
		public function dbList()
		{
			$list = \think\Db::query('SHOW TABLE STATUS');

			return array_map('array_change_key_case' , $list);
		}

		/**
		 * 备份的sql文件列表
		 * @return array|mixed
		 */
		public function dbBackupList()
		{
			$sqlFiles = [];
			FileTool::mkdir_(PATH_DATABASE_BACKUP);
			$res = FileTool::listDir(PATH_DATABASE_BACKUP , function($v) use (&$sqlFiles) {
				$sqlFiles[] = $v;
			} , FileTool::FILE);

			return $sqlFiles;
		}

		/**
		 * 备份sql数据
		 * @return array
		 */
		public function backupData()
		{
			$res = querySql('SHOW TABLEs;');
			//获取表对应应用所拥有的表
			$tables = array_map(function($v) {
				return array_values($v)[0];
			} , $res);

			$flag = true;
			$err = null;
			$installSqls = [];
			foreach ($tables as $k => $v)
			{
				$installSqls = array_merge($installSqls , makeSqlByTableName($v , $err));
			}

			if(!$err)
			{
				$sqlFile = (PATH_DATABASE_BACKUP . strtr(formatTime(time() , 1) , [
						' ' => '_' ,
						':' => '_' ,
					]) . '.sql');
				try
				{
					FileTool::mkdir_(dirname($sqlFile));
					file_put_contents($sqlFile , implode("\r\n" , $installSqls));
					$this->retureResult['message'] = 'sql文件文件已生成 <br /> ' . $sqlFile;
					$this->retureResult['sign'] = RESULT_SUCCESS;
				} catch (\Exception $e)
				{
					$this->retureResult['message'] = $e->getMessage() . ' <br /> 写入sql文件出错，检查文件夹是否可写 <br /> ' . $sqlFile;
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
		 * 恢复sql数据
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function recoverData($param)
		{
			$this->retureResult['message'] = '功能还没写。';
			$this->retureResult['sign'] = RESULT_ERROR;

			return $this->retureResult;

		}

		/**
		 * 删除sql数据
		 *
		 * @param $param
		 *
		 * @return array
		 */
		public function deleteData($param)
		{
			$sqlFile = (PATH_DATABASE_BACKUP . $param['id']);
			try
			{
				FileTool::rm(($sqlFile));
				$this->retureResult['message'] = 'sql文件文件已删除 <br /> ' . $sqlFile;
				$this->retureResult['sign'] = RESULT_SUCCESS;
			} catch (\Exception $e)
			{
				$this->retureResult['message'] = $e->getMessage() . ' <br /> 删除sql文件出错，检查文件夹是否可写 <br /> ' . $sqlFile;
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 优化表
		 * @return array|mixed
		 */
		public function optimizeDb()
		{
			$res = querySql('SHOW TABLEs;');
			//获取表对应应用所拥有的表
			$tables = array_map(function($v) {
				return array_values($v)[0];
			} , $res);

			$tables = implode('`,`' , $tables);

			$res = querySql("OPTIMIZE TABLE `{$tables}`");
			if($res)
			{
				$this->retureResult['message'] = '所有数据表优化完成';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = '数据表优化失败';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 * 修复表
		 * @return array|mixed
		 */
		public function restoreDb()
		{

			$res = querySql('SHOW TABLEs;');
			//获取表对应应用所拥有的表
			$tables = array_map(function($v) {
				return array_values($v)[0];
			} , $res);

			$tables = implode('`,`' , $tables);

			$res = querySql("REPAIR TABLE `{$tables}`");
			if($res)
			{
				$this->retureResult['message'] = '所有数据表修复完成';
				$this->retureResult['sign'] = RESULT_SUCCESS;
			}
			else
			{
				$this->retureResult['message'] = '数据表修复失败';
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}


		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    其他
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */


		//解析菜单数组用
		public static function recusiveParse($menu , $moduleId , callable $callback , $level = 0)
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
				static::recusiveParse($v['son'] , $moduleId , $callback , $level + 1);
			}
		}

		/** *
		 * @param $moduleName
		 *
		 * @return array
		 */
		public function getModulePathInfo($moduleName)
		{
			//FileTool::mkdir_(replaceToSysSeparator(APP_PATH . $moduleName));
			$data = [
				//F:\localWeb\public_local14\app\blog
				'appPath'     => (replaceToSysSeparator(realpath(APP_PATH) . DS . $moduleName)) ,

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
