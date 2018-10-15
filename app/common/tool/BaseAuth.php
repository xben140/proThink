<?php

	namespace app\common\tool;

	use app\common\common\set;

	class BaseAuth
	{
		use set;


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
			return getNamespace(static::class) . '\Rule';
		}

	}