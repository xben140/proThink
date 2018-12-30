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



	namespace image\processor;

	use think\Image;

	/**压缩图片用
	 * Class imageCompress
	 * @package image\processor
	 */
	class imageCompress
	{
		public $imagePath;
		public $ratio;

		public function __construct($imagePath = '')
		{
			$this->imagePath = $imagePath;
		}

		/**
		 * @param $imagePath
		 *
		 * @return $this
		 */
		public function form($imagePath)
		{
			$this->imagePath = $imagePath;

			return $this;
		}

		/**
		 * @param int $ratio
		 *
		 * @return $this
		 */
		public function ratio($ratio = 9)
		{
			$this->ratio = $ratio / 10;

			return $this;
		}

		/**
		 * @param $imagePath
		 *
		 * @return Image
		 * @throws \think\image\Exception
		 */
		public function to($imagePath)
		{
			$image = Image::open($this->imagePath);
			static::mkdir_(dirname($imagePath));

			return $image->thumb($image->width() * $this->ratio , $image->height() * $this->ratio , Image::THUMB_SCALING)->save($imagePath);
		}


		/**
		 * 创建文件夹
		 *
		 * @param     $path
		 * @param int $mode
		 *
		 * @return bool
		 */
		public static function mkdir_($path , $mode = 0777)
		{
			$path = static::pathFilter($path);

			return !is_dir(($path)) ? mkdir(($path) , $mode , 1) : @chmod($path , $mode);
		}


		/**
		 * 过滤文件里不支持命名的字符
		 *
		 * @param $path
		 *
		 * @return mixed
		 */
		public static function pathFilter($path)
		{
			return preg_replace('/(?<!^[a-z])[:*?"<>|]/im' , '_' , $path);
		}

	}