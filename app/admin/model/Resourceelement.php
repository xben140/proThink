<?php

	namespace app\admin\model;

	class Resourceelement extends AdminBase
	{
		public $name = RESOURCE_ELEMENT;
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
		protected $insert = [];

		protected $update = [
			//'status' ,
			//'is_common' ,
			//'is_menu' ,
		];


	}











	