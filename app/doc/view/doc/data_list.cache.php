		

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
<title>稿件列表</title>

<!-- ! ~~~HEAD~~~ -->










		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
<link rel="stylesheet" href="__STATIC__/css/custom.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/iCheck/custom.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/switchery/switchery.css">
<link rel="stylesheet" href="__HPLUS__css/plugins/datapicker/datepicker3.css">
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
<script src="__HPLUS__js/plugins/iCheck/icheck.min.js"></script>
<script src="__HPLUS__js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="__HPLUS__js/plugins/switchery/switchery.js"></script>
<script src="__STATIC__/js/form.js"></script>

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
			<h5>稿件列表
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
				<div class="col-sm-12 m-b-xs"><button type="button" class="btn btn-success  search-dom-btn-1" data-src="" data-title="" >筛选</button>
<button type="button" class="btn btn-info  se-all" data-src="" data-title="" >全选</button>
<button type="button" class="btn btn-info  se-rev" data-src="" data-title="" >反选</button>
<button type="button" class="btn btn-primary  multi-op multi-set-info" data-src="" data-title="" >批量设置信息</button>
<button type="button" class="btn btn-danger  multi-op multi-op-del" data-src="" data-title="" >批量删除</button>
<button type="button" class="btn btn-warning btn-open-window" data-src="/doc/doc/exportexecl.html" data-title="导出execl ( 按当前查询条件 )" >导出execl ( 按当前查询条件 )</button>
</div>

			</div>

			
			<div class="table-responsive">
			
				

				<!--<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>-->
				<table class="table table-striped  table-bordered table-hover table-condensed ">
					<thead>
						<tr>
							<th style="width:80px;">ID</th><th style="width:auto;">稿件信息</th><th >稿件状态</th><th style="width:120px;">采编备注</th><th style="width:120px;">编辑备注</th><th >稿件状态</th><th >信息确认</th><th >操作</th>
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
		
				<span  class="name bold"  > 文档名字 : 

 </span>

<span  class=" name"  > <span style='color: #00f;'>1P--程胜杰--基层动物防疫管理有关问题的建议研究.docx</span>

 </span>

<br/>

<span  class="name bold"  > 上传用户 : 

 </span>

<span  class=" name"  > 采编1111

 </span>

<br/>

<span  class="name bold"  > 上传时间 : 

 </span>

<span  class=" name"  > 2018-09-25 09:10:23

 </span>

<br/>

<span  class="name bold"  > 邮寄联系人 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄电话 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄地址 : 

 </span>

<span  class=" name"  >    

 </span>



		</td>


						
		<td  >
		
				<span  class="name bold"  > 年份 :

 </span>

			
		<select style='background: #fff'  data-field="year"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='2018'  style='background: #fff'>2018</option><option value='2019'  style='background: #fff'>2019</option><option value='2020'  style='background: #fff'>2020</option><option value='2021'  style='background: #fff'>2021</option>
		</select>


<span  class="name bold"  > 月份 :

 </span>

			
		<select style='background: #fff'  data-field="month"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>1</option><option value='2'  style='background: #fff'>2</option><option value='3'  style='background: #fff'>3</option><option value='4'  style='background: #fff'>4</option><option value='5'  style='background: #fff'>5</option><option value='6'  style='background: #fff'>6</option><option value='7'  style='background: #fff'>7</option><option value='8'  style='background: #fff'>8</option><option value='9'  style='background: #fff'>9</option><option value='10'  style='background: #fff'>10</option><option value='11'  style='background: #fff'>11</option><option value='12'  style='background: #fff'>12</option>
		</select>


<br>

<span  class="name bold"  > 定金 : 

 </span>

<span  class="td-modify name"  data-field="deposit"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 尾款 : 

 </span>

<span  class="td-modify name"  data-field="final_payment"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<br>

<span  class="name bold"  > 总额 : 

 </span>

<span  class="td-modify name"  data-field="total"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 刊物名 : 

 </span>

<span  class="td-modify name"  data-field="journal_name"  > 

 </span>

<br>

<span  class="name bold"  > 刊物类型 :

 </span>

			
		<select style='background: #fff'  data-field="journal_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>普刊</option><option value='2'  style='background: #fff'>学报</option><option value='3'  style='background: #fff'>课题</option><option value='4'  style='background: #fff'>专利</option><option value='5'  style='background: #fff'>核心</option><option value='6'  style='background: #fff'>专著</option><option value='7'  style='background: #fff'>挂名</option>
		</select>


