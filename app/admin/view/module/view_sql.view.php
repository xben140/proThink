<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('备份sql文件列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->viewSql();

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => '文件' ,
							] ,
							[
								'field' => '信息' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => 'style="width:180px;"' ,
							] ,
						]);

						foreach ($data as $k => $v)
						{
							$t = integrationTags::tr([

								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['name'] ,
										//'name'     => 'id : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
								]) ,
								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => \file\FileTool::byteFormat($v['size']) ,
										'name'     => '大小 : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />' ,

									integrationTags::tdSimple([
										'value'    => $v['mode'],
										'name'     => '权限 : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
								]) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class'      => ' btn-info btn-custom-request' ,
										'data'       => [
											'src'        => url('baseFunc') ,
											'is_reload'  => 0 ,
											'is_confirm' => 1 ,
											'is_alert'   => 1 ,
											'msg'        => '此操作会将当期数据库数据全部覆盖，无法恢复，确认操作？' ,
										] ,
										'params'     => [
											'option' => 'recoverData' ,
										] ,
										'value'      => '恢复数据' ,
										'is_display' => 1 ,
									]) ,
									'<br />' ,
									integrationTags::tdButton([
										'class'      => ' btn-danger btn-custom-request' ,
										'data'       => [
											'src'        => url('baseFunc') ,
											'is_reload'  => 1 ,
											'is_confirm' => 1 ,
											'is_alert'   => 1 ,
											'msg'        => '此操作会删除当前SQL文件，无法恢复，确认操作？' ,
										] ,
										'params'     => [
											'option' => 'deleteData' ,
										] ,
										'value'      => '删除备份' ,
										'is_display' => 1 ,
									]) ,
									'<br />' ,
									integrationTags::a('下载sql文件' , [
										'href' => url('downloadSql' , ['id' => base64_encode($v['name'])]) ,
									]) ,
								]) ,

							] , ['id' => $v['name']]);
							$doms = array_merge($doms , $t);
						}

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '备份sql文件列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};