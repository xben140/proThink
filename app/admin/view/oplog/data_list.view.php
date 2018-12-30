<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('日志列表');

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
								'class'      => 'btn-danger  multi-op multi-op-del' ,
								'field'      => '批量删除' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
							] ,
							[
								'class'      => ' btn-info btn-custom-request' ,
								'data'       => [
									'src'        => url('Oplog/syncLog') ,
									'is_reload'  => 1 ,
									'is_confirm' => 0 ,
									'is_alert'   => 0 ,
									'msg'        => '确认将日志同步至数据库？' ,
								] ,
								'params'     => [] ,
								'field'      => '同步日志' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , 'Oplog' , 'syncLog') ,
							] ,
						] ,
					]) ,
					'<p>出于性能考虑，每次请求会将日志写入日志文件，位于 ' . $__this->logic::$logPath . '</p>' ,
					'<p>同步日志 会将此文件里的日志写入数据库之后清空文件</p>' ,
					'<p>所以要查看最新的日志信息，必须先进行 同步日志 操作</p>' ,

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
								'field' => '信息' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '' ,
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
						]);

						/**
						 * 设置表格搜索框
						 *searchFormCol
						 */
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($__this) {

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '用户账号' ,
									'value'       => input('user' , '') ,
									'name'        => 'user' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '用户昵称' ,
									'value'       => input('nickname' , '') ,
									'name'        => 'nickname' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => 'IP' ,
									'value'       => input('ip' , '') ,
									'name'        => 'ip' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '模块(应用)' ,
									'value'       => input('module' , '') ,
									'name'        => 'module' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '控制器' ,
									'value'       => input('controller' , '') ,
									'name'        => 'controller' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '方法' ,
									'value'       => input('action' , '') ,
									'name'        => 'action' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);

							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '参数包含' ,
									'value'       => input('params' , '') ,
									'name'        => 'params' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '请求方法' ,
									'value'       => input('method' , '') ,
									'name'        => 'method' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormText([
									'field'       => '备注' ,
									'value'       => input('remark' , '') ,
									'name'        => 'remark' ,
									'placeholder' => '' ,
								]) ,
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);



							//状态
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormRadio([
									[
										'value' => '-1' ,
										'field' => '全部' ,
									] ,
									[
										'value' => '1' ,
										'field' => '是' ,
									] ,
									[
										'value' => '0' ,
										'field' => '不是' ,
									] ,
								] , 'is_ajax' , '是否AJAX' , input('is_ajax' , '-1')) ,

							] , ['col' => '6']);
							$doms = array_merge($doms , $t);


							$t = integrationTags::searchFormCol([
								integrationTags::searchFormDate([
									'field' => '访问时间' ,

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
							] , ['col' => '4']);
							$doms = array_merge($doms , $t);

							//排序字段
							$t = integrationTags::searchFormCol([
								integrationTags::searchFormSelect([
									[
										'value' => 'id' ,
										'field' => '默认' ,
									] ,
								] , 'order_filed' , '排序字段' , input('order_filed' , 'id')) ,
							] , ['col' => '4']);
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

							] , ['col' => '4']);
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
									integrationTags::tdCheckbox(1) ,
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => $v['user'] ,
										'name'    =>strtr("<span style='color: #2434ff;'>__1__</span>" , ['__1__' => '用户 : ' ,]),
										'editable' => 0 ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'value'    => $v['nickname'] ,
										'name'     => '用户名 : ' ,
										'editable' => 0 ,
									]) ,
									'</br>' ,

									integrationTags::tdSimple([
										'value'    => $v['exe_time'] ,
										'name'     => '耗时 : ' ,
										'editable' => 0 ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'value'    => formatBytes($v['exe_memory']) ,
										'name'     => '耗内存 : ' ,
										'editable' => 0 ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'value'    => formatTime($v['time'] ),
										'name'     => '时间 : ' ,
										'editable' => 0 ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'value'    => implode('/' , [
											$v['module'] ,
											$v['controller'] ,
											$v['action'] ,
										]) ,
										'name'     => '路由 : ' ,
										'editable' => 0 ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'name'     => '方法 : ' ,
										'editable' => '0' ,
										'value'    => $v['method'] ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'name'     => '是否 AJAX : ' ,
										'editable' => '0' ,
										'value'    => $v['is_ajax'] ? '<span style="color: #00f">是</span>' : '<span style="color: #f00">否</span>' ,
									]) ,
									'</br>' ,
									integrationTags::tdSimple([
										'value'    => $v['ip'] ,
										'name'     => '客户端 IP : ' ,
										'editable' => 0 ,
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
										'editable' => 0 ,
									]) ,
								]) ,

								//操作
								integrationTags::td([
									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
									]) ,


									integrationTags::tdButton([
										'class'      => ' btn-info btn-open-pop' ,
										'data'       => [
											'src'   => url('detail') ,
											'title' => '详细信息' ,
										] ,
										'params'     => [
											'id' => $v['id'] ,
										] ,
										'value'      => '详细信息' ,
										'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'detail') ,

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


	};