		

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
<title>上传测试</title>

<!-- ! ~~~HEAD~~~ -->










		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
<link rel="stylesheet" href="__STATIC__/css/custom.css">
<link rel="stylesheet" href="__PLUGINS__webuploader/css/webuploader.css">
<link rel="stylesheet" href="__PLUGINS__webuploader/examples/single-image-upload/style.css">
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
					
		<div class="wrapper wrapper-content animated fadeInRight   ">

				
			
			<div class="row"  >

						
<div class="col-sm-6">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>
								<small></small>
							</h5>
							<div class="ibox-tools">
							
							
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								
								
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-wrench"></i>
								</a>
								
								
								<ul class="dropdown-menu dropdown-user">
								
							<!--	
									<li>
										<a href="graph_morris.html#">选项1</a>
									</li>
									<li>
										<a href="graph_morris.html#">选项2</a>
									</li>
									
							-->
									<!-- ~~~option~~~ -->
								</ul>
								
								<!-- ~~~isEnableClosed~~~ -->
								<!--	
									<a class="close-link">
										<i class="fa fa-times"></i>
									</a>
								-->
								
							</div>
						</div>
						<div class="ibox-content" style="position: relative">
							
							
					<!-- 单图片dom结构部分-->
							<div class="page-container">

								<p style="font-weight: bold;color: #f00;">上传须知</p><p >支持jpg，png，gif格式</p><p >图片大小不超过2M</p><br>

								<!--单图片dom结构部分-->
								<div class="uploader-demo">

									<!--用来预览图片-->

									<div class="uploader-preview">
										<img src="./img/timg.jpg" alt="">
									</div>

									<div class="uploader-btn-box">
										<div id="filePicker">选择图片</div>
									</div>

									<div class="status-box">
										<span class="status-box-text">准备上传</span>
										<span class="status-box-progess">0%</span>
									</div>

									<!--进度条-->
									<div class="progress-box">
										<div class="progress progress-striped active">
											<div style="width: 0" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-danger">
												<span class="sr-only"></span>
											</div>
										</div>
									</div>
								</div>
								<!--/单图片dom结构部分-->

							</div>
											
							<script>
								window.uploaderEventMap = {
									uploadSuccess : function (file, response) {
	if (response.code == 1)
	{
		parent.$('.profile-pic>img').attr('src', response.data.thumb_url);
	
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
} ,
								};
								window.uploaderOptionMap = {
									server : '/admin/user/editprofilepic.html' ,accept : {"extensions":"jpg,jpeg,png,gif"} ,
								};
					
							</script>
							<!--/单图片dom结构部分-->




							
						</div>
					</div>
				</div>


			
<div class="col-sm-6">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>
								<small></small>
							</h5>
							<div class="ibox-tools">
							
							
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								
								
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-wrench"></i>
								</a>
								
								
								<ul class="dropdown-menu dropdown-user">
								
							<!--	
									<li>
										<a href="graph_morris.html#">选项1</a>
									</li>
									<li>
										<a href="graph_morris.html#">选项2</a>
									</li>
									
							-->
									<!-- ~~~option~~~ -->
								</ul>
								
								<!-- ~~~isEnableClosed~~~ -->
								<!--	
									<a class="close-link">
										<i class="fa fa-times"></i>
									</a>
								-->
								
							</div>
						</div>
						<div class="ibox-content" style="position: relative">
							
							<div  class="test-div"  id="div1"  > <img  src="http://local14.cc/upload/picture/20180821/0d03b253bfd2c77825c34a749b565adf.gif"  class="profile_pic_preview" />

 </div>


							
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

<!-- ! ~~~SCRIPT~~~ -->






		<script src="__STATIC__/js/custom.js"></script>
<script src="__PLUGINS__webuploader/dist/webuploader.min.js"></script>
<script src="__PLUGINS__webuploader/examples/single-image-upload/upload.js"></script>

<!-- ! ~~~JS_INVOKE~~~ -->


		<!--					/script					-->
	</body>
</html>