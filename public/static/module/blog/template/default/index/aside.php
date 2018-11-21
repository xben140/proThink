
<aside class="col-md-4 sidebar">

	<div class="widget">
		<h4 class="title">搜索</h4>
		<div class="content  row">
			<form action="/article" class="search-form" method="get">
				<input type="text" class="keyword" name="keyword" value="{:$keyword}">
				<button type="submit" class="btn btn-default">搜索</button>
			</form>
		</div>
	</div>

	<div class="widget">
		<h4 class="title">分类</h4>
		<div class="content community row">

			{foreach $types as $vo}
			<p class="col-md-offset-{:$vo['level']}">
				<a href="{:url('/article', ['type'=>$vo['id']])}" title="{:$vo['name']}" target="_blank" >
					{:$vo['name']}
				</a>
			</p>
			{/foreach}

		</div>
	</div>


	<div class="widget">
		<h4 class="title">标签云</h4>
		<div class="content tag-cloud">
			{foreach $tags as $vo}
			<a target="_blank" href="{:url('/article', ['tags'=>$vo['id']])}">{:$vo['name']}</a>
			{/foreach}
		</div>
	</div>
</aside>