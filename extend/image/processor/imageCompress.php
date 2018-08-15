<?php

	namespace image\processor;

	use think\Image;

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
			mkdir_(dirname($imagePath));

			return $image->thumb($image->width() * $this->ratio , $image->height() * $this->ratio , Image::THUMB_SCALING)->save($imagePath);
		}
	}