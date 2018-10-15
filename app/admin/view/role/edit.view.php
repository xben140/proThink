<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('角色编辑');

		$info = $__this->logic->getInfo($__this->param);
		session(URL_MODULE , $__this->param['id']);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::text([
					//随便写
					'field_name'  => '角色名' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => $info['name'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => $info['order'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,
				/*
										integrationTags::switchery([
											'isChecked'  => $info['status'] == 1 ? 'checked' : '' ,
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
					'value'      => $info['remark'] ,
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