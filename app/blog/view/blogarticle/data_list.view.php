<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('配置组列表');

		$__this->initLogic();
		$__this->displayContents = integrationTags::basicFrame([


			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'class'      => 'btn-success  search-dom-btn-1' ,
								'field'      => '筛选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-info  se-all' ,
								'field'      => '全选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-info  se-rev' ,
								'field'      => '反选' ,
								'is_display' => 1 ,
							] ,
							[
								'class'      => 'btn-danger  btn-add' ,
								'field'      => '添加博文' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add') ,
							] ,
							[
								'class'      => 'btn-danger  multi-op multi-op-del' ,
								'field'      => '批量删除' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
							] ,

							/*		[
										'class'      => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
										'field'      => '批量启用' ,
										'is_display' => 0 ,
									] ,
									[
										'class'      => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
										'field'      => '批量禁用' ,
										'is_display' => 0 ,
									] ,*/


							[
								'is_display' => 1 ,
								'class'      => 'btn-info btn-open-pop' ,
								'field'      => '文章类型' ,
								'data'       => [
									'src'   => url('blog/blogtype/datalist') ,
									'title' => '文章类型' ,
								] ,
							] ,
							[
								'is_display' => 1 ,
								'class'      => 'btn-info btn-open-pop' ,
								'field'      => '文章标签' ,
								'data'       => [
									'src'   => url('blog/blogtag/datalist') ,
									'title' => '文章标签' ,
								] ,
							] ,
						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$blogtype = $__this->logic__Blogtype->getFormatedData(1);

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
								'field' => '封面' ,
								'attr'  => 'style="width:auto;"' ,
							] ,
							[
								'field' => '博文信息' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '摘要' ,
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

							'setDocInfoUrl' => url('setDocInfo') ,
						]);


						/**
						 * 设置表格搜索框
						 *searchFormCol
						 */
						$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($__this) {

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


						foreach ($data['data'] as $k => $v)
						{

							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdCheckbox() ,
									integrationTags::tdSimple([
										'value'      => $v['id'] ,
										'is_display' => 1 ,
									]) ,
								]) ,

								//封面
								//data-href="/admin/User/editProfilePic" data-text="修改头像"
								integrationTags::td([
									integrationTags::tdSimple([
										'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
											'src'             => generateProfilePicPath($v['thumbnail'] , 1) ,
											'style'           => 'height: 65px;' ,
											'class'           => 'preview-img index_pop' ,
											'data-origin-src' => generateProfilePicPath($v['thumbnail'] , 0) ,
											'data-condition'  => formatMenu(get_class($__this) , 'thumbnail' , $v['id']) ,
											'data-text'       => '修改图片' ,
										])) ,
									]) ,
								]) ,

								//博文信息
								integrationTags::td([
									integrationTags::tdSimple([
										'name'  => '博文标题 : ' ,
										//'value' => sprintf("<span style='color: #00f;'>%s</span>", $v['file_name']),
										'value' => strtr("<span style='color: #00f;'>__1__</span>" , ['__1__' => $v['title'] ,]) ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '上传用户 : ' ,
										'value' => $v['uid'] ,
									]) ,
									'<br/>' ,
									integrationTags::tdSimple([
										'name'  => '上传时间 : ' ,
										'value' => formatTime($v['time'] , 1) ,
									]) ,

									'<br/>' ,

									integrationTags::tdSelect([
										'name'       => 'category' ,
										'field_name' => '稿件类型 :' ,
										'selected'   => $v['category'] ,
										'options'    => $__this->logic->model_::$articleCategory ,
										'disabled'   => 1 ,
										'is_display' => 1 ,
									]) ,

									integrationTags::tdSelect([
										'name'       => 'source_type' ,
										'field_name' => '内容来源 :' ,
										'selected'   => $v['source_type'] ,
										'options'    => $__this->logic->model_::$articleSourceType ,
										'disabled'   => 1 ,
										'is_display' => 1 ,
									]) ,
									'<br/>' ,

									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => $v['is_published'] ? 'checked' : '' ,
											'name'            => 'is_published' ,
											'change_callback' => 'switcherUpdateField' ,
											//'success_callback' => 'refresh_page' ,
											'disabled'        => '' ,
											'is_display'      => 1 ,
										] ,
										'name'    => '是否发布' ,
										'is_auto' => '1' ,
									]) ,


									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => $v['is_top'] ? 'checked' : '' ,
											'name'            => 'is_top' ,
											'change_callback' => 'switcherUpdateField' ,
											//'success_callback' => 'refresh_page' ,
											'disabled'        => '' ,
											'is_display'      => 1 ,
										] ,
										'name'    => '是否置顶' ,
										'is_auto' => '1' ,
									]) ,


								]) ,

								//摘要
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%;height:100px' ,
										//'name'     => 'remark' ,
										'editable' => 1 ,
										'field'    => 'abstruct' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['abstruct'] ,
									]) ,
								]) ,

								//操作
								integrationTags::td([

									integrationTags::tdButton([
										'class'      => ' btn-danger btn-delete' ,
										'value'      => '删除' ,
										'is_display' => 1 ,
									]) ,

									integrationTags::tdButton([
										'value'      => '预览博文' ,
										'class'      => ' btn-info btn-open-pop' ,
										'data'       => [
											'src'   => url('preview') ,
											'title' => '' ,
										] ,
										'param'      => [
											'id' => $v['id'] ,
										] ,
										'is_display' => 1 ,
									]) ,
								]) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'main_title' => '稿件列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,


		]);


	};