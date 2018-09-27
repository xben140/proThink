<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	class User extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 * @throws \Exception
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post, [
					[
						function(&$param) {
							list($param['salt'] , $param['password']) = array_values(buildPwd($param['password']));
						} ,
						[] ,
					] ,
				]));
			}
			else
			{
				$this->setPageTitle('用户添加');

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::text([
							'field_name'  => '用户名' ,
							'placeholder' => '请填写用户名' ,
							'tip'         => '（必填）用户名允许字符为字母，数字，下划线，小数点，长度6-16位' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'user' ,
						]) ,


						integrationTags::password([
							'tip'          => '（必填）密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
							'name'         => 'password' ,
							'attr'         => '' ,
							'confirm_name' => 'password_confirm' ,
							'confirm_attr' => '' ,
						] , 1) ,


						integrationTags::text([
							//随便写
							'field_name'  => '邮箱' ,
							'placeholder' => '' ,
							'tip'         => '请填写邮箱' ,
							'value'       => '' ,
							//'attr'        => 'disabled' ,
							'name'        => 'email' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '手机' ,
							'placeholder' => '' ,
							'tip'         => '请填写手机号码' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'phone' ,
						]) ,

						/*
												integrationTags::switchery([
													'isChecked'  => 'checked' ,
													//额外属性
													//'attr'       => '{if 1 == 1}checked{/if}' ,
													//随便写
													'tip'        => '是否启用' ,
													//随便写
													'field_name' => '是否启用' ,
													//表单name值
													'name'       => 'status' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,*/

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,


				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}

		/**
		 * 列表页里编辑成用户信息
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{

				$this->setPageTitle('用户编辑');
				$info = $this->logic->getInfo($this->param);

				session(URL_MODULE , $this->param['id']);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::text([
							'field_name'  => '用户名' ,
							'placeholder' => '请填写用户名' ,
							'tip'         => '' ,
							'value'       => $info['user'] ,
							'attr'        => 'disabled' ,
							'name'        => 'user' ,
						]) ,

						integrationTags::staticText([
							//'placeholder' => '' ,
							//'tip'         => '' ,
							//'attr'        => 'disabled' ,
							//'name'        => 'user' ,

							'field_name' => '用户名' ,
							'value'       => $info['user'] ,
						]) ,


						integrationTags::text([
							'field_name'  => '姓名' ,
							'placeholder' => '请填写用户名' ,
							'tip'         => '' ,
							'value'       => $info['nickname'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'nickname' ,
						]) ,

						integrationTags::text([
							//随便写
							'field_name'  => '邮箱' ,
							'placeholder' => '' ,
							'tip'         => '请填写邮箱' ,
							'value'       => $info['email'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'email' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '手机' ,
							'placeholder' => '' ,
							'tip'         => '请填写手机号码' ,
							'value'       => $info['phone'] ,
							'attr'        => '' ,
							'name'        => 'phone' ,
						]) ,
						/*

												integrationTags::switchery([
													'isChecked'  => $info['status'] == 1 ? 'checked' : '' ,
													//额外属性
													//'attr'       => '{if 1 == 1}checked{/if}' ,
													//随便写
													'tip'        => '是否启用' ,
													//随便写
													'field_name' => '是否启用' ,
													//表单name值
													'name'       => 'status' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,
						*/

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,


				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}

		/**
		 * 自己修改自己信息
		 *
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function modifyInfo()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$res = $this->logic->edit($this->param , $id);
				$this->logic->updateSessionByUsername(getAdminSessionInfo(SESSOIN_TAG_USER , 'user'));
				$this->jump($res);
			}
			else
			{
				$this->setPageTitle('修改资料');
				$id = getAdminSessionInfo(SESSOIN_TAG_USER , 'id');

				session(URL_MODULE , $id);
				$info = $this->logic->getInfo(['id' => $id ,]);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::staticText([
							//'placeholder' => '' ,
							//'tip'         => '' ,
							//'attr'        => 'disabled' ,
							//'name'        => 'user' ,

							'field_name' => '用户名' ,
							'value'       => $info['user'] ,
						]) ,

						integrationTags::text([
							'field_name'  => '姓名' ,
							'placeholder' => '请填写用户名' ,
							'tip'         => '' ,
							'value'       => $info['nickname'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'nickname' ,
						]) ,


						integrationTags::inlineRadio($this->logic::$sexMap, 'gender' , '性别' , '' , $info['gender']) ,

						integrationTags::text([
							//随便写
							'field_name'  => '邮箱' ,
							'placeholder' => '' ,
							'tip'         => '请填写邮箱' ,
							'value'       => $info['email'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'email' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '手机' ,
							'placeholder' => '' ,
							'tip'         => '请填写手机号码' ,
							'value'       => $info['phone'] ,
							'attr'        => '' ,
							'name'        => 'phone' ,
						]) ,
						/*

												integrationTags::switchery([
													'isChecked'  => $info['status'] == 1 ? 'checked' : '' ,
													//额外属性
													//'attr'       => '{if 1 == 1}checked{/if}' ,
													//随便写
													'tip'        => '是否启用' ,
													//随便写
													'field_name' => '是否启用' ,
													//表单name值
													'name'       => 'status' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,
						*/

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,


				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}


		/**
		 * 自己修改自己密码
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function modifyPwd()
		{
			if(IS_POST)
			{
				$this->initLogic();
				$this->param['id'] = getAdminSessionInfo(SESSOIN_TAG_USER , 'id');
				return $this->jump($this->logic->editPwd($this->param));
			}
			else
			{
				$this->setPageTitle('修改密码');

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::password([
							'tip'          => '（必填）密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
							'name'         => 'password' ,
							'attr'         => '' ,
							'confirm_name' => 'password_confirm' ,
							'confirm_attr' => '' ,
						] , 1) ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,

				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}

		/**
		 * 列表页里修改用户密码
		 * @return mixed
		 * @throws \ReflectionException
		 * @throws \Exception
		 */
		public function editPwd()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->editPwd($this->param));
			}
			else
			{
				$this->setPageTitle('修改密码');
				session(URL_MODULE , $this->param['id']);
				$id = session(URL_MODULE);
				$info = $this->logic->getInfo(['id' => $id ,]);


				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::staticText([
							//'placeholder' => '' ,
							//'tip'         => '' ,
							//'attr'        => 'disabled' ,
							//'name'        => 'user' ,

							'field_name' => '用户名' ,
							'value'       => $info['user'] ,
						]) ,
						integrationTags::staticText([
							//'placeholder' => '' ,
							//'tip'         => '' ,
							//'attr'        => 'disabled' ,
							//'name'        => 'user' ,

							'field_name' => '用户' ,
							'value'       => $info['nickname'] ,
						]) ,

						integrationTags::password([
							'tip'          => '（必填）密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
							'name'         => 'password' ,
							'attr'         => '' ,
							'confirm_name' => 'password_confirm' ,
							'confirm_attr' => '' ,
						] , 1) ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,

				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function dataList()
		{
			$this->setPageTitle('用户列表');

			$this->initLogic();
			$this->displayContents = integrationTags::basicFrame([
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
									'class' => 'btn-danger  btn-add' ,
									'field' => '添加数据' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add'),
								] ,
								[
									'class' => 'btn-danger  multi-op multi-op-del' ,
									'field' => '批量删除' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete'),
								] ,
								[
									'class' => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
									'field' => '批量启用' ,
								] ,
								[
									'class' => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
									'field' => '批量禁用' ,
								] ,
							],
						]),

						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							//$data = $this->logic->dataList($this->param);
							$data = $this->logic->dataListWithPagination($this->param);

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
								'assignJournalTypeMapUrl' => url('assignJournalTypeMap') ,
							]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {
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
										'value'       => (isset($this->param['pagerow']) && is_numeric($this->param['pagerow'])) ? $this->param['pagerow'] : DB_LIST_ROWS ,
										'name'        => 'pagerow' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$roles_ = $this->logic__admin_role->getFormatedData();
								$k = $roles_;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);

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
								array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRadio($k, 'status' , '状态' , input('status' , '-1')) ,

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
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,
										integrationTags::tdCheckbox((function() use ($v) {
											//是管理员id 和 自己的id不显示复选框
											return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
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
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'       => '用户名 : ' ,
											'value'      => $v['user'] ,
											'is_display' => (function() use ($v) {
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,
										'<br/>' ,

										integrationTags::tdSimple([
											'name'     => '角色 : ' ,
											'value'    => $v['role'] ,
											'editable' => 0,
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
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
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
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})(),

										]) ,
										'<br/>' ,
										integrationTags::tdSelect([
											'is_display' => 1 ,
											'name'       => 'gender' ,
											'field_name' => '性别 :' ,
											'selected'   => $v['gender'] ,
											'options'  => $this->logic::$sexMap ,
											'disabled' => (function() use ($v) {
												//是管理员id 和 自己的id不显示复选框
												return (!isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'))) ? '' : 'disabled';
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
													//是管理员id 和 自己的id不显示复选框
													return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
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
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,
										integrationTags::tdButton([
											'attr'       => ' btn-info btn-assign-role' ,
											'value'      => '用户授权' ,
											'is_display' => (function() use ($v) {
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,

										'<br>' ,

										integrationTags::tdButton([
											'attr'       => ' btn-danger btn-delete' ,
											'value'      => '删除' ,
											'is_display' => (function() use ($v) {
												//是管理员id 和 自己的id不显示复选框
												return !isGlobalManagerId($v['id']) || ($v['id'] == getAdminSessionInfo('id'));
											})() ,
										]) ,

										integrationTags::tdButton([
											'attr'       => ' btn-primary btn-assignJournalTypeMap' ,
											'value'      => '分配刊物' ,
											'is_display' => $this->logic__admin_Role->isUserHasRoles($v['id'], [3]),
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

			return $this->showPage();
		}

		public function assignRoles()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->assignRoles($this->param));
			}
			else
			{
				$this->setPageTitle('用户授权');
				session(URL_MODULE , $this->param['id']);

				//获取所有有效角色
				$roles_ = $this->logic__admin_role->getFormatedData();

				//获取当前用户有的角色
				$currRoles = $this->logic->getUserRoles($this->param);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([

						integrationTags::rowBlock([
							integrationTags::form([
								//blockCheckbox
								//inlineCheckbox
								integrationTags::blockCheckbox($roles_ , 'roles[]' , '用户角色' , '每个用户只能分配1个角色' , $currRoles) ,
								//integrationTags::blockRadio($roles_ , 'roles[]' , '用户角色' , '为用户分配角色' , isset($currRoles[0]) ? $currRoles[0] : 0) ,
							] , [
								'id'     => 'form1' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '12' ,
							'main_title' => '用户授权' ,
							'sub_title'  => '' ,
						]) ,
					]) ,

				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}


		public function assignJournalTypeMap()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->assignJournalTypeMap($this->param));
			}
			else
			{
				$this->setPageTitle('编辑分配稿件类型');
				session(URL_MODULE , $this->param['id']);

				//获取所有类型
				$journalTypes = $this->logic__Journaltype->getFormatedData();

				//获取当前用户有的类型
				$currJournalTypes = $this->logic->getUserJournalTypes($this->param);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([

						integrationTags::rowBlock([
							integrationTags::form([
								//blockCheckbox
								//inlineCheckbox
								integrationTags::blockCheckbox($journalTypes , 'roles[]' , '分配刊物' , '只能跟编辑角色分配，每个用户可分配多个刊物' , $currJournalTypes) ,
								//integrationTags::blockRadio($roles_ , 'roles[]' , '用户角色' , '为用户分配角色' , isset($currRoles[0]) ? $currRoles[0] : 0) ,
							] , [
								'id'     => 'form1' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '12' ,
							'main_title' => '分配刊物' ,
							'sub_title'  => '' ,
						]) ,
					]) ,

				] , [
					'animate_type' => 'fadeInRight' ,
				]);

				return $this->showPage();
			}
		}

	}


















