<?php

	namespace app\blog\logic;


	class BlogType extends Base
	{

		public function __construct()
		{
			//$this->model_ = $this->{static::makeClassName(static::class , 'model')};
			//$this->validate_ = $this->{static::makeClassName(static::class , 'validate')};
			$this->initBaseClass();
		}
	}