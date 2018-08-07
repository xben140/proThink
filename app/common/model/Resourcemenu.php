<?php

	namespace app\common\model;

	class Resourcemenu extends ModelBase
	{
		public $name = 'resource_menu';

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


		public function getDefaultAction()
		{
			$this->getAvailableOnly();
			$this->setCondition([
				'where' => [
					self::makeSelfAliasField('action') => 'none' ,
				] ,
			]);


			$data = $this
				//->fetchSql(1)
				->select();

			//collection
			return $data;
		}


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


		public function setIsCommonAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		public function setIsMenuAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}



	}











	