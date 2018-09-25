<?php

	namespace builder\elements\form;

	use builder\lib\makeBase;

	class form extends makeBase
	{
		public $path = __DIR__;
		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__STATIC__/js/form.js' ,
			'__HPLUS__js/plugins/iCheck/icheck.min.js' ,
			'__HPLUS__js/plugins/validate/jquery.validate.min.js' ,
		];

		public $css = [
			'__HPLUS__css/plugins/iCheck/custom.css' ,
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
		function setAjaxSubmitEventMap($option)
		{
			$t = <<<AAAAA
			
			
					window.ajaxSubmitEventMap = {
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

			$this->replaceTag(static::makeNodeName('ajaxSubmitEventMap') ,  strtr($t , [
				'___ccccccc___' => $str,
			]));
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
				'id'     => 'form1' ,
				'action' => '' ,
				'attr'   => '' ,
				'method' => 'get' ,
				'class'  => 'form-horizontal' ,
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
						
			<form action="<!-- ~~~action~~~ -->" class="<!-- ~~~class~~~ -->" id="<!-- ~~~id~~~ -->" method="<!-- ~~~method~~~ -->" <!-- ~~~attr~~~ --> >
					<!-- _____DEFAULT_CONTENTS_____ -->
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-3">
							<button class="btn btn-primary" type="submit">提交</button>
							<!--<button class="btn btn-info reset" type="reset">重写填写</button>-->
						</div>
					</div>
			</form>
			
			

			<script>  
				$("#<!-- ~~~id~~~ -->").submit(function () {
						let _this = $(this);
					_this.find('button:submit').attr("disabled", true);
					var loadIndex = layer.load()
					
/*
					window.ajaxSubmitEventMap = {
						'success': function (responseText, statusText) {
							_this.find('button:submit').attr("disabled",false);
							console.dir(123456)
							console.dir(456789)
						},
					};
*/
					//<!-- ~~~ajaxSubmitEventMap~~~ -->
					

					let options  = {

						//把服务器返回的内容放入id为output的元素中
						target: '#output',

						//提交前的回调函数
						beforeSubmit: function (formData, jqForm, options) {
							// console.dir(formData)
							// console.dir(jqForm)
							// console.dir(options)

							//formData: 数组对象，提交表单时，Form插件会以Ajax方式自动提交这些数据，格式如：[{name:user,value:val },{name:pwd,value:pwd}]
							//jqForm:   jQuery对象，封装了表单的元素
							//options:  options对象

							// var queryString = $.param(formData);   //name=1&address=2
							// var formElement = jqForm[0];              //将jqForm转换为DOM对象
							// var address = formElement.address.value;  //访问jqForm的DOM元素

							//只要不返回false，表单都会提交,在这里可以对表单元素进行验证
							return true;
						},

						//提交后的回调函数
						success:  function (responseText, statusText) {
							_this.find('button:submit').attr("disabled", false);
							layer.close(loadIndex)
							layer.msg(responseText.msg);	
						},

						// 默认是form的action， 如果申明，则会覆盖
						//url: url,

						// 默认是form的method（get or post），如果申明，则会覆盖
						//type: type,

						// html(默认), xml, script, json...接受服务端返回的类型
						dataType: 'json',

						// 成功提交后，清除所有表单元素的值
						//clearForm: true,

						// 成功提交后，重置所有表单元素的值
						//resetForm: true,

						//限制请求的时间，当请求大于3秒后，跳出请求
						timeout: 3000
					};

					//自定义事件覆盖默认事件
					if(window.ajaxSubmitEventMap !== 'undefined' && typeof window.ajaxSubmitEventMap === 'object')
					{
						for (let key in window.ajaxSubmitEventMap) options[key] = window.ajaxSubmitEventMap[key];
					}


					$(this).ajaxSubmit(options);
				
					window.ajaxSubmitEventMap = null;
					return false;
				})

			</script>  

CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}