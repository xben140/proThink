<?php

	namespace builder\elements\frame;

	use builder\lib\makeBase;

	//主框架
	class baseFrameWork extends makeBase
	{
		public $path = __DIR__;

		/**
		 * 添加到head里的js路径
		 * @var array
		 */
		public $jsLib = [
			'__HPLUS__js/plugins/metisMenu/jquery.metisMenu.js' ,
			'__HPLUS__js/plugins/slimscroll/jquery.slimscroll.min.js' ,
			'__HPLUS__js/hplus.min.js' ,
			'__HPLUS__js/contabs.min.js' ,
			'__HPLUS__js/plugins/pace/pace.min.js' ,
		];

		public $css = [];

		public $jsScript = [
			'__CONTROLLER_STATIC_URL__/js/index.js' ,
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


		/**
		 * @param        $options
		 */
		function setMeta($options = [])
		{
			$tmp = <<<str
			<div class="profile-item">
				<span class="font-bold">__FIELD__</span><span >__VALUE__</span>
			</div>
str;
			$str = '';
			foreach ($options as $k => $v)
			{
				$replacement['__FIELD__'] = $v['field'];
				$replacement['__VALUE__'] = $v['value'];
				$str .= strtr($tmp , $replacement);
			}

			$this->replaceTag(static::makeNodeName('profile_meta') , $str);
		}


		/**
		 * @param        $options
		 */
		function setLink($options = [])
		{
			$tmp = <<<str
			<span><a href="__URL__" class="J_menuItem font-bold">__FIELD__</a></span>
str;
			$str = '';
			foreach ($options as $k1 => $v1)
			{
				$str .= '<div class="profile-item">';
				foreach ($v1 as $k => $v)
				{
					if(isset($v['is_display']) && (!$v['is_display'])) continue;

					$replacement['__FIELD__'] = $v['field'];
					$replacement['__URL__'] = $v['value'];
					$str .= strtr($tmp , $replacement);
				}
				$str .= '</div>';
			}

			$this->replaceTag(static::makeNodeName('profile_link') , $str);
		}


		/**
		 * @param        $options
		 */
		function setLinkPop($options = [])
		{
			$tmp = <<<str
			<span><a href="__URL__" class="index_pop font-bold">__FIELD__</a></span>
str;
			$str = '';
			foreach ($options as $k1 => $v1)
			{
				$str .= '<div class="profile-item">';
				foreach ($v1 as $k => $v)
				{
					if(isset($v['is_display']) && (!$v['is_display'])) continue;

					$replacement['__FIELD__'] = $v['field'];
					$replacement['__URL__'] = $v['value'];
					$str .= strtr($tmp , $replacement);
				}
				$str .= '</div>';
			}

			$this->replaceTag(static::makeNodeName('profile_pop_link') , $str);
		}


		/**
		 * @param        $options
		 */
		function setWebSiteLogo($options = [])
		{
			[
				'is_display'      => '' ,
				'editable'        => '' ,
				'src'             => '' ,
				'data-condition'  => '' ,
				'data-origin-src' => '' ,
				'text'            => '' ,
				'style'           => 'width:100%;' ,
			];

			$tmp = <<<str
			<div  class="profile-pic">
				<img alt="image" src="__SRC__" class='__CLASS__'  style='__STYLE__' data-condition='__CONDITION__' data-origin-src='__ORIGIN__' data-text='__TEXT__'/>
			</div>
str;
			$str = '';
			foreach ($options as $k => $v)
			{
				if(isset($v['is_display']) && (!$v['is_display'])) continue;

				$replacement['__CLASS__'] = 'preview-img ';
				(isset($v['editable']) && ($v['editable'])) && $replacement['__CLASS__'] .= 'index_pop';

				$replacement['__STYLE__'] = '';
				(isset($v['style']) && ($v['style'])) && $replacement['__STYLE__'] = $v['style'];

				$replacement['__CONDITION__'] = '';
				(isset($v['data-condition']) && ($v['data-condition'])) && $replacement['__CONDITION__'] = $v['data-condition'];

				$replacement['__ORIGIN__'] = '';
				(isset($v['data-origin-src']) && ($v['data-origin-src'])) && $replacement['__ORIGIN__'] = $v['data-origin-src'];


				$replacement['__SRC__'] = $v['src'];
				$replacement['__TEXT__'] = $v['text'];
				$str .= strtr($tmp , $replacement);
			}

			$this->replaceTag(static::makeNodeName('pic') , $str);
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
				'default_page' => 'http://baidu.com' ,
				'logout_url'   => 'portal/login/logout' ,
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
<div id="wrapper">

	<!--左侧导航开始-->

	<nav class="navbar-default navbar-static-side" role="navigation">
		<div class="nav-close"><i class="fa fa-times-circle"></i></div>
		<div class="sidebar-collapse">
			
			<div class="dropdown profile-element">
			
				<!-- ~~~pic~~~ -->
				
				<!-- ~~~profile_meta~~~ -->
			
				<!-- ~~~profile_pop_link~~~ -->
				
				<!-- ~~~profile_link~~~ -->
				
				<div class="profile-item">
					<span><a href="/" target="_blank" class=" font-bold">访问首页</a></span>
					<!--<span><a href="&lt;!&ndash; ~~~logout_url~~~ &ndash;&gt;" class=" font-bold">退出登陆</a></span>-->
				</div>
				
			</div>
				
				
			<ul class="nav" id="side-menu">
					<!-- 菜单 -->
						{foreach $menuTree as $vo1}
							{if condition="isMenu($vo1)"}
								<li>
									<a href="{:buildPath($vo1)}"><i class="fa {:$vo1.ico}"></i>
										<span class="nav-label">{:$vo1.name}</span>
										<span class="fa arrow fa-angle-right"></span>
									</a>
									{if condition="isDefault($vo1)"}
										<ul class="nav nav-second-level">
											{foreach $vo1['son'] as $vo2}
												{if condition="isMenu($vo2)"}
												<li>
													{if condition="isDefault($vo2)"}
														<a href="{:buildPath($vo2)}">{:$vo2.name}
															<span class="fa arrow fa-angle-right"></span>
														</a>
														<ul class="nav nav-third-level">
															{foreach $vo2['son'] as $vo3}
																{if condition="isMenu($vo3)"}
																<li>
																	<a class="J_menuItem" href="{:buildPath($vo3)}">{:$vo3.name}</a>
																</li>
																{/if}
															{/foreach}
														</ul>
													{else/}
														<a class="J_menuItem" href="{:buildPath($vo2)}">{:$vo2.name}</a>
													{/if}
												</li>
												{/if}
											{/foreach}
										</ul>
									{/if}
								</li>
							{/if}
						{/foreach}
					<!-- /菜单 -->
			</ul>
		</div>
	</nav>
	<!--左侧导航结束-->


	<!--右侧部分开始-->
	
	<div id="page-wrapper" class="gray-bg dashbard-1">

		<div class="row content-tabs">
			<button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
			</button>
			<nav class="page-tabs J_menuTabs">
				<div class="page-tabs-content">
					<a id="refresh"  class="" data-id="">全局刷新</a>
					<!--<a id="clear"  class="" data-id="">清除缓存</a>-->
					<a href="javascript:;" class="active J_menuTab" data-id="<!-- ~~~default_page~~~ -->"> 主页 </a>
				</div>
			</nav>
			<button class="roll-nav roll-right J_tabRight">
			<i class="fa fa-forward"></i>
			</button>
			<div class="btn-group roll-nav roll-right">
				<button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span></button>
				<ul role="menu" class="dropdown-menu dropdown-menu-right">
					<li class="J_tabShowActive">
						<a>定位当前选项卡</a>
					</li>
					<!--<li class="divider"></li>-->
					
					<!--
					<li class="J_tabCloseAll">
						<a>关闭全部选项卡</a>
					</li>
					-->
					
					<li class="J_tabCloseOther">
						<a>关闭其他选项卡</a>
					</li>
				</ul>
			</div>
			<a href="<!-- ~~~logout_url~~~ -->" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i>退出</a>
		</div>
		
		<div class="row J_mainContent" id="content-main">
			<iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<!-- ~~~default_page~~~ -->" frameborder="0" data-id="<!-- ~~~default_page~~~ -->" ></iframe>
		</div>
		
		<div class="footer">
            <div class="pull-right">Copyright © 2016 - 2018  All Rights Reserved.iThink 版权所有 powered by 
                <a href="http://www.ithinkphp.org/" target="_blank">iThink www.ithinkphp.org</a>
            </div>
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