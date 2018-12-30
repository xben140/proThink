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


	/**
	 * 应用公共方法
	 * 上传，下载，导出excel。。。。
	 */


	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	/**
	 * 上传文件主方法，不推荐直接调用，请调用下面已经封装的专门上传文件和图片的方法
	 *
	 * @param string        $fieldName 字段名字
	 * @param  string       $toDir     上传到哪个文件夹
	 * @param callable|null $callback  文件移动成功后的回调
	 * @param callable|null $rename    文件重命名的函数
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function upload($fieldName , $toDir , callable $callback = null , callable $rename = null)
	{
		//文件一共分了几块
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
		//当前是第几块
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;

		$result = [];
		try
		{
			//实例化文件上传类
			//第一个参数为input的name值
			$chunkUpload = new \upload\uploader($fieldName , $chunks , $chunk);

			$chunkUpload//设置分块文件临时保存文件夹
			//'PATH_TEMP'           => 'F:\\localWeb\\public_local15\\public\\temp\\',
			->setTempDir(PATH_TEMP)//接口是否允许跨域上传
			->isAllowCors(1)//临时分块文件的保存时间
			->setMaxFileAge(600);//脚本执行最大时间,没用
			//->setMaxExecutionTime(52)


			//保存文件的命名方式
			is_callable($rename) && $chunkUpload->rule($rename);

			//最终文件夹要保存的位置
			$result = $chunkUpload->moveTo($toDir);
			//file_put_contents('./ddd.txt' , json_encode($result));

		} catch (\think\exception\ErrorException $exception)
		{
			$result = [
				'msg'         => '处理出错：' . $exception->getMessage() ,
				'sign'        => 0 ,
				'is_finished' => 0 ,
			];
		}

		if(is_callable($callback) && $result['is_finished'])
		{
			$result = $callback($result);
		}

		return $result;

	}

	/**
	 * 上传图片专用
	 *
	 * @param string        $fieldName 图片字段
	 * @param callable|null $callback
	 * @param array         $thumbSize 数组，三个参数，为$image->thumb 的三个参数
	 * @param null          $path
	 * @param callable|null $rename
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 * @throws \think\image\Exception
	 */
	function uploadImg($fieldName , callable $callback = null , $thumbSize = null , $path = null , callable $rename = null)
	{
		!is_string($path) && ($path = PATH_PICTURE);
		$result = upload($fieldName , $path , $callback , $rename);

		if($result['is_finished'])
		{
			if($thumbSize)
			{
				$isMakeThumb = (function() use ($result , $thumbSize) {
					return //图片的mime
						(preg_match('#^image#' , $result['mime']) //不是图片mime但是后缀是jpg或者jpeg的
							|| (preg_match('#^application/octet-stream#' , $result['mime']) && preg_match('#(?:jpg|jpeg)$#i' , $result['basename']))) //参数是array
						//参数正确
						&& is_array($thumbSize) && is_numeric($thumbSize[0]) && is_numeric($thumbSize[1]);
				})();

				$imgPath = makeImgPath($result['savename']);
				$imgThumbPath = makeImgPath($result['savename'] , 1);
				//传了就生缩略图
				if($isMakeThumb)
				{
					//没传第三个参数默认为等比
					!in_array($thumbSize[2] , range(1 , 6)) && ($thumbSize[2] = 1);
					$image = \think\Image::open($imgPath);

					try
					{
						$image->thumb(... $thumbSize)->save($imgThumbPath);
					} catch (\think\exception\ErrorException $exception)
					{
						$a = $exception->getMessage();
					} catch (\Exception $exception)
					{
						$b = $exception->getMessage();
					}

				}
				if(!is_file($imgThumbPath)) copy($imgPath , $imgThumbPath);
				$result['thumb_url'] = makeImgUrl($result['savename'] , 1);
			}


		}


		return $result;
	}

	/**
	 *     * 上传文件专用
	 *
	 * @param   string      $fieldName 文件字段
	 * @param callable|null $callback
	 * @param null          $path
	 * @param callable|null $rename
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function uploadFile($fieldName , callable $callback = null , $path = null , callable $rename = null)
	{
		!is_string($path) && ($path = PATH_FILE);

		return upload($fieldName , $path , $callback , $rename);
	}


	/**
	 * 下载文件专用函数
	 *
	 * @param           $file
	 * @param string    $saveName
	 * @param float|int $buffer
	 */
	function downloadFile($file , $saveName = '' , $buffer = 4 * 1024)
	{
		$downloader = new \download\downloader($file , $saveName);
		$downloader->setBuffer($buffer)->send();
	}

	/**
	 *导出excel信息
	 *
	 * @param array         $list       数据
	 * @param string        $fileName   保存名字
	 * @param callable|null $callback   数据处理回调
	 * @param bool          $isDownload 是否直接下载
	 *
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
	 */
	function exportExcel(array $list , string $fileName = '导出文件' , callable $callback = null , $isDownload = true)
	{
		//https://phpspreadsheet.readthedocs.io/en/develop/topics/accessing-cells/
		$spreadsheet = new Spreadsheet();

		$data = [];

		if(is_callable($callback))
		{
			foreach ($list as $k => $v)
			{
				call_user_func_array($callback , [
					$v ,
					&$data ,
				]);
			}
		}
		else
		{
			$data = $list;
		}

		/*
				$data = [
					[NULL, 2010, 2011, 2012],
					['Q1',   12,   15,   21],
					['Q2',   56,   73,   86],
					['Q3',   52,   61,   69],
					['Q4',   30,   32,    0],
				];
		*/

		$spreadsheet->getActiveSheet()->fromArray($data ,  // The data to set
			null ,        // Array values with this value will not be set
			'A1'         // Top left coordinate of the worksheet range where we want to set these values (default is A1)
		);

		//$sheet = $spreadsheet->getActiveSheet();
		//$sheet->setCellValueByColumnAndRow(1, 5, 'PhpSpreadsheet');

		/*

			$index = 'A';
			foreach ($titles as $k => $v)
			{
				$sheet->setCellValue($index . '1' , $v);
				$index++;
			}

			for ($l = 0 , $len_l = count($data); $l < $len_l; $l++)
			{
				$index = 'A';
				$arr = array_values($data[$l]);

				for ($i = 0 , $len = count($arr); $i < $len; $i++)
				{
					$t = $index . ($l + 2);
					$sheet->setCellValue($t , $arr[$i]);
					$index++;
				}
			}*/


		$writer = new Xlsx($spreadsheet);

		if($isDownload)
		{

			$info = new \SplFileInfo($fileName);
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $info->getBasename());
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
		}
		else
		{
			$writer->save($fileName);
		}
	}

	/**
	 *导入excel信息
	 *
	 * @param string $path
	 *
	 * @return array
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
	 */
	function importExcel(string $path)
	{
		/*
		 *
		 *
		'Xlsx' => Reader\Xlsx::class,
        'Xls' => Reader\Xls::class,
        'Xml' => Reader\Xml::class,
        'Ods' => Reader\Ods::class,
        'Slk' => Reader\Slk::class,
        'Gnumeric' => Reader\Gnumeric::class,
        'Html' => Reader\Html::class,
        'Csv' => Reader\Csv::class,
		 *
		 * */
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($path);
		$worksheet = $spreadsheet->getActiveSheet();
		$data = [];

		//遍历行
		foreach ($worksheet->getRowIterator() as $k1 => $row)
		{
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);

			//遍历每行里的每个cell
			// This loops through all cells,even if a cell value is not set.
			// By default, only cells that have a value set will be iterated.
			foreach ($cellIterator as $k2 => $cell)
			{
				$data[$k1][] = $cell->getValue();
			}
		}

		//$cellValue = $worksheet->getCell('A1')->getValue();
		//$cellValue = $worksheet->getCellByColumnAndRow(2 , 5)->getValue();
		return $data;
	}

	/**
	 *发送邮件
	 *
	 * @param string $title
	 * @param string $body
	 * @param array  $to
	 * @param null   $err
	 *
	 * @return int
	 */
	function sendEmail($title , $body , $to , &$err = null)
	{

//https://blog.csdn.net/Edu_enth/article/details/53114818
//https://swiftmailer.symfony.com/docs/messages.html
//https://www.helloweba.net/php/457.html

		try
		{
			// 邮箱服务器
			$transport = new Swift_SmtpTransport(config('email_host') , config('email_port'));
			// 邮箱用户名
			$transport->setUsername(config('email_username'));
			// 邮箱密码，有的邮件服务器是授权码
			$transport->setPassword(config('email_password'));

			// 邮件标题
			$message = new Swift_Message();
			//邮件标题
			$message->setSubject($title);
			// 发送者
			$message->setFrom([config('email_username') => config('email_user')]);

			//发送对象，数组形式支持多个
			$message->setTo($to);
			//邮件内容
			$message->setBody($body);

			$mailer = new Swift_Mailer($transport);

			//$path = 'C:\Users\Administrator\Desktop\test.png';
			//$message->attach(Swift_Attachment::fromPath($path , 'image/jpeg')->setFilename('rename_pic.jpg'));//附件图片

			$res = $mailer->send($message);

			return $res;
		} catch (\Exception $e)
		{
			$err = $e->getMessage();

			return false;
		}
	}

	/**
	 * 生成二维码
	 *
	 * @param string       $data 写入数据
	 * @param string |bool $path 二维码保存路径,不填为不保存
	 * @param string       $ecc  错误修正水平    0 - 3
	 * @param int          $size 二维码大小      1 - 10
	 */
	function generateQrcode($data , $path = false , $ecc = '2' , $size = 10)
	{
		//https://packagist.org/packages/kairos/phpqrcode
		//http://phpqrcode.sourceforge.net/examples/index.php?example=001
		ob_end_flush();
		QRcode::png($data , $path , $ecc , $size , 2);
	}



















