<?php

	namespace app\admin\controller;


	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	class Index extends AdminBase
	{

		public function index()
		{
			$privilege = getAdminSessionInfo(SESSOIN_TAG_PRIVILEGES);;

			$this->assign('menuTree' , makeTreeMenu($privilege));

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
					'logout_url'   => url('portal/login/logout') ,
					'default_page' => url('main') ,
				]);

				$_this->setWebSiteLogo([
					[
						'editable'        => 0 ,
						'is_display'      => 1 ,
						'src'             => generateProfilePicPath(config('website_logo') , 1) ,
						'data-origin-src' => generateProfilePicPath(config('website_logo') , 0) ,
						'text'            => '修改logo' ,
						'style'           => 'width:100%;height:auto;' ,
					] ,
					[
						'editable'        => 1 ,
						'is_display'      => 0 ,
						'src'             => generateProfilePicPath(getAdminSessionInfo(SESSOIN_TAG_USER , 'profile_pic') , 1) ,
						'data-origin-src' => generateProfilePicPath(getAdminSessionInfo(SESSOIN_TAG_USER , 'profile_pic') , 0) ,
						'data-condition'  => formatMenu('user' , 'profile_pic' , getAdminSessionInfo(SESSOIN_TAG_USER , 'id')) ,
						'text'            => '修改头像' ,
					] ,
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
						'value' => formatTime($this->adminInfo['last_login_time'] , 0) ,
					] ,
					[
						'field' => '角色 : ' ,
						'value' => implode(',' , getAdminSessionInfo(SESSOIN_TAG_ROLE_NAME)) ,
						//'value' => implode(',', $this->authClass->getRolesFieldColumn('name')),

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
/*
					[
						'field' => '修改资料' ,
						'value' => url('admin/user/modifyinfo'),
					] ,*/

				]);


			});

			//---------------------------- 输出
			return $this->showPage();
		}



		//?condition=user/profile_pic/3
		public function updateImage()
		{
			//$this->initLogic();
			if(isset($_FILES['image']))
			{
				$param = session(SESSION_TAG_ADMIN.'updateImage_condition');
				$this->logic = $this->{$param['logic']};

				$res = uploadImg('image' , function($result) use ($param){
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					$info = $this->logic->getInfo(['id' => $param['id']]);

					$this->logic->updateField([
						'ids'   => $param['id'] ,
						'val'   => $result['savename'] ,
						'field' => $param['field'] ,
					]);

					$imageUrl = generateProfilePicPath($info[$param['field']], 0);

					//删除原图
					delImg($info[$param['field']]);
					$this->logic->updateSessionByUsername(getAdminSessionInfo(SESSOIN_TAG_USER , 'user'));

					return $result;
				} , [
					200 ,
					200 ,
					1 ,
				]);

				if($res['is_finished'])
				{
					return $this->result($res, 1, '更新成功', 'json');
				}
				else
				{
					return $this->error();
				}
			}
			else
			{
				$condition = explode('/' , $this->param['condition']);
				$param = [
					'logic' => 'logic__common_' . $condition[0] ,
					'field' => $condition[1] ,
					'id'    => $condition[2] ,
				];
				session(SESSION_TAG_ADMIN.'updateImage_condition', $param);
				$this->logic = $this->{$param['logic']};

				//设置标题
				$this->setPageTitle('上传测试');
				$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([
/*
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),
*/


							integrationTags::upload(SINGLE_IMG , [
								[
									'title' => '上传须知' ,
									'items' => [
										'支持jpg，png，gif格式' ,
										'图片大小不超过2M' ,
									] ,
								] ,
							] , [

								'uploadSuccess' => <<<AAA
function (file, response) {
	if (response.code == 1)
	{
	
		$(".uploader-preview").find('img').attr({
			'src':response.data.thumb_url,
		});
		
		$(".profile_pic_preview").attr({
			'src':response.data.url,
		});
		
		$(".status-box-text").text('更新成功');
		
		setTimeout(function(){
		//	layer.close()
		}, 400);
	}
	else
	{
		//服务器处理出错
	}
}
AAA
								,
							] , [
								'server' => "'".url()."'" ,
								'accept' =>json_encode( [
									'extensions' => 'jpg,jpeg,png,gif',
									'mimeTypes' => 'image/*',
								]) ,
							]) ,

						], [
							'width'      => '6' ,
							'main_title' => '' ,
							'sub_title'  => '' ,
						]) ,

						integrationTags::rowBlock((function() {
							return [
								elementsFactory::doubleLabel('div' , function(&$doms) {

									$doms[] = elementsFactory::singleLabel(function(&$doms) {

										$param = session(SESSION_TAG_ADMIN.'updateImage_condition');
										$info = $this->logic->getInfo(['id' => $param['id']]);
										$imageUrl = generateProfilePicPath($info[$param['field']], 0);

										$doms = integrationTags::singleLabel('img' , [
											'src'   => $imageUrl ,
											'class' => 'profile_pic_preview' ,
										]);

									});

								} , [
									'class' => 'test-div' ,
									'id'    => 'div1' ,
								]),
							];


						})(), [
							'width'      => '6' ,
							'main_title' => '' ,
							'sub_title'  => '' ,
						]) ,
					]) ,
				],[
					'animate_type' => 'fadeInRight' ,
					'attr'         => '' ,
				]);

				return $this->showPage();
			}
		}

		public function main()
		{
			//设置标题
			$this->setPageTitle('主页');
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::customElementFormPath($this->getTemplatePath('main') , [
/*
					integrationTags::staticText([
						'field_name' => 'staticText' ,
						'value'      => 'value' ,
					]) ,
				*/
				])

			] , [
				'animate_type' => 'fadeInRight' ,
				'attr'         => '' ,
			]);

			return $this->showPage();
		}
	}
