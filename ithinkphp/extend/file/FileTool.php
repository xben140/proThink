<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace file;

	use think\Exception;

	class FileTool
	{

		/**
		 *
		 */
		const DS = DIRECTORY_SEPARATOR;
		const FILE = 1;
		const DIRECTORY = 2;
		const ALL = 3;

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
								static::fileInfo($info->getPathname()) ,
								$info ,
							]);
						}
						else
						{
							$files[] = static::fileInfo($info->getPathname());
						}
					}

				} catch (Exception $e)
				{
					$files = [];
				}
			}

			return $files;
		}


		/**
		 * 递归复制文件夹
		 *
		 * @param               $path
		 * @param               $dest
		 * @param callable|null $fitlerCallback
		 *
		 * @return array
		 */
		public static function recursiveCp($path , $dest , callable $fitlerCallback = null)
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			try
			{
				$info = new \SplFileInfo($path);
				$flag = true;

				$info->isFile() ? static::cp($info->getPathname() , static::endDS($dest) . $info->getBasename()) : static::itreatorDFS($path , function($info , $relativePath) use ($dest , $fitlerCallback , &$flag) {
					$flag = true;
					(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($flag = false);
					$flag && static::cp($info->getPathname() , static::endDS($dest) . $relativePath);

					return true;
				});
			} catch (Exception $e)
			{
				$res['sign'] = 0;
				$res['msg'] = $e->getMessage();
			}

			return $res;
		}

		/**
		 * 递归移动文件夹
		 * * @param               $path
		 *
		 * @param               $dest
		 * @param callable|null $fitlerCallback
		 *
		 * @return array
		 */
		public static function recursiveMv($path , $dest , callable $fitlerCallback = null)
		{

			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			try
			{
				$info = new \SplFileInfo($path);
				$flag = true;

				$info->isFile() ? static::mv($info->getPathname() , static::endDS($dest) . $info->getBasename()) : static::itreatorDFS($path , function($info , $relativePath) use ($dest , $fitlerCallback , &$flag) {
					$flag = true;
					(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($flag = false);
					$flag && static::mv($info->getPathname() , static::endDS($dest) . $relativePath);

					return true;
				} , function($info , $relativePath) use (&$flag) {
					$flag && static::rm($info->getPathname());
				});
			} catch (Exception $e)
			{
				$res['sign'] = 0;
				$res['msg'] = $e->getMessage();
			}

			return $res;
		}

		/**
		 * 递归删除文件夹
		 * * @param               $path
		 *
		 * @param callable|null $fitlerCallback
		 *
		 * @return array
		 */
		public static function recursiveRm($path , callable $fitlerCallback = null)
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			try
			{
				$info = new \SplFileInfo($path);
				$flag = true;

				$info->isFile() ? static::rm($info->getPathname()) : static::itreatorDFS($path , function($info , $relativePath) use ($fitlerCallback , &$flag) {
					$flag = true;
					(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($flag = false);
					$flag && static::rm($info->getPathname());

					return true;
				} , function($info , $relativePath) use (&$flag) {
					$flag && static::rm($info->getPathname());
				});
			} catch (Exception $e)
			{
				$res['sign'] = 0;
				$res['msg'] = $e->getMessage();
			}

			return $res;
		}

		/**
		 * 删除指定文件夹下所有空文件夹
		 * * @param               $path
		 *
		 * @param callable|null $fitlerCallback
		 *
		 * @return array
		 */
		public static function recursiveRmEmptyDir($path , callable $fitlerCallback = null)
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			try
			{
				$info = new \SplFileInfo($path);
				$flag = true;

				$info->isFile() ? static::rm($info->getPathname()) : static::itreatorDFS($path , function($info , $relativePath) use ($fitlerCallback , &$flag) {
					$flag = static::isDirEmpty($info->getPathname());
					(is_callable($fitlerCallback) && !$fitlerCallback($info , $relativePath)) && ($flag = false);

					return true;
				} , function($info , $relativePath) use (&$flag) {
					$flag && static::rm($info->getPathname());
				});
			} catch (Exception $e)
			{
				$res['sign'] = 0;
				$res['msg'] = $e->getMessage();
			}

			return $res;
		}

		/**
		 * 递归修改文件权限
		 *
		 * @param     $path
		 * @param int $mode
		 *
		 * @return array
		 */
		public static function recursiveChmod($path , $mode = 0777)
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			try
			{
				static::itreatorDFS($path , function($info , $relativePath) use ($mode) {
					chmod($info->getPathname() , $mode);

					return true;
				} , function($info , $relativePath) {

				});

			} catch (Exception $e)
			{
				$res['sign'] = 0;
				$res['msg'] = $e->getMessage();
			}

			return $res;
		}

		/**
		 * 广度优先迭代
		 * 带条件停止遍历功能
		 *
		 * @param          $path
		 * @param callable $callback
		 * @param callable $afterCallback
		 */
		public static function itreatorBFS($path , callable $callback , callable $afterCallback = null)
		{
			$dirs = [realpath($path)];
			static $originPath = null;
			!$originPath && $originPath = static::endDS($path);
			do
			{
				$fullPath = array_shift($dirs);
				if(!$fullPath) continue;

				$relativePath = '';
				if(is_dir($fullPath) && is_readable($fullPath))
				{
					$fullPath = static::endDS($fullPath);
					$relativePath = str_replace($originPath , '' , $fullPath);

					$dirs_ = @scandir($fullPath);
					$res = $callback(new \SplFileInfo($fullPath) , $relativePath);
					if($res)
					{
						$dirs_ = array_map(function($v) use ($fullPath) {
							return (!in_array($v , [
								'.' ,
								'..' ,
							])) ? $fullPath . $v : '';
						} , $dirs_);
						$dirs = array_merge($dirs , $dirs_);
					}
					else
					{
						break;
					}
				}
				elseif(is_file($fullPath))
				{
					$relativePath = str_replace($originPath , '' , $fullPath);
					$callback(new \SplFileInfo($fullPath) , $relativePath);
				}
				is_callable($afterCallback) && $afterCallback(new \SplFileInfo($fullPath) , $relativePath);

			} while (count($dirs));
		}

		/**
		 * 深度优先迭代
		 * 带条件停止遍历功能
		 *
		 * @param          $path
		 * @param callable $callback
		 * @param callable $afterCallback
		 *
		 * @return void
		 */
		public static function itreatorDFS($path , callable $callback , callable $afterCallback = null)
		{
			if(!is_dir($path) || !is_readable($path)) return;
			static $dep = 0;
			static $originPath = null;

			$path = static::endDS($path);
			($dep === 0) && (!$originPath) && ($originPath = $path);
			$dep++;

			$dirs = @scandir($path);
			foreach ($dirs as $k => $v)
			{
				if(!in_array($v , [
					'.' ,
					'..' ,
				]))
				{
					$fullPath = $path . $v;
					$relativePath = str_replace($originPath , '' , $fullPath);

					if(is_dir($fullPath) && is_readable($fullPath))
					{
						$res = $callback(new \SplFileInfo($fullPath) , $relativePath);
						$res && static::itreatorDFS($fullPath , $callback , $afterCallback);
					}
					elseif(is_file($fullPath))
					{
						$relativePath = str_replace($originPath , '' , $fullPath);
						$callback(new \SplFileInfo($fullPath) , $relativePath);
					}
					//file_put_contents('cc.txt', $fullPath."\r\n", FILE_APPEND|LOCK_EX);
					is_callable($afterCallback) && $afterCallback(new \SplFileInfo($fullPath) , $relativePath);
				}
			}
			is_callable($afterCallback) && $afterCallback(new \SplFileInfo($path) , '');

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
			return static::fileInfo($path)['ext'];
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
			return static::fileInfo($path)['dirpath'];
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
			return static::fileInfo($path)['name'];
		}

		/**
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function isWritable($path)
		{
			return static::fileInfo($path)['isWritable'];
		}


		/**
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function isReadable($path)
		{
			return static::fileInfo($path)['isReadable'];
		}


		/**
		 * 文件是否存在，是否可写
		 *
		 * @param $path
		 *
		 * @return bool|int
		 */
		public static function isDirAvailable($path)
		{
			return is_dir($path) && static::isWritable($path);
		}


		/**
		 * 获取文件详细信息
		 * 文件名从程序编码转换成系统编码,传入utf8，系统函数需要为gbk
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
		 * [dirpath] => G:\迅雷下载         * @param $path
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
				$info['mode'] = static::getMode($path);
				$info['atime'] = $file->getATime();
				$info['ctime'] = $file->getCTime();
				$info['mtime'] = $file->getMTime();
				$info['isReadable'] = $file->isReadable();
				$info['isWritable'] = $file->isWritable();
				$info['size'] = $file->isDir() ? 0 : static::fileSize($path);
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

		}


		/**
		 * 获取文件(夹)权限 -rw- rw- rw-(0666)
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
		 * 测试指定文件夹有没有apache写文件的权限
		 *
		 * @param $path
		 *
		 * @return bool
		 */
		public static function testWrite($path)
		{
			$res = true;
			if(is_dir($path))
			{
				try
				{
					$fileName = static::endDS($path) . md5(uniqid('__' , true));
					file_put_contents($fileName , '_');
					is_file($fileName) && unlink($fileName);
				} catch (\Exception $e)
				{
					$res = false;
				}
			}
			elseif(!is_file($path))
			{
				$res = false;
			}

			return $res;
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
			$path = static::pathFilter($path);

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

		public static function isWin()
		{
			return (strtoupper(substr(PHP_OS , 0 , 3)) == 'WIN');
		}

		/**
		 * @param $path
		 *
		 * @return bool
		 */
		public static function isDirEmpty($path)
		{
			return is_dir($path) ? (count(@scandir($path)) == 2) : false;
		}

		/**
		 * 过滤文件里不支持命名的字符
		 *
		 * @param $path
		 *
		 * @return mixed
		 */
		public static function pathFilter($path)
		{
			return preg_replace('/(?<!^[a-z])[:*?"<>|]/im' , '_' , $path);
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
			$dest = static::pathFilter($dest);
			if(is_dir($path))
			{
				static::mkdir_($dest);
				static::rm($path);
			}
			else
			{
				static::mkdir_(dirname($dest));
				$result = intval(@rename($path , $dest));
				if(!$result)
				{ // windows部分ing情况处理
					FileTool::cp($path , $dest);
					static::rm($path);
				}
			}
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

			try
			{
				if(is_dir($path))
				{
					$res = static::mkdir_($dest);
				}
				elseif(is_file($path))
				{
					static::mkdir_(dirname($dest));
					$res = copy($path , $dest);
				}
				@chmod($dest , 0777);

			} catch (\Exception $exception)
			{
				$res = false;
			}

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

			try
			{
				@chmod($path , 0777);
				if(is_dir($path))
				{
					static::isDirEmpty(($path)) && is_writable($path) && @rmdir($path);
					$res = !is_dir($path);
				}
				elseif(is_file($path))
				{
					is_writable($path) && unlink($path);
					$res = !is_file($path);
				}
			} catch (\Exception $exception)
			{
				$res = false;
			}

			return $res;
		}


	}