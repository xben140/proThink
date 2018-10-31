<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('权限添加');

		//获取可做父级的action
		$parentsMenus = $__this->logic->getDefaultAction();
		$parentsMenus = makeTree($parentsMenus);

		//顶级菜单
		array_unshift($parentsMenus , [
			'id'         => '0' ,
			'name'       => '顶级菜单' ,
			'module'     => 'none' ,
			'controller' => 'none' ,
			'action'     => 'none' ,
			'level'      => '0' ,
		]);

		$availableMenus = array_map(function($v) {
			return [
				'value' => $v['id'] ,
				'field' => indentationOptionsByLevel($v['name'] . " -- " . formatMenu($v['module'] , $v['controller'] , $v['action']) , $v['level']) ,
			];
		} , $parentsMenus);


		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::form([

				integrationTags::singleSelect($availableMenus , 'pid' , '上级权限' , '必填' , 0) ,

				integrationTags::text([
					//随便写
					'field_name'  => '应用ID' ,
					'placeholder' => '' ,
					'tip'         => '这里填写应用id，同应用里的info.php里的id字段的值一致' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'category' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '权限名字' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '模块名' ,
					'placeholder' => '' ,
					'tip'         => '默认为admin' ,
					'value'       => 'admin' ,
					//'attr'        => 'disabled' ,
					'name'        => 'module' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '控制器名' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'controller' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '方法名' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'action' ,
				]) ,


				integrationTags::text([
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => '1' ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '图标' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => '-' ,
					//'value'       => 'fa-edit' ,
					//'attr'        => 'disabled' ,
					'name'        => 'ico' ,
				]) ,

				/*

										integrationTags::switchery([
											//额外属性
											//'attr'       => '' ,
											'isChecked'  => 'checked' ,
											//随便写
											'tip'        => '' ,
											//随便写
											'field_name' => '是否作为菜单显示' ,
											//表单name值
											'name'       => 'is_menu' ,
											//表单value值,$data里的字段
											'value'      => '1' ,
											//表单value对应名字,$data里的字段
											'field'      => '' ,
										]) ,

										integrationTags::switchery([
											//额外属性
											//'attr'       => '' ,
											//随便写
											'isChecked'  => '' ,
											'tip'        => '' ,
											//随便写
											'field_name' => '是否为公共方法' ,
											//表单name值
											'name'       => 'is_common' ,
											//表单value值,$data里的字段
											'value'      => '1' ,
											//表单value对应名字,$data里的字段
											'field'      => '' ,
										]) ,

										integrationTags::switchery([
											'isChecked'  => 'checked' ,
											//额外属性
											//'attr'       => '{if 1 == 1}checked{/if}' ,
											//随便写
											'tip'        => '是否启用' ,
											//随便写
											'field_name' => '是否启用' ,
											//表单name值
											'name'       => 'status' ,
											//表单value值,$data里的字段
											'value'      => '1' ,
											//表单value对应名字,$data里的字段
											'field'      => '' ,
										]) ,*/

				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '角色备注' ,
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