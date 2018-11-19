<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>iThink 安装向导</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
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
					<h1>iThink 版权申明</h1>
					<fieldset>
						<h3 class="text-center">iThink 安装协议</h3>
						<p>iThink是一个基于thinkphp5.0开发的模块化，应用化，自动构建化的WEB应用开发框架(Web Application Framework)，旨在为广大web开发者提供一套简单、快速、高效的web应用解决方案。</p>
						<p>iThink拥有全部知识产权，包括商标和著作权。</p>
						<p>版权所有 © 2016~2020，iThink开源社区保留所有权利。</p>
						<p>iThink遵循Apache Licence2开源协议，并且免费使用，但不能未经授权抹除产品标志再次用于开源。Apache Licence是著名的非盈利开源组织Apache采用的协议，该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，允许代码修改，再作为开源或商业软件发布。需要满足的条件：</p>
						<p>1． 需要给用户一份Apache Licence；</p>
						<p>2． 如果你修改了代码，需要在被修改的文件中说明；</p>
						<p>3． 在延伸的代码中（修改和有源代码衍生的代码中）需要带有原来代码中的协议，商标，专利声明和其他原来作者规定需要包含的说明；</p>
						<p>4． 如果再发布的产品中包含一个Notice文件，则在Notice文件中需要带有本协议内容。你可以在Notice中增加自己的许可，但不可以表现为对Apache Licence构成更改。</p>

						<h3 class="text-center">iThink免责声明</h3>
						<p>1、警告：按照我国法律，在未取得相关资源（影片、动画、图书、音乐等）授权的情况下，请不要传播任何形式的相关资源（资源数据文件、种子文件、网盘文件、FTP 文件等）！否则后果自负。</p>
						<p>2、使用iThink构建的网站的任何信息内容以及导致的任何版权纠纷和法律争议及后果，iThink官方不承担任何责任。</p>
						<p>3、一旦您安装使用iThink，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。</p>

						<div class="well">
							<div class="checkbox i-checks">
								<label> <input id="agreement" type="checkbox" name="agreement" value="1"><i></i> 我同意注册条款 </label>
							</div>
						</div>
					</fieldset>

					<h1>安装环境检测</h1>
					<fieldset>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<button type="button" id="recheckEvn" class="btn btn-w-m btn-primary">重新检测</button>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th style="width: 130px;">项目</th>
											<th style="width: 220px;">要求</th>
											<th>当前</th>
											<th style="width: 50px;">结果</th>
										</tr>
									</thead>
									<tbody id="tb">

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
										<input id="host" name="host" type="text" class="form-control " value="127.0.0.1">
									</div>
									<div class="form-group">
										<label>数据库名称,如 :iThink (如果此数据库不存在会自动创建)</label>
										<input id="dbname" name="dbname" type="text" class="form-control" value="iThink">
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
						<div class="createing" style="display: none;">
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
							<h1 class="text-center">iThink 安装成功！enjoy...</h1>
							<div class="col-sm-12">
								<table class="table">
									<thead>
										<tr>
											<th style="width: auto;">产品信息</th>
											<th></th>
										</tr>
									</thead>
									<tbody id="tb">
										<tr>
											<td>产品名称</td>
											<td>{:ITHINK_NAME}</td>
										</tr>
										<tr>
											<td>产品版本</td>
											<td>{:ITHINK_VERSION}</td>
										</tr>
										<tr>
											<td>交流QQ群</td>
											<td>419395011</td>
										</tr>
										<tr>
											<td>官方网站</td>
											<td>
												<a target="_blank" href="http://www.ithinkphp.org">www.ithinkphp.org</a>
											</td>
										</tr>
										<tr>
											<td>码云仓库</td>
											<td>
												<a target="_blank" href="https://gitee.com/wf5858585858/iThink">https://gitee.com/wf5858585858/iThink</a>
											</td>
										</tr>
										<tr>
											<td>开发手册</td>
											<td></td>
										</tr>
										<tr>
											<td>联系邮箱</td>
											<td>wf585858@yeah.net</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="text-center">
								<a href="/" class="btn btn-w-m btn-primary">访问主页</a>
							</div>
						</div>

						<div class="createError" style="display: none;">
							<h1 class="text-center">系统安装失败，请返回上一步重新检查配置数据再安装</h1>
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
					stepsOrientation: 'horizontal', // 指定步骤为水平--vertical（垂直） horizontal（水平）
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
								layer.msg('请先阅读条款，并勾选同意复选框');
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
								layer.alert('请填写完整相关配置并点击 测试数据库配置<br>确保数据库配置无误');
							}
						}

						//填写了数据库
						if ((currentIndex === 3) && (newIndex === 2))
						{
							allowNext = ($('#isDbOk').val() === '0');
							if (!allowNext)
							{
								layer.alert('正在安装中，请不要刷新页面和做其他操作');
							}
						}

						return allowNext;
					}
					,
					onStepChanged : function (event, currentIndex, priorIndex) {
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
						return true;
					}
					,
					onFinished    : function (event, currentIndex) {
					}
				});

				$("#checkDbConfig").on({
					click: function () {
						$('#form').validate();
						let isAgreed = ($('#form').valid());
						isAgreed && checkDb();
					},
				});

				$("#recheckEvn").on({
					click: function () {
						checkEvn();
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
						username : "后台管理员账号长度为5到16个字符允许字母，数字，下划线",
						pwd      : {
							required: '密码长度为5到16个字符允许字母，数字，下划线',
						},
						repwd    : {
							required   : '确认密码必须填写',
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
							$('#tb').html(data.msg);
							if (!data.code)
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
							layer.msg(data.msg);
						},
						error   : function () {
							layer.close(loadIndex);
							layer.alert('请检测网络。。。');
						}
					})
				}


				function createDb()
				{
					// let loadIndex = layer.load();
					$('.createing').show()
					$('.createError').hide()
					$('.createFinish').hide()
					$.ajax({
						type    : "get",
						dataType: 'json',
						url     : "/createDb",
						data    : $('#form').serialize(),
						cache   : false,
						success : function (data) {
							// layer.close(loadIndex);
							$('.createing').hide()
							if (data.code)
							{
								$('div.actions').hide()
								$('.createFinish').show()
								$('.steps').hide()
							}
							else
							{
								$('.createError').show()
								$('#isDbOk').val(0)
								layer.alert('安装失败，请重新检查环境');
							}
						},
						error   : function () {
							$('.createError').show()
							$('#isDbOk').val(0)
							// layer.close(loadIndex);
							layer.alert('请检测网络。。。');
						}
					})
				}
			});
		</script>

	</body>
</html>
