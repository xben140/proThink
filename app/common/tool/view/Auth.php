<?php

	namespace app\common\tool\view;

	use app\common\tool\BaseAuth;
	use auth\Auth as AuthTool;

	class Auth extends BaseAuth
	{
		public static $instance = null;

		//组标识
		//角色，状态，类型。。。
		public static $tagMap = 'tagMap';

		//元素标识
		//每个元素
		public static $elementsMap = 'elementsMap';

		public $properties = [];
		public $status = [];
		public $currentUri = null;


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
		 *                               元素处理
		 * **********************************************************************************************************************
		 **/


		/**
		 * 注册标识
		 *
		 * @param  array $val
		 */
		public function registerElementsMark($val)
		{
			//角色枚举标识
			static::registerTag($val , static::$elementsMap);
		}


		/**
		 * **********************************************************************************************************************
		 *                               标识处理
		 * **********************************************************************************************************************
		 **/


		/**
		 * 指定标识赋值
		 *
		 * @param $key
		 * @param $val
		 */
		public function setTagMapMark($key , $val)
		{
			//添加角色数据
			$this->setProperties(static::getTag($key , static::$tagMap) , $val);
		}

		/**
		 * 指定标识取值
		 *
		 * @param $key
		 *
		 * @return array
		 */
		public function getTagMapMark($key)
		{
			//添加角色数据
			return $this->getProperties(static::getTag($key , static::$tagMap));
		}


		/**
		 * 自动注册标识
		 *
		 * @param  string     $key
		 * @param  array      $val
		 * @param  string|int $label
		 */
		public function autoRegisterTagMark($key , $val , $label)
		{
			//枚举标识
			$this->registerTagMark([$key => $label]);
			//数据
			$this->setTagMapMark($key , $val);
		}


		/**
		 * 批量自动注册标识
		 *
		 * @param array $data
		 */
		public function autoRegisterTagMarkArray($data = [])
		{
			foreach ($data as $k => $v)
			{
				//枚举标识
				$this->registerTagMark([$v['key'] => $v['label']]);
				//数据
				$this->setTagMapMark($v['key'] , $v['value']);
			}
		}


		/**
		 * 注册标识
		 *
		 * @param  array $val
		 */
		public function registerTagMark($val)
		{
			//角色枚举标识
			static::registerTag($val , static::$tagMap);
		}


		/**
		 * **********************************************************************************************************************
		 *                               验证
		 * **********************************************************************************************************************
		 */


		/**
		 * 注册标识
		 *
		 * @param string $element 对应验证的元素
		 * @param string $type    元素对应的属性值，是否显示，是否启用等
		 *
		 * @return mixed
		 */
		public function checkRule($element , $type)
		{
			$obj = controller(static::makeRuleClassName());

			AuthTool::addRule('setRules' , [
				static::callDynamic($obj, 'setRules') ,
				[
					config('rule') ,
				] ,
				'规则文件读取出错' ,
			]);

			AuthTool::addRule('getRule' , [
				static::callDynamic($obj, 'getRule') ,
				[
					$this->currentUri ,
					$this->status,
					$element,
				] ,
				'规则获取出错' ,
			]);

			AuthTool::pushGroup('setRules' , 'calcRules');
			AuthTool::pushGroup('getRule' , 'calcRules');

			$rules =  AuthTool::execGroup('calcRules');

			$res = $rules[1]['result'][$type];

			return $res;

		}

		/**
		 * 设置状态
		 *
		 * @param array $status 各个状态值
		 *
		 * @return Auth
		 */
		public function setStatus($status)
		{
			$this->status = $status;

			return $this;
		}


		/**
		 * 设置当前uir，那个方法
		 *
		 * @param null $currentUri
		 *
		 * @return Auth
		 */
		public function setCurrentUri($currentUri)
		{
			$this->currentUri = $currentUri;

			return $this;
		}



		/**
		 * **********************************************************************************************************************
		 *                               属性处理通用
		 * **********************************************************************************************************************
		 */

		/**
		 * 设置一个属性
		 *
		 * @param string|int $key
		 * @param  array     $value
		 *
		 * @return Auth
		 */
		public function setProperties($key , $value)
		{
			/*
						[
							[
								'id'   => '1' ,
								'name' => '编辑' ,
							] ,
							[
								'id'   => '2' ,
								'name' => '采编' ,
							] ,
						];
			*/
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
		 *                               标识管理
		 * **********************************************************************************************************************
		 */


		/**
		 * @param array  $tags
		 * @param string $group
		 */
		public static function registerTag($tags = [] , $group = 'base')
		{
			foreach ($tags as $k => $v)
			{
				\auth\Auth::setGlobalParams($k , $v , $group);
			}
		}

		/**
		 * @param        $key
		 * @param string $group
		 *
		 * @return array|bool
		 */
		public static function getTag($key , $group = 'base')
		{
			return \auth\Auth::getGlobalParams($key , $group);
		}

		/**
		 * @param string $group
		 *
		 * @return array|bool
		 */
		public static function getGroupTag($group = 'base')
		{
			return \auth\Auth::getGlobalParamsByGroupName($group);
		}

		/**
		 * **********************************************************************************************************************
		 *                               其他
		 * **********************************************************************************************************************
		 */


	}