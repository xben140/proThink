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
		$__this->setPageTitle('分配权限');
		session(URL_MODULE , $__this->param['id']);

		/**
		 ***************************************************************************************************************
		 *                                                        菜单
		 ***************************************************************************************************************
		 */

		//$resourceMenuIndex = RESOURCE_INDEX_MENU;
		//获取所有有效菜单
		$menus = $__this->logic__admin_Privilege->getActivedData([
			'order_filed' => 'order' ,
			'order'       => 'desc' ,
		]);
		$menus = makeTree($menus);
		$availableMenus = [];
		foreach ($menus as $k => $v)
		{
			(!$v['is_common']) && $availableMenus[] = [
				'value' => $v['id'] ,
				'field' => indentationOptionsByLevel($v['name'] . " -- " . formatMenu($v['module'] , $v['controller'] , $v['action']) , $v['level']) ,
				//'field' => $v['name'] . " -- " . formatMenu($v['module'] , $v['controller'] , $v['action']) ,
			];
		}

		//获取当前角色有的菜单
		$currMenu = $__this->logic->getRolesPrivilegesId($__this->param);

		$menusForms = integrationTags::rowBlock([
			integrationTags::form([

				//blockCheckbox
				//inlineCheckbox
				integrationTags::blockCheckbox($availableMenus , 'privileges[]' , '分配菜单' , '每个角色可分配多个菜单' , $currMenu) ,
				integrationTags::hidden([
					'name' => 'type' ,
					//'value' => $resourceMenuIndex ,
				]) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,
		] , [
			'width'      => '12' ,
			'main_title' => '分配菜单和访问权限' ,
			'sub_title'  => '' ,
		]);

		/**
		 ***************************************************************************************************************
		 *                                                        页面元素
		 ***************************************************************************************************************
		 */


		/**
		 ***************************************************************************************************************
		 *                                                        构造页面
		 ***************************************************************************************************************
		 */
		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				$menusForms ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);


	};