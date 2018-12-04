/**
 *
 *
 *
 *
 *                  回收站
 *
 *
 *
 */

function registerSetItem($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	itemSet(data_id, $obj, null)
}

function itemSet(ids, btn, callback_)
{
	let _this = $(btn);
	let url = setItemUrl;

	layer.confirm('确定？此操作不可恢复', {
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

		ajaxPost(url, {ids: ids, type: _this.data('action')}, function (data) {
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
 *
 *
 *
 *
 *                  应用操作
 *
 *
 *
 */



/**
 * 安装
 */
function install_1()
{
	$('.install-apply').click();
}


function install_2(obj, data)
{
	$('.install-apply').parent().prev().text(data.msg)
	$('.install-menu').click();
	$('.install-config').click();
	$('.install-db').click();
	$('.install-route').click();
	$('.install-recovery').click();
}


function install_3(obj, data)
{
	obj.parent().data('success', 1);
	let count = 0;
	$('.install-action').each(function (k, v) {
		$(v).parent().data('success') && (count += 1)
	});
	// obj.hide();
	obj.parent().prev().text(data.msg)
	if (count == 5)
	{
		// $('.btn-custom-event').hide()
		// let index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

		$index = layer.alert('安装成，点击 全局刷新 更新菜单', {
			shadeClose: false,
			shade     : 0,
			closeBtn  : 0, //不显示关闭按钮
			skin      : 'layui-layer-molv' //样式类名
		}, function () {
			layer.close($index); //再执行关闭
			// parent.layer.close(index); //再执行关闭
		});
	}
}


/**
 * 卸载
 */

function uninstall_1()
{
	$('.install-menu').click();
	$('.install-config').click();
	$('.install-db').click();
	$('.install-route').click();
	$('.install-recovery').click();
}



function uninstall_2(obj, data)
{
	obj.parent().data('success', 1);
	let count = 0;
	$('.install-action').each(function (k, v) {
		$(v).parent().data('success') && (count += 1)
	});
	// obj.hide();
	obj.parent().prev().text(data.msg)
	if (count == 5)
	{
		$('.install-apply').click();
	}
}
function uninstall_3(obj, data)
{
	$('.install-apply').parent().prev().text(data.msg)

	$index = layer.alert('卸载完成，点击 全局刷新 更新菜单', {
		shadeClose: false,
		shade     : 0,
		closeBtn  : 0, //不显示关闭按钮
		skin      : 'layui-layer-molv' //样式类名
	}, function () {
		layer.close($index); //再执行关闭
		// parent.layer.close(index); //再执行关闭
	});
}
function beforeAction(obj)
{
	obj.parent().prev().text('正在执行...')
}
