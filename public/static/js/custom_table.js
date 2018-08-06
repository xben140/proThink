(function () {
	//事件注册

	/**
	 *
	 *
	 *
	 *
	 *                  列表页
	 *
	 *
	 *
	 *
	 *
	 */

	//自动搜索事件注册
	$('.change_serach').on({'change': function () {$(this).parents('form').submit();}});
	$('.btn-group').find('input[type="radio"]').on({'change': function () {$(this).parents('form').submit();}});
	$('.btn-group').find('input[type="checkbox"]').on({'change': function () {$(this).parents('form').submit();}});


	//修改密码
	$('.btn-modify-pwd').on({'click': function () {registerEditPwd(this)}});
	//分配角色
	$('.btn-assign-role').on({'click': function () {registerAssignRoles(this)}});
	//分配权限
	$('.btn-assign-privileges').on({'click': function () {registerAssignPrivileges(this)}});

	//编辑按钮事件注册
	$('.btn-edit').on({'click': function () {registerEdit(this)}});


	//详情按钮事件注册
	$('.btn-detail').on({'click': function () {registerDetail(this)}});
	//删除按钮事件注册
	$('.btn-delete').on({'click': function () {registerDelete(this)}});

	//批量启用按钮事件注册
	$('.multi-op-del').on({
		'click': function () {
			let _this = this;
			getSelecteedItemId(function (ids, callback_) {
				itemDelete(ids.join(','), _this, callback_);
			}, function (data) {
				setTimeout(function () {
					location.reload();
				}, 500)
			});
		}
	});

	//批量禁用按钮事件注册
	$('.multi-op-toggle-status-disable').on({
		'click': function () {
			let _this = this;
			getSelecteedItemId(function (ids, callback_) {
				itemDisable(ids.join(','), _this, callback_);
			}, function (data) {
				setTimeout(function () {
					location.reload();
				}, 500)
			});
		}
	});

	//批量删除按钮事件注册
	$('.multi-op-toggle-status-enable').on({
		'click': function () {
			let _this = this;
			getSelecteedItemId(function (ids, callback_) {
				itemEnable(ids.join(','), _this, callback_);
			}, function (data) {
				setTimeout(function () {
					location.reload();
				}, 500)
			});
		}
	});


	//全选按钮事件注册
	let isAllChecked = false;
	$('.se-all').on({
		'click': function () {
			let checkboxs = $('.ids');
			!isAllChecked ? checkboxs.iCheck('check') : checkboxs.iCheck('uncheck');
			isAllChecked = !isAllChecked;
		}
	});

	//反选按钮事件注册
	$('.se-rev').on({
		'click': function () {
			let checkboxs = $('.ids');
			checkboxs.each(function (k, v) {
//							$(v).is(":checked") ? $(v).iCheck('uncheck') : $(v).iCheck('check');
				$(v).iCheck('toggle');
			});
		}
	});


	//添加记录按钮
	//addUrl
	$('.btn-add').on({
		'click': function () {
			let _this = $(this);
			var parentIframeIndex = parent.layer.getFrameIndex(window.name); //获取窗口索引
			layer.open({
				type     : 2,
				title    : '添加数据',
				// shadeClose: true,
				shade    : 0.1,
				area     : ['75%', '75%'],
				resize   : 1,
				moveOut  : 1,
				skin     : 'search-dom-pop', //样式类名
				closeBtn : 1, //不显示关闭按钮
				anim     : 0,
				// anim      : randomNum(0, 6),
				isOutAnim: 0,
				content  : addUrl, //iframe的url
				success  : function (_) {
					_this.attr("disabled", false);
				},
				end       : function () {
					location.reload();
				}
			});
		}
	});


	//表格可修改列添加tips
	//表格双击修改事件注册
	//setFieldUrl
	$('.td-modify').on({
		'mouseover': function () {
			index_tips = layer.tips('双击可修改', this, {
				tips: [1, '#3f90fc'],
				time: 1000
			});
		},
		'mouseout' : function () {
			layer.close(index_tips);
		},
		'dblclick' : function () {
			let _this = $(this);
			let url = setFieldUrl;

			//当前td有data-field属性，父级tr有data-id字段
			if (getParentTr(_this).data('id') && (_this.data('field')))
			{
				_this.addClass('blue')
				let id = getParentTr(_this).data('id');
				let field = (_this.data('field'));

				let oldVal = $.trim(_this.text());

				layer.prompt({
					closeBtn  : 0, //不显示关闭按钮
					anim      : 0,
					title     : '输入更新的值',
					shadeClose: true, //开启遮罩关闭
					formType  : 0,
					shade     : 0.1,
					value     : oldVal,
					area      : ['800px', '350px'], //自定义文本域宽高
					end       : function () {
						_this.removeClass('blue')
					}
				}, function (value, index, elem) {
					value = $.trim(value);
					let reg = (_this.data('reg'));
					let msg = (_this.data('msg')) ? (_this.data('msg')) : '输入格式不对';

					if (reg && !eval(reg).test(value))
					{
						layer.msg(msg);

						return false;
					}

					let params = {
						id   : id,
						field: field,
						val  : value,
					};

					updateField(params['id'], params['field'], params['val'], url, function (data) {
						//成功返回回调
						layer.msg(data.msg);
						if (data.code)
						{
							_this.text(value)
							layer.close(index);
						}
					}, function (data) {
						//错误返回回调
						layer.msg('请求未授权或者网络故障...');

					}, function (btn) {
						//请求之前回调

					});

				});

			}
		}
	});

	//setFieldUrl
	//表格可修改列添加tips
	$('.td-select').on({
		//下拉框修改事件注册
		'change': function () {
			let _this = $(this);
			let url = setFieldUrl;

			//当前td有data-field属性，父级tr有data-id字段
			if (getParentTr(_this).data('id') && _this.data('field'))
			{
				_this.addClass('blue')
				let id = getParentTr(_this).data('id');
				let field = _this.data('field');

				let value = _this.val();

				let params = {
					id   : id,
					field: field,
					val  : value,
				};

				updateField(params['id'], params['field'], params['val'], url, function (data) {
					//成功返回回调
					_this.removeClass('blue')

					layer.msg(data.msg);
					if (data.code)
					{
						// _this.text(value)
					}
				}, function (data) {
					//错误返回回调
					layer.msg('请求未授权或者网络故障...');
					_this.removeClass('blue')

				}, function (btn) {
					//请求之前回调

				})

			}
		}
	});

	//列表页搜索弹出框事件
	$('.search-dom-btn-1').mouseover(function () {
		let _this = $(this);
		_this.attr("disabled", true);
		layer.open({
			area      : ['65%', '65%'],
			type      : 1,
			resize    : 1,
			moveOut   : 1,
			title     : '条件筛选',
			shade     : 0.1,
			skin      : 'search-dom-pop', //样式类名
			closeBtn  : 0, //不显示关闭按钮
			anim      : 0,
			// anim      : randomNum(0, 6),
			isOutAnim : 0,
			shadeClose: true, //开启遮罩关闭
			content   : $('.search-dom-1'), //dom
			success   : function (layero, index) {
				_this.attr("disabled", false);
				// layero.alert(layero, index)
			}
		});
	});



	//日期区间选择事件注册
	$(".input-daterange").datepicker({
		keyboardNavigation: !1,
		forceParse        : !1,
		autoclose         : !0
	});


	//注册switcher
	registSwitcher('js-switch', 1)
	registSwitcher('js-switch-notauto', 0)

}())


