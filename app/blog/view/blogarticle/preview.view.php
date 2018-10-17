<?php

	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this) {
		$this->initLogic();

		//设置标题
		$__this->setPageTitle('博文预览');
		$__this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => '  ' ,]) ,]);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::customElementFormPath($__this->getTemplatePath('preview') , [
				$__this->logic->getPreview($__this->param)
			]),

		] , [
			'animate_type' => 'fadeInRight' ,
			'attr'         => '' ,
		]);
	};