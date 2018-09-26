<?php

	namespace app\admin\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Loginlog extends AdminBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}


		public function dataList()
		{
			$this->setPageTitle('日志列表');

			$this->initLogic();
			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						integrationTags::rowButton([[
							[
								'class' => 'btn-success  search-dom-btn-1',
								'field' => '筛选',
							],
						]]),

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
									'field' => '用户信息' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '登陆信息' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '备注' ,
									'attr'  => 'style="width:150px;"' ,
								] ,
							]);

							/**
							 * 设置表分页按钮
							 */
							$_this->setPagination($data['pagination']);

							/**
							 * 设置js请求api
							 */
							$_this->setApi([]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '用户名' ,
										'value'       => input('user' , '') ,
										'name'        => 'user' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '用户' ,
										'value'       => input('nickname' , '') ,
										'name'        => 'nickname' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => 'ip' ,
										'value'       => input('ip' , '') ,
										'name'        => 'ip' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormDate([
										'field' => '登陆时间' ,

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
									] , 'order' , '排序方向' , input('order' , 'desc')) ,

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
										integrationTags::tdCheckbox(0) ,
										integrationTags::tdSimple([
											'value' => $v['id'] ,
										]) ,
									]) ,

									integrationTags::td([
										integrationTags::tdSimple([
											'value'    => $v['user'] ,
											'name'     => '用户 : ' ,
											'editable' => 0,
										]) ,
										' ',
										integrationTags::tdSimple([
											'value'    => $v['nickname'] ,
											'name'     => '用户名 : ' ,
											'editable' => 0,
										]) ,
									]) ,

									integrationTags::td([

										integrationTags::tdSimple([
											'name'     => '登陆时间 : ' ,
											'editable' => '0' ,
											'value'    => formatTime($v['time'], 1) ,
										]) ,
										' ',

										integrationTags::tdSimple([
											'value'    => $v['ip'] ,
											'name'     => '登陆Ip : ' ,
											'editable' => 0,
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
											'editable' => 0,
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


			return $this->showPage();
		}

	}