//注册switcher
function registSwitcher(className, isAuto)
{
	//表格里的switcher事件注册
	// let sitcher = document.querySelectorAll(".js-switch");
	let sitcher = document.getElementsByClassName(className);

	let switchery = [];
	for (let i = 0; i < sitcher.length; i++)
	{
		switchery[i] = new Switchery(sitcher[i], {
			color             : '#28fa1a',
			// secondaryColor    : '#fC73d0',
			jackColor         : '#fffff9',
			jackSecondaryColor: '#e5e5df',
			// className         : 'switchery',
			disabled          : false,
			disabledOpacity   : 0.1,
			speed             : '0.3s',
			size              : 'small',
		});

		(isAuto === undefined) && (isAuto = 1);
		//是否自动提交
		switchery[i].auto(isAuto);

		let _this = $(sitcher[i]);
		let beforeCallback = _this.data('change-callback');

		if (typeof eval(beforeCallback) === 'function')
		{
			//注册回调
			sitcher[i].onchange = function () {eval(beforeCallback)(switchery[i]);};
		}
	}
}


/**

 *    传入一个switchery实例，设置为自动更新字段
 * @param  switchery
 */
function switcherUpdateFieldConfirm(switchery)
{
	let sitcher = switchery.element;

	layer.confirm('确定付款？此操作不可恢复', {
		resize    : 1,
		moveOut   : 1,
		title     : '请确定当前操作',
		shade     : 0.1,
		closeBtn  : 0, //不显示关闭按钮
		anim      : 0,
		// anim      : randomNum(0, 6),
		isOutAnim : 0,
		shadeClose: true, //开启遮罩关闭
		btn       : ['确定', '取消']
	}, function (index, layero) {
		layer.close(index)

		let params = getSwitcherParams(sitcher);

		let url = setFieldUrl;
		// let url = '{:url("setField")}';
		updateField(params['id'], params['field'], params['val'], url, function (data) {
			//成功返回回调
			// console.dir(data)
			switchery.enable();
			layer.msg(data.msg);

			//服务器处理成功
			if (data.code)
			{
				switchery.toggleStatus();
			}

		}, function (data) {
			//错误返回回调
			switchery.enable();
			layer.msg('请求未授权或者网络故障...');

		}, function (btn) {
			//请求之前回调
			switchery.disable();
		})

	}, function (index) {
		layer.close(index)
	});

}

