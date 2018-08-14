		

<!doctype html>
<html lang="en">
	<head>

		<!--					head					-->

		<meta charset="utf-8">
<!--[if lt IE 9]><meta http-equiv="refresh" content="0;ie.html" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta  name="viewport"  content="width=device-width"  >
<meta  name="keywords"  content=""  >
<meta  name="description"  content=""  >
<meta name="renderer" content="webkit" >
<title>主页</title>

<!-- ! ~~~HEAD~~~ -->










		<link rel="stylesheet" href="__HPLUS__css/bootstrap.min14ed.css">
<link rel="stylesheet" href="__HPLUS__css/font-awesome.min93e3.css">
<link rel="stylesheet" href="__HPLUS__css/animate.min.css">
<link rel="stylesheet" href="__HPLUS__css/style.min862f.css">
			<style>  

			</style>  

<!-- ! ~~~CSS~~~ -->



		<script src="__HPLUS__js/jquery.min.js"></script>
<script src="__HPLUS__js/bootstrap.min.js"></script>
<script src="__HPLUS__js/content.min.js"></script>
<script src="__HPLUS__js/plugins/layer/layer.js"></script>
<script src="__HPLUS__js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="__HPLUS__js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="__HPLUS__js/hplus.min.js"></script>
<script src="__HPLUS__js/contabs.min.js"></script>
<script src="__HPLUS__js/plugins/pace/pace.min.js"></script>

