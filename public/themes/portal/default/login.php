<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="”renderer”" content="”webkit”">
		<title>登录页</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="icon" href="http://demo6.tp-shop.cn/public/static/animated_favicon.gif" type="image/gif">

		<link href="__STATIC__/css/login.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="__HPLUS__js/jquery.min.js"></script>
		<script type="text/javascript" src="__STATIC__js/jquery.SuperSlide.2.1.2.js"></script>
		<script type="text/javascript" src="__STATIC__js/jquery.cookie.js"></script>

	</head>

	<body>
		<div class="login-layout">
			<!--
			<div class="logo"><img src="./images/loginImg.png"></div>
			-->
			<form action="" name="theForm" id="theForm" method="post">
				<div class="login-form" style="position: relative">
					<div class="formContent">
						<div class="title">管理中心</div>
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
								<input type="text" name="vertify" autocomplete="off" class="input-text chick_ue" value="" placeholder="验证码">
								<img src="" class="chicuele" id="imgVerify" alt="" onclick="fleshVerify()">
							</div>
							<div class="formText">
								<!--<a href="" class="forget_pwd">忘记密码？</a>-->
							</div>
							<div class="formText submitDiv">
                          <span class="submit_span">
                          	<input type="button" name="submit" class="sub" value="登录" style="pointer-events: auto;">
                          </span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div id="bannerBox">
			<ul id="slideBanner" class="slideBanner" style="position: relative; width: 1858px; height: 1014px;">
				<li style="position: absolute; width: 1858px; left: 0px; top: 0px; display: none;">
					<img src="__STATIC__/image/banner_1.jpg">
				</li>
				<li style="position: absolute; width: 1858px; left: 0px; top: 0px; display: block;">
					<img src="__STATIC__/image/banner_2.jpg">
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			$("#bannerBox").slide({
				mainCell: ".slideBanner", effect: "fold", interTime: 3500, delayTime: 500, autoPlay: true, autoPage: true, endFun: function (i, c, s) {
					$(window).resize(function () {
						var width = $(window).width();
						var height = $(window).height();
						s.find(".slideBanner,.slideBanner li").css({"width": width, "height": height});
					});
				}
			});

		</script>
	</body>
</html>