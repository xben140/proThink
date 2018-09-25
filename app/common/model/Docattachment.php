<?php

	namespace app\common\model;

	class Docattachment extends ModelBase
	{
		public $name = 'doc_attachment';

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


		public function setIsCommonAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		 * */

		/**
		 *  doc id  --> attachment id
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getAttachmentsIdByDocId($id)
		{
			$where = [
				self::makeSelfAliasField('doc_id') => [
					'=' ,
					$id ,
				] ,
			];

			$condition = [
				'where' => $where ,
			];

			$this->getAvailableOnly();
			$this->getActivedOnly();
			$this->setCondition($condition);
			$data = $this->column(self::makeSelfAliasField('id'));
			$data = array_flip(array_flip($data));

			return $data;
		}


		/**
		 *  doc id  --> 附件信息
		 *
		 * @param $id
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getAttachmentsByDocId($id)
		{
			$attachmentsIds = $this->getAttachmentsIdByDocId($id);

			$data = $this->getAttachmentsByIds($attachmentsIds);
			return $data;
		}

		/**
		 *  attachment id  --> 附件信息
		 *
		 * @param $attachmentsIds
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getAttachmentsByIds($attachmentsIds)
		{
			$data = $this->selectData([
				'where' => [
					'id' => [
						'in' ,
						$attachmentsIds ,
					] ,
				] ,
			]);

			return $data;
		}
	}











	