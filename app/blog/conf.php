<?php
//配置文件,会写到配置表，自动添加一个分组，组名为这个应用的id
	return [
		'array'  => [
			'type'  => '1' ,
			'value' => [
				'111' ,
				'222' ,
			] ,
		] ,
		'text'   => [
			'type'  => '2' ,
			'value' => 'texttexttext' ,
		] ,
		'switch' => [
			'type'  => '3' ,
			'value' => 1 ,
		] ,
		'option' => [
			'type'     => '4' ,
			'selected' => 2 ,
			'value'    => [
				'111' ,
				'222' ,
			] ,
		] ,
		'image'  => [
			'type'  => '5' ,
			'value' => '' ,
		] ,
	];

