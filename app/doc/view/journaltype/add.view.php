<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('稿件类型添加');

		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::form([

				integrationTags::text([
					//随便写
					'field_name'  => '类型名称' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,


				integrationTags::text([
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => '1' ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,


				/*

					integrationTags::switchery([
						//额外属性
						//'attr'       => '' ,
						'isChecked'  => 'checked' ,
						//随便写
						'tip'        => '' ,
						//随便写
						'field_name' => '是否作为菜单显示' ,
						//表单name值
						'name'       => 'is_menu' ,
						//表单value值,$data里的字段
						'value'      => '1' ,
						//表单value对应名字,$data里的字段
						'field'      => '' ,
					]) ,

					integrationTags::switchery([
						//额外属性
						//'attr'       => '' ,
						//随便写
						'isChecked'  => '' ,
						'tip'        => '' ,
						//随便写
						'field_name' => '是否为公共方法' ,
						//表单name值
						'name'       => 'is_common' ,
						//表单value值,$data里的字段
						'value'      => '1' ,
						//表单value对应名字,$data里的字段
						'field'      => '' ,
					]) ,

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
					'tip'        => '角色备注' ,
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