<br>

<span  class="name bold"  > 稿件类型 :

 </span>

			
		<select style='background: #fff'  data-field="doc_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>组稿</option><option value='2'  style='background: #fff'>自稿</option>
		</select>




		</td>


						
		<td  >
		
				<textarea  class=" name"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark_editor"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
							
		<select style='background: #fff'  data-field="is_pending"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"  1 >
			<option value='0' selected style='background: #fff'>待定</option><option value='1'  style='background: #f00'>待处理</option><option value='2'  style='background: #0f0'>已处理</option>
		</select>




		</td>


						
		<td  >
		
							<input type="checkbox" name="is_confirm"  data-change-callback="switcherUpdateFieldConfirm" data-success-callback="refresh_page" class="js-switch-notauto"     />




		</td>


						
		<td  >
		
				<a  class="btn-xs "  target="_blank"  href="/doc/doc/downloaddoc/id/1.html"  > 下载稿件

 </a>

<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-upload-attachment" >上传附件</button>


						
			<button type="button" class="btn btn-xs   btn-primary btn-preview-attachment" >查看附件</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>


<br>

<span  class="name bold"  > 稿件状态 :

 </span>

			
		<select style='background: #fff'  data-field="doc_status"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="refresh_page"   >
			<option value='0' selected style='background: #fff'>待定</option><option value='11'  style='background: #fff'>审稿</option><option value='1'  style='background: #fff'>录用</option><option value='2'  style='background: #fff'>修改</option><option value='4'  style='background: #fff'>退款</option><option value='12'  style='background: #fff'>黄稿</option><option value='5'  style='background: #fff'>上报</option><option value='6'  style='background: #fff'>写作</option><option value='7'  style='background: #fff'>排版</option><option value='8'  style='background: #fff'>自审校</option><option value='9'  style='background: #fff'>社审校</option><option value='3'  style='background: #fff'>已收款</option><option value='13'  style='background: #fff'>已出</option><option value='10'  style='background: #fff'>完成</option>
		</select>




		</td>




		</tr>


						
		<tr data-id="2" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 2

 </span>



		</td>


						
		<td  >
		
				<span  class="name bold"  > 文档名字 : 

 </span>

<span  class=" name"  > <span style='color: #00f;'>1P--季灵--航班延误谁之过.docx</span>

 </span>

<br/>

<span  class="name bold"  > 上传用户 : 

 </span>

<span  class=" name"  > 采编1111

 </span>

<br/>

<span  class="name bold"  > 上传时间 : 

 </span>

<span  class=" name"  > 2018-09-25 09:10:24

 </span>

<br/>

<span  class="name bold"  > 邮寄联系人 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄电话 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄地址 : 

 </span>

<span  class=" name"  >    

 </span>



		</td>


						
		<td  >
		
				<span  class="name bold"  > 年份 :

 </span>

			
		<select style='background: #fff'  data-field="year"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='2018'  style='background: #fff'>2018</option><option value='2019'  style='background: #fff'>2019</option><option value='2020'  style='background: #fff'>2020</option><option value='2021'  style='background: #fff'>2021</option>
		</select>


<span  class="name bold"  > 月份 :

 </span>

			
		<select style='background: #fff'  data-field="month"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>1</option><option value='2'  style='background: #fff'>2</option><option value='3'  style='background: #fff'>3</option><option value='4'  style='background: #fff'>4</option><option value='5'  style='background: #fff'>5</option><option value='6'  style='background: #fff'>6</option><option value='7'  style='background: #fff'>7</option><option value='8'  style='background: #fff'>8</option><option value='9'  style='background: #fff'>9</option><option value='10'  style='background: #fff'>10</option><option value='11'  style='background: #fff'>11</option><option value='12'  style='background: #fff'>12</option>
		</select>


<br>

<span  class="name bold"  > 定金 : 

 </span>

<span  class="td-modify name"  data-field="deposit"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 尾款 : 

 </span>

<span  class="td-modify name"  data-field="final_payment"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<br>

<span  class="name bold"  > 总额 : 

 </span>

<span  class="td-modify name"  data-field="total"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 刊物名 : 

 </span>

<span  class="td-modify name"  data-field="journal_name"  > 

 </span>

<br>

