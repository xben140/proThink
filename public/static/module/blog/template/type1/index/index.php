{extend name="index/base" /}

{block name="main"}
<main class="col-md-8 main-content">
	{foreach $data as $vo}
		<article class="post tag-android tag-ke-hu-duan">
			<div class="post-head">
				<h3 class="post-title">
					<a target="_blank" href="{:url('/', ['detail'=>$vo['id']])}">{:$vo['title']}</a>
				</h3>
				<div class="post-meta">
					<span class="author">{:$vo['user']} &bull;</span>
					<time class="post-date" datetime="{:formatTime($vo['time'])}" title="{:formatTime($vo['time'])}">{:formatTime($vo['time'])}</time>
				</div>
			</div>

			<!--
					<div class="featured-media">
						<a href="#">
							Android
						</a>
					</div>
			-->

			<div class="post-content">
				{if ($vo['thumbnail'])}
					<img src="{:$vo['thumb']}" alt="">
				{/if}
				<p>{:$vo['abstruct']}</p>
				<div style="clear:both;"></div>
			</div>

			<div class="post-permalink">
				<a target="_blank" href="{:url('/', ['detail'=>$vo['id']])}" class="btn btn-default">阅读全文</a>
			</div>

			<footer class="post-footer clearfix">
				<div class="pull-left tag-list">
					<i class="fa fa-folder-open-o"></i>
					{foreach $vo['tagsArray'] as $vo1}
					<a target="_blank" href="{:url('/article', ['tags'=>$vo1['id']])}">{:$vo1['name']}</a> ,
					{/foreach}
				</div>
				<div class="pull-right share"></div>
			</footer>

		</article>
	{/foreach}

	{:$pagination}

</main>{/block}