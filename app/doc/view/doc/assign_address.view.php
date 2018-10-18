<?php

	use builder\elementsFactory;
	use builder\integrationTags;

	return function($__this) {
		session(md5(URL_MODULE) , $this->param['id']);

		$this->displayContents = integrationTags::basicFrame([
			integrationTags::row([
				integrationTags::rowBlock([

					integrationTags::rowButton([
						[
							[
								'is_display' => 1 ,
								'class'      => 'btn-danger btn-open-pop' ,
								'field'      => '添加地址' ,
								'data'       => [
									'src'   => url('doc/address/add') ,
									'title' => '添加地址' ,
								] ,
							] ,
						] ,
					]) ,


					elementsFactory::staticTable()->make(function(&$doms , $_this) {
						//角色机制注册
						$this->authClass->registerRoleEvent([
							[
								//采编
								'roles'    => [4] ,
								'callback' => function() use (&$journalTypes) {
									//编辑获取指定
									$this->param['uid'] = $this->adminInfo['id'];
								} ,
								'params'   => [] ,
							] ,
						]);


						$data = $this->logic__Address->dataListWithPagination($this->param);

						/**
						 * 设置表格头
						 */
						$_this->setHead([
							[
								'field' => 'ID' ,
								'attr'  => 'style="width:80px;"' ,
							] ,
							[
								'field' => '信息' ,
								'attr'  => 'style="width:220px;"' ,
							] ,
							[
								'field' => '省/市/县' ,
								'attr'  => '' ,
							] ,
							[
								'field' => '详细地址' ,
								'attr'  => 'style="width:auto;"' ,
							] ,
							[
								'attr'  => 'style="width:80px;"' ,
								'field' => '设置地址' ,
								'attr'  => '' ,
							] ,
						]);

						/**
						 * 设置表分页按钮
						 */
						$_this->setPagination($data['pagination']);

						/**
						 * 设置js请求api
						 */
						$_this->setApi([
							'assignAddressUrl' => url('assignAddress') ,
						]);
						$info = $this->logic->getInfo($this->param);


						foreach ($data['data'] as $k => $v)
						{

							/**
							 * 构造tr
							 */
							$t = integrationTags::tr([

								//checkbox
								integrationTags::td([
									integrationTags::tdSimple([
										'value' => $v['id'] ,
									]) ,
								]) ,

								//信息
								integrationTags::td([
									integrationTags::tdSimple([
										'name'     => '联系人 : ' ,
										'editable' => 0 ,
										'value'    => $v['name'] ,
										'field'    => 'name' ,
										'reg'      => '/^\S+$/' ,
										'msg'      => '姓名不能为空' ,
									]) ,
									'<br />' ,
									integrationTags::tdSimple([
										'name'     => '电话 : ' ,
										'editable' => 0 ,
										'value'    => $v['tel'] ,
										'field'    => 'tel' ,
										'reg'      => '/^1\d{10}$/' ,
										'msg'      => '手机格式不对' ,
									]) ,
								]) ,

								//省/市/县
								integrationTags::td([
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['prov_name']) ,
									]) ,
									'/' ,
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['city_name']) ,
									]) ,
									'/' ,
									integrationTags::tdSimple([
										//'name'     => '添加时间' ,
										'editable' => '0' ,
										'value'    => ($v['county_name']) ,
									]) ,
								]) ,


								//详细
								integrationTags::td([
									integrationTags::tdTextarea([
										'style'    => 'width:100%' ,
										//'name'     => 'remark' ,
										'editable' => 0 ,
										'field'    => 'address' ,
										//'reg'      => '/^\d{1,4}$/' ,
										//'msg'      => '请填写合法手机号码' ,
										'value'    => $v['address'] ,
									]) ,
								]) ,

								//操作
								integrationTags::td((function() use ($info , $v) {
									$isThisAddress = $info['address_id'] == $v['id'];
									$res = [];
									if($this->authClass->hasRoleByIds([4]))
									{
										if(!$isThisAddress)
										{
											$res = integrationTags::tdButton([
												'class' => ' btn-warning btn-custom-event' ,
												'data'  => [
													'callback' => 'useAddress' ,
												] ,
												'value' => '使用此地址' ,
											]);

										}
										else
										{
											$res = integrationTags::tdSimple([
												//'name'     => '添加时间' ,
												'editable' => 0 ,
												'value'    => '当前地址' ,
											]);
										}
									}

									return $res;
								})()) ,

							] , ['id' => $v['id']]);

							$doms = array_merge($doms , $t);
						}

					}) ,
				] , [
					'width'      => '12' ,
					'main_title' => '选择地址' ,
					'sub_title'  => '' ,
				]) ,
			]) ,
		]);

	};