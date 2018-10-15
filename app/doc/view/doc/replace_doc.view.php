<?php

	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this) {
		$__this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

		//设置标题
		$__this->setPageTitle('替换稿件');

		session(md5(URL_MODULE . 'id') , $__this->param['id']);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					/*	integrationTags::rowButton([
							[
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
							],
						]),*/

					integrationTags::upload(SINGLE_FILE , [

						[
							'title' => '上传须知' ,
							'items' => [
								'上传的文档将会替换当前文档，无法恢复，请确认后操作' ,
								'单个文档最大50M' ,
								'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
								'允许的上传格式有.doc .docx .wps' ,
							] ,
						] ,
						[
							'title' => '命名规则（添加文档时如果弹出提示框，请对比下面的命名示例，仔细阅读此提示）' ,
							'items' => [
								'文档名字开头必须为数字，即版数，可为小数或者整数，后面紧跟半角字母 P ，P不区分大小写，上传后此数字用于统计版数' ,
								'字母P后面紧跟 - 符号或者作者名字' ,
								'符号后面紧跟作者名字，多个作者名字用 & 符号分隔，不能用空格分隔，作者名字之间不能有空格，作者名字为两个字的需特别注意此情况' ,
								'作者名字后面紧跟 - 符号，符号允许一个或者多个' ,
								'符号后面紧跟文档标题，文档标题可以是除空格外的任意字符' ,
								'文档标题后紧跟文档后缀，允许上传的文档后缀为 .doc .docx .wps 三种格式' ,
							] ,
						] ,
						[
							'title' => '命名示例（作者名字和文档名之间必须有最少一个 - 符号连接，否则将无法区分作者名和文档名）' ,
							'items' => [
								'1P--马玲--大众传播对少数民族地区青少年世界观影响的调查与思考.docx' ,
								'1p-郑洪峰&郑洪峰-- 油田社区物业管理标准化和规范化策略探究.docx' ,
								'1.5p - - 郑洪峰&郑洪峰&郑洪峰 - - 油田社区物业管理标准化和规范化策略探究.doc' ,
								'1.0P郑洪峰-油田社区物业管理标准化和规范化策略探究.wps' ,
							] ,
						] ,
					] , [

						'uploadSuccess' => <<<AAA
function (file, response) {
	if (response.code == 1)
	{
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
						'server' => "'" . url() . "'" ,
						'accept' => json_encode([
							'extensions' => 'doc,docx,wps' ,
						]) ,
					]) ,

				] , [
					'width'      => '12' ,
					'main_title' => '' ,
					'sub_title'  => '' ,
				]) ,

			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
			'attr'         => '' ,
		]);

	};