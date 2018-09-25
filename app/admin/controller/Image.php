<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Image extends AdminBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadImg('image' , function($result) {
					$returnData = [];
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					$isAlreadyUploaded = $this->logic->fileExistsByHash($result['hash']);

					if(!$isAlreadyUploaded)
					{
						$t = $this->logic->add([
							'group_id' => 1 ,
							'ext'      => $result['extension'] ,
							'path'      => $result['savename'] ,
							'hash'     => $result['hash'] ,
							'status'   => 1 ,
						]);

						if($t)
						{
							$result['sign'] = 1;
							$result['msg'] = '添加成功';
						}
						else
						{
							$result['sign'] = 0;
							$result['msg'] = '添加失败，稍后重试';
						}
					}
					else
					{
						//文件上传过
						$result['sign'] = 2;
						$result['msg'] = '文件已经上传过，已被忽略';
					}
					return $result;
				} , [
					200 ,
					200 ,
					1 ,
				]);

				return json($res);
			}
			else
			{
				$this->setPageTitle('图片上传');

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '继续上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),

							integrationTags::upload(MULTI_IMG, [
								[
									'title' => '上传须知' ,
									'items' => [
										'单次最多添加300个文档' ,
										'单个文档最大50M' ,
										'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
										'允许的上传格式有.doc .docx .wps' ,
									] ,
								] ,
							], [
								'beforeFileQueued' => /** @lang javascript */
									<<<'AAA'
function (file) {
	var subject = $.trim(file.name);
}
AAA
								,

								'uploadSuccess' => /** @lang javascript */
									<<<'AAA'
function (file, response) {
	//等于2或1
	if (response.sign)
	{
		if (response.is_finished == 1)
		{
			console.dir(response)

			window.upload_file.push({
				"savename":response.savename,
			});
			
			$(".uploader-preview").find('img').attr({
				'src':response['thumb_url'],
			});
			$(".status-box-text").text('上传完成');
		}
		else
		{
		}
	}
	else
	{
		//服务器处理出错
	}
}
AAA
								,



								'uploadFinished' => /** @lang javascript */
									<<<'AAA'
function () {
	layer.alert('全部文件处理完成');
}
AAA
								,
							] , [
								'server'  => "'" . url('add') . "'" ,
								'threads' => 10 ,
								'accept'  => json_encode([
									'extensions' => 'jpg,jpeg,gif,png' ,
									'mimeTypes' => 'image/*'
								]) ,
							]) ,

						] , [
							'width'      => '12' ,
							'main_title' => '上传图片' ,
							'sub_title'  => '' ,
						]) ,
					]) ,
				] , [
					'animate_type' => 'fadeInRight' ,
				]);



				return $this->showPage();
			}
		}
	}