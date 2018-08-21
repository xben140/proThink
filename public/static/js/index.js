(function () {
	$('#clear').on({
		'click': function ()
		{
			var _this = $(this);
			var loadIndex = layer.load();

			_this.attr({"disabled": true});

			$.ajax({
				"url"     : "/portal/Login/clear",
				"type"    : "post",
				"dataType": "json",
				"success" : function (_)
				{
					_this.attr({"disabled": false});
					layer.msg('清除成功,  共' + _.length + '个缓存文件');
					layer.close(loadIndex);
				},
				"error"   : function ()
				{
					layer.close(loadIndex);
					_this.attr({"disabled": false});
					layer.msg('请求未授权或者网络故障！');
				},
			});

		}
	});

	$('#refresh').on({
		'click': function ()
		{
			var _this = $(this);
			var loadIndex = layer.load();

			_this.attr({"disabled": true});

			$.ajax({
				"url"     : "/portal/Login/refresh",
				"type"    : "post",
				"dataType": "json",
				"success" : function (_)
				{
					_this.attr({"disabled": false});
					layer.msg(_.msg);

					if (_.code == 1)
					{
						location.reload();
					}

					layer.close(loadIndex);
				},
				"error"   : function ()
				{
					layer.close(loadIndex);
					_this.attr({"disabled": false});
					layer.msg('请求未授权或者网络故障！');
				},
			});
		}
	});

	$('.index_pop').on({
		'click': function (e) {
			let _this = $(this);
			var parentIframeIndex = parent.layer.getFrameIndex(window.name); //获取窗口索引
			layer.open({
				type     : 2,
				title    : _this.text() || _this.data('text'),
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
				content  : _this.attr('href') || _this.data('href'), //iframe的url
				success  : function (_) {
					_this.attr("disabled", false);
				},
				end       : function () {
					// location.reload();
				}
			});
			e.preventDefault();
			return false;
		}
	});

})();


