<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Recovery extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}


		public function add()
		{
			if(IS_POST)
			{
				$this->initLogic();
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				$this->setPageTitle('角色添加');

				$this->displayContents = integrationTags::basicFrame([

					integrationTags::form([

						integrationTags::text([
							//随便写
							'field_name'  => '表名字' ,
							'placeholder' => '' ,
							'tip'         => '表标题' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							//随便写
							'field_name'  => '表名' ,
							'placeholder' => '' ,
							'tip'         => '表在数据库里的英文标识' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'tab_db' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '字段' ,
							'placeholder' => '' ,
							'tip'         => '要预览的字段，用逗号分隔，直接拼接sql用' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'field' ,
						]) ,


						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '备注' ,
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
				$this->setPageTitle('角色编辑');

				$info = $this->logic->getInfo($this->param);
				session(URL_MODULE , $this->param['id']);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::text([
							//随便写
							'field_name'  => '表名字' ,
							'placeholder' => '' ,
							'tip'         => '表标题' ,
							'value'       => $info['name'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							//随便写
							'field_name'  => '表名' ,
							'placeholder' => '' ,
							'tip'         => '表在数据库里的英文标识' ,
							'value'       => $info['tab_db'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'tab_db' ,
						]) ,


						integrationTags::text([
							//随便写
							'field_name'  => '字段' ,
							'placeholder' => '' ,
							'tip'         => '要预览的字段，用逗号分隔，直接拼接sql用' ,
							'value'       => $info['field'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'field' ,
						]) ,


						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '备注' ,
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
			$this->setPageTitle('回收站列表');

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
									'class'      => 'btn-danger  btn-add' ,
									'field'      => '添加数据' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add') ,
								] ,
								[
									'class'      => 'btn-danger  multi-op multi-op-del' ,
									'field'      => '批量删除' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
								] ,


							],
						]) ,

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
									'field' => '信息' ,
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
								'viewInfoUrl' => url('viewInfo') ,
							]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

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

									//角色名
									integrationTags::td([
										integrationTags::tdSimple([
											'value'    => $v['name'] ,
											'name'     => '表名字 : ' ,
											'field'    => 'name' ,
											'reg'      => '/^\S+$/' ,
											'msg'      => '表名字必填' ,
											'editable' => 1 ,
										]) ,
										integrationTags::tdSimple([
											'value'    => $v['tab_db'] ,
											'name'     => '表名 : ' ,
											'field'    => 'tab_db' ,
											'reg'      => '/^\S+$/' ,
											'msg'      => '表名必填' ,
											'editable' => 1 ,
										]) ,
										'<br />' ,
										integrationTags::tdSimple([
											'name'     => '字段 : ' ,
											'value'    => $v['field'] ,
											'field'    => 'field' ,
											'reg'      => '/^\S+$/' ,
											'msg'      => '字段必填' ,
											'editable' => 1 ,
										]) ,
									]) ,


									/*
																		//排序
																		integrationTags::td([
																			integrationTags::tdSimple([
																				'name'     => '' ,
																				'value'    => $v['order'] ,
																				'field'    => 'order' ,
																				'reg'      => '/^\d+$/' ,
																				'msg'      => '必须为数字，确保前后无空格' ,
																				'editable' => (function() use ($v) {
																					return ($v['id'] != GLOBAL_ADMIN_ROLE_ID);
																				})() ,
																			]) ,
																		]) ,
									*/

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
											'editable' => 1 ,
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
											'attr'       => ' btn-success btn-edit' ,
											'value'      => '编辑' ,
											'is_display' => 1,
										]) ,*/


										integrationTags::tdButton([
											'attr'       => ' btn-info btn-view-info' ,
											'value'      => '查看数据' ,
											'is_display' => 1 ,
										]) ,

										integrationTags::tdButton([
											'attr'       => ' btn-danger btn-delete' ,
											'value'      => '删除' ,
											'is_display' => 1 ,
										]) ,

									]) ,

								] , ['id' => $v['id']]);

								$doms = array_merge($doms , $t);
							}

						}) ,

					] , [
						'width'      => '12' ,
						'main_title' => '列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);


			return $this->showPage();
		}

		/**
		 * 查看每个表的数据
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function viewInfo()
		{
			$this->initLogic();
			session(SESSION_TAG_ADMIN . 'tab_id' , $this->param['id']);

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
									'class'      => 'btn-danger multi-op multi-item-delete' ,
									'field'      => '批量删除' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
								] ,
								[
									'class'      => 'btn-danger multi-op multi-item-recover' ,
									'field'      => '批量恢复' ,
									'is_display' => 1 ,
								] ,
							] ,
						]) ,

						$this->logic->getDeletedTab($this->param) ,

					] , [
						'width'      => '12' ,
						'main_title' => '列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);

			return $this->showPage();

		}

		/**
		 * 每个表数据的详细信息
		 */
		public function detailInfo()
		{
			$this->initLogic();

			$tableId = session(SESSION_TAG_ADMIN.'tab_id');
			$data= $this->logic->getDetailInfo($this->param['ids'], $tableId) ;

			return $this->jump($data);
		}


		/**
		 * 彻底删除数据
		 * 恢复数据
		 */
		public function setItem()
		{
			$this->initLogic();
			$tableId = session(SESSION_TAG_ADMIN . 'tab_id');
			$res = [];

			switch ($this->param['type'])
			{
				case 'recover' :
					$res = $this->logic->recoverItem($this->param['ids'] , $tableId);
					break;
				case 'delete' :
					$res = $this->logic->deleteItem($this->param['ids'] , $tableId);
					break;
				default :
					#...
					break;
			}

			return $this->jump($res);

		}

	}
