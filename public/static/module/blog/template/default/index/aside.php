
<aside class="col-md-4 sidebar">

	<div class="widget">
		<h4 class="title">搜索</h4>
		<div class="content  row">
			<form action="/blog" class="search-form" method="get">
				<input type="text" class="keyword" name="keyword" value="{:$keyword}">
				<button type="submit" class="btn btn-default">搜索</button>
			</form>
		</div>
	</div>

	<div class="widget">
		<h4 class="title">分类</h4>
		<div class="content community row">
			<p class="col-md-offset-0">
				<a href="http://weibo.com/ghostchinacom" title="Ghost中文网官方微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '官方微博'])">
					PHP
				</a>
			</p>
			<p class="col-md-offset-1">
				<a href="http://weibo.com/ghostchinacom" title="Ghost中文网官方微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '官方微博'])">
					JavaScript
				</a>
			</p>

			<p class="col-md-offset-2">
				<a href="http://weibo.com/ghostchinacom" title="Ghost中文网官方微博" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '官方微博'])">
					正则表达式
				</a>
			</p>

		</div>
	</div>


	<div class="widget">
		<h4 class="title">标签云</h4>
		<div class="content tag-cloud">
			{foreach $tags as $vo}
			<a target="_blank" href="{:url('/blog', ['tags'=>$vo['id']])}">{:$vo['name']}</a>
			{/foreach}
		</div>
	</div>
</aside>