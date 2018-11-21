<!doctype html>
<html lang="en">
	<head>
		<!--					head					-->
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="">
		<!--[if lt IE 9]>
		<meta http-equiv="refresh" content="0;ie.html" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="renderer" content="webkit">
		<title>文章列表</title>
		<!-- ! ~~~HEAD~~~ -->
		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
		<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
		<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
		<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
		<link rel="stylesheet" href="__STATIC__/css/custom.css">
		<link rel="stylesheet" href="__HPLUS__css/plugins/iCheck/custom.css">
		<link rel="stylesheet" href="__HPLUS__css/plugins/switchery/switchery.css">
		<link rel="stylesheet" href="__HPLUS__css/plugins/datapicker/datepicker3.css">
		<style></style>
		<style></style>
		<style></style>
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
	<body class=" gray-bg">
		<!--					body					-->
		<div class="wrapper wrapper-content animated fadeInRight  ">
			<div class="row">
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
								<div class="col-sm-12 m-b-xs">
									<button type="button" class="btn btn-primary" onclick="refresh_page()">刷新页面</button>
									<button type="button" class="btn btn-primary" onclick="rowReload()">重置搜索条件</button>
									<a target="_blank" href="#" class="btn btn-primary ">新窗口中打开</a>
								</div>
								<div class="col-sm-12 m-b-xs">
									<button type="button" class="btn btn-success  search-dom-btn-1">筛选</button>
									<button type="button" class="btn btn-info  se-all">全选</button>
									<button type="button" class="btn btn-info  se-rev">反选</button>
									<button type="button" class="btn btn-danger  btn-add">添加博文</button>
									<button type="button" class="btn btn-danger  multi-op multi-op-del">批量删除</button>
									<button type="button" class="btn btn-info btn-open-pop" data-src="/blog/blogtype/datalist.html" data-title="文章类型">文章类型</button>
									<button type="button" class="btn btn-info btn-open-pop" data-src="/blog/blogtag/datalist.html" data-title="文章标签">文章标签</button>
								</div>
							</div>
							<div class="table-responsive">
								<!--<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>-->
								<table class="table table-striped  table-bordered table-hover table-condensed ">
									<thead>
										<tr>
											<th style="width:80px;">ID</th>
											<th style="width:auto;">封面</th>
											<th>博文信息</th>
											<th></th>
											<th>摘要</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
										<tr data-id="5">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 5
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/5" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> 添加一条数据
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-07 17:47:34
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name"> thinkPHP
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' selected style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" checked />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px"> 如果你在database.php配置文件中配置了数据库前缀(prefix)，那么可以直接使用 Db 类的 name 方法提交数据
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":5}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":5}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
											</td>
										</tr>
										<tr data-id="6">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 6
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/6" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> 添加一条数据
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-08 08:58:10
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name"> thinkPHP
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' selected style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px"> 如果你在database.php配置文件中配置了数据库前缀(prefix)，那么可以直接使用 Db 类的 name 方法提交数据
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":6}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":6}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
											</td>
										</tr>
										<tr data-id="7">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 7
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/7" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> 贪婪模式与非贪婪模式
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-08 09:02:03
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name"> thinkPHP
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' selected style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" checked />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px"> 正则的贪婪模式和非贪婪模式是一个比较容易混淆的概念，不过，我们可以这么理解，一个人很贪婪，所以他会能拿多少拿多少，换过来，那就是贪婪模式下的正则表达式，能匹配多少就匹配多少，尽可能最多。而非贪婪模式，则是能不匹配就不匹配，尽可能最少。
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":7}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":7}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
											</td>
										</tr>
										<tr data-id="8">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 8
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/8" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> 正则表达式环视详解
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-08 09:02:43
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name"> 正则表达式
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' selected style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" checked />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px"> 例如，对于源字符串ABC，正则(?=A)[A-Z]匹配的是：
1. (?=A)所在的位置，后面是A 
2. 表达式[A-Z]匹配A-Z中任意一个字母 
根据两个的先后位置关系，组合在一起，那就是： 
(?=A)所在的位置，后面是A，而且是A-Z中任意一个字母，因此，上面正则表达式匹配一个大写字母A。
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":8}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":8}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
											</td>
										</tr>
										<tr data-id="9">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 9
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/9" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> js闭包
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-08 11:55:06
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name"> JavaScript
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' selected style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" checked />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px">
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":9}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":9}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
											</td>
										</tr>
										<tr data-id="10">
											<td>
												<input type="checkbox" class="i-checks ids">
												<span class=" name"> 10
 </span>
											</td>
											<td>
				<span class=" name"> <img src="http://local14.cc/upload/picture/20181101/thumb_ed0e101bc21b86b80796678ff6997806.jpg" style="height: 65px;" class="preview-img index_pop" data-origin-src="http://local14.cc/upload/picture/20181101/ed0e101bc21b86b80796678ff6997806.jpg" data-condition="app\blog\controller\blogarticle/thumbnail/10" data-text="修改图片" />
 </span>
											</td>
											<td>
				<span class="name bold"> <span style='color: #2434ff;'>博文标题 : </span>
 </span>
												<span class="td-modify name" data-field="title" data-reg="/^\S+$/" data-msg="标题不能为空"> 标题
 </span>
												<br />
												<span class="name bold"> 添加用户 :
 </span>
												<span class=" name"> hello
 </span>
												<br />
												<span class="name bold"> 添加时间 :
 </span>
												<span class=" name"> 2018-11-08 12:04:59
 </span>
												<br />
												<span class="name bold"> 标签 :
 </span>
												<span class=" name">
 </span>
											</td>
											<td>
				<span class="name bold"> 稿件类型 :
 </span>
												<select style='background: #fff' data-field="category" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文章</option>
													<option value='2' style='background: #fff'>单页</option>
												</select>
												<span class="name bold"> 内容来源 :
 </span>
												<select style='background: #fff' data-field="source_type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='1' selected style='background: #fff'>文本编辑器</option>
													<option value='2' style='background: #fff'>模板页面</option>
												</select> <br />
												<span class="name bold"> 博文分类 :
 </span>
												<select style='background: #fff' data-field="type" class=" td-select" data-change-callback="registUpdate" data-success-callback="updateColor" 1>
													<option value='0' selected style='background: #fff'>顶级分类</option>
													<option value='5' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
													<option value='6' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
													<option value='7' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
													<option value='8' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
													<option value='9' style='background: #fff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
												</select> <br />
												<span class="name bold"> 是否发布
 </span>
												<input type="checkbox" name="is_published" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" checked />
												<span class="name bold"> 是否置顶
 </span>
												<input type="checkbox" name="is_top" data-change-callback="switcherUpdateField" data-success-callback="" class="js-switch" />
											</td>
											<td>
				<textarea class="td-modify" data-field="abstruct" style="width:100%;height:100px">
 </textarea>
											</td>
											<td>
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/editcontent.html" data-title="编辑博文" data-params={"id":10}>编辑博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-info btn-open-pop" data-src="/blog/blogarticle/preview.html" data-title="预览博文" data-params={"id":10}>预览博文</button>
												<br />
												<button type="button" class="btn btn-xs  btn-success btn-edit">编辑</button>
												<button type="button" class="btn btn-xs  btn-danger btn-delete">删除</button>
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
		<script src="__STATIC__/js/custom.js"></script>
		<script></script>
		<div class="search-dom-1" style="display: none;padding: 5px;">
			<form id="form1" action="">
				<div class="col-sm-12 m-b-xs">
					<button type="submit" class="btn  btn-primary">搜索 ( 回车键 )</button>
				</div>
				<div class="col-sm-12 m-b-xs">
					<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">标题</span>
			</span>
						<input type="text" placeholder="" class=" form-control" value="" name="title">
					</div>
				</div>
				<div class="col-sm-12 m-b-xs">
					<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">摘要</span>
			</span>
						<input type="text" placeholder="" class=" form-control" value="" name="abstruct">
					</div>
				</div>
				<div class="col-sm-12 m-b-xs">
					<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">博文分类</span>
				</span>
						<select class=" form-control  inline change_serach" name="type">
							<option value='-1' selected>全部</option>
							<option value='0'>顶级分类</option>
							<option value='5'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 基础技术</option>
							<option value='6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ thinkphp手册</option>
							<option value='7'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 进阶技术</option>
							<option value='8'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ JS高级</option>
							<option value='9'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;╘══ 正则表达式</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">内容来源</span>
				</span>
						<select class=" form-control  inline change_serach" name="source_type">
							<option value='-1' selected>全部</option>
							<option value='1'>文本编辑器</option>
							<option value='2'>模板页面</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">稿件类型</span>
				</span>
						<select class=" form-control  inline change_serach" name="category">
							<option value='-1' selected>全部</option>
							<option value='1'>文章</option>
							<option value='2'>单页</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">标签</span>
				</span>
						<select class=" form-control  inline change_serach" name="tags">
							<option value='-1' selected>全部</option>
							<option value='5'>JavaScript</option>
							<option value='6'>正则表达式</option>
							<option value='7'>thinkPHP</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn">添加时间</span>
					</span>
						<input type="text" placeholder="" class=" form-control" name="add_time_begin" value="">
						<span class="input-group-addon">到</span>
						<input type="text" placeholder="" class=" form-control" name="add_time_end" value="">
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-group">
			<span class="input-group-btn">
					<span class="btn">每页显示条数</span>
			</span>
						<input type="text" placeholder="" class=" form-control" value="20" name="pagerow">
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-group">
				<span class="input-group-btn">
						<span class="btn">排序字段</span>
				</span>
						<select class=" form-control  inline change_serach" name="order_filed">
							<option value='id' selected>默认</option>
							<option value='is_published'>是否发布</option>
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
							<label class="btn  btn-white active"> <input checked type="radio" name="order" value="asc">正序</label><label class="btn  btn-white ">
								<input type="radio" name="order" value="desc">反序</label>
						</div>
					</div>
				</div>
				<div class="col-sm-6 m-b-xs">
					<div class="input-daterange input-group">
	<span class="input-group-btn">
		<span class="btn">是否发布</span>
	</span>
						<div data-toggle="buttons" class="btn-group">
							<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
							<label class="btn  btn-white active">
								<input checked type="radio" name="is_published" value="-1">全部</label><label class="btn  btn-white ">
								<input type="radio" name="is_published" value="1">已发布</label><label class="btn  btn-white ">
								<input type="radio" name="is_published" value="0">未发布</label>
						</div>
					</div>
				</div>
			</form>
		</div>
		<script>
			window.deleteUrl = '/blog/blogarticle/delete.html';
			window.setFieldUrl = '/blog/blogarticle/setfield.html';
			window.detailUrl = '/blog/blogarticle/detail.html';
			window.editUrl = '/blog/blogarticle/edit.html';
			window.addUrl = '/blog/blogarticle/add.html';
		</script>
		<script></script>
		<script></script>
		<!-- ! ~~~SCRIPT~~~ -->
		<script src="__CONTROLLER_STATIC_URL__/js/custom.js"></script>
		<script src="__STATIC__/js/custom_table.js"></script>
		<!-- ! ~~~JS_INVOKE~~~ -->
		<!--					/script					-->
	</body>
</html>