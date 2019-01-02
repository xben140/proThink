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



	namespace app\blog\controller\api;

	class Article extends ApiBase
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->logic = $this->logic__blog_blogarticle;
		}

		//http://local2.cc/blog/api.Article/getArticle
		public function getArticle()
		{
			$data = $this->logic->dataList();
			return jsonp($data);
		}
	}