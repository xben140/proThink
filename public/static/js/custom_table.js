/**
 ******************************************************************************************
 ******************************************************************************************
 *                   列表页搜索
 ******************************************************************************************
 ******************************************************************************************
 */
//自动搜索事件注册
$('.change_serach').on({
	'change': function () {
		submitParentForm(this)
	}
});

$('.btn-group').find('input[type="radio"]').on({
	'change': function () {
		submitParentForm(this)
	}
}).find('input[type="checkbox"]').on({
	'change': function () {
		submitParentForm(this)
	}
});
function submitParentForm(obj) {$(obj).parents('form').submit();}

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
		skin      : 'layui-layer-molv', //样式类名
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


/**
 ******************************************************************************************
 ******************************************************************************************
 *                   表格其他功能事件
 ******************************************************************************************
 ******************************************************************************************
 */

//表格可修改列添加tips
//表格双击修改事件注册
//setFieldUrl
$('.td-modify').on({
	'mouseover': function () {
		index_tips = layer.tips('双击修改', this, {
			tips: [1, '#3f90fc'],
			time: 1000
		});
	},
	'mouseout' : function () {
		layer.close(index_tips);
	},
	'dblclick' : function () {
		let _this = $(this);
		let openType = this.nodeName == 'TEXTAREA' ? 2 : 0;
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
				formType  : openType,
				maxlength : 9999999999,
				shade     : 0.1,
				value     : oldVal,
				area      : ['400px', '200px'],
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


//禁用的textarea预览信息
$('textarea.name').on({
	'mouseover': function () {
		index_tips = layer.tips('双击查看', this, {
			tips: [1, '#fc8337'],
			time: 1000
		});
	},
	'mouseout' : function () {
		layer.close(index_tips);
	},
	'dblclick' : function () {
		let _this = $(this);
		layer.open({
			area      : ['50%', '50%'],
			type      : 1,
			resize    : 1,
			moveOut   : 1,
			title     : '',
			shade     : 0.1,
			skin      : 'layui-layer-molv', //样式类名
			closeBtn  : 0, //不显示关闭按钮
			anim      : 0,
			// anim      : randomNum(0, 6),
			isOutAnim : 0,
			shadeClose: true, //开启遮罩关闭
			content   : '<div style="padding: 10px;" >' + _this.text() + '</div>', //dom
			success   : function (layero, index) {
				_this.attr("disabled", false);
				// layero.alert(layero, index)
			}
		});
	}
});

//setFieldUrl
//表格可修改列添加tips
$('.td-select').on({
	//下拉框修改事件注册
	'change': function () {
		let _this = $(this);
		_this.data('callback', _this.data('change-callback'))
		regeditEventCallback(this);
	}
});


/**
 ************************************
 *                   表格里的switcher
 ************************************
 */


//注册switcher
registSwitcher('js-switch', 1)
registSwitcher('js-switch-notauto', 0)

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
			disabledOpacity   : 0.3,
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

	layer.confirm('确定？', {
		resize    : 1,
		moveOut   : 1,
		title     : '确定当前操作',
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

		updateField(params['id'], params['field'], (!params['val']) + 0, url, function (data) {
			//成功返回回调
			// console.dir(data)
			switchery.enable();
			layer.msg(data.msg);

			//服务器处理成功
			if (data.code == 1)
			{
				let _this = $(sitcher);
				let successCallback = _this.data('success-callback');

				if (typeof eval(successCallback) === 'function')
				{
					eval(successCallback)(sitcher);
				}

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

	updateField(params['id'], params['field'], params['val'], url, function (data) {
		//成功返回回调

		// console.dir(data)
		switchery.enable();

		layer.msg(data.msg);

		let _this = $(sitcher);
		let successCallback = _this.data('success-callback');
		if (typeof eval(successCallback) === 'function')
		{
			eval(successCallback)(sitcher);
		}

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
 * 获取swhtcher的各个参数
 **/
function getSwitcherParams(obj)
{
	let obj_ = $(obj)
	let val = obj_.val();
	let isChecked = obj_.is(':checked');
	let field = obj_.attr("name");
	// let id = obj_.parents('tr').data('id')
	let id = getParentTr(obj_).data('id')
	return {
		'id'   : id,
		'val'  : isChecked + 0,
		'field': field,
	};
}


/**
 ******************************************************************************************
 ******************************************************************************************
 *                   添加按钮
 ******************************************************************************************
 ******************************************************************************************
 */


//添加记录按钮
//addUrl
$('.btn-add').on({
	'click': function () {
		let _this = $(this);
		_this.data('src', addUrl);
		_this.data('is_reload', 1);
		return popWindows(this);
	}
});


/**
 ******************************************************************************************
 ******************************************************************************************
 *                   编辑按钮
 ******************************************************************************************
 ******************************************************************************************
 */

//编辑按钮事件注册
$('.btn-edit').on({
	'click': function () {
		let _this = $(this);
		_this.data('src', editUrl);
		_this.data('is_reload', 1);
		_this.data('params', ({id: getParentTr(_this).data('id')}));
		return popWindows(this);
	}
});


/**
 ******************************************************************************************
 ******************************************************************************************
 *                   启用禁用数据
 ******************************************************************************************
 ******************************************************************************************
 */


//批量禁用按钮事件注册
$('.multi-op-toggle-status-disable').on({
	'click': function () {
		let _this = $(this);
		_this.data('event-callback', 'toggleItemStatus')
		_this.data('status', '0')
		_this.data('callback_', function () {refresh_page(300)})
		regeditMulti(this)
	}
});

//批量启用按钮事件注册
$('.multi-op-toggle-status-enable').on({
	'click': function () {
		let _this = $(this);
		_this.data('event-callback', 'toggleItemStatus')
		_this.data('status', '1')
		_this.data('callback_', function () {refresh_page(300)})
		regeditMulti(this)
	}
});


/**
 * setFieldUrl
 *    传入item 的id，同一设置为启用
 * @param ids 字符串，逗号分隔 1,23,4
 * @param btn
 * @param callback_
 */
function toggleItemStatus(ids, btn, callback_)
{
	let url = setFieldUrl;
	updateField(ids, 'status', $(btn).data('status'), url, function (data) {
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
 ******************************************************************************************
 ******************************************************************************************
 *                   删除数据
 ******************************************************************************************
 ******************************************************************************************
 */

//删除按钮事件注册
$('.btn-delete').on({
	'click': function () {
		let _this = $(this);
		_this.data('callback', 'registerDelete');
		regeditEventCallback(this)
	}
});

//批量删除按钮事件注册
$('.multi-op-del').on({
	'click': function () {
		let _this = $(this);
		_this.data('event-callback', 'itemDelete')
		_this.data('callback_', function () {refresh_page(500)})
		regeditMulti(this)
	}
});

/**
 *    传入一个按钮，提示删除
 * @param  $obj
 */
function registerDelete($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	itemDelete(data_id, $obj, function (data) {
		(data.code) && getParentTr($($obj)).remove();
	})
}


/**
 * deleteUrl
 *
 *    传入item 的id，同一删除
 * @param ids 字符串，逗号分隔 1,23,4
 * @param btn 要加锁按钮
 * @param callback_
 */
function itemDelete(ids, btn, callback_)
{
	let url = deleteUrl;
	layer.confirm('确定删除？', {
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
 ******************************************************************************************
 ******************************************************************************************
 *                   通用
 ******************************************************************************************
 ******************************************************************************************
 */


//搜索框时间选择器
$(".input-daterange").datepicker({
	keyboardNavigation: !1,
	forceParse        : !1,
	autoclose         : !0
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
//			$(v).is(":checked") ? $(v).iCheck('uncheck') : $(v).iCheck('check');
			$(v).iCheck('toggle');
		});
	}
});


//批处理抽象出的方法
//data-event-callback 点击按钮的方法
//data-callback_ 点击按钮之后传入方法里的方法
function regeditMulti(obj)
{
	let _this = $(obj);
	let callback = _this.data('event-callback');
	let callback_ = _this.data('callback_');

	(typeof eval(callback) === "function") && (callback = eval(callback));
	(typeof eval(callback_) === "function") && (callback_ = eval(callback_));

	getSelecteedItemId(function (ids, callback_) {
		callback(ids.join(','), obj, callback_);
	}, callback_);
}

/**
 * 表格里option用的，变换颜色
 * @param obj
 */
function updateColor(obj)
{
	let _this = $(obj);
	_this.css({
		'background': _this.find("option:selected").css('background')
	});
}


/**
 获取所有选中的条目的id，用回调处理
 * @param  callback 点击执行的回调
 * @param  callback_ 传到回调里的回调
 */
function getSelecteedItemId(callback, callback_)
{
	let ids = [];
	$('.ids:checked').each(function (k, v) {ids.push($(v).parents('tr').data('id'));});

	if (ids.length)
	{
		(typeof callback_ === "function") && callback(ids, callback_);
	}
	else
	{
		layer.msg('没有选中的对象');
	}
}


/**
 * 表格里元素获取父级tr
 * @param obj
 * @returns {*}
 */
function getParentTr(obj)
{
	return obj.parents('tr');
}
