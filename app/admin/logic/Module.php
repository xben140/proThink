<?php

	namespace app\admin\logic;

	use db\Db;
	use file\FileTool;

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
				'is_install' => (function($info) {
					$status = null;
					$hasPrivileges = ($this->model__admin_privilege->where(['category' => strtolower($info['id']) ,])->count() > 0);
					$tablesStatus = [];
					foreach ($info['database_tables'] as $k => $v)
					{
						$sql = "SHOW TABLES LIKE '%{$v}%'";
						$tablesStatus[] = (count(querySql($sql)) > 0);
					}

					//如果有权限，并且表状态里没有false -- 已安装
					if($hasPrivileges && !in_array(false , $tablesStatus))
					{
						$status = $this->model_::$appStatusMap[1]['value'];
					}
					//如果没有权限，并且表个数大于0，并且一个也表也没有 -- 未安装
					elseif(!$hasPrivileges && (count($tablesStatus) > 0) && !in_array(true , $tablesStatus))
					{
						$status = $this->model_::$appStatusMap[0]['value'];
					}
					//如果没有权限，或者表状态里有false -- 安装出错
					else
					{
						$status = $this->model_::$appStatusMap[2]['value'];
					}

					return $status = 0;
				})(include($appPath . DS . 'info.php')) ,

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
				'backup'     => (function($appPath) {
					$path = $appPath . DS . 'database' . DS;
					$files = FileTool::listDir($path);
					$res = [];
					foreach ($files as $k => $v)
					{
						$res[] = file_get_contents($v['path']);
					}

					return $res;
				})($appPath) ,
			];

		}

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
							$flag && $flag = ($this->model__admin_privilege->where(['category' => strtolower($info['info']['id']) ,])->delete() !== false);

							return $flag;
						} ,
						[] ,
						'菜单信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '菜单信息安装成功';
					break;

				case 'config' :
					//配置
					$transaction[] = [
						function($_param) use ($info) {
							$flag = true;
							$config = $info['conf'];
							$id = db('configGroup')->insertGetId(['name' => $info['info']['id']]);
							$configModel = $this->model__common_config;
							$val = '';
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
										isset($v['selected']) && ($v['value']['selected'] .= '!!--!!');
										$val = implode("\r\n" , $v['value']);
										break;
									default :
										#...
										break;
								}
								$flag && $flag = ($configModel->insertData([
									'type'     => $v['type'] ,
									'name'     => $v['name'] ,
									'key'      => $v['key'] ,
									'value'    => $val ,
									'is_const' => isset($v['is_const']) ? (int)$v['is_const'] : '0' ,
									'group_id' => $id ,
								]) !== false);

								if(!$flag) break;
							}

							return $flag !== false;
						} ,
						[] ,
						'配置信息安装出错，请尝试手动执行' ,
					];
					$this->retureResult['message'] = '配置安装成功';
					break;

				case 'db' :
					//数据
					$transaction[] = [
						function($_param) use ($info) {
							$installSql = $info['sql']['install'];

							$sqls = Db::parseSql($installSql);

							$flag = true;
							foreach ($sqls as $k => $sql)
							{
								$flag = Db::exec($sql , function($sql , &$err) {
									return (querySql($sql) !== false);
								} , $err);
							}

							return $flag;
						} ,
						[] ,
						'数据表安装出错，请检查sql语法或者网络环境后尝试手动执行' ,
					];
					$this->retureResult['message'] = '数据表安装成功';
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
							$uninstallSql = $info['info']['database_tables'];
							$flag = true;
							foreach ($uninstallSql as $k => $v)
							{
								$sql = 'DROP TABLE IF EXISTS ' . $v;

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