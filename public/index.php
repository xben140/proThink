<?php

//		file_put_contents('./runtime.sql', $sql."\r\n", FILE_APPEND);

	//放入钩子里去执行
	//if (version_compare(PHP_VERSION, '5.5', '<')){}

// 定义应用目录
	define('APP_PATH' , __DIR__ . '/../app/');
// 加载框架引导文件
	require __DIR__ . '/../thinkphp/start.php';
