<?php

	namespace app\admin\model;


	use app\common\model\ModelBase;

	class AdminBase extends ModelBase
	{
		public function hello()
		{
			//echo $this->logicalUser;
			echo __METHOD__;
			exit();
		}
	}