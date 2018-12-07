<?php

	namespace app\admin\validate;


	class Login extends Base
	{

		// 验证规则
		protected $rule = [
			'username' => 'require|checkName' ,
			'password' => 'require|checkName' ,
			'captcha'  => 'require|alphaNum' ,
		];

		// 验证提示
		protected $message = [

			'username.require'   => '用户名与密码不匹配' ,
			'username.checkName' => '用户名与密码不匹配' ,

			'password.require'   => '用户名与密码不匹配' ,
			'password.checkName' => '用户名与密码不匹配' ,

			'captcha.require'  => '验证码不正确' ,
			'captcha.alphaNum' => '验证码不正确' ,
		];

		// 应用场景
		protected $scene = [
			'login' => [
				'username' ,
				'password' ,
				'captcha' ,
			] ,

		];

	}

