/**
 * setFieldUrl
 *    传入一个switchery实例，设置为自动更新字段
 * @param  switchery
 */
function switcherUpdateField(switchery)
{
	let sitcher = switchery.element;

	// let ischecked = switchery.isChecked();

	// console.dir($(sitcher).val())
	// switchery.disable();
	// switchery.enable();

	let params = getSwitcherParams(sitcher);

	let url = setFieldUrl;
	// let url = '{:url("setField")}';
	updateField(params['id'], params['field'], params['val'], url, function (data) {
		//成功返回回调

		// console.dir(data)
		switchery.enable();

		layer.msg(data.msg);

		//服务器没处理成功
		if (!data.code)
		{
			switchery.toggleStatus();
		}

	}, function (data) {
		//错误返回回调
		switchery.enable();
		switchery.toggleStatus();
		layer.msg('请求未授权或者网络故障...');

	}, function (btn) {
		//请求之前回调
		switchery.disable();
	})
}


/**
 * editUrl
 *    传入一个编辑按钮，打开对应item编辑框
 * @param  $obj
 */
function registerEdit($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	// _this.attr("disabled", true);

	layer.open({
		type     : 2,
		title    : '编辑',
		// shadeClose: true,
		shade    : 0.1,
		area     : ['75%', '75%'],
		resize   : 1,
		moveOut  : 1,
		skin     : 'search-dom-pop', //样式类名
		closeBtn : 1, //不显示关闭按钮
		anim     : 0,
		// anim      : randomNum(0, 6),
		isOutAnim: 0,
		content  : editUrl + "?id="+data_id, //iframe的url
		success  : function (_) {
			_this.attr("disabled", false);
		},
		end       : function () {
			location.reload();
		}
	});
}

/**
 * editPwdUrl
 *    传入一个编辑按钮，打开对应item修改密码框
 * @param  $obj
 */
function registerEditPwd($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	// _this.attr("disabled", true);

	layer.open({
		type     : 2,
		title    : '修改密码',
		// shadeClose: true,
		shade    : 0.1,
		area     : ['75%', '75%'],
		resize   : 1,
		moveOut  : 1,
		skin     : 'search-dom-pop', //样式类名
		closeBtn : 1, //不显示关闭按钮
		anim     : 0,
		// anim      : randomNum(0, 6),
		isOutAnim: 0,
		content  : editPwdUrl + "?id="+data_id, //iframe的url
		success  : function (_) {
			_this.attr("disabled", false);
		},
	});
}

/**
 * assignRolesUrl
 *    传入一个编辑按钮，打开对应item修改密码框
 * @param  $obj
 */
function registerAssignRoles($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	// _this.attr("disabled", true);

	layer.open({
		type     : 2,
		title    : '分配角色',
		// shadeClose: true,
		shade    : 0.1,
		area     : ['75%', '75%'],
		resize   : 1,
		moveOut  : 1,
		skin     : 'search-dom-pop', //样式类名
		closeBtn : 1, //不显示关闭按钮
		anim     : 0,
		// anim      : randomNum(0, 6),
		isOutAnim: 0,
		content  : assignRolesUrl + "?id="+data_id, //iframe的url
		success  : function (_) {
			_this.attr("disabled", false);
		},
	});
}

/**
 * assignPrivilegesUrl
 *    传入一个编辑按钮，打开对应item修改密码框
 * @param  $obj
 */
