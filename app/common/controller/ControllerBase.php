<?php

	namespace app\common\controller;

	use app\common\common\set;
	use builder\elementsFactory;
	use builder\makePage;
	use think\Controller;
	use think\Loader;

	/**
	 * 所有控制器的基类控制器
	 * Class ControllerBase
	 * @package app\common\controller
	 */
	class ControllerBase extends Controller
	{
		use set;

		// 所有请求参数
		/**
		 * @var
		 */
		protected $param;
		protected $param_get;
		protected $param_post;
		protected $param_request;
		protected $param_cookie;
		protected $param_server;
		protected $param_session;

		//当前表对应模型
		protected $logic;


		/**
		 * 最终输出的dom结构
		 * @var
		 */
		protected $displayContents;

		public function __construct()
		{
			parent::__construct();
			//var_export(get_defined_constants(1)['user']);
			//exit;
		}


		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    初始化请求参数
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */
		public function _initialize()
		{
			// 初始化请求信息
			$this->initRequestInfo();

			//初始化模板参数
			$this->initTemplateParam();
			$this->initTemplatePath();

			//没安装就跳安装页面
			$this->isInstalled();

			//初始化静态资源
			$this->initBaseStaticResource();
			$this->initModuleStaticResource();

			//写入访问日志
			config('is_write_oplog') && $this->addOplog();

			parent::_initialize();

		}

		/**
		 * 初始化请求信息，定义请求信息常量
		 */
		final private function initRequestInfo()
		{
			/**
			 * 通用信息
			 */
			define('DB_LIST_ROWS' , config('paginate.list_rows'));
			//admin_id
			defined('ADMIN_ID') or define('ADMIN_ID' , config('admin_id'));
			//全站管理员角色id
			defined('GLOBAL_ADMIN_ROLE_ID') or define('GLOBAL_ADMIN_ROLE_ID' , config('global_admin_role_id'));

			/**
			 * 通用信息
			 */
			defined('IS_POST') or define('IS_POST' , $this->request->isPost());
			defined('IS_GET') or define('IS_GET' , $this->request->isGet());
			defined('IS_AJAX') or define('IS_AJAX' , $this->request->isAjax());
			defined('IS_PJAX') or define('IS_PJAX' , $this->request->isPjax());
			defined('IS_MOBILE') or define('IS_MOBILE' , $this->request->isMobile());
			defined('MODULE_NAME') or define('MODULE_NAME' , strtolower($this->request->module()));
			defined('CONTROLLER_NAME') or define('CONTROLLER_NAME' , strtolower($this->request->controller()));
			defined('ACTION_NAME') or define('ACTION_NAME' , strtolower($this->request->action()));
			defined('DOMAIN') or define('DOMAIN' , $this->request->domain());
			defined('IP') or define('IP' , $this->request->ip());


			/**
			 * 路径和url信息
			 */

			//index/index
			defined('URL') or define('URL' , CONTROLLER_NAME . SYS_DS_PROS . ACTION_NAME);
			//blog/index/index
			defined('URL_MODULE') or define('URL_MODULE' , MODULE_NAME . SYS_DS_PROS . URL);
			//http://local14.cc/
			defined('URL_TRUE') or define('URL_TRUE' , $this->request->url(true));
			//http://local14.cc/
			defined('URL_ROOT') or define('URL_ROOT' , $this->request->root(true) . '/');
			//http://local14.cc/hplus/
			defined('URL_HPLUS') or define('URL_HPLUS' , URL_ROOT . 'hplus/');
			//http://local14.cc/static/
			defined('URL_STATIC') or define('URL_STATIC' , URL_ROOT . 'static/');
			//http://local14.cc/static/image/
			defined('URL_IMAGE') or define('URL_IMAGE' , URL_STATIC . 'image/');
			//http://local14.cc/static/plugins/
			defined('URL_PLUGINS') or define('URL_PLUGINS' , URL_STATIC . 'plugins/');


			//http://local14.cc/database_backup/
			defined('URL_DATABASE_BACKUP') or define('URL_DATABASE_BACKUP' , replaceToUrlSeparator(URL_ROOT . 'database_backup/'));
			//F:\localWeb\public_local14\public\database_backup/
			defined('PATH_DATABASE_BACKUP') or define('PATH_DATABASE_BACKUP' , replaceToSysSeparator(PATH_PUBLIC . 'database_backup/'));

			/**
			 * 应用模块信息
			 */
			//http://local14.cc/backup/
			defined('URL_BACKUP') or define('URL_BACKUP' , replaceToUrlSeparator(URL_ROOT . 'backup/'));
			//F:\localWeb\public_local14\public\backup/
			defined('PATH_BACKUP') or define('PATH_BACKUP' , replaceToSysSeparator(PATH_PUBLIC . 'backup/'));

			//F:\localWeb\public_local14\public\static\module\
			defined('MODEL_STATIC_PATH') or define('MODEL_STATIC_PATH' , replaceToSysSeparator(PATH_STATIC . 'module/'));
			//http://local14.cc/static/module/
			defined('MODEL_STATIC_URL') or define('MODEL_STATIC_URL' , replaceToUrlSeparator(URL_STATIC . 'module/'));

			//F:\localWeb\public_local14\public\static\module\blog\
			defined('CONTROLLER_STATIC_PATH') or define('CONTROLLER_STATIC_PATH' , replaceToSysSeparator(MODEL_STATIC_PATH . MODULE_NAME . '/'));
			//http://local14.cc/static/module/blog/
			defined('CONTROLLER_STATIC_URL') or define('CONTROLLER_STATIC_URL' , replaceToUrlSeparator(MODEL_STATIC_URL . MODULE_NAME . '/'));

			//F:\localWeb\public_local14\public\static\module\blog\template\
			defined('CONTROLLER_STATIC_PATH_TEMPLATE') or define('CONTROLLER_STATIC_PATH_TEMPLATE' , replaceToSysSeparator(CONTROLLER_STATIC_PATH . 'template/'));
			//http:\\local14.cc\static\module\blog\template\
			defined('CONTROLLER_STATIC_URL_TEMPLATE') or define('CONTROLLER_STATIC_URL_TEMPLATE' , replaceToSysSeparator(CONTROLLER_STATIC_URL . 'template/'));

			/**
			 * 上传路径信息
			 */

			//define('PATH_UPLOAD' , CONTROLLER_STATIC_PATH . 'upload' . DS);
			define('PATH_UPLOAD' , PATH_PUBLIC . 'upload' . DS);
			define('PATH_PICTURE' , PATH_UPLOAD . 'picture' . DS);
			define('PATH_FILE' , PATH_UPLOAD . 'file' . DS);

			//define('URL_UPLOAD' , CONTROLLER_STATIC_URL . 'upload/');
			define('URL_UPLOAD' , URL_ROOT . 'upload/');
			define('URL_PICTURE' , URL_UPLOAD . 'picture/');
			define('URL_FILE' , URL_UPLOAD . 'file/');


			/**
			 * 请求变量
			 */
			$this->param = $this->request->param();
			$this->param_get = $this->request->get();
			$this->param_post = $this->request->post();
			$this->param_request = $this->request->request();
			$this->param_cookie = $this->request->cookie();
			$this->param_session = $this->request->session();
			$this->param_server = $this->request->server();
		}

		/**
		 * 初始化模板参数
		 */
		final protected function initTemplateParam()
		{
			$base = $this->request->root();
			$root = strpos($base , '.') ? ltrim(dirname($base) , DS) : $base;
			if('' != $root)
			{
				$root = '/' . ltrim($root , '/');
			}

			$this->view->replace([
				//
				'__CONTROLLER_STATIC_URL__' => CONTROLLER_STATIC_URL ,
				'__HPLUS__'                 => URL_HPLUS ,
				'__IMAGE__'                 => URL_IMAGE ,
				'__PLUGINS__'               => URL_PLUGINS ,
				'__ROOT__'                  => $root ,
				'__URL__'                   => $base . '/' . $this->request->module() . '/' . Loader::parseName($this->request->controller()) ,
				'__STATIC__'                => $root . '/static/' ,
				'__CSS__'                   => $root . '/static/css/' ,
				'__JS__'                    => $root . '/static/js/' ,
			]);
		}

		/**
		 * 初始化模板路径
		 */
		public function initTemplatePath()
		{
			$this->view->config([//'view_path' => PATH_THEMES .$theme. DS . strtolower(MODULE_NAME) . DS ,
			]);


		}

		/**
		 * 安装检测
		 */
		private function isInstalled()
		{
			//没安装都跳到安装页面
			if(!isInstalled() && (!in_array(strtolower(URL_MODULE) , [
					'install/index/install' ,
					'admin/login/evncheck' ,
					'install/index/dbcheck' ,
					'install/index/createdb' ,
				])))
			{
				header('Location: /install');
				exit;
			}

			//安装了还访问安装页面就跳主页
			if(isInstalled() && (in_array(strtolower(URL_MODULE) , [
					'install/index/install' ,
					'install/index/dbcheck' ,
					'install/index/createdb' ,
				])))
			{
				header('Location: /');
				exit;
			}
		}


		/**
		 * 初始化页面公用设置
		 */
		final protected function initBaseStaticResource()
		{
			//注册自定义元素映射
			elementsFactory::registerMap(config('elements_map'));
		}

		/**
		 * 每个独立模块实例化自己的静态资源
		 */
		public function initModuleStaticResource() { }

		/**
		 * 写入日志，支持自定义写入日志规则
		 * 可以在子类重写这方法，自定义写入日志的规则，默认是所有请求都写入日志
		 *
		 * @param callable|null $rule
		 */
		public function addOplog(callable $rule = null)
		{
			//记录访问日志
			$this->logic__common_Oplog::pushLogToFile($rule);
		}

		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    公共curd方法
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
		}


		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param));
		}


		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param));
		}

		public function dataList()
		{
			return $this->makeView($this);
		}



		/**
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 *                    公共其他方法
		 * ***********************************************************************************************
		 * ***********************************************************************************************
		 */

		//初始化当前模型
		protected function initLogic()
		{
			//当前类名
			$this->logic = $this->{static::makeClassName(static::class , 'logic')};
		}

		/**
		 * 设置页面标题
		 *
		 * @param $title
		 */
		public function setPageTitle($title)
		{
			//设置标题
			$this->makePage()->setHead(elementsFactory::singleLabel('<title>' . $title . '</title>'));
		}

		/**
		 * 通用跳转，接受logic返回的数组参数
		 *
		 * @param array $jumpType
		 *
		 * @return
		 * @throws \Exception
		 */
		final protected function jump($jumpType)
		{
			/**
			 * [
			 * 'sign'    => RESULT_SUCCESS ,
			 * 'message' => '' ,
			 * 'url'     => '' ,
			 * ]
			 */

			switch (strtolower($jumpType['sign']))
			{
				case RESULT_SUCCESS  :
				case RESULT_ERROR    :
					return $this->{$jumpType['sign']}($jumpType['message'] , $jumpType['url'] , $jumpType['data']);
				case RESULT_REDIRECT :
					return $this->{$jumpType['sign']}($jumpType['url']);
				default        :
					exception('系统跳转失败 : ' . $jumpType['url']);
			}
		}

		/**
		 * 获取当前方法下对于路径下的模板路径
		 *
		 * @param string $temp
		 *
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function getTemplatePath($temp = '')
		{
			//把$this->view->engine的 parseTemplate 方法设置为公有，方便计算当前方法模板路径
			$parseTemplateMethod = new \ReflectionMethod($this->view->engine , 'parseTemplate');
			$parseTemplateMethod->setAccessible(true);

			return $parseTemplateMethod->invokeArgs($this->view->engine , [$temp]);
		}

		/**
		 * 获取当前方法下对于路径下的模板内容
		 *
		 * @param string $temp
		 *
		 * @return bool|string
		 * @throws \ReflectionException
		 */
		public function getTemplateContents($temp = '')
		{
			return file_get_contents($this->getTemplatePath($temp));
		}

		/**
		 * 返回构造页面类实例
		 * @return makePage|null
		 */
		public function makePage()
		{
			return makePage::getInstance();
		}

		/**
		 * 输出构造器构造好的页面
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function showPage()
		{
			$pathInfo = $this->makeViewPathInfo();
			$cacheFileName = $this->makeCacheName($pathInfo);

			if(config('enable_static_cache') && is_file($cacheFileName))
			{
				$contents = file_get_contents($cacheFileName);
			}
			else
			{
				$contents = $this->makePage()->setBody($this->displayContents)->getContents();
				//$contents = preg_replace('/^\s*/im' , '' , $contents);
				//file_put_contents($cacheFileName , $contents);
			}

			return $this->display($contents);
		}

		/**
		 * 渲染页面
		 *
		 * @param $__this
		 *
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function makeView($__this , $temp = '')
		{
			$pathInfo = $this->makeViewPathInfo($temp);
			$viewFileName = $this->makeViewName($pathInfo);

			$func = include $viewFileName;
			$func($__this);

			return $__this->showPage();
		}

		/**
		 * 计算页面缓存路径（调试使用）
		 *
		 * @param $pathInfo
		 *
		 * @return string
		 */
		public function makeCacheName($pathInfo)
		{
			$name = $pathInfo['dirname'] . DS . $pathInfo['filename'] . '.cache.' . $pathInfo['extension'];

			return $name;
		}

		/**
		 * 计算对应方法的模板页面路径
		 *
		 * @param $pathInfo
		 *
		 * @return string
		 */
		public function makeViewName($pathInfo)
		{
			$name = $pathInfo['dirname'] . DS . $pathInfo['filename'] . '.view.' . $pathInfo['extension'];

			return $name;
		}

		/**
		 *   计算当前控制器的视图路径
		 * ‌array (
		 * 'dirname' => 'F:\\localWeb\\public_local17\\public/../app/admin\\view\\index',
		 * 'basename' => 'index.php',
		 * 'extension' => 'php',
		 * 'filename' => 'index',
		 * )
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function makeViewPathInfo($temp = '')
		{
			//当前方法对应的模板路径
			$tempPath = $this->getTemplatePath($temp);
			!is_dir(dirname($tempPath)) && mkdir(dirname($tempPath) , 0777 , 1);

			return pathinfo($tempPath);
		}
	}


	array(
		'APP_PATH'                        => 'F:\\localWeb\\public_local14\\public/../app/' ,
		'THINK_VERSION'                   => '5.0.22' ,
		'THINK_START_TIME'                => 1542013909.0163 ,
		'THINK_START_MEM'                 => 405544 ,
		'EXT'                             => '.php' ,
		'DS'                              => '\\' ,
		'THINK_PATH'                      => 'F:\\localWeb\\public_local14\\thinkphp\\' ,
		'LIB_PATH'                        => 'F:\\localWeb\\public_local14\\thinkphp\\library\\' ,
		'CORE_PATH'                       => 'F:\\localWeb\\public_local14\\thinkphp\\library\\think\\' ,
		'TRAIT_PATH'                      => 'F:\\localWeb\\public_local14\\thinkphp\\library\\traits\\' ,
		'ROOT_PATH'                       => 'F:\\localWeb\\public_local14\\' ,
		'EXTEND_PATH'                     => 'F:\\localWeb\\public_local14\\extend\\' ,
		'VENDOR_PATH'                     => 'F:\\localWeb\\public_local14\\vendor\\' ,
		'RUNTIME_PATH'                    => 'F:\\localWeb\\public_local14\\runtime\\' ,
		'LOG_PATH'                        => 'F:\\localWeb\\public_local14\\runtime\\log\\' ,
		'CACHE_PATH'                      => 'F:\\localWeb\\public_local14\\runtime\\cache\\' ,
		'TEMP_PATH'                       => 'F:\\localWeb\\public_local14\\runtime\\temp\\' ,
		'CONF_PATH'                       => 'F:\\localWeb\\public_local14\\public/../app/' ,
		'CONF_EXT'                        => '.php' ,
		'ENV_PREFIX'                      => 'PHP_' ,
		'IS_CLI'                          => false ,
		'IS_WIN'                          => true ,
		'QR_MODE_NUL'                     => -1 ,
		'QR_MODE_NUM'                     => 0 ,
		'QR_MODE_AN'                      => 1 ,
		'QR_MODE_8'                       => 2 ,
		'QR_MODE_KANJI'                   => 3 ,
		'QR_MODE_STRUCTURE'               => 4 ,
		'QR_ECLEVEL_L'                    => 0 ,
		'QR_ECLEVEL_M'                    => 1 ,
		'QR_ECLEVEL_Q'                    => 2 ,
		'QR_ECLEVEL_H'                    => 3 ,
		'QR_FORMAT_TEXT'                  => 0 ,
		'QR_FORMAT_PNG'                   => 1 ,
		'QR_CACHEABLE'                    => true ,
		'QR_CACHE_DIR'                    => 'F:\\localWeb\\public_local14\\vendor\\kairos\\phpqrcode\\cache\\' ,
		'QR_LOG_DIR'                      => 'F:\\localWeb\\public_local14\\vendor\\kairos\\phpqrcode\\' ,
		'QR_FIND_BEST_MASK'               => true ,
		'QR_FIND_FROM_RANDOM'             => false ,
		'QR_DEFAULT_MASK'                 => 2 ,
		'QR_PNG_MAXIMUM_SIZE'             => 1024 ,
		'QRSPEC_VERSION_MAX'              => 40 ,
		'QRSPEC_WIDTH_MAX'                => 177 ,
		'QRCAP_WIDTH'                     => 0 ,
		'QRCAP_WORDS'                     => 1 ,
		'QRCAP_REMINDER'                  => 2 ,
		'QRCAP_EC'                        => 3 ,
		'QR_IMAGE'                        => true ,
		'QR_VECT'                         => true ,
		'STRUCTURE_HEADER_BITS'           => 20 ,
		'MAX_STRUCTURED_SYMBOLS'          => 16 ,
		'N1'                              => 3 ,
		'N2'                              => 3 ,
		'N3'                              => 40 ,
		'N4'                              => 10 ,
		'BEHAVIOR_PATH'                   => 'app\\common\\behavior\\' ,
		'LAYER_LOGIC_NAME'                => 'logic' ,
		'LAYER_MODEL_NAME'                => 'model' ,
		'LAYER_SERVICE_NAME'              => 'service' ,
		'LAYER_CONTROLLER_NAME'           => 'controller' ,
		'LAYER_VALIDATE_NAME'             => 'validate' ,
		'LAYER_VIEW_NAME'                 => 'view' ,
		'MAGIC_GET_LAYER_LIST'            => array(
			0 => 'logic' ,
			1 => 'model' ,
			2 => 'service' ,
			3 => 'controller' ,
			4 => 'validate' ,
			5 => 'view' ,
		) ,
		'RESULT_SUCCESS'                  => 'success' ,
		'RESULT_ERROR'                    => 'error' ,
		'RESULT_REDIRECT'                 => 'redirect' ,
		'RESULT_MESSAGE'                  => 'message' ,
		'RESULT_URL'                      => 'url' ,
		'RESULT_DATA'                     => 'data' ,
		'DATA_STATUS_NAME'                => 'status' ,
		'DATA_NORMAL'                     => 1 ,
		'DATA_DISABLE'                    => 0 ,
		'DATA_DELETE'                     => -1 ,
		'DATA_SUCCESS'                    => 1 ,
		'DATA_ERROR'                      => 0 ,
		'SINGLE_FILE'                     => 0 ,
		'MULTI_FILE'                      => 1 ,
		'SINGLE_IMG'                      => 2 ,
		'MULTI_IMG'                       => 3 ,
		'TIME_INSERT_FIELD_NAME'          => 'time' ,
		'TIME_NOW'                        => 1542013909 ,
		'SYS_APP_NAMESPACE'               => 'app' ,
		'SYS_HOOK_DIR_NAME'               => 'hook' ,
		'SYS_ADDON_DIR_NAME'              => 'addon' ,
		'SYS_DRIVER_DIR_NAME'             => 'driver' ,
		'SYS_COMMON_DIR_NAME'             => 'common' ,
		'SYS_STATIC_DIR_NAME'             => 'static' ,
		'SYS_VERSION'                     => '1.0.0' ,
		'SYS_ADMINISTRATOR_ID'            => 1 ,
		'SYS_DS_PROS'                     => '/' ,
		'SYS_DS_CONS'                     => '\\' ,
		'SYS_ADMIN_MODULE_NAEM'           => 'system' ,
		'SESSION_TAG_ADMIN'               => 'admin_info' ,
		'SYS_NONE_LOGIN_INDEX'            => 'admin/login/login' ,
		'SYS_LOGIN_INDEX'                 => 'admin/index/index' ,
		'SYS_DB_PREFIX'                   => 'ithink_' ,
		'PATH_PUBLIC'                     => 'F:\\localWeb\\public_local14\\public\\' ,
		'PATH_SERVICE'                    => 'F:\\localWeb\\public_local14\\app\\common\\service\\' ,
		'PATH_HPLUS'                      => 'F:\\localWeb\\public_local14\\public\\hplus\\' ,
		'PATH_TEMP'                       => 'F:\\localWeb\\public_local14\\public\\temp\\' ,
		'PATH_STATIC'                     => 'F:\\localWeb\\public_local14\\public\\static\\' ,
		'PATH_THEMES'                     => 'F:\\localWeb\\public_local14\\public\\themes\\' ,
		'MODULE_FILE_CONFIG'              => 'config.json' ,
		'MODULE_FILE_INFO'                => 'info.json' ,
		'MODULE_FILE_MENU'                => 'menu.json' ,
		'MODULE_FILE_SQL'                 => 'sql.json' ,
		'MODULE_FILE_ROUTE'               => 'route.php' ,
		'SESSOIN_TAG_USER'                => 'user' ,
		'SESSOIN_TAG_ROLE'                => 'roles' ,
		'SESSOIN_TAG_PRIVILEGES'          => 'privileges' ,
		'SESSOIN_TAG_ROLE_NAME'           => 'rolesName' ,
		'SESSOIN_TAG_ROLE_IDS'            => 'rolesId' ,
		'const'                           => 'constconstconst' ,
		'DB_LIST_ROWS'                    => '10' ,
		'ADMIN_ID'                        => 1 ,
		'GLOBAL_ADMIN_ROLE_ID'            => 1 ,
		'IS_POST'                         => false ,
		'IS_GET'                          => true ,
		'IS_AJAX'                         => false ,
		'IS_PJAX'                         => false ,
		'IS_MOBILE'                       => false ,
		'MODULE_NAME'                     => 'blog' ,
		'CONTROLLER_NAME'                 => 'index' ,
		'ACTION_NAME'                     => 'index' ,
		'DOMAIN'                          => 'http://local14.cc' ,
		'IP'                              => '127.0.0.1' ,
		'URL'                             => 'index/index' ,
		'URL_MODULE'                      => 'blog/index/index' ,
		'URL_TRUE'                        => 'http://local14.cc/' ,
		'URL_ROOT'                        => 'http://local14.cc/' ,
		'URL_HPLUS'                       => 'http://local14.cc/hplus/' ,
		'URL_STATIC'                      => 'http://local14.cc/static/' ,
		'URL_IMAGE'                       => 'http://local14.cc/static/image/' ,
		'URL_PLUGINS'                     => 'http://local14.cc/static/plugins/' ,
		'URL_BACKUP'                      => 'http://local14.cc/backup/' ,
		'PATH_BACKUP'                     => 'F:\\localWeb\\public_local14\\public\\backup/' ,
		'MODEL_STATIC_PATH'               => 'F:\\localWeb\\public_local14\\public\\static\\module\\' ,
		'MODEL_STATIC_URL'                => 'http://local14.cc/static/module/' ,
		'CONTROLLER_STATIC_PATH'          => 'F:\\localWeb\\public_local14\\public\\static\\module\\blog\\' ,
		'CONTROLLER_STATIC_URL'           => 'http://local14.cc/static/module/blog/' ,
		'CONTROLLER_STATIC_PATH_TEMPLATE' => 'F:\\localWeb\\public_local14\\public\\static\\module\\blog\\template\\' ,
		'CONTROLLER_STATIC_URL_TEMPLATE'  => 'http:\\\\local14.cc\\static\\module\\blog\\template\\' ,
		'PATH_UPLOAD'                     => 'F:\\localWeb\\public_local14\\public\\upload\\' ,
		'PATH_PICTURE'                    => 'F:\\localWeb\\public_local14\\public\\upload\\picture\\' ,
		'PATH_FILE'                       => 'F:\\localWeb\\public_local14\\public\\upload\\file\\' ,
		'URL_UPLOAD'                      => 'http://local14.cc/upload/' ,
		'URL_PICTURE'                     => 'http://local14.cc/upload/picture/' ,
		'URL_FILE'                        => 'http://local14.cc/upload/file/' ,
		'CURRENT_THEME_PATH'              => 'F:\\localWeb\\public_local14\\public\\static\\module\\blog\\template\\default\\' ,
		'CURRENT_THEME_URL'               => 'http:\\\\local14.cc\\static\\module\\blog\\template\\default\\' ,
		'CURRENT_THEME_STATIC_PATH'       => 'F:\\localWeb\\public_local14\\public\\static\\module\\blog\\template\\default\\static\\' ,
		'CURRENT_THEME_STATIC_URL'        => 'http:\\\\local14.cc\\static\\module\\blog\\template\\default\\static\\' ,
	);