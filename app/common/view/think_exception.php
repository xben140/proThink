<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="/hplus/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
		<link href="/hplus/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
		<link href="/hplus/css/animate.min.css" rel="stylesheet">
		<link href="/hplus/css/style.min862f.css?v=4.1.0" rel="stylesheet">
	</head>
	<body class="gray-bg">
		<div class="middle-box text-center animated fadeInLeft">
			<h1><?php echo htmlentities($code); ?></h1>
			<h2 class="font-bold"><?php echo htmlentities($message); ?></h2>
			<div class="error-desc">
				<button onclick="history.back()" class="btn btn-primary m-t btn-lg">返回</button>
				<a href="/admin/login/logout" class="btn btn-danger m-t btn-lg">重新登录</a>
			</div>
		</div>
		<script src="/hplus/js/jquery.min.js?v=2.1.4"></script>
		<script src="/hplus/js/bootstrap.min.js?v=3.3.6"></script>

	</body>
</html>

