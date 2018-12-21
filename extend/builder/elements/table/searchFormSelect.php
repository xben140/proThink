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

	class searchFormSelect extends makeBase
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
		 * 设置字段头
		 *    [
		 * 'checked' => '1' ,
		 * 'value'   => '1' ,
		 * 'field'   => '年' ,
		 * ],
		 *
		 * @param array  $options
		 * @param        $name
		 * @param        $field_name
		 * @param array  $selected
		 */
		function setOption($options , $name, $field_name, $selected = [])
		{

			$tmp = "<option value='__K__' __SELECTED__>__V__</option>";
			$str = '';

			foreach ($options as $k => $v)
			{
				$replacement['__SELECTED__'] = '';
				$selected == $v['value'] && ($replacement['__SELECTED__'] = 'selected');

				$replacement['__K__'] = $v['value'];
				$replacement['__V__'] = $v['field'];

				$str .= strtr($tmp , $replacement);
			}
			$this->replaceTag(static::makeNodeName('options') , $str);
			$this->replaceTag(static::makeNodeName('name') , $name);
			$this->replaceTag(static::makeNodeName('field_name') , $field_name);
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
				//'col' => '3' ,
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
			<div class="input-group">
				<span class="input-group-btn">
						<span class="btn"><!-- ~~~field_name~~~ --></span>
				</span>
				<select class=" form-control  inline change_serach" name="<!-- ~~~name~~~ -->">
					<!-- ~~~options~~~ -->
				</select>
			</div>
CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}