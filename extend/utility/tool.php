<?php

	namespace utility;

	use curl\curl;

	class tool
	{
		static $api = 'http://www.ithinkphp.org/update.php';

		public static function getUpdate()
		{
			$data = [
				'sign' => 0 ,
				'data' => false ,
			];

			try
			{
				$res = curl::G_(['url' => static::$api ]);
				if($res['info']['http_code'] == 200)
				{
					$data['data'] = $res['content'];
					$data['sign'] = 1;
				}
				else
				{
					$data['data'] = file_get_contents('./static/defaultTemp.html');
				}
			} catch (\Exception $exception)
			{
			}

			return $data;
		}
	}