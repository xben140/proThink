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


	namespace ithinkphp\controller;
	use function think\__require_file;

	/**
	 * 自定义模块都要引用的基类
	 * Trait CustomBase
	 * @package ithinkphp\controller
	 */
	trait CustomBase
	{
		public function __construct()
		{
			parent::__construct();
			$venderAutoLoadFile = replaceToSysSeparator(implode(DS , [
				realpath(APP_PATH) ,
				explode('\\' , static::class)[1] ,
				'vendor' ,
				'autoload.php' ,
			]));
			is_file($venderAutoLoadFile) && __require_file($venderAutoLoadFile);
		}
	}