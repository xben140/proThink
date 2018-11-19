<?php

	use builder\elementsFactory;
	use builder\tagConstructor;

	return function($__this) {

		$__this->assign('menuTree' , $this->authClass->getMenuTree());

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
		$__this->displayContents = elementsFactory::build('baseFrameWork')->make(function(&$doms , $_this) use ($__this) {

			$_this->setNodeValue([
				'logout_url'   => url('admin/login/logout') ,
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
					'data-condition'  => formatMenu('app\admin\controller\User' , 'profile_pic' , getAdminSessionInfo(SESSOIN_TAG_USER , 'id')) ,
					'text'            => '修改头像' ,
				] ,
			]);


			$_this->setMeta([
				[
					'field' => '账号 : ' ,
					'value' => $__this->adminInfo['user'] ,
				] ,
				[
					'field' => '昵称 : ' ,
					'value' => $__this->adminInfo['nickname'] ,
				] ,

				/*
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

				*/
			]);


			$_this->setLinkPop([
				[
					[
						'field' => '修改密码' ,
						'value' => url('admin/user/modifypwd') ,
					] ,
					[
						'field' => '修改资料' ,
						'value' => url('admin/user/modifyinfo') ,
					] ,
				] ,
			]);


			$_this->setLink([
				[
					[
						'field'      => '安装包管理' ,
						'value'      => '/admin/module/packageList' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'module' , 'packageList') ,
					] ,
					[
						'field'      => '安装包上传' ,
						'value'      => '/admin/module/uploadPackage' ,
						'is_display' => 0,
					] ,
				] ,
				[
					[
						'field'      => '应用管理' ,
						'value'      => '/admin/module/datalist' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'module' , 'datalist') ,
					] ,
					[
						'field'      => '配置列表' ,
						'value'      => '/admin/config/datalist' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'config' , 'datalist') ,
					] ,
				] ,
				[
					[
						'field'      => '回收管理' ,
						'value'      => '/admin/recovery/datalist' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'recovery' , 'datalist') ,
					] ,
					[
						'field'      => '系统工具' ,
						'value'      => '/admin/module/basefunc' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'module' , 'basefunc') ,
					] ,
				] ,


				[
					[
						'field'      => '用户管理' ,
						'value'      => '/admin/user/datalist' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'user' , 'datalist') ,
					] ,
					[
						'field'      => '角色管理' ,
						'value'      => '/admin/role/datalist' ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'role' , 'datalist') ,
					] ,
				] ,


				[
					[
						'field'      => '菜单管理' ,
						'value'      => url('admin/privilege/datalist') ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'privilege' , 'datalist') ,
					] ,

					[
						'field'      => '登录日志' ,
						'value'      => url('admin/loginlog/datalist') ,
						'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'loginlog' , 'datalist') ,
					] ,
				] ,
			]);


		});

		//---------------------------- 输出

	};
