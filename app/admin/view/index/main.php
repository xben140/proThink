<div class="row">
	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 账号 </h3>
					<h3 class="font-bold">{:$adminInfo['user'] }</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 昵称 </h3>
					<h3 class="font-bold">{:$adminInfo['nickname'] }</h3>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 登陆次数 </h3>
					<h3 class="font-bold">{:$adminInfo['login_count'] }</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 登陆IP </h3>
					<h3 class="font-bold">{:$adminInfo['last_login_ip'] }</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 登陆时间 </h3>
					<h3 class="font-bold">{:formatTime($adminInfo['last_login_time'] , 1)}</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="widget style1 lazur-bg">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h3> 角色 </h3>
					<h3 class="font-bold">{:implode(',' , getAdminSessionInfo(SESSOIN_TAG_ROLE_NAME))}</h3>
				</div>
			</div>
		</div>
	</div>


</div>

<div class="row">
	<div id="formServer"></div>
	<div class="col-sm-12">
		<div class="panel panel-success">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>系统环境</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th style="width: 180px;">项目</th>
						<th style="width: 220px;">要求</th>
						<th>当前</th>
						<th style="width: 50px;">结果</th>
					</tr>
				</thead>
				<tbody id="tb"></tbody>
			</table>
		</div>
	</div>
</div><!-- _____DEFAULT_CONTENTS_____ -->