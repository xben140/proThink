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
	 * Class elementsFactory
	 * @package builder
	 */
	class elementsFactory
	{
		/**
		 * 元素类映射表，每个lib文件夹里的元素都要在这里注册
		 * 注册后直接用elementsFactory::customElementFormPath方式调用即可获取对应实例
		 * @var array
		 */
		public static $elementsClassMap = [
			//custom
			'customElementFormPath' => \builder\elements\base\customElementFormPath::class,
			'customElementFormText' => \builder\elements\base\customElementFormText::class,

		];

		/**
		 * 元素类映射表注册方法
		 *
		 * @param $map
		 */
		public static function registerMap($map)
		{
			self::$elementsClassMap = array_merge(self::$elementsClassMap, $map);
		}

		/**
		 *    获取映射表对应类
		 *
		 * @param $name
		 *
		 * @return mixed
		 */
		public static function getElementsMap($name)
		{
			return isset(self::$elementsClassMap[$name]) ? self::$elementsClassMap[$name] : self::$elementsClassMap;
		}

		/**
		 * 静态方法转接
		 *
		 * @param $className
		 * @param $arguments
		 *
		 * @return mixed
		 */
		public static function __callStatic($className, $arguments = [])
		{
			return self::build($className , $arguments);
		}

		/**
		 *    实例化类的另一种方法
		 *
		 * @param       $className
		 * @param array $arguments
		 *
		 * @return mixed
		 */
		public static function build($className, $arguments = [])
		{
			return new self::$elementsClassMap[$className](... $arguments);
		}


		/**
		 * 生成双标签
		 * 第一个参数为标签名字 例如div
		 * 第二个是div里内容的生成回调
		 * @return mixed
		 */
		public static function doubleLabel()
		{
			$args = func_get_args();
			$tagName = $args[0];
			$closure = $args[1];
			$attr = (isset($args[2]) && is_array($args[2])) ? $args[2] : [];

			$temp = "<~~~TAG__NAME~~~ ~~~ATTRS~~~ > <!--  ~~~CONTENTS~~~  --> </~~~TAG__NAME~~~>";

			$str = '';
			if(is_string($attr))
			{
				$str = $attr;
			}
			elseif(is_array($attr))
			{
				$str = tagConstructor::buildKV($attr);
			}


			$text = strtr($temp, [
				'~~~TAG__NAME~~~' => $tagName,
				'~~~ATTRS~~~'     => $str,
				//'~~~CONTENTS~~~'  => implode("\r\n", $doms),
			]);

			return call_user_func_array("self::customElementFormText", [$text])->make($closure);
		}

		/**
		 * 生成单标签
		 * 一个参数，闭包，或者字符串，或者数组
		 * @return mixed
		 */
		public static function singleLabel()
		{
			$args = func_get_args();
			$doms = [];
			$text = $args[0];

			if(is_callable($args[0]))
			{
				$params = array_merge([&$doms], $args);
				call_user_func_array($text, $params);
			}
			elseif(is_string($text))
			{
				$doms[] = $text;
			}
			elseif(is_array($text))
			{
				$doms = $text;
			}
			$text = implode("\r\n", $doms);

			return call_user_func_array("self::customElementFormText", [$text])->make();

		}
	}