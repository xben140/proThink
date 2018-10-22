<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class password extends makeBase
	{
		public $path = __DIR__;

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

		/**
		 * ----------------------------------------自定义方法区
		 */


		function isNeedConfirm($is)
		{
			if($is)
			{
				$this->replaceTag(static::makeNodeName('isNeedConfirm') , <<<tag
				<div class="form-group">
					<label class="col-sm-<!-- ~~~left~~~ --> control-label">确认密码</label>
					<div class="col-sm-<!-- ~~~right~~~ -->">
						<input name="<!-- ~~~confirm_name~~~ -->" class="form-control input-sm " type="password"  <!-- ~~~confirm_attr~~~ -->>
						<span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请再次输入密码<span class="error-tip"></span></span>
					</div>
				</div>
tag
				);
			}
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
				'left'         => '2' ,
				'right'        => '8' ,
				'tip'          => '密码允许字符为字母，数字，下划线，小数点，长度6-16位' ,
				'name'         => '' ,
				'attr'         => '' ,
				'confirm_name' => '' ,
				'confirm_attr' => '' ,
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
					<label class="col-sm-<!-- ~~~left~~~ --> control-label">密码</label>
					<div class="col-sm-<!-- ~~~right~~~ -->">
						<input name="<!-- ~~~name~~~ -->" class="form-control input-sm " type="password"  <!-- ~~~attr~~~ -->>
						<span class="help-block m-b-none"><i class="fa fa-info-circle"></i><!-- ~~~tip~~~ --><span class="error-tip"></span></span>
					</div>
				</div>
						
				<!-- ~~~isNeedConfirm~~~ -->
<!--

				<div class="form-group">
					<label class="col-sm-<!-- ~~~left~~~ --> control-label">确认密码：</label>
					<div class="col-sm-<!-- ~~~right~~~ -->">
						<input name="&lt;!&ndash; ~~~confirm_name~~~ &ndash;&gt;" class="form-control input-sm " type="password"  &lt;!&ndash; ~~~confirm_attr~~~ &ndash;&gt;>
						<span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请再次输入密码<span class="error-tip"></span></span>
					</div>
				</div>
-->


CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}