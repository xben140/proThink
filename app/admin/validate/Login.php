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

			'username.require'   => '用户名或密码填写错误' ,
			'username.checkName' => '用户名或密码填写错误' ,

			'password.require'   => '用户名或密码填写错误' ,
			'password.checkName' => '用户名或密码填写错误' ,

			'captcha.require'  => '验证码填写不正确' ,
			'captcha.alphaNum' => '验证码填写不正确' ,
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

























