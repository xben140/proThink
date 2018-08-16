<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Config extends AdminBase
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
				$this->setPageTitle('添加配置项');

				//配置组
				$configGroup = $this->logic__common_Configgroup->getActivedData();
				$configGroup = array_map(function($v) {
					return [
						'value' => $v['id'] ,
						'field' => $v['name'] ,
					];
				} , $configGroup);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::inlineRadio($configGroup , 'group_id' , '所属分组' , '所属分组' , 1) ,

						integrationTags::text([
							'field_name'  => '配置名字' ,
							'placeholder' => '请填写配置名字' ,
							'tip'         => '（必填）配置名字' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,

						integrationTags::text([
							'field_name'  => '配置键' ,
							'placeholder' => 'config函数用的键' ,
							'tip'         => '（必填）config函数用的键' ,
							//'value'       => 'value' ,
							//'attr'        => 'disabled' ,
							'name'        => 'key' ,
						]) ,

						//1:array 2:textarea
						integrationTags::inlineRadio($this->model__Common_Config->type , 'type' , '键值类型' , '<span class="red"><br>array,select 键值使用英文冒号分隔，每行一条 <br> textarea 键值没有格式要求，填入字符串即可 <br> switch 键值留空</span>' , 2) ,

						integrationTags::textarea([
							'field_name' => '值' ,
							'tip'        => '' ,
							'name'       => 'value' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,

						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '备注' ,
							'name'       => 'remark' ,
							'value'      => '' ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
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

				$this->setPageTitle('配置项编辑');
				$info = $this->logic->getInfo($this->param);

				session(URL_MODULE , $this->param['id']);

				//配置组
				$configGroup = $this->logic__common_Configgroup->getActivedData();
				$configGroup = array_map(function($v) {
					return [
						'value' => $v['id'] ,
						'field' => $v['name'] ,
					];
				} , $configGroup);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::inlineRadio($configGroup , 'group_id' , '所属分组' , '所属分组' , $info['group_id']) ,

						integrationTags::text([
							'field_name'  => '配置名字' ,
							'placeholder' => '请填写配置名字' ,
							'tip'         => '（必填）配置名字' ,
							'value'       => $info['name'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'name' ,
						]) ,


						integrationTags::text([
							'field_name'  => '配置键' ,
							'placeholder' => 'config函数用的键' ,
							'tip'         => '（必填）config函数用的键' ,
							'value'       => $info['key'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'key' ,
						]) ,

						//1:array 2:textarea
						integrationTags::inlineRadio($this->model__Common_Config->type , 'type' , '键值类型' , '<span class="red"><br>array,select 键值使用英文冒号分隔，每行一条 <br> textarea 键值没有格式要求，填入字符串即可 <br> switch 键值留空</span>' , $info['type']) ,

						integrationTags::textarea([
							'field_name' => '值' ,
							'tip'        => '' ,
							'name'       => 'value' ,
							'value'      => $info['value'] ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
						]) ,


						integrationTags::textarea([
							'field_name' => '备注' ,
							'tip'        => '备注' ,
							'name'       => 'remark' ,
							'value'      => $info['remark'] ,
							'attr'       => '' ,
							'style'      => 'width:100%;height:150px;' ,
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
		public function dataList()
		{
			$this->setPageTitle('配置列表');
			$this->initLogic();


			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							//$data = $this->logic->dataList($this->param);
							$data = $this->logic->dataListWithPagination($this->param);


							//配置组
							$configGroup = $this->logic__common_Configgroup->getActivedData();
							$configGroup = array_map(function($v) {
								return [
									'value' => $v['id'] ,
									'field' => $v['name'] ,
								];
							} , $configGroup);

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
									'attr'  => '' ,
								] ,
								[
									'field' => '值' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '备注' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '时间' ,
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
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($configGroup) {

								//配置组
								$tmp = $configGroup;
								array_unshift($tmp , [
									'value' => '-1' ,
									'field' => '全部' ,
								]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect( $tmp, 'group_id' , '配置组' , input('group_id' , '-1')) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								//类型
								$tmp = $this->model__Common_Config->type;
								array_unshift( $tmp, [
									'value' => '-1' ,
									'field' => '全部' ,
								]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect( $tmp, 'type' , '类型' , input('type' , '-1')) ,
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
											'options'    => $configGroup,
										]) ,
										'<br/>' ,
										integrationTags::tdSelect([
											'field_name' => '类型:' ,
											'name'       => 'type' ,
											'selected'   => $v['type'] ,
											'options'    => $this->model__Common_Config->type,
										]) ,
									]) ,

									//用户状态
									integrationTags::td((function($v) {

											return $v['type'] == '3' ? [
												integrationTags::tdSwitcher([
													'params'  => [
														'checked'         => $v['value'] ? 'checked' : '' ,
														'name'            => 'value' ,
														'change_callback' => 'switcherUpdateField' ,
														//switcherUpdateFieldConfirm
													] ,
													'name'    => '' ,
													'is_auto' => '1' ,
												]) ,
											] : integrationTags::tdTextarea([
												'style'    => 'width:100%' ,
												//'name'     => '' ,
												'editable' => '1' ,
												'field'    => 'value' ,
												//'reg'      => '/^\d{1,4}$/' ,
												//'msg'      => '请填写合法手机号码' ,
												'value'    => $v['value'] ,
											]) ;

										})($v)

									) ,




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
										]),
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
											'attr'  => ' btn-danger btn-delete' ,
											'value' => '删除' ,
										]) ,
									]),

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

			return $this->jump($this->logic->delete($this->param , [
				[
					function($ids) {
						//删除用户角色关联记录
						return db('user_role')->where([
								'user_id' => [
									'in' ,
									$ids ,
								] ,
							])->delete() !== false;
					} ,
					[$this->param['ids']] ,
				] ,
			]));
		}

	}


















