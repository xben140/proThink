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
		$__this->setPageTitle('日志详细');

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([
					//'<p>出于性能考虑，每次请求会将日志写入日志文件，位于 ' . $__this->logic::$logPath . '</p>' ,

					elementsFactory::staticTable()->make(function(&$doms , $_this) use ($__this) {
						$data = $__this->logic->getFormatedDateil($__this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'key' ,
								'attr'  => 'style="width:30%;"' ,
							] ,
							[
								'field' => 'value' ,
								'attr'  => '' ,
							] ,
						]);

						/**
						 * 设置js请求api
						 */
						$_this->setApi([]);



						foreach ($data as $k => $v)
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

							]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'width'      => '12' ,
					'main_title' => '日志详细' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);


	};