<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class text extends makeBase
	{
		public $path = __DIR__;

		public $css = [
		];

		public $jsScript = [
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


		/*
				 function isEnableClosed($is)
				{
					if($is)
					{
						$this->replaceTag(static::makeNodeName('isEnableClosed'), <<<tag
										<a class="close-link">
											<i class="fa fa-times"></i>
										</a>
		tag
						);
					}
				}

		*/


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
			//static::replaceTagBase($tag , $contents, $this->contents);
			/**
			 *--------------------------------------------------------------------------
			 */

			/**
			 * ----------------------------------------设置表单里属性的默认值
			 */
			$this->setNodeValue([
				'placeholder' => '' ,
				'field_name'  => '' ,
				'tip'         => '' ,
				'value'       => '' ,
				'attr'        => '' ,
				'name'        => '' ,
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
					<input placeholder="<!-- ~~~placeholder~~~ -->"   name="<!-- ~~~name~~~ -->" class="form-control  " type="text" value="<!-- ~~~value~~~ -->"  <!-- ~~~attr~~~ -->>
					<span class="help-block m-b-none"><i class="fa fa-info-circle"></i><!-- ~~~tip~~~ --><span class="error-tip"></span></span>
				</div>
			</div>

CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */parent::__construct($contents);
			$this->_init();
		}
	}