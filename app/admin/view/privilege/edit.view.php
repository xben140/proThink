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
		$__this->setPageTitle('权限编辑');
		$info = $__this->logic->getInfo($__this->param);
		session(URL_MODULE , $__this->param['id']);


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

				integrationTags::singleSelect($availableMenus , 'pid' , '上级权限' , '必填' , $info['pid']) ,

				integrationTags::text([
					//随便写
					'field_name'  => '应用ID' ,
					'placeholder' => '' ,
					'tip'         => '这里填写应用id，同应用里的' . MODULE_FILE_INFO . '里的id字段的值一致' ,
					'value'       => $info['category'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'category' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '权限名字' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => $info['name'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '模块名' ,
					'placeholder' => '' ,
					'tip'         => '默认为admin' ,
					'value'       => $info['module'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'module' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '控制器名' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => $info['controller'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'controller' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '方法名' ,
					'placeholder' => '' ,
					'tip'         => '' ,
					'value'       => $info['action'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'action' ,
				]) ,


				integrationTags::text([
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => $info['order'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,

				integrationTags::text([
					//随便写
					'field_name'  => '图标' ,
					'placeholder' => '' ,
					'tip'         => '图标参考 <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">https://fontawesome.com/v4.7.0/icons/</a>' ,
					'value'       => $info['ico'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'ico' ,
				]) ,


				/*
										integrationTags::switchery([
											//额外属性
											//'attr'       => '' ,
											'isChecked'  => $info['is_menu'] == 1 ? 'checked' : '' ,
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
											'isChecked'  => $info['is_common'] == 1 ? 'checked' : '' ,
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
											'isChecked'  => $info['status'] == 1 ? 'checked' : '' ,
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
										]) ,
				*/

				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '角色备注' ,
					'name'       => 'remark' ,
					'value'      => $info['remark'] ,
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