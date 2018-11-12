<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->initLogic();
		session(URL_MODULE , $__this->param['id']);
		$info = $__this->logic->getModuleInfo($__this->param['id']);

		$btn = [];
		switch ($info['is_install'])
		{
			case '1' :
			case '2' :
				session(URL_MODULE . 'action' , 'uninstall');
				$btn[0][] = [

					'is_display' => 1 ,
					'class'      => ' btn-danger btn-custom-event ' ,
					'data'       => [
						'callback' => 'doAction' ,
					] ,
					'field'      => '卸载应用' ,
				];
				break;
			case '0' :
				session(URL_MODULE . 'action' , 'install');
				$btn[0][] = [

					'is_display' => 1 ,
					'class'      => ' btn-info btn-custom-event ' ,
					'data'       => [
						'callback' => 'doAction' ,
					] ,
					'field'      => '安装应用' ,
				];
		}

		$__this->setPageTitle('应用');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					integrationTags::rowButton($btn , []) ,

					'<p class="red">卸载过程会删除此应用数据库所有数据，如果此应用还有使用的可能，请先在列表页点击 <备份应用数据> 后再卸载</p>' ,
					'<p class="red">在列表页点击 <备份应用数据> 会将此应用的数据写到应用的database目录下</p>' ,
					'<p class="red"><备份安装包> 会将备份的应用数据一并打包，即使删除应用，仍然可以重新安装应用包恢复数据</p>' ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this, $info) {
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
							[
								'behavior' => '路由文件' ,
								'class'    => 'install-route' ,
								'type'     => 'route' ,
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
										'value'    => '',
										//'value'    => $v['class'] ,
										'editable' => 0 ,
									]) ,

								]) ,

								integrationTags::td([
									integrationTags::tdButton([
										'class'  => ' btn-info btn-custom-request install-action' ,
										'data'   => [
											'src'             => url('operation') ,
											'before-request'  => 'beforeAction' ,
											'success-request' => 'successAction' ,
											'error-request'   => 'errorAction' ,
										] ,
										'params' => [
											'type'   => $v['type'] ,
											'action' => session(URL_MODULE . 'action') ,
										] ,
										'value'  => (function($info) {
											switch ($info['is_install'])
											{
												case '1' :
												case '2' :
													return '手动卸载';
													break;
												case '0' :
													return '手动安装';
													break;
											}
										})($info) ,
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