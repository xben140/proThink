<?php
	/**
	 * 应用公共方法
	 * 上传，下载，导出excel。。。。
	 */


	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	/**
	 * 上传文件主方法
	 *
	 * @param string        $fieldName 字段名字
	 * @param  string       $toDir     上传到哪个文件夹
	 * @param callable|null $callback  文件移动成功后的回调
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function upload($fieldName , $toDir , callable $callback = null)
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

			$result = $chunkUpload//设置分块文件临时保存文件夹
			//'PATH_TEMP'           => 'F:\\localWeb\\public_local15\\public\\temp\\',
			->setTempDir(PATH_TEMP)//接口是否允许跨域上传
			->isAllowCors(1)//临时分块文件的保存时间
			->setMaxFileAge(600)//脚本执行最大时间,没用
			//->setMaxExecutionTime(52)
			//保存文件的命名方式
			->rule(function() {
				//return sha1(uniqid('', 1));
			})//最终文件夹要保存的位置
			->moveTo($toDir);

		} catch (\think\exception\ErrorException $exception)
		{
			$result = [
				'error' => $exception->getMessage() ,
				'sign'  => 0 ,
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
	 * @param               $fieldName 图片字段
	 * @param callable|null $callback
	 * @param array         $thumbSize 数组，三个参数，为$image->thumb 的三个参数
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 * @throws \think\image\Exception
	 */
	function uploadImg($fieldName , callable $callback = null , $thumbSize = null)
	{
		$result = upload($fieldName , PATH_PICTURE , $callback);

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
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function uploadFile($fieldName , callable $callback = null)
	{
		return upload($fieldName , PATH_FILE , $callback);
	}


	/**
	 *导出excel信息
	 *
	 * @param array         $titles   标题
	 * @param array         $list     数据
	 * @param string        $fileName 保存名字
	 * @param callable|null $callback 数据处理回调
	 *
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
	 */
	function exportExcel(array $titles , array $list , string $fileName = '导出文件' , callable $callback = null)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
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

		foreach ($titles as $k => $v)
		{
			$sheet->setCellValue('A1' , 'Hello World !A1');
		}

		foreach ($data as $k => $v)
		{

		}

		$sheet->setCellValue('A1' , 'Hello World !A1');
		$sheet->setCellValue('A2' , 'Hello World !A2');
		$sheet->setCellValue('B1' , 'Hello World !B1');
		$sheet->setCellValue('B2' , 'Hello World !B2');

		$writer = new Xlsx($spreadsheet);
		$writer->save($fileName);
	}

	/**
	 *导入excel信息
	 */
	function importExcel()
	{

	}

	/**
	 *发送邮件
	 */
	function sendEmail()
	{

	}

	/**
	 *生成条形码
	 */
	function generateBrcode()
	{

	}

	/**
	 *生成二维码
	 */
	function generateQrcode()
	{

	}



