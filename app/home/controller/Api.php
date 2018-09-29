<?php

	namespace app\home\controller;

	class Api extends HomeBase
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