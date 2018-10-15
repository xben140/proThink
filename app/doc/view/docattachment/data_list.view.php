<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('用户列表');

		$__this->initLogic();

		$docInfo = $__this->logic__doc->getInfo($__this->param);

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
								'class' => 'btn-danger  multi-op multi-op-del' ,
								'field' => '批量删除' ,
							] ,

						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {

						//$data = $__this->logic->dataList($__this->param);
						$data = $__this->logic->getAttachmentsByDocId($__this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:80px;"' ,
							] ,
							[
								'field' => '备注' ,
								'attr'  => 'style="width:auto;"' ,
							] ,
							[
								'field' => '添加时间' ,
								'attr'  => 'style="width:20%;"' ,
							] ,
							[
								'field' => '附件' ,
								'attr'  => 'style="width:20%;"' ,
							] ,
							[
								'field' => '操作' ,
								'attr'  => 'style="width:8%;"' ,
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
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($__this) {

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

						foreach ($data as $k => $v)
						{
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								//备注
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%;height:100px;' ,
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
										//'name'     => '登陆时间' ,
										//'editable' => '0' ,
										'value' => formatTime($v['time']) ,
									]) ,
								]) ,

								//备注
								integrationTags::td((function($v) {
									$doms = [];
									isFileExists($v['path']) && $doms = array_merge($doms , integrationTags::a($v['file_name'] , [
										'href' => url('downloadAttachment' , ['id' => $v['id']]) ,
									]));

									return $doms;
								})($v)) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class' => ' btn-danger btn-delete' ,
										'value' => '删除' ,
									]) ,
								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'main_title' => $docInfo['file_name'] . ' 的附件列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);

	};