<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('修改密码');
		session(URL_MODULE , $__this->param['id']);
		$id = session(URL_MODULE);
		$info = $__this->logic->getInfo(['id' => $id ,]);


		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::staticText([
					//'placeholder' => '' ,
					//'tip'         => '' ,
					//'attr'        => 'disabled' ,
					//'name'        => 'user' ,

					'field_name' => '用户名' ,
					'value'      => $info['user'] ,
				]) ,
				integrationTags::staticText([
					//'placeholder' => '' ,
					//'tip'         => '' ,
					//'attr'        => 'disabled' ,
					//'name'        => 'user' ,

					'field_name' => '用户' ,
					'value'      => $info['nickname'] ,
				]) ,

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

		return $__this->showPage();
	};