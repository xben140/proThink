<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title>iThink 后台管理中心 登录</title>
		<link rel="stylesheet" href="__CURRENT_THEME_STATIC_URL__css/pintuer.css">
		<link rel="stylesheet" href="__CURRENT_THEME_STATIC_URL__css/admin.css">
		<script src="__CURRENT_THEME_STATIC_URL__js/jquery.js"></script>
		<script type="text/javascript" src="__HPLUS__js/plugins/layer/layer.js"></script>

	</head>
	<body>
		<div class="bg"></div>
		<div class="container">
			<div class="line bouncein">
				<div class="xs6 xm4 xs3-move xm4-move">
					<div style="height:150px;"></div>
					<div class="media media-y margin-big-bottom"></div>
					<form action="/admin/login/dologin" name="loginForm" id="loginForm" method="post">
						<div class="panel loginbox">
							<div class="text-center margin-big padding-big-top">
								<h1>iThink 后台管理中心</h1>
							</div>
							<div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
								<div class="form-group">
									<div class="field field-icon-right">
										<input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填写账号" />
										<span class="icon icon-user margin-small"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="field field-icon-right">
										<input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
										<span class="icon icon-key margin-small"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="field">
										<input type="text" class="input input-big" name="captcha" placeholder="填写验证码" data-validate="required:填写验证码" />
										<img src="{:captcha_src()}" onclick="refreshSrc()" class="passcode" style="height:43px;cursor:pointer;width: 150px;" id="imgVerify">

									</div>
								</div>
							</div>
							<div style="padding:30px;">
								<input type="submit" class="button button-block bg-main text-big input-big" value="登录">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="__CURRENT_THEME_STATIC_URL__js/pintuer1.js"></script>

		<script src="__STATIC__js/form.js"></script>
		<script src="__CURRENT_THEME_STATIC_URL__js/login.js"></script>
	</body>
</html>