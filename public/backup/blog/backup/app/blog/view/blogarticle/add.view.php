<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('添加配置组');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::text([
					'field_name'  => '标题' ,
					'placeholder' => '' ,
					'tip'         => '标题' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'title' ,
				]) ,

				integrationTags::inlineRadio($__this->logic->model_::$articleCategory , 'category' , '文章类型' , '' , 1) ,

				integrationTags::inlineRadio($__this->logic->model_::$articleSourceType , 'source_type' , '内容来源' , '' , 1) ,

				integrationTags::switchery([
					'isChecked'  => 'checked' ,
					//额外属性
					//'attr'       => '{if 1 == 1}checked{/if}' ,
					//随便写
					'tip'        => '' ,
					//随便写
					'field_name' => '是否发布' ,
					//表单name值
					'name'       => 'is_published' ,
					//表单value值,$data里的字段
					'value'      => '1' ,
					//表单value对应名字,$data里的字段
					'field'      => '' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '关键词' ,
					'placeholder' => '' ,
					'tip'         => '多个用英文逗号隔开' ,
					'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'keywords' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '转载文章来源' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'source' ,
				]) ,


				integrationTags::textarea([
					'field_name' => '摘要' ,
					'tip'        => '' ,
					'name'       => 'abstruct' ,
					'value'      => '' ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,

				integrationTags::uediter([
					'field_name' => '内容' ,
					'name'       => 'content' ,
					'value'      => '' ,
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