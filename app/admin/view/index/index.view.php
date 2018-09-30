<?php

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this){

		$privilege = getAdminSessionInfo(SESSOIN_TAG_PRIVILEGES);;

		$__this->assign('menuTree' , makeTreeMenu($privilege));

		//---------------------------- 设置标题
		$__this->setPageTitle('主页');

		//---------------------------- 设置页面类属性
		$__this->makePage()->setNodeValue([
			'BODY_ATTR' => tagConstructor::buildKV([
				'style' => 'overflow:hidden' ,
				'class' => 'fixed-sidebar full-height-layout gray-bg' ,
			]) ,
		]);

		//---------------------------- 主体结构
		$__this->displayContents = elementsFactory::build('baseFrameWork')->make(function(&$doms , $_this) use($__this){

			$_this->setNodeValue([
				'logout_url'   => url('portal/login/logout') ,
				'default_page' => url('main') ,
			]);

			$_this->setWebSiteLogo([
				[
					'editable'        => 0 ,
					'is_display'      => 0 ,
					'src'             => generateProfilePicPath(config('website_logo') , 1) ,
					'data-origin-src' => generateProfilePicPath(config('website_logo') , 0) ,
					'text'            => '修改logo' ,
					'style'           => 'width:100%;height:auto;' ,
				] ,
				[
					'editable'        => 1 ,
					'is_display'      => 1 ,
					'src'             => generateProfilePicPath(getAdminSessionInfo(SESSOIN_TAG_USER , 'profile_pic') , 1) ,
					'data-origin-src' => generateProfilePicPath(getAdminSessionInfo(SESSOIN_TAG_USER , 'profile_pic') , 0) ,
					'data-condition'  => formatMenu('user' , 'profile_pic' , getAdminSessionInfo(SESSOIN_TAG_USER , 'id')) ,
					'text'            => '修改头像' ,
				] ,
			]);


			$_this->setMeta([


				[
					'field' => '账号 : ' ,
					'value' => $__this->adminInfo['user'] ,
				] ,
				[
					'field' => '名字 : ' ,
					'value' => $__this->adminInfo['nickname'] ,
				] ,
				[
					'field' => '登陆次数 : ' ,
					'value' => $__this->adminInfo['login_count'] ,
				] ,
				[
					'field' => '登陆IP : ' ,
					'value' => $__this->adminInfo['last_login_ip'] ,
				] ,
				[
					'field' => '登陆时间 : ' ,
					'value' => formatTime($__this->adminInfo['last_login_time'] , 0) ,
				] ,
				[
					'field' => '角色 : ' ,
					'value' => implode(',' , getAdminSessionInfo(SESSOIN_TAG_ROLE_NAME)) ,
					//'value' => implode(',', $__this->authClass->getRolesFieldColumn('name')),

				] ,


			]);

			/*
							$_this->setLink([
								[
									'field' => 'hao123' ,
									'value' => 'http://hao123.com' ,
								] ,
								[
									'field' => '百度' ,
									'value'   => 'http://baidu.com' ,
								] ,
							]);
			*/


			$_this->setLinkPop([
				[
					'field' => '修改密码' ,
					'value' => url('admin/user/modifypwd') ,
				] ,

				[
					'field' => '修改资料' ,
					'value' => url('admin/user/modifyinfo'),
				] ,

			]);


		});

		//---------------------------- 输出

	};
