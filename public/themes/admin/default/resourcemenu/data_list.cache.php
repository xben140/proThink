		

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
<title>菜单列表</title>

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
							<h5>菜单列表
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
							
								<ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=2">2</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=3">3</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=4">4</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=5">5</a></li> <li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=2">&raquo;</a></li></ul>

								<!--<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>-->
								<table class="table table-striped  table-bordered table-hover table-condensed ">
									<thead>
										<tr>
											<th style="width:20px;"></th><th >ID</th><th >权限名</th><th >模块/控制器/方法</th><th >图标</th><th >排序</th><th >时间</th><th >备注</th><th >是否作为菜单</th><th >是否通用方法</th><th >状态</th><th >操作</th>
										</tr>
									</thead>
									<tbody>
																	
		<tr data-id="1" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > 1

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\S+$/"  data-msg="权限名必填"  > 区域联动接口

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="module"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="模块名必填"  > admin

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="controller"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="控制器名必填"  > Area

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="action"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="方法名必填"  > getAreaByPid

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="ico"  > fa-edit

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 3

 </span>



		</td>


						
		<td  >
		
				<span  > 2018-07-25 16:22:40

 </span>



		</td>


						
		<td  >
		
				<span  > 4级联动地址接口

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_menu"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_common"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="2" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > 2

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\S+$/"  data-msg="权限名必填"  > 主页

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="module"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="模块名必填"  > admin

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="controller"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="控制器名必填"  > Index

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="action"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="方法名必填"  > Index

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="ico"  > fa-edit

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 2

 </span>



		</td>


						
		<td  >
		
				<span  > 2018-07-25 16:22:57

 </span>



		</td>


						
		<td  >
		
				<span  > 主页

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_menu"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_common"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="3" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > 3

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\S+$/"  data-msg="权限名必填"  > 用户管理

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="module"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="模块名必填"  > admin

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="controller"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="控制器名必填"  > User

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="action"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="方法名必填"  > none

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="ico"  > fa-edit

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 1

 </span>



		</td>


						
		<td  >
		
				<span  > 2018-07-25 16:23:31

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_menu"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_common"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="4" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > 4

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\S+$/"  data-msg="权限名必填"  > 分配角色

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="module"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="模块名必填"  > admin

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="controller"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="控制器名必填"  > User

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="action"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="方法名必填"  > assignRoles

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="ico"  > fa-edit

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 2018-08-01 15:44:29

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_menu"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_common"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>


						
		<tr data-id="5" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >




		</td>


						
		<td  >
		
				<span  > 5

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="name"  data-reg="/^\S+$/"  data-msg="权限名必填"  > 用户列表

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="module"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="模块名必填"  > admin

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="controller"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="控制器名必填"  > User

 </span>

/

<span  > 

 </span>

<span  class="td-modify"  data-field="action"  data-reg="/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/"  data-msg="方法名必填"  > dataList

 </span>

 



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="ico"  > fa-edit

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

<span  class="td-modify"  data-field="order"  data-reg="/^\d+$/"  data-msg="必须为数字，确保前后无空格"  > 0

 </span>



		</td>


						
		<td  >
		
				<span  > 2018-08-01 15:44:44

 </span>



		</td>


						
		<td  >
		
				<span  > sdfsdf

 </span>



		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_menu"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="is_common"  data-change-callback="switcherUpdateField"    class='js-switch' />




		</td>


						
		<td  >
		
				<span  > 

 </span>

			<input type="checkbox"  name="status"  data-change-callback="switcherUpdateField"  checked  class='js-switch' />




		</td>


						
		<td  >
		
										
			<button type="button" class="btn btn-xs   btn-success btn-edit" >编辑</button>


						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>




		</td>




		</tr>



									</tbody>
								</table>
		
								<ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=2">2</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=3">3</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=4">4</a></li><li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=5">5</a></li> <li><a href="/admin/resourcemenu/datalist.html?%2Fadmin%2Fresourcemenu%2Fdatalist_html=&amp;page=2">&raquo;</a></li></ul>

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
											
		<div class="col-sm-12 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">权限名字</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="name">
		</div>




		</div>


						
		<div class="col-sm-4 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">模块名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="module">
		</div>




		</div>


						
		<div class="col-sm-4 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">控制器名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="controller">
		</div>




		</div>


						
		<div class="col-sm-4 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">方法名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="action">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">每页显示条数</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="5" name="pagerow">
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
window.deleteUrl = '/admin/resourcemenu/delete.html';
window.setFieldUrl = '/admin/resourcemenu/setfield.html';
window.detailUrl = '/admin/resourcemenu/detail.html';
window.editUrl = '/admin/resourcemenu/edit.html';
window.addUrl = '/admin/resourcemenu/add.html';
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