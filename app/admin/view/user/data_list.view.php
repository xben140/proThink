<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('用户列表');

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
								'field' => '头像' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '账户' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '联系方式' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '时间' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '登陆次数' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '状态 (允许登陆)' ,
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
							'deleteUrl'               => url('delete') ,
							'setFieldUrl'             => url('setField') ,
							'detailUrl'               => url('detail') ,
							'editUrl'                 => url('edit') ,
							'addUrl'                  => url('add') ,
							'editPwdUrl'              => url('editPwd') ,
							'assignRolesUrl'          => url('assignRoles') ,
						]);

						/**
						 * 设置表格搜索框
						 *searchFormCol
						 */
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($__this) {
							$_this->setIsDisplay(1);

							//用户账号
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '用户账号' ,
									'value'       => input('user' , '') ,
									'name'        => 'user' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//用户名
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '用户名' ,
									'value'       => input('nickname' , '') ,
									'name'        => 'nickname' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);

							//注册时间
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormDate([
									'field' => '注册时间' ,

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


							$roles_ = $__this->logic__admin_role->getFormatedData();
							$k = $roles_;
							array_unshift($k , [
								'value' => -1 ,
								'field' => '全部' ,
							]);

							//角色
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect($k , 'role_id' , '用户角色' , input('role_id' , -1)) ,
							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							//排序字段
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect([
									[
										'value' => 'id' ,
										'field' => '默认' ,
									] ,
									[
										'value' => 'last_login_time' ,
										'field' => '最后登录时间' ,
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
									integrationTags::tdSimple([
										'value'      => $v['id'] ,
										'is_display' => (function() use ($v) {
											//是管理员id不显示id
											if(isGlobalManagerId($v['id'])) return false;

											return 1;
										})() ,
									]) ,
									integrationTags::tdCheckbox((function() use ($v) {
										//管理员id 和 自己的
										if(isGlobalManagerId($v['id'])) return false;
										if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

										return true;
									})()) ,
								]) ,

								//头像
								//data-href="/admin/User/editProfilePic" data-text="修改头像"
								integrationTags::td([
									integrationTags::tdSimple([
										'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
											'src'             => generateProfilePicPath($v['profile_pic'] , 1) ,
											'style'           => 'height: 65px;' ,
											'class'           => 'preview-img index_pop' ,
											'data-origin-src' => generateProfilePicPath($v['profile_pic'] , 0) ,
											'data-condition'  => formatMenu(CONTROLLER_NAME , 'profile_pic' , $v['id']) ,
											'data-text'       => '修改图片' ,
										])) ,
									]) ,
								]) ,

								//用户名
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => '姓名 : ' ,
										'value'    => $v['nickname'] ,
										'field'    => 'nickname' ,
										//'reg'      => '/^\S+$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'editable' => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return true;

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']);
										})() ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'       => '用户名 : ' ,
										'value'      => $v['user'] ,
										'is_display' => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return true;

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']);
										})() ,
									]) ,
									'<br/>' ,

									integrationTags::tdSimple([
										'name'     => '角色 : ' ,
										'value'    => $v['role'] ,
										'editable' => 0 ,
									]) ,
								]) ,

								//联系方式
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => 'email : ' ,
										'value'    => $v['email'] ,
										'field'    => 'email' ,
										'reg'      => '/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/' ,
										'msg'      => '请填写合法email' ,
										'editable' => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return true;

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']);
										})() ,
									]) ,
									'<br>' ,
									integrationTags::tdSimple([
										'name'     => '电话 : ' ,
										'value'    => $v['phone'] ,
										'field'    => 'phone' ,
										'reg'      => '/^1\d{10}$/' ,
										'msg'      => '请填写合法手机号码' ,
										'editable' => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return true;

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']);
										})() ,

									]) ,
									'<br/>' ,
									integrationTags::tdSelect([
										'is_display' => 1 ,
										'name'       => 'gender' ,
										'field_name' => '性别 :' ,
										'selected'   => $v['gender'] ,
										'options'    => $__this->logic::$sexMap ,
										'disabled'   => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return '';

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']) ? '' : 'disabled';
										})() ,
									]) ,

								]) ,

								//时间
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => '注册时间' ,
										'editable' => '0' ,
										'value'    => formatTime($v['time']) ,
									]) ,
									'<br>' ,
									integrationTags::tdSimple([
										'name'     => '登陆时间' ,
										'editable' => '0' ,
										'value'    => formatTime($v['last_login_time']) ,
									]) ,
									'<br>' ,
									integrationTags::tdSimple([
										'name'     => '注册IP' ,
										'editable' => '0' ,
										'value'    => $v['reg_ip'] ,
									]) ,
									'<br>' ,
									integrationTags::tdSimple([
										'name'     => '登陆IP' ,
										'editable' => '0' ,
										'value'    => $v['last_login_ip'] ,
									]) ,
								]) ,


								//登陆次数
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'     => '登陆次数' ,
										'editable' => '0' ,
										'value'    => $v['login_count'] ,
									]) ,
								]) ,

								//用户状态
								integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => $v['status'] ? 'checked' : '' ,
											'disabled'        => '' ,
											'name'            => 'status' ,
											'change_callback' => 'switcherUpdateField' ,
											//switcherUpdateFieldConfirm
											//switcherUpdateField
											'is_display'      => (function() use ($v) {
												//管理员id 和 自己的
												if(isGlobalManagerId($v['id'])) return false;
												if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

												return true;
											})() ,
										] ,
										'name'    => '' ,
										'is_auto' => '1' ,

									]) ,
								]) ,

								//操作
								integrationTags::td([
									/*
									integrationTags::tdButton([
										'attr'  => ' btn-success btn-edit' ,
										'value' => '编辑' ,
									]) ,
									*/

									integrationTags::tdButton([
										'attr'       => ' btn-info btn-modify-pwd' ,
										'value'      => '修改密码' ,
										'is_display' => (function() use ($v) {
											//是管理员的话所有人名字都可以改
											if(isGlobalManager()) return true;

											//除管理员的只能自己，其他人都可以改
											return !isGlobalManagerId($v['id']);
										})() ,
									]) ,
									integrationTags::tdButton([
										'attr'       => ' btn-info btn-assign-role' ,
										'value'      => '用户授权' ,
										'is_display' => (function() use ($v) {
											//管理员id 和 自己的
											if(isGlobalManagerId($v['id'])) return false;

											return true;
										})() ,
									]) ,

									'<br>' ,

									integrationTags::tdButton([
										'attr'       => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => (function() use ($v) {
											//管理员id 和 自己的
											if(isGlobalManagerId($v['id'])) return false;
											if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

											return true;
										})() ,
									]) ,


								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'main_title' => '用户列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);

		return $__this->showPage();
	};