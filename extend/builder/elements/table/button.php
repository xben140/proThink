<?php

	namespace builder\elements\table;

	use builder\lib\makeBase;

	class button extends makeBase
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

		/**
		 * 设置功能按钮
		 *
		 * @param array $attr
		 */
		function setAttr($attr = [])
		{
			$tmp = '<button type="button" class="btn btn-xs __CLASS__" __DATA__  __ATTR__ __PARAM__ __OPTIONS__>__FIELD__</button>';
			$dataTemp = 'data-_K_="_V_"';
			$str = '';

			$t = '';
			if(isset($attr['data']) && is_array($attr['data']))
			{
				foreach ($attr['data'] as $k2 => $v2)
				{
					$t .= ' ' . strtr($dataTemp , [
							'_K_' => $k2 ,
							'_V_' => $v2 ,
						]) . ' ';
				}
			}

			$replacement['__DATA__'] = $t;
			$replacement['__FIELD__'] = $attr['value'];
			$replacement['__CLASS__'] = $attr['class'];
			$replacement['__ATTR__'] = '';
			$replacement['__PARAM__'] = '';
			$replacement['__OPTIONS__'] = '';

			isset($attr['attr']) && $attr['attr'] && ($replacement['__ATTR__'] = $attr['attr']);
			isset($attr['params']) && $attr['params'] && ($replacement['__PARAM__'] = strtr('data-params=__DATA___', ['__DATA___' => json_encode($attr['params']),]));
			isset($attr['options']) && $attr['options'] && ($replacement['__OPTIONS__'] = strtr('data-options=__OPTIONS__', ['__OPTIONS__' => json_encode($attr['options']),]));

			$str .= strtr($tmp , $replacement);

			if(isset($attr['is_display']) && (!$attr['is_display'])) $str = '';

			$this->replaceTag(static::makeNodeName('button') , $str);
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
				'attr'  => ' btn-info  btn-detail' ,
				'value' => ' 编辑' ,
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
			<!-- ~~~button~~~ -->
CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}