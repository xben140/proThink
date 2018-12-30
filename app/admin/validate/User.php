<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\admin\validate;

	class User extends Base
	{
		// 验证规则
		protected $rule = [
			'user'     => 'require|checkName|unique:user' ,
			'password' => 'require|checkName|confirm' ,
			'email'    => 'email' ,
			'phone'    => 'checkPhone' ,
			/*

						'user'     => 'require|checkName|unique:user' ,
						'password' => 'require|checkName|confirm' ,
						'email'    => 'require|email|unique:user' ,
						'phone'    => 'checkPhone|unique:user' ,

						*/
		];

		// 验证提示
		protected $message = [

			'user.require'   => '用户名允许字符为字母，数字，下划线，小数点，长度5-16位' ,
			'user.checkName' => '用户名允许字符为字母，数字，下划线，小数点，长度5-16位' ,
			'user.unique'    => '用户名已存在' ,

			'password.require'   => '密码允许字符为字母，数字，下划线，小数点，长度5-16位' ,
			'password.checkName' => '密码允许字符为字母，数字，下划线，小数点，长度5-16位' ,
			'password.confirm'   => '两次密码不一致' ,

			'email.require' => '邮箱不能为空' ,
			'email.email'   => '邮箱格式不正确' ,
			'email.unique'  => '邮箱已存在' ,

			'phone.unique'     => '手机号已存在' ,
			'phone.checkPhone' => '手机号格式不正确' ,
		];

		// 应用场景
		protected $scene = [
			'add' => [
				'user' ,
				'password' ,
				'email' ,
				'phone' ,
			] ,

			'edit' => [
				'email' ,
				'phone' ,
				//'age' => 'require|number|between:1,120',
			] ,


			'editPwd' => [
				'password' ,
			] ,


		];

	}

























