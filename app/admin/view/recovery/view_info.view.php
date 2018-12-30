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
		$__this->initLogic();
		session(SESSION_TAG_ADMIN . 'tab_id' , $__this->param['id']);

		$__this->displayContents = integrationTags::basicFrame([
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
								'is_display' => 1 ,
								'class'      => 'btn-danger btn-custom-event' ,
								'field'      => '批量删除' ,
								'data'       => [
									'callback'       => 'regeditMulti' ,
									'event-callback' => 'itemSet' ,
									'callback_'      => 'refresh_page' ,
									'action'         => 'delete' ,
								] ,
							] ,

							[
								'is_display' => 1 ,
								'class'      => 'btn-info btn-custom-event' ,
								'field'      => '批量恢复' ,
								'data'       => [
									'callback'       => 'regeditMulti' ,
									'event-callback' => 'itemSet' ,
									'callback_'      => 'refresh_page' ,
									'action'         => 'recover' ,
								] ,
							] ,


						] ,
					]) ,

					$__this->logic->getDeletedTab($__this->param) ,

				] , [
					'width'      => '12' ,
					'main_title' => '列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};