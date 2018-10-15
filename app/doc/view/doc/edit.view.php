<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('编辑');
		$info = $__this->logic->getInfo($__this->param);
		session((URL_MODULE) , $__this->param['id']);

		//获取所有类型
		$journalTypes = $__this->logic__Journaltype->getFormatedData(1);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

				integrationTags::inlineRadio($journalTypes , 'journal_type' , '刊物类型' , '必填' , $info['journal_type']) ,

				integrationTags::inlineRadio(static::$yearMap , 'year' , '年份' , '必填' , $info['year']) ,

				integrationTags::inlineRadio(static::$monthMap , 'month' , '月份' , '必填' , $info['month']) ,

				integrationTags::text([
					//随便写
					'field_name'  => '刊物名' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					'value'       => $info['journal_name'] ,
					//'attr'        => 'disabled' ,
					'name'        => 'journal_name' ,
				]) ,

				integrationTags::singleDate([
					'field_name'  => '安排时间' ,
					'name'        => 'arrange_time' ,
					'value'       => formatTime($info['arrange_time']) ,
					'is_time'     => '1' ,
					'placeholder' => '点击选时间' ,
				]) ,

			] , [
				'id'     => 'form1' ,
				'method' => 'post' ,
				'action' => url() ,
			]) ,

		] , [
			'animate_type' => 'fadeInRight' ,
		]);

	};