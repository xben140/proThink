<?php

	namespace zip;

	class zip
	{
		public $pclZip = null;

		//第一个参数必传，参数可不传的方法
		public $aMethod = [
			'create' ,
			'add' ,
		];

		//键值形式传的方法
		public $bMethod = [
			'extract' ,
			'delete' ,
		];

		public function __construct($pclZip)
		{
			$this->pclZip = $pclZip;
		}

		public function __call($name , $args)
		{
			$arg = [];
			if(in_array($name , $this->aMethod))
			{
				$arg[] = $args[0];
				$arg = array_merge($arg , $this->parseParam($args[1]));
			}
			elseif(in_array($name , $this->bMethod))
			{
				$arg = $this->parseParam($args[0]);
			}

			return call_user_func_array([
				$this->pclZip ,
				$name ,
			] , $arg);
		}

		/**
		 * @param $param
		 *
		 * @return array
		 */
		public function parseParam($param)
		{
			/*
				[
					[PCLZIP_OPT_REMOVE_PATH ,'localWeb' ,] ,
					[PCLZIP_OPT_REMOVE_ALL_PATH  ] ,
				]
			*/
			$res = [];
			foreach ($param as $k => $v)
			{
				$res[] = $v[0];
				isset($v[1]) && $res[] = $v[1];
			}

			return $res;
		}


	}