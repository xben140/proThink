<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="”renderer”" content="”webkit”">
		<title>登录页</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="icon" href="">

		<link href="__CONTROLLER_STATIC_URL__/css/login.css" rel="stylesheet" type="text/css">


		<script type="text/javascript" src="__HPLUS__js/jquery.min.js"></script>
		<script type="text/javascript" src="__STATIC__js/jquery.SuperSlide.2.1.2.js"></script>
		<script type="text/javascript" src="__STATIC__js/jquery.cookie.js"></script>

		<script type="text/javascript" src="__HPLUS__js/plugins/layer/layer.js"></script>

	</head>

	<body>
		<div class="login-layout">

			<form action="/admin/login/dologin" name="loginForm" id="loginForm" method="post">
				<div class="login-form" style="position: relative">
					<div class="formContent">
						<div class="title">iThink后台管理中心</div>
						<div class="formInfo">
							<div class="formText">
								<i class="icon icon-user"></i>
								<input type="text" name="username" autocomplete="off" class="input-text" value="" placeholder="用户名">
							</div>
							<div class="formText">
								<i class="icon icon-pwd"></i>
								<input type="password" name="password" autocomplete="off" class="input-text" value="" placeholder="密  码">
							</div>
							<div class="formText">
								<i class="icon icon-chick"></i>
								<input type="text" name="captcha" autocomplete="off" class="input-text chick_ue" value="" placeholder="验证码">
								<div>
									<img src="{:captcha_src()}" onclick="refreshSrc()" alt="captcha" class="chicuele" id="imgVerify" />
								</div>

							</div>
							<!--
							<div class="formText">
								<a href="" class="forget_pwd">忘记密码？</a>
							</div>

							-->
							<div class="formText submitDiv">
                          <span class="submit_span">
                          	<input type="submit" name="submit" class="sub" value="登录" style="pointer-events: auto;">
                          </span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div id="bannerBox">
			<ul id="slideBanner" class="slideBanner" >
				<!--
				<li >
					<img src="__CONTROLLER_STATIC_URL__/image/banner_3.jpg">
				</li>
				<li >
					<img src="__CONTROLLER_STATIC_URL__/image/banner_4.jpg">
				</li>
				-->
				<li >
					<img src="__CONTROLLER_STATIC_URL__/image/banner_5.jpg">
				</li>
			</ul>
		</div>

		<script src="__STATIC__js/form.js"></script>
		<script src="__CONTROLLER_STATIC_URL__js/login.js"></script>
	</body>
</html>