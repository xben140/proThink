<?php

	namespace app\blog\controller;

	class Index extends FrontendBase
	{
		public function __construct()
		{
			parent::__construct();
			$this->logic = $this->logic__blog_blogarticle;
			$this->param['is_published'] = '1';
			$this->initCommon();
		}

		/**
		 * @return mixed
		 * http://local14.cc/blog/index/index/keyword/%E6%AD%A3%E5%88%99
		 * http://local14.cc/blog/keyword/%E6%AD%A3%E5%88%99
		 * http://local14.cc/blog/index/index/tags/6
		 * http://local14.cc/blog/tags/6
		 * http://local14.cc/blog/index/index/type/7
		 * http://local14.cc/blog/type/7
		 * http://local14.cc/blog/index/detail/id/7
		 * http://local14.cc/detail/5
		 */


		public function index()
		{
			//类型查询
			//?type=6

			//标签
			//?tags=5

			//关键词
			//?keyword=正则

			//博文列表
			$data = $this->logic->dataListWithPagination($this->param , function($item) {
				$item['tagsArray'] = $this->logic->getArticleTags(['id' => $item['id']]);
				$item['thumb'] = generateProfilePicPath($item['thumbnail'] , 1);
			});

			if(input('type') > 0) $this->assign('mate' , '类型‘'.$this->logic__blog_blogtype->model_->where(['id' => input('type') ,])->value('name').'’的结果');
			if(input('tags') > 0) $this->assign('mate' , '标签‘'.$this->logic__blog_Blogtag->model_->where(['id' => input('tags') ,])->value('name').'’的结果');
			if(input('keyword') ) $this->assign('mate' , '‘'.input('keyword').'’的搜索结果');

			//print_r($data);exit;;
			$this->assign('data' , $data['data']);
			$this->assign('title' , 'bolg');
			$this->assign('pagination' , $data['pagination']);

			return $this->fetch();
		}

		public function detail()
		{
			//http://local14.cc/blog/index/detail?id=7
			//http://local14.cc/detail/5

			//详情
			//?id=7
			$a = $this->param;

			$data = $this->logic->dataListWithPagination($this->param , function($item) {
				$item['tagsArray'] = $this->logic->getArticleTags(['id' => $item['id']]);
				$item['thumb'] = generateProfilePicPath($item['thumbnail'] , 0);
			});

			$this->assign('title' , 'bolg');
			$this->assign('content' , $data['data'][0]);

			return $this->fetch();
		}

		private function initCommon()
		{
			$this->assign('mate', '');

			//博客名
			$blog_name = config('blog_name');
			$this->assign('blog_name' , $blog_name);

			//关键词
			$this->assign('keyword' , input('keyword' , ''));

			//所有标签
			$tags = $this->logic__blog_Blogtag->getActivedData();
			$this->assign('tags' , $tags);

			//所有类型
			$types = $this->logic__blog_blogtype->dataList();
			$types = makeTree($types);
			$this->assign('types' , $types);

			//相关文章
		}
	}















