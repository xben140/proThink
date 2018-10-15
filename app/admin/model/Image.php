<?php

	namespace app\admin\model;

	class Image extends Base
	{
		//public $name = '';


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
		protected $auto = [//'arrange_time' ,
		];

		//新增时自动验证
		protected $insert = [//'is_confirm' ,
		];

		protected $update = [//'status' ,
		];


		/**
		 * 根据指定字段查一条记录是否存在
		 *
		 * @param $field
		 * @param $value
		 *
		 * @return array|false|\PDOStatement|string|\think\Model
		 */
		public function isFileExists($field , $value)
		{
			$where = [
				$field => [
					'=' ,
					$value ,
				] ,
			];
			$this->getAvailableOnly();

			return $this->findData([
				'where' => $where ,
			]);
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
		/*
				public function setIsConfirmAttr($val)
				{
					return !is_null($val) ? $val : 0;
				}*/

	}











	