<!-- ! ~~~JS_LIB~~~ -->



		<!--					/head					-->

	</head>
	<body   style="overflow:hidden"  class="fixed-sidebar full-height-layout gray-bg" >

		<!--					body					-->
		<div id="wrapper">

	<!--左侧导航开始-->

	<nav class="navbar-default navbar-static-side" role="navigation">
		<div class="nav-close"><i class="fa fa-times-circle"></i></div>
		<div class="sidebar-collapse">
			
			<div class="dropdown profile-element">
				<div  class="profile-pic"><img alt="image" src="http://img.newyx.net/newspic/image/201706/01/d380e50205.jpg" /></div>
				
								<div class="profile-item">
				<span class="font-bold">账号 : </span><span >qq1234567</span>
			</div>			<div class="profile-item">
				<span class="font-bold">名字 : </span><span >HELLO</span>
			</div>			<div class="profile-item">
				<span class="font-bold">登陆次数 : </span><span >8</span>
			</div>			<div class="profile-item">
				<span class="font-bold">登陆IP : </span><span >127.0.0.1</span>
			</div>			<div class="profile-item">
				<span class="font-bold">登陆时间 : </span><span >2018-08-14</span>
			</div>
			
				<!--
				<div class="profile-item">
					<span class="font-bold">角色 : </span><span class="">全站管理员</span>
				</div>
				-->
				
				<!-- ~~~profile_link~~~ -->
				<div class="profile-item">
					<span><a href="/portal/login/logout.html" class=" font-bold">退出登陆</a></span>
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
	<!--
		<div class="row border-bottom">
			<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
						<i class="fa fa-bars"></i></a>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-envelope"></i>
							<span class="label label-warning">16</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li class="m-t-xs">
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/a7.jpg">
									</a>
									<div class="media-body">
										<small class="pull-right">46小时前</small>
										<strong>小四</strong> 这个在日本投降书上签字的军官，建国后一定是个不小的干部吧？ <br>
										<small class="text-muted">3天前 2014.11.8</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/a4.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right text-navy">25小时前</small>
										<strong>国民岳父</strong> 如何看待“男子不满自己爱犬被称为狗，刺伤路人”？——这人比犬还凶 <br>
										<small class="text-muted">昨天</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a class="J_menuItem" href="mailbox.html">
										<i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
									</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-bell"></i>
							<span class="label label-primary">8</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="mailbox.html">
									<div>
										<i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
										<span class="pull-right text-muted small">4分钟前</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html">
									<div>
										<i class="fa fa-qq fa-fw"></i> 3条新回复
										<span class="pull-right text-muted small">12分钟钱</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a class="J_menuItem" href="notifications.html">
										<strong>查看所有 </strong> <i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown hidden-xs">
						<a class="right-sidebar-toggle" aria-expanded="false">
							<i class="fa fa-tasks"></i> 主题
						</a>
					</li>
				</ul>
			</nav>
		</div>
		
		-->
		<div class="row content-tabs">
			<button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
			</button>
			<nav class="page-tabs J_menuTabs">
				<div class="page-tabs-content">
					<a id="refresh"  class="" data-id="">全局刷新</a>
					<a id="clear"  class="" data-id="">清除缓存</a>
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
					<li class="divider"></li>
					<li class="J_tabCloseAll">
						<a>关闭全部选项卡</a>
					</li>
					<li class="J_tabCloseOther">
						<a>关闭其他选项卡</a>
					</li>
				</ul>
			</div>
			<a href="/portal/login/logout.html" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
		</div>
		
		<div class="row J_mainContent" id="content-main">
			<iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="http://baidu.com" frameborder="0"   seamless></iframe>
		</div>
		
	</div>


	<!--右侧部分结束-->


	<!--右侧边栏开始-->
	<!--
	
	<div id="right-sidebar">
		<div class="sidebar-container">
			<ul class="nav nav-tabs navs-3">
				<li class="active">
					<a data-toggle="tab" href="#tab-1">
						<i class="fa fa-gear"></i> 主题
					</a>
				</li>
				<li class="">
					<a data-toggle="tab" href="#tab-2">
						通知
					</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-3">
						项目进度
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="tab-1" class="tab-pane active">
					<div class="sidebar-title">
						<h3><i class="fa fa-comments-o"></i> 主题设置</h3>
						<small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。
						</small>
					</div>
					<div class="skin-setttings">
						<div class="title">主题设置</div>
						<div class="setings-item">
							<span>收起左侧菜单</span>
							<div class="switch">
								<div class="onoffswitch">
									<input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
									<label class="onoffswitch-label" for="collapsemenu">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="setings-item">
							<span>固定顶部</span>
							<div class="switch">
								<div class="onoffswitch">
									<input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
									<label class="onoffswitch-label" for="fixednavbar">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="setings-item">
                                <span>
                        固定宽度
                    </span>
							<div class="switch">
								<div class="onoffswitch">
									<input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
									<label class="onoffswitch-label" for="boxedlayout">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="title">皮肤选择</div>
						<div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
						</div>
						<div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
						</div>
						<div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
						</div>
					</div>
				</div>
				<div id="tab-2" class="tab-pane">
					<div class="sidebar-title">
						<h3><i class="fa fa-comments-o"></i> 最新通知</h3>
						<small><i class="fa fa-tim"></i> 您当前有10条未读信息</small>
					</div>
					<div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a1.jpg">
									<div class="m-t-xs">
										<i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i>
									</div>
								</div>
								<div class="media-body">
									据天津日报报道：瑞海公司董事长于学伟，副董事长董社轩等10人在13日上午已被控制。 <br>
									<small class="text-muted">今天 4:21</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
								</div>
								<div class="media-body">
									HCY48之音乐大魔王会员专属皮肤已上线，快来一键换装拥有他，宣告你对华晨宇的爱吧！ <br>
									<small class="text-muted">昨天 2:45</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a3.jpg">
									<div class="m-t-xs">
										<i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i>
										<i class="fa fa-star text-warning"></i>
									</div>
								</div>
								<div class="media-body">
									写的好！与您分享 <br>
									<small class="text-muted">昨天 1:10</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
								</div>
								<div class="media-body">
									国外极限小子的炼成！这还是亲生的吗！！ <br>
									<small class="text-muted">昨天 8:37</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
								</div>
								<div class="media-body">
									一只流浪狗被收留后，为了减轻主人的负担，坚持自己觅食，甚至......有些东西，可能她比我们更懂。 <br>
									<small class="text-muted">今天 4:21</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
								</div>
								<div class="media-body">
									这哥们的新视频又来了，创意杠杠滴，帅炸了！ <br>
									<small class="text-muted">昨天 2:45</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a3.jpg">
									<div class="m-t-xs">
										<i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i>
										<i class="fa fa-star text-warning"></i>
									</div>
								</div>
								<div class="media-body">
									最近在补追此剧，特别喜欢这段表白。 <br>
									<small class="text-muted">昨天 1:10</small>
								</div>
							</a>
						</div>
						<div class="sidebar-message">
							<a href="#">
								<div class="pull-left text-center">
									<img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
								</div>
								<div class="media-body">
									我发起了一个投票 【你认为下午大盘会翻红吗？】 <br>
									<small class="text-muted">星期一 8:37</small>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div id="tab-3" class="tab-pane">
					<div class="sidebar-title">
						<h3><i class="fa fa-cube"></i> 最新任务</h3>
						<small><i class="fa fa-tim"></i> 您当前有14个任务，10个已完成</small>
					</div>
					<ul class="sidebar-list">
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>市场调研</h4>
								按要求接收教材；
								<div class="small">已完成： 22%</div>
								<div class="progress progress-mini">
									<div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
								</div>
								<div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>可行性报告研究报上级批准</h4>
								编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对
								<div class="small">已完成： 48%</div>
								<div class="progress progress-mini">
									<div style="width: 48%;" class="progress-bar"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>立项阶段</h4>
								东风商用车公司 采购综合综合查询分析系统项目进度阶段性报告武汉斯迪克科技有限公司
								<div class="small">已完成： 14%</div>
								<div class="progress progress-mini">
									<div style="width: 14%;" class="progress-bar progress-bar-info"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="label label-primary pull-right">NEW</span>
								<h4>设计阶段</h4>
								&lt;!&ndash;<div class="small pull-right m-t-xs">9小时以后</div>&ndash;&gt;项目进度报告(Project Progress Report)
								<div class="small">已完成： 22%</div>
								<div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>拆迁阶段</h4>
								科研项目研究进展报告 项目编号: 项目名称: 项目负责人:
								<div class="small">已完成： 22%</div>
								<div class="progress progress-mini">
									<div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
								</div>
								<div class="small text-muted m-t-xs">项目截止： 4:00 - 2015.10.01</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>建设阶段</h4>
								编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对
								<div class="small">已完成： 48%</div>
								<div class="progress progress-mini">
									<div style="width: 48%;" class="progress-bar"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="small pull-right m-t-xs">9小时以后</div>
								<h4>获证开盘</h4>
								编写目的编写本项目进度报告的目的在于更好的控制软件开发的时间,对团队成员的 开发进度作出一个合理的比对
								<div class="small">已完成： 14%</div>
								<div class="progress progress-mini">
									<div style="width: 14%;" class="progress-bar progress-bar-info"></div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	-->
	
	<!--右侧边栏结束-->


	<!--mini聊天窗口开始-->

	<!--mini聊天窗口结束-->

	<!--mini聊天按钮开始-->

	<!--mini聊天按钮结束-->

	<!--  -->
