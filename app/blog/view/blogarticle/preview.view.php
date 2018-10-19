<?php

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