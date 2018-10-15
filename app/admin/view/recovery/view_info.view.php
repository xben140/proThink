<?php

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
								'class'      => 'btn-danger multi-op multi-item-delete' ,
								'field'      => '批量删除' ,
								'is_display' => $__this->isButtonDisplay(MODULE_NAME , CONTROLLER_NAME , 'delete') ,
							] ,
							[
								'class'      => 'btn-danger multi-op multi-item-recover' ,
								'field'      => '批量恢复' ,
								'is_display' => 1 ,
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