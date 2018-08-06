<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class betweenDate extends makeBase
	{
		public $path = __DIR__;
		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/plugins/layer/laydate/laydate.js'
		];

		public $css = [];

		public $jsScript = [
		];


		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<'js'
			
<!--  /betweenDate-->
		<script>
		
			laydate({
				elem   : "#start",
				format : "YYYY/MM/DD hh:mm:ss",
				min    : laydate.now(),
				max    : "2099-06-16 23:59:59",
				istime : true,
				istoday: false,
				choose : function (datas) {
					end.min = datas;
					end.start = datas
				}
			});
			laydate({
				elem   : "#end",
				format : "YYYY/MM/DD hh:mm:ss",
				min    : laydate.now(),
				max    : "2099-06-16 23:59:59",
				istime : true,
				istoday: false,
				choose : function (datas) {
					end.min = datas;
					end.start = datas
				}
			});
		</script>
<!--  /betweenDate-->



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
			 * ----------------------------------------设置表单里属性的默认值
			 */
			$this->setNodeValue([
				'field_name' => '' ,
				//'min'        => 'laydate.now()' ,
				'min'        => '0' ,
				'is_time'    => 'true' ,
				'format'     => 'YYYY-MM-DD hh:mm:ss' ,

				'start_name' => '' ,
				'end_name'   => '' ,

				'start_value' => '' ,
				'end_value'   => '' ,

				//'format'      => 'YYYY-MM-DD ' ,
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
					<input placeholder="开始日期" class="form-control layer-date"   name="<!-- ~~~start_name~~~ -->" value="<!-- ~~~start_value~~~ -->" onclick="laydate({istime: <!-- ~~~is_time~~~ -->, format: '<!-- ~~~format~~~ -->', min    : <!-- ~~~min~~~ -->,})">
					<input placeholder="结束日期" class="form-control layer-date"   name="<!-- ~~~end_name~~~ -->" value="<!-- ~~~end_value~~~ -->" onclick="laydate({istime: <!-- ~~~is_time~~~ -->, format: '<!-- ~~~format~~~ -->', min    : <!-- ~~~min~~~ -->,})">
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