<?php

	namespace builder\elements\frame;

	use builder\lib\makeBase;

	class rowButton extends makeBase
	{
		public $path = __DIR__;


		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [];


		public $css = [];

		public $jsScript = [];

		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<'js'
			<script>  
			
			</script>  
js;

		/**
		 * 自定义的css，引用此模板必须的css，多次引用只加载一次
		 * 必须用style标签加起来
		 * @var string
		 */
		public $customCss = /** @lang text */
			<<<'Css'
			<style>  
			
			</style>  
Css;


		/**
		 * 自定义的js，会附加在jsScript里面，每个元素可以自定义
		 * 必须用script标签加起来
		 * $_this->addJs($js);
		 * @var string
		 */
		public $userJs = '';


		/**
		 * 自定义的js，会附加在head里面，每个元素可以自定义
		 * 必须用style标签加起来
		 * $_this->addCss($css);
		 * @var string
		 */
		public $userCss = '';

		//* ----------------------------------------自定义方法区

		/**
		 * 设置功能按钮
		 *
		 * @param array $menu
		 */
		function setButton($menu = [])
		{
			$tmp = '<button type="button" class="btn __CLASS__" data-src="__SRC__" data-title="__TITLE__" __ATTR__>__FIELD__</button>' . "\r\n";
			$str = '';

			foreach ($menu as $k1 => $v1)
			{
				$str .= '<div class="col-sm-12 m-b-xs">';
				foreach ($v1 as $k => $v)
				{
					if(isset($v['is_display']) && (!$v['is_display'])) continue;

					$replacement['__ATTR__'] = '';
					$replacement['__FIELD__'] = $v['field'];
					$replacement['__CLASS__'] = $v['class'];


					$replacement['__SRC__'] = '';
					$replacement['__TITLE__'] = '';


					isset($v['attr']) && $v['attr'] && ($replacement['__ATTR__'] = $v['attr']);
					isset($v['src']) && $v['src'] && ($replacement['__SRC__'] = $v['src']);
					isset($v['title']) && $v['title'] && ($replacement['__TITLE__'] = $v['title']);
					$str .= strtr($tmp , $replacement);
				}
				$str .= '</div>' . "\r\n";
			}


			$this->replaceTag(static::makeNodeName('buttons') , $str);
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
				'width' => '12' ,
			]);
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::_init();

		}

		public function __construct()
		{
			/**
			 * ----------------------------------------自定义内容
			 */
			$contents = <<<'CONTENTS'
			<div class="row">
				<div class="col-sm-4 m-b-xs">
					<button type="button" class="btn btn-success" onclick="location.reload()"> 刷新页面</button>
					<!--<a target="_self" href="" class="btn btn-success ">重置搜索条件</a>-->
					<a target="_blank" href="#" class="btn btn-success "> 在新窗口中打开</a>
				</div>
				<!-- ~~~buttons~~~ -->
			</div>
CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}