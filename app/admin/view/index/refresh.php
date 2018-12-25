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