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
	use builder\tagConstructor;

	return function($__this) {
		//设置标题
		$__this->setPageTitle('主页');
		$__this->makePage()->setNodeValue([
			'BODY_ATTR' => tagConstructor::buildKV([
				'class' => ' gray-bg' ,
				'onload' => 'checkEvn();checkUpdate();' ,
			]) ,
		]);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::customElementFormPath($__this->getTemplatePath('main') , [
				/*
					integrationTags::staticText([
						'field_name' => 'staticText' ,
						'value'      => 'value' ,
					]) ,
				*/
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
			'attr'         => '' ,
		]);


	};
