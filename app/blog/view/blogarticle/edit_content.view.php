<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('编辑博文');
		$__this->initLogic();
		$info = $__this->logic->getInfo(['id' => session('blog_id')]);


		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::rowButton([
				[
					[
						'is_display' => 1 ,
						'class'      => 'btn-danger btn-open-pop' ,
						'field'      => '添加标签' ,
						'data'       => [
							'src'   => url('blog/blogtag/add') ,
							'title' => '添加标签' ,
						] ,
					] ,
				],
			] , [
				0 ,
				2,
			]) ,

			integrationTags::a('预览博文' , [
				'class'  => ' btn btn-info ' ,
				'target' => '_self' ,
				'href'   => url('preview' , ['id' => session('blog_id')]) ,
			]) ,

			integrationTags::form([
				integrationTags::hidden([
					'name'  => 'field' ,
					'value' => 'content' ,
				]) ,

				integrationTags::hidden([
					'name'  => 'ids' ,
					'value' => session('blog_id') ,
				]) ,

				(function($info) {
					return ($info['source_type'] == '1') ? integrationTags::summernote([
						'left'       => '0' ,
						'right'      => '12' ,
						'field_name' => '' ,
						'name'       => 'val' ,
						'value'      => $info['content'] ,
					]) : integrationTags::textarea([
						'field_name' => '' ,
						'tip'        => '' ,
						'name'       => 'val' ,
						'value'      => $info['content'] ,
						'attr'       => '' ,
						'style'      => 'width:100%;min-height:550px;' ,
					]);
				})($info) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url('setfield') ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight-' ,
			'attr'         => '' ,
		]);


	};