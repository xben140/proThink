{extend name="index/base" /}

{block name="main"}
<main class="col-md-8 main-content">
	<article id="111" class="post">
		<header class="post-head">
			<h2 class="post-title">
				{:$content['title']}
			</h2>
			<section class="post-meta">
				<span class="author">{:$content['user']} &bull;</span>
				<time class="post-date" datetime="{:formatTime($content['time'])}" title="{:formatTime($content['time'])}">{:formatTime($content['time'])}</time>
			</section>
		</header>

		<footer class="post-footer clearfix">
			<div class="pull-left tag-list">
				<i class="fa fa-folder-open-o"></i> {foreach $content['tagsArray'] as $content1}
				<a target="_blank"  href="{:url('/article', ['tags'=>$content1['id']])}">{:$content1['name']}</a>
				, {/foreach}
			</div>
			<div class="pull-right share"></div>
		</footer>

		<section class="post-content">
			<!--
						<blockquote>
							<p>尚未译完，改天再译</p>
						</blockquote>

						-->
			{:$content['content']}
		</section>
	</article>

</main>

{/block}