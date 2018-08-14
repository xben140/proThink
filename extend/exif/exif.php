<?php

	namespace exif;


	class imgExif
	{
		public $imgPath;
		public $unitFlag;
		public $imgInfoAll;
		public $imgInfoAllCN;
		public $imgInfoCommon;
		public $imgInfoBrief;
		public $imgInfoAllCNUnit;

		public static $exifImgtype = [
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
		];

		public static $translate = [
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
		];


		function __construct()
		{
			$this->checkEnv();
		}

		public function checkEnv()
		{
			extension_loaded('exif') && extension_loaded('mbstring') or die('exif module was not loaded,please check it in php.ini<br>NOTICE:On Windows,php_mbstring.dll must be before php_exif.dll');
		}
	}