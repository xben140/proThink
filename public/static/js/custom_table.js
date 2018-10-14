(function () {

	/**
	 *
	 *
	 *
	 *
	 *
	 *
	 ***********************************************************************************************
	 *
	 *
	 *
	 *
	 *                  逻辑事件注册
	 *
	 *
	 *
	 *
	 ***********************************************************************************************
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 */

	/**
	 *
	 *
	 *
	 *
	 *                  User
	 *
	 *
	 *
	 */

	//修改密码
	$('.btn-modify-pwd').on({'click': function () {registerEditPwd(this)}});

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
			area     : ['85%', '85%'],
			resize   : 1,
			moveOut  : 1,
			skin     : 'search-dom-pop', //样式类名
			closeBtn : 1, //不显示关闭按钮
			anim     : 0,
			// anim      : randomNum(0, 6),
			isOutAnim: 0,
			content  : editPwdUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}


	//分配角色
	$('.btn-assign-role').on({'click': function () {registerAssignRoles(this)}});

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
			area     : ['85%', '85%'],
			resize   : 1,
			moveOut  : 1,
			skin     : 'search-dom-pop', //样式类名
			closeBtn : 1, //不显示关闭按钮
			anim     : 0,
			// anim      : randomNum(0, 6),
			isOutAnim: 0,
			content  : assignRolesUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}

	/**
	 *
	 *
	 *
	 *
	 *                  Role
	 *
	 *
	 *
	 */

	//分配权限
	$('.btn-assign-privileges').on({'click': function () {registerAssignPrivileges(this)}});

	function registerAssignPrivileges($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type     : 2,
			title    : '分配权限',
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
			content  : assignPrivilegesUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}

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


	//上传附件
	$('.btn-upload-attachment').on({'click': function () {registerUploadAttachment(this)}});

	function registerUploadAttachment($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type     : 2,
			title    : '上传附件',
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
			content  : registerUploadAttachmentUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}


	//查看附件
	$('.btn-preview-attachment').on({'click': function () {registerPreviewAttachment(this)}});

	function registerPreviewAttachment($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type     : 2,
			title    : '查看附件',
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
			content  : registerPreviewAttachmentUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}


	//替换稿件
	$('.btn-replace-doc').on({'click': function () {replaceDoc(this)}});

	function replaceDoc($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type     : 2,
			title    : '替换稿件',
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
			content  : replaceDocUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}


	//分配地址淡出列表
	$('.btn-assign-address').on({'click': function () {assignAddress(this)}});

	function assignAddress($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type      : 2,
			title     : '分配地址',
			shadeClose: true,
			shade     : 0.1,
			area      : ['85%', '85%'],
			resize    : 1,
			moveOut   : 1,
			skin      : 'search-dom-pop', //样式类名
			closeBtn  : 0, //不显示关闭按钮
			anim      : 0,
			// anim      : randomNum(0, 6),
			isOutAnim : 0,
			content   : assignAddressUrl + "?id=" + data_id, //iframe的url
			success   : function (_) {
				_this.attr("disabled", false);
			},
			end       : function () {
				refresh_page();
			}
		});
	}


	//指定地址
	$('.btn-use-address').on({'click': function () {useAddress(this)}});

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

	//恢复数据
	$('.btn-recover').on({'click': function () {registerSetItem(this, 'recover')}});
	//彻底删除
	$('.btn-complete-delete').on({'click': function () {registerSetItem(this, 'delete')}});


	$('.multi-item-delete').on({
		'click': function () {
			let _this = this;
			getSelecteedItemId(function (ids, callback_) {
				itemSet(ids.join(','), _this, callback_, 'delete')
			}, function (data) {
				setTimeout(function () {
					refresh_page();
				}, 500)
			});
		}
	});

	$('.multi-item-recover').on({
		'click': function () {
			let _this = this;
			getSelecteedItemId(function (ids, callback_) {
				itemSet(ids.join(','), _this, callback_, 'recover')
			}, function (data) {
				setTimeout(function () {
					refresh_page();
				}, 500)
			});
		}
	});

	function registerSetItem($obj, opreation)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');

		itemSet(data_id, $obj, null, opreation)
	}

	function itemSet(ids, btn, callback_, opreation)
	{
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

			ajaxPost(url, {ids: ids, type: opreation}, function (data) {
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


	//回收站查看详细数据
	$('.btn-view-detail').on({
		'click': function () {
			let _this = $(this);
			let data_id = getParentTr(_this).data('id');

			let url = detailInfoUrl;

			ajaxPost(url, {doc_status: '0', ids: data_id}, function (data) {
				//成功返回回调
				if (data.code)
				{
					index_preview = layer.open({
						type      : 1,
						closeBtn  : 0,
						shade     : 0.2,
						shadeClose: 1,
						area      : ['70%', '70%'],
						// time      : 0,
						content   : (function (_) {
							let tmp = '<span class="name bold"> __name__ : </span><span class=" name"> __value__ </span><br>';
							let str = '<div style="margin: 10px;">';
							let replaceStr = function (tmpName, content) {
								let t = tmpName;
								for (let i in content) t = t.replace(i, content[i]);
								return t;
							}

							for (let i in _)
							{
								str += replaceStr(tmp, {
									__name__ : i,
									__value__: _[i],
								});
							}
							str += '</div>';
							return str;
						})(data.data)
					});

				}
			}, function (data) {
				//错误返回回调

			}, function (btn) {
				//请求之前回调

			}, _this);
		},
	})


	//回收站查看数据
	$('.btn-view-info').on({'click': function () {registerviewInfo(this)}});

	function registerviewInfo($obj)
	{
		let _this = $($obj);
		let data_id = getParentTr(_this).data('id');
		// _this.attr("disabled", true);

		layer.open({
			type     : 2,
			title    : '查看数据',
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
			content  : viewInfoUrl + "?id=" + data_id, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
		});
	}


}())


/**
 *
 *
 *
 *
 *
 *
 ***********************************************************************************************
 *
 *
 *
 *
 *                   通用方法
 *
 *
 *
 *
 ***********************************************************************************************
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */


/**
 ******************************************************************************************
 ******************************************************************************************
 *                   列表页搜索
 ******************************************************************************************
 ******************************************************************************************
 */
//自动搜索事件注册
$('.change_serach').on({'change': function () {$(this).parents('form').submit();}});
$('.btn-group').find('input[type="radio"]').on({'change': function () {$(this).parents('form').submit();}});
$('.btn-group').find('input[type="checkbox"]').on({'change': function () {$(this).parents('form').submit();}});


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
			skin      : 'search-dom-pop', //样式类名
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
		let beforeCallback = _this.data('change-callback');

		if (typeof eval(beforeCallback) === 'function')
		{
			//注册回调
			eval(beforeCallback)(this)
		}
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
		let parentIframeIndex = parent.layer.getFrameIndex(window.name); //获取窗口索引
		layer.open({
			type     : 2,
			title    : '添加数据',
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
			content  : addUrl, //iframe的url
			success  : function (_) {
				_this.attr("disabled", false);
			},
			end      : function () {
				refresh_page();
			}
		});
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
$('.btn-edit').on({'click': function () {registerEdit(this)}});

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

	let url = setFieldUrl;
	layer.open({
		type     : 2,
		title    : '编辑',
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
		content  : url + "?id=" + data_id, //iframe的url
		success  : function (_) {
			_this.attr("disabled", false);
		},
		end      : function () {
			refresh_page();
		}
	});
}


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
		let _this = this;
		getSelecteedItemId(function (ids, callback_) {
			itemDisable(ids.join(','), _this, callback_);
		}, function (data) {
			setTimeout(function () {
				refresh_page();
			}, 500)
		});
	}
});

