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
			$tmp = '<button type="button" class="btn __CLASS__" __DATA__  __ATTR__ __PARAM__ __OPTIONS__>__FIELD__</button>' . "\r\n";
			$dataTemp = 'data-_K_="_V_"';
			$str = '';

			foreach ($menu as $k1 => $v1)
			{
				$str .= '<div class="col-sm-12 m-b-xs">';
				foreach ($v1 as $k => $v)
				{
					if(isset($v['is_display']) && (!$v['is_display'])) continue;

					$t = '';
					if(isset($v['data']) && is_array($v['data']))
					{
						foreach ($v['data'] as $k2 => $v2)
						{
							$t .= ' ' . strtr($dataTemp , [
									'_K_' => $k2 ,
									'_V_' => $v2 ,
								]) . ' ';
						}
					}

					$replacement['__DATA__'] = $t;
					$replacement['__FIELD__'] = $v['field'];
					$replacement['__CLASS__'] = $v['class'];

					$replacement['__ATTR__'] = '';
					$replacement['__SRC__'] = '';
					$replacement['__TITLE__'] = '';
					$replacement['__PARAM__'] = '';
					$replacement['__OPTIONS__'] = '';

					isset($v['attr']) && $v['attr'] && ($replacement['__ATTR__'] = $v['attr']);
					isset($v['src']) && $v['src'] && ($replacement['__SRC__'] = $v['src']);
					isset($v['title']) && $v['title'] && ($replacement['__TITLE__'] = $v['title']);
					isset($v['param']) && $v['param'] && ($replacement['__PARAM__'] = json_encode($v['param']));
					isset($v['options']) && $v['options'] && ($replacement['__OPTIONS__'] = strtr('data-options=__OPTIONS__' , ['__OPTIONS__' => json_encode($v['options']) ,]));

					$str .= strtr($tmp , $replacement);
				}
				$str .= '</div>' . "\r\n";
			}

			$this->replaceTag(static::makeNodeName('buttons') , $str);
		}

		function setBaseButton($menu = [
			0 ,
			1 ,
			2 ,
		])
		{
			$str = [];
			if(is_array($menu))
			{
				$buttons = [
					'<button type="button" class="btn btn-primary" onclick="refresh_page()">刷新页面</button>' ,
					'<button type="button" class="btn btn-primary" onclick="rowReload()">重置搜索条件</button>' ,
					'<a target="_blank" href="#" class="btn btn-primary ">新窗口中打开</a>' ,
				];
				$str = array_map(function($v) use ($str , $buttons) {
					return $buttons[$v];
				} , $menu);
			}
			$this->replaceTag(static::makeNodeName('base-buttons') , implode("\r\n", $str));
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
				<div class="col-sm-<!-- ~~~width~~~ --> m-b-xs">
					<!-- ~~~base-buttons~~~ -->
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