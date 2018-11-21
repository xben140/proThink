<?php

	use builder\integrationTags;

	return function($__this) {

		$__this->setPageTitle('配置组编辑');
		$info = $__this->logic->getInfo($__this->param);

		session('blog_id' , $__this->param['id']);

		/**
		 * 所有标签
		 */
		$tags = $__this->logic__blog_blogtag->getFormatedData();

		/**
		 * 当前标签
		 */
		$articleTags = $__this->logic__blog_blogarticle->getArticleTagsId($__this->param);


		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([
				integrationTags::text([
					'field_name'  => '标题' ,
					'placeholder' => '' ,
					'tip'         => '标题' ,
					'value'       => $info['title'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'title' ,
				]) ,

				integrationTags::inlineRadio($__this->logic->model_::$articleCategory , 'category' , '文章类型' , '' , $info['category']) ,

				integrationTags::inlineRadio($__this->logic->model_::$articleSourceType , 'source_type' , '内容来源' , '' , $info['source_type']) ,

				integrationTags::text([
					//随便写
					'field_name'  => '关键词' ,
					'placeholder' => '' ,
					'tip'         => '多个用英文逗号隔开' ,
					//'attr'        => 'disabled' ,
					'value'       => $info['keywords'] ,
					'name'        => 'keywords' ,
				]) ,

				integrationTags::inlineCheckbox($tags , 'tags[]' , '文章标签' , '' , $articleTags) ,

				integrationTags::text([
					//随便写
					'field_name'  => '转载文章来源' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => $info['source'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'source' ,
				]) ,

				integrationTags::textarea([
					'field_name' => '摘要' ,
					'tip'        => '' ,
					'name'       => 'abstruct' ,
					'value'      => $info['abstruct'] ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,


			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,


		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};