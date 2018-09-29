		

<!doctype html>
<html lang="en">
	<head>

		<!--					head					-->

		<meta charset="utf-8">
<!--[if lt IE 9]><meta http-equiv="refresh" content="0;ie.html" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta  name="viewport"  content="width=device-width"  >
<meta  name="keywords"  content=""  >
<meta  name="description"  content=""  >
<meta name="renderer" content="webkit" >
<title>稿件类型添加</title>

<!-- ! ~~~HEAD~~~ -->










		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
<link rel="stylesheet" href="__STATIC__/css/custom.css">
<link rel="stylesheet" href="__PLUGINS__webuploader/css/webuploader.css">
<link rel="stylesheet" href="__PLUGINS__webuploader/examples/multi-file-upload/style.css">
			<style>  
			
			</style>  
			<style>  
				
			</style>  
			<style>  
			</style>  

<!-- ! ~~~CSS~~~ -->





		<script src="__HPLUS__js/jquery.min.js"></script>
<script src="__HPLUS__js/bootstrap.min.js"></script>
<script src="__HPLUS__js/content.min.js"></script>
<script src="__HPLUS__js/plugins/layer/layer.js"></script>

<!-- ! ~~~JS_LIB~~~ -->



		<!--					/head					-->

	</head>
	<body   class=" gray-bg" >

		<!--					body					-->
					
		<div class="wrapper wrapper-content animated fadeInRight  "  >

				
			
			<div class="row"  >

						
			
<div class="col-sm-12 ui-sortable">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>上传稿件
				<small></small>
			</h5>
			<div class="ibox-tools">
				<!--<label class="label label-primary">可拖动</label>-->
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
						<!-- ~~~option~~~ -->
					<!--	
					<li>
						<a href="graph_morris.html#">选项1</a>
					</li>
					<li>
						<a href="graph_morris.html#">选项2</a>
					</li>
					-->
				</ul>
				
			</div>
		</div>
		<div class="ibox-content" style="position: relative">
			
						<div class="row">
				<div class="col-sm-4 m-b-xs">
					<button type="button" class="btn btn-success" onclick="location.reload()"> 刷新页面</button>
					<!--<a target="_self" href="" class="btn btn-success ">重置搜索条件</a>-->
					<a target="_blank" href="#" class="btn btn-success "> 在新窗口中打开</a>
				</div>
				<div class="col-sm-12 m-b-xs"><button type="button" class="btn btn-info " data-src="" data-title="" onclick="location.reload()">继续上传</button>
</div>

			</div>


							<div class="page-container">

								<p style="font-weight: bold;color: #f00;">上传须知</p><p >单次最多添加300个文档</p><p >单个文档最大50M</p><p >所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传</p><p >允许的上传格式有.doc .docx .wps</p><br><p style="font-weight: bold;color: #f00;">命名规则（添加文档时如果弹出提示框，请对比下面的命名示例，仔细阅读此提示）</p><p >文档名字开头必须为数字，即版数，可为小数或者整数，后面紧跟半角字母 P ，P不区分大小写，上传后此数字用于统计版数</p><p >字母P后面紧跟 - 符号或者作者名字</p><p >符号后面紧跟作者名字，多个作者名字用 & 符号分隔，不能用空格分隔，作者名字之间不能有空格，作者名字为两个字的需特别注意此情况</p><p >作者名字后面紧跟 - 符号，符号允许一个或者多个</p><p >符号后面紧跟文档标题，文档标题可以是除空格外的任意字符</p><p >文档标题后紧跟文档后缀，允许上传的文档后缀为 .doc .docx .wps 三种格式</p><br><p style="font-weight: bold;color: #f00;">命名示例（作者名字和文档名之间必须有最少一个 - 符号连接，否则将无法区分作者名和文档名）</p><p >1P--马玲--大众传播对少数民族地区青少年世界观影响的调查与思考.docx</p><p >1p-郑洪峰&郑洪峰-- 油田社区物业管理标准化和规范化策略探究.docx</p><p >1.5p - - 郑洪峰&郑洪峰&郑洪峰 - - 油田社区物业管理标准化和规范化策略探究.doc</p><p >1.0P郑洪峰-油田社区物业管理标准化和规范化策略探究.wps</p><br>


								<div id="uploader" class="wu-example">


									<div class="queueList">
										<div id="dndArea" class="placeholder">
											<i class="iconfont icon-wendang"></i>
											<div id="filePicker" class="webuploader-container">
												<div class="webuploader-pick"></div>
											</div>
											<p>选择文档或者将文件中的文档选中后拖到此区域，单次最多上传300个文件</p>
										</div>
										<ul class="filelist"></ul>
									</div>


									<div class="statusBar" style="display:none;">
										<div class="progress">
											<span class="text">0%</span>
											<span class="percentage"></span>
										</div>
										<p class="info">共0个文档（0B），已上传0个文档</p>

										<div class="btns">
											<div id="filePicker2" class="webuploader-container">
												<div class="uploadBtn webuploader-pick ">开始上传</div>
											</div>
											<div class="uploadBtn state-pedding">上传</div>
										</div>
									</div>

								</div>

							</div>
	
							<script>
							//			
					window.uploaderEventMap = {
						beforeFileQueued : function (file) {
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
	
} ,uploadSuccess : 		function (file, response) {

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
		} ,uploadFinished : function () {
	layer.alert('全部文件处理完成');
} ,
					};
							
							
							//			
					window.uploaderOptionMap = {
						server : '/doc/doc/add.html' ,threads : 10 ,accept : {"extensions":"doc,docx,wps","mimeTypes":"application\/vnd.openxmlformats-officedocument.wordprocessingml.document"} ,
					};
						
							</script>
							<!--/单图片dom结构部分-->




			
		</div>
	</div>
</div>





			</div>



		</div>


<!-- ! ~~~BODY~~~ -->


		<!--					/body					-->


		<!--					script					-->
		
			<script>  
			
			</script>  



	
		
			<script>  
					
			</script>  
			<script>  
				
			</script>  

<!-- ! ~~~SCRIPT~~~ -->







		<script src="__STATIC__/js/custom.js"></script>
<script src="__PLUGINS__webuploader/dist/webuploader.min.js"></script>
<script src="__PLUGINS__webuploader/examples/multi-file-upload/upload.js"></script>

<!-- ! ~~~JS_INVOKE~~~ -->


		<!--					/script					-->
	</body>
</html>