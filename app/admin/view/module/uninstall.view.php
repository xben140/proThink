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


					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = [
							[
								'behavior' => '写入菜单' ,
								'class'    => 'install-menu' ,
								'type'     => 'menu' ,
							] ,
							[
								'behavior' => '写入配置' ,
								'class'    => 'install-config' ,
								'type'     => 'config' ,
							] ,
							[
								'behavior' => '写入数据' ,
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
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '状态' ,
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => 'style="width:150px;"' ,
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