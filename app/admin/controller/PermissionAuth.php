<?php

	namespace app\admin\controller;

	use app\common\tool\view\Auth as AuthTool;
	use auth\Auth;

	class PermissionAuth extends Base
	{
		//admin信息
		public $adminInfo;


		//当前uir admin/index/index
		public $currentUri;

		//rbac验证类
		public $authClass;

		//rbac验证类
		public $viewClass;

		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * @throws \Exception
		 */
		public function _initialize()
		{
			parent::_initialize();

			$this->_authIsLogin();
			$this->_initEnv();
			$this->_authUserStatus();
			$this->_initAuthClass();
			//$this->_authIp();
			$this->_authPrivilege();
		}


		//登陆验证

		/**
		 * @throws \think\exception\HttpResponseException
		 */
		private function _authIsLogin()
		{
			!isAdminLogin() && $this->redirect(SYS_NON_LOGIN_INDEX);
		}


		//用户基础资料
		private function _initEnv()
		{
			$this->adminInfo = getAdminSessionInfo(SESSOIN_TAG_USER);
			$this->assign('adminInfo' , $this->adminInfo);
		}

		//用户状态验证

		/**
		 * @throws \Exception
		 */
		private function _authUserStatus()
		{
			if(!$this->logic__admin_User->model_->isValidateUser($this->adminInfo))
			{
				exception('用户状态异常，请联系管理员' , 403);
			}
		}

		/**
		 *初始化权限信息
		 */
		private function _initAuthClass()
		{
			/**
			 * ************************************************************************
			 *    rbac
			 * ************************************************************************
			 */

			//权限验证类
			$this->authClass = \app\common\tool\permission\Auth::getInstance();

			//当前请求方法
			$this->currentUri = $this->authClass::formatMenu(MODULE_NAME , CONTROLLER_NAME , ACTION_NAME);
			$this->authClass->setCurrentUri($this->currentUri);

			//当前用户信息
			$this->authClass->setUserInfo($this->adminInfo);

			//当前用户拥有的角色
			$this->authClass->setRoles(getAdminSessionInfo(SESSOIN_TAG_ROLE));

			//当前用户拥有的权限
			$this->authClass->setPrivileges(getAdminSessionInfo(SESSOIN_TAG_PRIVILEGES));

			/*
						$a = $this->authClass->getPrivilegesFieldColumn('controller');
						$a = $this->authClass->hasRoleByIds([1,2]);

						$a = $this->authClass->getMenu();

						$this->authClass->getUserInfo('id', function($data, $d) {
							return $data * $d;
						}, [3]);
			*/


			/**
			 * ************************************************************************
			 *    视图分配
			 * ************************************************************************
			 */

			//视图分配处理类
			$this->viewClass = AuthTool::getInstance();

			//角色
			$roles = $this->logic__admin_role->getActivedData(['no_global_admin' => 0 ,]);
			$this->viewClass->autoRegisterTagMark('VIEW_ASSIGE_TAG_ROLE' , array_map(function($data) {
				return [
					'id'   => $data['id'] ,
					'name' => $data['name'] ,
				];
			} , $roles) , 1);

			//$a = $this->viewClass::getGroupTag($this->viewClass::$tagMap);
			//$a = $this->viewClass->getProperties();
			//$a = $this->viewClass->getTagMapMark('VIEW_ASSIGE_TAG_ROLE');
		}

		//用户权限验证

		/**
		 * @throws \Exception
		 */
		private function _authPrivilege()
		{
			if(!$this->authClass->isAllowAccess())
			{
				exception(Auth::getError() , 403);
			}
		}


		/**
		 *            工具方法
		 */


		/**
		 * 设置是否显示对应按钮
		 *
		 * @param $a
		 * @param $b
		 * @param $c
		 *
		 * @return mixed
		 */
		protected function isButtonDisplay($a , $b , $c)
		{
			return $this->authClass->hasPermission($this->authClass::formatMenu($a , $b , $c));
		}

		/**
		 * 角色事件注册机制
		 *
		 * @param array $option
		 */
		protected function registerRoleEvent($option = [])
		{
/*
			[
				'roles'    => [
					1 ,
					2,
				] ,
				'callback' => function() { } ,
				'params'   => [
					'a' ,
					'b' ,
				] ,
			];
*/

			foreach ($option as $k => $v)
			{
				if($this->authClass->hasRoleByIds($v['roles']))
				{
					!isset($v['params']) && $v['params'] = [];
					call_user_func_array($v['callback'] , $v['params']);
				}
			}
		}
	}












