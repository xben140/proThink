<?php

	use builder\integrationTags;

	return function($__this) {
		$__this->setPageTitle('修改地址');
		$info = $__this->logic->getInfo($__this->param);

		session(URL_MODULE , $__this->param['id']);

		$__this->displayContents = integrationTags::basicFrame([
			integrationTags::form([

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
							'pid'      => 1 ,
							'name'     => 'province_id' ,
							'selected' => $info['province_id'] ,
						] ,
						[
							'pid'      => $info['province_id'] ,
							'selected' => $info['city_id'] ,
							'name'     => 'city_id' ,
						] ,
						[
							'pid'      => $info['city_id'] ,
							'selected' => $info['county_id'] ,
							'name'     => 'county_id' ,
						] ,
					] ,
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