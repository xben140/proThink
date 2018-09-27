<?php

	namespace app\doc\model;

	class Journaltype extends DocBase
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
		protected $insert = [
			//'status' ,
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



		/**
		 *  用户id  --> 拥有的刊物ids
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getJournalTypeIdByUserId($id)
		{
			$where = [
				'b.user_id' => [
					'=' ,
					$id ,
				] ,
			];

			$join = [
				[
					'ithink_user_juornaltype b ' ,
					self::makeSelfAliasField('id') . '  = b.type_id ' ,
					'left',
				] ,
			];
			$condition = [
				'where' => $where ,
				'join'  => $join ,
			];

			$this->getAvailableOnly();
			$this->getActivedOnly();
			$this->setCondition($condition);
			$data = $this->column('b.type_id');
			$data = array_flip(array_flip($data));

			return $data;
		}

	}











	