<?php

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
		function setOptions($arr = [], $selected = null)
		{
			$tmp = "<option value='__K__' __SELECTED__>__V__</option>";
			$str = '';

			foreach ($arr as $k => $v)
			{
				$replacement['__SELECTED__'] = '';
				$selected == $v['value'] && ($replacement['__SELECTED__'] = 'selected');

				$replacement['__K__'] = $v['value'];
				$replacement['__V__'] = $v['field'];

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
				'attr'  => '' ,
				'field' => '' ,
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
			
		<select  data-field="<!-- ~~~field~~~ -->"  class="   td-select" <!-- ~~~attr~~~ -->>
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