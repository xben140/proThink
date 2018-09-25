<?php

	namespace app\common\model;

	class Area extends ModelBase
	{
		/**
		 *  初始化模型
		 * @access protected
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		public function getAreaByPid($pid)
		{
			$this->setCondition([
				'alias' => self::$currentTableAlias ,
				'where' => [
					self::makeSelfAliasField('pid') => $pid ,
				] ,
			]);
			$data = $this->select();

			//collection
			return $data;
		}
	}