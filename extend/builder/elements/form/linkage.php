<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class linkage extends makeBase
	{
		public $path = __DIR__;


		public $css = [
			'__PLUGINS__linkage/style.css' ,
		];

		public $jsLib = [
			'__PLUGINS__linkage/linkage.js' ,
		];


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

		/**
		 * ----------------------------------------自定义方法区
		 */

		/**
		 * @param $option
		 */
		function setConfig($option)
		{
			$this->replaceTag(static::makeNodeName('config') ,  json_encode($option, 1));
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
			 * ----------------------------------------替换表单里需要替换的变量
			 */

			/**
			 *--------------------------------------------------------------------------
			 */

			/**
			 * ----------------------------------------设置表单里属性的默认值
			 */
			$this->setNodeValue([
				'placeholder' => '区域选择' ,
				'field_name'  => '区域选择' ,
				'tip'         => '' ,
				'id'          => '__linkage__' ,
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

			<div class="form-group">
				<label class="col-sm-3 control-label"><!-- ~~~field_name~~~ --></label>
				<div class="col-sm-8">
					<input autocomplete="off" placeholder="<!-- ~~~placeholder~~~ -->" name="text" class="form-control  " id="<!-- ~~~id~~~ -->" type="text">
					<span class="help-block m-b-none"><i class="fa fa-info-circle"></i><!-- ~~~tip~~~ --><span class="error-tip"></span></span>
				</div>
			</div>
			
		<script>
			linkage(document.getElementById('<!-- ~~~id~~~ -->'), <!-- ~~~config~~~ -->)
		</script>




CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */parent::__construct($contents);
			$this->_init();
		}
	}