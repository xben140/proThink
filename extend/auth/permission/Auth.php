<?php

	namespace auth\permission;

	use auth\BaseAuth;
	use auth\Auth as AuthTool;

	class Auth extends BaseAuth
	{
		public static $instance = null;

		const SESSOIN_TAG_ROLE = 'roles';
		const SESSOIN_TAG_PRIVILEGES = 'privielges';
		public $userInfo;
		public $currentUri;


		public static function getInstance($options = [])
		{
			is_null(static::$instance) && (static::$instance = new static($options));

			return static::$instance;
		}

		public function __construct($options)
		{

		}

		/**
		 * **********************************************************************************************************************
		 *                               用户信息
		 * **********************************************************************************************************************
		 */

		/**
		 * 设置用户信息
		 *
		 * @param null $key
		 * @param null $callback
		 * @param      $parameters
		 *
		 * @return mixed
		 */
		public function getUserInfo($key = null , $callback = null , $parameters = [])
		{
			$res = $data = isset($this->userInfo[$key]) ? $this->userInfo[$key] : $this->userInfo;

			if(is_callable($callback))
			{
				array_unshift($parameters , $data);
				$res = call_user_func_array($callback , $parameters);
			}

			return $res;
		}

		/**
		 * 获取用户指定字段
		 *
		 * @param mixed $userInfo
		 *
		 * @return Auth
		 */
		public function setUserInfo($userInfo)
		{
			$this->userInfo = $userInfo;

			return $this;
		}



		/**
		 * **********************************************************************************************************************
		 *                               角色信息
		 * **********************************************************************************************************************
		 */


		/**
		 * 设置用户拥有角色
		 *
		 * @param array $data
		 *
		 * @return Auth
		 */
		public function setRoles($data)
		{
			$this->setProperties(self::SESSOIN_TAG_ROLE , $data);

			return $this;
		}

		/**
		 * 返回用户所有的角色信息数组
		 * @return array
		 */
		public function getRoles()
		{
			return $this->getProperties(self::SESSOIN_TAG_ROLE);
		}


		/**
		 * 获取角色字段
		 *
		 * @param $field
		 *
		 * @return array
		 */
		public function getRolesFieldColumn($field)
		{
			return $this->getPropertiesFieldColumn(self::SESSOIN_TAG_ROLE , $field);;
		}


		/**
		 * id判断 是否有指定角色 或者关系
		 *
		 * @param array $roleIds
		 *
		 * @return boolean
		 */
		public function hasRoleByIds($roleIds = [])
		{
			return $this->hasPropertiesFieldOr(self::SESSOIN_TAG_ROLE , 'id' , $roleIds);
		}


		/**
		 * 返回角色id数组
		 * @return array
		 */
		public function getRoleByIds()
		{
			return $this->getRolesFieldColumn('id');
		}

		/**
		 * 角色事件注册机制
		 *
		 * @param array $option
		 */
		public function registerRoleEvent($option = [])
		{
			/*
						[
							'roles'    => [1, 2] ,
							'callback' => function($a, $b) {} ,
							'params'   => [
								'a' ,
								'b',
							] ,
						];
			*/

			foreach ($option as $k => $v)
			{
				if($this->hasRoleByIds($v['roles']))
				{
					!isset($v['params']) && $v['params'] = [];
					call_user_func_array($v['callback'] , $v['params']);
				}
			}
		}



		/**
		 * **********************************************************************************************************************
		 *                               权限信息
		 * **********************************************************************************************************************
		 */


		/**
		 * 当前方法是否允许访问
		 * @return bool
		 */
		public function isAllowAccess()
		{
			return $this->hasPermission($this->currentUri);
		}


		/**
		 * 返回用户所有的权限信息数组
		 * @return array
		 */
		public function getPrivileges()
		{
			return self::addLevel($this->getProperties(self::SESSOIN_TAG_PRIVILEGES));
		}

		/**
		 * 设置用户拥有权限
		 *
		 * @param array $data
		 *
		 * @return Auth
		 */
		public function setPrivileges($data)
		{
			$this->setProperties(self::SESSOIN_TAG_PRIVILEGES , $data);

			return $this;
		}

		/**
		 * 追加权限 直接从数据库查出来没处理的结构
		 *
		 * @param array $data
		 *
		 * @return Auth
		 */
		public function appendPrivileges($data)
		{
			$data_ = $this->getPrivileges();

			$this->setProperties(self::SESSOIN_TAG_PRIVILEGES , array_merge($data_ , $data));

			return $this;
		}


		/**
		 * 获取权限字段
		 *
		 * @param $field
		 *
		 * @return array
		 */
		public function getPrivilegesFieldColumn($field)
		{
			return $this->getPropertiesFieldColumn(self::SESSOIN_TAG_PRIVILEGES , $field);;
		}


		/**
		 * 权限生成数组
		 * @return array
		 */
		public function getPrivilegesMap()
		{
			$properties = $this->getProperties(self::SESSOIN_TAG_PRIVILEGES , function($data) {
				return array_map(function($v) use ($data) {
					return static::formatMenu($v['module'] , $v['controller'] , $v['action']);
				} , $data);
			});

			return $properties;
		}

		/**
		 * 判断是否有指定菜单权限
		 *
		 * @param $currentAction
		 *
		 * @return bool
		 */
		public function hasPermission($currentAction)
		{
			$menuMap = $this->getPrivilegesMap();

			AuthTool::addRule('authPrivilege' , [
				static::callStatic('authPrivilege') ,
				[
					$currentAction ,
					$menuMap ,
				] ,
				'未授权的访问' ,
			]);

			AuthTool::pushGroup('authPrivilege' , 'authPermission');

			return AuthTool::execGroupAnd('authPermission');
		}


		/**
		 * 生成菜单树
		 * @return array
		 */
		public function getMenuTree()
		{
			$privileges = $this->getPrivileges();

			return self::makeMenuTree($privileges);
		}


		/**
		 * 添加等级段
		 *
		 * @param        $data
		 * @param int    $id
		 * @param int    $level
		 * @param string $parentField
		 *
		 * @return array
		 */
		public static function addLevel($data , $id = 0 , $level = 1 , $parentField = 'pid')
		{
			static $result = [];
			foreach ($data as $k => $v)
			{
				if($v[$parentField] == $id)
				{
					$v['level'] = $level;
					$result[] = $v;
					self::addLevel($data , $v['id'] , $level + 1 , $parentField);
				}
			}

			return $result;
		}
		/**
		 * **********************************************************************************************************************
		 *                               当前uri
		 * **********************************************************************************************************************
		 */

		/**
		 * @param string $currentUri
		 *
		 * @return Auth
		 */
		public function setCurrentUri($currentUri)
		{
			$this->currentUri = $currentUri;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCurrentUri()
		{
			return $this->currentUri;
		}



		/**
		 * **********************************************************************************************************************
		 *                               其他
		 * **********************************************************************************************************************
		 */

		/**
		 * @param $a
		 * @param $b
		 * @param $c
		 *
		 * @return string
		 */
		public static function formatMenu($a , $b , $c)
		{
			return strtolower($a . '/' . $b . '/' . $c);
		}

		/**
		 * 生成菜单树
		 *
		 * @param     $items
		 * @param int $id
		 *
		 * @return array
		 */
		public static function makeMenuTree($items , $id = 0)
		{
			$tree = array();
			foreach ($items as $k1 => $v1)
			{
				if($v1['pid'] == $id)
				{
					$v1['path'] = self::formatMenu($v1['module'] , $v1['controller'] , $v1['action']);
					$v1['son'] = self::makeMenuTree($items , $v1['id']);
					$tree[] = $v1;
				}
			}

			return $tree;
		}

	}