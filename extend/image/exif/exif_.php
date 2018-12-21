<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	class imgExif
	{
		public $imgPath;
		public $unitFlag;
		public $imgInfoAll;
		public $imgInfoAllCN;
		public $imgInfoCommon;
		public $imgInfoBrief;
		public $imgInfoAllCNUnit;

		/*构造函数，检测exif和mbstring模块是否开启*/
		function __construct()
		{
			extension_loaded('exif') && extension_loaded('mbstring') or die('exif module was not loaded,please check it in php.ini<br>NOTICE:On Windows,php_mbstring.dll must be before php_exif.dll');
		}

		/*获取图片格式，返回图片格式信息
		*     如果只获取图片格式信息，建议采用此方法
		*
		* @param $imgPath(必填,字符串)，图片路径，不可为url。
		* @param $MimeOrExifOrExtension(可选,字符串)，获取图片格式为Mime类型或Exif类型或图片类型文件后缀。
		*      如果为字符串'Mime'，则获取Mime图片类型。
		*      如果为字符串'Exif'，则获取Exif图片类型。
		*      如果为字符串'Extension'，则获取图片类型的文件后缀。
		*      如果填写参数异常或缺省，则默认获取Mime图片类型。
		*/

		function getImgtype($imgPath , $MimeOrExifOrExtension = null)
		{
			$exifImgtype = array(
				'IMAGETYPE_GIF'     => 1 ,
				'IMAGETYPE_JPEG'    => 2 ,
				'IMAGETYPE_PNG'     => 3 ,
				'IMAGETYPE_SWF'     => 4 ,
				'IMAGETYPE_PSD'     => 5 ,
				'IMAGETYPE_BMP'     => 6 ,
				'IMAGETYPE_TIFF_II' => 7 ,
				//（Intel 字节顺序）
				'IMAGETYPE_TIFF_MM' => 8 ,
				//（Motorola 字节顺序）
				'IMAGETYPE_JPC'     => 9 ,
				'IMAGETYPE_JP2'     => 10 ,
				'IMAGETYPE_JPX'     => 11 ,
				'IMAGETYPE_JB2'     => 12 ,
				'IMAGETYPE_SWC'     => 13 ,
				'IMAGETYPE_IFF'     => 14 ,
				'IMAGETYPE_WBMP'    => 15 ,
				'IMAGETYPE_XBM'     => 16 ,
			);
			$exifType = array_search(exif_imagetype($imgPath) , $exifImgtype);
			$mimeType = image_type_to_mime_type(exif_imagetype($imgPath));
			$extension = substr(image_type_to_extension(exif_imagetype($imgPath)) , 1);
			if($MimeOrExifOrExtension)
			{
				if($MimeOrExifOrExtension === 'Mime')
				{
					return $mimeType;
				}
				elseif($MimeOrExifOrExtension === 'Exif')
				{
					return $exifType;
				}
				elseif($MimeOrExifOrExtension === 'Extension')
				{
					return $extension;
				}
				else
				{
					return $mimeType;
				}
			}
			else
			{
				return $mimeType;
			}
		}

		/*处理Exif信息*/
		function imgInfo()
		{
			$imgPath = $this->imgPath;

			$imgInfoAll = exif_read_data($imgPath , 0 , 1);
			foreach ($imgInfoAll as $section => $arrValue)
			{
				foreach ($arrValue as $key => $value)
				{
					$infoAllKey[] = $key;
					$infoAllValue[] = $value;
				}
			}
			$infoAll = array_combine($infoAllKey , $infoAllValue);

			$translate = array(
				'FileName'                    => '文件名' ,
				'FileDateTime'                => '文件修改时间' ,
				'FileSize'                    => '文件大小' ,
				'FileType'                    => 'Exif文件类型' ,
				'MimeType'                    => 'Mime文件类型' ,
				'SectionsFound'               => '找到Sections' ,
				'html'                        => 'html中图片宽高' ,
				'Height'                      => '图片高度' ,
				'Width'                       => '图片宽度' ,
				'IsColor'                     => '是否彩色' ,
				'ByteOrderMotorola'           => '是否为Motorola字节顺序' ,
				'ApertureFNumber'             => '光圈数' ,
				'Comments'                    => '作者注释' ,
				'Author'                      => '作者' ,
				'UserComment'                 => '用户注释' ,
				'UserCommentEncoding'         => '用户注释编码' ,
				'Thumbnail.FileType'          => '缩略图Exif文件类型' ,
				'Thumbnail.MimeType'          => '缩略图Mime文件类型' ,
				'Make'                        => '制造商' ,
				'Model'                       => '型号' ,
				'Orientation'                 => '方向' ,
				'XResolution'                 => '水平分辨率' ,
				'YResolution'                 => '垂直分辨率' ,
				'ResolutionUnit'              => '分辨率单位' ,
				'Software'                    => '创建软件' ,
				'DateTime'                    => '最后修改时间' ,
				'YCbCrPositioning'            => 'YCbCr位置控制' ,
				'Exif_IFD_Pointer'            => 'Exif图像IFD的指针' ,
				'Compression'                 => '压缩方式' ,
				'JPEGInterchangeFormat'       => 'JPEG SOI偏移' ,
				'JPEGInterchangeFormatLength' => 'JPEG数据字节' ,
				'ExposureTime'                => '曝光时间' ,
				'FNumber'                     => '焦距比数' ,
				'ExposureProgram'             => '曝光程序' ,
				'ISOSpeedRatings'             => 'ISO感光度' ,
				'ExifVersion'                 => 'Exif版本' ,
				'DateTimeOriginal'            => '拍摄时间' ,
				'DateTimeDigitized'           => '数字化时间' ,
				'ComponentsConfiguration'     => '分量配置' ,
				'CompressedBitsPerPixel'      => '图像压缩率' ,
				'ExposureBiasValue'           => '曝光补偿' ,
				'MaxApertureValue'            => '最大光圈值' ,
				'MeteringMode'                => '测光模式' ,
				'LightSource'                 => '光源' ,
				'Flash'                       => '闪光灯' ,
				'FocalLength'                 => '焦距' ,
				'SubSecTime'                  => '亚秒时间' ,
				'SubSecTimeOriginal'          => '亚秒级拍摄时间' ,
				'SubSecTimeDigitized'         => '亚秒级数字化时间' ,
				'FlashPixVersion'             => 'FlashPix版本' ,
				'ColorSpace'                  => '色彩空间' ,
				'ExifImageWidth'              => 'Exif图片宽度' ,
				'ExifImageLength'             => 'EXif图片高度' ,
				'InteroperabilityOffset'      => 'IFD格式数据偏移量' ,
				'SensingMethod'               => '彩色区域传感器类型' ,
				'FileSource'                  => '图片像源' ,
				'SceneType'                   => '场景类型' ,
				'CFAPattern'                  => '滤波阵列图案' ,
				'CustomRendered'              => '自定义图像处理' ,
				'ExposureMode'                => '曝光模式' ,
				'WhiteBalance'                => '白平衡' ,
				'DigitalZoomRatio'            => '数位变焦倍率' ,
				'FocalLengthIn35mmFilm'       => '等价35mm焦距' ,
				'SceneCaptureType'            => '取景模式' ,
				'GainControl'                 => '增益控制' ,
				'Contrast'                    => '对比度' ,
				'Saturation'                  => '饱和度' ,
				'Sharpness'                   => '清晰度' ,
				'SubjectDistanceRange'        => '对焦距离' ,
				'InterOperabilityIndex'       => 'InterOperability指数' ,
				'InterOperabilityVersion'     => 'InterOperability版本' ,
			);

			@$translate_unit = array(
				'文件名'                => $infoAll['FileName'] ,
				'文件修改时间'             => date('Y:m:d H:i:s' , $infoAll['FileDateTime']) ,
				'文件大小'               => round($infoAll['FileSize'] / 1024) . 'kb' ,
				'Exif文件类型'           => $this->getImgtype($imgPath , 'Exif') ,
				'Mime文件类型'           => $infoAll['MimeType'] ,
				'找到Sections'         => $infoAll['SectionsFound'] ,
				'html中图片宽高'          => $infoAll['html'] ,
				'图片高度'               => $infoAll['Height'] . 'px' ,
				'图片宽度'               => $infoAll['Width'] . 'px' ,
				'是否彩色'               => $infoAll['IsColor'] == 1 ? '是' : '否' ,
				'是否为Motorola字节顺序'    => $infoAll['ByteOrderMotorola'] == 1 ? '是' : '否' ,
				'光圈数'                => $infoAll['ApertureFNumber'] ,
				'作者注释'               => $infoAll['Comments'] ,
				'作者'                 => $infoAll['Author'] ,
				'用户注释'               => $infoAll['UserComment'] ,
				'用户注释编码'             => $infoAll['UserCommentEncoding'] ,
				'缩略图Exif文件类型'        => $this->getImgtype($imgPath , 'Exif') ,
				'缩略图Mime文件类型'        => $infoAll['Thumbnail.MimeType'] ,
				'制造商'                => $infoAll['Make'] ,
				'型号'                 => $infoAll['Model'] ,
				'方向'                 => array_search($infoAll['Orientation'] , array(
					'top left side'     => 1 ,
					'top right side'    => 2 ,
					'bottom right side' => 3 ,
					'bottom left side'  => 4 ,
					'left side top'     => 5 ,
					'right side top'    => 6 ,
					'right side bottom' => 7 ,
					'left side bottom'  => 8 ,
				)) ,
				'水平分辨率'              => $infoAll['XResolution'] ,
				'垂直分辨率'              => $infoAll['YResolution'] ,
				'分辨率单位'              => array_search($infoAll['ResolutionUnit'] , array(
					'无单位' => 1 ,
					'英寸'  => 2 ,
					'厘米'  => 3 ,
				)) ,
				'创建软件'               => $infoAll['Software'] ,
				'最后修改时间'             => $infoAll['DateTime'] ,
				'YCbCr位置控制'          => $infoAll['YCbCrPositioning'] == 1 ? '像素阵列的中心' : '基准点' ,
				'Exif图像IFD的指针'       => $infoAll['Exif_IFD_Pointer'] ,
				'压缩方式'               => $infoAll['Compression'] == 6 ? 'jpeg压缩' : '无压缩' ,
				'JPEG SOI偏移'         => $infoAll['JPEGInterchangeFormat'] ,
				'JPEG数据字节'           => $infoAll['JPEGInterchangeFormatLength'] ,
				'曝光时间'               => $infoAll['ExposureTime'] . '秒' ,
				'焦距比数'               => $infoAll['FNumber'] ,
				'曝光程序'               => array_search($infoAll['ExposureProgram'] , array(
					'手动控制' => 1 ,
					'程序控制' => 2 ,
					'光圈优先' => 3 ,
					'快门优先' => 4 ,
					'景深优先' => 5 ,
					'运动模式' => 6 ,
					'肖像模式' => 7 ,
					'风景模式' => 8 ,
				)) ,
				'ISO感光度'             => $infoAll['ISOSpeedRatings'] ,
				'Exif版本'             => $infoAll['ExifVersion'] ,
				'拍摄时间'               => $infoAll['DateTimeOriginal'] ,
				'数字化时间'              => $infoAll['DateTimeDigitized'] ,
				'分量配置'               => $infoAll['ComponentsConfiguration'] ,
				'图像压缩率'              => $infoAll['CompressedBitsPerPixel'] ,
				'曝光补偿'               => $infoAll['ExposureBiasValue'] . '电子伏特' ,
				'最大光圈值'              => $infoAll['MaxApertureValue'] ,
				'测光模式'               => array_search($infoAll['MeteringMode'] , array(
					'未知'       => 0 ,
					'平均'       => 1 ,
					'中央重点平均测光' => 2 ,
					'点测'       => 3 ,
					'分区'       => 4 ,
					'评估'       => 5 ,
					'局部'       => 6 ,
					'其他'       => 255 ,
				)) ,
				'光源'                 => array_search($infoAll['LightSource'] , array(
					'未知'    => 0 ,
					'日光灯'   => 1 ,
					'荧光灯'   => 2 ,
					'钨丝灯'   => 3 ,
					'闪光灯'   => 10 ,
					'标准灯光A' => 17 ,
					'标准灯光B' => 18 ,
					'标准灯光C' => 19 ,
					'D55'   => 20 ,
					'D65'   => 21 ,
					'D75'   => 22 ,
					'其他'    => 255 ,
				)) ,
				'闪光灯'                => array_search($infoAll['Flash'] , array(
					'闪光灯未闪光'               => 0 ,
					'闪光灯已闪光'               => 1 ,
					'闪光灯已闪光但频闪观测器未检测到返回光源' => 5 ,
					'闪光灯已闪光,频闪观测器检测到返回光源'  => 7 ,
				)) ,
				'焦距'                 => $infoAll['FocalLength'] . '毫米' ,
				'亚秒时间'               => $infoAll['SubSecTime'] ,
				'亚秒级拍摄时间'            => $infoAll['SubSecTimeOriginal'] ,
				'亚秒级数字化时间'           => $infoAll['SubSecTimeDigitized'] ,
				'FlashPix版本'         => $infoAll['FlashPixVersion'] ,
				'色彩空间'               => $infoAll['ColorSpace'] == 1 ? 'sRGB' : 'Uncalibrated' ,
				'Exif图片宽度'           => $infoAll['ExifImageWidth'] . 'px' ,
				'EXif图片高度'           => $infoAll['ExifImageLength'] . 'px' ,
				'IFD格式数据偏移量'         => $infoAll['InteroperabilityOffset'] ,
				'彩色区域传感器类型'          => $infoAll['SensingMethod'] == 2 ? '单色区传感器' : '其他' ,
				'图片像源'               => $infoAll['FileSource'] == '0x03' ? '数码相机' : '其他' ,
				'场景类型'               => $infoAll['SceneType'] == '0x01' ? '直接拍摄' : '其他' ,
				'滤波阵列图案'             => $infoAll['CFAPattern'] ,
				'自定义图像处理'            => $infoAll['CustomRendered'] ,
				'曝光模式'               => $infoAll['CustomRendered'] == 1 ? '手动' : '自动' ,
				'白平衡'                => $infoAll['WhiteBalance'] == 1 ? '手动' : '自动' ,
				'数位变焦倍率'             => $infoAll['DigitalZoomRatio'] ,
				'等价35mm焦距'           => $infoAll['FocalLengthIn35mmFilm'] . '毫米' ,
				'取景模式'               => array_search($infoAll['SceneCaptureType'] , array(
					'自动'       => 0 ,
					'肖像场景'     => 1 ,
					'景观场景'     => 2 ,
					'运动场景'     => 3 ,
					'夜景'       => 4 ,
					'自动曝光'     => 5 ,
					'光圈优先自动曝光' => 256 ,
					'快门优先自动曝光' => 512 ,
					'手动曝光'     => 768 ,
				)) ,
				'增益控制'               => $infoAll['GainControl'] ,
				'对比度'                => array_search($infoAll['Contrast'] , array(
					'低'  => -1 ,
					'普通' => 0 ,
					'高'  => 1 ,
				)) ,
				'饱和度'                => array_search($infoAll['Saturation'] , array(
					'低'  => -1 ,
					'普通' => 0 ,
					'高'  => 1 ,
				)) ,
				'清晰度'                => array_search($infoAll['Sharpness'] , array(
					'低'  => -1 ,
					'普通' => 0 ,
					'高'  => 1 ,
				)) ,
				'对焦距离'               => array_search($infoAll['SubjectDistanceRange'] , array(
					'未知' => 0 ,
					'微距' => 1 ,
					'近景' => 2 ,
					'远景' => 3 ,
				)) ,
				'InterOperability指数' => $infoAll['InterOperabilityIndex'] ,
				'InterOperability版本' => $infoAll['InterOperabilityVersion'] ,
			);

			$infoAllCNKey = array_keys($translate);
			$infoAllCNName = array_values($translate);
			foreach ($infoAllCNKey as $value)
			{
				@$infoAllCNValue[] = $infoAll[$value];
			}
			$infoAllCNUnit = array_combine($infoAllCNName , array_values($translate_unit));
			$infoAllCN = array_combine($infoAllCNName , $infoAllCNValue);
			$infoCommon = array(
				$translate['FileName']               => $infoAll['FileName'] ,
				$translate['DateTimeOriginal']       => $infoAll['DateTimeOriginal'] ,
				$translate['MimeType']               => $infoAll['MimeType'] ,
				$translate['Width']                  => $infoAll['Width'] ,
				$translate['Height']                 => $infoAll['Height'] ,
				$translate['Comments']               => $infoAll['Comments'] ,
				$translate['Author']                 => $infoAll['Author'] ,
				$translate['Make']                   => $infoAll['Make'] ,
				$translate['Model']                  => $infoAll['Model'] ,
				$translate['CompressedBitsPerPixel'] => $infoAll['CompressedBitsPerPixel'] ,
				$translate['ExposureBiasValue']      => $infoAll['ExposureBiasValue'] ,
				$translate['MaxApertureValue']       => $infoAll['MaxApertureValue'] ,
				$translate['MeteringMode']           => $infoAll['MeteringMode'] ,
				$translate['LightSource']            => $infoAll['LightSource'] ,
				$translate['Flash']                  => $infoAll['Flash'] ,
				$translate['FocalLength']            => $infoAll['FocalLength'] ,
				$translate['SceneType']              => $infoAll['SceneType'] ,
				$translate['CFAPattern']             => $infoAll['CFAPattern'] ,
				$translate['CustomRendered']         => $infoAll['CustomRendered'] ,
				$translate['ExposureMode']           => $infoAll['ExposureMode'] ,
				$translate['WhiteBalance']           => $infoAll['WhiteBalance'] ,
				$translate['DigitalZoomRatio']       => $infoAll['DigitalZoomRatio'] ,
				$translate['FocalLengthIn35mmFilm']  => $infoAll['FocalLengthIn35mmFilm'] ,
				$translate['SceneCaptureType']       => $infoAll['SceneCaptureType'] ,
				$translate['GainControl']            => $infoAll['GainControl'] ,
				$translate['Contrast']               => $infoAll['Contrast'] ,
				$translate['Saturation']             => $infoAll['Saturation'] ,
				$translate['Sharpness']              => $infoAll['Sharpness'] ,
				$translate['SubjectDistanceRange']   => $infoAll['SubjectDistanceRange'] ,
				$translate['Software']               => $infoAll['Software'] ,
				$translate['DateTime']               => $infoAll['DateTime'] ,
				$translate['FileSize']               => $infoAll['FileSize'] ,
			);
			foreach ($infoCommon as $cKey => $cKalue)
			{
				$infoCommonUnitKeys[] = $cKey;
				$infoCommonUnitValues[] = $translate_unit[$cKey];
			}
			$infoCommonUnit = array_combine($infoCommonUnitKeys , $infoCommonUnitValues);

			$infoBrief = array(
				$translate['FileName']         => $infoAll['FileName'] ,
				$translate['Width']            => $infoAll['Width'] ,
				$translate['Height']           => $infoAll['Height'] ,
				$translate['DateTimeOriginal'] => $infoAll['DateTimeOriginal'] ,
				$translate['Make']             => $infoAll['Make'] ,
				$translate['Model']            => $infoAll['Model'] ,
				$translate['MimeType']         => $infoAll['MimeType'] ,
			);
			foreach ($infoBrief as $bKey => $bValue)
			{
				$infoBriefUnitKeys[] = $bKey;
				$infoBriefUnitValues[] = $translate_unit[$bKey];
			}
			$infoBriefUnit = array_combine($infoBriefUnitKeys , $infoBriefUnitValues);

			$this->imgInfoAll = $infoAll;
			$this->imgInfoAllCN = $infoAllCN;
			$this->imgInfoAllCNUnit = $infoAllCNUnit;
			$this->imgInfoCommon = $this->unitFlag ? $infoCommonUnit : $infoCommon;
			$this->imgInfoBrief = $this->unitFlag ? $infoBriefUnit : $infoBrief;
		}

		/*获取图片Exif信息，返回Exif信息一维数组
		*
		* @param $imgPath(必填,字符串)，图片路径，不可为url。
		* @param $iChoice(可选,字符串或一维数组)
		*    此参数内置了三种模式：
		*      如果为字符串'All'，则获取所有信息；
		*      如果为字符串'Common'，则获取常用信息；
		*      如果为字符串'Brief'，则获取简要信息。
		*    用户可以自定义数组获取精确的信息，如array('图片宽度','图片高度')，则获取图片宽度和高度。
		*    对于异常输入或缺省，则自动获取简要信息。
		* @param $showUnit(可选，字符串)，只要不为null，则获取已经转换后的值，否则获取未转换后的值。
		*/
		function getImgInfo($imgPath , $iChoice = null , $showUnit = null)
		{
			$this->imgPath = $imgPath;
			$this->unitFlag = $showUnit;
			$this->imgInfo();
			$this->imgInfoAllCN = $showUnit ? $this->imgInfoAllCNUnit : $this->imgInfoAllCN;
			if($iChoice)
			{
				if(is_string($iChoice))
				{
					if($iChoice === 'All')
					{
						return $this->imgInfoAllCN;
					}
					elseif($iChoice === 'AllUnit')
					{
						return $this->imgInfoAllCN;
					}
					elseif($iChoice === 'Common')
					{
						return $this->imgInfoCommon;
					}
					elseif($iChoice === 'Brief')
					{
						return $this->imgInfoBrief;
					}
					else
					{
						return $this->imgInfoBrief;
					}
				}
				elseif(is_array($iChoice))
				{
					foreach ($iChoice as $value)
					{
						$arrCustomValue[] = $this->imgInfoAllCN[$value];
					}
					$arrCustom = array_combine($iChoice , $arrCustomValue) or die('Ensure the array $iChoice values match $infoAll keys!');

					return $arrCustom;
				}
				else
				{
					return $this->imgInfoBrief;
				}
			}
			else
			{
				return $this->imgInfoBrief;
			}
		}
	}

	//示例，同时检测脚本执行时间

	function exeTime()
	{
		$micro = microtime();
		list($usec , $sec) = explode(' ' , $micro);

		return ($sec + $usec);
	}

	$start = exeTime();

	$i = new imgExif();
	//echo '<font color=\'blue\'>图片格式：' . $i->getImgtype('12.jpg','Extension') . '<br><br></font>';
	$arr = $i->getImgInfo('12.jpg' , 'All' , '1');
	foreach ($arr as $key => $value)
	{
		echo $key . ': ' . $value . '<br>';
	}

	$end = exeTime();
	echo '<br><font color=\'red\'>脚本执行时间：' . ($end - $start) . '<br></font>';

?>