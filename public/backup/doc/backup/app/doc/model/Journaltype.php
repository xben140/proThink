<?php

	namespace app\doc\model;

	class Journaltype extends Base
	{
		public $name = 'journal_type';

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
		protected $insert = [//'status' ,
		];

		protected $update = [
			//'is_common' ,
			//'is_menu' ,
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
		 *
		 *
		 * */


	}











	