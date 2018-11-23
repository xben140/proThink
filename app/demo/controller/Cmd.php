<?php

	namespace app\demo\controller;

	use base64\Base64;
	use file\FileTool;
	use image\imageProcessor;
	use Phelium\Component\MySQLBackup;
	use PhpMyAdmin\SqlParser\Parser;
	use PHPSQLParser\PHPSQLParser;
	use pingyin\PingYin;
	use wapmorgan\UnifiedArchive\UnifiedArchive;
	use zip\zip;

	//php index.php /demo/cmd/pinyin


	class Cmd extends FrontendBase
	{

		//public $testImg = 'C:\Users\Administrator\Desktop\pic\a.jpg';
		public $testImg = 'C:\Users\Administrator\Desktop\pic\b.png';
		public $testPath = 'C:\Users\Administrator\Desktop\test\\';
		public static $hashMap = [];

		public function pinyin()
		{
			print_r(PingYin::Transformation('对多音字无能为力'));
			print_r(PingYin::Transformation('最全的PHP汉字转拼音库，比百度词典还全（dict.baidu.com）'));
			print_r(PingYin::Transformation('试试：㐀㐁㐄㐅㐆㐌㐖㐜'));
			print_r(PingYin::Transformation('数字：12345'));
			print_r(PingYin::Transformation('海南'));
			print_r(PingYin::Transformation('乌鲁木齐'));
		}

		//图片缩略图测试
		public function thumb()
		{
			$info = pathinfo($this->testImg);
			$image = imageProcessor::Image()::open($this->testImg);

			FileTool::mkdir_($this->testPath);
			$image->thumb(300 , 300)->save($this->testPath . '/thumb.png' , 'png');
		}

		public function imgEncrypt()
		{
			imageProcessor::encrpty()::en($this->testImg, $this->testPath, 'xxx');
			imageProcessor::encrpty()::de($this->testPath.'ab0199108680aa2f875c6546bff0f323', $this->testPath.'\\fff', 'xxx');
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
				//移动文件夹
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

		public function img()
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


		public function backup()
		{
			$Dump = new MySQLBackup(config('database.hostname') , config('database.username') , config('database.password') , config('database.database'));
			$Dump->addTables(array(
				'ithink_login_log' ,
				'ithink_config' ,
			));
			//$Dump->setCompress('zip');
			$Dump->setDelete(false);
			$Dump->setDownload(false);
			$Dump->dump();
		}

		public function zip()
		{
			$path1 = (MODEL_STATIC_PATH . 'blog');
			$path2 = realpath(replaceToSysSeparator(APP_PATH . 'blog'));

			$zip = new zip(new \PclZip('archive.zip'));

			$zip->create([
				$path1 ,
				$path2 ,
			] , [
				[
					PCLZIP_OPT_REMOVE_PATH ,
					'localweb' ,
				] ,
				[
					PCLZIP_OPT_ADD_PATH ,
					'installpp/bb/cc' ,
				] ,
			]);

			/*
						$zip->extract([
							[
								PCLZIP_OPT_REMOVE_PATH ,
								'localWeb' ,
							] ,
							[
								PCLZIP_OPT_ADD_PATH ,
								'installpp' ,
							] ,
						]);
			*/


		}
	}


	/**
	 * css压缩
	 * [\r\n][ \t]+|[ \t]+|[\r\n](?=})
	 * [\r\n]+                                [\r\n]
	 * (?:^\s+)|(?:\s+(?=:|\{|}|;))|(?:(?<=:|\{|;)\s+)
	 *
	 */













