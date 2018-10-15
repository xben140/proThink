<?php

	namespace app\common\tool\permission;

	use app\common\tool\BaseAuth;
	use auth\Auth as AuthTool;

	class Auth extends BaseAuth
	{
		public static $instance = null;

		public $userInfo;
		public $properties;
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
			$this->setProperties(SESSOIN_TAG_ROLE , $data);

			return $this;
		}

		/**
		 * 返回用户所有的角色信息数组
		 * @return array
		 */
		public function getRoles()
		{
			return $this->getProperties(SESSOIN_TAG_ROLE);
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
			return $this->getPropertiesFieldColumn(SESSOIN_TAG_ROLE , $field);;
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
			return $this->hasPropertiesFieldOr(SESSOIN_TAG_ROLE , 'id' , $roleIds);
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
		 * **********************************************************************************************************************
		 *                               权限信息
		 * **********************************************************************************************************************
		 */

		/**
		 * 返回用户所有的权限信息数组
		 * @return array
		 */
		public function getPrivileges()
		{
			return $this->getProperties(SESSOIN_TAG_PRIVILEGES);
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
			$this->setProperties(SESSOIN_TAG_PRIVILEGES , $data);

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
			return $this->getPropertiesFieldColumn(SESSOIN_TAG_PRIVILEGES , $field);;
		}

		/**
		 * 权限生成数组
		 * @return array
		 */
		public function getMenu()
		{
			$properties = $this->getProperties(SESSOIN_TAG_PRIVILEGES , function($data) {
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
			$menuMap = $this->getMenu();

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
		 * 当前方法是否允许访问
		 * @return bool
		 */
		public function isAllowAccess()
		{
			return $this->hasPermission($this->currentUri);
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
		 *                               属性处理通用
		 * **********************************************************************************************************************
		 */

		/**
		 * 设置一个属性
		 *
		 * @param $key
		 * @param $value
		 *
		 * @return Auth
		 */
		public function setProperties($key , $value)
		{
			$this->properties[static::makeKey($key)] = $value;

			return $this;
		}

		/**
		 *    获取指定属性
		 *
		 * @param string $key
		 * @param null   $callback
		 * @param        $parameters
		 *
		 * @return mixed
		 */
		public function getProperties($key = '' , $callback = null , $parameters = [])
		{
			$res = $data = isset($this->properties[static::makeKey($key)]) ? $this->properties[static::makeKey($key)] : $this->properties;

			if(is_callable($callback))
			{
				array_unshift($parameters , $data);
				$res = call_user_func_array($callback , $parameters);
			}

			return $res;
		}

		/**
		 * 删除指定属性
		 *
		 * @param $key
		 */
		public function delProperties($key)
		{
			unset($this->properties[static::makeKey($key)]);
		}


		/**
		 * 反回指定属性的指定列
		 *
		 * @param $key
		 * @param $field
		 *
		 * @return array
		 */
		public function getPropertiesFieldColumn($key , $field)
		{
			$properties = $this->getProperties($key , function($data , $field) {
				return array_map(function($v) use ($field) {
					return $v[$field];
				} , $data);
			} , [$field]);

			return $properties;
		}

		/**
		 * @param string               $key
		 * @param string               $field
		 * @param integer|string|array $value
		 *
		 * @return bool
		 */
		public function hasPropertiesFieldAnd($key , $field , $value)
		{
			(!is_array($value) && ($value = [(int)$value]));
			$propertiesColumn = $this->getPropertiesFieldColumn($key , $field);

			$flag = true;
			foreach ($value as $k => $v)
			{
				if(!in_array($propertiesColumn , $v))
				{
					$flag = false;
					break;
				}
			}

			return $flag;
		}

		/**
		 * @param string               $key
		 * @param string               $field
		 * @param integer|string|array $value
		 *
		 * @return bool
		 */
		public function hasPropertiesFieldOr($key , $field , $value)
		{
			(!is_array($value) && ($value = [(int)$value]));
			$propertiesColumn = $this->getPropertiesFieldColumn($key , $field);

			$flag = false;
			foreach ($value as $k => $v)
			{
				if(in_array($v , $propertiesColumn))
				{
					$flag = true;
					break;
				}
			}

			return $flag;
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

	}