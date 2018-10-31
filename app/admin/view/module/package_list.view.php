<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('模块列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([] , [0]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->packageList();

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:120px;"' ,
							] ,
							[
								'field' => '封面' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '信息' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '描述' ,
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => '' ,
							] ,
						]);

						/**
						 * 设置js请求api
						 */
						$_this->setApi([
							'deleteUrl'   => url('delete') ,
							'setFieldUrl' => url('setField') ,
							'detailUrl'   => url('detail') ,
							'editUrl'     => url('edit') ,
							'addUrl'      => url('add') ,
						]);

						foreach ($data as $k => $v)
						{
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,


								//封面
								//data-href="/admin/User/editProfilePic" data-text="修改头像"
								integrationTags::td([

								]) ,

								//信息
								integrationTags::td([]/*
									(function($info) {
									return array_map(function($err) {
										return '- '.$err . '<br/>';
									} , $info['error']);
								})($v)
								*/) ,

								//信息
								integrationTags::td([

								]) ,

								//描述
								integrationTags::td([]) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class'  => ' btn-primary btn-custom-request' ,
										'data'   => [
											'src'        => url('apply') ,
											'is_reload'  => 1 ,
											'is_confirm' => 1 ,
										] ,
										'params' => [
											//'id' => $v['id'] ,
										] ,
										'value'  => '部署到应用' ,
									]) ,

									'<br />',
									integrationTags::tdButton([
										'class'  => ' btn-danger btn-custom-request' ,
										'data'   => [
											'src'        => url('delPackage') ,
											'is_reload'  => 1 ,
											'is_confirm' => 1 ,
										] ,
										'params' => [//'id' => $v['id'] ,
										] ,
										'value'  => '删除包文件' ,
									]) ,

									integrationTags::a('下载包文件' , [
										'href' => url('downloadPackage' , ['id' => $v['id']]) ,
									]) ,
								]) ,

							] , ['id' => $v['id']]);


							$doms = array_merge($doms , $t);
						}

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '模块列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};