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



	namespace builder;

	/**
	 * 标签构造器
	 * Class tagConstructor
	 * @package builder
	 */
	class tagConstructor
	{
		/**
		 * 自动生成mate标签
		 *
		 * @param string|array $param mate标签的属性
		 *
		 * @return string
		 */
		public static function mate($param)
		{
			$str = '';
			if(is_string($param))
			{
				$str = $param;
			}
			elseif(is_array($param))
			{
				$str = self::buildKV($param);
			}

			return elementsFactory::singleLabel([
				'<meta ' . $str . ' >',
			]);
		}

		/**
		 * 自动生成css标签
		 *
		 * @param string $path css的路径
		 *
		 * @return string
		 */
		public static function css($path = '')
		{
			$tmp = '<link rel="stylesheet" href="~~~PATH~~~">';
			if(is_string($path))
			{
				$str[] = strtr($tmp, [
					'~~~PATH~~~' => $path,
				]);
			}
			elseif(is_array($path))
			{
				$str = array_map(function($v) use ($tmp) {
					return strtr($tmp, [
						'~~~PATH~~~' => $v,
					]);
				}, $path);
			}

			return elementsFactory::singleLabel($str);
		}

		/**
		 * 自动生成css标签
		 * * @param string|array $path js的路径
		 *
		 * @return string
		 */
		public static function js($path)
		{
			$tmp = '<script src="~~~PATH~~~"></script>';
			$str = '';
			if(is_string($path))
			{
				$str[] = strtr($tmp, [
					'~~~PATH~~~' => $path,
				]);
			}
			elseif(is_array($path))
			{
				$str = array_map(function($v) use ($tmp) {
					return strtr($tmp, [
						'~~~PATH~~~' => $v,
					]);
				}, $path);
			}

			return elementsFactory::singleLabel($str);
		}

		/**
		 * @param $arr
		 *
		 * @return string
		 */
		public static function buildKV($arr)
		{
			$str = '';
			foreach ($arr as $k => $v)
			{
				$str .= ' ' . $k . '=' . '"' . $v . '" ';
			}

			return $str;
		}
	}