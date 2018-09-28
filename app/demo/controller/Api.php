<?php

	namespace app\demo\controller;

	class Api extends DemoBase
	{
		public function Api()
		{
			return $this->jump([
				'sign'    => RESULT_SUCCESS ,
				'message' => 'just test' ,
				'url'     => '' ,
			]);
		}

	}