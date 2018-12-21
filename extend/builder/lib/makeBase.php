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



	namespace builder\lib;

	use builder\makePage;
	use builder\traitBase\makeBaseTrait;


	/**
	 * Class makeBase
	 * @package builder\lib
	 */
	abstract class makeBase
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
		 * 实例化后类中可用的参数
		 * @var array
		 */
		public $params = [];

		/**
		 * 引用这个模板依赖的css文件路径
		 * @var array
		 */
		public $css = [];

		/**
		 * 引用这个模板依赖的js文件路径，加载head上
		 * @var array
		 */
		public $jsLib = [];

		/**
		 * 引用这个模板依赖的js文件路径，加在body闭合前（建议使用）
		 * @var array
		 */
		public $jsScript = [];

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
		 * 是否隐藏dom
		 * @var string
		 */
		public $isDisplay = true;

		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * @var string
		 */
		public $customJs = '';


		/**
		 * 自定义的css，引用此模板必须的css，多次引用只加载一次
		 * @var string
		 */
		public $customCss = '';


		/**
		 * 自定义的js，会附加在jsScript里面，每个元素可以自定义
		 * @var string
		 */
		public $userJs = '';


		/**
		 * 自定义的js，会附加在head里面，每个元素可以自定义
		 * @var string
		 */
		public $userCss = '';


		/**
		 * 模板替换的键值
		 * @var array
		 */
		public $contentsNodes = [
			'~~~CONTENTS~~~' => '',
		];

		/**
		 * 默认要替换的键
		 * @var string
		 */
		public $defaultTags = '~~~CONTENTS~~~';


		/*
		 *
		 *
		 *
		 * 方法
		 *
		 *
		 *
		 *
		 * */


		/**
		 * makeBase constructor.
		 *
		 * @param  string $contents
		 */
		public function __construct($contents)
		{
			$this->setContents(strtr($contents , ['_____DEFAULT_CONTENTS_____' => $this->defaultTags ]));
		}

		/**
		 * 设置类中使用的变量
		 *
		 * @param array $args
		 *
		 * @return $this
		 */
		public function setParams($args = [])
		{
			$this->params = array_merge($this->params, $args);

			return $this;
		}

		/**
		 * 注册静态资源路径到最终的解析类
		 */
		public function registerResource()
		{
			foreach ($this->jsLib as $v) makePage::getInstance()->pushStaticResourceHash('jsLib', $v);
			foreach ($this->css as $v) makePage::getInstance()->pushStaticResourceHash('css', $v);
			foreach ($this->jsScript as $v) makePage::getInstance()->pushStaticResourceHash('jsScript', $v);

			makePage::getInstance()->pushStaticResourceHash('customjspool', $this->customJs);
			makePage::getInstance()->pushStaticResourceHash('customcsspool', $this->customCss);

			makePage::getInstance()->pushStaticResourceHash('customjspool', $this->userJs);
			makePage::getInstance()->pushStaticResourceHash('customcsspool', $this->userCss);
		}

		/**
		 * 标签里内容的生成方法
		 *
		 * @param \Closure $closure 里面写生成内容的逻辑，生成的内容加给doms数字就可以
		 * @param array    $params  第一个值为生成内容的接受容器doms，第二个为this，可以调用addNode添加替换标签
		 *
		 * @return string
		 */
		public function make($closure = null, $params = [])
		{
			$doms = [];
			if(!is_null($closure))
			{
				if(is_callable($closure))
				{
					$params = array_merge([
						&$doms,
						$this,
					], $params);
					call_user_func_array($closure, $params);
				}
				elseif(is_string($closure))
				{
					$doms[] = $closure;
				}
				elseif(is_array($closure))
				{
					$doms = $closure;
				}
			}

			$this->replaceCustomJsCssTag();
			$this->registerResource();
			$this->appends($this->defaultTags, $doms);

			return $this->isDisplay ? $this->getContents() : '';
		}



		/**
		 * 设置是否显示元素
		 *
		 * @param  $isDisplay
		 */
		public function setIsDisplay($isDisplay)
		{
			$this->isDisplay  = !!$isDisplay;
		}


		/**
		 * 输出内容前的回调
		 *
		 * @param makeBase $obj
		 */
		public function beforeGetContents($obj)
		{
			$this->autoReplaceStr();
		}


		/**
		 * 添加每个元素自己独有的js
		 *
		 * @param string $script
		 */
		public function addJs($script = '')
		{
			$this->userJs = $script;
		}

		/**
		 * 添加每个元素自己独有的css
		 *
		 * @param string $css
		 */
		public function addCss($css = '')
		{
			$this->userCss = $css;
		}

		/**
		 * 获取当前模板里的替换内容
		 *
		 * @param string $tag
		 *
		 * @return array|mixed
		 */
		public function getNodes($tag = '')
		{
			$tag = self::makeNodeName($tag);

			return isset($this->contentsNodes[$tag]) ? $this->contentsNodes[$tag] : $this->contentsNodes;
		}
	}