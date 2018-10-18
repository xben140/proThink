<div class="row">
	<div class="col-sm-3">
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

	<div class="col-sm-3">
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


	<div class="col-sm-3">
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

	<div class="col-sm-3">
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


	<div class="col-sm-3">
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

	<div class="col-sm-3">
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


<!-- _____DEFAULT_CONTENTS_____ -->