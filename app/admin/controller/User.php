<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class User extends AdminBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				$this->setPageTiele('用户添加');

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

				$this->setPageTiele('用户编辑');
				$info = $this->logic->getInfo($this->param);

				session(URL_MODULE , $this->param['id']);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::text([
							'field_name'  => '用户名' ,
							'placeholder' => '请填写用户名' ,
							'tip'         => '（必填）用户名允许字符为字母，数字，下划线，小数点，长度6-16位' ,
							'value'       => $info['user'] ,
							'attr'        => 'disabled' ,
							'name'        => 'user' ,
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
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function editPwd()
		{
			if(IS_POST)
			{
				$this->initLogic();
				$this->param['id'] = session(URL_MODULE);
				$this->jump($this->logic->editPwd($this->param ));
			}
			else
			{
				$this->setPageTiele('修改密码');
				session(URL_MODULE , $this->param['id']);

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
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function dataList()
		{
			$this->setPageTiele('用户列表');

			$this->initLogic();
			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							//$data = $this->logic->dataList($this->param);
							$data = $this->logic->dataListWithPagination($this->param);

							/**
							 * 设置表格头
							 */
							$_this->setHead([
								[
									'field' => '' ,
									'attr'  => 'style="width:20px;"' ,
								] ,
								[
									'field' => 'ID' ,
									//'attr'  => 'class="red"' ,
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
									'field' => 'IP' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '登陆次数' ,
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
								'deleteUrl'      => url('delete') ,
								'setFieldUrl'    => url('setField') ,
								'detailUrl'      => url('detail') ,
								'editUrl'        => url('edit') ,
								'addUrl'         => url('add') ,
								'editPwdUrl'     => url('editPwd') ,
								'assignRolesUrl' => url('assignRoles') ,
							]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

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
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRadio([
										[
											'value' => '-1' ,
											'field' => '全部' ,
										] ,
										[
											'value' => '0' ,
											'field' => static::$statusMap[0] ,
										] ,
										[
											'value' => '1' ,
											'field' => static::$statusMap[1] ,
										] ,
									] , 'status' , '状态' , input('status' , '-1')) ,

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
									]) ,

									//id
									integrationTags::td([
										integrationTags::tdSimple([
											'value' => $v['id'] ,
										]) ,
									]) ,

									//用户名
									integrationTags::td([
										integrationTags::tdSimple([
											'name'  => '用户名 : ' ,
											'value' => $v['user'] ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'     => '姓名 : ' ,
											'editable' => '1' ,
											'value'    => $v['nickname'] ,
											'field'    => 'nickname' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '请填写合法手机号码' ,
										]) ,
									]) ,

									//联系方式
									integrationTags::td([
										integrationTags::tdSimple([
											'name'  => 'email : ' ,
											//'editable' => '1' ,
											'value' => $v['email'] ,
											//'field'    => 'name' ,
											//'reg'      => '/^\d{1,4}$/' ,
											//'msg'      => '请填写合法手机号码' ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'  => '电话 : ' ,
											//'editable' => '1' ,
											'value' => $v['phone'] ,
											//'field'    => 'name' ,
											//'reg'      => '/^\d{1,4}$/' ,
											//'msg'      => '请填写合法手机号码' ,
										]) ,
									]) ,

									//时间
									integrationTags::td([
										integrationTags::tdSimple([
											'name'     => '注册时间' ,
											'editable' => '0' ,
											'value'    => date('Y-m-d H:i:s' , $v['time']) ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'     => '登陆时间' ,
											'editable' => '0' ,
											'value'    => date('Y-m-d H:i:s' , $v['last_login_time']) ,
										]) ,
									]) ,

									//IP
									integrationTags::td([
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
											'attr'  => ' btn-success btn-edit' ,
											'value' => '编辑' ,
										]) ,
										integrationTags::tdButton([
											'attr'  => ' btn-info btn-modify-pwd' ,
											'value' => '修改密码' ,
										]) ,

										integrationTags::tdButton([
											'attr'  => ' btn-info btn-assign-role' ,
											'value' => '分配角色' ,
										]) ,

										integrationTags::tdButton([
											'attr'  => ' btn-danger btn-delete' ,
											'value' => '删除' ,
										]) ,

									]) ,

								] , ['id' => $v['id']]);

								$doms = array_merge($doms , $t);
							}

						}) ,
					]) ,
				]) ,
			]);

			return $this->showPage();
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param));
		}

		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();
			$this->jump($this->logic->delete($this->param));
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
				$this->setPageTiele('分配角色');
				session(URL_MODULE, $this->param['id']);

				//获取所有有效角色
				$roles = $this->logic__common_role->getActivedData();

				//获取当前用户有的角色
				$currRoles = $this->logic->getRolesId($this->param);

				$roles_ = array_map(function($v) {
					return [
						'value' => $v['id'] ,
						'field' => $v['name'] ,
					] ;
				} , $roles);

				$this->displayContents = integrationTags::basicFrame([

					integrationTags::form([
						//blockCheckbox
						//inlineCheckbox
						integrationTags::blockCheckbox($roles_, 'roles[]' , '用户角色' , '每个用户可分配多个角色' , $currRoles) ,
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
	}


















