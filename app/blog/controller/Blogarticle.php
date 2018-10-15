<?php

	namespace app\blog\controller;

	class Blogarticle extends BackendBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post , [
					[
						function(&$param) {
							$param['uid'] = getAdminSessionInfo('user' , 'id');
						} ,
						[] ,
					] ,
				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 */
		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
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


















