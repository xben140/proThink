<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		session(URL_MODULE , $__this->param['id']);
		session(URL_MODULE . 'action' , $__this->param['action']);

		$__this->setPageTitle('卸载模块');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					integrationTags::rowButton([
						[
							[
								'is_display' => 1 ,
								'class'      => 'btn-danger btn-open-pop' ,
								'field'      => '开始卸载' ,
								'data'       => [
									'src'   => url('blog/blogtag/add') ,
									'title' => '开始卸载' ,
								] ,
							] ,
						] ,
					] , [
						0 ,
						2 ,
					]) ,

					'<p class="btn-danger">卸载过程会删除此应用数据库所有数据，如果此应用还有使用的可能，请先在列表页点击 <备份应用数据> 后再卸载</p>',
					'<p class="btn-danger">在列表页点击 <备份应用数据> 会将此应用的数据写到应用的database目录下</p>',
					'<p class="btn-danger"><备份安装包> 会将备份的应用数据一并打包，即使删除应用，仍然可以重新安装应用包恢复数据</p>',

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = [
							[
								'behavior' => '菜单信息' ,
								'class'    => 'install-menu' ,
								'type'     => 'menu' ,
							] ,
							[
								'behavior' => '配置信息' ,
								'class'    => 'install-config' ,
								'type'     => 'config' ,
							] ,
							[
								'behavior' => '数据信息' ,
								'class'    => 'install-db' ,
								'type'     => 'db' ,
							] ,
						];

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => '行为' ,
								'attr'  => 'style="width:100px;"' ,
							] ,
							[
								'field' => '状态' ,
								'attr'  => 'style="width:auto;"' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => 'style="width:100px;"' ,
							] ,
						]);

						/**
						 * 设置js请求api
						 */
						$_this->setApi([//'deleteUrl'   => url('delete') ,
						]);

						foreach ($data as $k => $v)
						{
							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['behavior'] ,
										'editable' => 0 ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['class'] ,
										'editable' => 0 ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdButton([
										'class'  => ' btn-info btn-custom-request' ,
										'data'   => [
											'src' => url('opearation') ,
										] ,
										'params' => [
											'type' => $v['type'] ,
										] ,
										'value'  => '手动执行' ,
									]) ,
								]) ,

							]);

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