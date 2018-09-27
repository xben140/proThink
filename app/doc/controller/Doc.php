<?php

	namespace app\doc\controller;

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	class Doc extends DocBase
	{
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadFile('file' , function($result) {
					$returnData = [];
					$isAlreadyUploaded = $this->logic->fileExistsByHash($result['hash']);

					if(!$isAlreadyUploaded)
					{
						//1p巩淑芳--基建档案在高校建设中的作用及管理策略分析  .docx
						$result['name'] = strtr($result['name'], [
							'P' => 'p' ,
							'Ｐ' => 'p' ,
							' ' => '' ,
							'　' => '' ,
						]);
						preg_match_all('/^(\d+(?:\.\d+)?)p[\s-]*([^-\s]+)(?:(?=\s*-)[\s-]+)([^.\s]+)\.(?:docx?|wps)$/im', $result['name'], $metaInfo);

						$title = $metaInfo[3][0];
						$author = $metaInfo[2][0];
						$page = $metaInfo[1][0];
						$t = $this->logic->add([
							'title'     => $title ,
							'uid'       => getAdminSessionInfo(SESSOIN_TAG_USER , 'id') ,
							'file_name' => $page . 'P--' . $author . '--' . $title . '.' . $result['extension'] ,
							'author'    => $author ,
							'path'      => $result['savename'] ,
							'ext'       => $result['extension'] ,
							'hash'      => $result['hash'] ,
							'page'      => $page ,
							'status'    => 1 ,
						]);

						$returnData = $t ? [
							'sign' => '1',
							'msg' => '添加成功',
						] : [
							'sign' => '0',
							'msg' => '添加失败，稍后重试',
						];
					}
					else
					{
						//文件上传过
						$returnData =  [
							'sign' => '2',
							'msg' => '文件已经上传过，已被忽略',
						];
					}
					$returnData['is_finished'] = $result['is_finished'];
					return $returnData;
				});

				return json($res);
			}
			else
			{
				$this->setPageTitle('稿件类型添加');

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '继续上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),

							integrationTags::upload(MULTI_FILE, [
								[
									'title' => '上传须知' ,
									'items' => [
										'单次最多添加300个文档' ,
										'单个文档最大50M' ,
										'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
										'允许的上传格式有.doc .docx .wps' ,
									] ,
								] ,
								[
									'title' => '命名规则（添加文档时如果弹出提示框，请对比下面的命名示例，仔细阅读此提示）' ,
									'items' => [
										'文档名字开头必须为数字，即版数，可为小数或者整数，后面紧跟半角字母 P ，P不区分大小写，上传后此数字用于统计版数' ,
										'字母P后面紧跟 - 符号或者作者名字' ,
										'符号后面紧跟作者名字，多个作者名字用 & 符号分隔，不能用空格分隔，作者名字之间不能有空格，作者名字为两个字的需特别注意此情况' ,
										'作者名字后面紧跟 - 符号，符号允许一个或者多个' ,
										'符号后面紧跟文档标题，文档标题可以是除空格外的任意字符' ,
										'文档标题后紧跟文档后缀，允许上传的文档后缀为 .doc .docx .wps 三种格式' ,
									] ,
								] ,
								[
									'title' => '命名示例（作者名字和文档名之间必须有最少一个 - 符号连接，否则将无法区分作者名和文档名）' ,
									'items' => [
										'1P--马玲--大众传播对少数民族地区青少年世界观影响的调查与思考.docx' ,
										'1p-郑洪峰&郑洪峰-- 油田社区物业管理标准化和规范化策略探究.docx' ,
										'1.5p - - 郑洪峰&郑洪峰&郑洪峰 - - 油田社区物业管理标准化和规范化策略探究.doc' ,
										'1.0P郑洪峰-油田社区物业管理标准化和规范化策略探究.wps' ,
									] ,
								] ,
							], [
								'beforeFileQueued' => /** @lang javascript */
								<<<'AAA'
function (file) {
	var subject = $.trim(file.name);
	
	if (!/^(\d+(?:\.\d+)?)p[\s-]*([^-\s]+)(?:(?=\s*-)[\s-]+)([^.\r\n]+)\.(?:docx?|wps)$/im.test(subject)) 
	{
		layer.open({
			type     : 1
			, title  : '此文件命名不规范,将不会添加到上传队列'
			, area   : ['390px', '210px']
			, shade  : 0
			, skin: 'layui-layer-molv' //样式类名
			, icon:1
			, offset : [ //为了演示，随机坐标
				Math.random() * ($(window).height() - 400)
				, Math.random() * ($(window).width() - 400)
			]
			, maxmin : true
			, content: '<div class="error_remind">' +
			'<span style="color: #f00;font-weight:bold" >' + file.name + ' </span> ' +
			'<span>确保字母p为半角</span>' +
			'<span>确保字母p和作者名之间至少有一个 - 符号</span>' +
			'<span>确保作者名和文档标题之间至少有一个 - 符号</span>' +
			'<span>确保文档标题里不包含空格</span>' +
			'<span>确保文档名后缀为 .docx </span>' +
			'</div>'

/*
			 , btn    : ['继续弹出', '全部关闭'] //只是为了演示
			 , yes    : function ()
			 {
			 $(that).click(); //此处只是为了演示，实际使用可以剔除
			 }
			 , btn2   : function ()
			 {
			 layer.closeAll();
			 }
*/

			, zIndex : layer.zIndex //重点1
			, success: function (layero)
			{
				layer.setTop(layero); //重点2
			}
		});

		return false;
	}
	
}
AAA
								,

								'uploadSuccess' => /** @lang javascript */
								<<<'AAA'
		function (file, response) {

			let map = [
				'upload-status-failure',
				'upload-status-success',
				'upload-status-uploaded',
			];
			var oLi = $('#' + file.id);
			
			if (response.is_finished == 1)
			{
				oLi.append('<span class="upload-status '+map[response.sign]+'" >'+response.msg+'</span>');
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
	layer.alert('全部文件处理完成');
}
AAA
								,
							] , [
								'server'  => "'" . url('add') . "'" ,
								'threads' => 10 ,
								'accept'  => json_encode([
									'extensions' => 'doc,docx,wps' ,
									'mimeTypes' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
								]) ,
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

		public function setDocInfo()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$ids = session(md5(URL_MODULE));
				$this->param['ids'] = $ids;

				return $this->jump($this->logic->updateField($this->param , [
					[
						function($param) {
							$res = true;
							switch ($param['field'])
							{
								case 'deposit' :
								case 'final_payment' :
									$res = !!preg_match('/^\d+(\.\d{1,2})?$/im' , $param['val']);
									break;
								default :

									break;
							}

							return $res;
						} ,
						[$this->param] ,
						'请输入正确格式的价格',
					] ,
				]));
			}
			else
			{
				$this->setPageTitle('批量设置稿件信息');

				session(md5(URL_MODULE) , $this->param['ids']);

				//获取所有类型
				$journalTypes = $this->logic__Journaltype->getFormatedData();


				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([

						integrationTags::rowBlock([
							integrationTags::form([

								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'journal_type' ,
								]) ,
								integrationTags::inlineRadio($journalTypes , 'val' , '') ,

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
							'width'      => '4' ,
							'main_title' => '刊物类型' ,
							'sub_title'  => '' ,
						]) ,

						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'journal_name' ,
								]) ,
								integrationTags::text([
									//随便写
									'field_name'  => '' ,
									'placeholder' => '' ,
									'tip'         => '必填' ,
									//'value'       => '',
									//'attr'        => 'disabled' ,
									'name'        => 'val' ,
								]) ,
							] , [
								'id'     => 'form2' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '刊物名' ,
							'sub_title'  => '' ,
						]) ,


						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'doc_type' ,
								]) ,
								integrationTags::inlineRadio($this->logic->model_::$docTypeMap , 'val' , '') ,
							] , [
								'id'     => 'form7' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '稿件类型' ,
							'sub_title'  => '' ,
						]) ,

						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'year' ,
								]) ,
								integrationTags::inlineRadio(static::$yearMap , 'val' , '') ,

							] , [
								'id'     => 'form3' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '年份' ,
							'sub_title'  => '' ,
						]) ,


						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'month' ,
								]) ,
								integrationTags::inlineRadio(static::$monthMap , 'val' , '') ,
							] , [
								'id'     => 'form4' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '月份' ,
							'sub_title'  => '' ,
						]) ,


						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'deposit' ,
								]) ,
								integrationTags::text([
									//随便写
									'field_name'  => '' ,
									'placeholder' => '' ,
									'tip'         => '必填' ,
									//'value'       => '',
									//'attr'        => 'disabled' ,
									'name'        => 'val' ,
								]) ,
							] , [
								'id'     => 'form5' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '定金' ,
							'sub_title'  => '' ,
						]) ,


						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'final_payment' ,
								]) ,
								integrationTags::text([
									//随便写
									'field_name'  => '' ,
									'placeholder' => '' ,
									'tip'         => '必填' ,
									//'value'       => '',
									//'attr'        => 'disabled' ,
									'name'        => 'val' ,
								]) ,
							] , [
								'id'     => 'form6' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '尾款' ,
							'sub_title'  => '' ,
						]) ,



						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'doc_status' ,
								]) ,
								integrationTags::inlineRadio($this->logic->model_::$docStatusMap , 'val' , '') ,
							] , [
								'id'     => 'form9' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '设置状态' ,
							'sub_title'  => '' ,
						]) ,



						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'is_confirm' ,
								]) ,
								integrationTags::inlineRadio([
									[
										'value' => '0' ,
										'field' => '设为未确认' ,
									] ,
									[
										'value' => '1' ,
										'field' => '设为确认' ,
									],
								] , 'val' , '') ,
							] , [
								'id'     => 'form10' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '信息确认' ,
							'sub_title'  => '' ,
						]) ,

