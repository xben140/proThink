<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('模块列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
						[
							[
								'class' => 'btn-info  se-all' ,
								'field' => '全选' ,
							] ,
							[
								'class' => 'btn-info  se-rev' ,
								'field' => '反选' ,
							] ,
							[
								'is_display' => 1 ,
								'class'      => 'btn-success btn-open-pop' ,
								'field'      => '安装包管理' ,
								'data'       => [
									'src'   => url('admin/Module/packageList') ,
									'title' => '安装包管理' ,
								] ,
							] ,
						] ,
					]) ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->dataList($__this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:120px;"' ,
							] ,
							[
								'field' => '封面' ,
								'attr'  => '' ,
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
								'field' => '描述' ,
								'attr'  => 'style="width:150px;"' ,
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

						foreach ($data as $k => $v)
						{
							/**
							 * 构造tr
							 */
							if($v['is_complete'])
							{
								$t = integrationTags::tr([

									//checkbox
									integrationTags::td([
										integrationTags::tdCheckbox() ,
										integrationTags::tdSimple([
											'value' => $v['info']['id'] ,
										]) ,
									]) ,


									//封面
									//data-href="/admin/User/editProfilePic" data-text="修改头像"
									integrationTags::td([
										integrationTags::tdSimple([
											'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
												'is_display'      => 1 ,
												'src'             => $v['cover'] ,
												'data-origin-src' => $v['cover'] ,
												'text'            => '' ,
												'style'           => 'height: 65px;' ,
												'class'           => 'preview-img ' ,
											])) ,
										]) ,
									]) ,

									//信息
									integrationTags::td([
										integrationTags::tdSimple([
											'value'    => $v['info']['id'] ,
											'name'     => 'id : ' ,
											//'field'    => 'name' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '表名字必填' ,
											'editable' => 0 ,
										]) ,
										'<br />' ,
										integrationTags::tdSimple([
											'value'    => $v['info']['name'] ,
											'name'     => '应用名 : ' ,
											//'field'    => 'name' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '表名字必填' ,
											'editable' => 0 ,
										]) ,
										'<br />' ,
										integrationTags::tdSimple([
											'value'    => $v['info']['title'] ,
											'name'     => '标题 : ' ,
											//'field'    => 'name' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '表名字必填' ,
											'editable' => 0 ,
										]) ,
										'<br />' ,
										//添加时间
										integrationTags::tdSimple([
											'name'  => '更新时间 : ' ,
											//'editable' => '0' ,
											'value' => formatTime($v['info']['update_time']) ,
										]) ,
									]) ,

									//信息
									integrationTags::td([
										integrationTags::tdSimple([
											'value'    => (function($v) {
												switch ($v['is_install'])
												{
													case '0' :
														$class = 'btn-success';
														break;
													case '1' :
														$class = 'btn-info';
														break;
													case '2' :
														$class = 'btn-danger';
														break;
												}

												return '<span class="btn-xs ' . $class . '">' . $this->logic->model_::$appStatusMap[$v['is_install']]['field'] . '</span>';
											})($v) ,
											'name'     => '状态 : ' ,
											//'field'    => 'name' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '表名字必填' ,
											'editable' => 0 ,
										]) ,

									]) ,

									//描述
									integrationTags::td([
										integrationTags::tdTextarea([
											'style'    => 'width:100%;height:100%' ,
											//'name'     => 'remark' ,
											'field'    => 'description' ,
											//'reg'      => '/^\d{1,4}$/' ,
											//'msg'      => '请填写合法手机号码' ,
											'value'    => $v['info']['description'] ,
											'editable' => 0 ,
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
											'class'       => ' btn-success btn-edit' ,
											'value'      => '编辑' ,
											'is_display' => 1,
										]) ,*/

										integrationTags::tdButton([
											'value'      => '安装/卸载' ,
											'class'      => ' btn-primary btn-open-pop' ,
											'data'       => [
												'src'       => url('operation') ,
												'title'     => '安装/卸载' ,
												'is_reload' => 1 ,
											] ,
											'params'     => [
												'id' => $v['info']['id'] ,
											] ,
											'is_display' => 1 ,
										]) ,
										'<br />' ,

										integrationTags::tdButton([
											'value'      => '备份应用数据' ,
											'class'      => ' btn-info btn-open-pop' ,
											'data'       => [
												'src'   => url('backup') ,
												'title' => '备份' ,
											] ,
											'params'     => [
												'id' => $v['info']['id'] ,
											] ,
											'is_display' => 0 ,
										]) ,

										integrationTags::tdButton([
											'value'      => '备份安装包' ,
											'class'  => ' btn-success btn-custom-request' ,
											'data'       => [
												'src'   => url('backup') ,
												'title' => '备份' ,
											] ,
											'params'     => [
												'id' => $v['info']['id'] ,
											] ,
											'is_display' => 1 ,
										]) ,

										'<br />' ,

										integrationTags::tdButton([
											'class'  => ' btn-info btn-custom-request' ,
											'data'   => [
												'src' => url('setDefault') ,
											] ,
											'params' => [
												'address_id' => $v['info']['id'] ,
											] ,
											'value'  => '设为默认应用' ,
											'is_display' => 0 ,

										]) ,

										integrationTags::tdButton([
											'class'      => ' btn-danger btn-delete' ,
											'value'      => '删除应用' ,
											'is_display' => ($v['is_install'] != 1),
										]) ,
									]) ,

								] , ['id' => $v['info']['id']]);
							}
							else
							{
								$t = integrationTags::tr([

									//checkbox
									integrationTags::td([
										integrationTags::tdCheckbox() ,
										integrationTags::tdSimple([
											'value' => (isset ($v['info']) && isset($v['info']['id'])) ? $v['info']['id'] : '未定义...' ,
										]) ,
									]) ,


									//封面
									//data-href="/admin/User/editProfilePic" data-text="修改头像"
									integrationTags::td([
										integrationTags::tdSimple([
											'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
												'is_display'      => 1 ,
												'src'             => $v['cover'] ,
												'data-origin-src' => $v['cover'] ,
												'text'            => '' ,
												'style'           => 'height: 65px;' ,
												'class'           => 'preview-img ' ,
											])) ,
										]) ,
									]) ,

									//信息
									integrationTags::td((function($info) {
										return array_map(function($err) {
											return '- '.$err . '<br/>';
										} , $info['error']);
									})($v)) ,

									//信息
									integrationTags::td([
										integrationTags::tdSimple([
											'value'    => (function($v) {
												return '<span class="btn-xs btn-warning">' . $this->logic->model_::$appStatusMap[$v['is_install']]['field'] . '</span>';
											})($v) ,
											'name'     => '状态 : ' ,
											'editable' => 0 ,
										]) ,
									]) ,

									//描述
									integrationTags::td([]) ,


									//操作
									integrationTags::td([
										integrationTags::tdButton([
											'class'      => ' btn-danger btn-delete' ,
											'value'      => '删除应用' ,
											'is_display' => 1 ,
										]) ,
									]) ,

								]);

							}


							$doms = array_merge($doms , $t);
						}

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '模块列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};