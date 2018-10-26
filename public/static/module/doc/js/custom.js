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


}())
