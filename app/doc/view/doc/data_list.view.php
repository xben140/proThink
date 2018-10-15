<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('稿件列表');
		$__this->initLogic();

		/**
		 * ******************************************************************
		 *        视图分配机制设置
		 * ******************************************************************
		 */

		$__this->viewClass->autoRegisterTagMarkArray([
			[
				//状态
				'key'   => 'VIEW_ASSIGE_TAG_STATUS' ,
				'label' => '2' ,
				'value' => array_map(function($data) {
					return [
						'id'   => $data['value'] ,
						'name' => $data['field'] ,
					];
				} , $__this->logic->model_::$docStatusMap) ,
			] ,
			[
				//是否确认
				'key'   => 'VIEW_ASSIGE_TAG_IS_CONFIRM' ,
				'label' => '3' ,
				'value' => array_map(function($data) {
					return [
						'id'   => $data['value'] ,
						'name' => $data['field'] ,
					];
				} , $__this->logic->model_::$docIsconfirmMap) ,
			] ,
		]);


		//注册元素标识
		$__this->viewClass->registerElementsMark([
			//年
			'VIEW_ASSIGE_ELEMENTS_year'               => '1' ,
			//月
			'VIEW_ASSIGE_ELEMENTS_month'              => '2' ,
			//定金
			'VIEW_ASSIGE_ELEMENTS_deposit'            => '3' ,
			//尾款
			'VIEW_ASSIGE_ELEMENTS_final_payment'      => '4' ,
			//刊物类型
			'VIEW_ASSIGE_ELEMENTS_journal_type'       => '5' ,
			//稿件类型
			'VIEW_ASSIGE_ELEMENTS_doc_type'           => '6' ,
			//刊物名
			'VIEW_ASSIGE_ELEMENTS_journal_name'       => '7' ,
			//是否确认
			'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '8' ,
			//上传附件按钮
			'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '9' ,
			//预览附件按钮
			'VIEW_ASSIGE_ELEMENTS_preview_attachment' => 'a' ,
			//删除稿件按钮
			'VIEW_ASSIGE_ELEMENTS_delete'             => 'b' ,
			//稿件状态
			'VIEW_ASSIGE_ELEMENTS_doc_status'         => 'c' ,
			//设置为待定按钮
			'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => 'e' ,
		]);


		//设置当前uri
		$__this->viewClass->setCurrentUri($__this->currentUri);


		//$a = $__this->viewClass::getGroupTag($__this->viewClass::$tagMap);
		//$a = $__this->viewClass->getTagMapMark('VIEW_ASSIGE_TAG_ROLE');
		//$a = $__this->viewClass->getProperties();
		//var_export($a);
		//exit();


		/**
		 * ******************************************************************
		 *    //    视图分配机制设置
		 * ******************************************************************
		 */

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'class'      => 'btn-success  search-dom-btn-1' ,
								'field'      => '筛选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-info  se-all' ,
								'field'      => '全选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-info  se-rev' ,
								'field'      => '反选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-primary  multi-op multi-set-info' ,
								'field'      => '批量设置信息' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-danger  btn-add' ,
								'field'      => '上传稿件' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add') ,
							] ,
							[
								'class'      => 'btn-danger  multi-op multi-op-del' ,
								'field'      => '批量删除' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
							] ,
							[
								'class'      => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
								'field'      => '批量启用' ,
								'is_display' => 0 ,
							] ,
							[
								'class'      => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
								'field'      => '批量禁用' ,
								'is_display' => 0 ,
							] ,
							[
								'class'      => 'btn-warning btn-open-window' ,
								'field'      => '导出execl ( 按当前查询条件 )' ,
								//'is_display' => $__this->authClass->hasRoleByIds([1,2,3])  ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'exportExecl') ,
								'data'       => [
									'src'   => url('exportExecl') ,
									'title' => '导出execl ( 按当前查询条件 )' ,
								] ,
							] ,
						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$journalTypes = [];
						$journalTypes = $__this->logic__Journaltype->getFormatedData(1);

						//角色机制注册
						$__this->registerRoleEvent([
							[
								//管理员和全站管理
								'roles'    => [
									1 ,
									2 ,
								] ,
								'callback' => function() use (&$journalTypes) {

								} ,
								'params'   => [] ,
							] ,
							[
								//采编
								'roles'    => [4] ,
								'callback' => function() use (&$journalTypes , $__this) {
									//编辑获取指定
									$__this->param['uid'] = $__this->adminInfo['id'];

								} ,
								'params'   => [] ,
							] ,
							[
								//编辑
								'roles'    => [3] ,
								'callback' => function() use (&$journalTypes) {
									//采编获取所有类型
								} ,
								'params'   => [] ,
							] ,
						]);

						//$data = $__this->logic->dataList($__this->param);

						//查询条件写入session
						$__this->logic->updateSession('exportExecl_condition' , $__this->param);
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
								'field' => '稿件信息' ,
								'attr'  => 'style="width:auto;"' ,
							] ,
							[
								'field' => '稿件状态' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '采编备注' ,
								'attr'  => 'style="width:120px;"' ,
							] ,
							[
								'field' => '编辑备注' ,
								'attr'  => 'style="width:120px;"' ,
							] ,
							[
								'field' => '稿件状态' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '信息确认' ,
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

							'setDocInfoUrl'    => url('setDocInfo') ,
							'assignAddressUrl' => url('assignAddress') ,
						]);

						/**
						 * 设置表格搜索框
						 *searchFormCol
						 */
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($journalTypes , $__this) {

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '文档标题' ,
									'value'       => input('title' , '') ,
									'name'        => 'title' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '文档作者' ,
									'value'       => input('author' , '') ,
									'name'        => 'author' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '上传用户' ,
									'value'       => input('nickname' , '') ,
									'name'        => 'nickname' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRange([
									'field' => '文档P数' ,

									'name1'        => 'start_p' ,
									'value1'       => input('start_p' , '') ,
									'placeholder1' => '' ,

									'name2'        => 'end_p' ,
									'value2'       => input('end_p' , '') ,
									'placeholder2' => '' ,
								]) ,

							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//注册时间
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormDate([
									'field' => '上传时间' ,

									'value1'       => input('reg_time_begin' , '') ,
									'name1'        => 'reg_time_begin' ,
									'placeholder1' => '' ,

									'value2'       => input('reg_time_end' , '') ,
									'name2'        => 'reg_time_end' ,
									'placeholder2' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							$k = static::$yearMap;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'year' , '安排年份' , input('year' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$k = static::$monthMap;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'month' , '安排月份' , input('month' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$k = $__this->logic->model_::$docTypeMap;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'doc_type' , '稿件类型' , input('doc_type' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$k = $journalTypes;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'journal_type' , '刊物类型' , input('journal_type' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$k = $__this->logic->model_::$docStatusMap;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'doc_status' , '稿件状态' , input('doc_status' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$k = $__this->logic->model_::$docPreStatus;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'is_pending' , '处理状态' , input('is_pending' , -1)) ,
							] , ['col' => '3']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '刊物名' ,
									'value'       => input('journal_name' , '') ,
									'name'        => 'journal_name' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							//每页显示条数
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '每页显示条数' ,
									'value'       => (isset($__this->param['pagerow']) && is_numeric($__this->param['pagerow'])) ? $__this->param['pagerow'] : DB_LIST_ROWS ,
									'name'        => 'pagerow' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);

							//排序字段
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect([
									[
										'value' => 'id' ,
										'field' => '默认' ,
									] ,
								] , 'order_filed' , '排序字段' , input('order_filed' , 'id')) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							//状态
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRadio([
									[
										'value' => '-1' ,
										'field' => '全部' ,
									] ,
									[
										'value' => '1' ,
										'field' => '是' ,
									] ,
									[
										'value' => '0' ,
										'field' => '否' ,
									] ,
								] , 'is_confirm' , '确认信息' , input('is_confirm' , -1)) ,

							] , ['col' => '4']);
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

							] , ['col' => '4']);
							$doms = array_merge($doms , $t);

						});

						$_this->setSearchForm($searchForm);

						foreach ($data['data'] as $k => $v)
						{
							//设置当前状态
							$__this->viewClass->setStatus([
								'VIEW_ASSIGE_TAG_ROLE'       => $__this->authClass->getRoleByIds()[0] ,
								'VIEW_ASSIGE_TAG_IS_CONFIRM' => $v['is_confirm'] ,
								'VIEW_ASSIGE_TAG_STATUS'     => $v['doc_status'] ,
							]);

							//$a = $__this->viewClass->checkRule( 'VIEW_ASSIGE_ELEMENTS_ID', 'is_display');
							//$a = $__this->viewClass->getProperties();
							//var_export($a);exit();

							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox(!$v['is_confirm']) ,
									integrationTags::tdSimple([
										'value'      => $v['id'] ,
										'is_display' => 1 ,
									]) ,
								]) ,

								//稿件信息
								integrationTags::td([
									integrationTags::tdSimple([
										'name'  => '文档名字 : ' ,
										//'value' => sprintf("<span style='color: #00f;'>%s</span>", $v['file_name']),
										'value' => strtr("<span style='color: #00f;'>__1__</span>" , ['__1__' => $v['file_name'] ,]) ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '上传用户 : ' ,
										'value' => $v['nickname'] ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '上传时间 : ' ,
										'value' => formatTime($v['time'] , 1) ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '邮寄联系人 : ' ,
										'value' => $v['contacts'] ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '邮寄电话 : ' ,
										'value' => $v['tel'] ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '邮寄地址 : ' ,
										'value' => $v['prov_name'] . ' ' . $v['city_name'] . ' ' . $v['county_name'] . ' ' . $v['address'] ,
									]) ,
								]) ,

								//联系方式
								integrationTags::td([
									/*
									integrationTags::tdSimple([
										'name'     => '安排时间 : ' ,
										'value'    => formatTime($v['arrange_time'], 0) ,
										'editable' => '1' ,
										'field'    => 'arrange_time' ,
										'reg'      => '/^\d{4}-\d{2}-\d{2}$/' ,
										'msg'      => '格式 2018-01-01' ,
									]) ,
									'<br>' ,
									*/

									integrationTags::tdSelect([
										'name'       => 'year' ,
										'field_name' => '年份 :' ,
										'selected'   => $v['year'] ,
										'options'    => static::$yearMap ,
										'disabled'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_year' , 'is_enable') ? '' : 'disabled' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_year' , 'is_display') ,
									]) ,

									integrationTags::tdSelect([
										'name'       => 'month' ,
										'field_name' => '月份 :' ,
										'selected'   => $v['month'] ,
										'options'    => static::$monthMap ,
										'disabled'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_month' , 'is_enable') ? '' : 'disabled' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_month' , 'is_display') ,
									]) ,

									'<br>' ,
									integrationTags::tdSimple([
										'name'       => '定金 : ' ,
										'value'      => $v['deposit'] ,
										'field'      => 'deposit' ,
										'reg'        => '/^\d+(\.\d{1,2})?$/' ,
										'msg'        => '必须为整数或者小数' ,
										'editable'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_deposit' , 'is_enable') ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_deposit' , 'is_display') ,
									]) ,

									integrationTags::tdSimple([
										'name'       => '尾款 : ' ,
										'value'      => $v['final_payment'] ,
										'field'      => 'final_payment' ,
										'reg'        => '/^\d+(\.\d{1,2})?$/' ,
										'msg'        => '必须为整数或者小数' ,
										'editable'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_enable') ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_display') ,
									]) ,
									'<br>' ,

									integrationTags::tdSimple([
										'name'       => '总额 : ' ,
										'value'      => $v['total'] ,
										'field'      => 'total' ,
										'reg'        => '/^\d+(\.\d{1,2})?$/' ,
										'msg'        => '必须为整数或者小数' ,
										'editable'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_enable') ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_display') ,
									]) ,

									integrationTags::tdSimple([
										'name'       => '刊物名 : ' ,
										'value'      => $v['journal_name'] ,
										'field'      => 'journal_name' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'editable'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_name' , 'is_enable') ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_name' , 'is_display') ,

									]) ,
									'<br>' ,
									integrationTags::tdSelect([
										'name'       => 'journal_type' ,
										'field_name' => '刊物类型 :' ,
										'selected'   => $v['journal_type'] ,
										'options'    => $journalTypes ,
										'disabled'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_type' , 'is_enable') ? '' : 'disabled' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_type' , 'is_display') ,

									]) ,
									'<br>' ,
									integrationTags::tdSelect([
										'name'       => 'doc_type' ,
										'field_name' => '稿件类型 :' ,
										'selected'   => $v['doc_type'] ,
										'options'    => $__this->logic->model_::$docTypeMap ,
										'disabled'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_type' , 'is_enable') ? '' : 'disabled' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_type' , 'is_display') ,
									]) ,
								]) ,

								//采编备注
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%;height:100px' ,
										//'name'     => 'remark' ,
										'editable' => $__this->authClass->hasRoleByIds([4]) ,
										'field'    => 'remark' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['remark'] ,
									]) ,
								]) ,

								//编辑备注
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%;height:100px' ,
										//'name'     => 'remark' ,
										'editable' => $__this->authClass->hasRoleByIds([3]) ,
										'field'    => 'remark_editor' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['remark_editor'] ,
									]) ,
								]) ,

								//待处理
								integrationTags::td([
									integrationTags::tdSelect([
										'name'       => 'is_pending' ,
										//'field_name' => '刊物类型 :' ,
										'selected'   => $v['is_pending'] ,
										'options'    => $__this->logic->model_::$docPreStatus ,
										'disabled'   => 1 ,
										'is_display' => 1 ,

									]) ,
								]) ,

								//信息确认
								integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'          => $v['is_confirm'] ? 'checked' : '' ,
											'name'             => 'is_confirm' ,
											'change_callback'  => 'switcherUpdateFieldConfirm' ,
											'success_callback' => 'refresh_page' ,
											'disabled'         => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_is_confirm' , 'is_enable') ? '' : 'disabled' ,
											'is_display'       => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_is_confirm' , 'is_display') ,
										] ,
										//'name'    => '' ,
										'is_auto' => '0' ,
									]) ,
								]) ,

								//操作
								integrationTags::td([

									integrationTags::tdButton([
										'class'      => ' btn-primary btn-open-pop' ,
										'data'       => [
											'src'   => url('replaceDoc') ,
											'title' => '替换稿件' ,
										] ,
										'param'      => [
											'id' => $v['id'] ,
										] ,
										'value'      => '替换稿件' ,
										'is_display' => 1 ,
									]) ,

									integrationTags::a('下载稿件' , [
										'href' => url('downloadDoc' , ['id' => $v['id']]) ,
									]) ,

									integrationTags::tdButton([
										'class'      => ' btn-warning btn-open-pop' ,
										'data'       => [
											'src'   => url('assignAddress') ,
											'title' => '设置地址' ,
										] ,
										'param'      => [
											'id' => $v['id'] ,
										] ,
										'value'      => '设置地址' ,
										'is_display' => $__this->authClass->hasRoleByIds([4]) ,
									]) ,


									'<br>' ,

									integrationTags::tdButton([
										'class'      => ' btn-info btn-open-pop' ,
										'data'       => [
											'src'   => url('doc/Docattachment/add') ,
											'title' => '上传附件' ,
										] ,
										'param'      => [
											'id' => $v['id'] ,
										] ,
										'value'      => '上传附件' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_upload_attachment' , 'is_display') ,
									]) ,

									integrationTags::tdButton([
										'class'      => ' btn-primary btn-open-pop' ,
										'data'       => [
											'src'   => url('doc/Docattachment/dataList') ,
											'title' => '查看附件' ,
										] ,
										'param'      => [
											'id' => $v['id'] ,
										] ,
										'value'      => '查看附件' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_upload_attachment' , 'is_display') ,
									]) ,

									'<br>' ,

									integrationTags::tdButton([
										'class'      => ' btn-success btn-set-stay' ,
										'value'      => '设置待定' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_set_stay' , 'is_display') ,
									]) ,

									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_delete' , 'is_display') ,
									]) ,
									'<br>' ,

									integrationTags::tdSelect([
										'name'             => 'doc_status' ,
										'success_callback' => 'refresh_page' ,
										'field_name'       => '稿件状态 :' ,
										'selected'         => $v['doc_status'] ,
										'options'          => $__this->logic->model_::$docStatusMap ,

										'disabled'   => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_status' , 'is_enable') ? '' : 'disabled' ,
										'is_display' => $__this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_status' , 'is_display') ,
									]) ,

								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'main_title' => '稿件列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);

	};