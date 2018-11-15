<div class="row">
	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>账号</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:$adminInfo['user'] }</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>名字</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:$adminInfo['nickname'] }</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>


	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>登陆次数</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:$adminInfo['login_count'] }</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>登陆IP</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:$adminInfo['last_login_ip'] }</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>


	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>登陆时间</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:formatTime($adminInfo['last_login_time'] , 1)}</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<!--				<span class="label label-success pull-right">月</span>-->
				<h5>角色</h5>
			</div>
			<div class="ibox-content">
				<h3 class="no-margins">{:implode(',' , getAdminSessionInfo(SESSOIN_TAG_ROLE_NAME))}</h3>
				<!--				<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
				<!--				<small>总收入</small>-->
			</div>
		</div>
	</div>

</div>

<div class="row">
	<div class="col-sm-8">

		<table class="table">
			<thead>
				<tr>
					<th style="width: 130px;">项目</th>
					<th style="width: 220px;">要求</th>
					<th>当前</th>
					<th style="width: 50px;">结果</th>
				</tr>
			</thead>
			<tbody id="tb">

			</tbody>
		</table>
	</div>
	<div class="col-sm-4">
		<table class="table">
			<thead>
				<tr>
					<th style="width: 130px;">产品信息</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="tb">
				<tr>
					<td>产品名称</td>
					<td>{:ITHINK_NAME}</td>
				</tr>
				<tr>
					<td>产品版本</td>
					<td>{:ITHINK_VERSION}</td>
				</tr>
				<tr>
					<td>交流QQ群</td>
					<td>419395011</td>
				</tr>
				<tr>
					<td>官方网站</td>
					<td>
						<a target="_blank" href="http://www.ithinkphp.org">www.ithinkphp.org</a>
					</td>
				</tr>
				<tr>
					<td>码云仓库</td>
					<td>
						<a target="_blank" href="https://gitee.com/wf5858585858/iThink">https://gitee.com/wf5858585858/iThink</a>
					</td>
				</tr>
				<tr>
					<td>开发手册</td>
					<td></td>
				</tr>
				<tr>
					<td>联系邮箱</td>
					<td>wf585858@yeah.net</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<!-- _____DEFAULT_CONTENTS_____ -->