<?php

	namespace app\common\validate;

	use think\Validate;

	class ValidateBase extends Validate
	{

		/**
		 * 正则验证用户名和密码
		 *
		 * @param $value
		 * @param $rule
		 * @param $data
		 *
		 * @return false|int
		 */
		protected function checkName($value , $rule , $data)
		{
			return (boolean)preg_match('#^[a-z\d._]{5,16}$#i' , $value);
		}

		/**
		 * 正则验证手机号码
		 *
		 * @param $value
		 * @param $rule
		 * @param $data
		 *
		 * @return false|int
		 */
		protected function checkPhone($value , $rule , $data)
		{
			return (boolean)preg_match('#^1\d{10}$#i' , $value);
		}
	}