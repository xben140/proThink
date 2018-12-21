<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace image\processor;

	class encrpty
	{
		const DS = DIRECTORY_SEPARATOR;
		const FILE = 1;
		const DIRECTORY = 2;
		const ALL = 3;

		/**
		 * 文件加密
		 *
		 * @param        $from
		 * @param        $to
		 * @param string $slat
		 *
		 * @return array
		 */
		public static function en($from , $to , $slat = 'xxx')
		{
			$data = [
				'sign' => 1 ,
				'msg'  => '' ,
			];
			try
			{
				$imgObj = new \SplFileInfo($from);
				$stram = implode('' , [
						'@@_____' ,
						$slat ,
						'@@_____' ,
						$imgObj->getBasename() ,
						'@@_____' ,
					]) . (file_get_contents($imgObj->getRealPath()));
				$stram = gzcompress($stram);
				file_put_contents(static::replaceToSysSeparator($to) . md5($imgObj->getRealPath()) , ($stram));
			} catch (\Exception $exception)
			{
				$data['sign'] = 0;
				$data['data'] = $exception->getMessage();
			}

			return $data;
		}

		/**
		 * @param        $from
		 * @param        $to
		 * @param string $slat
		 *
		 * @return array
		 */
		public static function de($from , $to , $slat = 'xxx')
		{
			$data = [
				'sign' => 1 ,
				'msg'  => '' ,
			];
			try
			{
				$imgObj = new \SplFileInfo($from);
				$stram = file_get_contents($imgObj->getRealPath());
				$stram = gzuncompress($stram);
				$reg = implode('' , [
					'#' ,
					'^@@_____' ,
					preg_quote($slat , '#') ,
					'@@_____' ,
					'(.*?)' ,
					'@@_____' ,
					'#i' ,
				]);

				preg_match($reg , $stram , $res);
				if(isset($res[1]))
				{
					self::mkdir_($to);
					$result = preg_replace($reg , '' , $stram);
					file_put_contents(static::endDS($to) . $res[1] , $result);
				}
				else
				{
					$data['sign'] = 0;
					$data['data'] = '解密出错';
				}
			} catch (\Exception $exception)
			{
				$data['sign'] = 0;
				$data['data'] = $exception->getMessage();
			}

			return $data;
		}

		/**
		 * 自动为路径后面加DIRECTORY_SEPARATORY
		 *
		 * @param string $path 文件夹路径
		 *
		 * @return string
		 */
		public static function endDS($path)
		{
			return rtrim(rtrim(static::replaceToSysSeparator($path) , '/') , '\\') . static::DS;
		}


		/**
		 * @param $path
		 *
		 * @return string
		 */
		public static function replaceToSysSeparator($path)
		{
			return strtr($path , [
				'\\' => static::DS ,
				'/'  => static::DS ,
			]);
		}

		/**
		 * @param $path
		 *
		 * @return string
		 */
		public static function replaceToUrlSeparator($path)
		{
			return strtr($path , [
				'\\' => '/' ,
			]);
		}

		/**
		 * 格式化字节大小
		 *
		 * @param  number     $size 字节数
		 * @param string |int $de
		 *
		 * @return string            格式化后的带单位的大小
		 */
		public static function byteFormat($size , $de = 2)
		{
			$a = array(
				"B" ,
				"KB" ,
				"MB" ,
				"GB" ,
				"TB" ,
				"PB" ,
			);
			$pos = 0;
			while ($size >= 1024)
			{
				$size /= 1024;
				$pos++;
			}

			return round($size , $de) . " " . $a[$pos];
		}


		/**
		 * 创建文件夹
		 *
		 * @param     $path
		 * @param int $mode
		 *
		 * @return bool
		 */
		public static function mkdir_($path , $mode = 0777)
		{
			return !is_dir(($path)) ? mkdir(($path) , $mode , 1) : @chmod($path , $mode);
		}


		/**
		 * 列出文件夹里文件信息
		 *
		 * @param               $path
		 * @param callable|null $callback
		 * @param int           $flag
		 *
		 * @return array
		 */
		public static function listDir($path , callable $callback = null , $flag = self::ALL)
		{
			$files = [];
			if(is_dir($path) && is_readable($path))
			{
				try
				{
					$directory = new \FilesystemIterator ($path);

					$filter = new \CallbackFilterIterator ($directory , function($current , $key , $iterator) use ($flag) {
						switch ($flag)
						{
							case static::FILE:
								return $current->isFile();
							case static::DIRECTORY:
								return $current->isDir();
							default:
								return true;
						}
					});

					foreach ($filter as $info)
					{
						if(is_callable($callback))
						{
							$files[] = call_user_func_array($callback , [
								$info ,
							]);
						}
						else
						{
							$files[] = $info;
						}
					}

				} catch (\Exception $e)
				{
					$files = [];
				}
			}

			return $files;
		}

	}