<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('编辑博文');
		$__this->initLogic();
		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::rowButton([], [0,2]) ,
			integrationTags::form([
				integrationTags::hidden([
					'name'  => 'field' ,
					'value' => 'content' ,
				]) ,

				integrationTags::hidden([
					'name'  => 'ids' ,
					'value' => session('blog/blogarticle/editcontent') ,
				]) ,

				integrationTags::uediter([
					'left'       => '0' ,
					'right'      => '12' ,
					'field_name' => '' ,
					'name'       => 'val' ,
					'value'      => $__this->logic->getPreview($__this->param) ,
				]) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url('setfield') ,
			]) ,

		]);


	};