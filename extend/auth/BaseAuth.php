<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace auth;


	class BaseAuth
	{

		/**
		 * **********************************************************************************************************************
		 *                               属性处理通用
		 * **********************************************************************************************************************
		 */

		public $properties = [];


		/**
		 * 设置一个属性
		 *
		 * @param string|int $key
		 * @param  array     $value
		 *
		 * @return BaseAuth
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
		 *                               其他工具方法
		 * **********************************************************************************************************************
		 */


		/**
		 * @param string $key
		 *
		 * @return string
		 */
		public static function makeKey(string $key)
		{
			return ($key);
		}


		/**
		 * 调用规则类里的静态方法
		 * 返回静态方法名
		 * 直接传给 call_user_func_array
		 *
		 * @param $method
		 *
		 * @return string
		 */
		public static function callStatic($method)
		{
			return static::makeRuleClassName() . '::' . $method;
		}

		/**
		 * 调用规则类里的实例方法
		 * 返回静态方法名
		 * 直接传给 call_user_func_array
		 *
		 * @param $obj
		 * @param $method
		 *
		 * @return array
		 */
		public static function callDynamic($obj , $method)
		{
			return [
				$obj ,
				$method ,
			];
		}


		/**
		 * 构造对应规则类名
		 * @return string
		 */
		public static function makeRuleClassName()
		{
			return self::getNamespace(static::class) . '\Rule';
		}

		/**
		 * 匹配出命名空间
		 * app\common\tool\permission\Rule
		 *
		 * @param object|string $class
		 *
		 * @return string
		 */
		public static function getNamespace($class)
		{
			preg_match('%^(.+)(?=[\\\\/][^\//]+$)%im' , $class , $result);

			return $result[1];
		}


	}