<span  class="name bold"  > 刊物类型 :

 </span>

			
		<select style='background: #fff'  data-field="journal_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>普刊</option><option value='2'  style='background: #fff'>学报</option><option value='3'  style='background: #fff'>课题</option><option value='4'  style='background: #fff'>专利</option><option value='5'  style='background: #fff'>核心</option><option value='6'  style='background: #fff'>专著</option><option value='7'  style='background: #fff'>挂名</option>
		</select>


<br>

<span  class="name bold"  > 稿件类型 :

 </span>

			
		<select style='background: #fff'  data-field="doc_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>组稿</option><option value='2'  style='background: #fff'>自稿</option>
		</select>




		</td>


						
		<td  >
		
				<textarea  class=" name"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark_editor"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
							
		<select style='background: #fff'  data-field="is_pending"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"  1 >
			<option value='0' selected style='background: #fff'>待定</option><option value='1'  style='background: #f00'>待处理</option><option value='2'  style='background: #0f0'>已处理</option>
		</select>




		</td>


						
		<td  >
		
							<input type="checkbox" name="is_confirm"  data-change-callback="switcherUpdateFieldConfirm" data-success-callback="refresh_page" class="js-switch-notauto"     />




		</td>


						
		<td  >
		
				<a  class="btn-xs "  target="_blank"  href="/doc/doc/downloaddoc/id/2.html"  > 下载稿件

 </a>

<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-upload-attachment" >上传附件</button>


						
			<button type="button" class="btn btn-xs   btn-primary btn-preview-attachment" >查看附件</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>


<br>

<span  class="name bold"  > 稿件状态 :

 </span>

			
		<select style='background: #fff'  data-field="doc_status"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="refresh_page"   >
			<option value='0' selected style='background: #fff'>待定</option><option value='11'  style='background: #fff'>审稿</option><option value='1'  style='background: #fff'>录用</option><option value='2'  style='background: #fff'>修改</option><option value='4'  style='background: #fff'>退款</option><option value='12'  style='background: #fff'>黄稿</option><option value='5'  style='background: #fff'>上报</option><option value='6'  style='background: #fff'>写作</option><option value='7'  style='background: #fff'>排版</option><option value='8'  style='background: #fff'>自审校</option><option value='9'  style='background: #fff'>社审校</option><option value='3'  style='background: #fff'>已收款</option><option value='13'  style='background: #fff'>已出</option><option value='10'  style='background: #fff'>完成</option>
		</select>




		</td>




		</tr>


						
		<tr data-id="3" >
		
												
		<td  >
		
										
			<input type="checkbox" class="i-checks ids" >


<span  class=" name"  > 3

 </span>



		</td>


						
		<td  >
		
				<span  class="name bold"  > 文档名字 : 

 </span>

<span  class=" name"  > <span style='color: #00f;'>1P--巩淑芳--基建档案在高校建设中的作用及管理策略分析  .docx</span>

 </span>

<br/>

<span  class="name bold"  > 上传用户 : 

 </span>

<span  class=" name"  > 采编1111

 </span>

<br/>

<span  class="name bold"  > 上传时间 : 

 </span>

<span  class=" name"  > 2018-09-25 09:10:25

 </span>

<br/>

<span  class="name bold"  > 邮寄联系人 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄电话 : 

 </span>

<span  class=" name"  > 

 </span>

<br/>

<span  class="name bold"  > 邮寄地址 : 

 </span>

<span  class=" name"  >    

 </span>



		</td>


						
		<td  >
		
				<span  class="name bold"  > 年份 :

 </span>

			
		<select style='background: #fff'  data-field="year"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='2018'  style='background: #fff'>2018</option><option value='2019'  style='background: #fff'>2019</option><option value='2020'  style='background: #fff'>2020</option><option value='2021'  style='background: #fff'>2021</option>
		</select>


<span  class="name bold"  > 月份 :

 </span>

			
		<select style='background: #fff'  data-field="month"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>1</option><option value='2'  style='background: #fff'>2</option><option value='3'  style='background: #fff'>3</option><option value='4'  style='background: #fff'>4</option><option value='5'  style='background: #fff'>5</option><option value='6'  style='background: #fff'>6</option><option value='7'  style='background: #fff'>7</option><option value='8'  style='background: #fff'>8</option><option value='9'  style='background: #fff'>9</option><option value='10'  style='background: #fff'>10</option><option value='11'  style='background: #fff'>11</option><option value='12'  style='background: #fff'>12</option>
		</select>


