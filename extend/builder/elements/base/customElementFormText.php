<?php

	namespace builder\elements\base;

	use builder\lib\makeBase;

	class customElementFormText extends makeBase
	{
		public $path = __DIR__;

		public function __construct($contents)
		{
			parent::__construct($contents);
			$this->_init();
		}
	}


