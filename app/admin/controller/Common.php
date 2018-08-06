<?php

	namespace app\admin\controller;

	use app\common\controller\ControllerBase;

	class Common extends ControllerBase
	{
		public function upload()
		{
			if(isset($_FILES['image']))
			{
				$res = uploadImg('image' , function($result) {
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					return $result;
				} ,[200, 200, 1]);
			}
			elseif(isset($_FILES['file']))
			{
				$res = uploadFile('file' , function($result) {
					return $result;
				});
			}


			return json($res);
		}

		public function download()
		{

		}

		public function hello()
		{
			return 123421321;
		}
	}
