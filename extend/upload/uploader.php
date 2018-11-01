<?php

	namespace upload;

	use SplFileObject;

	class uploader extends SplFileObject
	{
		/**
		 *
		 */
		const DS = DIRECTORY_SEPARATOR;

		//上传文件数组
		/**
		 * @var
		 */
		private $files;


		/**
		 * 最终结果是否成功 0致命错误，1警告，2成功
		 * @var
		 */
		private $sign;

		/**
		 * 保存的文件夹
		 * @var
		 */
		private $uploadDir;

		/**
		 * 临时文件保存的文件夹
		 * @var string
		 */
		private $tempDir = './upload_temp';

		/**
		 * 临时文件有效期
		 * @var int
		 */
		private $maxFileAge = 50;

		/**
		 * 当前用户sessionId
		 * @var string
		 */
		private $sessionId;

		/**
		 * 一共分片
		 * @var int
		 */
		private $chunks = 1;


		/**
		 * 当前分片
		 * @var int
		 */
		private $chunk = 0;


		/**
		 * 错误信息
		 * @var null
		 */
		private $error = null;

		/**
		 * 当前完整文件名
		 * @var
		 */
		protected $filename;

		/**
		 * 上传文件名
		 * @var
		 */
		protected $saveName;

		/**
		 * 文件上传命名规则
		 * @var string
		 */
		protected $rule = 'date';

		/**
		 * 文件上传验证规则
		 * @var array
		 */
		protected $validate = [];

		/**
		 * @var
		 */
		protected $isTest;

		/**
		 * 上传文件信息
		 * @var array
		 */
		protected $info = [
			'msg' => null ,
			'sign'  => 2 ,
		];

		/**
		 * 文件hash信息
		 * @var
		 */
		protected $hash;

		/**
		 * chunkUpload constructor.
		 *
		 * @param string $filename name属性
		 * @param int    $chunks   一共分片
		 * @param int    $chunk    当前分片
		 *
		 * @throws \LogicException
		 * @throws \RuntimeException
		 */
		public function __construct($filename = 'file' , $chunks = 1 , $chunk = 0)
		{

			if(!isset($_FILES[$filename]))
			{
				$this->info['msg'] = '不存在的上传字段' . $filename;
				$this->info['sign'] = 0;
			}

			$this->files = $_FILES[$filename];
			$this->chunks = $chunks;
			$this->chunk = $chunk;

			//必须开启session保证不同用户上传文件不会错乱
			if(!isset($_SESSION))
			{
				session_start();
			}
			$this->sessionId = session_id();
			parent::__construct($this->files['tmp_name'] , 'rb');

			$this->setInfo('chunk' , $this->chunk);
			$this->setInfo('chunks' , $this->chunks);
			$this->setInfo('session_id' , $this->sessionId);
			$this->setInfo('name' , $this->files['name']);
			$this->setInfo('mime' , $this->files['type']);

			$this->noCache();
		}

		/**
		 *
		 */
		public function noCache()
		{
			header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0" , false);
			header("Pragma: no-cache");
		}

		/**
		 * 设置错误信息
		 *
		 * @param     $error
		 * @param int $sign
		 *
		 * @return $this
		 */
		public function setError($error , $sign = 0)
		{
			$this->info['msg'] = $error;
			$this->info['sign'] = $sign;

			return $this;
		}

		/**
		 * 获取错误信息
		 */
		public function getError()
		{
			return $this->info['msg'];
		}

		/**
		 * 获取结果信号
		 */
		public function getSign()
		{
			return $this->info['sign'];
		}

		/**
		 * 设置上传信息
		 *
		 * @param $key
		 * @param $value
		 *
		 * @return $this
		 */
		private function setInfo($key , $value)
		{
			$this->info[$key] = $value;

			return $this;
		}

		/**
		 * 获取上传文件的信息
		 *
		 * @param  string $name
		 *
		 * @return array|string
		 */
		public function getInfo($name = '')
		{
			return isset($this->info[$name]) ? $this->info[$name] : $this->info;
		}

		/**
		 * 设置上传临时文件夹
		 *
		 * @param  string $tempDir 临时文件夹
		 *
		 * @return $this
		 */
		public function setTempDir($tempDir = '')
		{
			($tempDir) && $this->tempDir = $tempDir;

			return $this;
		}


		/**
		 * 设置是否允许跨域
		 *
		 * @param int $isAllowCors
		 *
		 * @return $this
		 */
		public function isAllowCors($isAllowCors = 0)
		{
			if($isAllowCors)
			{
				header("Access-Control-Allow-Origin: *");
			}

			return $this;
		}

		/**
		 * 设置上传文件夹
		 *
		 * @param $uploadDir
		 *
		 * @return array|string
		 * @throws \LogicException
		 * @throws \RuntimeException
		 */
		public function moveTo($uploadDir)
		{
			//临时保存文件夹
			//F:\localWeb\local1\upload\server\upload_temp\
			$this->tempDir = self::makeSurePathEndDS($this->tempDir);

			//临时未上传完保存文件名
			//53bbd50fbb5a78032d3f5abd0097422f_0_tmp
			$unfinishedName = $this->buildUnfinishedTempFileName($this->files['name'] , $this->chunk);
			//临时未上传完保存文件名
			//F:\localWeb\local1\upload\server\upload_temp\53bbd50fbb5a78032d3f5abd0097422f_0_tmp
			$unfinishedPath = $this->tempDir . $unfinishedName;

			//临时已经上传完保存文件名
			//53bbd50fbb5a78032d3f5abd0097422f_0
			$finishedName = $this->buildFinishedTempFileName($this->files['name'] , $this->chunk);
			//临时已经上传完保存文件名
			//F:\localWeb\local1\upload\server\upload_temp\53bbd50fbb5a78032d3f5abd0097422f_0
			$finishedPath = $this->tempDir . $finishedName;

			$this->setInfo('is_finished' , 0);

			self::mkdir_($this->tempDir);

			if(!is_dir($this->tempDir))
			{
				$this->setError($this->tempDir . ' 创建失败，检测权限是否可写');

				return $this->getInfo();
			}


			if(!is_writable($this->tempDir))
			{
				$this->setError($this->tempDir . ' 文件夹存在，但不可写');

				return $this->getInfo();
			}

			//当前文件hash
			preg_match('/^[a-z\d]+/im' , $finishedName , $regs);
			//53bbd50fbb5a78032d3f5abd0097422f
			$currentHash = $regs[0];

			//一半几率触发删除机制
			if(rand(1 , 10) % 3)
			{
				$tmpFiles = scandir($this->tempDir);
				foreach ($tmpFiles as $k => $file)
				{
					//当前文件hash
					if(preg_match('/^[a-z\d]+/im' , $file , $regs))
					{
						//53bbd50fbb5a78032d3f5abd0097422f
						$tempHash = $regs[0];

						if($tempHash != $currentHash)
						{
							$fileLastModifyTime = filemtime($this->tempDir . $file);
							$time = time();
							$t = $time - $fileLastModifyTime;

							//超过指定时间未修改就删除
							if($t > $this->maxFileAge)
							{
								$t = $this->tempDir . $file;
								if(is_writable($t))
								{
									@unlink($t);
								}
								else
								{
									$this->setError($t . '文件删除失败' , 1);
								}
							}
						}
					}
				}
			}

			//打开$_FILES上传临时文件
			if(!$tmpFileHandler = $this->openFile())
			{
				$this->setError(' 临时文件夹打开失败' . $this->getRealPath());

				return $this->getInfo();
			}

			//临时未上传完文件句柄
			if(!$unfinishedFile = @fopen($unfinishedPath , "wb"))
			{
				$this->setError('临时文件夹打开失败 ' . $unfinishedPath);

				return $this->getInfo();
			}

			//读取文件，移动到指定临时文件夹
			while ($buff = $tmpFileHandler->fread(4096))
			{
				fwrite($unfinishedFile , $buff);
			}

			$tmpFileHandler = null;
			@fclose($unfinishedFile);

			//文件移动完成，重命名为已完成的临时文件
			self::renameTofinishedTempFileName($this->files['name'] , $this->chunk);

			$result = null;
			$returnFile = null;

			//如果传完就吧临时文件移动到指定上传文件夹下
			if($this->isFileUploadFinished())
			{

				//最终保存的路径
				$this->uploadDir = self::makeSurePathEndDS($uploadDir);
				// 文件保存命名规则
				$saveName = $this->buildSaveName();
				$filePath = $this->uploadDir . $saveName;
				$fileInfo = pathinfo(($filePath));

				//最终保存的路径位置带文件名
				self::mkdir_(dirname($filePath));

				if(!is_dir(dirname($filePath)))
				{
					$this->setError(dirname($filePath) . ' 创建失败，检测权限是否可写');

					return $this->getInfo();
				}

				system('chmod -R 777 ' . $this->uploadDir . '/*');

				if(!is_writable($this->uploadDir))
				{
					$this->setError($this->uploadDir . ' 文件夹存在，但不可写');

					return $this->getInfo();
				}

				$this->setInfo('dirname' , $fileInfo['dirname']);
				$this->setInfo('basename' , $fileInfo['basename']);
				$this->setInfo('extension' , $fileInfo['extension']);
				$this->setInfo('savename' , $saveName);

				if(!$finalUploadFileHandler = @fopen($filePath , "wb"))
				{
					$this->setError($filePath . ' 创建文件夹操作句柄失败');

					return $this->getInfo();
				}

				if(flock($finalUploadFileHandler , LOCK_EX))
				{
					for ($index = 0; $index < $this->chunks; $index++)
					{
						//每个分块的文件名字
						$chunkFileName = $this->tempDir . self::buildFinishedTempFileName($this->files['name'] , $index);

						//循环构造每个分块的文件名字，读出来，写入到最终保存的文件
						if($in = @fopen($chunkFileName , "rb"))
						{
							while ($buff = fread($in , 4096))
							{
								fwrite($finalUploadFileHandler , $buff);
							}
							@fclose($in);
							@unlink($chunkFileName);
						}
					}

					flock($finalUploadFileHandler , LOCK_UN);
				}
				@fclose($finalUploadFileHandler);


				$fileObj = new \SplFileObject($filePath);
				$this->setError('文件上传成功', 2);
				$this->setInfo('size' , $fileObj->getSize());
				$this->setInfo('is_finished' , 1);
				$this->setInfo('hash' , md5_file($filePath));
				$this->setInfo('file_obj' , $fileObj);
			}
			else
			{
				$this->setInfo('is_finished' , 0);
			}
			system('chmod -R 777 ' . $this->uploadDir . '/*');

			return $this->getInfo();
		}


		/**
		 * @return bool
		 */
		private function isFileUploadFinished()
		{
			//是否所有分块都已经传完
			$isFileUploadFinished = true;

			//根据chunks和chunk判断文件夹传完没有
			for ($index = 0; $index < $this->chunks; $index++)
			{
				$chunkFileName = $this->tempDir . self::buildFinishedTempFileName($this->files['name'] , $index);

				//如果不是每个分块的文件都在，就说明没传完
				if(!file_exists($chunkFileName))
				{
					$isFileUploadFinished = false;
					break;
				}
			}

			return $isFileUploadFinished;
		}

		/**
		 * 设置临时文件夹最长有效期
		 *
		 * @param int $time
		 *
		 * @return $this
		 */
		public function setMaxFileAge($time)
		{
			$this->maxFileAge = $time;

			return $this;
		}

		/**
		 * 设置脚本最长执行时间
		 *
		 * @param int $time
		 *
		 * @return $this
		 */
		public function setMaxExecutionTime($time = 5)
		{
			@set_time_limit($time);

			return $this;
		}


		/**
		 * 设置文件的命名规则
		 *
		 * @param  string $rule 返回一个字符串的函数名，例如md5
		 *
		 * @return $this
		 */
		public function rule($rule)
		{
			$this->rule = $rule;

			return $this;
		}

		/**
		 * 构造保存文件名
		 * @return string
		 */
		private function buildSaveName()
		{
			$savename = '';
			is_callable($this->rule) && $savename = call_user_func_array($this->rule, [$this->files['name']]);
			(!$savename || !is_string($savename)) && $savename = date('Ymd') . self::DS . md5(microtime(true));

			if(!strpos($savename , '.'))
			{
				$savename .= '.' . pathinfo($this->files['name'] , PATHINFO_EXTENSION);
			}

			return $savename;
		}


		/**
		 * 根据文件名和分块名构造唯一临时文件名 - 上传完成后的名字
		 *
		 * @param string $fileName
		 * @param $chunk
		 *
		 * @return string
		 */
		private function buildFinishedTempFileName($fileName , $chunk)
		{
			return $a = md5($fileName . $this->sessionId) . '_' . $chunk;
		}

		/**
		 * 根据文件名和分块名构造唯一临时文件名 - 未上传完成的名字
		 *
		 * @param string $fileName
		 * @param $chunk
		 *
		 * @return string
		 */
		private function buildUnfinishedTempFileName($fileName , $chunk)
		{
			$a = md5($fileName . $this->sessionId) . '_' . $chunk . '_tmp';

			return $a;
		}

		/**
		 * 临时文件上传完成后修改名字
		 *
		 * @param string $fileName
		 * @param $chunk
		 *
		 * @return string
		 */
		private function renameTofinishedTempFileName($fileName , $chunk)
		{
			$a = $this->tempDir . $this->buildUnfinishedTempFileName($fileName , $chunk);
			$b = $this->tempDir . $this->buildFinishedTempFileName($fileName , $chunk);

			return rename($a , $b);
		}


		/*
		 *
		 * 		工具方法
		 *
		 * */

		/**
		 * 创建文件夹
		 *
		 * @param string $path 文件夹路径
		 *
		 * @return bool
		 */
		private static function mkdir_($path)
		{
			return !is_dir(($path)) && mkdir(($path) , 0777 , 1);
		}


		/**
		 * 自动为路径后面加DIRECTORY_SEPARATORY
		 *
		 * @param string $path 文件夹路径
		 *
		 * @return string
		 */
		private static function makeSurePathEndDS($path)
		{
			return rtrim(rtrim($path , '/') , '\\') . '/';
		}

	}

	/*

		print_r($re);;;


		if($re['is_finished'])
		{
			$res = $re['file_obj'];


			//提供的接口
			echo 'getPath		' .  $res->getPath();
			echo "\r\n";
			echo 'getFilename		' .  $res->getFilename();
			echo "\r\n";
			echo 'getExtension		' .  $res->getExtension();
			echo "\r\n";
			echo 'getBasename		' .  $res->getBasename();
			echo "\r\n";
			echo 'getPathname		' .  $res->getPathname();
			echo "\r\n";
			echo 'getPerms		' .  $res->getPerms();
			echo "\r\n";
			echo 'getInode		' .  $res->getInode();
			echo "\r\n";
			echo 'getSize		' .  $res->getSize();
			echo "\r\n";
			echo 'getOwner		' .  $res->getOwner();
			echo "\r\n";
			echo 'getGroup		' .  $res->getGroup();
			echo "\r\n";
			echo 'getATime		' .  $res->getATime();
			echo "\r\n";
			echo 'getMTime		' .  $res->getMTime();
			echo "\r\n";
			echo 'getCTime		' .  $res->getCTime();
			echo "\r\n";
			echo 'getType		' .  $res->getType();
			echo "\r\n";
			echo 'isWritable		' .  $res->isWritable();
			echo "\r\n";
			echo 'isReadable		' .  $res->isReadable();
			echo "\r\n";
			echo 'isExecutable		' .  $res->isExecutable();
			echo "\r\n";
			echo 'isFile		' .  $res->isFile();
			echo "\r\n";
			echo 'isDir		' .  $res->isDir();
			echo "\r\n";
			echo 'isLink		' .  $res->isLink();
			echo "\r\n";
			echo 'getLinkTarget		' .  $res->getLinkTarget();
			echo "\r\n";
			echo 'getRealPath		' .  $res->getRealPath();
			echo "\r\n";
			echo 'getFileInfo		' .  $res->getFileInfo();
			echo "\r\n";
			echo 'getPathInfo		' .  $res->getPathInfo();
			echo "\r\n";
		}


	*/



	/*

	Array
(
    [chunk] => 0
    [chunks] => 1
    [session_id] => 3u0b8l6ev93kr4p5ek6q5o88vu
    [dirname] => ./uploadDir/20180515
    [basename] => c338494ce35c18e8f20ce9e71bc37989.jpg
    [extension] => jpg
    [savename] => 20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
    [is_finished] => 1
    [hash] => 6da8cee3721e2595a4d54341a349092c
    [file_obj] => SplFileObject Object
        (
            [pathName:SplFileInfo:private] => ./uploadDir/20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
            [fileName:SplFileInfo:private] => c338494ce35c18e8f20ce9e71bc37989.jpg
            [openMode:SplFileObject:private] => r
            [delimiter:SplFileObject:private] => ,
            [enclosure:SplFileObject:private] => "
        )

)
getPath		./uploadDir/20180515
getFilename		c338494ce35c18e8f20ce9e71bc37989.jpg
getExtension		jpg
getBasename		c338494ce35c18e8f20ce9e71bc37989.jpg
getPathname		./uploadDir/20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
getPerms		33206
getInode		0
getSize		14711
getOwner		0
getGroup		0
getATime		1526364367
getMTime		1526364367
getCTime		1526364367
getType		file
isWritable		1
isReadable		1
isExecutable
isFile		1
isDir
isLink
getLinkTarget		F:\localWeb\local1\upload\server\uploadDir\20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
getRealPath		F:\localWeb\local1\upload\server\uploadDir\20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
getFileInfo		./uploadDir/20180515\c338494ce35c18e8f20ce9e71bc37989.jpg
getPathInfo		./uploadDir/20180515

	*/





