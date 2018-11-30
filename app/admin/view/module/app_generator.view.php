<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('应用生成器');

		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[/*
							[
								'is_display' => 1 ,
								'class'      => 'btn-success btn-open-pop' ,
								'field'      => '安装包管理' ,
								'data'       => [
									'src'   => url('admin/Module/packageList') ,
									'title' => '安装包管理' ,
								] ,
							] ,*/
						] ,
					] , [
						0 ,
					]) ,
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'option' ,
							'value' => 'appGeneratorFramework' ,
						]) ,

						integrationTags::switchery([
							//额外属性
							//'attr'       => '' ,
							'isChecked'  => '' ,
							//随便写
							'tip'        => '如果打开，将会覆盖同名应用文件，慎用（controller，model，logic，valiate）' ,
							//随便写
							'field_name' => '覆盖文件' ,
							//表单name值
							'name'       => 'is_cover' ,
							//表单value值,$data里的字段
							'value'      => '1' ,
							//表单value对应名字,$data里的字段
							'field'      => '' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用ID' ,
							'placeholder' => '' ,
							'tip'         => '（必填）应用ID，必须为纯小写字母，对于一个app目录下的一个模块，如 blog' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'id' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用名称' ,
							'placeholder' => '' ,
							'tip'         => '（必填）应用名称，如 博客系统' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							'field_name'  => '作者' ,
							'placeholder' => '' ,
							'tip'         => '作者称呼，可为空' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'author' ,
						]) ,

						integrationTags::text([
							'field_name'  => '作者主页' ,
							'placeholder' => '' ,
							'tip'         => '作者主页网站，可为空' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'page_url' ,
						]) ,

						integrationTags::textarea([
							'field_name' => '应用介绍' ,
							'tip'        => '应用介绍，可为空' ,
							'name'       => 'description' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,
					] , [
						'id'     => 'form2' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '6' ,
					'main_title' => '应用生成器（应用骨架文件）' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'option' ,
							'value' => 'appGeneratorCode' ,
						]) ,

						integrationTags::switchery([
							//额外属性
							//'attr'       => '' ,
							'isChecked'  => '' ,
							//随便写
							'tip'        => '如果打开，将会覆盖同名应用文件，慎用（controller，model，logic，valiate）' ,
							//随便写
							'field_name' => '覆盖文件' ,
							//表单name值
							'name'       => 'is_cover' ,
							//表单value值,$data里的字段
							'value'      => '1' ,
							//表单value对应名字,$data里的字段
							'field'      => '' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用ID' ,
							'placeholder' => '' ,
							'tip'         => '（必填）必须是已经生成的应用，在左边应用生成器生成好后，在这里创建对应逻辑代码，如 blog' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'id' ,
						]) ,

						integrationTags::textarea([
							'field_name' => '表名' ,
							'tip'        => '需要添加‘增删改查’功能的表名，每行一个，不加 ithink_ 前缀，会自动为这些表生成 controller，model，logic，validate文件' ,
							'name'       => 'tables' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:100px;' ,
						]) ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,

				] , [
					'width'      => '6' ,
					'main_title' => '代码生成器（controller，model，logic，valiate）' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};
