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
					'role'            => '全站管理源' ,
					'name'            => 'hello' ,
					'profile_picture' => '' ,
				]);

				$_this->setCustomMenu([
					[
						'url'   => 'http://hao123.com' ,
						'field' => 'hao123' ,
					] ,
					[

						'url'   => 'http://baidu.com' ,
						'field' => '百度' ,
					] ,
				]);


			});

			//---------------------------- 输出
			return $this->showPage();
		}
	}
