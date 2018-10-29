(function () {

	//icheck
	$(document).ready(function () {typeof $(".i-checks").iCheck === "function" && $(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",})});

	//图片用，点击可以直接替换图片
	$('.index_pop').on({
		'click': function () {
			let _this = $(this);
			if (_this.hasClass('preview-img'))
			{
				let url = '/admin/Index/updateImage?condition=' + _this.data('condition');
				_this.data('src', url);
			}
			return popWindows(this);
		}
	});

	//列表页图片预览
	$('.preview-img').on({
		'mouseover': function () {
			let _this = $(this);
			let src = _this.data('origin-src') || _this.attr('src')
			index_preview = layer.open({
				type    : 4,
				closeBtn: 0,
				shade   : 0,
				// shadeClose: 1,
				area    : ['auto', 'auto'],
				// time      : 0,
				content : ['<img style="height: 230px;width:auto" src="' + src + '">', this] //数组第二项即吸附元素选择器或者DOM
			});
		},
		'mouseout' : function () {
			layer.close(index_preview)
		},
	})

	//自定义新窗口打开页面
	$('.btn-open-window').on({
		'click': function () {
			openInNewWindows(this);
		}
	});

	//自定义弹出窗打开页面
	$('.btn-open-pop').on({
		'click': function () {
			popWindows(this);
		}
	});

	//按钮定义事件
	$('.btn-custom-event').on({
		'click': function () {
			regeditEventCallback(this);
		}
	});


	//按钮定义请求事件
	$('.btn-custom-request').on({
		'click': function () {
			doRuquest(this)
		}
	});
})();


//data-src
//data-params
//data-is_reload
//data-is_confirm
function doRuquest($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');

	let params = (_this.data('params'));
	(typeof eval(params) === 'object') && (params = eval(params));

	let msg = (_this.data('msg')) || '确定?';
	let url = _this.data('src') || _this.attr('src');
	params['id'] = data_id;
	params['ids'] = data_id;

	if ((_this.data('is_confirm') !== undefined) && _this.data('is_confirm'))
	{
		layer.confirm(msg, {
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

			ajaxPost(url, params, function (data) {
				//成功返回回调
				layer.msg(data.msg);
				let success = (_this.data('success-request'));
				(typeof eval(success) === 'function') && eval(success)(_this, data)

				if (data.code)
				{
					_this.data('is_reload') && refresh_page();
				}
			}, function (data) {
				//错误返回回调
				let error = (_this.data('error-request'));
				(typeof eval(error) === 'function') && eval(error)(_this)

			}, function (btn) {
				//请求之前回调
				let before = (_this.data('before-request'));
				(typeof eval(before) === 'function') && eval(before)(_this)

			}, _this);

		}, function (index) {
			layer.close(index)
		});

	}
	else
	{
		ajaxPost(url, params, function (data) {
			//成功返回回调
			layer.msg(data.msg);
			let success = (_this.data('success-request'));
			(typeof eval(success) === 'function') && eval(success)(_this, data)

			if (data.code)
			{
				_this.data('is_reload') && refresh_page();
			}
		}, function (data) {
			//错误返回回调
			let error = (_this.data('error-request'));
			(typeof eval(error) === 'function') && eval(error)(_this)

		}, function (btn) {
			//请求之前回调
			let before = (_this.data('before-request'));
			(typeof eval(before) === 'function') && eval(before)(_this)

		}, _this);

	}
}

/**
 *
 *
 *
 *
 *
 *
 *
 *      通用逻辑方法
 *
 *
 *
 *
 *
 */


//点击按钮新窗口打开页面
//data-src
//data-params
function openInNewWindows(obj)
{
	let _this = $(obj);
	let params = (_this.data('params'));
	(typeof eval(params) === 'object') && (params = eval(params));
	let url = _this.data('src') || _this.attr('src');

	if (typeof params === 'object')
	{
		url += '?'
		for (let i in params)
		{
			url += i + '=' + params[i] + '&';
		}
	}

	open(url);
}

//点击按钮弹窗
//data-src
//data-title
//data-params
//data-options
//data-is_reload
function popWindows(obj)
{
	let _this = $(obj);
	let url = _this.data('src') || _this.data('href') || _this.attr('src') || _this.attr('href');
	let title = _this.data('title') || " ";
	let is_reload = !!_this.data('is_reload');
	let params = (_this.data('params'));
	let options = (_this.data('options'));

	(typeof eval(params) === 'object') && (params = eval(params));
	(typeof eval(options) === 'object') && (options = eval(options));

	if (typeof params === 'object')
	{
		url += '?'
		for (let i in params)
		{
			url += i + '=' + params[i] + '&';
		}
	}

	let defaultOptions = {
		type      : 2,
		title     : title,
		shadeClose: 1,
		shade     : 0.1,
		area      : ['85%', '85%'],
		resize    : 1,
		moveOut   : 1,
		skin      : 'search-dom-pop', //样式类名
		closeBtn  : 1, //不显示关闭按钮
		anim      : 0,
		// anim      : randomNum(0, 6),
		isOutAnim : 0,
		content   : url, //iframe的url
		success   : function (_) {
			_this.attr("disabled", false);
		},
		end       : function () {
			is_reload && refresh_page();
		}
	}

	if (typeof options === 'object')
	{
		for (let i in options)
		{
			(defaultOptions[i] !== undefined) && (defaultOptions[i] = options[i]);
		}
	}

	layer.open(defaultOptions);
	return false;
}

/**
 * 刷新页面
 *
 * @param delay
 */
function refresh_page(delay)
{
	!delay && (delay = 300)
	setTimeout(function () {location.reload();}, delay)
}

/**
 * 刷新页面
 *
 */
function rowReload()
{
	location.href = location.origin + location.pathname;
}

/**
 * 为元素注册事件回调
 * @param obj
 */
// data-callback
function regeditEventCallback(obj)
{
	let _this = $(obj);
	let callback = _this.data('callback');
	(typeof eval(callback) === 'function') && eval(callback)(obj);
}

/**
 *
 * 注册元素的update事件
 *
 * 多数写在元素data-callback里
 * @param obj
 */
function registUpdate(obj)
{
	let _this = $(obj);
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
				let beforeCallback = _this.data('success-callback');

				if (typeof eval(beforeCallback) === 'function')
				{
					//注册回调
					eval(beforeCallback)(_this[0])
				}

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


/**
 *
 * @param ids 要更新的id
 * @param field 哪个字段
 * @param val 更新为哪个值
 * @param url 更新的地址
 * @param success 成功回调
 * @param error 失败回调
 * @param beforeRequest 发送请求前回调
 * @param btn 加锁按钮
 */
function updateField(ids, field, val, url, success, error, beforeRequest, btn)
{
	let data = {
		'ids'  : ids,
		'val'  : val,
		'field': field,
	};

	!success && (success = function (data) {});
	!error && (error = function (data) {});
	!beforeRequest && (beforeRequest = function (data) {});
	ajaxPost(url, data, success, error, beforeRequest, btn);
}


function ajaxGet(url, data, success, error, beforeRequest, btn)
{
	ajaxBase(url, data, success, error, beforeRequest, btn, 'get')

}


function ajaxPost(url, data, success, error, beforeRequest, btn)
{
	ajaxBase(url, data, success, error, beforeRequest, btn, 'post')
}

/**
 *
 * @param url 请求地址
 * @param data 请求参数
 * @param success 成功回调
 * @param error 失败回调
 * @param beforeRequest 发送请求前回调
 * @param btn 要加锁按钮
 * @param type get or post
 */
function ajaxBase(url, data, success, error, beforeRequest, btn, type)
{
	let loadIndex = layer.load();

	(typeof beforeRequest === "function") && beforeRequest();
	btn && $(btn).attr('disabled', true);

	$.ajax({
		url     : url,
		type    : type,
		data    : data,
		dataType: 'json',
		success : function (data) {
			success && success(data);
			layer.close(loadIndex);
			btn && $(btn).attr('disabled', false);
		},
		error   : function (data) {
			error && error(data);
			btn && $(btn).attr('disabled', false);
			layer.close(loadIndex);
			layer.msg('请求未授权或者网络故障...');
		},
	});
}

/**
 *
 *
 *
 *
 *
 *
 *
 *      工具方法
 *
 *
 *
 *
 *
 */


/**
 *生成从minNum到maxNum的随机数
 * @param minNum
 * @param maxNum
 * @returns {number}
 */
function randomNum(minNum, maxNum)
{
	switch (arguments.length)
	{
		case 1:
			return parseInt(Math.random() * minNum + 1, 10);
		case 2:
			return parseInt(Math.random() * (maxNum - minNum + 1) + minNum, 10);
		default:
			return 0;
	}
}


/**
 * 模仿PHP的strtotime()函数
 * strtotime('2012-07-27 12:43:43') OR strtotime('2012-07-27')
 * @return 时间戳
 */
function strtotime(str)
{
	var _arr = str.split(' ');
	var _day = _arr[0].split('-');
	_arr[1] = (_arr[1] == null) ? '0:0:0' : _arr[1];
	var _time = _arr[1].split(':');
	for (var i = _day.length - 1; i >= 0; i--)
	{
		_day[i] = isNaN(parseInt(_day[i])) ? 0 : parseInt(_day[i]);
	}
	for (var i = _time.length - 1; i >= 0; i--)
	{
		_time[i] = isNaN(parseInt(_time[i])) ? 0 : parseInt(_time[i]);
	}
	var _temp = new Date(_day[0], _day[1] - 1, _day[2], _time[0], _time[1], _time[2]);
	return _temp.getTime() / 1000;
}


/**
 * 解析url
 * @param url
 * @returns {{source: *, protocol: string, host: string, port: string, query: string, params, file: string | *, hash: string, path: string, relative: string | *, segments: string[]}}
 */
function parseURL(url)
{
	let a = document.createElement('a');
	a.href = url;
	return {
		source  : url,
		protocol: a.protocol.replace(':', ''),
		host    : a.hostname,
		port    : a.port,
		query   : a.search,
		params  : (function () {
			let ret = {},
				seg = a.search.replace(/^\?/, '').split('&'),
				len = seg.length, i = 0, s;
			for (; i < len; i++)
			{
				if (!seg[i])
				{ continue; }
				s = seg[i].split('=');
				ret[s[0]] = s[1];
			}
			return ret;
		})(),
		file    : (a.pathname.match(/\/([^\/?#]+)$/i) || [, ''])[1],
		hash    : a.hash.replace('#', ''),
		path    : a.pathname.replace(/^([^\/])/, '/$1'),
		relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ''])[1],
		segments: a.pathname.replace(/^\//, '').split('/')
	};
}

/**
 let myURL=parseURL('http://abc.com:8080/dir/index.html?id=255&m=hello#top');

 myURL.file;     // = 'index.html'
 myURL.hash;     // = 'top'
 myURL.host;     // = 'abc.com'
 myURL.query;    // = '?id=255&m=hello'
 myURL.params;   // = Object = { id: 255, m: hello }
 myURL.path;     // = '/dir/index.html'
 myURL.segments; // = Array = ['dir', 'index.html']
 myURL.port;     // = '8080'
 myURL.protocol; // = 'http'

 */