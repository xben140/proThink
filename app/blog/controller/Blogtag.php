<?php

	namespace app\blog\controller;

	class Blogtag extends BackendBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}



		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				/*
				[
					function($param) {
						//当前组下还有配置就不许删除
						return !db('config')->where([
							'group_id' => [
								'in' ,
								$param['ids'] ,
							] ,
						])->find();
					} ,
					[] ,
					'当前组下还有配置，不能删除' ,
				] ,

				*/
			]));
		}

	}


















