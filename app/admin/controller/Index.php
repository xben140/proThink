<?php

	namespace app\admin\controller;



	class Index extends AdminBase
	{
		public function index()
		{
			return $this->fetch();
		}
	}
