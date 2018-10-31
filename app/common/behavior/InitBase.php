<?php
// +---------------------------------------------------------------------+
// | OneBase    | [ WE CAN DO IT JUST THINK ]                            |
// +---------------------------------------------------------------------+
// | Licensed   | http://www.apache.org/licenses/LICENSE-2.0 )           |
// +---------------------------------------------------------------------+
// | Author     | Bigotry <3162875@qq.com>                               |
// +---------------------------------------------------------------------+
// | Repository | https://gitee.com/Bigotry/OneBase                      |
// +---------------------------------------------------------------------+

	namespace app\common\behavior;

	use app\common\common\set;
	use auth\Auth;
	use think\Loader;

	/**
	 * 初始化基础信息行为
	 */
	class InitBase
	{
		use set;

		/**
		 * 初始化行为入口
		 */
		public function run()
		{

			// 初始化常量
			$this->initConst();

			// 初始化配置
			$this->initConfig();

			// 注册命名空间
			//$this->registerNamespace();
		}

		/**
		 * 初始化常量
		 */
		private function initConst()
		{

			// 初始化分层名称常量
			$this->initLayerConst();

			// 初始化结果常量
			$this->initResultConst();

			// 初始化数据状态常量
			$this->initDataStatusConst();

			// 初始化时间常量
			$this->initTimeConst();

			// 初始化系统常量
			$this->initSystemConst();

			// 初始化路径常量
			$this->initPathConst();

			// 初始化API常量
			$this->initApiConst();

			// session键常量
			$this->sessionConst();
		}

		/**
		 * 初始化分层名称常量
		 */
		private function initLayerConst()
		{
			define('LAYER_LOGIC_NAME' , 'logic');
			define('LAYER_MODEL_NAME' , 'model');
			define('LAYER_SERVICE_NAME' , 'service');
			define('LAYER_CONTROLLER_NAME' , 'controller');
			define('LAYER_VALIDATE_NAME' , 'validate');
			define('LAYER_VIEW_NAME' , 'view');

			define('MAGIC_GET_LAYER_LIST' , [
				LAYER_LOGIC_NAME ,
				LAYER_MODEL_NAME ,
				LAYER_SERVICE_NAME ,
				LAYER_CONTROLLER_NAME ,
				LAYER_VALIDATE_NAME ,
				LAYER_VIEW_NAME ,
			]);
		}

		/**
		 * 初始化结果标识常量
		 */
		private function initResultConst()
		{
			define('RESULT_SUCCESS' , 'success');
			define('RESULT_ERROR' , 'error');
			define('RESULT_REDIRECT' , 'redirect');
			define('RESULT_MESSAGE' , 'message');
			define('RESULT_URL' , 'url');
			define('RESULT_DATA' , 'data');
		}

		/**
		 * 初始化数据状态常量
		 */
		private function initDataStatusConst()
		{
			define('DATA_STATUS_NAME' , 'status');
			define('DATA_NORMAL' , 1);
			define('DATA_DISABLE' , 0);
			define('DATA_DELETE' , -1);
			define('DATA_SUCCESS' , 1);
			define('DATA_ERROR' , 0);

			//文件上传类标识
			define('SINGLE_FILE' , 0);
			define('MULTI_FILE' , 1);
			define('SINGLE_IMG' , 2);
			define('MULTI_IMG' , 3);
		}

		/**
		 * 初始化时间常量
		 */
		private function initTimeConst()
		{
			//define('TIME_CT_NAME', 'create_time');
			//define('TIME_UT_NAME', 'update_time');
			define('TIME_INSERT_FIELD_NAME' , 'time');
			define('TIME_NOW' , time());
		}

		/**
		 * 初始化系统常量
		 */
		private function initSystemConst()
		{

			define('SYS_APP_NAMESPACE' , config('app_namespace'));
			define('SYS_HOOK_DIR_NAME' , 'hook');
			define('SYS_ADDON_DIR_NAME' , 'addon');
			define('SYS_DRIVER_DIR_NAME' , 'driver');
			define('SYS_COMMON_DIR_NAME' , 'common');
			define('SYS_STATIC_DIR_NAME' , 'static');
			define('SYS_VERSION' , '1.0.0');
			define('SYS_ADMINISTRATOR_ID' , 1);
			define('SYS_DS_PROS' , '/');
			define('SYS_DS_CONS' , '\\');


			define('SESSION_TAG_ADMIN' , 'admin_info');

			define('SYS_NON_LOGIN_INDEX' , 'admin/login/login');
			define('SYS_LOGIN_INDEX' , 'admin/index/index');

			$database_config = config('database');
			define('SYS_DB_PREFIX' , $database_config['prefix']);
			//define('SYS_ENCRYPT_KEY', $database_config['sys_data_key']);
		}

		/**
		 * 初始化路径常量
		 */
		private function initPathConst()
		{


			define('PATH_PUBLIC' , ROOT_PATH . 'public' . DS);

			define('PATH_SERVICE' , ROOT_PATH . SYS_APP_NAMESPACE . DS . SYS_COMMON_DIR_NAME . DS . LAYER_SERVICE_NAME . DS);



			define('PATH_HPLUS' , PATH_PUBLIC . 'hplus' . DS);
			define('PATH_TEMP' , PATH_PUBLIC . 'temp' . DS);
			define('PATH_STATIC' , PATH_PUBLIC . 'static' . DS);
			define('PATH_THEMES' , PATH_PUBLIC . 'themes' . DS);

		}


		/**
		 * 初始化API常量
		 */
		private function initApiConst()
		{
			define('API_CODE_NAME' , 'code');
			define('API_MSG_NAME' , 'msg');
		}

		/**
		 * 初始化session常量标识
		 */
		private function sessionConst()
		{
			define('SESSOIN_TAG_USER' , 'user');
			define('SESSOIN_TAG_ROLE' , 'roles');
			define('SESSOIN_TAG_PRIVILEGES' , 'privileges');

			define('SESSOIN_TAG_ROLE_NAME' , 'rolesName');
			define('SESSOIN_TAG_ROLE_IDS' , 'rolesId');
		}


		/**
		 * 初始化动态配置信息
		 */
		private function initConfig()
		{
			$configList = autoCache('config_list' , Auth::createClosure([
				$this->logic__Common_Config ,
				'getAvailableConfig' ,
			]));

			//print_r($configList);exit;;
			array_map(function($info) {
				($info['is_const']) ? defined($info['field']) or define($info['field'] , $info['value']) : config($info['field'] , $info['value']);
				//return true;
			} , $configList);
		}


		/**
		 * 注册命名空间
		 */
		private function registerNamespace()
		{
			// 注册插件根命名空间

		}
	}
