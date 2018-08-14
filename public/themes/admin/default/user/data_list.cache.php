		

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
<title>用户列表</title>

<!-- ! ~~~HEAD~~~ -->










		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/iCheck/custom.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/switchery/switchery.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/datapicker/datepicker3.css">
<link rel="stylesheet" href="__STATIC__/css/custom.css">
			
			<style>  
				
			</style>  
			<style>  
			</style>  

<!-- ! ~~~CSS~~~ -->





		<script src="__HPLUS__js/jquery.min.js"></script>
<script src="__HPLUS__js/bootstrap.min.js"></script>
<script src="__HPLUS__js/content.min.js"></script>
<script src="__HPLUS__js/plugins/layer/layer.js"></script>
<script src="__HPLUS__js/plugins/iCheck/icheck.min.js"></script>
<script src="__HPLUS__js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="__HPLUS__js/plugins/switchery/switchery.js"></script>
<script src="__STATIC__/js/form.js"></script>

<!-- ! ~~~JS_LIB~~~ -->



		<!--					/head					-->

	</head>
	<body   class=" gray-bg" >

		<!--					body					-->
					
		<div class="wrapper wrapper-content animated fadeInRight   ">

				
			
			<div class="row"  >

						
<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>用户列表
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
							
													
							<div class="row">
								<div class="col-sm-4 m-b-xs">
									<button type="button" class="btn btn-success" onclick="location.reload()"> 刷新页面</button>
									<!--<a target="_self" href="" class="btn btn-success ">重置搜索条件</a>-->
									<a target="_blank" href="#" class="btn btn-success "> 在新窗口中打开</a>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12 m-b-xs">
									<button type="button" class="btn btn-success  search-dom-btn-1"> 筛选</button>
									<button type="button" class="btn btn-info  se-all"> 全选</button>
									<button type="button" class="btn btn-info  se-rev"> 反选</button>
									<button type="button" class="btn btn-danger  btn-add"> 添加数据</button>
									<button type="button" class="btn btn-danger  multi-op multi-op-del"> 批量删除</button>
									<button type="button" class="btn btn-primary  multi-op multi-op-toggle-status-enable"> 批量启用</button>
									<button type="button" class="btn btn-warning  multi-op multi-op-toggle-status-disable"> 批量禁用</button>
								</div>
							</div>

							
							<div class="table-responsive">
							
								

								<!--<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>-->
								<table class="table table-striped  table-bordered table-hover table-condensed ">
									<thead>
										<tr>
											<th style="width:80px;">ID</th><th >账户</th><th >联系方式</th><th >时间</th><th >IP</th><th >登陆次数</th><th >状态</th><th >操作</th>
										</tr>
									</thead>
									<tbody>
																	
		<tr data-id="1" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > qq123456

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user111

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > dfddcc@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 15826533333

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:29:56

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 2018-08-14 08:34:07

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 9

 </span>



		</td>


						
		<td  >
		
				

		</td>


						
		<td  >
		
				

		</td>




		</tr>


						
		<tr data-id="2" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 2

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > qq1234567

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > HELLO

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > 1234522226@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 15826544417

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:30:06

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 2018-08-14 16:08:23

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 9

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="3" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 3

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > zz123456

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user333

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > 123zz226@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:30:11

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="4" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 4

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > dd123456

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user444

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > dd226@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 15826544417

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:30:18

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="5" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 5

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > dfd123456

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user555

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > dd2d26@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:30:30

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="6" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 6

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > dfdf123456

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user666

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > dd2d2ee6@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 15:31:00

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="7" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 7

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > xiaoming

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user1777

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > 123456@cc.vv

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 12312312355

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-01 22:40:11

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="8" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 8

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > dfdfee

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user1888

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > skldfj@qq.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 12312312355

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-02 10:03:58

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="10" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 10

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > kjsdkj

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > use999

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > sdddddf@434.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 15533654444

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-03 09:04:48

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="11" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 11

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > test1c

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > user111

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > sfklsdajf@aa.cc

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 13321212121

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-07 15:26:45

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="12" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 12

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 用户名 : 

 </span>