/*

						integrationTags::rowBlock([
							integrationTags::form([
								integrationTags::hidden([
									'name'  => 'field' ,
									'value' => 'arrange_time' ,
								]) ,

								integrationTags::singleDate([
									'field_name'  => '' ,
									'name'        => 'val' ,
									'value'       => '' ,
									'is_time'     => '1' ,
									'placeholder' => '点击选时间' ,
								]) ,

							] , [
								'id'     => 'form888' ,
								'method' => 'post' ,
								'action' => url() ,
							]) ,
						] , [
							'width'      => '4' ,
							'main_title' => '安排时间' ,
							'sub_title'  => '' ,
						]) ,
*/

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
				$id = session(md5(URL_MODULE)) ? session(md5(URL_MODULE)) : $this->param['ids'];
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				$this->setPageTitle('权限编辑');
				$info = $this->logic->getInfo($this->param);
				session(md5(URL_MODULE) , $this->param['id']);

				//获取所有类型
				$journalTypes = $this->logic__Journaltype->getFormatedData(1);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::form([

						integrationTags::inlineRadio($journalTypes , 'journal_type' , '刊物类型' , '必填' , $info['journal_type']) ,

						integrationTags::inlineRadio(static::$yearMap , 'year' , '年份' , '必填' , $info['year']) ,

						integrationTags::inlineRadio(static::$monthMap, 'month' , '月份' , '必填' , $info['month']) ,

						integrationTags::text([
							//随便写
							'field_name'  => '刊物名' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							'value'       => $info['journal_name'] ,
							//'attr'        => 'disabled' ,
							'name'        => 'journal_name' ,
						]) ,

						integrationTags::singleDate([
							'field_name'  => '安排时间' ,
							'name'        => 'arrange_time' ,
							'value'       =>  formatTime($info['arrange_time']) ,
							'is_time'     => '1' ,
							'placeholder' => '点击选时间' ,
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
			$this->setPageTitle('稿件列表');
			$this->initLogic();

			/**
			 * ******************************************************************
			 *        视图分配机制设置
			 * ******************************************************************
			 */

			$this->viewClass->autoRegisterTagMarkArray([
				[
					//状态
					'key'   => 'VIEW_ASSIGE_TAG_STATUS' ,
					'label' => '2' ,
					'value' => array_map(function($data) {
						return [
							'id'   => $data['value'] ,
							'name' => $data['field'] ,
						];
					} , $this->logic->model_::$docStatusMap) ,
				] ,
				[
					//是否确认
					'key'   => 'VIEW_ASSIGE_TAG_IS_CONFIRM' ,
					'label' => '3' ,
					'value' => array_map(function($data) {
						return [
							'id'   => $data['value'] ,
							'name' => $data['field'] ,
						];
					} , $this->logic->model_::$docIsconfirmMap) ,
				] ,
			]);


			//注册元素标识
			$this->viewClass->registerElementsMark([
				//年
				'VIEW_ASSIGE_ELEMENTS_year'               => '1' ,
				//月
				'VIEW_ASSIGE_ELEMENTS_month'              => '2' ,
				//定金
				'VIEW_ASSIGE_ELEMENTS_deposit'            => '3' ,
				//尾款
				'VIEW_ASSIGE_ELEMENTS_final_payment'      => '4' ,
				//刊物类型
				'VIEW_ASSIGE_ELEMENTS_journal_type'       => '5' ,
				//稿件类型
				'VIEW_ASSIGE_ELEMENTS_doc_type'           => '6' ,
				//刊物名
				'VIEW_ASSIGE_ELEMENTS_journal_name'       => '7' ,
				//是否确认
				'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '8' ,
				//上传附件按钮
				'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '9' ,
				//预览附件按钮
				'VIEW_ASSIGE_ELEMENTS_preview_attachment' => 'a' ,
				//删除稿件按钮
				'VIEW_ASSIGE_ELEMENTS_delete'             => 'b' ,
				//稿件状态
				'VIEW_ASSIGE_ELEMENTS_doc_status'         => 'c' ,

				//设置为待定按钮
				'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => 'e' ,
			]);


			//设置当前uri
			$this->viewClass->setCurrentUri($this->currentUri);


			$a = $this->viewClass::getGroupTag($this->viewClass::$tagMap);
			$a = $this->viewClass->getTagMapMark('VIEW_ASSIGE_TAG_ROLE');

			//$a = $this->viewClass->getProperties();
			//var_export($a);
			//exit();


			/**
			 * ******************************************************************
			 *    //    视图分配机制设置
			 * ******************************************************************
			 */

			$this->displayContents = integrationTags::basicFrame([
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
									'class'      => 'btn-primary  multi-op multi-set-info' ,
									'field'      => '批量设置信息' ,
									'is_display' => 1 ,
								] ,
								[
									'class'      => 'btn-danger  btn-add' ,
									'field'      => '上传稿件' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'add') ,
								] ,
								[
									'class'      => 'btn-danger  multi-op multi-op-del' ,
									'field'      => '批量删除' ,
									'is_display' => $this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
								] ,
								[
									'class'      => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
									'field'      => '批量启用' ,
									'is_display' => 0 ,
								] ,
								[
									'class'      => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
									'field'      => '批量禁用' ,
									'is_display' => 0 ,
								] ,
								[
									'class'      => 'btn-warning btn-open-window' ,
									'field'      => '导出execl ( 按当前查询条件 )' ,
									'is_display' => $this->authClass->hasRoleByIds([1,2,3])  ,
									'src'        => url('exportExecl') ,
									'title'      => '导出execl ( 按当前查询条件 )' ,
								] ,
							] ,
						]) ,

						elementsFactory::staticTable()->make(function(&$doms , $_this) {
							$journalTypes = [];

							//角色机制注册
							$this->registerRoleEvent([
								[
									//管理员和全站管理
									'roles'    => [
										1 ,
										2,
									] ,
									'callback' => function()use(&$journalTypes) {
										$journalTypes = $this->logic__Journaltype->getFormatedData(1);
									} ,
									'params'   => [] ,
								] ,
								[
									//采编
									'roles'    => [4] ,
									'callback' => function() use(&$journalTypes) {
										//编辑获取指定
										$this->param['uid'] = $this->adminInfo['id'];
										$journalTypes = $this->logic__Journaltype->getFormatedData(1);
									} ,
									'params'   => [] ,
								] ,
								[
									//编辑
									'roles'    => [3] ,
									'callback' => function() use(&$journalTypes) {
										//采编获取所有类型
										$journalTypes = $this->logic__Journaltype->getUserHasType(getAdminSessionInfo('user' , 'id'));
										//$this->param['is_confirm'] = 1;
									} ,
									'params'   => [] ,
								] ,
							]);

							//$data = $this->logic->dataList($this->param);

							//查询条件写入session
							$this->logic->updateSession('exportExecl_condition', $this->param);
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
									'field' => '稿件信息' ,
									'attr'  => 'style="width:auto;"' ,
								] ,
								[
									'field' => '稿件状态' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '采编备注' ,
									'attr'  => 'style="width:120px;"' ,
								] ,
								[
									'field' => '编辑备注' ,
									'attr'  => 'style="width:120px;"' ,
								] ,
								[
									'field' => '稿件状态' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '信息确认' ,
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
								'deleteUrl'     => url('delete') ,
								'setFieldUrl'   => url('setField') ,
								'detailUrl'     => url('detail') ,
								'editUrl'       => url('edit') ,
								'addUrl'        => url('add') ,
								'setDocInfoUrl' => url('setDocInfo') ,

								'replaceDocUrl'    => url('replaceDoc') ,
								'assignAddressUrl' => url('assignAddress') ,

								'registerUploadAttachmentUrl'  => url('doc/Docattachment/add') ,
								'registerPreviewAttachmentUrl' => url('doc/Docattachment/dataList') ,
							]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) use ($journalTypes) {

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '文档标题' ,
										'value'       => input('title' , '') ,
										'name'        => 'title' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '文档作者' ,
										'value'       => input('author' , '') ,
										'name'        => 'author' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '上传用户' ,
										'value'       => input('nickname' , '') ,
										'name'        => 'nickname' ,
										'placeholder' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRange([
										'field' => '文档P数' ,

										'name1'        => 'start_p' ,
										'value1'       => input('start_p' , '') ,
										'placeholder1' => '' ,

										'name2'        => 'end_p' ,
										'value2'       => input('end_p' , '') ,
										'placeholder2' => '' ,
									]) ,

								] , ['col' => '6']);
								$doms = array_merge($doms , $t);

								//注册时间
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormDate([
										'field' => '上传时间' ,

										'value1'       => input('reg_time_begin' , '') ,
										'name1'        => 'reg_time_begin' ,
										'placeholder1' => '' ,

										'value2'       => input('reg_time_end' , '') ,
										'name2'        => 'reg_time_end' ,
										'placeholder2' => '' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$k = static::$yearMap;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k, 'year' , '安排年份' , input('year' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);


								$k = static::$monthMap;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k, 'month' , '安排月份' , input('month' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);


								$k = $this->logic->model_::$docTypeMap;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k , 'doc_type' , '稿件类型' , input('doc_type' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);


								$k = $journalTypes;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k , 'journal_type' , '刊物类型' , input('journal_type' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);


								$k = $this->logic->model_::$docStatusMap;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k , 'doc_status' , '稿件状态' , input('doc_status' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);


								$k =  $this->logic->model_::$docPreStatus;array_unshift($k , ['value' => -1 , 'field' => '全部' ,]);
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k, 'is_pending' , '处理状态' , input('is_pending' , -1)) ,
								] , ['col' => '3']);
								$doms = array_merge($doms , $t);



								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '刊物名' ,
										'value'       => input('journal_name' , '') ,
										'name'        => 'journal_name' ,
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
											'field' => '否' ,
										] ,
									] , 'is_confirm' , '确认信息' , input('is_confirm' , -1)) ,

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
									] , 'order' , '排序方向' , input('order' , 'asc')) ,

								] , ['col' => '4']);
								$doms = array_merge($doms , $t);

							});

							$_this->setSearchForm($searchForm);

							foreach ($data['data'] as $k => $v)
							{
								//设置当前状态
								$this->viewClass->setStatus([
									'VIEW_ASSIGE_TAG_ROLE'       => $this->authClass->getRoleByIds()[0] ,
									'VIEW_ASSIGE_TAG_IS_CONFIRM' => $v['is_confirm'] ,
									'VIEW_ASSIGE_TAG_STATUS'     => $v['doc_status'] ,
								]);

								//$a = $this->viewClass->checkRule( 'VIEW_ASSIGE_ELEMENTS_ID', 'is_display');
								$a = $this->viewClass->getProperties();
								//var_export($a);exit();

								$t = integrationTags::tr([

									//checkbox
									integrationTags::td([
										integrationTags::tdCheckbox(!$v['is_confirm'] ) ,
										integrationTags::tdSimple([
											'value'      => $v['id'] ,
											'is_display' => 1 ,
										]) ,
									]) ,

									//稿件信息
									integrationTags::td([
										integrationTags::tdSimple([
											'name'  => '文档名字 : ' ,
											//'value' => sprintf("<span style='color: #00f;'>%s</span>", $v['file_name']),
											'value' => strtr("<span style='color: #00f;'>__1__</span>" , ['__1__' => $v['file_name'] ,]) ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'  => '上传用户 : ' ,
											'value' => $v['nickname'] ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'  => '上传时间 : ' ,
											'value' => formatTime($v['time'] , 1) ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'  => '邮寄联系人 : ' ,
											'value' => $v['contacts'] ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'  => '邮寄电话 : ' ,
											'value' => $v['tel'] ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'  => '邮寄地址 : ' ,
											'value' => $v['prov_name'].' ' .$v['city_name'].' ' .$v['county_name'] .' '.$v['address'] ,
										]) ,
									]) ,

									//联系方式
									integrationTags::td([
										/*
										integrationTags::tdSimple([
											'name'     => '安排时间 : ' ,
											'value'    => formatTime($v['arrange_time'], 0) ,
											'editable' => '1' ,
											'field'    => 'arrange_time' ,
											'reg'      => '/^\d{4}-\d{2}-\d{2}$/' ,
											'msg'      => '格式 2018-01-01' ,
										]) ,
										'<br>' ,
										*/

										integrationTags::tdSelect([
											'name'       => 'year' ,
											'field_name' => '年份 :' ,
											'selected'   => $v['year'] ,
											'options'    => static::$yearMap ,
											'disabled'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_year' , 'is_enable') ? '' : 'disabled' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_year' , 'is_display') ,
										]) ,

										integrationTags::tdSelect([
											'name'       => 'month' ,
											'field_name' => '月份 :' ,
											'selected'   => $v['month'] ,
											'options'    => static::$monthMap ,
											'disabled'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_month' , 'is_enable') ? '' : 'disabled' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_month' , 'is_display') ,
										]) ,

										'<br>' ,
										integrationTags::tdSimple([
											'name'       => '定金 : ' ,
											'value'      => $v['deposit'] ,
											'field'      => 'deposit' ,
											'reg'        => '/^\d+(\.\d{1,2})?$/' ,
											'msg'        => '必须为整数或者小数' ,
											'editable'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_deposit' , 'is_enable') ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_deposit' , 'is_display') ,
										]) ,

										integrationTags::tdSimple([
											'name'       => '尾款 : ' ,
											'value'      => $v['final_payment'] ,
											'field'      => 'final_payment' ,
											'reg'        => '/^\d+(\.\d{1,2})?$/' ,
											'msg'        => '必须为整数或者小数' ,
											'editable'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_enable') ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_display') ,
										]) ,
										'<br>' ,

										integrationTags::tdSimple([
											'name'       => '总额 : ' ,
											'value'      => $v['total'] ,
											'field'      => 'total' ,
											'reg'        => '/^\d+(\.\d{1,2})?$/' ,
											'msg'        => '必须为整数或者小数' ,
											'editable'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_enable') ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_final_payment' , 'is_display') ,
										]) ,

										integrationTags::tdSimple([
											'name'       => '刊物名 : ' ,
											'value'      => $v['journal_name'] ,
											'field'      => 'journal_name' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '请填写合法手机号码' ,
											'editable'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_name' , 'is_enable') ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_name' , 'is_display') ,

										]) ,
										'<br>' ,
										integrationTags::tdSelect([
											'name'       => 'journal_type' ,
											'field_name' => '刊物类型 :' ,
											'selected'   => $v['journal_type'] ,
											'options'    => $journalTypes ,
											'disabled'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_type' , 'is_enable') ? '' : 'disabled' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_journal_type' , 'is_display') ,

										]) ,
										'<br>' ,
										integrationTags::tdSelect([
											'name'       => 'doc_type' ,
											'field_name' => '稿件类型 :' ,
											'selected'   => $v['doc_type'] ,
											'options'    => $this->logic->model_::$docTypeMap ,
											'disabled'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_type' , 'is_enable') ? '' : 'disabled' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_type' , 'is_display') ,
										]) ,
									]) ,

									//采编备注
									integrationTags::td([
										integrationTags::tdTextarea([
											'style'    => 'width:100%;height:100px' ,
											//'name'     => 'remark' ,
											'editable' => $this->authClass->hasRoleByIds([4]) ,
											'field'    => 'remark' ,
											//'reg'      => '/^\d{1,4}$/' ,
											//'msg'      => '请填写合法手机号码' ,
											'value'    => $v['remark'] ,
										]) ,
									]) ,

									//编辑备注
									integrationTags::td([
										integrationTags::tdTextarea([
											'style'    => 'width:100%;height:100px' ,
											//'name'     => 'remark' ,
											'editable' => $this->authClass->hasRoleByIds([3]) ,
											'field'    => 'remark_editor' ,
											//'reg'      => '/^\d{1,4}$/' ,
											//'msg'      => '请填写合法手机号码' ,
											'value'    => $v['remark_editor'] ,
										]) ,
									]) ,

									//待处理
									integrationTags::td([
										integrationTags::tdSelect([
											'name'       => 'is_pending' ,
											//'field_name' => '刊物类型 :' ,
											'selected'   => $v['is_pending'] ,
											'options'    => $this->logic->model_::$docPreStatus ,
											'disabled'   => 1,
											'is_display' => 1,

										]) ,
									]) ,

									//信息确认
									integrationTags::td([
										integrationTags::tdSwitcher([
											'params'  => [
												'checked'          => $v['is_confirm'] ? 'checked' : '' ,
												'name'             => 'is_confirm' ,
												'change_callback'  => 'switcherUpdateFieldConfirm' ,
												'success_callback' => 'refresh_page' ,
												'disabled'         => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_is_confirm' , 'is_enable') ? '' : 'disabled' ,
												'is_display'       => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_is_confirm' , 'is_display') ,
											] ,
											//'name'    => '' ,
											'is_auto' => '0' ,
										]) ,
									]) ,

									//操作
									integrationTags::td([

										/*
										integrationTags::tdButton([
											'attr'  => ' btn-primary btn-replace-doc' ,
											'value' => '替换稿件' ,
										]) ,
										*/
										integrationTags::a('下载稿件' , [
											'href' => url('downloadDoc' , ['id' => $v['id']]) ,
										]) ,

										integrationTags::tdButton([
											'attr'       => ' btn-warning btn-assign-address' ,
											'value'      => '设置地址' ,
											'is_display' => $this->authClass->hasRoleByIds([4]),
										]) ,
										'<br>' ,
										integrationTags::tdButton([
											'attr'       => ' btn-info btn-upload-attachment' ,
											'value'      => '上传附件' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_upload_attachment' , 'is_display') ,
										]) ,
										integrationTags::tdButton([
											'attr'       => ' btn-primary btn-preview-attachment' ,
											'value'      => '查看附件' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_preview_attachment' , 'is_display') ,
										]) ,
										'<br>' ,

										integrationTags::tdButton([
											'attr'       => ' btn-success btn-set-stay' ,
											'value'      => '设置待定' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_set_stay' , 'is_display') ,
										]) ,

										integrationTags::tdButton([
											'attr'       => ' btn-danger btn-delete' ,
											'value'      => '删除' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_delete' , 'is_display') ,
										]) ,
										'<br>' ,

										integrationTags::tdSelect([
											'name'             => 'doc_status' ,
											'success_callback' => 'refresh_page' ,
											'field_name'       => '稿件状态 :' ,
											'selected'         => $v['doc_status'] ,
											'options'          => $this->logic->model_::$docStatusMap ,

											'disabled'   => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_status' , 'is_enable') ? '' : 'disabled' ,
											'is_display' => $this->viewClass->checkRule('VIEW_ASSIGE_ELEMENTS_doc_status' , 'is_display') ,
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

			return $this->showPage();
		}

		public function assignAddress()
		{
			$this->initLogic();
			$this->setPageTitle('设置地址');
			if(IS_POST)
			{
				$id = session(md5(URL_MODULE));

				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				session(md5(URL_MODULE) , $this->param['id']);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([

							integrationTags::rowButton([
								[
									[
										'class'      => 'btn-danger  btn-custom' ,
										'field'      => '添加地址' ,
										'is_display' => 1 ,

										'src'        => url('doc/address/add') ,
										'title'      => '添加地址' ,
									] ,
								] ,
							]) ,


							elementsFactory::staticTable()->make(function(&$doms , $_this) {
								//角色机制注册
								$this->registerRoleEvent([
									[
										//采编
										'roles'    => [4] ,
										'callback' => function() use(&$journalTypes) {
											//编辑获取指定
											$this->param['uid'] = $this->adminInfo['id'];
										} ,
										'params'   => [] ,
									] ,
								]);


								$data = $this->logic__Address->dataListWithPagination($this->param);

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
										'attr'  => 'style="width:220px;"' ,
									] ,
									[
										'field' => '省/市/县' ,
										'attr'  => '' ,
									] ,
									[
										'field' => '详细地址' ,
										'attr'  => 'style="width:auto;"' ,
									] ,
									[
										'attr'  => 'style="width:80px;"' ,
										'field' => '设置地址' ,
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
									'assignAddressUrl'   => url('assignAddress') ,
								]);

								$info = $this->logic->getInfo($this->param);


								foreach ($data['data'] as $k => $v)
								{

									/**
									 * 构造tr
									 */
									$t = integrationTags::tr([

										//checkbox
										integrationTags::td([
											integrationTags::tdSimple([
												'value' => $v['id'] ,
											]) ,
										]) ,

										//信息
										integrationTags::td([
											integrationTags::tdSimple([
												'name'     => '联系人 : ' ,
												'editable' => 0 ,
												'value'    => $v['name'] ,
												'field'    => 'name' ,
												'reg'      => '/^\S+$/' ,
												'msg'      => '姓名不能为空' ,
											]) ,
											'<br />',
											integrationTags::tdSimple([
												'name'     => '电话 : ' ,
												'editable' => 0 ,
												'value'    => $v['tel'] ,
												'field'    => 'tel' ,
												'reg'      => '/^1\d{10}$/' ,
												'msg'      => '手机格式不对' ,
											]) ,
										]) ,

										//省/市/县
										integrationTags::td([
											integrationTags::tdSimple([
												//'name'     => '添加时间' ,
												'editable' => '0' ,
												'value'    => ($v['prov_name']) ,
											]) ,
											'/',
											integrationTags::tdSimple([
												//'name'     => '添加时间' ,
												'editable' => '0' ,
												'value'    => ($v['city_name']) ,
											]) ,
											'/',
											integrationTags::tdSimple([
												//'name'     => '添加时间' ,
												'editable' => '0' ,
												'value'    => ($v['county_name']) ,
											]) ,
										]) ,


										//详细
										integrationTags::td([
											integrationTags::tdTextarea([
												'style'    => 'width:100%' ,
												//'name'     => 'remark' ,
												'editable' => 0 ,
												'field'    => 'address' ,
												//'reg'      => '/^\d{1,4}$/' ,
												//'msg'      => '请填写合法手机号码' ,
												'value'    => $v['address'] ,
											]) ,
										]) ,

										//操作
										integrationTags::td((function() use($info, $v) {
											$isThisAddress = $info['address_id'] == $v['id'];
											$res = [];
											if($this->authClass->hasRoleByIds([4]))
											{
												if(!$isThisAddress)
												{
													$res = integrationTags::tdButton([
														'attr'  => ' btn-success btn-use-address' ,
														'value' => '使用此地址' ,
													]);
												}
												else
												{
													$res = integrationTags::tdSimple([
														//'name'     => '添加时间' ,
														'editable' => 0 ,
														'value'    => '当前地址' ,
													]);
												}
											}

											return $res;
										})()) ,

									] , ['id' => $v['id']]);

									$doms = array_merge($doms , $t);
								}

							}) ,
						] , [
							'width'      => '12' ,
							'main_title' => '选择地址' ,
							'sub_title'  => '' ,
						]) ,
					]) ,
				]);

				return $this->showPage();
			}


		}

		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param, [
				[
					function( &$globalVariable) {
						$res = true;
						if($globalVariable['field'] == 'is_confirm' && ($globalVariable['val'] ==1))
						{
							$docInfo = $this->logic->getInfo(['id' => $globalVariable['ids']])->toArray();
							foreach ($docInfo as $k => $v)
							{
								switch ($k)
								{
									case 'year':
									case 'month':
									case 'journal_name':
									case 'doc_type':
										if(!$v)
										{
											($res = !!$v);
											break 2;
										}
										dufault:;
								}
							}
						}
						return $res;
					} ,
					[] ,
					'稿件状态信息填写不完整，请填写完整' ,
				] ,
			]));
		}

		public function downloadDoc()
		{
			$this->initLogic();
			$docInfo = $this->logic->getInfo($this->param);
			downloadFile( makeFilePath($docInfo['path'] ) , $docInfo['file_name'] );
		}

		public function replaceDoc()
		{
			if(isset($_FILES['file']))
			{
				$this->initLogic();

				$res = uploadFile('file' , function($result) {
					$id = session(md5(URL_MODULE.'id'));
					$docInfo = $this->logic->getInfo(['id' => $id]);

					$this->logic->updateField([
						'ids'   => $id,
						'val'   => $result['savename'] ,
						'field' => 'path' ,
					]);

					//删除原稿件
					delFile($docInfo['path']);

					return $result;
				} );

				if($res['is_finished'])
				{
					return $this->result($res, 1, '更新成功', 'json');
				}
				else
				{
					return $this->error();
				}
			}
			else
			{
				$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

				//设置标题
				$this->setPageTitle('替换稿件');

				session(md5(URL_MODULE.'id') , $this->param['id']);

				$this->displayContents = integrationTags::basicFrame([
					integrationTags::row([
						integrationTags::rowBlock([

							integrationTags::rowButton([
								[/*
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,*/
								],
							]),

							integrationTags::upload(SINGLE_FILE , [

								[
									'title' => '上传须知' ,
									'items' => [
										'上传的文档将会替换当前文档，无法恢复，请确认后操作' ,
										'单个文档最大50M' ,
										'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
										'允许的上传格式有.doc .docx .wps' ,
									] ,
								] ,
								[
									'title' => '命名规则（添加文档时如果弹出提示框，请对比下面的命名示例，仔细阅读此提示）' ,
									'items' => [
										'文档名字开头必须为数字，即版数，可为小数或者整数，后面紧跟半角字母 P ，P不区分大小写，上传后此数字用于统计版数' ,
										'字母P后面紧跟 - 符号或者作者名字' ,
										'符号后面紧跟作者名字，多个作者名字用 & 符号分隔，不能用空格分隔，作者名字之间不能有空格，作者名字为两个字的需特别注意此情况' ,
										'作者名字后面紧跟 - 符号，符号允许一个或者多个' ,
										'符号后面紧跟文档标题，文档标题可以是除空格外的任意字符' ,
										'文档标题后紧跟文档后缀，允许上传的文档后缀为 .doc .docx .wps 三种格式' ,
									] ,
								] ,
								[
									'title' => '命名示例（作者名字和文档名之间必须有最少一个 - 符号连接，否则将无法区分作者名和文档名）' ,
									'items' => [
										'1P--马玲--大众传播对少数民族地区青少年世界观影响的调查与思考.docx' ,
										'1p-郑洪峰&郑洪峰-- 油田社区物业管理标准化和规范化策略探究.docx' ,
										'1.5p - - 郑洪峰&郑洪峰&郑洪峰 - - 油田社区物业管理标准化和规范化策略探究.doc' ,
										'1.0P郑洪峰-油田社区物业管理标准化和规范化策略探究.wps' ,
									] ,
								] ,
							] , [

								'uploadSuccess' => <<<AAA
function (file, response) {
	if (response.code == 1)
	{
		$(".status-box-text").text('更新成功');
		
		setTimeout(function(){
		//	layer.close()
		}, 400);
	}
	else
	{
		//服务器处理出错
	}
}
AAA
								,
							] , [
								'server' => "'".url()."'" ,
								'accept' =>json_encode( [
									'extensions' => 'doc,docx,wps',
								]) ,
							]) ,

						], [
							'width'      => '12' ,
							'main_title' => '' ,
							'sub_title'  => '' ,
						]) ,

					]) ,
				],[
					'animate_type' => 'fadeInRight' ,
					'attr'         => '' ,
				]);

				return $this->showPage();
			}
		}

		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				////////////////////////////////
				/// 放置回收站
				////////////////////////////////

				[
					function(&$param) {
						//删除稿件时 删除对应附件
						$ids = explode(',' , $param['ids']);

						foreach ($ids as $v)
						{
							//取出附件，吧所有附件删除
							$attachments = $this->logic__Docattachment->getAttachmentsByDocId(['id' => $v,]);
							foreach ($attachments as $k1 => $v1) {
								$where = [
									'id' => [
										'=' ,
										$v1['id'] ,
									] ,
								];
								delFile($v1['path']);
								$this->logic__Docattachment->model_->del($where);
							}
							return true;
						}
					} ,
					[] ,
				] ,

				[
					function(&$param) {
						$ids = explode(',' , $param['ids']);
						foreach ($ids as $v)
						{
							//取出稿件，删除文件
							$info = $this->logic->getInfo(['id' => $v,]);
							delFile($info['path']);

							return true;
						}
					} ,
					[] ,
				] ,

			]));
		}

		public function exportExecl()
		{
			$this->initLogic();
			$condition  = $this->logic->getSessionInfo('exportExecl_condition' );

			if(isset($condition['pagerow'])) unset($condition['pagerow']);

			$data = $this->logic->dataList($condition);
			$journalTypes = $this->logic__Journaltype->getFormatedData(1);

			$titles = [
				'文档名' ,
				'上传者' ,
				'上传时间' ,
				'安排年份' ,
				'安排月份' ,
				'定金' ,
				'尾款' ,
				'总额' ,
				'刊物类型' ,
				'刊物名' ,
				'稿件类型' ,
				'省' ,
				'市' ,
				'县' ,
				'详细地址' ,
				'联系人' ,
				'联系电话' ,
			];

			$list = array_map(function($v)use($journalTypes) {
				return [
					$v['file_name'] ,
					$v['nickname'] ,
					formatTime($v['time']) ,
					$v['year'] ,
					$v['month'] ,
					$v['deposit'] ,
					$v['final_payment'] ,
					$v['total'] ,
					$journalTypes[$v['journal_type']]['field'] ,
					$v['journal_name'] ,
					$this->logic->model_::$docTypeMap[$v['doc_status']]['field'] ,
					$v['prov_name'] ,
					$v['city_name'] ,
					$v['county_name'] ,
					$v['address'] ,
					$v['contacts'] ,
					$v['tel'] ,

				];
			} , $data);

			array_unshift($list , $titles);

			$fileName =  '稿件信息.xlsx';

			$func = function($v , &$data) {
				($data[] = $v);
			};

			exportExcel($list , $fileName , $func=null , 1);
		}
	}