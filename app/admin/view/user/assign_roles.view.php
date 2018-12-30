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



	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('用户授权');
		session(URL_MODULE , $__this->param['id']);

		//获取所有有效角色
		$roles_ = $__this->logic__admin_role->getFormatedData();

		//获取当前用户有的角色
		$currRoles = $__this->logic->getUserRoles($__this->param);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([

				integrationTags::rowBlock([
					integrationTags::form([
						//blockCheckbox
						//inlineCheckbox
						integrationTags::blockCheckbox($roles_ , 'roles[]' , '用户角色' , '每个用户只能分配1个角色' , $currRoles) ,
						//integrationTags::blockRadio($roles_ , 'roles[]' , '用户角色' , '为用户分配角色' , isset($currRoles[0]) ? $currRoles[0] : 0) ,
					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '12' ,
					'main_title' => '用户授权' ,
					'sub_title'  => '' ,
				]) ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};