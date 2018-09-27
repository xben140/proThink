<?php

	namespace app\doc\validate;

	class Address extends DocBase
	{

		// 验证规则
		protected $rule = [
			'name' => 'require' ,
			'tel'  => 'require|checkPhone' ,
		];

		// 验证提示
		protected $message = [
			'name.require'   => '联系人名必须填写' ,
			'tel.require'    => '手机格式不正确' ,
			'tel.checkPhone' => '手机格式不正确' ,

			'province_id.number' => '格式不正确' ,
			'city_id.number'     => '格式不正确' ,
			'county_id.number'   => '格式不正确' ,
		];

		// 应用场景
		protected $scene = [
			'add'  => [
				'name' ,
				'tel' ,
			] ,
			'edit' => [
				'province_id' => 'number' ,
				'city_id'     => 'number' ,
				'county_id'   => 'number' ,
				//'tel' ,
			] ,
		];

	}

























