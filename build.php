<?php

	return [

		// 生成应用公共文件
		//php think build --config build.php
		'__file__' => [//'common.php',
		] ,

		/*
				'home' => [
					'__file__'   => [
						'common.php' ,
						'config.php' ,
					] ,
					'__dir__'    => [
						'controller' ,
						'model' ,
						'view' ,
						'behavior' ,
						'validate' ,
						'logic' ,
						'service' ,
					] ,
					'controller' => [
						'HomeBase' ,
					] ,
					'model'      => [
						'HomeBase' ,
					] ,
					'logic'      => [
						'HomeBase' ,
					] ,
					'behavior'   => [] ,
					'validate'   => [
						'HomeBase' ,
					] ,
					'view'       => [
						'index' ,
					] ,
				] ,*/


		'cmd' => [
			'__file__'   => [
				'common.php' ,
				'config.php' ,
			] ,
			'__dir__'    => [
				'controller' ,
				'model' ,
				'view' ,
				'behavior' ,
				'validate' ,
				'logic' ,
				'service' ,
			] ,
			'controller' => [
				'HomeBase' ,
			] ,
			'model'      => [
				'HomeBase' ,
			] ,
			'logic'      => [
				'HomeBase' ,
			] ,
			'behavior'   => [] ,
			'validate'   => [
				'HomeBase' ,
			] ,
			'view'       => [
				'index' ,
			] ,
		] ,

		// 其他更多的模块定义
	];
