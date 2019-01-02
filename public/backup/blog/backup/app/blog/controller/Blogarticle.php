<?php

	/*
	+---------------------------------------------------------------------+
	| iThink        | [ WE CAN DO IT JUST THINK ]                         |
	+---------------------------------------------------------------------+
	| Official site | http://www.ithinkphp.org/                           |
	+---------------------------------------------------------------------+
	| Author        | hello wf585858@yeah.net                             |
	+---------------------------------------------------------------------+
	| Repository    | https://gitee.com/wf5858585858/iThink               |
	+---------------------------------------------------------------------+
	| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
	+---------------------------------------------------------------------+
	*/



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
				$id = session('blog_id');
				$this->jump($this->logic->edit($this->param , $id, [
					[
						//删除之前的标签
						function($id) {
							return db('blog_article_tag')->where('article_id' , $id)->delete() !== false;
						} ,
						[$id] ,
					] ,
					[
						//添加新标签
						function($tags , $id) {
							foreach ($tags as $v)
							{
								db('blog_article_tag')->insert([
									'article_id' => $id ,
									'tag_id' => $v ,
								]);
							}

							return true;
						} ,
						[
							$this->param['tags'] ,
							$id ,
						] ,
					] ,
				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function editContent()
		{
			session('blog_id', $this->param['id']);
			return $this->makeView($this);
		}

		public function preview()
		{
			session('blog_id', $this->param['id']);
			return $this->makeView($this);
		}


		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [/*
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


















