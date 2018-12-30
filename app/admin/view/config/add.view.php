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



	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('添加配置项');

		//配置组
		$configGroup = $__this->logic__admin_Configgroup->getFormatedData();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::inlineRadio($configGroup , 'group_id' , '所属分组' , '所属分组' , 1) ,

				integrationTags::text([
					'field_name'  => '配置名字' ,
					'placeholder' => '请填写配置名字' ,
					'tip'         => '（必填）配置名字' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,

				integrationTags::text([
					'field_name'  => '配置键' ,
					'placeholder' => 'config函数用的键' ,
					'tip'         => '（必填）config函数用的键' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'key' ,
				]) ,

				//1:array 2:textarea
				integrationTags::inlineRadio($__this->logic->model_->type , 'type' , '键值类型' , '<span class="red"><br>array,select 键值使用英文冒号分隔，每行一条 <br> textarea 键值没有格式要求，填入字符串即可 <br> switch 键值留空</span>' , 2) ,

				integrationTags::textarea([
					'field_name' => '值' ,
					'tip'        => '' ,
					'name'       => 'value' ,
					'value'      => '' ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,

				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '备注' ,
					'name'       => 'remark' ,
					'value'      => '' ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,

				/*

										integrationTags::switchery([
											'isChecked'  => '' ,
											//额外属性
											//'attr'       => '{if 1 == 1}checked{/if}' ,
											//随便写
											'tip'        => '' ,
											//随便写
											'field_name' => '是否常量' ,
											//表单name值
											'name'       => 'is_const' ,
											//表单value值,$data里的字段
											//'value'      => '0' ,
											//表单value对应名字,$data里的字段
											'field'      => '' ,
										]) ,


										integrationTags::switchery([
											'isChecked'  => 'checked' ,
											//额外属性
											//'attr'       => '{if 1 == 1}checked{/if}' ,
											//随便写
											'tip'        => '' ,
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

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};
