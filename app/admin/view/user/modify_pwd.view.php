<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('修改密码');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::password([
					'tip'          => '（必填）密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
					'name'         => 'password' ,
					'attr'         => '' ,
					'confirm_name' => 'password_confirm' ,
					'confirm_attr' => '' ,
				] , 1) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};