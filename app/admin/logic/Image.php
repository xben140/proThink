<?php

	namespace app\admin\logic;


	class Image extends AdminBase
	{
		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * @param $hash
		 *
		 * @return mixed
		 */
		public function fileExistsByHash($hash)
		{
			return $this->model_->isFileExists('hash' , $hash);
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
			$join = [];
			$field = [];


			$order_filed = 'id';
			$order_ = 'asc';
/*
			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'title' :
					case 'author' :
					case 'journal_name' :
						$v != '' && $where[$this->model_::makeSelfAliasField($k)] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'nickname' :
						$v != '' && $where['b.nickname'] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'a' :
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

					case 'year' :
					case 'month' :
					case 'doc_type' :
					case 'journal_type' :
					case 'doc_status' :
					case 'is_pending' :
					case 'is_confirm' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;


					case 'start_p' :
						$v != '' && $start_p = (floatval($v));
						break;

					case 'end_p' :
						$v != '' && $end_p = floatval($v);
						break;

					case 'reg_time_begin' :
						$v != '' && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v != '' && $reg_time_end = strtotime($v);
						break;


					default :
						#...
						break;
				}
			}*/


			$order[$order_filed] = $order_;


			return $condition = [
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}

	}