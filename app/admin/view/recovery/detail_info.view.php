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



	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('回收站列表');
		$__this->initLogic();


		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {

						$tableId = session(SESSION_TAG_ADMIN . 'tab_id');
						$data = $__this->logic->getDetailInfo($this->param['id'] , $tableId);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'key' ,
								'attr'  => '' ,
							] ,
							[
								'field' => 'value' ,
								'attr'  => '' ,
							] ,
							[
								'field' => 'comments' ,
								'attr'  => '' ,
							] ,
						]);


						foreach ($data['data'] as $k => $v)
						{
							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								integrationTags::td([
									integrationTags::tdSimple([
										'value' => $k ,
									]) ,
								]) ,
								integrationTags::td([
									integrationTags::tdSimple([
										'value' => $v ,
									]) ,
								]) ,

								integrationTags::td([
									integrationTags::tdSimple([
										'value' => '' ,
									]) ,
								]) ,

							]);

							$doms = array_merge($doms , $t);
						}

					}) ,

				] , [
					'width'      => '12' ,
					'main_title' => '列表' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};