<?php

	namespace builder\elements\table;

	use builder\lib\makeBase;

	class searchFormCheckbox extends makeBase
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
		 * 'value'   => '1' ,
		 * 'field'   => '年' ,
		 * ],
		 *
		 * @param array  $options
		 * @param        $name
		 * @param string $field_name
		 * @param string $selected
		 */
		function setOption($options , $name, $field_name = '', $selected = '')
		{


			$tmp = '<label class="btn  btn-white __CHECKED__"> <input ____CHECKED____ type="checkbox"   name="__NAME__" value="__VALUE__">__FIELD__</label>';
			$str = '';

			foreach ($options as $k => $v)
			{
				$replacement['__CHECKED__'] = '';
				$replacement['____CHECKED____'] = '';
				$replacement['__FIELD__'] = $v['field'];
				$replacement['__VALUE__'] = $v['value'];
				$replacement['__NAME__'] = $name;

				if(in_array($v['value'], $selected))
				{
					($replacement['____CHECKED____'] = 'checked');
					($replacement['__CHECKED__'] = 'active');
				}

				$str .= strtr($tmp , $replacement);
			}


			$this->replaceTag(static::makeNodeName('options') , $str);
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
				<div class="input-daterange input-group">
					<span class="input-group-btn">
						<span class="btn"><!-- ~~~field_name~~~ --></span>
					</span>
					<div data-toggle="buttons" class="btn-group">
						<!--<label class="btn  btn-white active"> <input type="radio" id="option2" name="options">周</label>-->
						<!-- ~~~options~~~ -->
					</div>
				</div>

CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}