<?php

	namespace app\doc\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Journaltype extends DocBase
	{
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
				$this->setPageTitle('稿件类型添加');

				$this->displayContents = integrationTags::basicFrame([

					integrationTags::form([

						integrationTags::text([
							//随便写
							'field_name'  => '类型名称' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,


						integrationTags::text([
							'field_name'  => '排序' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							'value'       => '1' ,
							//'attr'        => 'disabled' ,
							'name'        => 'order' ,
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



		public function dataList()
		{
			$this->setPageTitle('稿件类型列表');

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
						]) ,
						elementsFactory::staticTable()->make(function(&$doms , $_this) {

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
									'field' => '类型名' ,
									'attr'  => 'style="width:220px;"' ,
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
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

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
											'value'    => $v['name'] ,
											'field'    => 'name' ,
											'reg'      => '/^\S+$/' ,
											'msg'      => '类型名称必填' ,
										]) ,
										' ' ,
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
											'value'    => formatTime($v['time']) ,
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
										/*

										integrationTags::tdButton([
											'attr'  => ' btn-success btn-edit' ,
											'value' => '编辑' ,
										]) ,


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
						'main_title' => '稿件类型列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);

			return $this->showPage();
		}




		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [
				[
					//当前稿件类型下还有没有稿件
					function(&$param) {
						$res = db('doc')->where([
							'journal_type'   => [
								'in' ,
								$param['ids'],
							] ,
						])->find();

						return !$res;
					} ,
					[] ,
					'当前刊物下还有稿件，不能删除'
				]
			]));
		}
	}