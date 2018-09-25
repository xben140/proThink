<?php

	namespace app\common\model;

	class Doc extends ModelBase
	{
		//public $name = '';

		//稿件类型
		public static $docIsconfirmMap = [
			[
				'value'   => 0 ,
				'field' => '未确认' ,
			] ,
			[
				'value'   => 1 ,
				'field' => '已确认' ,
			] ,
		];

		//稿件类型
		public static $docTypeMap = [
			[
				'value' => '0' ,
				'field' => '请选择',
			] ,
			[
				'value' => '1' ,
				'field' => '组稿',
			] ,
			[
				'value' => '2' ,
				'field' => '自稿',
			] ,
		];

		//稿件预状态
		public static $docPreStatus= [
			[
				'value' => '0' ,
				'field' => '待定',
				'color' => '',
			] ,
			[
				'value' => '1' ,
				'field' => '待处理',
				'color' => '#f00',
			] ,
			[
				'value' => '2' ,
				'field' => '已处理',
				'color' => '#0f0',
			] ,
		];


		//稿件状态映射
		//0:待定, 1:录用, 2:修改, 3:转到, 4:退款
		public static $docStatusMap = [
			[
				'value' => '0' ,
				'field' => '待定',
			] ,
			[
				'value' => '11' ,
				'field' => '审稿',
			] ,
			[
				'value' => '1' ,
				'field' => '录用',
			] ,
			[
				'value' => '2' ,
				'field' => '修改',
			] ,
			[
				'value' => '4' ,
				'field' => '退款',
			] ,
			[
				'value' => '12' ,
				'field' => '黄稿',
			] ,
			[
				'value' => '5' ,
				'field' => '上报',
			] ,
			[
				'value' => '6' ,
				'field' => '写作',
			] ,
			[
				'value' => '7' ,
				'field' => '排版',
			] ,
			[
				'value' => '8' ,
				'field' => '自审校',
			] ,
			[
				'value' => '9' ,
				'field' => '社审校',
			] ,
			[
				'value' => '3' ,
				'field' => '已收款',
			] ,
			[
				'value' => '13' ,
				'field' => '已出',
			] ,
			[
				'value' => '10' ,
				'field' => '完成',
			] ,
		];

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
			//'arrange_time' ,
		];

		//新增时自动验证
		protected $insert = [
			//'is_confirm' ,
		];

		protected $update = [
			//'status' ,
		];


		/**
		 * 根据指定字段查一条记录是否存在
		 *
		 * @param $field
		 * @param $value
		 *
		 * @return array|false|\PDOStatement|string|\think\Model
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function isFileExists($field, $value)
		{
			$where = [
				$field => [
					'=' ,
					$value ,
				] ,
			];
			$this->getAvailableOnly();
			return $this->findData([
				'where' => $where,
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
		 *arrange_time
		 * */

		public function setIsConfirmAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		public function setArrangeTimeAttr($val)
		{
			return strtotime($val);
		}

	}











	