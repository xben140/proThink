<?php
namespace app\cmd\controller;

class Index
{
    public function index()
    {
		$path = 'G:\resource\source\aliyunCheck';
		$path = 'C:\Users\Administrator\Desktop\pics';

		
		$savePath = 'G:\resource\source\aaaaaa';
/*
		cp([
			'source'    => $path,
			'des'       => $savePath,
			//正则过滤文件
			'skip_file_reg'     => [
				//'#模板之家#u',
				//'#3000套#u',
				//'#readme.txt#',
				//'#说明.txt#u',
			],
			//正则过滤文件夹
			'skip_dir_reg'     => [
				//'#ima(?=ge)#',
			],
		]);
*/


		loop2($path, function($path, $dirs_, $relativePath){
			echo '------'.$relativePath."\r\n";
			echo '------'.$path."\r\n";
			echo "\r\n";
			//返回真继续遍历下层，否则停止遍历此文件夹
			return 1;

		}, function($path, $pathinfo, $relativePath){
			echo '++++++'.$relativePath."\r\n";
			echo '++++++'.$path."\r\n";
			echo "\r\n";

			$exif = exif_read_data($path);
			print_r($exif);exit;;


		});

    }
}
