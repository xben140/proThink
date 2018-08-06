		

<!doctype html>
<html lang="en">
	<head>

		<!--					head					-->

		<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<!--[if lt IE 9]><meta http-equiv="refresh" content="0;ie.html" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta  name="viewport"  content="width=device-width"  >
<meta  name="keywords"  content=""  >
<meta  name="description"  content=""  >
<meta name="renderer" content="webkit" >
<title>table测试</title>

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
							<h5>大标题
								<small>小标题</small>
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
							
								<ul class="pagination"> <li class="disabled"> <span>«</span> </li> <li class="active"> <span>122</span> </li> <li> <a href="#">2</a> </li> <li> <a href="#">»</a> </li> </ul>

								<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>
								<table class="table table-striped  table-bordered table-hover table-condensed ">
									<thead>
										<tr>
											<th style="width:20px;"></th><th class="red">项目</th><th >进度</th><th >任务</th><th >日期</th><th >操作</th>
										</tr>
									</thead>
									<tbody>
																	
		<tr data-id="1" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > name222:

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\d{1,4}$/"  data-msg="请填写合法手机号码"  > 234

 </span>



		</td>


						
		<td  >
		
				<span  > time111:

 </span>

			
		<select  data-field="time111:"  class="   td-select" >
			<option value='1' >年</option><option value='2' >月</option><option value='3' >日</option>
		</select>




		</td>


						
		<td  >
		
				<span  > time22:

 </span>

<span  > 2018-08-01 11:56:17

 </span>



		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-detail" >详细</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>


						
		<td  >
		
							<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"    class='js-switch' />


<br>

<span  > 编辑

 </span>

			<input type="checkbox"  name="aa"  data-change-callback="switcherUpdateFieldConfirm"  checked  class='js-switch-notauto' />




		</td>




		</tr>



									</tbody>
								</table>
		
								<ul class="pagination"> <li class="disabled"> <span>«</span> </li> <li class="active"> <span>122</span> </li> <li> <a href="#">2</a> </li> <li> <a href="#">»</a> </li> </ul>

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
						<button type="submit" class="btn  btn-primary">搜索</button>
					</div>
	
											
		<div class="col-sm-12 m-b-xs">

				
			<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">上传时间</span>
				</span>

				<select class=" form-control  inline change_serach" name="nameaaa11">
					<option value='1' >年</option><option value='2' selected>月</option><option value='3' >日</option>
				</select>
			</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

				<div data-toggle="buttons" class="btn-group">
		<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
		<label class="btn  btn-white "> <input type="radio"   name="nameaaa" value="1">年</label><label class="btn  btn-white "> <input type="radio"   name="nameaaa" value="2">月</label><label class="btn  btn-white "> <input type="radio"   name="nameaaa" value="3">日</label>
	</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

				<div data-toggle="buttons" class="btn-group">
		<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
		<label class="btn  btn-white "> <input type="checkbox"   name="namebbbb" value="1">年</label><label class="btn  btn-white "> <input type="checkbox"   name="namebbbb" value="2">月</label><label class="btn  btn-white "> <input type="checkbox"   name="namebbbb" value="3">日</label>
	</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">名字</span>
			</span>
			<input type="text" placeholder="随便写" class=" form-control" value="gaag" name="name11">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">名字</span>
			</span>
			<input type="text" placeholder="随便写" class=" form-control" value="gaag" name="name11">
		</div>




		</div>


						
		<div class="col-sm-12 m-b-xs">

				
			<div class="input-group">
				<span class="input-group-btn">
						<span class="btn"> 名字 </span>
				</span>
				<input type="text" placeholder="placeholder1" class=" form-control" name="name1" value="名字" >
				<span class="input-group-btn"><span class="btn">到</span></span>
				<input type="text" placeholder="placeholder2" class=" form-control" name="name2" value="value2" >
			</div>




		</div>


						
		<div class="col-sm-12 m-b-xs">

			
				<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn">名字</span>
					</span>
					<input type="text" placeholder="placeholder1" class=" form-control" name="name111" value="" >
						<span class="input-group-addon">到</span>
					<input type="text" placeholder="placeholder2" class=" form-control" name="name222" value="" >
				</div>




		</div>



	
				</form>
			</div>
						

<script>
window.deleteUrl = '/home/index/delete.html';
window.setFieldUrl = '/home/index/setfield.html';
window.detailUrl = '/home/index/detail.html';
window.editUrl = '/home/index/edit.html';
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