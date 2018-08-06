<?php

	namespace builder\elements\base;

	use builder\lib\makeBase;

	class customElementFormPath extends makeBase
	{
		public $path = __DIR__;

		public function __construct($customElementPath)
		{
			parent::__construct(file_get_contents($customElementPath));
			$this->_init();
		}
	}


