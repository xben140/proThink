<?php

	use builder\integrationTags;
	use builder\tagConstructor;

	return function($__this){
	//设置标题
	$__this->setPageTitle('主页');
	$__this->makePage()->setNodeValue(['BODY_ATTR' => tagConstructor::buildKV(['class' => ' gray-bg' ,]) ,]);

	$__this->displayContents = integrationTags::basicFrame([
		integrationTags::customElementFormPath($__this->getTemplatePath('main') , [
			/*
								integrationTags::staticText([
									'field_name' => 'staticText' ,
									'value'      => 'value' ,
								]) ,
							*/
		])

	] , [
		'animate_type' => 'fadeInRight' ,
		'attr'         => '' ,
	]);

	return $__this->showPage();

};
