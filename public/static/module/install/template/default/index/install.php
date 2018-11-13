<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>H+ 后台主题UI框架 - 表单向导</title>
		<meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
		<meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
		<link rel="shortcut icon" href="favicon.ico">
		<link href="__HPLUS__css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
		<link href="__HPLUS__css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
		<link href="__HPLUS__css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="__HPLUS__css/plugins/steps/jquery.steps.css" rel="stylesheet">
		<link href="__HPLUS__css/animate.min.css" rel="stylesheet">
		<link href="__HPLUS__css/style.min862f.css?v=4.1.0" rel="stylesheet">
		<link href="__HPLUS__css/plugins/iCheck/custom.css" rel="stylesheet">

		<style>
			.wizard > .content {
				background : #fff;
				overflow   : auto;
				height     : 650px;
				border     : 2px solid #ccc;
			}

		</style>
	</head>
	<body class="">
		<div class="container">

			<div class="ibox-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content text-center p-md">
								<h2>
									<span class="text-navy">iThink 安装向导</span>
								</h2>
							</div>
						</div>
					</div>
				</div>
				<div id="step">
					<h1>iThink</h1>
					<fieldset>
						<p>iThink 安装向导</p>
						<p>iThink 安装向导</p>
						<p>iThink 安装向导</p>
						<p>iThink 安装向导5</p>
						<p>iThink 安装向导6</p>
						<p>iThink 安装向导7</p>
						<p>iThink 安装向导7</p>
						<p>iThink 安装向导</p>
						<p>iThink 安装向导</p>

						<div class="checkbox i-checks">
							<label> <input id="agreement" type="checkbox" name="agreement" value="1">
								<i></i> 我同意注册条款</label>
						</div>
					</fieldset>


					<h1>安装环境检测</h1>
					<fieldset>
						<div class="row">
							<div class="col-sm-12">
								<table class="table">
									<thead>
										<tr>
											<th style="width: 150px;">项目</th>
											<th>最低要求</th>
											<th>当前配置</th>
											<th style="width: 50px;">结果</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>操作系统</td>
											<td>（windows/类unix）</td>
											<td>windows</td>
											<td>
												<button class="btn btn-xs btn-success " type="button">
													<i class="fa fa-check"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>操作系统</td>
											<td>（windows/类unix）</td>
											<td>windows</td>
											<td>
												<button class="btn btn-xs btn-danger " type="button">
													<i class="fa fa-times"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<input type="hidden" id="isEvnOk" value="0">
					</fieldset>


					<h1>填写数据库信息</h1>
					<fieldset>
						<div class="row">
							<form id="form" action="/" class="wizard-big">
								<div class="col-sm-6">
									<h2>数据库信息</h2>
									<div class="form-group">
										<label>数据库服务器IP,如 : 127.0.0.1</label>
										<input id="host" name="host" type="text" class="form-control ">
									</div>
									<div class="form-group">
										<label>数据库名称,如 :iThink </label>
										<input id="dbname" name="dbname" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>数据库用户名,如 : root</label>
										<input id="dbuser" name="dbuser" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>数据库密码</label>
										<input id="dbpwd" name="dbpwd" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>数据库端口,默认3306</label>
										<input id="port" name="port" type="text" class="form-control" value="3306">
									</div>
									<div class="form-group">
										<label>数据表前缀,默认ithink_</label>
										<input id="tabprefix" name="tabprefix" type="text" class="form-control" value="ithink_">
									</div>
								</div>
								<div class="col-sm-6">
									<h2>超级管理员信息</h2>
									<div class="form-group">
										<label>Email</label>
										<input id="email" name="email" type="text" class="form-control  ">
									</div>
									<div class="form-group">
										<label>登陆账号</label>
										<input id="username" name="username" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>登陆密码</label> <input id="pwd" name="pwd" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>确认密码</label>
										<input id="repwd" name="repwd" type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" id="checkDbConfig" class="btn btn-w-m btn-primary">测试数据库配置</button>
									</div>
								</div>
								<input type="hidden" id="isDbOk" value="0">

							</form>
						</div>
					</fieldset>


					<h1>完成</h1>
					<fieldset>
						<div class="createing">
							<h1 class="text-center">正在创建数据表中...</h1>
							<div class="spiner-example">
								<div class="sk-spinner sk-spinner-cube-grid">
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
									<div class="sk-cube"></div>
								</div>
							</div>
						</div>

						<div class="createFinish" style="display: none;">
							<h1 class="text-center">系统安装成功</h1>
							<div class="text-center">
								<a href="#" class="btn btn-w-m btn-primary">访问首页</a>
							</div>
						</div>

						<div class="createError" style="display: none;">
							<h1 class="text-center">系统安装失败，请重新检查环境再安装</h1>
							<div class="text-center">
								<a href="/" class="btn btn-w-m btn-info">重新安装</a>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		<script src="__HPLUS__js/jquery.min.js?v=2.1.4"></script>
		<script src="__HPLUS__js/bootstrap.min.js?v=3.3.6"></script>
		<script src="__HPLUS__js/plugins/staps/jquery.steps.min.js"></script>
		<script src="__HPLUS__js/plugins/validate/jquery.validate.min.js"></script>
		<script src="__HPLUS__js/plugins/validate/messages_zh.min.js"></script>
		<script src="__HPLUS__js/plugins/iCheck/icheck.min.js"></script>
		<script src="__HPLUS__js/plugins/layer/layer.js"></script>
		<script src="__STATIC__/js/custom.js"></script>
		<script>
			$(document).ready(function () {

				$("#step").steps({
					headerTag: "h1",
					bodyTag  : "fieldset",

					// contentContainerTag: "div", // 指定包装所有内容的HTML标签
					// actionContainerTag : "div", // 指定包装分页导航的HTML标签
					// stepsContainerTag  : "div", // 指定包装步骤内容的HTML标签
					stepsOrientation: 'vertical', // 指定步骤为水平--vertical（垂直） horizontal（水平）
					transitionEffect: "slideLeft", // 步骤切换动画
					autoFocus       : true, // 将焦点设置为第一个向导实例，以便从一开始就启用关键导航 if true  优先级在startIndex之下
					forceMoveForward: false, // 防止跳转到下一步
					preloadContent  : true,
					startIndex      : 0, // 通过修改这个值来改变当前步数指向，即通过索引值确定向导加载后开始步骤是哪一步
					labels          : {
						// finish  : "完成", // 修改按钮得文本
						next    : "下一步", // 下一步按钮的文本
						previous: "上一步", // 上一步按钮的文本
						loading : "Loading ..."
					},

					onStepChanging: function (event, currentIndex, newIndex) {
						let allowNext = true;

						console.dir(event.type)
						console.dir(currentIndex);
						console.dir(newIndex)

						//条款
						if ((currentIndex === 0) && (newIndex === 1))
						{
							let isAgreed = ($('#agreement').is(':checked'));
							if (isAgreed)
							{
								allowNext = true;
							}
							else
							{
								allowNext = false;
								layer.msg('请先阅读条款，并同意');
							}
						}

						//环境检测
						if ((currentIndex === 1) && (newIndex === 2))
						{
							let isAgreed = $('#isEvnOk').val() === '1';
							if (isAgreed)
							{
								allowNext = true;
							}
							else
							{
								allowNext = false;
								layer.alert('安装环境不满足要求，无法安装');
							}
						}

						//填写了数据库
						if ((currentIndex === 2) && (newIndex === 3))
						{
							$('#form').validate();
							let isAgreed = ($('#form').valid() && ($('#isDbOk').val() === '1'));
							if (isAgreed)
							{
								allowNext = true;
							}
							else
							{
								allowNext = false;
								allowNext = true;
								layer.alert('请填写完整相关配置并点击 测试数据库配置<br>确保数据库配置无误');
							}
						}

						//填写了数据库
						if ((currentIndex === 3) && (newIndex === 2))
						{
							allowNext = false;
							layer.alert('正在安装中，请不要刷新页面和做其他操作');
						}

						return allowNext;
					}
					,
					onStepChanged : function (event, currentIndex, priorIndex) {
						console.dir(event.type)
						console.dir(currentIndex)
						console.dir(priorIndex)

						//环境检测
						if ((currentIndex === 1) && (priorIndex === 0))
						{
							checkEvn()
						}

						//数据库检测成功，开始安装
						if ((currentIndex === 3) && (priorIndex === 2))
						{
							createDb();
						}
					}
					,
					onFinishing   : function (event, currentIndex) {
						console.dir(event.type)
						console.dir(currentIndex)
						return true;
					}
					,
					onFinished    : function (event, currentIndex) {
						console.dir(event.type)
						console.dir(currentIndex)
					}
				});

				$("#checkDbConfig").on({
					click: function () {
						checkDb();
					},
				});

				$(".i-checks").iCheck({
					checkboxClass: "icheckbox_square-green",
					radioClass   : "iradio_square-green",
				});

				$("#form").validate({
					errorPlacement: function (error, element) {
						$('#isDbOk').val('0')
						error.appendTo(element.parent());
					},
					rules         : {
						host     : "required",
						dbname   : "required",
						dbuser   : "required",
						dbpwd    : "required",
						tabprefix: "required",
						port     : {
							required: true,
							digits  : true
						},

						email   : {
							required: true,
							email   : true
						},
						username: "required",
						pwd     : {
							required: true,
						},
						repwd   : {
							required   : true,
							equalTo    : "#pwd",
							rangelength: [5, 16]
						},
					},
					messages      : {
						host     : "数据库服务器IP必填",
						dbname   : "数据库名称必填",
						dbuser   : "数据库用户名必填",
						dbpwd    : "数据库密码必填",
						tabprefix: "数据表前缀必填",
						port     : {
							required: '数据库端口必填',
							digits  : '数据库端口范围1024-65535，通常是3306',
						},
						email    : {
							required: 'email必填',
							email   : '请输入合法的email地址'
						},
						username : "后台管理员账号必填",
						pwd      : {
							required: '密码必填',
						},
						repwd    : {
							required   : '密码必须填写',
							equalTo    : "两次密码输入不一致",
							rangelength: "密码长度为5到16个字符允许字母，数字，下划线"
						}
					}
				});

				function checkEvn()
				{
					let loadIndex = layer.load();
					$.ajax({
						type    : "get",      //data 传送数据类型。post 传递
						dataType: 'json',  // 返回数据的数据类型json
						url     : "/evnCheck",  // yii 控制器/方法
						cache   : false,
						success : function (data) {
							layer.close(loadIndex);
							$('#isEvnOk').val(data.code)
							if (data.code)
							{
								layer.msg('安装环境满足要求，请点击下一步继续安装');
							}
							else
							{
								layer.alert('安装环境不满足要求，无法安装');
							}
						},
						error   : function () {
							layer.close(loadIndex);
							layer.alert('请检测网络。。。');
						}
					})
				}

				function checkDb()
				{
					let loadIndex = layer.load();
					$.ajax({
						type    : "get",      //data 传送数据类型。post 传递
						dataType: 'json',  // 返回数据的数据类型json
						url     : "/dbCheck",  // yii 控制器/方法
						data    : $('#form').serialize(),
						cache   : false,
						success : function (data) {
							layer.close(loadIndex);
							$('#isDbOk').val(data.code)
							if (data.code)
							{
								layer.alert('数据库连接成功，请点击下一步安装');
							}
							else
							{
								layer.alert('数据库配置连接异常，请检查连接参数');
							}
						},
						error   : function () {
							layer.close(loadIndex);
							layer.alert('请检测网络。。。');
						}
					})
				}


				function createDb()
				{
					let loadIndex = layer.load();
					$.ajax({
						type    : "get",
						dataType: 'json',
						url     : "/createDb",
						cache   : false,
						success : function (data) {
							layer.close(loadIndex);
							$('.createing').hide()
							$('div.actions').hide()
							if (data.code)
							{
								$('.createFinish').show()
							}
							else
							{
								$('.createError').show()
								layer.alert('安装失败，请重新检查环境');
							}
						},
						error   : function () {
							layer.close(loadIndex);
							layer.alert('请检测网络。。。');
						}
					})
				}
			});
		</script>

	</body>
</html>
