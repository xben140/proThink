<?php

	namespace app\common\model;

	class User extends ModelBase
	{
		/**
		 *  初始化模型
		 * @access protected
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		//自动完成[新增和修改时都会执行]
		protected $auto = [
		];

		//新增时自动验证
		protected $insert = [
			'reg_ip'           => IP ,
			'last_login_ip'    => 0 ,
			'last_online_time' => 0 ,
			'last_login_time'  => 0 ,
			'login_count'      => 0 ,
			'user_type'        => 1 ,
		];

		public $update = [
			//'status' ,
		];


	}