<br>

<span  class="name bold"  > 定金 : 

 </span>

<span  class="td-modify name"  data-field="deposit"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 尾款 : 

 </span>

<span  class="td-modify name"  data-field="final_payment"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<br>

<span  class="name bold"  > 总额 : 

 </span>

<span  class="td-modify name"  data-field="total"  data-reg="/^\d+(\.\d{1,2})?$/"  data-msg="必须为整数或者小数"  > 0.00

 </span>

<span  class="name bold"  > 刊物名 : 

 </span>

<span  class="td-modify name"  data-field="journal_name"  > 

 </span>

<br>

<span  class="name bold"  > 刊物类型 :

 </span>

			
		<select style='background: #fff'  data-field="journal_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>普刊</option><option value='2'  style='background: #fff'>学报</option><option value='3'  style='background: #fff'>课题</option><option value='4'  style='background: #fff'>专利</option><option value='5'  style='background: #fff'>核心</option><option value='6'  style='background: #fff'>专著</option><option value='7'  style='background: #fff'>挂名</option>
		</select>


<br>

<span  class="name bold"  > 稿件类型 :

 </span>

			
		<select style='background: #fff'  data-field="doc_type"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"   >
			<option value='0' selected style='background: #fff'>请选择</option><option value='1'  style='background: #fff'>组稿</option><option value='2'  style='background: #fff'>自稿</option>
		</select>




		</td>


						
		<td  >
		
				<textarea  class=" name"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
				<textarea  class="td-modify"  data-field="remark_editor"  style="width:100%;height:100px"  > 

 </textarea>



		</td>


						
		<td  >
		
							
		<select style='background: #fff'  data-field="is_pending"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="updateColor"  1 >
			<option value='0' selected style='background: #fff'>待定</option><option value='1'  style='background: #f00'>待处理</option><option value='2'  style='background: #0f0'>已处理</option>
		</select>




		</td>


						
		<td  >
		
							<input type="checkbox" name="is_confirm"  data-change-callback="switcherUpdateFieldConfirm" data-success-callback="refresh_page" class="js-switch-notauto"     />




		</td>


						
		<td  >
		
				<a  class="btn-xs "  target="_blank"  href="/doc/doc/downloaddoc/id/3.html"  > 下载稿件

 </a>

<br>

						
			<button type="button" class="btn btn-xs   btn-info btn-upload-attachment" >上传附件</button>


						
			<button type="button" class="btn btn-xs   btn-primary btn-preview-attachment" >查看附件</button>


<br>

						
			<button type="button" class="btn btn-xs   btn-danger btn-delete" >删除</button>


<br>

