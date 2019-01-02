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



	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->initLogic();

		session(URL_MODULE , $__this->param['id']);
		$info = $__this->logic->getModuleInfo($__this->param['id']);
		$infoPath = $__this->logic->getModulePathInfo($__this->param['id']);

		$btn = [];
		if(is_dir($infoPath['appPath']))
		{
			session(URL_MODULE . 'action' , 'uninstall');
			$btn[0][] = [
				'is_display' => 1 ,
				'class'      => ' btn-danger btn-custom-event ' ,
				'data'       => [
					'callback' => 'uninstall_1' ,
				] ,
				'field'      => '卸载应用' ,
			];
		}
		else
		{
			session(URL_MODULE . 'action' , 'install');
			$btn[0][] = [

				'is_display' => 1 ,
				'class'      => ' btn-info btn-custom-event ' ,
				'data'       => [
					'callback' => 'install_1' ,
				] ,
				'field'      => '安装应用' ,
			];
		}

		$btn[0][] = [
			'is_display' => 1 ,
			'class'      => ' btn-success btn-custom-event ' ,
			'data'       => [
				'callback' => 'refresh_page' ,
			] ,
			'field'      => '终止/重新操作' ,
		];

		$__this->setPageTitle('应用');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					integrationTags::rowButton($btn , []) ,

					//'<p class="red">卸载过程会删除此应用' . MODULE_FILE_INFO . ' 里 database_tables 对应表所有数据</p>' ,
					//'<p class="red">在列表页点击 <备份应用数据> 会将此应用的数据写到应用的database目录下</p>' ,
					//'<p class="red"><备份安装包> 会将备份的应用数据一并打包，即使删除应用，仍然可以重新安装应用包恢复数据</p>' ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this , $info) {
						$data = [
							[
								'behavior' => (session(URL_MODULE . 'action') == 'install') ? '部署应用' : '删除应用' ,
								'class'    => 'install-apply' ,
								'type'     => 'apply' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_2' : 'uninstall_3' ,
							] ,
							[
								'behavior' => '菜单信息' ,
								'class'    => 'install-menu' ,
								'type'     => 'menu' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_3' : 'uninstall_2' ,
							] ,
							[
								'behavior' => '配置信息' ,
								'class'    => 'install-config' ,
								'type'     => 'config' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_3' : 'uninstall_2' ,
							] ,
							[
								'behavior' => '数据信息' ,
								'class'    => 'install-db' ,
								'type'     => 'db' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_3' : 'uninstall_2' ,
							] ,
							[
								'behavior' => '路由信息' ,
								'class'    => 'install-route' ,
								'type'     => 'route' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_3' : 'uninstall_2' ,
							] ,
							[
								'behavior' => '回收信息' ,
								'class'    => 'install-recovery' ,
								'type'     => 'recovery' ,
								'after'    => (session(URL_MODULE . 'action') == 'install') ? 'install_3' : 'uninstall_2' ,
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
								'field' => '' ,
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
										'value'    => '' ,
										//'value'    => $v['class'] ,
										'editable' => 0 ,
									]) ,

								]) ,

								integrationTags::td([

									integrationTags::tdButton([
										'class'  => ' btn-info btn-custom-request install-action ' . $v['class'] ,
										'data'   => [
											'src'             => url('operation') ,
											'before-request'  => 'beforeAction' ,
											'success-request' => $v['after'] ,
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
					'main_title' => '卸载' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};