<?php
//配置文件,会写到配置表，自动添加一个分组，组名为这个应用的id


	return [
		[
			'type'  => '1' ,
			'name'  => 'array-test' ,
			'key'   => 'array' ,
			'value' => [
				'111' ,
				'222' ,
			] ,
		] ,
		[
			'type'  => '2' ,
			'name'  => 'text-test' ,
			'key'   => 'text' ,
			'value' => 'texttexttext' ,
		] ,
		[
			'type'  => '3' ,
			'name'  => 'switch-test' ,
			'key'   => 'switch' ,
			'value' => 0 ,
		] ,
		[
			'type'     => '4' ,
			'name'     => 'option-test' ,
			'key'      => 'option' ,
			'selected' => 0 ,
			'value'    => [
				'111' ,
				'222' ,
			] ,
		] ,
		[
			'type'  => '5' ,
			'name'  => 'image-test' ,
			'key'   => 'image' ,
			'value' => 'imageimageimage' ,
		] ,
		[
			'type'     => '5' ,
			'name'     => 'is_const-test' ,
			'key'      => 'const' ,
			'value'    => 'constconstconst' ,
			'is_const' => '1' ,
		] ,
	];

