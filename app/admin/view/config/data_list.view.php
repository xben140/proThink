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
		$__this->setPageTitle('配置列表');
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
							[
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'configgroup' , 'datalist') ,
								'class'      => 'btn-info btn-open-pop' ,
								'field'      => '配置分组' ,
								'data'       => [
									'src'   => url('admin/configgroup/datalist') ,
									'title' => '配置分组' ,
								] ,
							] ,

						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {

						//$data = $__this->logic->dataList($__this->param);
						$data = $__this->logic->dataListWithPagination($__this->param);

						//配置组
						$configGroup = $__this->logic__admin_Configgroup->getFormatedData();

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:80px;"' ,
							] ,
							[
								'field' => '配置' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '属性' ,
							] ,
							[
								'field' => '值' ,
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '备注' ,
								'attr'  => 'style="width:150px;"' ,
							] ,
							[
								'field' => '添加时间' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '常量' ,
								'attr'  => 'style="width:70px;"' ,
							] ,
							[
								'field' => '状态' ,
								'attr'  => 'style="width:70px;"' ,
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
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($configGroup , $__this) {

							//配置组
							$tmp = $configGroup;
							array_unshift($tmp , [
								'value' => '-1' ,
								'field' => '全部' ,
							]);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($tmp , 'group_id' , '配置组' , input('group_id' , '-1')) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//类型
							$tmp = $__this->logic->model_->type;
							array_unshift($tmp , [
								'value' => '-1' ,
								'field' => '全部' ,
							]);
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($tmp , 'type' , '类型' , input('type' , '-1')) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							//配置键
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '配置键' ,
									'value'       => input('key' , '') ,
									'name'        => 'key' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//配置名
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '配置名' ,
									'value'       => input('name' , '') ,
									'name'        => 'name' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//注册时间
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


							//状态
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRadio([
									[
										'value' => '-1' ,
										'field' => '全部' ,
									] ,
									[
										'value' => '0' ,
										'field' => '非常量' ,
									] ,
									[
										'value' => '1' ,
										'field' => '常量' ,
									] ,
								] , 'is_const' , '是否常量' , input('is_const' , '-1')) ,

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
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								//配置
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => '配置名 : ' ,
										'editable' => '1' ,
										'value'    => $v['name'] ,
										'field'    => 'name' ,
										'reg'      => '/^\S+$/' ,
										'msg'      => '配置名必填' ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'     => '配置键 : ' ,
										'editable' => '1' ,
										'value'    => $v['key'] ,
										'field'    => 'key' ,
										'reg'      => '/^\S+$/' ,
										'msg'      => '配置键必填' ,
									]) ,
								]) ,

								//属性
								integrationTags::td([
									integrationTags::tdSelect([
										'field_name' => '分组:' ,
										'name'       => 'group_id' ,
										'selected'   => $v['group_id'] ,
										'options'    => $configGroup ,
									]) ,
									'<br/>' ,
									integrationTags::tdSelect([
										'field_name' => '类型:' ,
										'name'       => 'type' ,
										'selected'   => $v['type'] ,
										'options'    => $__this->logic->model_->type ,
									]) ,
								]) ,

								//状态
								integrationTags::td((function($v) use ($__this) {
									$doms = [];

									switch ($v['type'])
									{
										//array
										case '1' :
											$doms = integrationTags::tdTextarea([
												'style'    => 'width:100%' ,
												//'name'     => '' ,
												'editable' => '1' ,
												'field'    => 'value' ,
												//'reg'      => '/^\d{1,4}$/' ,
												//'msg'      => '请填写合法手机号码' ,
												'value'    => $v['value'] ,
											]);
											break;

										//text
										case '2' :
											$doms = integrationTags::tdTextarea([
												'style'    => 'width:100%' ,
												//'name'     => '' ,
												'editable' => '1' ,
												'field'    => 'value' ,
												//'reg'      => '/^\d{1,4}$/' ,
												//'msg'      => '请填写合法手机号码' ,
												'value'    => $v['value'] ,
											]);
											break;
										//switch
										case '3' :
											$doms = integrationTags::tdSwitcher([
												'params'  => [
													'checked'         => $v['value'] ? 'checked' : '' ,
													'name'            => 'value' ,
													'change_callback' => 'switcherUpdateField' ,
													//switcherUpdateFieldConfirm
												] ,
												'name'    => '' ,
												'is_auto' => '1' ,
											]);
											break;
										//option
										case '4' :

											$t = $__this->logic::makeOptionsVal($v);
											$res = [];
											foreach ($t['options'] as $k1 => $v11)
											{
												$res[$k1] = [
													'field' => $v11 ,
													'value' => $k1 ,
												];
											}

											$doms = integrationTags::tdSelect([
												//'field_name' => '分组:' ,
												'name'     => 'value' ,
												'selected' => $t['selected'] ,
												'options'  => $res ,
											]);

											break;
										//image
										case '5' :

											$doms = integrationTags::tdSimple([
												'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
													'src'             => generateProfilePicPath($v['value'] , 1) ,
													'style'           => 'height: 35px;' ,
													'class'           => 'preview-img index_pop' ,
													'data-origin-src' => generateProfilePicPath($v['value'] , 0) ,
													'data-condition'  => formatMenu(static::class , 'value' , $v['id']) ,
													'data-text'       => '修改图片' ,
												])) ,
											]);

											break;
										default :
											#...
											break;
									}

									return $doms;
								})($v)) ,


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
										//'name'     => '' ,
										'editable' => '0' ,
										'value'    => formatTime($v['time']) ,
									]) ,
								]) ,

								//is_const
								integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => $v['is_const'] ? 'checked' : '' ,
											'name'            => 'is_const' ,
											'change_callback' => 'switcherUpdateField' ,
											//switcherUpdateFieldConfirm
										] ,
										'name'    => '' ,
										'is_auto' => '1' ,
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
										] ,
										'name'    => '' ,
										'is_auto' => '1' ,
									]) ,
								]) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class'      => ' btn-success btn-edit' ,
										'value'      => '编辑' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'edit') ,
									]) ,
									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
									]) ,
								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'main_title' => '配置列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};
