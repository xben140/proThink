<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace builder\elements\table;

	use builder\lib\makeBase;

	class staticTable extends makeBase
	{
		public $path = __DIR__;

		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/plugins/iCheck/icheck.min.js' ,
			'__HPLUS__js/plugins/datapicker/bootstrap-datepicker.js' ,
			'__HPLUS__js/plugins/switchery/switchery.js' ,
			'__STATIC__/js/form.js' ,
		];

		public $css = [
			'__HPLUS__css/plugins/iCheck/custom.css' ,
			'__HPLUS__css/plugins/switchery/switchery.css' ,
			'__HPLUS__css/plugins/datapicker/datepicker3.css' ,
		];
		/**
		 * 添加到body之前的js路径
		 * @var array
		 */
		public $jsScript = [
			'__STATIC__/js/custom_table.js' ,
		];

		/**
		 * 自定义的js，引用此模板必须的js，多次引用只加载一次
		 * 必须用script标签加起来
		 * @var string
		 */
		public $customJs = /** @lang text */
			<<<'js'
		<script>	
		//layer.alert(13213)
		</script>
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
		public $userJs = /** @lang text */
			<<<js
		
js;


		/**
		 * 自定义的css，会附加在head里面，每个元素可以自定义
		 * 必须用style标签加起来
		 * $_this->addCss($css);
		 * @var string
		 */
		public $userCss = '';

		/**
		 * ----------------------------------------自定义方法区
		 */

		/**
		 * 设置字段头
		 * @param array $head
		 */
		function setHead($head = [])
		{
			[
				[
					'field' => '' ,
					'attr'  => 'style="width:5%;"' ,
				] ,
				[
					'field' => '进度1' ,
					'attr'  => '' ,
				] ,
			];

			$tmp = "<th __ATTR__>__FIELD__</th>";
			$str = '';

			foreach ($head as $k => $v)
			{
				$replacement['__ATTR__'] = '';
				$replacement['__FIELD__'] = $v['field'];
				isset($v['attr']) && $v['attr'] && ($replacement['__ATTR__'] = $v['attr']);

				$str .= strtr($tmp , $replacement);
			}

			$this->replaceTag(static::makeNodeName('head') , $str);
		}

		/**
		 * 设置全局url
		 *
		 * @param $apis
		 */
		function setApi($apis)
		{
			[
				'deleteUrl'   => url('delete') ,
				'setFieldUrl' => url('setField') ,
				'detailUrl'   => url('detail') ,
				'editUrl'     => url('edit') ,
			];

			$tmp = "window.__ATTR__ = '__TRUE_URL__';\r\n";
			$str = "<script>\r\n";

			foreach ($apis as $k => $v)
			{
				$replacement['__ATTR__'] = $k;
				$replacement['__TRUE_URL__'] = $v;

				$str .= strtr($tmp , $replacement);
			}
			$str .= "</script>\r\n";

			$this->addJs($str);
		}


		/**
		 * 设置字段头
		 *
		 * @param string $str
		 */
		function setPagination($str = '')
		{
			//<ul class="pagination"> <li class="disabled"> <span>«</span> </li> <li class="active"> <span>1</span> </li> <li> <a href="#">2</a> </li> <li> <a href="#">»</a> </li> </ul>
			$this->replaceTag(static::makeNodeName('pagination') , $str);
		}


		/**
		 * 设置搜索表单
		 *
		 * @param string $str
		 */
		function setSearchForm($str = '')
		{
			$this->customJs = $str;
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
				'id'         => 'form1' ,
				'action'     => '' ,
				'attr'       => '' ,
				'pagination' => '' ,
				'method'     => 'get' ,
				'class'      => 'table-striped  table-bordered- table-hover table-condensed ' ,
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
			
			<div class="table-responsive">
			
				<!-- ~~~pagination~~~ -->

				<!--<span class="tips"> * 所有红色标题的字段或者背景颜色为黄色的字段可以双击修改</span>-->
				<table class="table <!-- ~~~class~~~ -->">
					<thead>
						<tr>
							<!-- ~~~head~~~ -->
						</tr>
					</thead>
					<tbody>
							<!-- _____DEFAULT_CONTENTS_____ -->
					</tbody>
				</table>

				<!-- ~~~pagination~~~ -->

			</div>


CONTENTS;
			/**
			 *--------------------------------------------------------------------------
			 */
			parent::__construct($contents);
			$this->_init();
		}
	}