<span  class="name bold"  > 稿件状态 :

 </span>

			
		<select style='background: #fff'  data-field="doc_status"  class=" td-select"   data-change-callback="registUpdate"   data-success-callback="refresh_page"   >
			<option value='0' selected style='background: #fff'>待定</option><option value='11'  style='background: #fff'>审稿</option><option value='1'  style='background: #fff'>录用</option><option value='2'  style='background: #fff'>修改</option><option value='4'  style='background: #fff'>退款</option><option value='12'  style='background: #fff'>黄稿</option><option value='5'  style='background: #fff'>上报</option><option value='6'  style='background: #fff'>写作</option><option value='7'  style='background: #fff'>排版</option><option value='8'  style='background: #fff'>自审校</option><option value='9'  style='background: #fff'>社审校</option><option value='3'  style='background: #fff'>已收款</option><option value='13'  style='background: #fff'>已出</option><option value='10'  style='background: #fff'>完成</option>
		</select>




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
		
			<script>  
			
			</script>  
		
		
		
						
			<div class="search-dom-1" style="display: none;padding: 5px;">
				<form id="form1" action="">
					<div class="col-sm-12 m-b-xs">
						<button type="submit" class="btn  btn-primary">搜索 ( 回车键 )</button>
					</div>
											
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">文档标题</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="title">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">文档作者</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="author">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">上传用户</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="nickname">
		</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

				
			<div class="input-group">
				<span class="input-group-btn">
						<span class="btn"> 文档P数 </span>
				</span>
				<input type="text" placeholder="" class=" form-control" name="start_p" value="" >
				<span class="input-group-btn"><span class="btn">到</span></span>
				<input type="text" placeholder="" class=" form-control" name="end_p" value="" >
			</div>




		</div>


						
		<div class="col-sm-6 m-b-xs">

			
				<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn">上传时间</span>
					</span>
					<input type="text" placeholder="" class=" form-control" name="reg_time_begin" value="" >
						<span class="input-group-addon">到</span>
					<input type="text" placeholder="" class=" form-control" name="reg_time_end" value="" >
				</div>




		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">安排年份</span>
				</span>
				<select class=" form-control  inline change_serach" name="year">
					<option value='-1' selected>全部</option><option value='0' >请选择</option><option value='2018' >2018</option><option value='2019' >2019</option><option value='2020' >2020</option><option value='2021' >2021</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">安排月份</span>
				</span>
				<select class=" form-control  inline change_serach" name="month">
					<option value='-1' selected>全部</option><option value='0' >请选择</option><option value='1' >1</option><option value='2' >2</option><option value='3' >3</option><option value='4' >4</option><option value='5' >5</option><option value='6' >6</option><option value='7' >7</option><option value='8' >8</option><option value='9' >9</option><option value='10' >10</option><option value='11' >11</option><option value='12' >12</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">稿件类型</span>
				</span>
				<select class=" form-control  inline change_serach" name="doc_type">
					<option value='-1' selected>全部</option><option value='0' >请选择</option><option value='1' >组稿</option><option value='2' >自稿</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">刊物类型</span>
				</span>
				<select class=" form-control  inline change_serach" name="journal_type">
					<option value='-1' selected>全部</option><option value='0' >请选择</option><option value='1' >普刊</option><option value='2' >学报</option><option value='3' >课题</option><option value='4' >专利</option><option value='5' >核心</option><option value='6' >专著</option><option value='7' >挂名</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">稿件状态</span>
				</span>
				<select class=" form-control  inline change_serach" name="doc_status">
					<option value='-1' selected>全部</option><option value='0' >待定</option><option value='11' >审稿</option><option value='1' >录用</option><option value='2' >修改</option><option value='4' >退款</option><option value='12' >黄稿</option><option value='5' >上报</option><option value='6' >写作</option><option value='7' >排版</option><option value='8' >自审校</option><option value='9' >社审校</option><option value='3' >已收款</option><option value='13' >已出</option><option value='10' >完成</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-3 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">处理状态</span>
				</span>
				<select class=" form-control  inline change_serach" name="is_pending">
					<option value='-1' selected>全部</option><option value='0' >待定</option><option value='1' >待处理</option><option value='2' >已处理</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-4 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">刊物名</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="" name="journal_name">
		</div>




		</div>


						
		<div class="col-sm-4 m-b-xs">

			
		<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">每页显示条数</span>
			</span>
			<input type="text" placeholder="" class=" form-control" value="20" name="pagerow">
		</div>




		</div>


						
		<div class="col-sm-4 m-b-xs">

						<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">排序字段</span>
				</span>
				<select class=" form-control  inline change_serach" name="order_filed">
					<option value='id' selected>默认</option>
				</select>
			</div>



		</div>


						
		<div class="col-sm-4 m-b-xs">

			<div class="input-daterange input-group">
	<span class="input-group-btn">
		<span class="btn">确认信息</span>
	</span>
	<div data-toggle="buttons" class="btn-group">
		<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
		<label class="btn  btn-white active"> <input checked type="radio"   name="is_confirm" value="-1">全部</label><label class="btn  btn-white "> <input  type="radio"   name="is_confirm" value="1">是</label><label class="btn  btn-white "> <input  type="radio"   name="is_confirm" value="0">否</label>
	</div>
</div>



		</div>


						
		<div class="col-sm-4 m-b-xs">

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



				</form>
			</div>
						

<script>
window.deleteUrl = '/doc/doc/delete.html';
window.setFieldUrl = '/doc/doc/setfield.html';
window.detailUrl = '/doc/doc/detail.html';
window.editUrl = '/doc/doc/edit.html';
window.addUrl = '/doc/doc/add.html';
window.setDocInfoUrl = '/doc/doc/setdocinfo.html';
window.replaceDocUrl = '/doc/doc/replacedoc.html';
window.assignAddressUrl = '/doc/doc/assignaddress.html';
window.registerUploadAttachmentUrl = '/doc/docattachment/add.html';
window.registerPreviewAttachmentUrl = '/doc/docattachment/datalist.html';
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