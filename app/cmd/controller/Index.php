<?php

	namespace app\cmd\controller;
	//压缩图片功能
	//文件转义重命名
	//删除空文件夹
	//文件去重

	//spl接口


	//php index.php /cmd/index/index


	use image\imageProcessor;

	class Index
	{

		//public $testImg = 'C:\Users\Administrator\Desktop\pic\a.jpg';
		public $testImg = 'C:\Users\Administrator\Desktop\pic\b.png';
		public $testPath = 'C:\Users\Administrator\Desktop\test\\';
		public static $hashMap = [];

		public function rename()
		{
			$path = 'C:\Users\Administrator\Desktop\qq';

			loop2($path , function($path , $dirs_ , $relativePath) {
				//echo '------' . $relativePath . "\r\n";
				//echo '------' . $path . "\r\n";
				//echo "\r\n";

				//返回真继续遍历下层，否则停止遍历此文件夹
				return 1;

			} , function($path , $pathinfo , $relativePath) {
				$pathinfo = pathinfo_($path);

				$reader = \PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_NATIVE);
				$exif = $reader->read($path);

				if($exif)
				{
					$data = $exif->getRawData();
					//$data = \exif_read_data($path);

					$name = date('Y-m-d-H-i-s' , $data['FileDateTime']) . '-' . $data['FileSize'] . '-' . $pathinfo['basename'];
					$dest = 'C:\Users\Administrator\Desktop\pic' . dirname($relativePath) . '/' . $name;
				}
				else
				{
					$dest = 'C:\Users\Administrator\Desktop\pic' . dirname($relativePath) . '/' . $pathinfo['basename'];
				}

				$a = md5_file($path);
				echo '++++++' . $relativePath . '  --  ' . $a . "\r\n";
				echo '++++++' . $path . "\r\n";
				echo '------' . $dest . "\r\n";
				echo "\r\n";

				if(!in_array($a , self::$hashMap))
				{
					self::$hashMap[] = $a;

					mkdir_(dirname($dest));

					if(in_array(strtolower($pathinfo['extension']) , [
						'jpeg' ,
						'jpg' ,
					]))
					{

						$imageCompress = imageProcessor::getProcessor('compress');
						$ratio = 8;
						$imageCompress->form($path)->ratio($ratio)->to($dest);
					}
					else
					{
						copy($path , $dest);
					}

				}
			});
		}

		/**
		 * @throws \ReflectionException
		 */
		public function compress()
		{
			//https://blog.csdn.net/qq_36608163/article/details/73167284
			$imageCompress = imageProcessor::getProcessor('compress');

			$info = pathinfo($this->testImg);
			$ratio = 10;
			$imageCompress->form($this->testImg)->ratio($ratio)->to($this->testPath . '/' . $ratio . '_' . $info['basename']);
		}

		public function thumb()
		{
			$info = pathinfo($this->testImg);
			$image = imageProcessor::Image()::open($this->testImg);

			mkdir_($this->testPath);
			$image->thumb(300 , 300)->save($this->testPath . '/thumb.png' , 'png');
		}


		public function removeEmpty()
		{
			$path = 'c:';

			rm_empty_dir($path);
		}

	}
