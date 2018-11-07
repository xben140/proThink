<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('地址添加');

		$__this->displayContents = integrationTags::basicFrame([

			integrationTags::form([

				integrationTags::text([
					//随便写
					'field_name'  => '联系人' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					//'value'       => 'value' ,
					//'attr'        => 'disabled' ,
					'name'        => 'name' ,
				]) ,


				integrationTags::text([
					'field_name'  => '电话' ,
					'placeholder' => '' ,
					'tip'         => '必填' ,
					//'value'       => '' ,
					//'attr'        => 'disabled' ,
					'name'        => 'tel' ,
				]) ,


				integrationTags::linkage([] , [
					'url'        => ('/admin/area/getAreaByPid') ,
					'field'      => 'pid' ,
					'method'     => 'post' ,
					'defaultVal' => 1 ,
					'disabled'   => 0 ,
					'liValue'    => 'id' ,
					'liField'    => 'area_name' ,
					'dataType'   => 'json' ,
					'size'       => [
						200 ,
						400 ,
					] ,
					'container'  => [
						[
							'pid'  => 1 ,
							'name' => 'province_id' ,
						] ,
						[
							'name' => 'city_id' ,
						] ,
						[
							'name' => 'county_id' ,
						] ,
					] ,
				]) ,


				integrationTags::textarea([
					'field_name' => '详细地址' ,
					'tip'        => '' ,
					'name'       => 'address' ,
					//'value'      => '' ,
					//'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
				]) ,


				integrationTags::textarea([
					'field_name' => '备注' ,
					'tip'        => '' ,
					'name'       => 'remark' ,
					'value'      => '' ,
					'attr'       => '' ,
					'style'      => 'width:100%;height:150px;' ,
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