<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class uploadSingleImg extends makeBase
	{
		public $path = __DIR__;

		public $css = [
			'__PLUGINS__webuploader/css/webuploader.css' ,
			'__PLUGINS__webuploader/examples/single-image-upload/style.css' ,
		];

		public $jsScript = [
			'__PLUGINS__webuploader/dist/webuploader.min.js' ,
			'__PLUGINS__webuploader/examples/single-image-upload/upload.js' ,
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

			$t = <<<AAAAA
			
					window.uploaderEventMap = {
						___ccccccc___
					};
AAAAA;


			$tmp1 = "__FIELD__ : __VALUE__ ,";
			$str = '';
			foreach ($events as $k => $v)
			{
				$replacement['__FIELD__'] = $k;
				$replacement['__VALUE__'] = $v;
				$str .= strtr($tmp1 , $replacement);
			}

			$this->replaceTag(static::makeNodeName('eventsMap') , strtr($t , [
				'___ccccccc___' => $str ,
			]));
		}


		/**
		 * @param $option
		 */
		function setOptionMap($option)
		{
			$t = <<<AAAAA
			
					window.uploaderOptionMap = {
						___ccccccc___
					};
AAAAA;


			$tmp1 = "__FIELD__ : __VALUE__ ,";
			$str = '';
			foreach ($option as $k => $v)
			{
				$replacement['__FIELD__'] = $k;
				$replacement['__VALUE__'] = "{$v}";
				$str .= strtr($tmp1 , $replacement);
			}

			$this->replaceTag(static::makeNodeName('optionsMap') , strtr($t , [
				'___ccccccc___' => $str ,
			]));

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
			$this->setNodeValue([
				'left'        => '0' ,
				'right'       => '12' ,
				'default_img' => generateProfilePicPath(config('default_img') , 0) ,
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
						<!-- 单图片dom结构部分-->
							<div class="page-container">

								<!-- ~~~tips~~~ -->

								<!--单图片dom结构部分-->
								<div class="uploader-demo">

									<!--用来预览图片-->

									<div class="uploader-preview">
										<img src="<!-- ~~~default_img~~~ -->" alt="">
									</div>

									<div class="uploader-btn-box">
										<div id="filePicker">选择图片</div>
									</div>

									<div class="status-box">
										<span class="status-box-text">准备上传</span>
										<span class="status-box-progess">0%</span>
									</div>

									<!--进度条-->
									<div class="progress-box">
										<div class="progress progress-striped active">
											<div style="width: 0" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-danger">
												<span class="sr-only"></span>
											</div>
										</div>
									</div>
								</div>
								<!--/单图片dom结构部分-->

							</div>
						</div>
						<div class="row"></div>
				</div>
					
				<script>
				//<!-- ~~~eventsMap~~~ -->
				
				
				//<!-- ~~~optionsMap~~~ -->
			
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