function registerAssignPrivileges($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	// _this.attr("disabled", true);

	layer.open({
		type     : 2,
		title    : '分配角色',
		// shadeClose: true,
		shade    : 0.1,
		area     : ['75%', '75%'],
		resize   : 1,
		moveOut  : 1,
		skin     : 'search-dom-pop', //样式类名
		closeBtn : 1, //不显示关闭按钮
		anim     : 0,
		// anim      : randomNum(0, 6),
		isOutAnim: 0,
		content  : assignPrivilegesUrl + "?id="+data_id, //iframe的url
		success  : function (_) {
			_this.attr("disabled", false);
		},
	});
}


/**
 * detailUrl
 *    传入一个编详情按钮，打开对应item详情框
 * @param  $obj
 */
function registerDetail($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	console.dir('detail ' + data_id);

	layer.open({
		type      : 2,
		title     : '详细信息',
		shadeClose: true,
		shade     : 0.1,
		area     : ['75%', '75%'],
		resize    : 1,
		moveOut   : 1,
		skin      : 'search-dom-pop', //样式类名
		closeBtn  : 0, //不显示关闭按钮
		anim      : 0,
		// anim      : randomNum(0, 6),
		isOutAnim : 0,
		content   : detailUrl + "?id="+data_id, //iframe的url
		success   : function (_) {
			_this.attr("disabled", false);
		},
	});
}



/**
 * setFieldUrl
 *    传入item 的id，同一设置为启用
 * @param ids 字符串，逗号分隔 1,23,4
 */
function itemEnable(ids, btn, callback_)
{
	let url = setFieldUrl;
	// let url = '{:url("setField")}';
	updateField(ids, 'status', '1', url, function (data) {
		//成功返回回调
		layer.msg(data.msg);

		(typeof callback_ === "function") && callback_(data);
	}, function (data) {
		//错误返回回调

	}, function (btn) {
		//请求之前回调

	}, btn)
}


/**
 * setFieldUrl
 *    传入item 的id，同一设置为禁用
 * @param ids 字符串，逗号分隔 1,23,4
 */
function itemDisable(ids, btn, callback_)
{
	let url = setFieldUrl;
	// let url = '{:url("setField")}';
	updateField(ids, 'status', '0', url, function (data) {
		//成功返回回调
		layer.msg(data.msg);

		(typeof callback_ === "function") && callback_(data);
	}, function (data) {
		//错误返回回调

	}, function (btn) {
		//请求之前回调

	}, btn)
}

/**
 * deleteUrl
 *
 *    传入item 的id，同一删除
 * @param ids 字符串，逗号分隔 1,23,4
 * @param btn 要加锁按钮
 */
function itemDelete(ids, btn, callback_)
{
	let url = deleteUrl;

	layer.confirm('确定删除？此操作不可恢复', {
		resize    : 1,
		moveOut   : 1,
		title     : '请确定当前操作',
		shade     : 0.1,
		closeBtn  : 0, //不显示关闭按钮
		anim      : 0,
		// anim      : randomNum(0, 6),
		isOutAnim : 0,
		shadeClose: true, //开启遮罩关闭
		btn       : ['确定', '取消']
	}, function (index, layero) {
		layer.close(index)

		ajaxPost(url, {ids: ids}, function (data) {
			//成功返回回调
			layer.msg(data.msg);
			if (data.code)
			{
				getParentTr($(btn)).remove();
			}
			(typeof callback_ === "function") && callback_(data);
		}, function (data) {
			//错误返回回调

		}, function (btn) {
			//请求之前回调

		}, btn);

	}, function (index) {
		layer.close(index)
	});

}

/**
 *    传入一个编辑按钮，提示删除
 * @param  $obj
 */
function registerDelete($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');

	itemDelete(data_id, $obj)
}


function getParentTr(obj)
{
	return obj.parents('tr');
}

/**
 * 获取swhtcher的各个参数
 **/
function getSwitcherParams(obj)
{
	let obj_ = $(obj)
	let val = obj_.val();
	let isChecked = obj_.is(':checked');
	let field = obj_.attr("name");
	let id = obj_.parents('tr').data('id')

	return {
		'id'   : id,
		'val'  : isChecked + 0,
		'field': field,
	};
}

/**
 获取所有选中的条目的id，用回调处理
 * @param  callback
 * @param  callback_
 */
function getSelecteedItemId(callback, callback_)
{
	let ids = [];
	$('.ids:checked').each(function (k, v) {ids.push($(v).parents('tr').data('id'));});

	if (ids.length)
	{callback(ids, callback_);}
	else
	{layer.msg('没有选中的对象');}
}

