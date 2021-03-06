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
		$__this->setPageTitle('添加配置组');

		//所有分类
		$types = $__this->logic->dataList();
		$types = makeTree($types);

		//顶级菜单
		array_unshift($types , [
			'id'    => '0' ,
			'pid'   => '0' ,
			'level' => '0' ,
			'name'  => '顶级分类' ,
		]);

		$availableTypes = array_map(function($v) {
			return [
				'value' => $v['id'] ,
				'field' => indentationOptionsByLevel($v['name'] , $v['level']) ,
			];
		} , $types);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([
				integrationTags::singleSelect($availableTypes , 'pid' , '上级分类' , '' , 0) ,

				integrationTags::text([
					'field_name'  => '类型名' ,
					'placeholder' => '' ,
					'tip'         => '（必填）类型名' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,


				integrationTags::text([
					//随便写
					'field_name'  => '排序' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => '1' ,
					//'attr'        => 'disabled' ,
					'name'        => 'order' ,
				]) ,
				/*
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
					]) ,
				*/

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