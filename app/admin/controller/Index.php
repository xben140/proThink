<?php

	namespace app\admin\controller;


	use builder\elementsFactory;
	use builder\tagConstructor;

	class Index extends AdminBase
	{
		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function index()
		{
			$privilege = getAdminSessionInfo('privilege');;

			$this->assign('menuTree' , \makeTreeMenu($privilege));

			//---------------------------- 设置标题
			$this->setPageTitle('主页');

			//---------------------------- 设置页面类属性
			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'style' => 'overflow:hidden' ,
					'class' => 'fixed-sidebar full-height-layout gray-bg' ,
				]) ,
			]);

			//---------------------------- 主体结构
			$this->displayContents = elementsFactory::build('baseFrameWork')->make(function(&$doms , $_this) {

				$_this->setNodeValue([
					'default_page'    => 'http://baidu.com' ,
					'logout_url'      => url('portal/login/logout') ,
					'profile_picture' => 'http://img.newyx.net/newspic/image/201706/01/d380e50205.jpg' ,
				]);

				$_this->setMeta([
					[
						'field' => '账号 : ' ,
						'value' => $this->adminInfo['user'] ,
					] ,
					[
						'field' => '名字 : ' ,
						'value' => $this->adminInfo['nickname'] ,
					] ,
					[
						'field' => '登陆次数 : ' ,
						'value' => $this->adminInfo['login_count'] ,
					] ,
					[
						'field' => '登陆IP : ' ,
						'value' => $this->adminInfo['last_login_ip'] ,
					] ,
					[
						'field' => '登陆时间 : ' ,
						'value' => formatTime($this->adminInfo['last_login_time'], 0) ,
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
						'value' => url('admin/user/modifypwd'),
					] ,
					[
						'field' => '修改资料' ,
						'value' => url('admin/user/modifyinfo'),
					] ,
				]);


			});

			//---------------------------- 输出
			return $this->showPage();
		}
	}