//批量启用按钮事件注册
$('.multi-op-toggle-status-enable').on({
	'click': function () {
		let _this = this;
		getSelecteedItemId(function (ids, callback_) {
			itemEnable(ids.join(','), _this, callback_);
		}, function (data) {
			setTimeout(function () {
				refresh_page();
			}, 500)
		});
	}
});


/**
 * setFieldUrl
 *    传入item 的id，同一设置为启用
 * @param ids 字符串，逗号分隔 1,23,4
 * @param btn
 * @param callback_
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
 * @param btn
 * @param callback_
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
 ******************************************************************************************
 ******************************************************************************************
 *                   删除数据
 ******************************************************************************************
 ******************************************************************************************
 */

//删除按钮事件注册
$('.btn-delete').on({'click': function () {registerDelete(this)}});

//批量删除按钮事件注册
$('.multi-op-del').on({
	'click': function () {
		let _this = this;
		getSelecteedItemId(function (ids, callback_) {
			itemDelete(ids.join(','), _this, callback_);
		}, function (data) {
			setTimeout(function () {
				refresh_page();
			}, 500)
		});
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
	itemDelete(data_id, $obj)
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
 ******************************************************************************************
 ******************************************************************************************
 *                   通用
 ******************************************************************************************
 ******************************************************************************************
 */


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
//日期区间选择事件注册
$(".input-daterange").datepicker({
	keyboardNavigation: !1,
	forceParse        : !1,
	autoclose         : !0
});


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


/**
 * 表格里元素获取父级tr
 * @param obj
 * @returns {*}
 */
function getParentTr(obj)
{
	return obj.parents('tr');
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