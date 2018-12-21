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
					],[]) ,

					integrationTags::upload(MULTI_FILE , [
						[
							'title' => '应用的概念' ,
							'items' => [
								'一个安装包即对应一个应用' ,
								'标准格式的包里面会包含 app 和 public 两个文件夹分别为服务器端逻辑文件和静态资源，如果有误，说明包可能损坏' ,
								'可以上传多个包，也可以多个包同时部署到站点，但仅建议在测试过程中这么做，站点投入运行后一个虚拟主机只部署一个应用' ,
								'如果想部署多个应用，建议搭建多个虚拟主机，分别安装部署' ,
							] ,
						] ,
						[
							'title' => '上传须知' ,
							'items' => [
								'包的名字必须为应用的ID，如有重复上传，包会被覆盖，上传之前务必检查' ,
								'单次最多添加100个文件' ,
								'单个包最大50M' ,
								'包的名字不允许有空格' ,
								'允许的上传包的格式必须为.zip，如果不是，请手动解压后重新打包为zip压缩包再上传' ,
								'所有文件总大小最大200M，如果需要上传的大文件过多，请分多次上传' ,
								'' ,
							] ,
						] ,
					] , [
						'beforeFileQueued' => /** @lang javascript */
							<<<'AAA'
function (file) {
	var subject = $.trim(file.name);
	
	if (!/^\S+\.(?:zip)$/im.test(subject)) 
	{
		layer.alert(subject + '<br />文件格式不规范，请对照上传说明检查文件名，', {
			skin: 'layui-layer-molv' //样式类名
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
			if (!response.sign)
			{
				//上传出错
				oLi.append('<span class="upload-status '+map[response.sign]+'" >'+response.msg+'</span>');
			}
			else if (response.is_finished == 1)
			{
				//上传完成
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
						'server'  => "'" . url('uploadPackage') . "'" ,
						'threads' => 10 ,
						'accept'  => json_encode([
							'extensions' => 'zip' ,
							'mimeTypes'  => 'application/x-zip-compressed'
						]) ,
					]) ,

				] , [
					'width'      => '12' ,
					'main_title' => '上传安装包' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
		]);

	};