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



	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('备份sql文件列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'class'      => ' btn-info btn-custom-request' ,
								'data'       => [
									'src'        => url('dbOperation') ,
									'is_reload'  => 1 ,
									'is_confirm' => 1 ,
									'is_alert'   => 1 ,
									'msg'        => '确定备份整站数据？' ,
								] ,
								'params' =>  [
									'option' => 'backupData' ,
								] ,
								'field'      => '备份整站数据' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'dbOperation') ,
							]
						] ,

					] , [
						0 ,
						2 ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->dbBackupList();

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
										'value'    => $v['mode'] ,
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
											'src'        => url('dbOperation') ,
											'is_reload'  => 0 ,
											'is_confirm' => 1 ,
											'is_alert'   => 0 ,
											'msg'        => '此操作会将当期数据库数据全部覆盖，无法恢复，确认操作？' ,
										] ,
										'params'     => [
											'option' => 'recoverData' ,
										] ,
										'value'      => '恢复数据' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'dbOperation') ,
									]) ,
									'<br />' ,
									integrationTags::tdButton([
										'class'      => ' btn-danger btn-custom-request' ,
										'data'       => [
											'src'        => url('dbOperation') ,
											'is_reload'  => 1 ,
											'is_confirm' => 1 ,
											'is_alert'   => 0 ,
											'msg'        => '此操作会删除当前SQL文件，无法恢复，确认操作？' ,
										] ,
										'params'     => [
											'option' => 'deleteData' ,
										] ,
										'value'      => '删除备份' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'dbOperation') ,
									]) ,
									'<br />' ,
									(function($v) use ($__this) {
										return $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'downloadSql') ?

											integrationTags::a('下载sql文件' , [
												'href' => url('downloadSql' , ['id' => base64_encode($v['name'])]) ,
											]) : [];
									})($v) ,

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