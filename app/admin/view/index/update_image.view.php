<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this) {
		$condition = explode('/' , $__this->param['condition']);
		$param = [
			//'logic' => 'logic__' . $condition[0] ,
			'logic' => $__this::makeClassName($condition[0] , 'logic') ,
			'field' => $condition[1] ,
			'id'    => $condition[2] ,
		];
		session(SESSION_TAG_ADMIN . 'updateImage_condition' , $param);
		$__this->logic = $__this->{$param['logic']};

		//设置标题
		$__this->setPageTitle('上传测试');
		$__this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

		$__this->displayContents = integrationTags::basicFrame([
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
					] , [
						'server' => "'" . url() . "'" ,
						'accept' => json_encode([
							'extensions' => 'jpg,jpeg,png,gif' ,
							'mimeTypes'  => 'image/*' ,
						]) ,
					]) ,


				] , [
					'width'      => '6' ,
					'main_title' => '' ,
					'sub_title'  => '' ,
				]) ,

				integrationTags::rowBlock((function() use ($__this) {
					return [
						elementsFactory::doubleLabel('div' , function(&$doms) use ($__this) {

							$doms[] = elementsFactory::singleLabel(function(&$doms) use ($__this) {

								$param = session(SESSION_TAG_ADMIN . 'updateImage_condition');
								$info = $__this->logic->getInfo(['id' => $param['id']]);
								$imageUrl = generateProfilePicPath($info[$param['field']] , 0);

								$doms = integrationTags::singleLabel('img' , [
									'src'   => $imageUrl ,
									'class' => 'profile_pic_preview' ,
								]);

							});

						} , [
							'class' => 'test-div' ,
							'id'    => 'div1' ,
						]) ,
					];


				})() , [
					'width'      => '6' ,
					'main_title' => '' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
			'attr'         => '' ,
		]);


	};
