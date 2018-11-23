<?php

	namespace image;


	use think\App;

	class imageProcessor
	{
		public static $map = [
			'image'    => 'think\Image' ,
			'compress' => 'image\processor\imageCompress' ,
			'exif'     => 'image\processor\imageExif' ,
			'encrpty'  => 'image\processor\encrpty' ,
		];

		/**
		 * @param       $name
		 * @param array $arguments
		 *
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public static function getProcessor($name , $arguments = [])
		{
			return App::invokeClass(self::getClass($name) , $arguments);
		}

		/**
		 * 静态方法转接
		 *
		 * @param $name
		 * @param $arguments
		 *
		 * @return mixed
		 */
		public static function __callStatic($name , $arguments = [])
		{
			return self::getClass($name);
		}

		public static function getClass($name)
		{
			return self::$map[strtolower($name)];
		}
	}