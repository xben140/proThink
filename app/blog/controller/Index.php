<?php

	namespace app\blog\controller;

	class Index extends FrontendBase
	{
		public function __construct()
		{
			parent::__construct();
			$this->logic = $this->logic__blog_blogarticle;
		}

		public function index()
		{
			$t = input('id' , 0);
			$data = $this->logic->dataList();
			//print_r($data[$t]['content']);exit;;
			$this->assign('content' , $data[$t]['content']);

			return $this->fetch();
		}
	}