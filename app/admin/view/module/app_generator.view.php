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
		$__this->setPageTitle('应用生成器');

		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[/*
							[
								'is_display' => 1 ,
								'class'      => 'btn-success btn-open-pop' ,
								'field'      => '安装包管理' ,
								'data'       => [
									'src'   => url('admin/Module/packageList') ,
									'title' => '安装包管理' ,
								] ,
							] ,*/
						] ,
					] , [
						0 ,
					]) ,
					'<p class="red"> <strong><a target="_blank" href="https://www.kancloud.cn/wf00568/main/866944">参考文档</a></strong></p>' ,

					'<p class="red">* 此功能是开发新应用的第一步，生成应用骨架文件，包括基类 controller， model，logic等</p>' ,
					'<p class="red">* 应用ID必填 必须为纯小写字母，会生成 app 目录下的一个模块</p>' ,
					'<p class="red">* 应用名称必填 应用的名字</p>' ,
					'<p class="red">* 其他功能都可为空，后续都可改</p>' ,
					'<p class="red">* 生成后 app 目录下会有一个与应用ID同名文件夹，为应用服务器端逻辑文件</p>' ,
					'<p class="red">* 生成后 public\static\module 目录下会有一个与应用ID同名文件夹，为应用静态资源文件</p>' ,
					'<p class="red">* <strong>开发应用过程只需修改这两个文件夹里内容即可</strong></p>' ,
					'<p class="red">* <strong>如果修改其他内容可能会导致更新 iTHink 后出现不可预知的问题，并且应用无法完整打包</strong></p>' ,

					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'option' ,
							'value' => 'appGeneratorFramework' ,
						]) ,

						integrationTags::switchery([
							//额外属性
							//'attr'       => '' ,
							'isChecked'  => '' ,
							//随便写
							'tip'        => '如果打开，将会覆盖同名应用文件，慎用（controller，model，logic，valiate）' ,
							//随便写
							'field_name' => '覆盖文件' ,
							//表单name值
							'name'       => 'is_cover' ,
							//表单value值,$data里的字段
							'value'      => '1' ,
							//表单value对应名字,$data里的字段
							'field'      => '' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用ID' ,
							'placeholder' => '' ,
							'tip'         => '（必填）应用ID，必须为纯小写字母，对于一个app目录下的一个模块，如 blog' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'id' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用名称' ,
							'placeholder' => '' ,
							'tip'         => '（必填）应用名称，如 博客系统' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							'field_name'  => '作者' ,
							'placeholder' => '' ,
							'tip'         => '作者称呼，可为空' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'author' ,
						]) ,

						integrationTags::text([
							'field_name'  => '作者主页' ,
							'placeholder' => '' ,
							'tip'         => '作者主页网站，可为空' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'page_url' ,
						]) ,

						integrationTags::textarea([
							'field_name' => '应用介绍' ,
							'tip'        => '应用介绍，可为空' ,
							'name'       => 'description' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,
					] , [
						'id'     => 'form2' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '6' ,
					'main_title' => '应用骨架文件成器' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::rowButton([
						[/*
							[
								'is_display' => 1 ,
								'class'      => 'btn-success btn-open-pop' ,
								'field'      => '安装包管理' ,
								'data'       => [
									'src'   => url('admin/Module/packageList') ,
									'title' => '安装包管理' ,
								] ,
							] ,*/
						] ,
					] , [
						0 ,
					]) ,

					'<p class="red"> <strong><a target="_blank" href="https://www.kancloud.cn/wf00568/main/866945">参考文档</a></strong></p>' ,
					'<p class="red">* 此功能为生成应用对应数据表的 CURD 文件，包括 controller，model，logic，valiate，操作菜单等</p>' ,
					'<p class="red">* 当你新建一个数据表，需要添加 CURD 逻辑时才使用此处功能，如果是关系映射表则不需要再此处操作 </p>' ,
					'<p class="red">* 应用ID必填，必须是在左侧已经生成过应用骨架文件的应用ID </p>' ,
					'<p class="red">* 数据表名每行填写一个，不要加 ithink_ 表前缀 </p>' ,
					'<p class="red">* 生成后会自动在 app 目录对应 ID 的文件夹下出现 controller，model，logic，valiate文件 直接编写逻辑即可</p>' ,
					'<p class="red">* <strong> 生成后必须点击 全局刷新 更新对应菜单</strong></p>' ,

					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'option' ,
							'value' => 'appGeneratorCode' ,
						]) ,

						integrationTags::switchery([
							//额外属性
							//'attr'       => '' ,
							'isChecked'  => '' ,
							//随便写
							'tip'        => '如果打开，将会覆盖同名应用文件，慎用（controller，model，logic，valiate）' ,
							//随便写
							'field_name' => '覆盖文件' ,
							//表单name值
							'name'       => 'is_cover' ,
							//表单value值,$data里的字段
							'value'      => '1' ,
							//表单value对应名字,$data里的字段
							'field'      => '' ,
						]) ,

						integrationTags::text([
							'field_name'  => '应用ID' ,
							'placeholder' => '' ,
							'tip'         => '（必填）必须是已经生成的应用，在左边应用生成器生成好后，在这里创建对应逻辑代码，如 blog' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'id' ,
						]) ,

						integrationTags::textarea([
							'field_name' => '表名' ,
							'tip'        => '需要添加‘增删改查’功能的表名，每行一个，不加 ithink_ 前缀，会自动为这些表生成 controller，model，logic，validate文件' ,
							'name'       => 'tables' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:100px;' ,
						]) ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,

				] , [
					'width'      => '6' ,
					'main_title' => 'CURD 逻辑代码生成器（controller，model，logic，valiate）' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};
