<?php

	namespace app\doc\controller;

	use builder\elementsFactory;
	use builder\integrationTags;

	class Docattachment extends Base
	{

		/**
		 * @return mixed
		 * @throws \LogicException
		 * @throws \ReflectionException
		 * @throws \RuntimeException
		 * @throws \Exception
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				//上传接口
				if(isset($_FILES['file']))
				{
					$res = uploadFile('file' , function($result) {
						//附件信息
						session(md5(URL_MODULE.'attachment') , json_encode($result));
						return $result;
					});

					return json($res);
				}else
				{
					//保存

					$id = session(md5(URL_MODULE.'id'));
					//附件信息
					$attachment = json_decode(session(md5(URL_MODULE.'attachment')), 1);

					$t = $this->logic->add([
						'doc_id'    => $id ,
						'path'      => $attachment ? $attachment['savename'] : '' ,
						'file_name' => $attachment ? $attachment['name'] : '' ,
						'remark'    => $this->param['remark'] ,
						'status'    => 1 ,
					]);

					return $this->jump($t);
				}
			}
			else
			{
				$this->setPageTitle('上传附件');

				//附件信息
				session(md5(URL_MODULE.'attachment') , null);

				//id
				session(md5(URL_MODULE.'id') , $this->param['id']);
				$docInfo = $this->logic__doc->getInfo($this->param);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '继续上传' ,
										'attr'  => 'onclick="location.reload()"' ,
									] ,
								],
							]),


							integrationTags::form([

								integrationTags::staticText([
									//随便写
									'field_name'  => '' ,
									'value'       => $docInfo['file_name'] .' 的附件',
								]) ,

								integrationTags::textarea([
									//随便写
									'field_name'  => '备注' ,
									'placeholder' => '' ,
									'tip'         => '必填' ,
									//'value'       => '',
									//'attr'        => 'disabled' ,
									'name'        => 'remark' ,
								]) ,


								integrationTags::upload(SINGLE_FILE, [
									[
										'title' => '上传须知' ,
										'items' => [
											'单个文件最大50M' ,
											'如有附件则上传，没有附件则无需上传' ,
											'备注必须填写，填写以后点击提交，如果上传附件后没有提交，记录将不会保存至服务器' ,
											//'允许的上传格式有.doc .docx .wps' ,
										] ,
									] ,
								], [
									'beforeFileQueued' => /** @lang javascript */
										<<<'AAA'
	function (file) {
		var subject = $.trim(file.name);
	}
AAA
									,

									'uploadSuccess' => /** @lang javascript */
										<<<'AAA'
			function (file, response) {
				console.dir(response)
		
				if (response.is_finished == 1)
				{
					$(".status-box-text").text('上传成功');
				}
				else
				{
					//分片上传完成
				}
			}
AAA
									,


									'uploadFinished' => /** @lang javascript */
										<<<'AAA'
	function () {
		layer.msg('文件上传完成');
	}
AAA
									,
								] , [
									'server'  => "'" . url('add') . "'" ,
									'threads' => 10 ,
									'accept'  => json_encode([
										'extensions' => '*' ,
										'mimeTypes' => '*' ,
									]) ,
								]) ,

							] , [
								'id'     => 'form1' ,
								'method' => 'post' ,
								'action' => url() ,
							], [

								'success' => /** @lang javascript */
									<<<'AAA'
function (responseText, statusText) {
	_this.find('button:submit').attr("disabled", false);
	layer.close(loadIndex)
	layer.msg(responseText.msg);	
}
AAA
								,
							]) ,



						] , [
							'width'      => '12' ,
							'main_title' => '上传稿件' ,
							'sub_title'  => '' ,
						]) ,
					]) ,
				] , [
					'animate_type' => 'fadeInRight' ,
				]);


				return $this->showPage();
			}
		}


		public function dataList()
		{
			$this->setPageTitle('用户列表');

			$this->initLogic();

			$docInfo = $this->logic__doc->getInfo($this->param);

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
									'class' => 'btn-danger  multi-op multi-op-del' ,
									'field' => '批量删除' ,
								] ,

							],
						]),

						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							//$data = $this->logic->dataList($this->param);
							$data = $this->logic->getAttachmentsByDocId($this->param);

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
								'deleteUrl'                    => url('delete') ,
								'setFieldUrl'                  => url('setField') ,
								'detailUrl'                    => url('detail') ,
								'editUrl'                      => url('edit') ,
								'addUrl'                       => url('add') ,
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
								$k = static::$statusMap;
								array_pop($k);
								array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRadio($k, 'status' , '状态' , input('status' , '-1')) ,

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
											'value'    => formatTime($v['time']) ,
										]) ,
									]) ,

									//备注
									integrationTags::td((function($v) {
										$doms = [];
										isFileExists($v['path']) && $doms = array_merge($doms , integrationTags::a($v['file_name'] , [
											'href' => url('downloadAttachment', ['id' => $v['id']]),
										]));

										return $doms;
									})($v)) ,

									//操作
									integrationTags::td([
										integrationTags::tdButton([
											'attr'  => ' btn-danger btn-delete' ,
											'value' => '删除' ,
										])
									]) ,

								] , ['id' => $v['id']]);

								$doms = array_merge($doms , $t);
							}

						}) ,
					] , [
						'main_title' => $docInfo['file_name'] .' 的附件列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);

			return $this->showPage();
		}

		public function downloadAttachment()
		{
			$this->initLogic();
			$docInfo = $this->logic->getInfo($this->param);
			downloadFile( makeFilePath($docInfo['path'] ) , $docInfo['file_name'] );
		}


		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				/*
								[
									////////////////////////////////
									/// 放置回收站
									////////////////////////////////

									function(&$param) {
										//删除对应附件
										$data = $this->logic->getAttachmentsByIds($param);
										foreach ($data as $k => $v) delFile($v['path']);

										return true;
									} ,
									[] ,
								] ,
				*/
				[
					////////////////////////////////
					/// 放置回收站
					////////////////////////////////

					function(&$param) {
						$res = true;
						//删除对应附件
						$data = $this->logic->getAttachmentsByIds($param);
						foreach ($data as $k => $v)
						{
							$docInfo = $this->logic__doc->getInfo(['id' => $v['doc_id'] ]);
							if(in_array($docInfo['doc_status'] , [10]))
							{
								$res = false;
								break;
							}
							else
							{
								delFile($v['path']);
							}
						}

						return $res;
					} ,
					[] ,
					'稿件已经为完成状态，附件不允许删除'
				] ,

			]));
		}


	}