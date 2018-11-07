<?php

	namespace app\blog\validate;


	class Blogarticle extends Base
	{

		// 验证规则
		protected $rule = [
			'title' => 'require' ,
			//'password' => 'require|checkName' ,
			//'captcha'  => 'require|alphaNum' ,
		];

		// 验证提示
		protected $message = [

			'title.require' => '标题必须填写' ,

		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'title' ,
			] ,
			'edit' => [
				'title' ,
			] ,

		];


	}

























