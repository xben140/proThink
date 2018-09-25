(function (window_, jQuery) {
	let tool = {};

	let defaultOption = {
		//请求api
		url       : '/portal/area/getAreaByPid',
		//键
		field     : 'pid',
		//请求方法
		method    : 'post',
		//默认请求值
		defaultVal: 0,
		//禁用
		disabled  : 0,
		//返回数据类型
		dataType  : 'json',
		//传其他参数
		data      : {},
		//单个项宽和高
		size      : [150, 300],

		//返回数据填充到li的id的键
		liValue  : 'code',
		//返回数据填充到li的内容的键
		liField  : 'name',
		//ul框
		container: []
	};


	window_.linkage = function (ele, option) {
		let __this = this;
		//选项
		this.options = option || {};
		//input框
		this.element = jQuery(ele);
		//下拉框
		this.box = null;
		//input 里的字
		this.inputtext = {};

		for (var i in defaultOption)
		{
			(this.options[i] == null) && (this.options[i] = defaultOption[i]);
		}


		/**
		 * ****************************
		 *          大框框
		 * ****************************
		 */

		//创建大框框
		this.createBox = function () {
			this.box = jQuery(tool.createTag('panel', {__CONTENT__: ''}));
			this.element.after(this.box);
		};

		//显示大框框
		this.showBox = function () {
			this.box.show()
		};

		//隐藏大框框
		this.hideBox = function () {
			this.box.hide()
		};

		//大框框添加元素
		this.boxAppend = function (dom) {
			this.box.append(dom)
		};

		//大框框清空元素
		this.boxClear = function () {
			this.box.html('')
		};

		/**
		 * ****************************
		 *          ul
		 * ****************************
		 */

		//创建一个ul
		this.createUl = function (name, dom) {
			let dom_ = dom || '';
			let ul = (tool.createTag('box_ul', {
				__CONTENT__: dom_,
				__NAME__   : name,
				__CLASS__  : tool.makeClassName(name),
			}));
			return ul;
		};

		//指定name值，ul里添加li
		this.UlAppend = function (name, dom) {
			jQuery(this.findUlByName(name)).html(dom);
			//每个li加事件
			jQuery(this.findUlByName(name)).find('li').on({
				'click': this.onLiClick
			});
		};

		//清空ul里的li
		this.UlClearByName = function (name) {
			jQuery(this.findUlByName(name)).html('');
			__this.setHiddenValueByName(name, '');
		};

		//根据name值找到ul框框
		this.findUlByName = function (name) {
			return jQuery('.' + tool.makeClassName(name))[0];
		};

		//根据pid把拉下来的数据创建li后填充到ul
		this.UlFillByPid = function (pid, name, selected) {
			this.getDataFormServer(pid, function (data) {
				let lis = '';
				for (let i in data)
				{
					//设置input名字到input数组
					(selected == data[i][__this.options.liValue]) && __this.setInputTextArr(name, data[i][__this.options.liField]);

					lis += __this.createLI(data[i], (selected == data[i][__this.options.liValue]));
				}
				__this.UlAppend(name, lis)
				__this.updateInputValue();

			})
		};

		/**
		 * ****************************
		 *          li
		 * ****************************
		 */

		//创建li
		this.createLI = function (item, isActived) {
			let tag = isActived ? 'box_ul_li_active' : 'box_ul_li';
			let LI = (tool.createTag(tag, {
				__ID__     : item[this.options.liValue],
				__CONTENT__: item[this.options.liField],
				__TITLE__  : item[this.options.liField],
			}));
			return LI;
		};


		//获取li名字
		this.getParentUlName = function (item) {
			return jQuery(item).parent().data('name');

		};

		//获取li名字
		this.getLiField = function (item) {
			return jQuery(item).text();
		};


		//获取li的id
		this.getLiId = function (item) {
			return jQuery(item).data('id');
		};

		//li的点击事件
		this.onLiClick = function () {
			//获取当前ul类名，更新hidden里的值
			//获取点击的li的id，发送请求，填充下一个ul，清空后面所有ul

			let _this = jQuery(this);

			//点击li后添加颜色
			_this.parent().find('li').removeClass('active');
			_this.addClass('active');

			let id = __this.getLiId(this);
			let class_ = __this.getParentUlName(this);

			//设置当前隐藏域里的值为此li的id
			__this.setHiddenValueByName(class_, id);

			//更新此name名字为当前li名字
			__this.setInputTextArr(class_, __this.getLiField(this));


			// console.dir(id)
			// console.dir(class_)

			let t = class_;
			//清空后面所有ul
			while (t && (t = __this.getNextItemFieldByName(t, 'name')))
			{
				//清空之后所有ul的名字
				__this.setInputTextArr(t, null);

				//清空之后所有ul里的li
				t && __this.UlClearByName(t);
			}

			__this.updateInputValue();

			//获取当前li的ul的下一个ul的name
			let nextName = __this.getNextItemFieldByName(class_, 'name');
			//如果后下一个就填充下一个ul
			(nextName) && __this.UlFillByPid(id, nextName);


		}

		/**
		 * ****************************
		 *          input框
		 * ****************************
		 */


		this.setInputTextArr = function (key, value) {
			__this.inputtext[key] = value;
		};


		this.isDisabled = function () {
			return this.options.disabled || this.element.attr('disabled') || this.element.attr('readOnly')
		};

		this.disable = function () {
			return this.element.attr('disabled', true);
		};

		this.setValue = function (value) {
			return this.element.val(value);
		};

		this.getValue = function () {
			return this.element.val();
		};

		this.updateInputValue = function () {
			let str = [];
			for (let i in __this.inputtext)
			{
				str.push(__this.inputtext[i]);
			}
			__this.setValue(str.join(' '));
		}

		/**
		 * ****************************
		 *          parse contianer
		 * ****************************
		 */

		//根据name获取container的上一个元素
		this.getPrevItemByName = function (name) {
			let t = '';
			for (let i in __this.options.container)
			{
				if (__this.options.container[i]['name'] == name)
				{
					t = (__this.options.container[parseInt(i) - 1] !== undefined) ? __this.options.container[parseInt(i) - 1] : '';
				}
			}
			return t;
		}

		//根据name获取container的下一个元素
		this.getNextItemByName = function (name) {
			let t = '';
			for (let i in __this.options.container)
			{
				if (__this.options.container[i]['name'] == name)
				{
					t = (__this.options.container[parseInt(i) + 1] !== undefined) ? __this.options.container[parseInt(i) + 1] : '';
				}
			}
			return t;
		}

		//根据name获取container元素
		this.getItemByName = function (name) {
			let t = '';
			for (let i in __this.options.container)
			{
				if (__this.options.container[i]['name'] == name)
				{
					t = __this.options.container[i];
				}
			}
			return t;
		}

		//根据name获取上一个元素的指定键值
		this.getPrevItemFieldByName = function (name, field) {
			return this.getItemField(this.getPrevItemByName(name), field);
		}

		//根据name获取下一个元素的指定键值
		this.getNextItemFieldByName = function (name, field) {
			return this.getItemField(this.getNextItemByName(name), field);
		}

		//根据name获取元素的指定键值
		this.getItemFieldByName = function (name, field) {
			return this.getItemField(this.getItemByName(name), field);
		}

		//获取元素的指定键值
		this.getItemField = function (item, field) {
			return item[field];
		}


		/**
		 * ****************************
		 *          隐藏框
		 * ****************************
		 */
		//创建一个隐藏框
		this.createHidden = function (name, value) {
			return tool.createTag('hidden', {
				__NAME__ : name,
				__VALUE__: value,
			})
		};

		//吧指定隐藏框附加到input框
		this.appendHiddenToInput = function (input) {
			this.element.before(input);
		};

		//设置指定name隐藏框的值
		this.setHiddenValueByName = function (name, value) {
			jQuery("input[name='" + name + "']").val(value)
		};

		/**
		 * ****************************
		 *          初始化
		 * ****************************
		 */

		//服务器拉取数据
		this.getDataFormServer = function (pid, callback) {
			let data = this.options.data;
			data[this.options.field] = pid;

			return jQuery.ajax({
				url     : this.options.url,
				type    : this.options.method,
				dataType: this.options.dataType,
				data    : data,
				success : callback
			});
		};

		//创建大框框
		this.init = function () {
			this.createBox();

			let hidden = '';
			let ul = '';
			let tmpPid = '';
			let tmpName = '';
			let selected = '';


			for (let i in this.options.container)
			{
				tmpPid = this.options.container[i]['pid'];
				tmpName = this.options.container[i]['name'];

				__this.setInputTextArr(tmpName, null);
				selected = __this.getItemFieldByName(tmpName, 'selected') || __this.getNextItemFieldByName(tmpName, 'pid') || '';
				hidden = this.createHidden(tmpName, selected);
				this.appendHiddenToInput(hidden);

				ul = this.createUl(tmpName);
				this.boxAppend(ul);

				if (tool.hasDefault(this.options.container[i]))
				{
					__this.UlFillByPid(tmpPid, tmpName, selected)
				}
			}

			jQuery('.linkage-box').css({
				height: this.options.size[1],
				width : this.options.size[0],
			})
			jQuery(this.element).on({
				'click': function (e) {
					__this.showBox();
					e.stopPropagation();
				},
			})

			jQuery('.linkage-panel').on({
				'click': function (e) {
					__this.showBox();
					e.stopPropagation();
				},
			})

			window_.onclick = function () {
				__this.hideBox();
			}
		};

		if ((this.element != null && this.element.attr('type') == "text"))
		{
			this.init();
			(this.isDisabled()) && this.disable()
		}

	};

	/*
	*                               工具方法
	* */
	tool.tmp = {
		hidden          : '<input type="hidden" name="__NAME__" value="__VALUE__" />',
		panel           : '<div class="linkage-panel">__CONTENT__</div>',
		box_ul          : '<div class="linkage-box"><ul class="__CLASS__" data-name="__NAME__" >__CONTENT__</ul></div>',
		box_ul_li       : '<li data-id="__ID__" title="__TITLE__">__CONTENT__</li>',
		box_ul_li_active: '<li data-id="__ID__"  title="__TITLE__" class="active" >__CONTENT__</li>',
	};

	//统一替换
	tool.createTag = function (tmpName, content) {
		let t = tool.tmp[tmpName];
		for (let i in content) t = t.replace(i, content[i]);
		return t;
	}

	//构造临时类名
	tool.makeClassName = function (name) {
		return "linkage---" + name;
	}

	//是否有默认值
	tool.hasDefault = function (item) {
		return (item.pid !== undefined) && (item.pid != -1);
	}


})(window, $);