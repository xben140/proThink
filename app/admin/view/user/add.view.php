<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('用户添加');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::text([
					'field_name'  => '用户名' ,
					'placeholder' => '请填写用户名' ,
					'tip'         => '（必填）用户名允许字符为字母，数字，下划线，小数点，长度6-16位' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'user' ,
				]) ,


				integrationTags::password([
					'tip'          => '（必填）密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
					'name'         => 'password' ,
					'attr'         => '' ,
					'confirm_name' => 'password_confirm' ,
					'confirm_attr' => '' ,
				] , 1) ,


				integrationTags::text([
					//随便写
					'field_name'  => '邮箱' ,
					'placeholder' => '' ,
					'tip'         => '请填写邮箱' ,
					'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'email' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '手机' ,
					'placeholder' => '' ,
					'tip'         => '请填写手机号码' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'phone' ,
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
										]) ,*/

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,


		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};