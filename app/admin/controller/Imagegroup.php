<?php

	namespace app\admin\controller;

	class Imagegroup extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();
		}


		/**
		 * @throws \Exception
		 */
		public function delete()
		{

			return $this->jump($this->logic->delete($this->param , [
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
			]));
		}

	}


















