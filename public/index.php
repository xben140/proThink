<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/

	(!version_compare(phpversion() , '7.0.0' , '>=')) && exit(file_get_contents('./static/warning.html'));
	define('ITHINK_NAME' , 'iThink');
	define('ITHINK_VERSION' , 'v1.0');
	define('APP_PATH' , __DIR__ . '/../app/');
	require __DIR__ . '/../thinkphp/start.php';
