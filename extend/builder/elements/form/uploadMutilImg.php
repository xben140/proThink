<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class uploadMutilImg extends makeBase
	{
		public $path = __DIR__;

		public $css = [
			'__PLUGINS__webuploader/css/webuploader.css' ,
			'__PLUGINS__webuploader/examples/multi-image-upload/style.css',
		];

		public $jsScript = [
			'__PLUGINS__webuploader/dist/webuploader.min.js' ,
			'__PLUGINS__webuploader/examples/multi-image-upload/upload.js',
		];


		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<'js'


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
		public $userJs = '
	
		';


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
		 * @param $events
		 */
		function setEventMap($events)
		{
			$tmp1 = "__FIELD__ : __VALUE__ ,";
			$str = '';
			foreach ($events as $k => $v)
			{
				$replacement['__FIELD__'] = $k;
				$replacement['__VALUE__'] = $v;
				$str .= strtr($tmp1 , $replacement);
			}

			$this->replaceTag(static::makeNodeName('eventsMap') , $str);
		}


		/**
		 * @param $option
		 */
		function setOptionMap($option)
		{
			$tmp1 = "__FIELD__ : __VALUE__ ,";
			$str = '';
			foreach ($option as $k => $v)
			{
				$replacement['__FIELD__'] = $k;
				$replacement['__VALUE__'] = "{$v}";
				$str .= strtr($tmp1 , $replacement);
			}

			$this->replaceTag(static::makeNodeName('optionsMap') , $str);
		}


		/**
		 * @param        $options
		 */
		function setOption($options)
		{
			$tmp1 = '<p style="font-weight: bold;color: #f00;">__FIELD__</p>';
			$tmp2 = "<p >__FIELD__</p>";

			$str = '';

			foreach ($options as $k => $v)
			{
				$str .= strtr($tmp1 , ['__FIELD__' => $v['title'] ,]);

				foreach ($v['items'] as $k1 => $v1)
				{
					$str .= strtr($tmp2 , ['__FIELD__' => $v1 ,]);
				}
				$str .= '<br>';
			}

			$this->replaceTag(static::makeNodeName('tips') , $str);
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
			$this->setNodeValue([]);
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

							<div class="page-container">

								<!-- ~~~tips~~~ -->

								<div id="uploader" class="wu-example">
									<div class="queueList">
										<div id="dndArea" class="placeholder">
											<div id="filePicker"></div>
											<p>或将照片拖到这里，单次最多可选300张</p>
										</div>
									</div>
									<div class="statusBar" style="display:none;">
										<div class="progress">
											<span class="text">0%</span>
											<span class="percentage"></span>
										</div>
										<div class="info"></div>
										<div class="btns">
											<div id="filePicker2"></div>
											<div class="uploadBtn">开始上传</div>
										</div>
									</div>
								</div>
							</div>
	
							<script>
								window.uploaderEventMap = {
									<!-- ~~~eventsMap~~~ -->
								};
								window.uploaderOptionMap = {
									<!-- ~~~optionsMap~~~ -->
								};
					
							</script>
							<!--/单图片dom结构部分-->


CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}