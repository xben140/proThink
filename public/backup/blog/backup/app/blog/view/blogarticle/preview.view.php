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



	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this) {
		$this->initLogic();

		//设置标题
		$__this->setPageTitle('博文预览');
		$__this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => '  ' ,]) ,]);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::rowButton([], [0,2]) ,


			integrationTags::a('编辑博文' , [
				'class'  => ' btn btn-info' ,
				'target' => '_self' ,
				'href' => url('editContent' , ['id' => session('blog_id')]) ,
			]) ,

			integrationTags::customElementFormPath($__this->getTemplatePath('preview') , [
				$__this->logic->getInfo($__this->param)['content']
			]),

		] , [
			'animate_type' => 'fadeInRight-' ,
			'attr'         => '' ,
		]);
	};