<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
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



	define('BEHAVIOR_PATH' , 'ithinkphp\\behavior\\');

	$data = [
		// 模块初始化
		'module_init'  => [] ,
		// 操作开始执行
		'action_begin' => [] ,
		// 视图内容过滤
		'view_filter'  => [] ,
		// 日志写入
		'log_write'    => [] ,
	];

	$data['app_init'] = [
		BEHAVIOR_PATH . 'InitBase' ,
		//BEHAVIOR_PATH . 'InitHook',
	];
	$data['app_begin'] = [
		BEHAVIOR_PATH . 'AppBegin' ,
	];
	$data['app_end'] = [
		BEHAVIOR_PATH . 'AppEnd' ,
	];

	return $data;
