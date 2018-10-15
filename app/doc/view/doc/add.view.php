<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('稿件类型添加');

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


					integrationTags::upload(MULTI_FILE , [
						[
							'title' => '上传须知' ,
							'items' => [
								'单次最多添加300个文档' ,
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
						'beforeFileQueued' => /** @lang javascript */
							<<<'AAA'
function (file) {
	var subject = $.trim(file.name);
	
	if (!/^(\d+(?:\.\d+)?)p[\s-]*([^-\s]+)(?:(?=\s*-)[\s-]+)([^.\r\n]+)\.(?:docx?|wps)$/im.test(subject)) 
	{
		layer.open({
			type     : 1
			, title  : '此文件命名不规范,将不会添加到上传队列'
			, area   : ['390px', '210px']
			, shade  : 0
			, skin: 'layui-layer-molv' //样式类名
			, icon:1
			, offset : [ //为了演示，随机坐标
				Math.random() * ($(window).height() - 400)
				, Math.random() * ($(window).width() - 400)
			]
			, maxmin : true
			, content: '<div class="error_remind">' +
			'<span style="color: #f00;font-weight:bold" >' + file.name + ' </span> ' +
			'<span>确保字母p为半角</span>' +
			'<span>确保字母p和作者名之间至少有一个 - 符号</span>' +
			'<span>确保作者名和文档标题之间至少有一个 - 符号</span>' +
			'<span>确保文档标题里不包含空格</span>' +
			'<span>确保文档名后缀为 .docx </span>' +
			'</div>'

/*
			 , btn    : ['继续弹出', '全部关闭'] //只是为了演示
			 , yes    : function ()
			 {
			 $(that).click(); //此处只是为了演示，实际使用可以剔除
			 }
			 , btn2   : function ()
			 {
			 layer.closeAll();
			 }
*/

			, zIndex : layer.zIndex //重点1
			, success: function (layero)
			{
				layer.setTop(layero); //重点2
			}
		});

		return false;
	}
	
}
AAA
						,

						'uploadSuccess' => /** @lang javascript */
							<<<'AAA'
		function (file, response) {

			let map = [
				'upload-status-failure',
				'upload-status-success',
				'upload-status-uploaded',
			];
			var oLi = $('#' + file.id);
			
			if (response.is_finished == 1)
			{
				oLi.append('<span class="upload-status '+map[response.sign]+'" >'+response.msg+'</span>');
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
	layer.alert('全部文件处理完成');
}
AAA
						,
					] , [
						'server'  => "'" . url('add') . "'" ,
						'threads' => 10 ,
						'accept'  => json_encode([
							'extensions' => 'doc,docx,wps' ,
							'mimeTypes'  => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
						]) ,
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