(function () {
	/**
	 *
	 *
	 *
	 *
	 *                  Doc
	 *
	 *
	 *
	 */

//批量设置信息按钮事件
//setDocInfoUrl
	$('.multi-set-info').on({
		'click': function () {
			let _this = $(this);
			let parentIframeIndex = parent.layer.getFrameIndex(window.name); //获取窗口索引

			getSelecteedItemId(function (ids, callback_) {
				ids = ids.join(',');
				layer.open({
					type     : 2,
					title    : '批量设置稿件信息',
					// shadeClose: true,
					shade    : 0.1,
					area     : ['85%', '85%'],
					resize   : 1,
					moveOut  : 1,
					skin     : 'search-dom-pop', //样式类名
					closeBtn : 1, //不显示关闭按钮
					anim     : 0,
					// anim      : randomNum(0, 6),
					isOutAnim: 0,
					content  : setDocInfoUrl + "?ids=" + ids, //iframe的url
					success  : function (_) {
						_this.attr("disabled", false);
					},
					end      : function () {
						refresh_page();
					}
				});

			}, function (data) {

			});
		}
	});

//设置为待定
	$('.btn-set-stay').on({'click': function () {setStay(this)}});

	function setStay($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		let url = editUrl;

		ajaxPost(url, {doc_status: '0', ids: data_id}, function (data) {
			//成功返回回调
			layer.msg(data.msg);
			if (data.code)
			{
				refresh_page();
				// getParentTr($(btn)).remove();
			}
		}, function (data) {
			//错误返回回调

		}, function (btn) {
			//请求之前回调

		}, _this);
	}


}())

function useAddress($obj)
{
	let _this = $($obj);
	let data_id = getParentTr(_this).data('id');
	// _this.attr("disabled", true);

	let url = assignAddressUrl;

	ajaxPost(url, {address_id: data_id}, function (data) {
		//成功返回回调
		layer.msg(data.msg);
		if (data.code)
		{
			refresh_page();
			// getParentTr($(btn)).remove();
		}
	}, function (data) {
		//错误返回回调

	}, function (btn) {
		//请求之前回调

	}, _this);
}
