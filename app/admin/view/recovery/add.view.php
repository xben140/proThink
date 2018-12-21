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



	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('角色添加');

		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::form([

				integrationTags::text([
					//随便写
					'field_name'  => '表名' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '控制器' ,
					'placeholder' => '' ,
					'tip'         => '表对应控制器，带命名空间，例如：app\admin\controller\User' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'tab_db' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '字段' ,
					'placeholder' => '' ,
					'tip'         => '要预览的字段，用逗号分隔，直接拼接sql用' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'field' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '应用Id' ,
					'placeholder' => '' ,
					'tip'         => '必须和info.php里id字段一致' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'category' ,
				]) ,


				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '备注' ,
					'name'       => 'remark' ,
					'value'      => '' ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};