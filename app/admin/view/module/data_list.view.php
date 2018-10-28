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
								'class' => 'btn-success  search-dom-btn-1' ,
								'field' => '筛选' ,
							] ,
							[
								'class' => 'btn-info  se-all' ,
								'field' => '全选' ,
							] ,
							[
								'class' => 'btn-info  se-rev' ,
								'field' => '反选' ,
							] ,
						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->dataList($__this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:80px;"' ,
							] ,
							[
								'field' => '封面1' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '信息' ,
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
							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value' => $v['info']['id'] ,
									]) ,
								]) ,


								//封面
								//data-href="/admin/User/editProfilePic" data-text="修改头像"
								integrationTags::td([
									integrationTags::tdSimple([
										'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
											'is_display'      => 1 ,
											'src'             => $v['cover'] ,
											'data-origin-src' => $v['cover'] ,
											'text'            => '' ,
											'style'           => 'height: 65px;' ,
											'class'           => 'preview-img ' ,
										])) ,
									]) ,
								]) ,

								//信息
								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['info']['id'] ,
										'name'     => 'id : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />' ,
									integrationTags::tdSimple([
										'value'    => $v['info']['name'] ,
										'name'     => '应用名 : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />' ,
									integrationTags::tdSimple([
										'value'    => $v['info']['title'] ,
										'name'     => '标题 : ' ,
										//'field'    => 'name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '表名字必填' ,
										'editable' => 0 ,
									]) ,
									'<br />' ,
									//添加时间
									integrationTags::tdSimple([
										'name'  => '更新时间' ,
										//'editable' => '0' ,
										'value' => formatTime($v['info']['update_time']) ,
									]) ,
								]) ,

								//描述
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%' ,
										//'name'     => 'remark' ,
										'field'    => 'description' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['info']['description'] ,
										'editable' => 0 ,
									]) ,
								]) ,

								/*
										//状态
										integrationTags::td([
											integrationTags::tdSwitcher([
												'params'  => [
													'checked'         => $v['status'] ? 'checked' : '' ,
													'name'            => 'status' ,
													'change_callback' => 'switcherUpdateField' ,
													//switcherUpdateFieldConfirm
													'is_display'      => (function() use ($v) {
														return ($v['id'] != GLOBAL_ADMIN_ROLE_ID);
													})() ,
												] ,
												'name'    => '' ,
												'is_auto' => '1' ,

											]) ,
										]) ,
								*/

								//操作
								integrationTags::td([
									/*
									integrationTags::tdButton([
										'class'       => ' btn-success btn-edit' ,
										'value'      => '编辑' ,
										'is_display' => 1,
									]) ,*/

									integrationTags::tdButton([
										'value'      => '备份应用数据' ,
										'class'      => ' btn-info btn-open-pop' ,
										'data'       => [
											'src'   => url('backup') ,
											'title' => '备份' ,
										] ,
										'params'     => [
											'id' => $v['info']['id'] ,
										] ,
										'is_display' => 1 ,
									]) ,

									integrationTags::tdButton([
										'value'      => '备份安装包' ,
										'class'      => ' btn-success btn-open-pop' ,
										'data'       => [
											'src'   => url('backup') ,
											'title' => '备份' ,
										] ,
										'params'     => [
											'id' => $v['info']['id'] ,
										] ,
										'is_display' => 1 ,
									]) ,

									'<br />' ,

									(function($v) {
										return !$v['is_install'] ? integrationTags::tdButton([
											'value'      => '安装应用' ,
											'class'      => ' btn-info btn-open-pop' ,
											'data'       => [
												'src'   => url('opearation') ,
												'title' => '安装应用' ,
											] ,
											'params'     => [
												'id'     => $v['info']['id'] ,
												'action' => 'install' ,
											] ,
											'is_display' => 1 ,
										]) : integrationTags::tdButton([
											'value'      => '卸载应用' ,
											'class'      => ' btn-primary btn-open-pop' ,
											'data'       => [
												'src'   => url('opearation') ,
												'title' => '卸载应用' ,
											] ,
											'params'     => [
												'id'     => $v['info']['id'] ,
												'action' => 'uninstall' ,
											] ,
											'is_display' => 1 ,
										]);
									})($v) ,


									'<br />' ,


									integrationTags::tdButton([
										'class'  => ' btn-info btn-custom-request' ,
										'data'   => [
											'src' => url('setDefault') ,
										] ,
										'params' => [
											'address_id' => $v['info']['id'] ,
										] ,
										'value'  => '设为默认应用' ,
									]) ,

									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除应用' ,
										'is_display' => 1 ,
									]) ,
								]) ,

							] , ['id' => $v['info']['id']]);

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