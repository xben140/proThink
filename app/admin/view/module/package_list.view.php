<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('模块列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'is_display' => 1 ,
								'class'      => 'btn-success btn-open-pop' ,
								'field'      => '上传安装包' ,
								'data'       => [
									'src'   => url('admin/Module/uploadPackage') ,
									'title' => '上传安装包' ,
								] ,
							] ,
						],
					] , [0]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->packageList();

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => '信息' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => 'style="width:150px;"' ,
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
							$t = [];
							if($v['is_available'])
							{
								$t = integrationTags::tr([

									//信息
									integrationTags::td([
										integrationTags::tdSimple([
											'value' => $v['info']['id'] ,
											'name' => 'ID : ',
										]) ,
										'<br />',
										integrationTags::tdSimple([
											'value' => $v['info']['name'] ,
											'name' => '应用名 : ',
										]) ,
										'<br />',
										integrationTags::tdSimple([
											'value' => formatTime($v['info']['update_time']),
											'name' => '更新时间 : ',
										]) ,
										'<br />',
										integrationTags::tdSimple([
											'value' => $v['info']['version'] ,
											'name' => '版本 : ',
										]) ,
										'<br />',
										integrationTags::tdSimple([
											'value' => $v['info']['description'] ,
											'name' => '描述 : ',
										]) ,
									]) ,

									//操作
									integrationTags::td([
										integrationTags::tdButton([
											'class'  => ' btn-primary btn-custom-request' ,
											'data'   => [
												'src'        => url('apply') ,
												'is_reload'  => 0 ,
												'is_confirm' => 1 ,
												'msg'        => '确定部署到应用？' ,
											] ,
											'params' => [//'id' => $v['id'] ,
											] ,
											'value'  => '部署到应用' ,
											'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'apply') ,

										]) ,

										'<br />' ,
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
											'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delPackage') ,

										]) ,
										'<br />' ,
										(function($v) use ($__this) {
											return $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'downloadPackage') ?

												integrationTags::a('下载包文件' , [
													'href' => url('downloadPackage' , ['id' => $v['info']['id']]) ,
												]) : [];
										})($v),


									]) ,

								] , ['id' => $v['info']['id']]);
							}

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