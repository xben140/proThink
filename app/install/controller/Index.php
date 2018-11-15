<?php

	namespace app\install\controller;

	use think\Db;

	/**
	 * ******************************************************************************************
	 * ******************************************************************************************
	 *                                安装框架
	 * ******************************************************************************************
	 * ******************************************************************************************
	 */
	class Index extends FrontendBase
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * 安装页面
		 * @return mixed
		 */
		public function install()
		{
			return $this->fetch();
		}

		/**
		 * 环境数据库连接
		 */
		public function dbCheck()
		{
			$isDbOk = true;
			$data = [];
			$msg = '数据库连接成功，配置信息填写正确，点击下一步安装';


			if(!preg_match('#^[^@]+@[^.]+\.[a-z]{2,6}$#i' , $this->param['email']))
			{
				$isDbOk = false;
				$msg = 'email格式不合法';
			}

			if(!preg_match('#^[a-z\d._]{5,16}$#i' , $this->param['username']))
			{
				$isDbOk = false;
				$msg = '后台管理员账号长度为5到16个字符允许字母，数字，下划线';
			}

			if(!preg_match('#^[a-z\d._]{5,16}$#i' , $this->param['pwd']))
			{
				$isDbOk = false;
				$msg = '后台管理员密码长度为5到16个字符允许字母，数字，下划线';
			}

			if($this->param['pwd'] != $this->param['repwd'])
			{
				$isDbOk = false;
				$msg = '两次填写密码不一致';
			}

			if($isDbOk)
			{
				$dbConfig = [];
				$dbConfig['type'] = "mysql";
				$dbConfig['hostname'] = $this->param['host'];
				$dbConfig['username'] = $this->param['dbuser'];
				$dbConfig['password'] = $this->param['dbpwd'];
				$dbConfig['hostport'] = $this->param['port'];
				$dbConfig['charset'] = 'utf8mb4';

				try
				{
					$db = Db::connect($dbConfig);
					$db->execute('SHOW DATABASES');
				} catch (\Exception $e)
				{
					$isDbOk = false;
					$msg = '数据库无法连接，请检查主机，账号，密码和端口信息';
				}
			}
			if($isDbOk)
			{
				try
				{
					$sql = "CREATE DATABASE IF NOT EXISTS `{$this->param['dbname']}` DEFAULT CHARACTER SET " . $dbConfig['charset'];
					if(!$db->execute($sql))
					{
						$isDbOk = false;
						$msg = $db->getError();
					}
				} catch (\Exception $e)
				{
					$isDbOk = false;
					$msg = $e->getMessage();
				}
			}

			if($isDbOk)
			{
				$this->success($msg , null , $data);
			}
			else
			{
				$this->error($msg , null , $data);
			}
		}

		/**
		 * 建表
		 * @return mixed
		 * @throws \think\exception\HttpResponseException
		 */
		public function createDb()
		{
			$isDbOk = true;
			$data = [];
			$msg = 'iThink 安装成功！enjoy...';

			//F:\localWeb\public_local14\app\install
			$modulePath = realpath(replaceToSysSeparator(APP_PATH . MODULE_NAME)) . DS;

			$dbConfig = [];
			$dbConfig['type'] = "mysql";
			$dbConfig['hostname'] = $this->param['host'];
			$dbConfig['username'] = $this->param['dbuser'];
			$dbConfig['password'] = $this->param['dbpwd'];
			$dbConfig['hostport'] = $this->param['port'];
			$dbConfig['database'] = $this->param['dbname'];
			$dbConfig['prefix'] = 'ithink_';
			$dbConfig['charset'] = 'utf8mb4';


			/**
			 * 连数据库
			 */
			try
			{
				$db = Db::connect($dbConfig);
				$db->execute('SHOW DATABASES');
			} catch (\Exception $e)
			{
				$isDbOk = false;
				$msg = '数据库无法连接，请检查主机，账号，密码和端口信息';
			}


			/**
			 * 建表
			 */
			if($isDbOk)
			{
				$installSql = file_get_contents($modulePath . 'install.sql');

				$sqls = \db\Db::parseSql($installSql);

				$flag = true;
				foreach ($sqls as $k => $sql)
				{
					$flag && $flag = \db\Db::exec($sql , function($sql , &$err) use ($db) {
						return ($db->query($sql) !== false);
					} , $err);
					if(!$flag) break;
				}
				if(!$flag)
				{
					$isDbOk = false;
					$msg = $err;
				}
			}

			/**
			 * 添加管理员用户
			 */
			if($isDbOk)
			{
				list($salt , $password) = array_values(buildPwd($this->param['pwd']));
				$flag = $db->name('user')->insert([
					'user'     => $this->param['username'] ,
					'password' => $password ,
					'email'    => $this->param['email'] ,
					'salt'     => $salt ,
					'time'     => time() ,
					'reg_ip'   => IP ,
				]);

				if(!$flag)
				{
					$isDbOk = false;
					$msg = '用户添加失败 <br />' . $db->getError();
				}
			}


			/**
			 * 生成数据库配置文件
			 */
			if($isDbOk)
			{
				$databaseConfigFile = strtr(file_get_contents($modulePath . 'database.temp') , [
					'##host##'   => "'{$this->param['host']}'" ,
					'##dbname##' => "'{$this->param['dbname']}'" ,
					'##dbuser##' => "'{$this->param['dbuser']}'" ,
					'##dbpwd##'  => "'{$this->param['dbpwd']}'" ,
					'##port##'   => "'{$this->param['port']}'" ,
				]);

				try
				{
					file_put_contents(APP_PATH . 'database.php' , $databaseConfigFile);
				} catch (\Exception $e)
				{
					$isDbOk = false;
					$msg = '数据库配置写入出错，请检查文件夹权限  <br />' . APP_PATH;
				}

			}

			if($isDbOk)
			{
				//加安装锁
				@exec('chmod -R 777 ' . realpath(APP_PATH . '/../'));
				$this->success($msg , null , $data);
			}
			else
			{
				$this->error($msg , null , $data);
			}
		}
	}