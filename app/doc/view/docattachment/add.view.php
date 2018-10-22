<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('上传附件');

		//附件信息
		session(md5(URL_MODULE . 'attachment') , null);

		//id
		session(md5(URL_MODULE . 'id') , $__this->param['id']);
		$docInfo = $__this->logic__doc->getInfo($__this->param);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'class' => 'btn-info ' ,
								'field' => '继续上传' ,
								'attr'  => 'onclick="location.reload()"' ,
							] ,
						] ,
					]) ,


					integrationTags::form([

						integrationTags::staticText([
							//随便写
							'field_name' => '' ,
							'value'      => $docInfo['file_name'] . ' 的附件' ,
						]) ,

						integrationTags::textarea([
							//随便写
							'field_name'  => '备注' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => '',
							//'attr'        => 'disabled' ,
							'name'        => 'remark' ,
						]) ,


						integrationTags::upload(SINGLE_FILE , [
							[
								'left'  => '2' ,
								'right' => '8' ,
								'title' => '上传须知' ,
								'items' => [
									'单个文件最大50M' ,
									'如有附件则上传，没有附件则无需上传' ,
									'备注必须填写，填写以后点击提交，如果上传附件后没有提交，记录将不会保存至服务器' ,
									//'允许的上传格式有.doc .docx .wps' ,
								] ,
							] ,
						] , [
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
				console.dir(response)
		
				if (response.is_finished == 1)
				{
					$(".status-box-text").text('上传成功');
				}
				else
				{
					//分片上传完成
				}
			}
AAA
,


								'uploadFinished' => /** @lang javascript */
									<<<'AAA'
	function () {
		layer.msg('文件上传完成');
	}
AAA
,
							] , [
								'server'  => "'" . url('add') . "'" ,
								'threads' => 10 ,
								'accept'  => json_encode([
									'extensions' => '*' ,
									'mimeTypes'  => '*' ,
								]) ,
							] , [
							'left'  => '2' ,
							'right' => '8' ,
						]) ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					] , [

						'success' => /** @lang javascript */
							<<<'AAA'
function (responseText, statusText) {
	_this.find('button:submit').attr("disabled", false);
	layer.close(loadIndex)
	layer.msg(responseText.msg);	
}
AAA
,
					]) ,


				] , [
					'width'      => '12' ,
					'main_title' => '上传稿件' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
		]);

	};