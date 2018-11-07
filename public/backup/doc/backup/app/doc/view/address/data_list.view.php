<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('稿件类型列表');

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
							[
								'class' => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
								'field' => '批量启用' ,
							] ,
							[
								'class' => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
								'field' => '批量禁用' ,
							] ,
						] ,
					]) ,
					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						//角色机制注册
						$__this->authClass->registerRoleEvent([
							[
								//采编
								'roles'    => [4] ,
								'callback' => function() use (&$journalTypes , $__this) {
									//编辑获取指定
									$__this->param['uid'] = $__this->adminInfo['id'];
								} ,
								'params'   => [] ,
							] ,
						]);

						$data = $__this->logic->dataListWithPagination($__this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:80px;"' ,
							] ,
							[
								'field' => '信息' ,
								'attr'  => 'style="width:220px;"' ,
							] ,

							[
								'field' => '省/市/县' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '详细地址' ,
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '备注' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '添加时间' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '状态' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => '' ,
							] ,
						]);

						/**
						 * 设置表分页按钮
						 */
						$_this->setPagination($data['pagination']);

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
							/*
							//权限名字
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '类型名称' ,
									'value'       => input('name' , '') ,
									'name'        => 'name' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '12']);
							$doms = array_merge($doms , $t);

							*/

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
						foreach ($data['data'] as $k => $v)
						{

							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								//信息
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => '联系人 : ' ,
										'editable' => '1' ,
										'value'    => $v['name'] ,
										'field'    => 'name' ,
										'reg'      => '/^\S+$/' ,
										'msg'      => '姓名不能为空' ,
									]) ,
									'<br />' ,
									integrationTags::tdSimple([
										'name'     => '电话 : ' ,
										'editable' => '1' ,
										'value'    => $v['tel'] ,
										'field'    => 'tel' ,
										'reg'      => '/^1\d{10}$/' ,
										'msg'      => '手机格式不对' ,
									]) ,
								]) ,

								//省/市/县
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['prov_name']) ,
									]) ,
									'/' ,
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['city_name']) ,
									]) ,
									'/' ,
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['county_name']) ,
									]) ,
								]) ,


								//详细
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%' ,
										//'name'     => 'remark' ,
										'editable' => '1' ,
										'field'    => 'address' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['address'] ,
									]) ,
								]) ,


								//备注
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%' ,
										//'name'     => 'remark' ,
										'editable' => '1' ,
										'field'    => 'remark' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['remark'] ,
									]) ,
								]) ,

								//时间
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => formatTime($v['time']) ,
									]) ,
								]) ,

								//用户状态
								integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => $v['status'] ? 'checked' : '' ,
											'name'            => 'status' ,
											'change_callback' => 'switcherUpdateField' ,
											//switcherUpdateFieldConfirm
										] ,
										//'name'    => '' ,
										'is_auto' => '1' ,
									]) ,
								]) ,

								//操作
								integrationTags::td([

									integrationTags::tdButton([
										'class' => ' btn-success btn-edit' ,
										'value' => '编辑' ,
									]) ,

									/*

									integrationTags::tdButton([
										'class'  => ' btn-info btn-detail' ,
										'value' => '详细' ,
									]) ,
									*/

									integrationTags::tdButton([
										'class' => ' btn-danger btn-delete' ,
										'value' => '删除' ,
									]) ,

								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'width'      => '12' ,
					'main_title' => '稿件类型列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);
	};