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



	namespace builder\elements\table;

	use builder\lib\makeBase;

	class select extends makeBase
	{
		public $path = __DIR__;

		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [];

		public $css = [];
		/**
		 * 添加到body之前的js路径
		 * @var array
		 */
		public $jsScript = [];

		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<js
		
js;
		/**
		 * 自定义的css，引用此模板必须的css，多次引用只加载一次
		 * 必须用style标签加起来
		 * @var string
		 */
		public $customCss = /** @lang text */
			<<<'Css'
			
Css;


		/**
		 * 自定义的js，会附加在jsScript里面，每个元素可以自定义
		 * 必须用script标签加起来
		 * $_this->addJs($js);
		 * @var string
		 */
		public $userJs = /** @lang text */
			<<<js
		
js;


		/*
		 * 设置字段头
		 *
		 * @param string $str
				 */
		function setOptions($arr = [] , $selected = null)
		{
			$tmp = "<option value='__K__' __SELECTED__ style='background: __C__'>__V__</option>";
			$str = '';

			foreach ($arr as $k => $v)
			{

				$replacement['__K__'] = $v['value'];
				$replacement['__V__'] = $v['field'];
				$replacement['__C__'] = '#fff';
				isset($v['color']) && $v['color'] && ($replacement['__C__'] = $v['color']);

				$replacement['__SELECTED__'] = '';
				if($selected == $v['value'])
				{
					($replacement['__SELECTED__'] = 'selected');
					$this->replaceTag(static::makeNodeName('ccccc') , $replacement['__C__']);
				}


				$str .= strtr($tmp , $replacement);
			}
			$this->replaceTag(static::makeNodeName('options') , $str);
		}


		/**
		 *--------------------------------------------------------------------------
		 */

		/**
		 * 构造方法里的的回调
		 */
		protected function _init()
		{
			/**
			 * ----------------------------------------设置表单里属性的默认值
			 */
			$this->setNodeValue([
				'attr'             => '' ,
				'field'            => '' ,
				'disabled'         => '' ,
				'success_callback' => 'updateColor' ,
				'change_callback'  => 'registUpdate' ,
			]);
			/**
			 *--------------------------------------------------------------------------
			 */

		}

		public function __construct()
		{
			/**
			 * ----------------------------------------自定义内容
			 */
			$contents = <<<'CONTENTS'
			
		<select style='max-width:130px;background: <!-- ~~~ccccc~~~ -->'  data-field="<!-- ~~~field~~~ -->"  class=" td-select"   data-change-callback="<!-- ~~~change_callback~~~ -->"   data-success-callback="<!-- ~~~success_callback~~~ -->" <!-- ~~~attr~~~ --> <!-- ~~~disabled~~~ --> >
			<!-- ~~~options~~~ -->
		</select>

CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}