<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\demo\controller;

	use builder\elementsFactory;
	use builder\integrationTags;
	use builder\tagConstructor;
	//use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use pingyin\PingYin;


	/**
	 * ******************************************************************************************
	 * ******************************************************************************************
	 *                                此类为页面构造器的使用示例
	 * ******************************************************************************************
	 * ******************************************************************************************
	 * Class Example
	 * @package app\demo\controller
	 */
	class Example extends FrontendBase
	{

		public function __construct()
		{

			parent::__construct();
		}

		public function _initialize()
		{
			parent::_initialize();
			elementsFactory::registerMap(config('elements_map'));

			/**
			 * 设置link标签
			 */
			$this->makePage()->setCss(tagConstructor::css([
				'__HPLUS__css/bootstrap.min14ed.css' ,
				'__HPLUS__css/font-awesome.min93e3.css' ,
				"__HPLUS__css/animate.min.css" ,
				"__HPLUS__css/style.min862f.css" ,
				'__STATIC__/css/custom.css' ,
			]));

			/**
			 * 设置head里的js
			 */
			$this->makePage()->setJsLib(tagConstructor::js([
				'__HPLUS__js/jquery.min.js' ,
				'__HPLUS__js/bootstrap.min.js' ,
				'__HPLUS__js/content.min.js' ,
				'__HPLUS__js/plugins/layer/layer.js' ,
			]));

			/**
			 * 设置body之前的js始终加在setJsInvoke上面
			 */
			$this->makePage()->setScript(tagConstructor::js([
				'__STATIC__/js/custom.js' ,
			]));

			/**
			 * 设置body标签闭合之前的js
			 */
			$this->makePage()->setJsInvoke(tagConstructor::js([
				'__CONTROLLER_STATIC_URL__/js/custom.js' ,
			]));


			/**
			 * 设置body属性
			 */
			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'class' => ' gray-bg' ,
				]) ,
			]);

		}


		/**
		 * ******************************************************************************************
		 *                                基础测试
		 * ******************************************************************************************
		 */
		/**
		 * @throws \think\exception\HttpResponseException
		 */
		public function api()
		{
			$this->success();
		}

		/**
		 * @throws \Exception
		 */
		public function exception()
		{
			exception('未授权的访问' , 403);
		}

		/**
		 * ******************************************************************************************
		 *                                表格，表单
		 * ******************************************************************************************
		 */
		/**
		 * 典型的列表示例
		 * 自己写逻辑请参照admin模块下的写法
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function tab()
		{
			$this->setPageTitle('用户列表');

			$this->logic = $this->logic__admin_user;

			//$this->initLogic();

			/**
			 * 把要输出的内容以字符串的形式赋值给 displayContents即可
			 */
			$this->displayContents = integrationTags::basicFrame([

				integrationTags::row([
					integrationTags::rowBlock([

						//生成按钮
						//每个按钮3个属性，
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
									'class'      => 'btn-danger  btn-add' ,
									'field'      => '添加数据' ,
									'is_display' => 1 ,
								] ,
								[
									'class'      => 'btn-danger  multi-op multi-op-del' ,
									'field'      => '批量删除' ,
									'is_display' => 0 ,
								] ,
								[
									'class' => 'btn-primary  multi-op multi-op-toggle-status-enable' ,
									'field' => '批量启用' ,
								] ,
								[
									'class' => 'btn-primary  multi-op multi-op-toggle-status-disable' ,
									'field' => '批量禁用' ,
								] ,
							] ,
						]) ,

						//生成静态表格
						elementsFactory::staticTable()->make(function(&$doms , $_this) {

							//取出数据，这里测试数据我们使用用户表里的数据

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
									'field' => '头像' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '账户' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '联系方式' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '时间' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '登陆次数' ,
									'attr'  => '' ,
								] ,
								[
									'field' => '状态 (允许登陆)' ,
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
								'deleteUrl'      => url('delete') ,
								'setFieldUrl'    => url('setField') ,
								'detailUrl'      => url('detail') ,
								'editUrl'        => url('edit') ,
								'addUrl'         => url('add') ,
								'editPwdUrl'     => url('editPwd') ,
								'assignRolesUrl' => url('assignRoles') ,
							]);

							/**
							 * 设置表格搜索框
							 *searchFormCol
							 */
							$searchForm = elementsFactory::searchForm()->make(function(&$doms , $_this) {
								$_this->setIsDisplay(1);

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


								$roles_ = $this->logic__admin_role->getFormatedData();
								$k = $roles_;
								array_unshift($k , [
									'value' => -1 ,
									'field' => '全部' ,
								]);

								//角色
								$t = integrationTags::searchFormCol([
									integrationTags::searchFormSelect($k , 'role_id' , '用户角色' , input('role_id' , -1)) ,
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

							//遍历数据生成表格
							foreach ($data['data'] as $k => $v)
							{
								/**
								 * 构造tr
								 */
								$t = integrationTags::tr([

									//checkbox
									integrationTags::td([
										integrationTags::tdSimple([
											'value'      => $v['id'] ,
											'is_display' => (function() use ($v) {
												//是管理员id不显示id
												if(isGlobalManagerId($v['id'])) return false;

												return 1;
											})() ,
										]) ,
										integrationTags::tdCheckbox((function() use ($v) {
											//管理员id 和 自己的
											if(isGlobalManagerId($v['id'])) return false;
											if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

											return true;
										})()) ,
									]) ,

									//头像
									//data-href="/admin/User/editProfilePic" data-text="修改头像"
									integrationTags::td([
										integrationTags::tdSimple([
											'value' => elementsFactory::singleLabel(integrationTags::singleLabel('img' , [
												'src'             => generateProfilePicPath($v['profile_pic'] , 1) ,
												'style'           => 'height: 65px;' ,
												'class'           => 'preview-img index_pop' ,
												'data-origin-src' => generateProfilePicPath($v['profile_pic'] , 0) ,
												'data-condition'  => formatMenu(static::class , 'profile_pic' , $v['id']) ,
												'data-text'       => '修改图片' ,
											])) ,
										]) ,
									]) ,

									//用户名
									integrationTags::td([
										integrationTags::tdSimple([
											'name'     => '姓名 : ' ,
											'value'    => $v['nickname'] ,
											'field'    => 'nickname' ,
											//'reg'      => '/^\S+$/' ,
											//'msg'      => '请填写合法手机号码' ,
											'editable' => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return true;

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']);
											})() ,
										]) ,
										'<br/>' ,
										integrationTags::tdSimple([
											'name'       => '用户名 : ' ,
											'value'      => $v['user'] ,
											'is_display' => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return true;

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']);
											})() ,
										]) ,
										'<br/>' ,

										integrationTags::tdSimple([
											'name'     => '角色 : ' ,
											'value'    => $v['role'] ,
											'editable' => 0 ,
										]) ,
									]) ,

									//联系方式
									integrationTags::td([
										integrationTags::tdSimple([
											'name'     => 'email : ' ,
											'value'    => $v['email'] ,
											'field'    => 'email' ,
											'reg'      => '/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/' ,
											'msg'      => '请填写合法email' ,
											'editable' => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return true;

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']);
											})() ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'     => '电话 : ' ,
											'value'    => $v['phone'] ,
											'field'    => 'phone' ,
											'reg'      => '/^1\d{10}$/' ,
											'msg'      => '请填写合法手机号码' ,
											'editable' => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return true;

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']);
											})() ,

										]) ,
										'<br/>' ,
										integrationTags::tdSelect([
											'is_display' => 1 ,
											'name'       => 'gender' ,
											'field_name' => '性别 :' ,
											'selected'   => $v['gender'] ,
											'options'    => $this->logic::$sexMap ,
											'disabled'   => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return '';

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']) ? '' : 'disabled';
											})() ,
										]) ,

									]) ,

									//时间
									integrationTags::td([
										integrationTags::tdSimple([
											'name'     => '注册时间' ,
											'editable' => '0' ,
											'value'    => formatTime($v['time']) ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'     => '登陆时间' ,
											'editable' => '0' ,
											'value'    => formatTime($v['last_login_time']) ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'     => '注册IP' ,
											'editable' => '0' ,
											'value'    => $v['reg_ip'] ,
										]) ,
										'<br>' ,
										integrationTags::tdSimple([
											'name'     => '登陆IP' ,
											'editable' => '0' ,
											'value'    => $v['last_login_ip'] ,
										]) ,
									]) ,


									//登陆次数
									integrationTags::td([
										integrationTags::tdSimple([
											//'name'     => '登陆次数' ,
											'editable' => '0' ,
											'value'    => $v['login_count'] ,
										]) ,
									]) ,

									//用户状态
									integrationTags::td([
										integrationTags::tdSwitcher([
											'params'  => [
												'checked'         => $v['status'] ? 'checked' : '' ,
												'disabled'        => '' ,
												'name'            => 'status' ,
												'change_callback' => 'switcherUpdateField' ,
												//switcherUpdateFieldConfirm
												//switcherUpdateField
												'is_display'      => (function() use ($v) {
													//管理员id 和 自己的
													if(isGlobalManagerId($v['id'])) return false;
													if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

													return true;
												})() ,
											] ,
											'name'    => '无需确认' ,
											'is_auto' => '1' ,

										]) ,
										'<br>' ,
										integrationTags::tdSwitcher([
											'params'  => [
												'checked'          => $v['status'] ? 'checked' : '' ,
												'name'             => 'status' ,
												'change_callback'  => 'switcherUpdateFieldConfirm' ,
												'success_callback' => 'refresh_page' ,
												'disabled'         => '' ,
												'is_display'       => (function() use ($v) {
													//管理员id 和 自己的
													if(isGlobalManagerId($v['id'])) return false;
													if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

													return true;
												})() ,
											] ,
											'name'    => '需要确认' ,
											'is_auto' => '0' ,
										]) ,
									]) ,

									//操作
									integrationTags::td([

										integrationTags::tdButton([
											'class'  => ' btn-success btn-edit' ,
											'value' => '编辑' ,
											'is_display' => 0 ,
										]) ,


										integrationTags::tdButton([
											'class'      => ' btn-info btn-modify-pwd' ,
											'value'      => '修改密码' ,
											'is_display' => (function() use ($v) {
												//是管理员的话所有人名字都可以改
												if(isGlobalManager()) return true;

												//除管理员的只能自己，其他人都可以改
												return !isGlobalManagerId($v['id']);
											})() ,
										]) ,
										integrationTags::tdButton([
											'class'      => ' btn-info btn-assign-role' ,
											'value'      => '用户授权' ,
											'is_display' => (function() use ($v) {
												//管理员id 和 自己的
												if(isGlobalManagerId($v['id'])) return false;

												return true;
											})() ,
										]) ,

										'<br>' ,

										integrationTags::tdButton([
											'class'      => ' btn-danger btn-delete' ,
											'value'      => '删除' ,
											'is_display' => (function() use ($v) {
												//管理员id 和 自己的
												if(isGlobalManagerId($v['id'])) return false;
												if($v['id'] == getAdminSessionInfo('user' , 'id')) return false;

												return true;
											})() ,
										]) ,


									]) ,

								] , ['id' => $v['id']]);

								$doms = array_merge($doms , $t);
							}

						}) ,
					] , [
						'main_title' => '用户列表' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			]);


			/**
			 * 输出内容
			 * 使用此方法为调用我们自己开发的模板构造引擎生成页面
			 * 调用fetch方法为tp自带的模板引擎，此项目统一都使用我们自己的模板构造引擎，没有使用tp自带的模板引擎
			 */
			return $this->showPage();
		}


		/**
		 * 典型的表单使用示例
		 * 自己写逻辑请参照admin模块下的写法
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function form()
		{
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			//设置标题
			$this->setPageTitle('form测试');

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						integrationTags::form([

							/**
							 * 静态文本
							 */
							integrationTags::staticText([
								'field_name' => 'staticText' ,
								'value'      => '静态文本' ,
							]) ,

							/**
							 * 标准文本框
							 */
							integrationTags::text([
								'field_name'  => 'text' ,
								'placeholder' => 'placeholder' ,
								'tip'         => 'text' ,
								'value'       => '标准文本框' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							]) ,


							/**
							 * 密码框
							 */
							integrationTags::password([
								//随便写
								'field_name'  => 'text' ,
								'placeholder' => 'placeholder' ,
								'tip'         => 'text' ,
								'value'       => '密码框' ,
								//'attr'        => 'disabled' ,
								'name'        => 'text' ,
							] , 1) ,


							/**
							 * 行内复选
							 */
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
							] , 'inlineCheckbox' , '行内复选' , '提示信息' , [
								1 ,
								3 ,
							]) ,


							/**
							 * 行内单选
							 */
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
							] , 'inlineRadio' , '行内单选' , '行内单选' , 2) ,

							/**
							 * 多行复选
							 */
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
							] , 'blockCheckbox' , '多行复选' , '多行复选' , [
								1 ,
								3 ,
							]) ,

							/**
							 * 多行单选
							 */
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
							] , 'blockRadio' , '多行单选' , '多行单选' , 2) ,


							/**
							 * select
							 */
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
							] , 'select' , 'select' , 'select' , 2) ,


							/**
							 * 区域联动选择
							 */
							integrationTags::linkage([] , [
								'url'        => ('/admin/area/getAreaByPid') ,
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
										'pid'      => 1 ,
										'name'     => 'province_id' ,
										'selected' => 11 ,
									] ,
									[
										'pid'      => 11 ,
										'selected' => 154 ,
										'name'     => 'city_id' ,
									] ,
									[
										'pid'      => 154 ,
										'selected' => 1307 ,
										'name'     => 'county_id' ,
									] ,
								] ,
							]) ,



							/**
							 * 开关
							 */
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
								'value'      => '1' ,
								//表单value对应名字,$data里的字段
								'field'      => 'name' ,
							]) ,







							/**
							 * 日期选择
							 */
							integrationTags::singleDate([
								'field_name'  => '日期' ,
								'name'        => 'singleDate' ,
								'value'       => '' ,
								'is_time'     => '1' ,
								'placeholder' => '点击选时间' ,
							]) ,





							/**
							 * 日期区间选择
							 */
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



							/**
							 * 多行文本框
							 */
							integrationTags::textarea([
								'field_name' => 'textarea' ,
								'name'       => 'textarea' ,
								'value'      => '11' ,
								'attr'       => '' ,
								'style'      => 'width:100%;height:200px;' ,
							]) ,





							/**
							 * uediter
							 */
							integrationTags::uediter([
								'field_name' => 'uediter' ,
								'name'       => 'uediter' ,
								'value'      => '设置文本' ,
							]) ,







							/**
							 * summernote
							 */
							integrationTags::summernote([
								'field_name' => 'summernote' ,
								'name'       => 'summernote' ,
								'value'      => '设置文本' ,
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

		/**
		 * ******************************************************************************************
		 *                                execl导入，导出，邮件，二维码，下载
		 * ******************************************************************************************
		 */

		/**
		 * 典型导出execl
		 * @return string
		 * @throws \PhpOffice\PhpSpreadsheet\Exception
		 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
		 */
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

			/**
			 * 如果设置了这个回调，则只有添加在data上的数据会被导出
			 *
			 * @param $v
			 * @param $data
			 */
			$func = function($v , &$data) {
				//$v['is_menu'] && ($data[] =  $v);
				($data[] = $v);
			};
			exportExcel($list , $fileName , $func , false);

			return 'done';
		}


		/**
		 * 典型读取execl
		 * @throws \PhpOffice\PhpSpreadsheet\Exception
		 * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
		 */
		public function importExcel()
		{
			$path = 'C:\Users\Administrator\Desktop\\';
			$fileName = $path . '测试.xlsx';

			$data = importExcel($fileName);
			print_r($data);
			exit;;
		}


		/**
		 * 生二维码
		 */
		public function generateQrcode()
		{
			$path = 'C:\Users\Administrator\Desktop\\';
			$fileName = $path . '3.png';

			//generateQrcode('http://www.hao123.com' , false , 3 , 10);
			generateQrcode('http://www.hao123.com' , $fileName , 3 , 10);
		}


		/**
		 * 发邮件
		 * 发之前在菜单的配置里，把邮箱组里的数据填好
		 */
		public function sendEmail()
		{
			//参考
			//https://blog.csdn.net/Edu_enth/article/details/53114818
			//https://swiftmailer.symfony.com/docs/messages.html
			//https://www.helloweba.net/php/457.html

			$title = 'just title';
			$body = '163邮件是支持普通连接和SSL连接两种方式的，这里我们推荐使用 ssl 连接方式。';
			$to = [
				getAdminSessionInfo(SESSOIN_TAG_USER , 'email')  => 'by hello' ,
			];
			$res = sendEmail($title , $body , $to , $err);
			print_r($res);
			print_r($err);
			exit;;
		}


		/**
		 * 下载器
		 */
		public function download()
		{
			$file = 'C:\Users\Administrator\Desktop\t.php';
			$saveName = 'dd.php';

			//$downloader = new downloader($file, $saveName);
			//$downloader->send();

			downloadFile($file , $saveName);
		}


		/**
		 * ******************************************************************************************
		 *                                文件上传
		 * ******************************************************************************************
		 */
		/**
		 * 上传文件测试用的api
		 * @throws \LogicException
		 * @throws \RuntimeException
		 * @throws \think\image\Exception
		 */
		public function uploadApi()
		{
			if(isset($_FILES['image']))
			{
				$res = uploadImg('image' , function($result) {
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					//TODO 文件上传成功的回调，可以在这里添加写数据库的逻辑

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
					//TODO 文件上传成功的回调，可以在这里添加写数据库的逻辑
					return $result;
				});
			}

			return $this->result($res , 1 , '更新成功' , 'json');
		}


		/**
		 * 单图 实时更新
		 */
		public function uploadImg1()
		{

			//设置标题
			$this->setPageTitle('上传测试');
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						/*
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),
						*/


						integrationTags::upload(SINGLE_IMG , [
							[
								'title' => '上传须知' ,
								'items' => [
									'支持jpg，png，gif格式' ,
									'图片大小不超过2M' ,
								] ,
							] ,
						] , [

							'uploadSuccess' => <<<AAA
function (file, response) {
	if (response.code == 1)
	{
		if (response.is_finished == 1)
		{
			$(".uploader-preview").find('img').attr({
				'src':response.data.thumb_url,
			});
			
			$(".profile_pic_preview").attr({
				'src':response.data.url,
			});
			
			$(".status-box-text").text('更新成功');
			
			setTimeout(function(){
			//	layer.close()
			}, 400);
		}
		else
		{
			//分片上传完成
		}
	}
	else
	{
		//服务器处理出错
	}
}
AAA
							,
						] , [
							'server' => "'" . url('uploadApi') . "'" ,
							'accept' => json_encode([
								'extensions' => 'jpg,jpeg,png,gif' ,
								'mimeTypes'  => 'image/*' ,
							]) ,
						]) ,

					] , [
						'width'      => '6' ,
						'main_title' => '' ,
						'sub_title'  => '' ,
					]) ,

					integrationTags::rowBlock((function() {
						return [
							elementsFactory::doubleLabel('div' , function(&$doms) {

								$doms[] = elementsFactory::singleLabel(function(&$doms) {

									//$param = session(SESSION_TAG_ADMIN.'updateImage_condition');
									//$info = $this->logic->getInfo(['id' => $param['id']]);
									//$imageUrl = generateProfilePicPath($info[$param['field']], 0);

									$doms = integrationTags::singleLabel('img' , [
										'src'   => '' ,
										'class' => 'profile_pic_preview' ,
									]);

								});

							} , [
								'class' => 'test-div' ,
								'id'    => 'div1' ,
							]) ,
						];


					})() , [
						'width'      => '6' ,
						'main_title' => '' ,
						'sub_title'  => '' ,
					]) ,
				]) ,
			] , [
				'animate_type' => 'fadeInRight' ,
				'attr'         => '' ,
			]);

			return $this->showPage();
		}


		/**
		 * 单文件 实时更新
		 */
		public function uploadFile1()
		{

			//设置标题
			$this->setPageTitle('上传测试');
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						/*
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),
						*/


						integrationTags::upload(SINGLE_FILE , [
							[
								'title' => '上传须知' ,
								'items' => [
									'单个文件最大50M' ,
									'如有附件则上传，没有附件则无需上传' ,
									'备注必须填写，填写以后点击提交，如果上传附件后没有提交，记录将不会保存至服务器' ,
									//'允许的上传格式有.doc .docx .wps' ,
								] ,
							] ,
						] , [
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
	if (response.code == 1)
	{
		if (response.data.is_finished == 1)
		{
		
			$(".status-box-text").text('更新成功');
			
		}
		else
		{
			//分片上传完成
		}
	}
	else
	{
		//服务器处理出错
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
							'server'  => "'" . url('uploadApi') . "'" ,
							'threads' => 3 ,
							'accept'  => json_encode([
								'extensions' => '*' ,
								'mimeTypes'  => '*' ,
							]) ,
						]) ,

					] , [
						'width'      => '12' ,
						'main_title' => '' ,
						'sub_title'  => '' ,
					]) ,

				]) ,
			] , [
				'animate_type' => 'fadeInRight' ,
				'attr'         => '' ,
			]);

			return $this->showPage();
		}


		/**
		 * 多图 实时更新
		 */
		public function uploadImg2()
		{

			//设置标题
			$this->setPageTitle('上传测试');
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

			$this->displayContents = integrationTags::basicFrame([
				integrationTags::row([
					integrationTags::rowBlock([
						/*
							integrationTags::rowButton([
								[
									[
										'class' => 'btn-info ' ,
										'field' => '重新上传' ,
										'attr' => 'onclick="location.reload()"' ,
									] ,
								],
							]),
						*/


						integrationTags::upload(MULTI_IMG , [
							[
								'title' => '上传须知' ,
								'items' => [
									'单次最多添加300个文档' ,
									'单个文档最大50M' ,
									'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
									'允许的上传格式有.doc .docx .wps' ,
								] ,
							] ,
						] , [
							'beforeFileQueued' => <<<AAA
	function (file) {
		var subject = $.trim(file.name);
		//layer.msg(subject + 123456);
	}
AAA
,

							'uploadSuccess' => <<<AAA
	function (file, response) {
		//等于2或1
		if (response.code)
		{
			if (response.data.is_finished == 1)
			{
				console.dir(response)
	
				window.upload_file.push({
					"savename":response.data.savename,
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
						] , [
							'server' => "'" . url('uploadApi') . "'" ,
						]) ,

					] , [
						'width'      => '12' ,
						'main_title' => '' ,
						'sub_title'  => '' ,
					]) ,

				]) ,
			] , [
				'animate_type' => 'fadeInRight' ,
				'attr'         => '' ,
			]);

			return $this->showPage();
		}


		/**
		 * 多图 实时更新
		 */
		public function uploadFile2()
		{

			//设置标题
			$this->setPageTitle('上传测试');
			$this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

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
							] ,
						]) ,

						integrationTags::upload(MULTI_FILE , [
							[
								'title' => '上传须知' ,
								'items' => [
									'单次最多添加300个文档' ,
									'单个文档最大50M' ,
									'所有文件总大小最大200M，如果需要上传的大文档过多，请分多次上传' ,
									'允许的上传格式有.doc .docx .wps' ,
								] ,
							] ,
						] , [
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
			
			
			if (!response.sign)
			{
				//上传出错
				oLi.append('<span class="upload-status '+map[response.sign]+'" >'+response.msg+'</span>');
			}
			else if (response.is_finished == 1)
			{
				//上传完成
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
							'server'  => "'" . url('uploadApi') . "'" ,
							'threads' => 10 ,
							'accept'  => json_encode([
								'extensions' => 'doc,docx,wps' ,
								'mimeTypes'  => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ,
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


		/*
		 *
			 * ******************************************************************************************
			 * ******************************************************************************************
			 *                                下面部分仅供参考不建议使用
			 *
			 * ******************************************************************************************
			 * ******************************************************************************************
		 *
		 *
		 * */


		/**
		 * 表格原生写法，仅供参考，不建议使用
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function tab1()
		{
			$this->setPageTitle('table测试');


			//公用mate
			$mates[] = elementsFactory::singleLabel('<meta charset="utf-8">');
			//$mates[] = elementsFactory::singleLabel('<link rel="shortcut icon" href="">');
			$mates[] = elementsFactory::singleLabel('<!--[if lt IE 9]><meta http-equiv="refresh" content="0;ie.html" /><![endif]-->');
			$mates[] = elementsFactory::singleLabel('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
			$mates[] = elementsFactory::singleLabel('<meta name="viewport" content="width=device-width, initial-scale=1.0">');

			$mates[] = tagConstructor::mate([
				'name'    => 'viewport' ,
				'content' => 'width=device-width' ,
			]);
			$mates[] = tagConstructor::mate([
				'name'    => 'keywords' ,
				'content' => '' ,
			]);
			$mates[] = tagConstructor::mate([
				'name'    => 'description' ,
				'content' => '' ,
			]);
			$mates[] = tagConstructor::mate('name="renderer" content="webkit"');

			$this->makePage()->setHead($mates);

			$this->makePage()->setNodeValue([
				'BODY_ATTR' => tagConstructor::buildKV([
					'class' => ' gray-bg' ,
				]) ,
			]);


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
											'field'       => '昵称' ,
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
											'field'       => '昵称' ,
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
											'field' => '昵称' ,

											'value1'       => '昵称' ,
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
											'field' => '昵称' ,

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
										'class' => ' btn-success btn-edit' ,
										'value' => '编辑' ,
									]) ,
									integrationTags::tdButton([
										'class' => ' btn-info btn-detail' ,
										'value' => '详细' ,
									]) ,
									integrationTags::tdButton([
										'class' => ' btn-danger btn-delete' ,
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

		/**
		 * 表达构造器简单原生写法，仅供参考，不建议使用
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function form1()
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
									'url'        => ('/admin/area/getAreaByPid') ,
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

		public function testInjection()
		{
			$a = $this->logic__common_Config;
			$b = model('common/Config' , 'logic');

			var_dump($a === $b);
			var_dump($a);
			exit;;
		}




/*
		public function testInjection(\think\Request $request)
		{
			$request = \think\Request::instance();

			//$request = $request;
		}*/


	}