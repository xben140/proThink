<?php

	namespace app\common\controller;

	use app\common\common\set;
	use builder\elementsFactory;
	use builder\makePage;
	use builder\tagConstructor;
	use think\Controller;
	use think\Loader;

	/**
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

		/**
		 * 基类初始化
		 */
		public function _initialize()
		{

			//print_r(config('exception_tmpl'));exit;;

			// 初始化请求信息
			$this->initRequestInfo();

			//初始化模板参数
			$this->initTemplateParam();

			//初始化页面
			$this->initPageGlobal();

			parent::_initialize();

		}

		//初始化当前模型
		protected function initLogic()
		{
			//当前类名
			$this->logic = $this->{static::makeClassName(static::class , 'logic')};
		}



		/*
		 *
		 *
		 *
		 *
		 *		公共方法
		 *
		 *
		 *
		 * */

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param));
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param));
		}



		/*
		 *
		 *
		 *
		 *
		 *		私有方法，初始化请求
		 *
		 *
		 *
		 * */


		/**
		 * 初始化请求信息，定义请求信息常量
		 */
		final private function initRequestInfo()
		{
			//admin_id
			defined('ADMIN_ID') or define('ADMIN_ID' , config('admin_id'));
			//全站管理员角色id
			defined('GLOBAL_ADMIN_ROLE_ID') or define('GLOBAL_ADMIN_ROLE_ID' , config('global_admin_role_id'));

			defined('IS_POST') or define('IS_POST' , $this->request->isPost());
			defined('IS_GET') or define('IS_GET' , $this->request->isGet());
			defined('IS_AJAX') or define('IS_AJAX' , $this->request->isAjax());
			defined('IS_PJAX') or define('IS_PJAX' , $this->request->isPjax());
			defined('IS_MOBILE') or define('IS_MOBILE' , $this->request->isMobile());
			defined('MODULE_NAME') or define('MODULE_NAME' , strtolower($this->request->module()));
			defined('CONTROLLER_NAME') or define('CONTROLLER_NAME' , strtolower($this->request->controller()));
			defined('ACTION_NAME') or define('ACTION_NAME' , strtolower($this->request->action()));
			defined('URL') or define('URL' , CONTROLLER_NAME . SYS_DS_PROS . ACTION_NAME);
			defined('URL_MODULE') or define('URL_MODULE' , MODULE_NAME . SYS_DS_PROS . URL);
			defined('URL_TRUE') or define('URL_TRUE' , $this->request->url(true));
			defined('DOMAIN') or define('DOMAIN' , $this->request->domain());
			defined('IP') or define('IP' , $this->request->ip());


			defined('URL_ROOT') or define('URL_ROOT' , $this->request->root(true) . '/');
			defined('URL_UPLOAD') or define('URL_UPLOAD' , URL_ROOT . 'upload/');
			defined('URL_PICTURE') or define('URL_PICTURE' , URL_UPLOAD . 'picture/');
			defined('URL_FILE') or define('URL_FILE' , URL_UPLOAD . 'file/');
			defined('URL_HPLUS') or define('URL_HPLUS' , URL_ROOT . 'hplus/');
			defined('URL_STATIC') or define('URL_STATIC' , URL_ROOT . 'static/');
			defined('URL_IMAGE') or define('URL_IMAGE' , URL_STATIC . 'image/');
			defined('URL_PLUGINS') or define('URL_PLUGINS' , URL_STATIC . 'plugins/');
			defined('URL_THEMES') or define('URL_THEMES' , URL_ROOT . 'themes/');

			define('DB_LIST_ROWS' , config('paginate.list_rows'));

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
			//E:\localweb\public_local1\public\themes\home\default
			$theme = config(MODULE_NAME . '_themes');
			!$theme && $theme = 'default';

			$this->view->config([
				'view_path' => PATH_THEMES .$theme. DS . strtolower(MODULE_NAME) . DS ,
			]);

			$base = $this->request->root();
			$root = strpos($base , '.') ? ltrim(dirname($base) , DS) : $base;
			if('' != $root)
			{
				$root = '/' . ltrim($root , '/');
			}

			$this->view->replace([
				'__HPLUS__'   => URL_HPLUS ,
				'__IMAGE__'   => URL_IMAGE ,
				'__PLUGINS__' => URL_PLUGINS ,
				'__ROOT__'    => $root ,
				'__URL__'     => $base . '/' . $this->request->module() . '/' . Loader::parseName($this->request->controller()) ,
				'__STATIC__'  => $root . '/static/' ,
				'__CSS__'     => $root . '/static/css/' ,
				'__JS__'      => $root . '/static/js/' ,
			]);

		}


		/**
		 * 初始化页面公用设置
		 */
		final protected function initPageGlobal()
		{
			//注册自定义元素映射
			elementsFactory::registerMap(config('elements_map'));

			//公用mate
			$mates[] = elementsFactory::singleLabel('<meta charset="utf-8">');
			//$mates[] = elementsFactory::singleLabel('<link rel="shortcut icon" href="">');
			$mates[] = elementsFactory::singleLabel('<!--[if lt IE 9]><meta http-equiv="refresh" content="0;ie.html" /><![endif]-->');
			$mates[] = elementsFactory::singleLabel('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
			$mates[] = elementsFactory::singleLabel('<meta name="viewport" content="width=device-width, initial-scale=1.0">');

			$mates[] = tagConstructor::mate([
				'name'    => 'viewport' ,
				'content' => 'width=device-width' ,
			]);
			$mates[] = tagConstructor::mate([
				'name'    => 'keywords' ,
				'content' => '' ,
			]);
			$mates[] = tagConstructor::mate([
				'name'    => 'description' ,
				'content' => '' ,
			]);
			$mates[] = tagConstructor::mate('name="renderer" content="webkit"');

			$this->makePage()->setHead($mates);

			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'class' => ' gray-bg' ,
				]) ,
			]);

		}

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
					return $this->{$jumpType['sign']}($jumpType['message'] , $jumpType['url'], $jumpType['data']);
				case RESULT_REDIRECT :
					return $this->{$jumpType['sign']}($jumpType['url']);
				default        :
					exception('系统跳转失败 : ' . $jumpType['url']);
			}
		}


		/**
		 * 初始化角色id与常量标识
		 */
		final protected function initRolesConst()
		{
			defined('ROLE_EDIT') or define('ROLE_EDIT' , 2);
		}

		/*
		 *
		 *
		 *
		 *
		 *		公用方法
		 *
		 *
		 *
		 * */

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
			//当前方法对应的模板路径
			$tempPath = $this->getTemplatePath();
			!is_dir(dirname($tempPath)) && mkdir(dirname($tempPath) , 0777 , 1);
			$pathInfo = pathinfo($tempPath);

			//缓存文件
			//E:\localweb\public_local1\public\themes\home\default\index\test.cache.php
			$cacheFileName = $pathInfo['dirname'] . DS . $pathInfo['filename'] . '.cache.' . $pathInfo['extension'];

			if(config('enable_static_cache') && is_file($cacheFileName))
			{
				$contents = file_get_contents($cacheFileName);
			}
			else
			{
				$contents = $this->makePage()->setBody($this->displayContents)->getContents();
				//file_put_contents($cacheFileName , $contents);
			}

			return $this->display($contents);
		}

	}
	//var_export(get_defined_constants(1));exit;;

	array(
		'APP_PATH'               => 'F:\\localWeb\\public_local15\\public/../app/' ,
		'THINK_VERSION'          => '5.0.20' ,
		'THINK_START_TIME'       => 1537417426.394999 ,
		'THINK_START_MEM'        => 406264 ,
		'EXT'                    => '.php' ,
		'DS'                     => '\\' ,
		'THINK_PATH'             => 'F:\\localWeb\\public_local15\\thinkphp\\' ,
		'LIB_PATH'               => 'F:\\localWeb\\public_local15\\thinkphp\\library\\' ,
		'CORE_PATH'              => 'F:\\localWeb\\public_local15\\thinkphp\\library\\think\\' ,
		'TRAIT_PATH'             => 'F:\\localWeb\\public_local15\\thinkphp\\library\\traits\\' ,
		'ROOT_PATH'              => 'F:\\localWeb\\public_local15\\' ,
		'EXTEND_PATH'            => 'F:\\localWeb\\public_local15\\extend\\' ,
		'VENDOR_PATH'            => 'F:\\localWeb\\public_local15\\vendor\\' ,
		'RUNTIME_PATH'           => 'F:\\localWeb\\public_local15\\runtime\\' ,
		'LOG_PATH'               => 'F:\\localWeb\\public_local15\\runtime\\log\\' ,
		'CACHE_PATH'             => 'F:\\localWeb\\public_local15\\runtime\\cache\\' ,
		'TEMP_PATH'              => 'F:\\localWeb\\public_local15\\runtime\\temp\\' ,
		'CONF_PATH'              => 'F:\\localWeb\\public_local15\\public/../app/' ,
		'CONF_EXT'               => '.php' ,
		'ENV_PREFIX'             => 'PHP_' ,
		'IS_CLI'                 => false ,
		'IS_WIN'                 => true ,
		'QR_MODE_NUL'            => -1 ,
		'QR_MODE_NUM'            => 0 ,
		'QR_MODE_AN'             => 1 ,
		'QR_MODE_8'              => 2 ,
		'QR_MODE_KANJI'          => 3 ,
		'QR_MODE_STRUCTURE'      => 4 ,
		'QR_ECLEVEL_L'           => 0 ,
		'QR_ECLEVEL_M'           => 1 ,
		'QR_ECLEVEL_Q'           => 2 ,
		'QR_ECLEVEL_H'           => 3 ,
		'QR_FORMAT_TEXT'         => 0 ,
		'QR_FORMAT_PNG'          => 1 ,
		'QR_CACHEABLE'           => true ,
		'QR_CACHE_DIR'           => 'F:\\localWeb\\public_local15\\vendor\\kairos\\phpqrcode\\cache\\' ,
		'QR_LOG_DIR'             => 'F:\\localWeb\\public_local15\\vendor\\kairos\\phpqrcode\\' ,
		'QR_FIND_BEST_MASK'      => true ,
		'QR_FIND_FROM_RANDOM'    => false ,
		'QR_DEFAULT_MASK'        => 2 ,
		'QR_PNG_MAXIMUM_SIZE'    => 1024 ,
		'QRSPEC_VERSION_MAX'     => 40 ,
		'QRSPEC_WIDTH_MAX'       => 177 ,
		'QRCAP_WIDTH'            => 0 ,
		'QRCAP_WORDS'            => 1 ,
		'QRCAP_REMINDER'         => 2 ,
		'QRCAP_EC'               => 3 ,
		'QR_IMAGE'               => true ,
		'QR_VECT'                => true ,
		'STRUCTURE_HEADER_BITS'  => 20 ,
		'MAX_STRUCTURED_SYMBOLS' => 16 ,
		'N1'                     => 3 ,
		'N2'                     => 3 ,
		'N3'                     => 40 ,
		'N4'                     => 10 ,
		'BEHAVIOR_PATH'          => 'app\\common\\behavior\\' ,
		'LAYER_LOGIC_NAME'       => 'logic' ,
		'LAYER_MODEL_NAME'       => 'model' ,
		'LAYER_SERVICE_NAME'     => 'service' ,
		'LAYER_CONTROLLER_NAME'  => 'controller' ,
		'LAYER_VALIDATE_NAME'    => 'validate' ,
		'LAYER_VIEW_NAME'        => 'view' ,
		'MAGIC_GET_LAYER_LIST'   => array(
			0 => 'logic' ,
			1 => 'model' ,
			2 => 'service' ,
			3 => 'controller' ,
			4 => 'validate' ,
			5 => 'view' ,
		) ,
		'RESULT_SUCCESS'         => 'success' ,
		'RESULT_ERROR'           => 'error' ,
		'RESULT_REDIRECT'        => 'redirect' ,
		'RESULT_MESSAGE'         => 'message' ,
		'RESULT_URL'             => 'url' ,
		'RESULT_DATA'            => 'data' ,
		'DATA_STATUS_NAME'       => 'status' ,
		'DATA_NORMAL'            => 1 ,
		'DATA_DISABLE'           => 0 ,
		'DATA_DELETE'            => -1 ,
		'DATA_SUCCESS'           => 1 ,
		'DATA_ERROR'             => 0 ,
		'SINGLE_FILE'            => 0 ,
		'MULTI_FILE'             => 1 ,
		'SINGLE_IMG'             => 2 ,
		'MULTI_IMG'              => 3 ,
		'TIME_INSERT_FIELD_NAME' => 'time' ,
		'TIME_NOW'               => 1537417426 ,
		'SYS_APP_NAMESPACE'      => 'app' ,
		'SYS_HOOK_DIR_NAME'      => 'hook' ,
		'SYS_ADDON_DIR_NAME'     => 'addon' ,
		'SYS_DRIVER_DIR_NAME'    => 'driver' ,
		'SYS_COMMON_DIR_NAME'    => 'common' ,
		'SYS_STATIC_DIR_NAME'    => 'static' ,
		'SYS_VERSION'            => '1.0.0' ,
		'SYS_ADMINISTRATOR_ID'   => 1 ,
		'SYS_DS_PROS'            => '/' ,
		'SYS_DS_CONS'            => '\\' ,
		'SESSION_TAG_ADMIN'      => 'admin_info' ,
		'SYS_NON_LOGIN_INDEX'    => 'portal/login/login' ,
		'SYS_LOGIN_INDEX'        => 'admin/index/index' ,
		'SYS_DB_PREFIX'          => 'ithink_' ,
		'PATH_ADDON'             => 'F:\\localWeb\\public_local15\\addon\\' ,
		'PATH_PUBLIC'            => 'F:\\localWeb\\public_local15\\public\\' ,
		'PATH_UPLOAD'            => 'F:\\localWeb\\public_local15\\public\\upload\\' ,
		'PATH_PICTURE'           => 'F:\\localWeb\\public_local15\\public\\upload\\picture\\' ,
		'PATH_FILE'              => 'F:\\localWeb\\public_local15\\public\\upload\\file\\' ,
		'PATH_SERVICE'           => 'F:\\localWeb\\public_local15\\app\\common\\service\\' ,
		'PATH_COMMON_LOGIC'      => 'app\\common\\logic\\' ,
		'PATH_HPLUS'             => 'F:\\localWeb\\public_local15\\public\\hplus\\' ,
		'PATH_TEMP'              => 'F:\\localWeb\\public_local15\\public\\temp\\' ,
		'PATH_STATIC'            => 'F:\\localWeb\\public_local15\\public\\static\\' ,
		'PATH_THEMES'            => 'F:\\localWeb\\public_local15\\public\\themes\\' ,
		'API_CODE_NAME'          => 'code' ,
		'API_MSG_NAME'           => 'msg' ,
		'RESOURCE_INDEX_MENU'    => '0' ,
		'RESOURCE_INDEX_ELEMENT' => '1' ,
		'RESOURCE_MENU'          => 'resource_menu' ,
		'RESOURCE_ELEMENT'       => 'resource_element' ,
		'RESOURCE_MAP'           => array(
			0 => 'resource_menu' ,
			1 => 'resource_element' ,
		) ,
		'SESSOIN_TAG_USER'       => 'user' ,
		'SESSOIN_TAG_ROLE'       => 'roles' ,
		'SESSOIN_TAG_PRIVILEGES' => 'privileges' ,
		'SESSOIN_TAG_ROLE_NAME'  => 'rolesName' ,
		'SESSOIN_TAG_ROLE_IDS'   => 'rolesId' ,
		'AAAAA'                  => '0' ,
		'ADMIN_ID'               => 1 ,
		'GLOBAL_ADMIN_ROLE_ID'   => 1 ,
		'IS_POST'                => false ,
		'IS_GET'                 => true ,
		'IS_AJAX'                => false ,
		'IS_PJAX'                => false ,
		'IS_MOBILE'              => false ,
		'MODULE_NAME'            => 'doc' ,
		'CONTROLLER_NAME'        => 'doc' ,
		'ACTION_NAME'            => 'datalist' ,
		'URL'                    => 'doc/datalist' ,
		'URL_MODULE'             => 'doc/doc/datalist' ,
		'URL_TRUE'               => 'http://local15.cc/doc/doc/datalist.html' ,
		'DOMAIN'                 => 'http://local15.cc' ,
		'IP'                     => '127.0.0.1' ,
		'URL_ROOT'               => 'http://local15.cc/' ,
		'URL_UPLOAD'             => 'http://local15.cc/upload/' ,
		'URL_PICTURE'            => 'http://local15.cc/upload/picture/' ,
		'URL_FILE'               => 'http://local15.cc/upload/file/' ,
		'URL_HPLUS'              => 'http://local15.cc/hplus/' ,
		'URL_STATIC'             => 'http://local15.cc/static/' ,
		'URL_IMAGE'              => 'http://local15.cc/static/image/' ,
		'URL_PLUGINS'            => 'http://local15.cc/static/plugins/' ,
		'URL_THEMES'             => 'http://local15.cc/themes/' ,
		'DB_LIST_ROWS'           => '20' ,
	);