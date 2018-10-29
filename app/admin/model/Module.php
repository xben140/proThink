<?php

	namespace app\admin\model;

	class Module extends Base
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

		public static $appStatusMap = [
			[
				'color' => '#ccc' ,
				'value' => 0 ,
				'field' => '未安装' ,
			] ,
			[
				'color' => '#0f0' ,
				'value' => 1 ,
				'field' => '已安装' ,
			] ,
			[
				'color' => '#f00' ,
				'value' => 2 ,
				'field' => '信息残缺，需重新安装' ,
			] ,
		];

		//自动完成[新增和修改时都会执行]
		protected $auto = [];

		//新增时自动验证
		protected $insert = [];


		//修改时自动验证
		protected $update = [//'status' ,
		];


		/*
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 * */


	}
















