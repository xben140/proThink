<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('添加配置组');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::text([
					'field_name'  => '类型名' ,
					'placeholder' => '' ,
					'tip'         => '（必填）类型名' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => '1' ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,
				/*
										integrationTags::switchery([
											'isChecked'  => 'checked' ,
											//额外属性
											//'attr'       => '{if 1 == 1}checked{/if}' ,
											//随便写
											'tip'        => '是否启用' ,
											//随便写
											'field_name' => '是否启用' ,
											//表单name值
											'name'       => 'status' ,
											//表单value值,$data里的字段
											'value'      => '1' ,
											//表单value对应名字,$data里的字段
											'field'      => '' ,
										]) ,
				*/

				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '备注' ,
					'name'       => 'remark' ,
					'value'      => '' ,
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