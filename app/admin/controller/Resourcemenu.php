<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Resourcemenu extends AdminBase
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
				$this->setPageTitle('权限添加');

				//获取可做父级的action
				$parentsMenus = $this->logic->getDefaultAction();
				$parentsMenus = makeTree($parentsMenus);

				//顶级菜单
				array_unshift($parentsMenus , [
					'id'         => '0' ,
					'name'       => '顶级菜单' ,
					'module'     => 'none' ,
					'controller' => 'none' ,
					'action'     => 'none' ,
					'level'      => '0' ,
				]);

				$availableMenus = array_map(function($v) {
					return [
						'value' => $v['id'] ,
						'field' => indentationOptionsByLevel($v['name'] . " -- " . formatMenu($v['module'] , $v['controller'] , $v['action']) , $v['level']) ,
					];
				} , $parentsMenus);


				$this->displayContents = integrationTags::basicFrame([

					integrationTags::form([

						integrationTags::singleSelect($availableMenus , 'pid' , '上级权限' , '必填' , 0) ,

						integrationTags::text([
							//随便写
							'field_name'  => '权限名字' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							//随便写
							'field_name'  => '模块名' ,
							'placeholder' => '' ,
							'tip'         => '默认为admin' ,
							'value'       => 'admin' ,
							//'attr'        => 'disabled' ,
							'name'        => 'module' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '控制器名' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => '' ,
							//'attr'        => 'disabled' ,
							'name'        => 'controller' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '方法名' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => '' ,
							//'attr'        => 'disabled' ,
							'name'        => 'action' ,
						]) ,


						integrationTags::text([
							'field_name'  => '排序' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							'value'       => '1' ,
							//'attr'        => 'disabled' ,
							'name'        => 'order' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '图标' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => 'fa-edit' ,
							//'attr'        => 'disabled' ,
							'name'        => 'ico' ,
						]) ,

						/*

												integrationTags::switchery([
													//额外属性
													//'attr'       => '' ,
													'isChecked'  => 'checked' ,
													//随便写
													'tip'        => '' ,
													//随便写
													'field_name' => '是否作为菜单显示' ,
													//表单name值
													'name'       => 'is_menu' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,

												integrationTags::switchery([
													//额外属性
													//'attr'       => '' ,
													//随便写
													'isChecked'  => '' ,
													'tip'        => '' ,
													//随便写
													'field_name' => '是否为公共方法' ,
													//表单name值
													'name'       => 'is_common' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,

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

						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '角色备注' ,
							'name'       => 'remark' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,


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
				$id = session(md5(URL_MODULE));
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				$this->setPageTitle('权限编辑');
				$info = $this->logic->getInfo($this->param);
				session(md5(URL_MODULE) , $this->param['id']);



				//获取可做父级的action
				$parentsMenus = $this->logic->getDefaultAction();
				$parentsMenus = makeTree($parentsMenus);

				//顶级菜单
				array_unshift($parentsMenus , [
					'id'         => '0' ,
					'name'       => '顶级菜单' ,
					'module'     => 'none' ,
					'controller' => 'none' ,
					'action'     => 'none' ,
					'level'      => '0' ,
				]);

				$availableMenus = array_map(function($v) {
					return [
						'value' => $v['id'] ,
						'field' => indentationOptionsByLevel($v['name'] . " -- " . formatMenu($v['module'] , $v['controller'] , $v['action']) , $v['level']) ,
					];
				} , $parentsMenus);


				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::singleSelect($availableMenus , 'pid' , '上级权限' , '必填' , $info['pid']) ,

						integrationTags::text([
							//随便写
							'field_name'  => '权限名字' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							'value'       => $info['name'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							//随便写
							'field_name'  => '模块名' ,
							'placeholder' => '' ,
							'tip'         => '默认为admin' ,
							'value'       => $info['module'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'module' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '控制器名' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => $info['controller'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'controller' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '方法名' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => $info['action'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'action' ,
						]) ,


						integrationTags::text([
							'field_name'  => '排序' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							'value'       => $info['order'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'order' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '图标' ,
							'placeholder' => '' ,
							'tip'         => '' ,
							'value'       => $info['ico'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'ico' ,
						]) ,


						/*
												integrationTags::switchery([
													//额外属性
													//'attr'       => '' ,
													'isChecked'  => $info['is_menu'] == 1 ? 'checked' : '' ,
													//随便写
													'tip'        => '' ,
													//随便写
													'field_name' => '是否作为菜单显示' ,
													//表单name值
													'name'       => 'is_menu' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,




												integrationTags::switchery([
													//额外属性
													//'attr'       => '' ,
													//随便写
													'isChecked'  => $info['is_common'] == 1 ? 'checked' : '' ,
													'tip'        => '' ,
													//随便写
													'field_name' => '是否为公共方法' ,
													//表单name值
													'name'       => 'is_common' ,
													//表单value值,$data里的字段
													'value'      => '1' ,
													//表单value对应名字,$data里的字段
													'field'      => '' ,
												]) ,

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

						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '角色备注' ,
							'name'       => 'remark' ,
							'value'      => $info['remark'] ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,


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


		public function dataList()
		{
			$this->setPageTitle('菜单列表');

			$this->initLogic();
			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							/**
							 * 不分页
							 */
							$data = $this->logic->dataList($this->param);
							$data = makeTree($data);

							/**
							 * 分页
							 * $dataWithPagination = $this->logic->dataListWithPagination($this->param);
							 * $_this->setPagination($dataWithPagination['pagination']);
							 * $data = $dataWithPagination['data'];
							 */


							/**
							 * 设置表格头
							 */
							$_this->setHead([
								[
									'field' => 'ID' ,
									'attr'  => 'style="width:80px;"' ,
								] ,
								[
									'field' => '权限名' ,
									'attr'  => 'style="width:220px;"' ,
								] ,
								[
									'field' => '模块/控制器/方法' ,
									'attr'  => 'style="width:250px;"' ,
								] ,

								[
									'field' => '图标' ,
									'attr'  => '' ,
								] ,

								[
									'field' => '排序' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '时间' ,
									'attr'  => '' ,
								] ,

								[
									'field' => '备注' ,
									'attr'  => '' ,
								] ,

								[
									'field' => '是否作为菜单' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '是否通用方法' ,
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
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

								//权限名字
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '权限名字' ,
										'value'       => input('name' , '') ,
										'name'        => 'name' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '12']);
								$doms = array_merge($doms , $t);

								//模块名
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '模块名' ,
										'value'       => input('module' , '') ,
										'name'        => 'module' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '4']);
								$doms = array_merge($doms , $t);

								//控制器名
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '控制器名' ,
										'value'       => input('controller' , '') ,
										'name'        => 'controller' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '4']);
								$doms = array_merge($doms , $t);

								//方法名
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '方法名' ,
										'value'       => input('action' , '') ,
										'name'        => 'action' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '4']);
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
											'value' => $v['id'] ,
										]) ,
									]) ,
									//权限名字
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => indentationByLevel($v['name'] , $v['level']) ,
											'field'    => 'name' ,
											'reg'      => '/^\S+$/' ,
											'msg'      => '权限名必填' ,
										]) ,
										' ' ,
									]) ,

									//路径
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => $v['module'] ,
											'field'    => 'module' ,
											'reg'      => '/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/' ,
											'msg'      => '模块名必填' ,
										]) ,
										'/' ,
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => $v['controller'] ,
											'field'    => 'controller' ,
											'reg'      => '/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/' ,
											'msg'      => '控制器名必填' ,
										]) ,
										'/' ,
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => $v['action'] ,
											'field'    => 'action' ,
											'reg'      => '/^[a-zA-Z_][a-zA-Z\d_]{0,31}$/' ,
											'msg'      => '方法名必填' ,
										]) ,
										' ' ,
									]) ,

									//图标
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => $v['ico'] ,
											'field'    => 'ico' ,
											//'reg'      => '/^$/' ,
											//'msg'      => '方法名必填' ,
										]) ,
									]) ,

									//排序
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '' ,
											'editable' => '1' ,
											'value'    => $v['order'] ,
											'field'    => 'order' ,
											'reg'      => '/^\d+$/' ,
											'msg'      => '必须为数字，确保前后无空格' ,
										]) ,
									]) ,

									//时间
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '添加时间' ,
											'editable' => '0' ,
											'value'    => date('Y-m-d H:i:s' , $v['time']) ,
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


									//是否作为菜单
									integrationTags::td([
										integrationTags::tdSwitcher([
											'params'  => [
												'checked'         => $v['is_menu'] ? 'checked' : '' ,
												'name'            => 'is_menu' ,
												'change_callback' => 'switcherUpdateField' ,
												//switcherUpdateFieldConfirm
											] ,
											'name'    => '' ,
											'is_auto' => '1' ,
										]) ,
									]) ,


									//是否通用方法
									integrationTags::td([
										integrationTags::tdSwitcher([
											'params'  => [
												'checked'         => $v['is_common'] ? 'checked' : '' ,
												'name'            => 'is_common' ,
												'change_callback' => 'switcherUpdateField' ,
												//switcherUpdateFieldConfirm
											] ,
											'name'    => '' ,
											'is_auto' => '1' ,
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
											'attr'  => ' btn-success btn-edit' ,
											'value' => '编辑' ,
										]) ,


										/*
										integrationTags::tdButton([
											'attr'  => ' btn-info btn-detail' ,
											'value' => '详细' ,
										]) ,
										*/

										integrationTags::tdButton([
											'attr'  => ' btn-danger btn-delete' ,
											'value' => '删除' ,
										]) ,

									]) ,

								] , ['id' => $v['id']]);

								$doms = array_merge($doms , $t);
							}

						}) ,
					] , [
						'width'      => '12' ,
						'main_title' => '菜单列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);

			return $this->showPage();
		}

		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param));
		}

		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param));
		}

	}
