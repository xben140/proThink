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
		$__this->setPageTitle('角色列表');

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

						//$data = $__this->logic->dataList($__this->param);
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
								'field' => '角色名' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '排序' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '添加时间' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '备注' ,
								'attr'  => 'style="width:150px;"' ,
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

						foreach ($data['data'] as $k => $v)
						{
							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox((function($v) {
										return $v['id'] != 1;
									})($v)) ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								//角色名
								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['name'] ,
										//'name'    => '' ,
										'field'    => 'name' ,
										'reg'      => '/^\S+$/' ,
										'msg'      => '角色名必填' ,
										'editable' => (function() use ($v) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID);
										})() ,
									]) ,
								]) ,

								//排序
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'    => '' , ,
										'value'    => $v['order'] ,
										'field'    => 'order' ,
										'reg'      => '/^\d+$/' ,
										'msg'      => '必须为数字，确保前后无空格' ,
										'editable' => (function() use ($v) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID);
										})() ,
									]) ,
								]) ,


								//添加时间
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										//'editable' => '0' ,
										'value' => formatTime($v['time']) ,
									]) ,
								]) ,


								//备注
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%' ,
										//'name'     => 'remark' ,
										'field'    => 'remark' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['remark'] ,
										'editable' => (function() use ($v) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID);
										})() ,
									]) ,
								]) ,


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
										//'name'    => '' , ,
										'is_auto' => '1' ,

									]) ,
								]) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class'      => ' btn-success btn-edit' ,
										'value'      => '编辑' ,
										'is_display' => (function() use ($v , $__this) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID) && $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'edit');
										})() ,
									]) ,
									integrationTags::tdButton([
										'class' => ' btn-info btn-open-pop' ,
										'value' => '分配权限' ,

										'data'   => [
											'src'   => url('assignPrivileges') ,
											'title' => '分配权限' ,
										] ,
										'params' => [
											'id' => $v['id'] ,
										] ,

										'is_display' => (function() use ($v , $__this) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID) && $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'assignPrivileges');
										})() ,
									]) ,
									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => (function() use ($v , $__this) {
											return ($v['id'] != GLOBAL_ADMIN_ROLE_ID) && $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete');
										})() ,
									]) ,
								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'width'      => '12' ,
					'main_title' => '角色列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};