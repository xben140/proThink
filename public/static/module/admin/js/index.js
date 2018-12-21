/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/

(function () {
	$('#clear').on({
		'click': function ()
		{
			var _this = $(this);
			var loadIndex = layer.load();

			_this.attr({"disabled": true});

			$.ajax({
				"url"     : "/admin/Login/clear",
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
				"url"     : "/admin/Login/refresh",
				"type"    : "post",
				"dataType": "json",
				"success" : function (data)
				{
					_this.attr({"disabled": false});

					layer.msg(data.msg);

					if (data.code == 1)
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

})();


