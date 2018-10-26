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
							[
								'class'      => 'btn-danger  btn-add' ,
								'field'      => '添加数据' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add') ,
							] ,
							[
								'class'      => 'btn-danger  multi-op multi-op-del' ,
								'field'      => '批量删除' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
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
								'field' => '封面' ,
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

						/**
						 * 设置表格搜索框
						 *searchFormCol
						 */
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($__this) {

							//角色名
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '角色名' ,
									'value'       => input('name' , '') ,
									'name'        => 'name' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//添加时间
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormDate([
									'field' => '添加时间' ,

									'value1'       => input('reg_time_begin' , '') ,
									'name1'        => 'reg_time_begin' ,
									'placeholder1' => '' ,

									'value2'       => input('reg_time_end' , '') ,
									'name2'        => 'reg_time_end' ,
									'placeholder2' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//每页显示条数
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '每页显示条数' ,
									'value'       => (isset($__this->param['pagerow']) && is_numeric($__this->param['pagerow'])) ? $__this->param['pagerow'] : DB_LIST_ROWS ,
									'name'        => 'pagerow' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//排序字段
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect([
									[
										'value' => 'id' ,
										'field' => '默认' ,
									] ,
								] , 'order_filed' , '排序字段' , input('order_filed' , 'id')) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							//排序方向
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRadio([
									[
										'value' => 'asc' ,
										'field' => '正序' ,
									] ,
									[
										'value' => 'desc' ,
										'field' => '反序' ,
									] ,
								] , 'order' , '排序方向' , input('order' , 'asc')) ,

							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							//状态
							$k = static::$statusMap;
							array_pop($k);
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRadio($k , 'status' , '状态' , input('status' , '-1')) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

						});

						$_this->setSearchForm($searchForm);

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
										'value'      => '备份' ,
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

									(function($v) {
										return !$v['is_install'] ? integrationTags::tdButton([
											'value'      => '安装' ,
											'class'      => ' btn-info btn-open-pop' ,
											'data'       => [
												'src'   => url('opearation') ,
												'title' => '安装' ,
											] ,
											'params'     => [
												'id'     => $v['info']['id'] ,
												'action' => 'install' ,
											] ,
											'is_display' => 1 ,
										]) : integrationTags::tdButton([
											'value'      => '卸载' ,
											'class'      => ' btn-primary btn-open-pop' ,
											'data'       => [
												'src'   => url('opearation') ,
												'title' => '卸载' ,
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
										'value'  => '设为默认模块' ,
									]) ,

									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
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