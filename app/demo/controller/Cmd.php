<?php

	namespace app\demo\controller;

	use base64\Base64;
	use file\FileTool;
	use image\imageProcessor;
	use PhpMyAdmin\SqlParser\Parser;
	use PHPSQLParser\PHPSQLParser;

	//php index.php /cmd/index/index


	class Cmd extends FrontendBase
	{

		//public $testImg = 'C:\Users\Administrator\Desktop\pic\a.jpg';
		public $testImg = 'C:\Users\Administrator\Desktop\pic\b.png';
		public $testPath = 'C:\Users\Administrator\Desktop\test\\';
		public static $hashMap = [];


		//图片缩略图测试
		public function thumb()
		{
			$info = pathinfo($this->testImg);
			$image = imageProcessor::Image()::open($this->testImg);

			FileTool::mkdir_($this->testPath);
			$image->thumb(300 , 300)->save($this->testPath . '/thumb.png' , 'png');
		}

		//删除指定目录的所有空目录
		public function removeEmpty()
		{
			$path = 'c:';

			//删除空文件夹
			FileTool::recursiveRmEmptyDir($path , function($info , $relativePath) {
				echo $info->getPathname();
				echo "\r\n";

				if(FileTool::isDirEmpty($info->getPathname()))
				{
					echo '---------------- ---------------- ' . $info->getPathname();
					echo "\r\n";
					file_put_contents('dd.txt' , $info->getPathname() . "\r\n" , FILE_APPEND | LOCK_EX);
				}

				return true;
			});
		}

		public function base64Test()
		{
			$base64 = Base64::getInstance('ABCDEFGHIJKLnopqrstuvwxyz012345MNOPQRSTUVWXYZabcdefghijklm6789+/' , '-');
			$a = $base64->encode('你红扥零三扥HLKJLGksdfsd234234aaaf');
			$b = $base64->decode('mLjNm7XPmVTS60bjmLPJmVTStEeLtReH1koR0UoRnQnhnQnhzxFO0N--');


			$base64 = Base64::getInstance('ABCDEFGHIJKLnopqrsVWXYZabcdefghijklm6789+/tuvwxyz012345MNOPQRSTU' , '%');
			$a = $base64->encode('你红扥零三扥HLKJLGksdfsd234234aaaf');
			$b = $base64->decode('OL5jOQtlO+87Pcx5OLlJO+87VE0LV60HdMo6c9o6nmn3nmn3bZFkcj%%');
		}


		//PHPSQLParser
		public function sqlParser1()
		{
			$query1 = "
SELECT 
    table1.customer_id,
    city,
    COUNT(order_id) 
FROM
    table1 
    left JOIN table2 
        ON table1.customer_id = table2.customer_id 
WHERE table1.customer_id <> 'tx' 
    AND table1.customer_id <> '9you' 
GROUP BY customer_id 
HAVING COUNT(order_id) > ANY 
    (SELECT 
        COUNT(order_id) 
    FROM
        table2 
    WHERE customer_id = 'tx' 
        OR customer_id = '9you' 
    GROUP BY customer_id) ;
";
			/*
			$query1 = "
INSERT INTO `ithink_area` (`id`, `code`, `name`, `pid`, `level`)
VALUES
    (9, 31, '上海市', 0, 1) ;
";

		*/
			$parser = new PHPSQLParser();
			$parsed = $parser->parse($query1 , true);
			print_r($parsed);
		}


		//PhpMyAdmin
		public function sqlParser2()
		{
			$query1 = "
SELECT 
    table1.customer_id,
    city,
    COUNT(order_id) 
FROM
    table1 
    left JOIN table2 
        ON table1.customer_id = table2.customer_id 
WHERE table1.customer_id <> 'tx' 
    AND table1.customer_id <> '9you' 
GROUP BY customer_id 
HAVING COUNT(order_id) > ANY 
    (SELECT 
        COUNT(order_id) 
    FROM
        table2 
    WHERE customer_id = 'tx' 
        OR customer_id = '9you' 
    GROUP BY customer_id) ;
";
			/*
			$query1 = "
INSERT INTO `ithink_area` (`id`, `code`, `name`, `pid`, `level`)
VALUES
    (9, 31, '上海市', 0, 1) ;
";

		*/
			$parser = new Parser($query1);
			//$flags = Query::getFlgs($parser->statements[0]);


			//print_r($parser);;;
			print_r($parser->statements[0]);;;
			//print_r($flags);;;
		}

		public function file()
		{

			//$file = 'F:\WEB开发\开发软件';
			$file = 'F:\KuGou\普拉斯塔诺村.mp3';
			$dir = 'F:\KuGou';

			$to = 'C:\Users\Administrator\Desktop\test';


			$to1 = 'C:\Users\Administrator\Desktop\test\oh nannana.mp3';
			$to2 = 'C:\Users\Administrator\Desktop\test\oh nannana??.mp3';

			//$size =  FileTool::fileSize($file);
			//echo FileTool::byteFormat($size);

			//$info = FileTool::fileInfo($file);
			//FileTool::cp($file , $to1);

			//FileTool::rm($to.'\ttt');
			//FileTool::rm($to.'\PhpStorm 10 10.0.3.rar');

			//FileTool::mv($to1 , $to2);


			/**
			 * 过滤回调，返回真才会复制
			 * 不填回调所有的都复制
			 * recursiveCp
			 **/

			/*
			 * //复制文件夹
						FileTool::recursiveCp($dir , $to , function($info , $relativePath) {
							echo $info->getPathname();
							echo "\r\n";
							return true;
							//return preg_match('#krc#' , $info->getPathname());
						});

			*/

			/*
				//删除文件夹
						FileTool::recursiveMv($dir , $to , function($info , $relativePath) {
							echo $info->getPathname();
							echo "\r\n";
							return true;
							//return preg_match('#krc#' , $info->getPathname());
						});
			*/

			/*
				//删除文件夹
						FileTool::recursiveRm($dir , function($info , $relativePath) {
							echo $info->getPathname();
							echo "\r\n";

							return true;

							return preg_match('#krc$#' , $info->getPathname());
						});
			*/

		}

		public function doImg()
		{

			$img = 'C:\Users\Administrator\Desktop\dd';
			$dest = 'C:\Users\Administrator\Desktop\emo1';
			//图片重命名
			$hash = [];
			FileTool::itreatorDFS($img , function($info , $relativePath) use ($dest , &$hash) {

				if(is_file($info->getPathname()))
				{
					$a = md5_file($info->getPathname());

					if(!in_array($a , $hash))
					{
						$hash[] = $a;

						$de = FileTool::endDS($dest) . FileTool::endDS(dirname($relativePath)) . md5($info->getBaseName()) . '__.' . $info->getExtension();

						if(in_array(strtolower($info->getExtension()) , [
							'jpeg' ,
							'jpg' ,
						]))
						{
							$imageCompress = imageProcessor::getProcessor('compress');
							$ratio = 8;
							$imageCompress->form($info->getPathname())->ratio($ratio)->to($de);
						}
						else
						{
							FileTool::cp($info->getPathname() , $de);
						}

						echo $info->getPathname();
						echo "\r\n";
					}
				}


				return true;
			});

		}

	}














