<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class switchery extends makeBase
	{
		public $path = __DIR__;
		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/plugins/switchery/switchery.js' ,

		];

		public $css = [
			'__HPLUS__css/plugins/switchery/switchery.css' ,
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
<!--  switchery-->
		<script>
			$(document).ready(function () {
				// let sitcher = document.querySelectorAll(".js-switch");
				let sitcher = document.getElementsByClassName("js-switch");
				let switchery = [];
				for (let i = 0; i < sitcher.length; i++)
				{
					switchery[i] = new Switchery(sitcher[i], {
						color             : '#28fa1a',
						// secondaryColor    : '#fC73d0',
						jackColor         : '#fffff9',
						jackSecondaryColor: '#e5e5df',
						// className         : 'switchery',
						disabled          : false,
						disabledOpacity   : 0.1,
						speed             : '0.3s',
						size              : 'small',
					});
				}
			});
		</script>
		<!--  /switchery--> 
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
				//'isChecked' => 'checked' ,
				'isChecked' => '' ,


				'field_name' => '' ,
				'name'       => '' ,
				'field'      => '' ,
				'value'      => '' ,
				'tip'        => '' ,
				'attr'       => '' ,
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
					<span><!-- ~~~field~~~ --></span>
					<input type="checkbox" class="js-switch" value="<!-- ~~~value~~~ -->" name="<!-- ~~~name~~~ -->" <!-- ~~~attr~~~ --> <!-- ~~~isChecked~~~ --> >

					<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> <!-- ~~~tip~~~ --> <span class="error-tip"></span></span>
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