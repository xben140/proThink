<?php

	namespace app\common\logic;

	/**
	 * Class User
	 * @package app\common\logic
	 */
	class Docattachment extends LogicBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 稿件id获取稿件附件
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getAttachmentsByDocId($param)
		{
			$data = $this->model_->getAttachmentsByDocId($param['id']);

			return $data->toArray();
		}

		/**
		 * 稿件id获取稿件附件
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getAttachmentsByIds($param)
		{
			$data = $this->model_->getAttachmentsByIds($param['ids']);

			return $data->toArray();
		}


		/**
		 * @param $param
		 *
		 * @return array
		 */
		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = 'id';
			$order_ = 'asc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'user' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'=' ,
							$v ,
						];
						break;

					case 'order_filed' :
						$v != '' && $order_filed = $v;
						break;

					case 'order' :
						$v != '' && $order_ = $v;
						break;

					case 'nickname' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'reg_time_begin' :
						$v != '' && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v != '' && $reg_time_end = strtotime($v);
						break;

					case 'status' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;

					default :
						#...
						break;
				}
			}

			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end ,
				] ,
			];

			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
			];
		}
	}