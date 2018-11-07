<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('批量设置稿件信息');

		session(md5(URL_MODULE) , $__this->param['ids']);

		//获取所有类型
		$journalTypes = $__this->logic__Journaltype->getFormatedData();


		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::row([

				integrationTags::rowBlock([
					integrationTags::form([

						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'journal_type' ,
						]) ,
						integrationTags::inlineRadio($journalTypes , 'val' , '') ,

					] , [
						'id'     => 'form1' ,
						'method' => 'post' ,
						'action' => url() ,
					] , [

						'success' => /** @lang javascript */
							<<<'AAA'
							function (responseText, statusText) {
								_this.find('button:submit').attr("disabled", false);
								layer.close(loadIndex)
								layer.msg(responseText.msg);	
							}
AAA
						,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '刊物类型' ,
					'sub_title'  => '' ,
				]) ,

				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'journal_name' ,
						]) ,
						integrationTags::text([
							//随便写
							'field_name'  => '' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => '',
							//'attr'        => 'disabled' ,
							'name'        => 'val' ,
						]) ,
					] , [
						'id'     => 'form2' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '刊物名' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'doc_type' ,
						]) ,
						integrationTags::inlineRadio($__this->logic->model_::$docTypeMap , 'val' , '') ,
					] , [
						'id'     => 'form7' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '稿件类型' ,
					'sub_title'  => '' ,
				]) ,

				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'year' ,
						]) ,
						integrationTags::inlineRadio(static::$yearMap , 'val' , '') ,

					] , [
						'id'     => 'form3' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '年份' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'month' ,
						]) ,
						integrationTags::inlineRadio(static::$monthMap , 'val' , '') ,
					] , [
						'id'     => 'form4' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '月份' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'deposit' ,
						]) ,
						integrationTags::text([
							//随便写
							'field_name'  => '' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => '',
							//'attr'        => 'disabled' ,
							'name'        => 'val' ,
						]) ,
					] , [
						'id'     => 'form5' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '定金' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'final_payment' ,
						]) ,
						integrationTags::text([
							//随便写
							'field_name'  => '' ,
							'placeholder' => '' ,
							'tip'         => '必填' ,
							//'value'       => '',
							//'attr'        => 'disabled' ,
							'name'        => 'val' ,
						]) ,
					] , [
						'id'     => 'form6' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '尾款' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'doc_status' ,
						]) ,
						integrationTags::inlineRadio($__this->logic->model_::$docStatusMap , 'val' , '') ,
					] , [
						'id'     => 'form9' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '设置状态' ,
					'sub_title'  => '' ,
				]) ,


				integrationTags::rowBlock([
					integrationTags::form([
						integrationTags::hidden([
							'name'  => 'field' ,
							'value' => 'is_confirm' ,
						]) ,
						integrationTags::inlineRadio([
							[
								'value' => '0' ,
								'field' => '设为未确认' ,
							] ,
							[
								'value' => '1' ,
								'field' => '设为确认' ,
							] ,
						] , 'val' , '') ,
					] , [
						'id'     => 'form10' ,
						'method' => 'post' ,
						'action' => url() ,
					]) ,
				] , [
					'width'      => '4' ,
					'main_title' => '信息确认' ,
					'sub_title'  => '' ,
				]) ,

				/*

					integrationTags::rowBlock([
						integrationTags::form([
							integrationTags::hidden([
								'name'  => 'field' ,
								'value' => 'arrange_time' ,
							]) ,

							integrationTags::singleDate([
								'field_name'  => '' ,
								'name'        => 'val' ,
								'value'       => '' ,
								'is_time'     => '1' ,
								'placeholder' => '点击选时间' ,
							]) ,

						] , [
							'id'     => 'form888' ,
							'method' => 'post' ,
							'action' => url() ,
						]) ,
					] , [
						'width'      => '4' ,
						'main_title' => '安排时间' ,
						'sub_title'  => '' ,
					]) ,
				*/

			]) ,
		] , [
			'animate_type' => 'fadeInRight' ,
		]);
	};