</div>


<!-- ! ~~~BODY~~~ -->


		<!--					/body					-->


		<!--					script					-->
		
<script>
								!function (){
									$('#clear').on({
										'click': function ()
										{
											var _this = $(this);
											var loadIndex = layer.load();

											_this.attr({"disabled": true});

											$.ajax({
												"url"     : "{:url('portal/Login/clear')}",
												"type"    : "post",
												"dataType": "json",
												"success" : function (_)
												{
													_this.attr({"disabled": false});
													layer.msg('清除成功,  共' + _.length + '个缓存文件');
													layer.close(loadIndex);
												},
												"error"   : function ()
												{
													layer.close(loadIndex);
													_this.attr({"disabled": false});
													layer.msg('请求未授权或者网络故障！');
												},
											});

										}
									});
								}();
									
								(function ()
								{
									var refresh = $('#refresh');
					
									refresh.on({
										'click': function ()
										{
											var _this = $(this);
											var loadIndex = layer.load();
					
											_this.attr({"disabled": true});
					
											$.ajax({
												"url"     : "{:url('portal/Login/refresh')}",
												"type"    : "post",
												"dataType": "json",
												"success" : function (_)
												{
													_this.attr({"disabled": false});
													layer.msg(_.msg);
					
													if (_.code == 1)
													{
														location.reload();
													}
					
													layer.close(loadIndex);
												},
												"error"   : function ()
												{
													layer.close(loadIndex);
													_this.attr({"disabled": false});
													layer.msg('请求未授权或者网络故障！');
												},
											});
										}
									});
					
									var $menuToRight=$(".roll-right.J_tabRight"),
										$magInfo=$(".magazine-info");
									var rightNum=$(window).width()-$magInfo.offset().left;
									$menuToRight.css({right:rightNum});
								})();
								</script>

<!-- ! ~~~SCRIPT~~~ -->



		<script src="__STATIC__/js/custom.js"></script>

<!-- ! ~~~JS_INVOKE~~~ -->


		<!--					/script					-->
	</body>
</html>