<?php

/*
+---------------------------------------------------------------------+
| iThinkPHP        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/
	(!version_compare(phpversion() , '7.0.0' , '>=')) && exit(file_get_contents('./static/warning.html'));
	define('ITHINKPHP_VERSION' , 'v1.0');
	define('ITHINKPHP_ROOT' , __DIR__ . '/../');
	define('APP_PATH' , ITHINKPHP_ROOT . 'app/');
	define('ITHINKPHP_CORE' , ITHINKPHP_ROOT . 'ithinkphp/');
	define('EXTEND_PATH' , ITHINKPHP_CORE . 'extend/');
	define('VENDOR_PATH' , ITHINKPHP_CORE . 'vendor/');
	define('ITHINKPHP_COMMON' , ITHINKPHP_CORE . 'common/');
	require __DIR__ . '/../ithinkphp/thinkphp/start.php';
