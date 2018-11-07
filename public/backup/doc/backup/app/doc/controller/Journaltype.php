<?php

	namespace app\doc\controller;

	class Journaltype extends BackendBase
	{

		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [
				[
					//当前稿件类型下还有没有稿件
					function(&$param) {
						$res = db('doc')->where([
							'journal_type' => [
								'in' ,
								$param['ids'] ,
							] ,
						])->find();

						return !$res;
					} ,
					[] ,
					'当前刊物下还有稿件，不能删除' ,
				] ,
			]));
		}
	}