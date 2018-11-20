<?php
	(!version_compare(phpversion() , '7.0.0' , '>=')) && exit(file_get_contents('./static/warning.html'));
	define('ITHINK_NAME' , 'iThink');
	define('ITHINK_VERSION' , 'v1.0');
	define('APP_PATH' , __DIR__ . '/../app/');
	require __DIR__ . '/../thinkphp/start.php';
