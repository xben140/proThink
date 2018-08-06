<?php

	namespace app\home\controller;

	use rbac\rbac;

	class Test extends HomeBase
	{
		public function index()
		{
			$userInfo = $this->logic__common_user->getInfo(['id' => '1'])->toArray();
			//$userInfo = $this->model__common_user->getRowById(1)->toArray();

			$rbac = new rbac();

			$a = $rbac->user;
			$ba = $rbac->user;

			$a->setData($userInfo);

			print_r($a->getData());
			print_r($a->getField());;;
			print_r($a->getDataByKey('nickname'));exit;;

		}
	}