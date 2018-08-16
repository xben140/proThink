<?php

	namespace builder;

	use builder\traitBase\makeBaseTrait;


	/**
	 * 所有元素基类
	 * Class makePage
	 * @package builder\lib
	 */
	class makePage
	{

		use makeBaseTrait;


		/*
 *
 *
 *
 * 公共属性
 *
 *
 *
 *
 * */

		/**
		 * 使用外界模板路径
		 * @var string
		 */
		public $path = '';

		/**
		 * 模板内容
		 * @var string
		 */
		public $contents = '';


		/**
		 * 标签替换为构造好的html dom结构
		 * @var array
		 */
		public $contentsNodes = [
			'~~~HEAD~~~'       => '' ,
			'~~~CSS~~~'        => '' ,
			'~~~JS_INVOKE~~~'  => '' ,
			'~~~JS_LIB~~~'     => '' ,
			'~~~BODY~~~'       => '' ,
			'~~~SCRIPT~~~'     => '' ,
			'~~~BODY_ATTR~~~'  => 'class="gray-bg"' ,
		];

		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/jquery.min.js' ,
			'__HPLUS__js/bootstrap.min.js' ,
			'__HPLUS__js/content.min.js' ,
			'__HPLUS__js/plugins/layer/layer.js' ,
		];

		/**
		 * 添加link标签引用css
		 * @var array
		 */
		public $css = [
			'__HPLUS__css/bootstrap.min14ed.css' ,
			'__HPLUS__css/font-awesome.min93e3.css' ,
			"__HPLUS__css/animate.min.css" ,
			"__HPLUS__css/style.min862f.css" ,
			'__STATIC__/css/custom.css' ,
		];

		/**
		 * 添加到body之前的js路径
		 * @var array
		 */
		public $jsScript = [
			'__STATIC__/js/custom.js' ,
		];

		/*
		 *
		 *
		 *
		 * 属性
		 *
		 *
		 *
		 *
		 * */


		/**
		 * 每个标签自定义的css和js脚本
		 * @var string
		 */
		public $customJsPool = [];
		public $customCssPool = [];


		/**
		 * 添加过的资源的hash池
		 * @var array
		 */
		public static $staticResourceHashPool = [];

		/**
		 * @var null
		 */
		public static $instance = null;


		/*
		 *
		 *
		 *
		 * 静态方法
		 *
		 *
		 *
		 *
		 * */


		/**
		 * 获取示例唯一方法
		 *
		 * @param array $options
		 *
		 * @return makePage|null
		 */
		public static function getInstance($options = [])
		{
			is_null(self::$instance) && self::$instance = new self($options);

			return self::$instance;
		}
		/*
		 *
		 *
		 *
		 * 实例方法
		 *
		 *
		 *
		 *
		 * */
		/**
		 * 每个元素需要的静态资源hash值加进来
		 *
		 * @param $type
		 * @param $uri
		 */
		public function pushStaticResourceHash($type , $uri)
		{
			$hash = md5($uri);
			if(!in_array($hash , self::$staticResourceHashPool))
			{
				$this->mergeStatic($type , $uri);
				self::$staticResourceHashPool[] = $hash;
			}
		}

		/**
		 *自己的静态资源加载到hash表
		 */
		public function registerSelfStaticHash()
		{
			foreach ($this->jsLib as $v) self::$staticResourceHashPool[] = md5($v);
			foreach ($this->jsScript as $v) self::$staticResourceHashPool[] = md5($v);
			foreach ($this->css as $v) self::$staticResourceHashPool[] = md5($v);

		}

		/**
		 * 静态资源加载到列表
		 *
		 * @param $type
		 * @param $uri
		 */
		private function mergeStatic($type , $uri)
		{
			switch (strtolower($type))
			{
				case 'css':
					$this->css[] = $uri;
					break;
				case 'jslib':
					$this->jsLib[] = $uri;
					break;
				case 'jsscript':
					$this->jsScript[] = $uri;
					break;
				case 'customjspool':
					$this->customJsPool[] = $uri;
					break;
				case 'customcsspool':
					$this->customCssPool[] = $uri;
					break;
			}
		}

		/**
		 *添加静态资源到dom
		 */
		public function setStatic()
		{
			$css[] = tagConstructor::css($this->css);
			$jsLib[] = tagConstructor::js($this->jsLib);
			$jsScript[] = tagConstructor::js($this->jsScript);


			$this->setCss($css)->setJsLib($jsLib)->setJsInvoke($jsScript)->setScript($this->customJsPool)->setCss($this->customCssPool);;
		}

		/**
		 * 设置head
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setHead($contents)
		{
			$this->multiReplaceTag('~~~HEAD~~~' , $contents);

			return $this;
		}

		/**
		 * 设置link标签
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setCss($contents)
		{
			$this->multiReplaceTag('~~~CSS~~~' , $contents);

			return $this;
		}

		/**
		 * 设置body标签闭合之前的js
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setJsInvoke($contents)
		{
			$this->multiReplaceTag('~~~JS_INVOKE~~~' , $contents);

			return $this;
		}

		/**
		 * 设置head里的js
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setJsLib($contents)
		{
			$this->multiReplaceTag('~~~JS_LIB~~~' , $contents);

			return $this;
		}

		/**
		 * 设置body部分
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setBody($contents)
		{
			$this->multiReplaceTag('~~~BODY~~~' , $contents);

			return $this;
		}

		/**
		 * 设置body之前的js始终加在setJsInvoke上面
		 *
		 * @param $contents
		 *
		 * @return $this
		 */
		public function setScript($contents)
		{
			$this->multiReplaceTag('~~~SCRIPT~~~' , $contents);

			return $this;
		}

		/**
		 * 输出内容之前的回调，添加静态资源到dom
		 * 替换所有变量
		 *
		 * @param $obj
		 */
		public function beforeGetContents($obj)
		{
			$this->setStatic();
			$this->autoReplaceStr();
		}


		/**
		 * makePage constructor.
		 *
		 * @param array $options
		 */
		public function __construct($options = [])
		{
			$contents = <<<CONTENTS
		

<!doctype html>
<html lang="en">
	<head>

		<!--					head					-->

		<!--!  ~~~HEAD~~~ -->
		<!--!	~~~CSS~~~ -->
		<!--!	~~~JS_LIB~~~ -->

		<!--					/head					-->

	</head>
	<body  <!--	~~~BODY_ATTR~~~ -->>

		<!--					body					-->
		<!--!	~~~BODY~~~-->
		<!--					/body					-->


		<!--					script					-->
		<!--!	~~~SCRIPT~~~-->
		<!--!	~~~JS_INVOKE~~~-->
		<!--					/script					-->
	</body>
</html>
CONTENTS;
			$this->setContents($contents);
			$this->registerSelfStaticHash();
		}


	}