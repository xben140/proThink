<?php

	namespace app\____ID__\model;


	class ____CONTEOLLER_NAME__ extends Base
	{
		//表名中有下划线时必须指定表名，不带ithink_前缀 如 blog_type
		public $name = '____TABLE_NAME__';

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
			//'status' => 1 ,
		];

		//更新时自动验证
		protected $update = [
			//'status' ,
		];


	}