<span  class=" name"  > helloworld

 </span>

<br/>

<span  class="name"  > 姓名 : 

 </span>

<span  class="td-modify name"  data-field="nickname"  > 

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > email : 

 </span>

<span  class="td-modify name"  data-field="email"  data-reg="/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/"  data-msg="请填写合法email"  > 

 </span>

<br>

<span  class="name"  > 电话 : 

 </span>

<span  class="td-modify name"  data-field="phone"  data-reg="/^1\d{10}$/"  data-msg="请填写合法手机号码"  > 

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册时间

 </span>

<span  class=" name"  > 2018-08-08 14:14:51

 </span>

<br>

<span  class="name"  > 登陆时间

 </span>

<span  class=" name"  > 1970-01-01 08:00:00

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 注册IP

 </span>

<span  class=" name"  > 127.0.0.1

 </span>

<br>

<span  class="name"  > 登陆IP

 </span>

<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-info btn-modify-pwd" >修改密码</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-assign-role" >用户授权</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>



									</tbody>
								</table>
		
								

							</div>




							
						</div>
					</div>
				</div>




			</div>



		</div>


<!-- ! ~~~BODY~~~ -->


		<!--					/body					-->


		<!--					script					-->
		
		
		
		
						
			<div class="search-dom-1" style="display: none;padding: 5px;">
				<form id="form1" action="">
					<div class="col-sm-12 m-b-xs">
						<button type="submit" class="btn  btn-primary">搜索 ( 回车键 )</button>
					</div>
											
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">用户账号</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="user">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">用户名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="nickname">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
				<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn">注册时间</span>
					</span>
					<input type="text" placeholder="" class=" form-control" name="reg_time_begin" value="" >
						<span class="input-group-addon">到</span>
					<input type="text" placeholder="" class=" form-control" name="reg_time_end" value="" >
				</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">每页显示条数</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="50" name="pagerow">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">排序字段</span>
				</span>
				<select class=" form-control  inline change_serach" name="order_filed">
					<option value='id' selected>默认</option><option value='last_login_time' >最后登录时间</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-6 m-b-xs">

			<div class="input-daterange input-group">
	<span class="input-group-btn">
		<span class="btn">排序方向</span>
	</span>
	<div data-toggle="buttons" class="btn-group">
		<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
		<label class="btn  btn-white active"> <input checked type="radio"   name="order" value="asc">正序</label><label class="btn  btn-white "> <input  type="radio"   name="order" value="desc">反序</label>
	</div>
</div>



		</div>


						
		<div class="col-sm-6 m-b-xs">

			<div class="input-daterange input-group">
	<span class="input-group-btn">
		<span class="btn">状态</span>
	</span>
	<div data-toggle="buttons" class="btn-group">
		<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
		<label class="btn  btn-white active"> <input checked type="radio"   name="status" value="-1">全部</label><label class="btn  btn-white "> <input  type="radio"   name="status" value="0">禁用</label><label class="btn  btn-white "> <input  type="radio"   name="status" value="1">正常</label>
	</div>
</div>



		</div>



				</form>
			</div>
						

<script>
window.deleteUrl = '/admin/user/delete.html';
window.setFieldUrl = '/admin/user/setfield.html';
window.detailUrl = '/admin/user/detail.html';
window.editUrl = '/admin/user/edit.html';
window.addUrl = '/admin/user/add.html';
window.editPwdUrl = '/admin/user/editpwd.html';
window.assignRolesUrl = '/admin/user/assignroles.html';
</script>

			<script>  
					
			</script>  
			<script>  
				
			</script>  

<!-- ! ~~~SCRIPT~~~ -->








		<script src="__STATIC__/js/custom.js"></script>
<script src="__STATIC__/js/custom_table.js"></script>

<!-- ! ~~~JS_INVOKE~~~ -->


		<!--					/script					-->
	</body>
</html>