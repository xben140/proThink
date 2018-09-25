<?php

	namespace zip;

	use ZipArchive;

	class phpZip
	{
		/*
		 * property
		 *
		 * */
		//zip实例
		private static $zip = null;

		//是否写日志
		private static $isLog = 0;

		//日志文件
		private static $log = './log.log';

		//是否echo
		private static $isEcho = 0;

		//保存位置
		private static $fileName = null;

		//是否覆盖同名zip
		private static $isOverwrite = 0;

		//源文件和重命名后文件映射
		private static $copyMap = [];


		//跳过不压缩的文件
		private static $skipFilesReg = [];

		//跳过不压缩的文件夹
		private static $skipDirsReg = [];

		/*
		 *
		//最终的文件构造数组
		[f53593aed939] => Array
		(
			[name] => tel\admin\themes\simplebootx\Admin\header.html
			[path] => F:\localWeb\local1\tel\admin\themes\simplebootx\Admin\header.html
		)
		*/
		private static $dirPath = [];

		/*
		 * method
		 *
		 * */

		//实例化ZipArchive类
		private static function initZip()
		{
			self::$zip = new \ZipArchive();
		}

		private static function regainOptions()
		{
			self::$zip = null;
			self::$isLog = 0;
			self::$log = './log.log';
			self::$isEcho = 0;
			self::$fileName = null;
			self::$isOverwrite = 0;
			self::$copyMap = [];
			self::$dirPath = [];
		}

		//遍历文件夹
		private static function loopDir($path , callable $dirCallback , callable $fileCallback)
		{
			!in_array(substr($path , -1) , [
				'/' ,
				'\\' ,
			]) && ($path .= DIRECTORY_SEPARATOR);

			$dirs = scandir($path);
			foreach ($dirs as $k => $v)
			{
				if(!in_array($v , [
					'.' ,
					'..' ,
				]))
				{
					$fullPath = $path . $v;
					if(is_dir($fullPath))
					{
						$res = $dirCallback($fullPath , $dirs);
						if($res)
						{
							self::loopDir($fullPath , $dirCallback , $fileCallback);
						}
					}
					elseif(is_file($fullPath))
					{
						$fileCallback($fullPath , pathinfo($fullPath));
					}
				}
			}
		}

		//初始化配置文件
		private static function initConfig(array $config)
		{
			foreach ($config as $k1 => $v1)
			{
				switch (strtolower($k1))
				{

					//跳过不压缩的文件名字
					case 'skip_file_reg' :
						{
							self::$skipFilesReg = $v1;
						}
						break;

					//跳过不压缩的文件夹
					case 'skip_dir_reg' :
						{
							self::$skipDirsReg = $v1;
						}
						break;

					//压缩后的zip保存名字
					case 'file_name' :
						{
							!$v1 and exit('未指定保存名 -- file_name');
							!is_dir(realpath(dirname($v1))) && mkdir(realpath(dirname($v1)) , 777 , 1);
							self::$fileName = $v1 ? $v1 : time() . '.zip';
							self::doRocord('指定保存名');

						}
						break;

					//是否覆盖同名zip
					case 'is_overwrite' :
						{
							self::doRocord(!!$v1 ? '设定覆盖同名zip' : '设定不覆盖同名zip');
							self::$isOverwrite = !!$v1;
						}
						break;

					//构造自定义文件
					case 'file_path' :
						{
							$t = isset($v1['save_path']) ? $v1['save_path'] : '';

							foreach ($v1['file_path'] as $k2 => $v2)
							{
								$v2['path'] = (iconv('utf-8' , 'gbk//IGNORE' , $v2['path']));
								$v2['name'] = (iconv('utf-8' , 'gbk//IGNORE' , $v2['name']));
								if(!is_file($v2['path']) || !is_readable($v2['path']))
								{
									self::doRocord("文件不存在 -- " . $v2['path']);
									continue;
								}
								$key = self::randomKey();

								self::$dirPath[$key]['name'] = $v2['name'] ? $t . DIRECTORY_SEPARATOR . $v2['name']    //如果有设置name就更名为name
									: $t . strrchr($v2['path'] , DIRECTORY_SEPARATOR);    //如果没有设置就使用原名
								self::$dirPath[$key]['path'] = $v2['path'];
								self::doRocord("添加自定义文件到任务队列 -- " . $v2['path']);
							}
						}
						break;

					//地址添加指定文件夹
					//构造最终地址
					case 'dir_path' :
						{
							foreach ($v1 as $k3 => $v3)
							{
								//传入路径后面追加目录分隔符
								$v3 = self::addEndSeparator($v3);
								preg_match_all('%^.+?(?=[^\\\\/]+[\\\\/]?$)%im' , $v3 , $result , PREG_PATTERN_ORDER);
								$needReplacement = $result[0][0];

								self::loopDir($v3 , function($path , $dirs) use ($needReplacement) {
									//文件夹名字，在self::$skipDirs里就跳过
									$pathinfo = pathinfo($path);
									$baseName = (iconv('gbk' , 'utf-8//IGNORE' , $pathinfo['basename']));

									foreach (self::$skipDirsReg as $k => $v)
									{
										$flag = preg_match($v , $baseName);
										if($flag) return 0;
									}

									return 1;

								} , function($path , $pathinfo) use ($needReplacement , $v3) {
									//或者文件夹名字，在self::$skipDirs里就跳过
									$baseName = (iconv('gbk' , 'utf-8//IGNORE' , $pathinfo['basename']));
									foreach (self::$skipFilesReg as $k => $v)
									{
										$flag = preg_match($v , $baseName);
										if($flag) return 0;
									}

									$name = str_replace($needReplacement , '' , $path);
									$key = self::randomKey();
									self::$dirPath[$key]['name'] = $name;
									self::$dirPath[$key]['path'] = $path;
									self::doRocord("添加文件到任务队列" . $path);

									return 1;
								});
							}

						}
						break;
				}
			}
		}

		private static function pushFileToZip()
		{
			self::doRocord('队列添加$zip->addFile...');

			foreach (self::$dirPath as $k3 => $v3) self::addItem($v3['path'] , $v3['name']);
			self::doRocord('队列添加$zip->addFile...完成');
		}

		private static function addItem($path , $name)
		{
			//$path = (iconv('utf-8', 'gbk//IGNORE', $path));
			//$name = (iconv('utf-8', 'gbk//IGNORE', $name));

			self::doRocord("添加任务队列" . $path);
			preg_match_all('%(.*?)([^\\\\/\s]+)$%im' , $path , $origin);
			preg_match_all('%(.*?)([^\\\\/\s]+)$%im' , $name , $destination);

			//源文件复制到当前文件夹
			$tpmDir = __DIR__ . DIRECTORY_SEPARATOR . 'copy_tpm' . DIRECTORY_SEPARATOR;
			!is_dir($tpmDir) && mkdir($tpmDir , 777 , 1);

			//源文件位置
			//C:\Users\Administrator\Desktop\process_zip\package\1024px\1024px\1024px.css

			//C:\Users\Administrator\Desktop\process_zip\package\1024px\1024px\
			$originPath = $origin[1][0];
			//1024px.css
			$originName = $origin[2][0];

			//要写入的zip位置
			//1024px\1024px.css

			//1024px\
			$destinationPath = $destination[1][0];
			//1024px.css
			$destinationName = $destination[2][0];
			$encryptedName = md5($path);

			//要复制到的位置
			$des = $tpmDir . $encryptedName;

			self::$copyMap[] = [
				'source'      => $path ,
				'destination' => $des ,
			];

			//复制文件改名后到临时文件夹
			//C:\Users\Administrator\Desktop\process_zip\package\1024px\1024px\1024px.css
			//C:\Users\Administrator\Desktop\process_zip\package\1024px\1024px\9382626ddd04d6df0be56f78cb6087d1
			copy($path , $des);

			//复制的临时文件加入zip
			//C:\Users\Administrator\Desktop\process_zip\package\1024px\1024px\1024px.css
			//1024px\9382626ddd04d6df0be56f78cb6087d1
			self::$zip->addFile($des , $destinationPath . $encryptedName);

			//1024px\9382626ddd04d6df0be56f78cb6087d1
			//1024px\1024px.css
			self::$zip->renameName($destinationPath . $encryptedName , $destinationPath . ($destinationName));
		}

		private static function removeTemp()
		{
			foreach (self::$copyMap as $v) is_file($v['destination']) && unlink($v['destination']);
			$tpmDir = __DIR__ . DIRECTORY_SEPARATOR . 'copy_tpm' . DIRECTORY_SEPARATOR;
			is_dir($tpmDir) && rmdir($tpmDir);
		}

		private static function closeZip()
		{
			self::doRocord('添加完成，self::$zip->close()');

			return self::$zip->close();
		}

		private static function addEndSeparator($path)
		{
			return !in_array(substr($path , -1 , 1) , [
				'/' ,
				'\\' ,
			]) ? $path . DIRECTORY_SEPARATOR : $path;
		}

		private static function randomKey($len = 12)
		{
			return substr(md5(uniqid(microtime() , 1)) , 0 , $len);
		}

		private static function createZip()
		{
			self::doRocord('self::$zip->open...');

			return self::$isOverwrite ? self::$zip->open(self::$fileName , \ZipArchive::CREATE | \ZipArchive::OVERWRITE) : self::$zip->open(self::$fileName , \ZipArchive::CREATE);
		}

		public static function zip()
		{
			$config = func_get_args()[0];
			isset($config['is_log']) && self::initLog($config['is_log']);
			isset($config['is_log']) && self::initEcho($config['is_echo']);
			self::initZip();
			self::initConfig($config);
			if(self::createZip())
			{
				self::pushFileToZip();
				self::closeZip() && self::removeTemp();
				self::regainOptions();

				return self::$fileName;
			}
			else
			{
				//无法创建文件
				return false;
			}
		}


		public static function unzip($config)
		{
			//http://www.jb51.net/article/61678.htm
			$zip = isset($config['zip']) ? $config['zip'] : exit('未指定目标zip');
			$toDir = isset($config['destination']) ? $config['destination'] : '';
			$password = isset($config['password']) ? $config['password'] : '';

			self::initZip();
			$res = self::$zip->open($zip);
			if($res === true)
			{
				if(isset($config['destination']) && $config['destination'])
				{
					preg_match_all('%[^\\\\/.]+?(?=\..+$)%im' , $zip , $result , PREG_PATTERN_ORDER);
					$toDir = self::addEndSeparator($toDir) . $result[0][0];
				}
				else
				{
					preg_match_all('/^[^.]+/im' , $zip , $result , PREG_PATTERN_ORDER);
					$toDir = $result[0][0];
				}

				$t = (!preg_match('/\.\S+$/im' , $toDir)) ? $toDir : dirname($toDir);
				!is_dir($t) && mkdir($t , 777 , 1);
				//$t = iconv('utf-8', 'gbk', $t);

				$password && self::$zip->setPassword($password);
				self::$zip->extractTo($toDir);

				if(self::closeZip())
				{
					return true;
				};
			}
			else
			{
				switch ($res)
				{
					case ZipArchive::ER_EXISTS :
						return [
							'sign' => ZipArchive::ER_EXISTS ,
							'msg'  => '文件已经存在' ,
						];
						break;
					case ZipArchive::ER_INCONS :
						return [
							'sign' => ZipArchive::ER_INCONS ,
							'msg'  => '压缩文件不一致' ,
						];
						break;
					case ZipArchive::ER_INVAL :
						return [
							'sign' => ZipArchive::ER_INVAL ,
							'msg'  => '无效的参数' ,
						];
						break;
					case ZipArchive::ER_MEMORY :
						return [
							'sign' => ZipArchive::ER_MEMORY ,
							'msg'  => '内存错误' ,
						];
						break;
					case ZipArchive::ER_NOENT :
						return [
							'sign' => ZipArchive::ER_NOENT ,
							'msg'  => '没有这样的文件' ,
						];
						break;
					case ZipArchive::ER_NOZIP :
						return [
							'sign' => ZipArchive::ER_NOZIP ,
							'msg'  => '不是有效的压缩文件' ,
						];
						break;
					case ZipArchive::ER_OPEN :
						return [
							'sign' => ZipArchive::ER_OPEN ,
							'msg'  => '不能打开文件' ,
						];
						break;
					case ZipArchive::ER_READ :
						return [
							'sign' => ZipArchive::ER_READ ,
							'msg'  => '读取错误' ,
						];
						break;
					case ZipArchive::ER_SEEK :
						return [
							'sign' => ZipArchive::ER_SEEK ,
							'msg'  => '查找错误' ,
						];
						break;
						dufault: ;
				}
			}

		}

		public static function unRar($config)
		{
			//http://pecl.php.net/package/rar/4.0.0/windows
			//http://www.jb51.net/article/25521.htm

			$zip = isset($config['zip']) ? $config['zip'] : exit('未指定目标zip');
			$toDir = isset($config['destination']) ? $config['destination'] : '';
			$password = isset($config['password']) ? $config['password'] : '';

			self::initZip();

			if(@!$rar_arch = \RarArchive:: open($zip)) return [
				'sign' => 0 ,
				'msg'  => '不是有效的压缩文件' ,
			];

			if(@!$rar_entries = $rar_arch->getEntries()) return [
				'sign' => 0 ,
				'msg'  => '没有有效的文件' ,
			];

			if(isset($config['destination']) && $config['destination'])
			{
				preg_match_all('%[^\\\\/.]+?(?=\..+$)%im' , $zip , $result , PREG_PATTERN_ORDER);
				$toDir = self::addEndSeparator($toDir) . $result[0][0];
			}
			else
			{
				preg_match_all('/^[^.]+/im' , $zip , $result , PREG_PATTERN_ORDER);
				$toDir = $result[0][0];
			}

			foreach ($rar_entries as $k => $v)
			{
				$fileName = $v->getName();

				self::doRocord('解压' . $fileName . '到' . $toDir);
				$v->extract($toDir);
			}

			if($rar_arch->close())
			{
				return true;
			};

		}

		/*
		 *
		 *
		 * 日志
		 * */

		public static function initLogPath($logPath)
		{
			self::$log = $logPath;
		}

		public static function initLog($isLog)
		{
			self::$isLog = $isLog;
		}

		public static function initEcho($isEcho)
		{
			self::$isEcho = $isEcho;
		}

		public static function doLog($log)
		{
			if(self::$isLog) file_put_contents(self::$log , $log . "\r\n" , FILE_APPEND | LOCK_EX);
		}

		public static function doEcho($echo)
		{
			if(self::$isEcho)
			{
				echo $echo . "\r\n";
			}
		}

		public static function doRocord($msg)
		{
			self::doEcho($msg);
			self::doLog($msg);
		}


	}

	/*
		phpZip::zip([
			//加密
			'password'       => 'hello',
			//是否记录日志
			'is_log'       => 1,
			//是否输出
			'is_echo'      => 1,
			//保存文件名字
			'file_name'    => 'cc.zip',
			//'file_name'    => 'F:\localWeb\test.zip',
			//是否覆盖同名zip
			'is_overwrite' => '0',

			//指定文件夹，可递归
			'dir_path'     => [
				'F:\localWeb\local1\sui',
				//'F:\localWeb\local1\tel',
			],


			//正则过滤文件
			'skip_file_reg'     => [
				'#模板之家#u',
				'#3000套#u',
				'#readme.txt#',
				'#说明.txt#u',
			],

			//正则过滤文件夹
			'skip_dir_reg'     => [
				//'#ima(?=ge)#',
			],

			//具体文件路径
			'file_path'    => [
				//独立文件压缩路径
				'save_path' => '/a/b',
				'file_path' => [
					[
						//对新文件命名
						'name' => 'sdf.txt',
						'path' => 'F:\localWeb\local1\zipTest.php',
					],
					[
						//保持文件原名
						'name' => '',
						'path' => 'F:\localWeb\local1\silic.php',
					],
					[
						//保持文件原名
						'name' => '',
						'path' => 'F:\localWeb\local1\silic1.php',
					],
				],
			],


		]);


	*/


	/*
		$res = phpZip::unzip([
			'zip'         => 'C:\Users\Administrator\Desktop\tops_52_AppLayers.zip',
			//'destination' => 'F:\localWeb\local1',
			//'password'    => '123456',
		]);
	*/
	/*

		$res = phpZip::unRar([
			'zip'         => 'C:\Users\Administrator\Desktop\404-error-page2.rar',
			//'zip'         => 'C:\Users\Administrator\Desktop\design-and-consultancy-web-template-5.rar',
			'destination' => 'F:\localWeb\local1',
		]);


		print_r($res);exit;;



	*/






