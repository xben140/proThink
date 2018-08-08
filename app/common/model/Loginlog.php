<?php

	namespace app\common\model;

	class Loginlog extends ModelBase
	{
		public $name = 'login_log';

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
		protected $auto = [];

		//新增时自动验证
		protected $insert = [
			'ip'         => IP ,
		];

		public $update = [//'status' ,
		];

	}
