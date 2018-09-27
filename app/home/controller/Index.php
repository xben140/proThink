<?php

	namespace app\home\controller;

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	class Index extends HomeBase
	{
		public function api()
		{
			//print_r($this->param['files']);
			$a = (base64_decode($this->param['files'], 1));
			$b = (json_decode($a, 1));

			return json($b);
		}

		public function exception()
		{
			exception('未授权的访问', 403);
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function index()
		{

			//---------------------------- 设置标题
			$this->setPageTitle('主页');

			//---------------------------- 设置页面类属性
			$this->makePage()->setNodeValue([
				'BODY_ATTR'    => tagConstructor::buildKV([
					'style' => 'overflow:hidden' ,
					'class' => 'fixed-sidebar full-height-layout gray-bg' ,
				]) ,
				'default_page' => url("index") ,
			]);

			//---------------------------- 分配数据
			$data = 'test-data';
			$this->assign('data' , $data);


			//---------------------------- 主体结构
			$this->displayContents = elementsFactory::build('baseFrameWork')->make(function(&$doms , $_this) {

			});

			//---------------------------- 输出
			return $this->showPage();
		}


		/*
		 *
		 * 使用示例
		 *
		 *
		 * */
		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function test()
		{
			$data = 'test-data';
			$this->assign('data' , $data);


			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'data-id' => 5 ,
					'style'   => 'overflow:hidden' ,
					'class'   => ' gray-bg' ,
				]) ,
			]);

			//设置标题
			$this->makePage()->setHead(elementsFactory::singleLabel('<title>主页</title>'));

			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {

						//---------------------------- 下拉菜单
						$contents = elementsFactory::doubleLabel('li' , function(&$doms) {

							$doms[] = elementsFactory::singleLabel('<a href="http://hao123.com">1111</a>');

							$doms[] = elementsFactory::singleLabel(function(&$doms) {
								$doms[] = '<a href="http://hao123.com">2222</a>';
							});

							$doms[] = elementsFactory::singleLabel([
								'<a href="http://baidu.com">33333</a>' ,
								'<a href="http://baidu.com">44444</a>' ,
							]);

						} , [
							'class' => 'test-li' ,
							'id'    => 'li1' ,
						]);

						$_this->setNodeValue('option' , $contents);
						//----------------------------// 下拉菜单


						//---------------------------- 表单

						$doms[] = elementsFactory::form()->make(function(&$doms , $_this) {
							$_this->setNodeValue('method' , 'post');

							$_this->setNodeValue([
								//'class'  => 'form-inline' ,
								'action' => 'http://hao123.com' ,
							]);

							$_this->setNodeValue('attr' , tagConstructor::buildKV([
								'data-id'  => 5 ,
								'data-pid' => 6 ,
							]));


							$js = elementsFactory::singleLabel(/** @lang text */
								<<<css
<script>
//alert('css');
</script>
css
							);

							$css = /** @lang text */
								<<<'css'
									<style>
									.div111{
										background: #ccc;
									}
									</style>
css;

							$_this->addJs($js);
							$_this->addCss($css);


							$doms[] = elementsFactory::doubleLabel('div' , function(&$doms) {

								$t = integrationTags::staticText([
									'field_name' => 'staticText' ,
									'value'      => 'value' ,
								]);
								$doms = array_merge($doms , $t);

								$t = integrationTags::textarea([
									'field_name' => 'textarea' ,
									'name'       => 'textarea' ,
									'value'      => '11' ,
									'attr'       => '' ,
									'style'      => 'width:100%;height:200px;' ,
								]);
								$doms = array_merge($doms , $t);
							} , [
								'class' => 'test-div' ,
								'id'    => 'div1' ,
							]);

							$doms = array_merge($doms , integrationTags::customElementFormPath($this->getTemplatePath('test') , [
								integrationTags::staticText([
									'field_name' => 'staticText' ,
									'value'      => 'value' ,
								]) ,
								integrationTags::textarea([
									'field_name' => 'textarea' ,
									'name'       => 'textarea' ,
									'value'      => '11' ,
									'attr'       => '' ,
									'style'      => 'width:100%;height:200px;' ,
								]) ,
							]));

							$doms[] = elementsFactory::linkage()->make(function(&$doms , $_this) {
								$_this->setNodeValue([
									'placeholder' => '区域选择' ,
									'field_name'  => '区域选择' ,
									'tip'         => '' ,
									'id'          => '__linkage__' ,
								]);

								$_this->setConfig([
									'url'        => ('/portal/area/getAreaByPid') ,
									'field'      => 'pid' ,
									'method'     => 'post' ,
									'defaultVal' => 1 ,
									'disabled'   => 0 ,
									'liValue'    => 'id' ,
									'liField'    => 'area_name' ,
									'dataType'   => 'json' ,
									'size'       => [
										200 ,
										400 ,
									] ,
									'container'  => [
										[
											'pid'  => 1 ,
											'name' => 'a' ,
										] ,
										[
											'name' => 'b' ,
										] ,
										[
											'name' => 'c' ,
										] ,
									] ,
								]);

							});
						});
						//----------------------------// 表单

					});

				});

			});

			return $this->showPage();
		}


		public function form()
		{
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			//设置标题
			$this->setPageTitle('form测试');

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([


						integrationTags::form([

							integrationTags::staticText([
								'field_name' => 'staticText' ,
								'value'      => 'value' ,
							]) ,

							integrationTags::text([
								//随便写
								'field_name'  => 'text' ,
								'placeholder' => 'placeholderplaceholder' ,
								'tip'         => 'text' ,
								'value'       => 'value' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							]) ,


							integrationTags::password([
								//随便写
								'field_name'  => 'text' ,
								'placeholder' => 'placeholderplaceholder' ,
								'tip'         => 'text' ,
								'value'       => 'value' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							] , 1) ,

							integrationTags::inlineCheckbox([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb22233' , 'inlineCheckbox' , '提示信息4411' , [
								1 ,
								3 ,
							]) ,


							integrationTags::inlineRadio([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'dd2222' , 'inlineRadio' , '提示信息4411' , 2) ,


							integrationTags::blockCheckbox([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2221' , 'blockCheckbox' , '提示信息4411' , [
								1 ,
								3 ,
							]) ,


							integrationTags::blockRadio([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2222' , 'blockRadio' , '提示信息4411' , 2) ,

							integrationTags::singleSelect([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2222' , 'singleSelect111' , '提示信息4411' , 2) ,


							integrationTags::switchery([
								//额外属性
								//'attr'       => '' ,
								//随便写
								'isChecked'  => 'checked' ,
								//随便写
								'tip'        => '提示信息11' ,
								//随便写
								'field_name' => '用户名' ,
								//表单name值
								'name'       => 'switchery' ,
								//表单value值,$data里的字段
								'value'      => '1222' ,
								//表单value对应名字,$data里的字段
								'field'      => 'name' ,
							]) ,

							integrationTags::singleDate([
								'field_name'  => '日期' ,
								'name'        => 'singleDate' ,
								'value'       => '' ,
								'is_time'     => '1' ,
								'placeholder' => '点击选时间' ,
							]) ,

							integrationTags::betweenDate([
								'field_name' => '日期期间' ,
								//'min'        => 'laydate.now()' ,
								'is_time'    => 'true' ,
								//'format'     => 'YYYY-MM-DD hh:mm:ss' ,

								'start_name' => 'start_name' ,
								'end_name'   => 'end_name' ,

								'start_value' => '' ,
								'end_value'   => '' ,

								//'format'      => 'YYYY-MM-DD ' ,
							]) ,

							integrationTags::textarea([
								'field_name' => 'textarea' ,
								'name'       => 'textarea' ,
								'value'      => '11' ,
								'attr'       => '' ,
								'style'      => 'width:100%;height:200px;' ,
							]) ,

							integrationTags::uediter([
								'field_name' => '内容' ,
								'name'       => 'uediter' ,
								'value'      => 'sdfsdfsdfsdf' ,
							]) ,


						] , [
							'id'     => 'form122222' ,
							'method' => 'post' ,
							'action' => '/home/index/index' ,
						]) ,


					]) ,
				]) ,
			]);

			return $this->showPage();
		}


		public function form111()
		{

			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'class' => ' gray-bg' ,
				]) ,
			]);

			//设置标题
			$this->setPageTitle('form测试');

			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {
				$_this->setNodeValue([
					'animate_type' => 'fadeInRight' ,
				]);

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {
					$_this->setNodeValue([//'data-id' => '1' ,
					]);

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {
						//$_this->isEnableClosed(1);
						$_this->setNodeValue([
							'width'      => '12' ,
							'main_title' => 'main_title' ,
							'sub_title'  => 'sub_title' ,
						]);
						/*
						 *
						 *
						 *
						 *
						 *		start of from1
						 *
						 *
						 *
						 *
						 * */

						$doms[] = elementsFactory::form()->make(function(&$doms , $_this) {
							$_this->setNodeValue([
								'id'     => 'form122222' ,
								'method' => 'post' ,
								'action' => '/home/index/index' ,
							]);


							//静态
							$doms = array_merge($doms , integrationTags::staticText([
								'field_name' => 'staticText' ,
								'value'      => 'value' ,
							]));

							//text
							$doms = array_merge($doms , integrationTags::text([
								//随便写
								'field_name'  => 'text' ,
								'placeholder' => 'placeholderplaceholder' ,
								'tip'         => 'text' ,
								'value'       => 'value' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							]));

							//password
							$doms = array_merge($doms , integrationTags::password([
								//随便写
								'field_name'  => 'text' ,
								'placeholder' => 'placeholderplaceholder' ,
								'tip'         => 'text' ,
								'value'       => 'value' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							] , 1));

							//inlineCheckbox
							$doms = array_merge($doms , integrationTags::inlineCheckbox([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb22233' , 'inlineCheckbox' , '提示信息4411' , [
								1 ,
								3 ,
							]));


							//inlineRadio
							$doms = array_merge($doms , integrationTags::inlineRadio([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'dd2222' , 'inlineRadio' , '提示信息4411' , 2));


							//blockCheckbox
							$doms = array_merge($doms , integrationTags::blockCheckbox([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2221' , 'blockCheckbox' , '提示信息4411' , [
								1 ,
								3 ,
							]));


							//blockRadio
							$doms = array_merge($doms , integrationTags::blockRadio([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2222' , 'blockRadio' , '提示信息4411' , 2));


							//singleSelect
							$doms = array_merge($doms , integrationTags::singleSelect([
								[
									'value' => '1' ,
									'field' => '年1111' ,
								] ,
								[
									'value' => '2' ,
									'field' => '月2222' ,
								] ,
								[
									'value' => '3' ,
									'field' => '日3333' ,
								] ,
							] , 'namebbbb2222' , 'singleSelect111' , '提示信息4411' , 2));


							//switchery
							$doms = array_merge($doms , integrationTags::switchery([
								//额外属性
								//'attr'       => '' ,
								//随便写
								'isChecked'  => 'checked' ,
								//随便写
								'tip'        => '提示信息11' ,
								//随便写
								'field_name' => '用户名' ,
								//表单name值
								'name'       => 'switchery' ,
								//表单value值,$data里的字段
								'value'      => '1222' ,
								//表单value对应名字,$data里的字段
								'field'      => 'name' ,
							]));

							//singleDate
							$doms = array_merge($doms , integrationTags::singleDate([
								'field_name'  => '日期' ,
								'name'        => 'singleDate' ,
								'value'       => '' ,
								'is_time'     => '1' ,
								'placeholder' => '点击选时间' ,
							]));


							//betweenDate
							$doms = array_merge($doms , integrationTags::betweenDate([
								'field_name' => '日期期间' ,
								//'min'        => 'laydate.now()' ,
								'is_time'    => 'true' ,
								//'format'     => 'YYYY-MM-DD hh:mm:ss' ,

								'start_name' => 'start_name' ,
								'end_name'   => 'end_name' ,

								'start_value' => '' ,
								'end_value'   => '' ,

								//'format'      => 'YYYY-MM-DD ' ,
							]));


							//textarea
							$doms = array_merge($doms , integrationTags::textarea([
								'field_name' => 'textarea' ,
								'name'       => 'textarea' ,
								'value'      => '11' ,
								'attr'       => '' ,
								'style'      => 'width:100%;height:200px;' ,
							]));

							//uediter
							$doms = array_merge($doms , integrationTags::uediter([
								'field_name' => '内容' ,
								'name'       => 'uediter' ,
								'value'      => 'sdfsdfsdfsdf' ,
							]));


						});

						/*
						 *
						 *
						 *
						 *
						 *		end of from1
						 *
						 *
						 *
						 *
						 * */
					});

				});

			});

			return $this->showPage();
		}


		public function tab()
		{
			$this->setPageTitle('table测试');
			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {
				$_this->setNodeValue([
					'animate_type' => 'fadeInRight' ,
				]);

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {
					$_this->setNodeValue([//'data-id' => '1' ,
					]);

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {
						//$_this->isEnableClosed(1);
						$_this->setNodeValue([
							'width'      => '12' ,
							'main_title' => '大标题' ,
							'sub_title'  => '小标题' ,
						]);
						$doms[] = elementsFactory::rowButton()->make(function(&$doms , $_this) {


							$_this->setButton([
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
										'field'      => '添加' ,
										'is_display' => 1,
									] ,
									[
										'class'      => 'btn-danger  multi-op multi-op-del' ,
										'field'      => '批量删除' ,
										'is_display' => 1,
									] ,
									[
										'class'      => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
										'field'      => '批量启用' ,
										'is_display' => 1 ,
									] ,
									[
										'class'      => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
										'field'      => '批量禁用' ,
										'is_display' => 1 ,
									] ,
								] ,
							]);
						});




						/*
						 *
						 *
						 *
						 *
						 *		start of table
						 *
						 *
						 *
						 *
						 * */

						$data = [
							[
								'id'      => '1' ,
								'project' => 'hello"' ,
							] ,
						];

						$doms[] = elementsFactory::staticTable()->make(function(&$doms , $_this) {

							/**
							 * 设置表格头
							 */
							$_this->setHead([
								[
									'field' => '' ,
									'attr'  => 'style="width:20px;"' ,
								] ,
								[
									'field' => '项目' ,
									'attr'  => 'class="red"' ,
								] ,
								[
									'field' => '进度' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '任务' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '日期' ,
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
							$_this->setPagination('<ul class="pagination"> <li class="disabled"> <span>«</span> </li> <li class="active"> <span>122</span> </li> <li> <a href="#">2</a> </li> <li> <a href="#">»</a> </li> </ul>');

							/**
							 * 设置js请求api
							 */
							$_this->setApi([
								'deleteUrl'   => url('delete') ,
								'setFieldUrl' => url('setField') ,
								'detailUrl'   => url('detail') ,
								'editUrl'     => url('edit') ,
							]);


							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect([
										[
											'value' => '1' ,
											'field' => '年1' ,
										] ,
										[
											'value' => '2' ,
											'field' => '月1' ,
										] ,
										[
											'value' => '3' ,
											'field' => '日1' ,
										] ,
									] , 'a1' , '上传时间' , 2) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRadio([
										[
											'value' => '1' ,
											'field' => '年2' ,
										] ,
										[
											'value' => '2' ,
											'field' => '月2' ,
										] ,
										[
											'value' => '3' ,
											'field' => '日2' ,
										] ,
									] , 'a2' , '上传时间2' , 2) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormCheckbox([
										[
											'value' => '1' ,
											'field' => '年3' ,
										] ,
										[
											'value' => '2' ,
											'field' => '月3' ,
										] ,
										[
											'value' => '3' ,
											'field' => '日3' ,
										] ,
									] , 'a3' , '上传时间3' , [
										2 ,
										1 ,
									]) ,

								] , ['col' => '12']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRadio([
										[
											'value' => '1' ,
											'field' => '年4' ,
										] ,
										[
											'value' => '2' ,
											'field' => '月4' ,
										] ,
										[
											'value' => '3' ,
											'field' => '日4' ,
										] ,
									] , 'c1' , '用户状态' , '1') ,

									integrationTags::searchFormCheckbox([
										[
											'value' => '1' ,
											'field' => '年5' ,
										] ,
										[
											'value' => '2' ,
											'field' => '月5' ,
										] ,
										[
											'value' => '3' ,
											'field' => '日5' ,
										] ,
									] , 'c2' , '用户状态' , [
										2 ,
										1 ,
									]) ,

								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormText([
										'field'       => '名字' ,
										'value'       => 'gaag' ,
										'name'        => 'd1' ,
										'placeholder' => '随便写' ,
									]) ,
								] , ['col' => '6']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([
									integrationTags::searchFormRange([
										'field' => '名字' ,

										'value1'       => '名字' ,
										'name1'        => 'e1' ,
										'placeholder1' => 'placeholder1' ,

										'value2'       => 'value2' ,
										'name2'        => 'e2' ,
										'placeholder2' => 'placeholder2' ,
									]) ,


								] , ['col' => '12']);
								$doms = array_merge($doms , $t);


								$t = integrationTags::searchFormCol([

									integrationTags::searchFormDate([
										'field' => '名字' ,

										'value1'       => '名字' ,
										'name1'        => 'f1' ,
										'placeholder1' => 'placeholder1' ,

										'value2'       => 'value2' ,
										'name2'        => 'f2' ,
										'placeholder2' => 'placeholder2' ,
									]) ,
								] , ['col' => '12']);
								$doms = array_merge($doms , $t);


							});


							$_this->setSearchForm($searchForm);


							$doms = integrationTags::tr([

								integrationTags::td([
									integrationTags::tdCheckbox() ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => 'name222:' ,
										'editable' => '1' ,
										'value'    => '234' ,
										'field'    => 'name' ,
										'reg'      => '/^\d{1,4}$/' ,
										'msg'      => '请填写合法手机号码' ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSelect([
										'field_name' => 'time111:' ,
										'name'       => 'ttt' ,
										'selected'   => 0 ,
										'options'    => [
											[
												'value' => '0' ,
												'field' => '请选择0000' ,
											] ,
											[
												'value' => '1' ,
												'field' => '请选择111' ,
											] ,
											[
												'value' => '2' ,
												'field' => '请选择222' ,
											] ,
										] ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => 'time22:' ,
										'editable' => '0' ,
										'value'    => date('Y-m-d H:i:s' , time()) ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdButton([
										'attr'  => ' btn-success btn-edit' ,
										'value' => '编辑' ,
									]) ,
									integrationTags::tdButton([
										'attr'  => ' btn-info btn-detail' ,
										'value' => '详细' ,
									]) ,
									integrationTags::tdButton([
										'attr'  => ' btn-danger btn-delete' ,
										'value' => '删除' ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => '' ,
											'name'            => 'status' ,
											'change_callback' => 'switcherUpdateField' ,
											//switcherUpdateFieldConfirm
										] ,
										'name'    => '启用' ,
										'is_auto' => '1' ,
									]) ,
									'<br>' ,
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => 'checked' ,
											'name'            => 'aa' ,
											'change_callback' => 'switcherUpdateFieldConfirm' ,
											//switcherUpdateFieldConfirm
										] ,
										'name'    => '编辑' ,
										'is_auto' => '0' ,
									]) ,
								]) ,


							] , ['id' => '1']);

						});

						/*
						 *
						 *
						 *
						 *
						 *		end of table
						 *
						 *
						 *
						 *
						 * */
					});

				});

			});


			return $this->showPage();
		}


		public function tab11()
		{
			$this->setPageTitle('table测试');
			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {
				$_this->setNodeValue([
					'animate_type' => 'fadeInRight' ,
				]);

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {
					$_this->setNodeValue([//'data-id' => '1' ,
					]);

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {
						//$_this->isEnableClosed(1);
						$_this->setNodeValue([
							'width'      => '12' ,
							'main_title' => '大标题' ,
							'sub_title'  => '小标题' ,
						]);
						/*
						 *
						 *
						 *
						 *
						 *		start of table
						 *
						 *
						 *
						 *
						 * */

						$data = [
							[
								'id'      => '1' ,
								'project' => 'hello"' ,
							] ,
						];

						$doms[] = elementsFactory::staticTable()->make(function(&$doms , $_this) {

							/**
							 * 设置表格头
							 */
							$_this->setHead([
								[
									'field' => '' ,
									'attr'  => 'style="width:20px;"' ,
								] ,
								[
									'field' => '项目' ,
									'attr'  => 'class="red"' ,
								] ,
								[
									'field' => '进度' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '任务' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '日期' ,
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
							$_this->setPagination('<ul class="pagination"> <li class="disabled"> <span>«</span> </li> <li class="active"> <span>122</span> </li> <li> <a href="#">2</a> </li> <li> <a href="#">»</a> </li> </ul>');

							/**
							 * 设置js请求api
							 */
							$_this->setApi([
								'deleteUrl'   => url('delete') ,
								'setFieldUrl' => url('setField') ,
								'detailUrl'   => url('detail') ,
								'editUrl'     => url('edit') ,
							]);


							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '12']);

									$doms[] = elementsFactory::searchFormSelect()->make(function(&$doms , $_this) {

										$_this->setOption([
											[
												'value' => '1' ,
												'field' => '年' ,
											] ,
											[
												'value' => '2' ,
												'field' => '月' ,
											] ,
											[
												'value' => '3' ,
												'field' => '日' ,
											] ,
										] , 'nameaaa11' , '上传时间' , 2);
									});
								});

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '6']);

									$doms[] = elementsFactory::searchFormRadio()->make(function(&$doms , $_this) {

										$_this->setOption([
											[
												'value' => '1' ,
												'field' => '年' ,
											] ,
											[
												'value' => '2' ,
												'field' => '月' ,
											] ,
											[
												'value' => '3' ,
												'field' => '日' ,
											] ,
										] , 'nameaaa' , 'searchFormRadio' , 3);
									});
								});

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '6']);

									$doms[] = elementsFactory::searchFormCheckbox()->make(function(&$doms , $_this) {

										$_this->setOption([
											[
												'value' => '1' ,
												'field' => '年' ,
											] ,
											[
												'value' => '2' ,
												'field' => '月' ,
											] ,
											[
												'value' => '3' ,
												'field' => '日' ,
											] ,
										] , 'namebbbb' , 'searchFormCheckbox' , [
											1 ,
											2 ,
										]);

									});
								});

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '6']);

									$doms[] = elementsFactory::searchFormText()->make(function(&$doms , $_this) {
										$_this->setNodeValue([
											'field'       => '名字' ,
											'value'       => 'gaag' ,
											'name'        => 'name11' ,
											'placeholder' => '随便写' ,
										]);

									});
								});

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '6']);

									$doms[] = elementsFactory::searchFormText()->make(function(&$doms , $_this) {
										$_this->setNodeValue([
											'field'       => '名字' ,
											'value'       => 'gaag' ,
											'name'        => 'name11' ,
											'placeholder' => '随便写' ,
										]);

									});
								});

								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '12']);

									$doms[] = elementsFactory::searchFormRange()->make(function(&$doms , $_this) {
										$_this->setNodeValue([
											'field' => '名字' ,

											'value1'       => '名字' ,
											'name1'        => 'name1' ,
											'placeholder1' => 'placeholder1' ,

											'value2'       => 'value2' ,
											'name2'        => 'name2' ,
											'placeholder2' => 'placeholder2' ,
										]);
									});
								});


								$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) {
									$_this->setNodeValue(['col' => '12']);

									$doms[] = elementsFactory::searchFormDate()->make(function(&$doms , $_this) {
										$_this->setNodeValue([
											'field' => '名字' ,

											'value1'       => '' ,
											'name1'        => 'name111' ,
											'placeholder1' => 'placeholder1' ,

											'value2'       => '' ,
											'name2'        => 'name222' ,
											'placeholder2' => 'placeholder2' ,

										]);
									});
								});

							});

							$_this->setSearchForm($searchForm);


							/**
							 * 设置行
							 */
							$doms[] = elementsFactory::tr()->make(function(&$doms , $_this) {
								$_this->setNodeValue([
									//'id'   => '{$vo1["id"]}' ,
									'id' => '1' ,
									//'attr' => 'data-pid="33"' ,
								]);

								//表格选择复选框
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdCheckbox() ,
								]));

								//生成文本
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdSimple([
										'name'     => 'name222:' ,
										'editable' => '1' ,
										'value'    => '234' ,
										'field'    => 'name' ,
										'reg'      => '/^\d{1,4}$/' ,
										'msg'      => '请填写合法手机号码' ,
									]) ,
								]));

								//生成文本3
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdSelect([
										'name'     => 'time111:' ,
										'selected' => 1 ,
										'options'  => [

											[
												'value' => '1' ,
												'field' => '年' ,
											] ,
											[
												'checked' => '1' ,
												'value'   => '2' ,
												'field'   => '月' ,
											] ,
											[
												'value' => '3' ,
												'field' => '日' ,
											] ,
										] ,
									]) ,
								]));


								//生成select
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdSimple([
										'name'     => 'time22:' ,
										'editable' => '0' ,
										'value'    => date('Y-m-d H:i:s' , time()) ,
									]) ,
								]));


								//生成按钮
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdButton([
										'attr'  => ' btn-success btn-edit' ,
										'value' => '编辑' ,
									]) ,
									integrationTags::tdButton([
										'attr'  => ' btn-info btn-detail' ,
										'value' => '详细' ,
									]) ,
									integrationTags::tdButton([
										'attr'  => ' btn-danger btn-delete' ,
										'value' => '删除' ,
									]) ,
								]));


								//生成按钮
								$doms = array_merge($doms , integrationTags::td([
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => '' ,
											'name'            => 'status' ,
											'change_callback' => 'switcherUpdateField' ,
											//switcherUpdateFieldConfirm
										] ,
										//'name'    => '编辑' ,
										'is_auto' => '1' ,
									]) ,
									'<br>' ,
									integrationTags::tdSwitcher([
										'params'  => [
											'checked'         => 'checked' ,
											'name'            => 'aa' ,
											'change_callback' => 'switcherUpdateFieldConfirm' ,
											//switcherUpdateFieldConfirm
										] ,
										'name'    => '编辑' ,
										'is_auto' => '0' ,
									]) ,
								]));


							});
						});

						/*
						 *
						 *
						 *
						 *
						 *		end of table
						 *
						 *
						 *
						 *
						 * */
					});

				});

			});


			return $this->showPage();
		}


		public function exportExcel()
		{
			$path = 'C:\Users\Administrator\Desktop\\';
			$list = $this->logic__admin_Resourcemenu->dataList();

			$titles = [
				'id' ,
				'name' ,
				'pid' ,
				'module' ,
				'controller' ,
				'action' ,
				'ico' ,
				'order' ,
				'is_menu' ,
				'is_common' ,
				'remark' ,
				'status' ,
				'time' ,
			];

			array_unshift($list , $titles);

			$fileName = $path . '测试.xlsx';

			$func = function($v , &$data) {
				//$v['is_menu'] && ($data[] =  $v);
				($data[] = $v);
			};
			exportExcel($list , $fileName , $func , false);

			return 'done';
		}


		public function importExcel()
		{
			$path = 'C:\Users\Administrator\Desktop\\';
			$fileName = $path . '测试.xlsx';

			$data = importExcel($fileName);
			print_r($data);
			exit;;
		}


		public function generateQrcode()
		{
			$path = 'C:\Users\Administrator\Desktop\\';
			$fileName = $path . '3.png';

			//generateQrcode('http://www.hao123.com' , false , 3 , 10);
			generateQrcode('http://www.hao123.com' , $fileName , 3 , 10);
		}


		public function sendEmail()
		{
			$title = 'just title';
			$body = '163邮件是支持普通连接和SSL连接两种方式的，这里我们推荐使用 ssl 连接方式。';
			$to = [
				'845875470@qq.com' => 'by hello' ,
				'5496150@qq.com'   => 'by 5496150' ,
			];
			$res = sendEmail($title , $body , $to , $err);
			print_r($res);
			print_r($err);
			exit;;
		}


		public function upload()
		{
			if(isset($_FILES['image']))
			{
				$res = uploadImg('image' , function($result) {
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					return $result;
				} , [
					200 ,
					200 ,
					1 ,
				]);
			}
			elseif(isset($_FILES['file']))
			{
				$res = uploadFile('file' , function($result) {
					return $result;
				});
			}

			return json($res);
		}

		public function download()
		{
			$file = 'C:\Users\Administrator\Desktop\t.php';
			$saveName = 'dd.php';

			//$downloader = new downloader($file, $saveName);
			//$downloader->send();

			downloadFile($file , $saveName );
		}





		public function uploadTest1()
		{

			$data = 'test-data';
			$this->assign('data' , $data);


			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'data-id' => 5 ,
					'style'   => 'overflow:hidden' ,
					'class'   => ' gray-bg' ,
				]) ,
			]);

			//设置标题
			$this->makePage()->setHead(elementsFactory::singleLabel('<title>主页</title>'));

			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {

						//---------------------------- 表单

						$doms[] = elementsFactory::form()->make(function(&$doms , $_this) {
							$_this->setNodeValue('method' , 'post');

							$_this->setNodeValue([
								//'class'  => 'form-inline' ,
								'action' => url('api') ,
							]);

							$_this->setNodeValue('attr' , tagConstructor::buildKV([
								'data-id'  => 5 ,
								'data-pid' => 6 ,
							]));



							//uploadSingleImg
							$doms[] = elementsFactory::uploadSingleFile()->make(function(&$doms , $_this) {
								$_this->setOption([
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
								]);

								$_this->setEventMap([
									'beforeFileQueued' => <<<AAA
function (file) {
	var subject = $.trim(file.name);
	console.dir(subject + 123456)
}
AAA
									,
									'uploadSuccess' => <<<AAA
function (file, response) {
	//等于2或1
	if (response.sign)
	{
		if (response.is_finished == 1)
		{
			console.dir(response)

			window.upload_file.push({
				"savename":response.savename,
			});
			
			$(".uploader-preview").find('img').attr({
				'src':response['thumb_url'],
			});
			$(".status-box-text").text('上传完成');
		}
		else
		{
		}
	}
	else
	{
		//服务器处理出错
	}
}
AAA
									,
									'uploadFinished' => <<<AAA
function () {
	$('#upload-files').val( btoa(JSON.stringify(window.upload_file)));
	layer.msg('处理完成111111111');
}
AAA
									,
								]);

								$_this->setOptionMap([
									'server' => '/home/index/upload' ,
								]);


							});

						});

					});

				});

			});

			return $this->showPage();
		}

		public function uploadTest2()
		{

			$data = 'test-data';
			$this->assign('data' , $data);


			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'data-id' => 5 ,
					'style'   => 'overflow:hidden' ,
					'class'   => ' gray-bg' ,
				]) ,
			]);

			//设置标题
			$this->makePage()->setHead(elementsFactory::singleLabel('<title>主页</title>'));

			$this->displayContents = elementsFactory::build('basicFrame')->make(function(&$doms , $_this) {

				$doms[] = elementsFactory::row()->make(function(&$doms , $_this) {

					$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) {

						//---------------------------- 表单

						$doms[] = elementsFactory::form()->make(function(&$doms , $_this) {
							$_this->setNodeValue('method' , 'post');

							$_this->setNodeValue([
								//'class'  => 'form-inline' ,
								'action' => url('api') ,
							]);

							$_this->setNodeValue('attr' , tagConstructor::buildKV([
								'data-id'  => 5 ,
								'data-pid' => 6 ,
							]));


							//生成文本
							$doms = array_merge($doms , integrationTags::hidden([
								'id'    => 'upload-files' ,
								'name'  => 'files' ,
								'value' => '' ,
							]));


							//uploadMultiImg

							$doms[] = elementsFactory::uploadMultiFile()->make(function(&$doms , $_this) {
								$_this->setOption([
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
								]);

								$_this->setEventMap([
									'beforeFileQueued' => <<<AAA
function (file) {
	var subject = $.trim(file.name);
	console.dir(subject + 123456)
}
AAA
									,


									'uploadSuccess' => <<<AAA
function (file, response) {
	//等于2或1
	if (response.sign)
	{
		if (response.is_finished == 1)
		{
			console.dir(response)

			window.upload_file.push({
				"savename":response.savename,
			});
			
			$(".uploader-preview").find('img').attr({
				'src':response['thumb_url'],
			});
			$(".status-box-text").text('上传完成');
		}
		else
		{
		}
	}
	else
	{
		//服务器处理出错
	}
}
AAA
									,



									'uploadFinished' => <<<AAA
function () {
	$('#upload-files').val( btoa(JSON.stringify(window.upload_file)));
	layer.msg('处理完成111111111');
}
AAA
									,
								]);

								$_this->setOptionMap([
									'server' => url('upload') ,
								]);


							});

						});

					});

				});

			});

			return $this->showPage();
		}

		public function uploadTest11()
		{
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			//设置标题
			$this->setPageTitle('上传测试');

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						integrationTags::doubleLabel('div', [

							integrationTags::upload(MULTI_IMG, [
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
								'beforeFileQueued' => <<<AAA
	function (file) {
		var subject = $.trim(file.name);
		layer.msg(subject + 123456);
	}
AAA
								,

								'uploadSuccess' => <<<AAA
	function (file, response) {
		//等于2或1
		if (response.sign)
		{
			if (response.is_finished == 1)
			{
				console.dir(response)
	
				window.upload_file.push({
					"savename":response.savename,
				});
				
				$(".uploader-preview").find('img').attr({
					'src':response['thumb_url'],
				});
				$(".status-box-text").text('上传完成');
			}
			else
			{
			}
		}
		else
		{
			//服务器处理出错
		}
	}
AAA
								,

								'uploadFinished' => <<<AAA
	function () {
		$('#upload-files').val( btoa(JSON.stringify(window.upload_file)));
		layer.msg('处理完成111111111');
	}
AAA
								,
							], [
								'server'  => "'" . url('upload') . "'" ,
							]) ,

						], [
							'class' => 'col-4' ,
						]) ,


					]) ,
				]) ,
			]);

			return $this->showPage();
		}

	}







