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
		$__this->setPageTitle('通用功能列表');
		$__this->initLogic();

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					integrationTags::rowButton([
					] , [
						0 ,
						2 ,
					]) ,
					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => '操作' ,
								'attr'  => 'style="width:200px;"' ,
							] ,
							[
								'field' => '说明' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '' ,
								'attr'  => 'style="width:200px;"' ,
							] ,
						]);

						$t = integrationTags::tr([
							//操作
							integrationTags::td([
								integrationTags::tdButton([
									'class'      => ' btn-info btn-custom-request' ,
									'data'       => [
										'src'        => url('baseFunc') ,
										'is_reload'  => 0 ,
										'is_confirm' => 1 ,
										'is_alert'   => 1 ,
										'msg'        => '确定发送测试邮件？请确保配置已经填写完好' ,
									] ,
									'params'     => [
										'option' => 'test_email' ,
									] ,
									'value'      => '测试邮箱配置' ,
									'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'baseFunc') ,
								]) ,
							]) ,

							//信息
							integrationTags::td([
								integrationTags::tdTextarea([
									'style'    => 'width:100%;height:100px' ,
									//'name'     => 'remark' ,
									'field'    => 'remark' ,
									//'reg'      => '/^\d{1,4}$/' ,
									//'msg'      => '请填写合法手机号码' ,
									'value'    => (function() {
										$str = '向管理员邮箱发送一个测试邮件，邮箱配置请在“配置列表”中的邮箱分组里修改，当前配置<br />';
										$str .= implode('' , [
											'邮箱账号 : ' . config('email_username') . '<br />' ,
											'邮件服务器端口 : ' . config('email_port') . '<br />' ,
											'邮件用户登陆秘钥 : ' . config('email_password') . '<br />' ,
											'对方显示发件人 : ' . config('email_user') . '<br />' ,
											'邮件服务器 : ' . config('email_host') . '<br />' ,
										]);

										return $str;
									})() ,
									'editable' => 0 ,
								]) ,
							]) ,
							//信息
							integrationTags::td([

							]) ,

						]);;
						$doms = array_merge($doms , $t);


						$t = integrationTags::tr([
							//操作
							integrationTags::td([
								integrationTags::tdButton([
									'class'      => ' btn-info btn-custom-request' ,
									'data'       => [
										'src'        => url('baseFunc') ,
										'is_reload'  => 0 ,
										'is_confirm' => 1 ,
										'is_alert'   => 0 ,
										'msg'        => '确定清除静态页面缓存？' ,
									] ,
									'params'     => [
										'option' => 'clear_cache' ,
										'type'   => 'template' ,
									] ,
									'value'      => '清除静态页面缓存' ,
									'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'baseFunc') ,
								]) ,
							]) ,

							//信息
							integrationTags::td([
								integrationTags::tdTextarea([
									'style'    => 'width:100%;height:100px' ,
									//'name'     => 'remark' ,
									'field'    => 'remark' ,
									//'reg'      => '/^\d{1,4}$/' ,
									//'msg'      => '请填写合法手机号码' ,
									'value'    => (function() {
										$str = '';
										$str .= implode('' , [
											'删除 ' ,
											TEMP_PATH,
											' 目录里的静态缓存文件' ,
										]);

										return $str;
									})() ,
									'editable' => 0 ,
								]) ,
							]) ,
							//信息
							integrationTags::td([

							]) ,

						]);;
						$doms = array_merge($doms , $t);


						$t = integrationTags::tr([
							//操作
							integrationTags::td([
								integrationTags::tdButton([
									'class'      => ' btn-info btn-custom-request' ,
									'data'       => [
										'src'        => url('baseFunc') ,
										'is_reload'  => 0 ,
										'is_confirm' => 1 ,
										'is_alert'   => 0 ,
										'msg'        => '确定清空缓存数据？' ,
									] ,
									'params'     => [
										'option' => 'clear_cache' ,
										'type'   => 'cache' ,
									] ,
									'value'      => '清空缓存数据' ,
									'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'baseFunc') ,
								]) ,
							]) ,

							//信息
							integrationTags::td([
								integrationTags::tdTextarea([
									'style'    => 'width:100%;height:100px' ,
									//'name'     => 'remark' ,
									'field'    => 'remark' ,
									//'reg'      => '/^\d{1,4}$/' ,
									//'msg'      => '请填写合法手机号码' ,
									'value'    => (function() {
										$str = '';
										$str .= implode('' , [
											'调用 Cache::clear() 清空所有缓存数据' ,
										]);

										return $str;
									})() ,
									'editable' => 0 ,
								]) ,
							]) ,
							//信息
							integrationTags::td([

							]) ,

						]);;
						$doms = array_merge($doms , $t);


						$t = integrationTags::tr([
							//操作
							integrationTags::td([
								integrationTags::tdButton([
									'class'      => ' btn-info btn-custom-request' ,
									'data'       => [
										'src'        => url('baseFunc') ,
										'is_reload'  => 0 ,
										'is_confirm' => 1 ,
										'is_alert'   => 0 ,
										'msg'        => '确定清除日志文件？' ,
									] ,
									'params'     => [
										'option' => 'clear_cache' ,
										'type'   => 'log' ,
									] ,
									'value'      => '清除日志文件' ,
									'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'baseFunc') ,
								]) ,
							]) ,

							//信息
							integrationTags::td([
								integrationTags::tdTextarea([
									'style'    => 'width:100%;height:100px' ,
									//'name'     => 'remark' ,
									'field'    => 'remark' ,
									//'reg'      => '/^\d{1,4}$/' ,
									//'msg'      => '请填写合法手机号码' ,
									'value'    => (function() {
										$str = '';
										$str .= implode('' , [
											'删除 ' ,
											LOG_PATH,
											' 目录里的日志文件' ,
										]);

										return $str;
									})() ,
									'editable' => 0 ,
								]) ,
							]) ,
							//信息
							integrationTags::td([

							]) ,

						]);;
						$doms = array_merge($doms , $t);

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '通用功能列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};