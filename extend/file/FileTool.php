<?php

	namespace file;

	use think\Exception;

	class FileTool
	{
		/**
		 *
		 */
		const DS = DIRECTORY_SEPARATOR;


		public static function recursiveCp($path , $dest , callable $fitlerCallback = null)
		{
			$info = new \SplFileInfo($path);

			$info->isFile() ? self::cp($info->getPathname() , self::endDS($dest) . $info->getBasename()) : self::itreatorBFS($path , function($info , $relativePath) use ($dest , $fitlerCallback) {
				$isCopy = true;
				(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($isCopy = false);
				$isCopy && self::cp($info->getPathname() , self::endDS($dest) . $relativePath);

				return true;
			});
		}

		public static function recursiveMv($path , $dest , callable $fitlerCallback = null)
		{
			$info = new \SplFileInfo($path);

			$info->isFile() ? self::mv($info->getPathname() , self::endDS($dest) . $info->getBasename()) : self::itreatorBFS($path , function($info , $relativePath) use ($dest , $fitlerCallback) {
				$isCopy = true;
				(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($isCopy = false);
				$isCopy && self::mv($info->getPathname() , self::endDS($dest) . $relativePath);

				return true;
			});
		}

		public static function recursiveRm($path , callable $fitlerCallback = null)
		{
			$info = new \SplFileInfo($path);

			$info->isFile() ? self::rm($info->getPathname()) : self::itreatorBFS($path , function($info , $relativePath) use ($fitlerCallback) {
				$isCopy = true;
				(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($isCopy = false);
				$isCopy && self::rm($info->getPathname());

				return true;
			});
		}

		/**
		 * 广度优先迭代
		 * 带条件条件停止遍历功能
		 *
		 * @param          $path
		 * @param callable $callback
		 */
		public static function itreatorBFS($path , callable $callback)
		{
			$dirs = [realpath($path)];
			static $originPath = null;
			!$originPath && $originPath = self::endDS($path);
			do
			{
				$item = array_shift($dirs);
				if(!$item) continue;

				if(is_dir($item))
				{
					$item = self::endDS($item);
					$relativePath = str_replace($originPath , '' , $item);

					$dirs_ = scandir($item);
					$res = $callback(new \SplFileInfo($item) , $relativePath);
					if($res)
					{
						$dirs_ = array_map(function($v) use ($item) {
							return (!in_array($v , [
								'.' ,
								'..' ,
							])) ? $item . $v : '';
						} , $dirs_);
						$dirs = array_merge($dirs , $dirs_);
					}
					else
					{
						break;
					}
				}
				elseif(is_file($item))
				{
					$relativePath = str_replace($originPath , '' , $item);
					$callback(new \SplFileInfo($item) , $relativePath);
				}

				// file_put_contents('dd.txt', $item."\r\n", FILE_APPEND|LOCK_EX);
			} while (count($dirs));
		}

		/**
		 * 深度优先迭代
		 * 带条件条件停止遍历功能
		 *
		 * @param          $path
		 * @param callable $callback
		 *
		 * @return void
		 */
		public static function itreatorDFS($path , callable $callback)
		{
			static $dep = 0;
			static $originPath = null;

			$path = self::endDS($path);
			($dep === 0) && (!$originPath) && ($originPath = $path);
			$dep++;

			$dirs = scandir($path);
			foreach ($dirs as $k => $v)
			{
				if(!in_array($v , [
					'.' ,
					'..' ,
				]))
				{
					$fullPath = $path . $v;
					$relativePath = str_replace($originPath , '' , $fullPath);

					if(is_dir($fullPath))
					{
						$res = $callback(new \SplFileInfo($fullPath) , $relativePath);
						if($res)
						{
							self::itreatorDFS($fullPath , $callback);
						}
					}
					elseif(is_file($fullPath))
					{
						$relativePath = str_replace($originPath , '' , $fullPath);
						$callback(new \SplFileInfo($fullPath) , $relativePath);
					}
					//file_put_contents('cc.txt', $fullPath."\r\n", FILE_APPEND|LOCK_EX);
				}
			}
			$dep--;

			($dep === 0) && ($originPath = null);
		}

		/**
		 * @param $path
		 *
		 * @return string
		 */
		public static function getExt($path)
		{
			return self::fileInfo($path)['ext'];
		}

		/**
		 * 获取一个路径(文件夹&文件) 父目录
		 * /test/11/==>/test/
		 * /www/test/1.c ==>/www/test/
		 *
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function getPath($path)
		{
			return self::fileInfo($path)['dirpath'];
		}

		/**
		 * 获取一个路径(文件夹&文件) 当前文件[夹]名
		 * test/11/ ==>11
		 * test/1.c  ==>1.c
		 *
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function getName($path)
		{
			return self::fileInfo($path)['name'];
		}

		/**
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function isWritable($path)
		{
			return self::fileInfo($path)['isWritable'];
		}


		/**
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function isReadable($path)
		{
			return self::fileInfo($path)['isReadable'];
		}


		/**
		 * 获取文件详细信息
		 * 文件名从程序编码转换成系统编码,传入utf8，系统函数需要为gbk
		 *
		 * @param $path
		 *
		 * @return array
		 */
		public static function fileInfo($path)
		{
			$info = [
				'name'         => '' ,
				'path'         => '' ,
				'ext'          => '' ,
				'type'         => '' ,
				'mode'         => '' ,
				'atime'        => '' ,
				'ctime'        => '' ,
				'mtime'        => '' ,
				'isReadable'   => '' ,
				'isWritable'   => '' ,
				'isExecutable' => '' ,
				'size'         => '' ,
				'error'        => '' ,
			];
			try
			{
				$file = new \SplFileInfo ($path);
				$info['name'] = $file->getBasename();
				$info['path'] = $path;
				$info['dirpath'] = dirname($path);
				$info['ext'] = $file->getExtension();
				$info['type'] = $file->getType();
				$info['mode'] = self::getMode($path);
				$info['atime'] = $file->getATime();
				$info['ctime'] = $file->getCTime();
				$info['mtime'] = $file->getMTime();
				$info['isReadable'] = $file->isReadable();
				$info['isWritable'] = $file->isWritable();
				$info['size'] = $file->isDir() ? 0 : self::fileSize($path);
				$info['isExecutable'] = $file->isExecutable();

			} catch (Exception $e)
			{
				$info['error'] = $e->getMessage();
			} catch (\LogicException $e)
			{
				$info['error'] = $e->getMessage();
			} catch (\RuntimeException $e)
			{
				$info['error'] = $e->getMessage();
			}

			return $info;

			/**
			 * [name] => cn_visio_professional_2016_x86_x64_dvd_6970929.iso
			 * [path] => G:\迅雷下载\cn_visio_professional_2016_x86_x64_dvd_6970929.iso
			 * [ext] => iso
			 * [type] => file
			 * [mode] => -rw- rw- rw-(0666)
			 * [atime] => 1531204803
			 * [ctime] => 1531204803
			 * [mtime] => 1531205590
			 * [isReadable] => 1
			 * [isWritable] => 1
			 * [isExecutable] =>
			 * [size] => 2588262400
			 * [error] =>
			 * [dirpath] => G:\迅雷下载
			 */
		}


		/**
		 * 获取文件(夹)权限 rwx_rwx_rwx
		 *
		 * @param $file
		 *
		 * @return string
		 */
		public static function getMode($file)
		{
			$Mode = @fileperms($file);
			$theMode = ' ' . decoct($Mode);
			$theMode = substr($theMode , -4);
			$Owner = array();
			$Group = array();
			$World = array();
			if($Mode & 0x1000) $Type = 'p'; // FIFO pipe
			elseif($Mode & 0x2000) $Type = 'c'; // Character special
			elseif($Mode & 0x4000) $Type = 'd'; // Directory
			elseif($Mode & 0x6000) $Type = 'b'; // Block special
			elseif($Mode & 0x8000) $Type = '-'; // Regular
			elseif($Mode & 0xA000) $Type = 'l'; // Symbolic Link
			elseif($Mode & 0xC000) $Type = 's'; // Socket
			else $Type = 'u'; // UNKNOWN
			// Determine les permissions par Groupe
			$Owner['r'] = ($Mode & 00400) ? 'r' : '-';
			$Owner['w'] = ($Mode & 00200) ? 'w' : '-';
			$Owner['x'] = ($Mode & 00100) ? 'x' : '-';
			$Group['r'] = ($Mode & 00040) ? 'r' : '-';
			$Group['w'] = ($Mode & 00020) ? 'w' : '-';
			$Group['e'] = ($Mode & 00010) ? 'x' : '-';
			$World['r'] = ($Mode & 00004) ? 'r' : '-';
			$World['w'] = ($Mode & 00002) ? 'w' : '-';
			$World['e'] = ($Mode & 00001) ? 'x' : '-';
			// Adjuste pour SUID, SGID et sticky bit
			if($Mode & 0x800) $Owner['e'] = ($Owner['e'] == 'x') ? 's' : 'S';
			if($Mode & 0x400) $Group['e'] = ($Group['e'] == 'x') ? 's' : 'S';
			if($Mode & 0x200) $World['e'] = ($World['e'] == 'x') ? 't' : 'T';
			$Mode = $Type . $Owner['r'] . $Owner['w'] . $Owner['x'] . ' ' . $Group['r'] . $Group['w'] . $Group['e'] . ' ' . $World['r'] . $World['w'] . $World['e'];

			return $Mode . '(' . $theMode . ')';
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
			$path = self::patFilter($path);

			return !is_dir(($path)) ? mkdir(($path) , $mode , 1) : @chmod($path , $mode);
		}


		/***
		 * filesize 解决大于2G 大小问题
		 * //http://stackoverflow.com/questions/5501451/php-x86-how-to-get-filesize-of-2-gb-file-without-external-program
		 *
		 * @param $path
		 *
		 * @return bool|float|int|string
		 */
		public static function fileSize($path)
		{
			$result = false;

			if(!$fp = fopen($path , "r")) return $result;
			if(PHP_INT_SIZE >= 8)
			{ //64bit
				$result = (float)(abs(sprintf("%u" , @filesize($path))));
			}
			else
			{
				if(fseek($fp , 0 , SEEK_END) === 0)
				{
					$result = 0.0;
					$step = 0x7FFFFFFF;
					while ($step > 0)
					{
						if(fseek($fp , -$step , SEEK_CUR) === 0)
						{
							$result += floatval($step);
						}
						else
						{
							$step >>= 1;
						}
					}
				}
				else
				{
					static $iswin;
					if(!isset($iswin))
					{
						$iswin = (strtoupper(substr(PHP_OS , 0 , 3)) == 'WIN');
					}
					static $exec_works;
					if(!isset($exec_works))
					{
						$exec_works = (function_exists('exec') && !ini_get('safe_mode') && @exec('echo EXEC') == 'EXEC');
					}
					if($iswin && class_exists("COM"))
					{
						try
						{
							$fsobj = new COM('Scripting.FileSystemObject');
							$f = $fsobj->GetFile(realpath($path));
							$size = $f->Size;
						} catch (Exception $e)
						{
							$size = null;
						}
						if(is_numeric($size))
						{
							$result = $size;
						}
					}
					else if($exec_works)
					{
						$cmd = ($iswin) ? "for %F in (\"$path\") do @echo %~zF" : "stat -c%s \"$path\"";
						@exec($cmd , $output);
						if(is_array($output) && is_numeric($size = trim(implode("\n" , $output))))
						{
							$result = $size;
						}
					}
					else
					{
						$result = filesize($path);
					}
				}
			}
			fclose($fp);

			return $result;
		}

		public static function isDirEmpty($path)
		{
			$t = scandir($path);

			return count($t) == 2;
		}

		/**
		 * 过滤文件里不支持命名的字符
		 *
		 * @param $path
		 *
		 * @return mixed
		 */
		public static function patFilter($path)
		{
			return str_replace(array(
				'*' ,
				'?' ,
				'"' ,
				'<' ,
				'>' ,
				'|' ,
				"'" ,
			) , '_' , $path);
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
			return rtrim(rtrim(self::replaceToSysSeparator($path) , '/') , '\\') . self::DS;
		}

		/**
		 * @param $path
		 *
		 * @return string
		 */
		public static function replaceToSysSeparator($path)
		{
			return strtr($path , [
				'\\' => self::DS ,
				'/'  => self::DS ,
			]);
		}

		/**
		 * @param     $size
		 * @param int $dec
		 *
		 * @return string
		 */
		public static function byteFormat($size , $dec = 2)
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

			return round($size , $dec) . " " . $a[$pos];
		}


		/**
		 * ************************************************************
		 * 基础方法，不建议用，不能递归操作
		 * ************************************************************
		 */


		/**
		 * 移动路径，不能递归，文件必须为空
		 *
		 * @param $path
		 * @param $dest
		 */
		public static function mv($path , $dest)
		{
			@chmod($path , 0777);
			@chmod($dest , 0777);
			$dest = self::patFilter($dest);
			if(is_dir($path))
			{
				self::mkdir_($dest);
			}
			else
			{
				self::mkdir_(dirname($dest));
				$result = intval(@rename($path , $dest));
				if(!$result)
				{ // windows部分ing情况处理
					FileTool::cp($path , $dest);
					self::rm($path);
				}
			}
			self::rm(dirname($path));
		}

		/**
		 * 复制路径，不能递归，文件必须为空
		 *
		 * @param $path
		 * @param $dest
		 *
		 * @return bool
		 */
		public static function cp($path , $dest)
		{
			$res = false;
			if(is_dir($path))
			{
				$res = self::mkdir_($dest);
			}
			elseif(is_file($path))
			{
				self::mkdir_(dirname($dest));
				$res = copy($path , $dest);
			}
			@chmod($dest , 0777);

			return $res;
		}

		/**
		 * 删除路径，不能递归，文件必须为空
		 *
		 * @param $path
		 *
		 * @return bool
		 */
		public static function rm($path)
		{
			$res = true;
			@chmod($path , 0777);
			if(is_dir($path))
			{
				self::isDirEmpty(dirname($path)) && rmdir($path);

				$res = !is_dir($path);
			}
			elseif(is_file($path))
			{
				unlink($path);
				$res = !is_file($path);
			}

			return $res;
		}


	}