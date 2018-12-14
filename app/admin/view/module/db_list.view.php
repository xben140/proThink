<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('应用列表');
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
									'is_reload'  => 0 ,
									'is_confirm' => 0 ,
									'is_alert'   => 1 ,
									'msg'        => '' ,
								] ,
								'params' =>  [
									'option' => 'optimizeDb' ,
								] ,
								'field'      => '优化数据表' ,
								'is_display' =>  $__this->isButtonDisplay(MODULE_NAME , 'Module' , 'dbOperation')
							],

							[
								'class'      => ' btn-info btn-custom-request' ,
								'data'       => [
									'src'        => url('dbOperation') ,
									'is_reload'  => 0 ,
									'is_confirm' => 0 ,
									'is_alert'   => 1 ,
									'msg'        => '' ,
								] ,
								'params' =>  [
									'option' => 'restoreDb' ,
								] ,
								'field'      => '修复数据表' ,
								'is_display' =>  $__this->isButtonDisplay(MODULE_NAME , 'Module' , 'dbOperation')
							],

						] ,
					] , [
						0 ,
						2 ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->dbList();

						/**
						 * 设置表格头
						 */
						$_this->setHead([

							[
								'field' => '表信息' ,
								'attr'  => 'style="width:40%;"' ,
							] ,
							[
								'field' => '' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '备注' ,
								'attr'  => 'style="width:20%;"' ,
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

								//信息
								integrationTags::td([

									integrationTags::tdSimple([
										'value'    => $v['name'],
										'name'     => strtr("<span style='color: #2434ff;'>__1__</span>" , ['__1__' => '表名(Name) : ' ,]) ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,

									'<br />',
									integrationTags::tdSimple([
										'value'    => $v['engine'],
										'name'     => '存储引擎(Engine) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,

									'<br />',
									integrationTags::tdSimple([
										'value'    => $v['auto_increment'],
										'name'     => '自增量(Auto_increment) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,

									'<br />',
									integrationTags::tdSimple([
										'value'    => $v['rows'],
										'name'     => '记录行数(Rows) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,

									'<br />',
									integrationTags::tdSimple([
										'value'    => $v['row_format'],
										'name'     => '保存格式(Row_format) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
								]) ,


								//信息
								integrationTags::td([

									integrationTags::tdSimple([
										'value'    => $v['collation'],
										'name'     => '默认字符集(Collation) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />',

									integrationTags::tdSimple([
										'value'    => formatBytes($v['data_length']),
										'name'     => '数据大小(Data_length) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />',
									integrationTags::tdSimple([
										'value'    =>  formatBytes($v['index_length']),
										'name'     => '索引大小(Index_length) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />',
									integrationTags::tdSimple([
										'value'    => $v['create_time'],
										'name'     => '建表时间(Create_time) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />',

									integrationTags::tdSimple([
										'value'    => $v['update_time'],
										'name'     => '更新时间(Update_time) : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />',

								]) ,

								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%;height:120px' ,
										//'name'     => 'remark' ,
										'field'    => '注释' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['comment'],
										'editable' => 0 ,
									]) ,
								]) ,

							] );

							$doms = array_merge($doms , $t);
						}

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '数据表列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};