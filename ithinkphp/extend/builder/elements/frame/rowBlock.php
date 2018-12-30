<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace builder\elements\frame;

	use builder\lib\makeBase;

	class rowBlock extends makeBase
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
				'width'      => '12' ,
				'main_title' => '大标题' ,
				'sub_title'  => '小标题' ,
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
			
			
<div class="col-sm-<!-- ~~~width~~~ --> ui-sortable">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5><!-- ~~~main_title~~~ -->
				<small><!-- ~~~sub_title~~~ --></small>
			</h5>
			
			<div class="ibox-tools">
				<!--<label class="label label-primary">可拖动</label>-->
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
						<!-- ~~~option~~~ -->
					<!--	
					<li>
						<a href="graph_morris.html#">选项1</a>
					</li>
					<li>
						<a href="graph_morris.html#">选项2</a>
					</li>
					-->
				</ul>
			</div>
			
			
		</div>
		<div class="ibox-content" style="position: relative">
			
			<!-- _____DEFAULT_CONTENTS_____ -->
			
		</div>
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