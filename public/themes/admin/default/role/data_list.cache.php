		

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
<title>角色列表</title>

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
							<h5>角色列表
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
											<th style="width:80px;">ID</th><th >角色名</th><th >排序</th><th >添加时间</th><th >备注</th><th >状态</th><th >操作</th>
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员111

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 133

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-24 22:10:07

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 3243

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="2" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 2

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员122

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-24 22:11:13

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 123456

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员333

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1000

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-24 22:13:05

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > dgsfsdf

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员1444

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-25 08:59:45

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > gsdfasf

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员5555

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 22

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-25 09:00:18

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 备注

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员6666

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 33

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-07-25 09:00:22

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 备注

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员777

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-08-01 15:35:08

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员888

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-08-01 15:35:19

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="9" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 9

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > 管理员999

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 13

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-08-01 15:35:28

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > dsfsdf

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > aaa

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-08-08 14:14:01

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > cvcv

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="name"  data-reg="/^\S+$/"  data-msg="角色名必填"  > ffff

 </span>



		</td>


						
		<td  >
		
				<span  class="name"  > 

 </span>

<span  class="td-modify name"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  class=" name"  > 2018-08-08 14:56:53

 </span>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark"  style="width:100%"  > 

 </textarea>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-info btn-assign-privileges" >分配权限</button>


						
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
					<span class="btn">角色名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="name">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
				<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn">添加时间</span>
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
					<option value='id' selected>默认</option>
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
window.deleteUrl = '/admin/role/delete.html';
window.setFieldUrl = '/admin/role/setfield.html';
window.detailUrl = '/admin/role/detail.html';
window.editUrl = '/admin/role/edit.html';
window.addUrl = '/admin/role/add.html';
window.assignPrivilegesUrl = '/admin/role/assignprivileges.html';
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