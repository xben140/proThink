<?php

	namespace app\blog\model;


	class Blogarticle extends Base
	{
		public $name = 'blog_article';

		//
		public static $articleCategory = [
			[
				'value' => '1' ,
				'field' => '文章' ,
			] ,
			[
				'value' => '2' ,
				'field' => '单页' ,
			] ,
		];

		//
		public static $articleSourceType = [
			[
				'value' => '1' ,
				'field' => '文本编辑器' ,
			] ,
			[
				'value' => '2' ,
				'field' => '模板页面' ,
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

		];

		//新增时自动验证
		protected $insert = [
			'status' => 1 ,
			'is_published' ,
		];

		protected $update = [
			//'is_common' ,
			//'status' ,
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
		/**
		 * 所有表添加时自动修正status字段
		 *
		 * @param $val
		 *
		 * @return int
		 */
		public function setIsPublishedAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		/**
		 * @param $value 
		 *
		 * @return string
		 */
		public function getContentAttr($value)
		{
			$value = htmlspecialchars_decode($value);
			$value = html_entity_decode($value);
			$value = stripslashes($value);

			return $value;
		}

	}