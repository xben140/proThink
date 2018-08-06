<?php

	namespace app\home\controller;

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;

	class Index extends HomeBase
	{
		public function api()
		{
			return $this->success('处理成功');
		}

		/**
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function index()
		{

			//---------------------------- 设置标题
			$this->makePage()->setHead(elementsFactory::singleLabel('<title>主页</title>'));

			//---------------------------- 设置页面类属性
			$this->makePage()->setNodeValue([
				'BODY_ATTR'    => tagConstructor::buildKV([
					'style'    => 'overflow:hidden' ,
					'class'    => 'fixed-sidebar full-height-layout gray-bg' ,
					'data-id'  => 5 ,
					'data-pid' => 6 ,
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

								$doms[] = elementsFactory::singleLabel('<div class="hr-line-dashed"></div>');
								$doms[] = elementsFactory::inlineRadio()->make();

								$doms[] = elementsFactory::singleLabel('<div class="hr-line-dashed"></div>');
								$doms[] = elementsFactory::inlineCheckbox()->make();

							} , [
								'class' => 'test-div' ,
								'id'    => 'div1' ,
							]);

							$path = $this->getTemplatePath(':test');


							$doms[] = elementsFactory::customElementFormPath($path)->make(function(&$doms , $_this) {

								$doms[] = elementsFactory::inlineRadio()->make();
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
			$this->setPageTiele('form测试');

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
			$this->setPageTiele('form测试');

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
			$this->setPageTiele('table测试');
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
									] , 'a3' , '上传时间3' , [2,1]) ,


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
									] , 'c1' ,'用户状态' , '1') ,

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
									] , 'c2'  ,'用户状态' , [
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
			$this->setPageTiele('table测试');
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
												'checked' => '1' ,
												'value'   => '2' ,
												'field'   => '月' ,
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
												'checked' => '1' ,
												'value'   => '2' ,
												'field'   => '月' ,
											] ,
											[
												'value' => '3' ,
												'field' => '日' ,
											] ,
										] , 'nameaaa');
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
												'checked' => '1' ,
												'value'   => '2' ,
												'field'   => '月' ,
											] ,
											[
												'checked' => '1' ,
												'value'   => '3' ,
												'field'   => '日' ,
											] ,
										] , 'namebbbb');

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

	}







