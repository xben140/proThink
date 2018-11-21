<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<title>{block name="title"}{$title}{/block}</title>
		<meta name="description" content="Ghost 是基于 Node.js 构建的开源博客平台。Ghost 具有易用的书写界面和体验，博客内容默认采用 Markdown 语法书写。Ghost 的目标是取代臃肿的 Wordpress。" />
		<meta name="keywords" content="Ghost,blog,Ghost中国,Ghost博客,Ghost中文,Ghost中文文档">

		<meta name="HandheldFriendly" content="True" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="/favicon.ico">

		<link rel="stylesheet" href="__CURRENT_THEME_STATIC_URL__bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="__CURRENT_THEME_STATIC_URL__bootstrap/css/font-awesome.min.css">
		<link rel="stylesheet" href="__CURRENT_THEME_STATIC_URL__bootstrap/monokai_sublime.min.css">
		<link href="__CURRENT_THEME_STATIC_URL__bootstrap/magnific-popup.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="__CURRENT_THEME_STATIC_URL__style.css?v=a70129213d" />

	</head>
	<body class="home-template">

		{include file="index/header" /}

		<section class="content-wrap">
			<div class="container">
				<div class="row">
					{include file="index/aside" /}


					{if $mate}
					<div class="col-md-8 main-content">
						<article class="post ">
							<footer class="post-footer clearfix">
								<h4>{:$mate}</h4>
							</footer>
						</article>
					</div>
					{/if}

					{block name="main"}
					<main class="col-md-8 main-content"></main>
					{/block}

				</div>
			</div>
		</section>

		{include file="index/footer" /}
		{include file="index/copyright" /}


		<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<script src="__CURRENT_THEME_STATIC_URL__bootstrap/jquery.min.js"></script>
		<script src="__CURRENT_THEME_STATIC_URL__bootstrap/js/bootstrap.min.js"></script>
		<script src="__CURRENT_THEME_STATIC_URL__bootstrap/jquery.fitvids.min.js"></script>
		<script src="__CURRENT_THEME_STATIC_URL__bootstrap/highlight.min.js"></script>
		<script src="__CURRENT_THEME_STATIC_URL__bootstrap/jquery.magnific-popup.min.js"></script>

		<script src="__CURRENT_THEME_STATIC_URL__main.js?v=a70129213d"></script>

	</body>
</html>
