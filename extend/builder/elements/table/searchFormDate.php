<?php

	namespace builder\elements\table;

	use builder\lib\makeBase;

	class searchFormDate extends makeBase
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
				'field'       => '' ,

				'value1'       => '' ,
				'name1'        => '' ,
				'placeholder1' => '' ,

				'value2'       => '' ,
				'name2'        => '' ,
				'placeholder2' => '' ,
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
						<span class="btn"><!-- ~~~field~~~ --></span>
					</span>
					<input type="text" placeholder="<!-- ~~~placeholder1~~~ -->" class=" form-control" name="<!-- ~~~name1~~~ -->" value="<!-- ~~~value1~~~ -->" >
						<span class="input-group-addon">到</span>
					<input type="text" placeholder="<!-- ~~~placeholder2~~~ -->" class=" form-control" name="<!-- ~~~name2~~~ -->" value="<!-- ~~~value2~~~ -->" >
				</div>

CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}