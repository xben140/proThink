(function () {

	/**
	 *
	 *
	 *
	 *
	 *                      通用
	 *
	 *
	 *
	 *
	 *
	 */

	//icheck
	$(document).ready(function () {typeof $(".i-checks").iCheck === "function" && $(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",})});


})();

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

	!success && (success = function (data) {

	});
	!error && (error = function (data) {

	});
	!beforeRequest && (beforeRequest = function (data) {

	});


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

