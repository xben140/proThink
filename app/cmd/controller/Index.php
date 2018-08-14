<?php

	namespace app\cmd\controller;

	class Index
	{
		public function index()
		{
			$path = 'F:\BaiduNetdiskDownload\LT28h';


			loop2($path , function($path , $dirs_ , $relativePath) {
				//echo '------' . $relativePath . "\r\n";
				//echo '------' . $path . "\r\n";
				//echo "\r\n";

				//返回真继续遍历下层，否则停止遍历此文件夹
				return 1;

			} , function($path , $pathinfo , $relativePath) {

				$img = 'F:\BaiduNetdiskDownload\LT28h\Pictures\Screenshot_2013-11-09-11-05-15.png';

// reader with Native adapter
				$reader = \PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_NATIVE);

// reader with Exiftool adapter
//$reader = \PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_EXIFTOOL);

				$exif = $reader->read($img);

				print_r($exif->getRawData());;;
				print_r($exif->getData());exit;;



				$exif = \exif_read_data($path);
				$name = date('Y-m-d-H-i-s' , $exif['FileDateTime']).'-' . $exif['FileSize'] .'-'. $exif['FileName'];
				$dest = 'C:\Users\Administrator\Desktop\pics/' . $name;

				echo '++++++' . $relativePath . "\r\n";
				echo '++++++' . $path . "\r\n";
				echo '------' . $dest . "\r\n";
				echo "\r\n";
				//mkdir_(dirname($dest));
				//copy($path , $dest);
/*

				cp([
					'source'        => $path ,
					'des'           => $dest ,
					//正则过滤文件
					'skip_file_reg' => [
						//'#模板之家#u',
						//'#3000套#u',
						//'#readme.txt#',
						//'#说明.txt#u',
					] ,
					//正则过滤文件夹
					'skip_dir_reg'  => [
						//'#ima(?=ge)#',
					] ,
				]);*/


			});

		}
	}
