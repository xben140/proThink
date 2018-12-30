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



	namespace builder\elements\form;

	use builder\lib\makeBase;

	class summernote extends makeBase
	{
		public $path = __DIR__;

		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/plugins/summernote/summernote.min.js' ,
			'__HPLUS__js/plugins/summernote/summernote-zh-CN.js' ,
		];

		public $css = [
			'__HPLUS__css/plugins/summernote/summernote.css' ,
			'__HPLUS__css/plugins/summernote/summernote-bs3.css' ,
		];

		public $jsScript = [];


		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<'js'
			
<!--  summernote -->

<script>
	$(document).ready(function () {
		$(".summernote").summernote({
			lang              : "zh-CN",
			disableDragAndDrop: true,
			height            : 500,                 // set editor height
			minHeight         : null,             // set minimum height of editor
			maxHeight         : null,             // set maximum height of editor
			focus             : true,                 // set focus to editable area after initializing summernote
			onChange: function (contents, $editable) {
				($(".summernote").html($editable));
			}
		})
		summernote_preview = function (obj) {
			layer.open({
				area      : ['80%', '80%'],
				type      : 1,
				resize    : 1,
				moveOut   : 1,
				title     : '预览',
				shade     : 0.1,
				skin      : 'search-dom-pop', //样式类名
				closeBtn  : 0, //不显示关闭按钮
				anim      : 0,
				// anim      : randomNum(0, 6),
				isOutAnim : 0,
				shadeClose: true, //开启遮罩关闭
				content   : $(obj).parent().find('.summernote').code(), //dom
				success   : function (layero, index) {
				}
			});
		};
	});
</script>
<!--  /summernote-->



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

				'field_name' => '' ,
				'name'       => '' ,
				'value'      => '' ,
				'left'       => '2' ,
				'right'      => '8' ,
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
				<label class="col-sm-<!-- ~~~left~~~ --> control-label"><!-- ~~~field_name~~~ --></label>
				<div class="col-sm-<!-- ~~~right~~~ -->">
					<button class="btn btn-primary  btn-xs" onclick="summernote_preview(this)" type="button">预览</button>
					<textarea class="summernote wrapper "  type="text/plain" style="width:100%;background: #fff" name="<!-- ~~~name~~~ -->"><!-- ~~~value~~~ --></textarea>
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