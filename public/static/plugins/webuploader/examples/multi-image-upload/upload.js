(function ($) {
	// 当domReady的时候开始初始化
	$(function () {

		//返回信息的所有信息
		window.upload_file = [];

		/**
		 *
		 *
		 *
		 *
		 *
		 * 参数初始化，环境检测
		 *
		 *
		 *
		 */
			//携带额外数据
		let formData = {hello: 124},

			//上传控件实例
			$wrap = $('#uploader'),

			// 图片容器
			$queue = $('<ul class="filelist"></ul>').appendTo($wrap.find('.queueList')),

			// 状态栏，包括进度和控制按钮
			$statusBar = $wrap.find('.statusBar'),

			// 文件总体选择信息。
			$info = $statusBar.find('.info'),

			// 上传按钮
			$upload = $wrap.find('.uploadBtn'),

			// 没选择文件之前的内容。
			$placeHolder = $wrap.find('.placeholder'),

			$progress = $statusBar.find('.progress').hide(),

			// 添加的文件数量
			fileCount = 0,

			// 添加的文件总大小
			fileSize = 0,

			// 优化retina, 在retina下这个值是2
			ratio = window.devicePixelRatio || 1,

			// 缩略图大小
			thumbnailWidth = 110 * ratio,
			thumbnailHeight = 110 * ratio,

			// 可能有pedding, ready, uploading, confirm, done.
			state = 'pedding',

			// 所有文件的进度信息，key为file id
			percentages = {},

			// 判断浏览器是否支持图片的base64
			isSupportBase64 = isSupportBase64Code(),

			// 检测是否已经安装flash，检测flash的版本
			flashVersion = getFlashVersion(),

			supportTransition = isSupportTransition(),

			// WebUploader实例
			uploader;

		//判断环境，查看对flash的支持
		if (!WebUploader.Uploader.support('flash') && WebUploader.browser.ie)
		{

			// flash 安装了但是版本过低。
			if (flashVersion)
			{
				(function (container) {
					window['expressinstallcallback'] = function (state) {
						switch (state)
						{
							case 'Download.Cancelled':
								alert('您取消了更新！')
								break;

							case 'Download.Failed':
								alert('安装失败')
								break;

							default:
								alert('安装已成功，请刷新！');
								break;
						}
						delete window['expressinstallcallback'];
					};

					var swf = './expressInstall.swf';
					// insert flash object
					var html = '<object type="application/x-shockwave-flash" data="' + swf + '" ';

					if (WebUploader.browser.ie)
					{
						html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
					}

					html += 'width="100%" height="100%" style="outline:0">' +
						'<param name="movie" value="' + swf + '" />' +
						'<param name="wmode" value="transparent" />' +
						'<param name="allowscriptaccess" value="always" />' +
						'</object>';

					container.html(html);

				})($wrap);

			}
			else
			{
				// 压根就没有安转。
				$wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
			}

			return;
		}
		else if (!WebUploader.Uploader.support())
		{
			alert('Web Uploader 不支持您的浏览器！');
			return;
		}

		/**
		 *
		 *
		 *
		 * 设置参数
		 *
		 *
		 */

		let options = {
			fileVal : 'image',
			pick    : {
				id      : '#filePicker',
				label   : '点击选择图片',
				multiple: true,
			},
			formData: formData,
			dnd     : '#dndArea',
			paste   : '#uploader',
			swf     : '../../dist/Uploader.swf',

			server: '/home/index/upload',
			// runtimeOrder: 'flash',

			accept             : {
				title     : 'Images',
				extensions: 'gif,jpg,jpeg,bmp,png',
				mimeTypes : 'image/*'
			},
			// 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
			disableGlobalDnd   : true,
			// compress           : true,
			fileSizeLimit      : 300 * 1024 * 1024,    // 200 M
			fileSingleSizeLimit: 50 * 1024 * 1024,    // 50 M
			prepareNextFile    : true,
			fileNumLimit       : 300,
			chunked            : true,
			chunkSize          : 512 * 1024,
			threads            : 10,
			chunkRetry         : 10,
		};


		/**
		 *
		 *
		 *
		 *
		 *
		 * 事件绑定
		 *
		 *
		 *
		 */

		let eventMap = {
			'dialogOpen': function (file) {
				console.log('dialogOpen');
			},

			'ready': function (file) {

				window.uploader = uploader;
			},


			//当文件被加入队列之前触发，此事件的handler返回值为false，则此文件不会被添加进入队列。
			//可以对文件名字做判断
			'beforeFileQueued': function (file) {
				var subject = $.trim(file.name);

			},

			//上传过程中触发，携带上传进度。
			'uploadProgress': function (file, percentage) {
				var $li = $('#' + file.id),
					$percent = $li.find('.progress span');

				$percent.css('width', percentage * 100 + '%');
				percentages[file.id][1] = percentage;
				updateTotalProgress();
			},

			//当文件被加入队列以后触发。
			'fileQueued': function (file) {

				fileCount++;
				fileSize += file.size;

				if (fileCount === 1)
				{
					$placeHolder.addClass('element-invisible');
					$statusBar.show();
				}

				addFile(file);
				setState('ready');
				updateTotalProgress();
			},

			//当文件被移除队列后触发。
			'fileDequeued': function (file) {

				fileCount--;
				fileSize -= file.size;

				if (!fileCount)
				{
					setState('pedding');
				}

				removeFile(file);
				updateTotalProgress();

			},

			//当一批文件添加进队列以后触发。
			'filesQueued': function () {

//文件排序
				/*
				uploader.sort(function( a, b ) {
					if ( a.name < b.name )
					  return -1;
					if ( a.name > b.name )
					  return 1;
					return 0;
				});
				*/
			},

			//当所有文件上传结束时触发。
			'uploadFinished': function () {
				console.dir(window.upload_file)
				$upload.remove();
				showMessage('uploadComplete')
			},

			//当开始上传流程时触发。
			'startUpload': function () {

				setState('uploading');
			},

			//当开始上传流程暂停时触发。
			'stopUpload': function () {

				setState('paused');

			},

			//当validate不通过时，会以派送错误事件的形式通知调用者。通过upload.on('error', handler)可以捕获到此类错误，目前有以下错误会在特定的情况下派送错来。
			// Q_EXCEED_NUM_LIMIT 在设置了fileNumLimit且尝试给uploader添加的文件数量超出这个值时派送。
			// Q_EXCEED_SIZE_LIMIT 在设置了Q_EXCEED_SIZE_LIMIT且尝试给uploader添加的文件总大小超出这个值时派送。
			// Q_TYPE_DENIED 当文件类型不满足时触发。。
			'error': function (type) {

				showMessage(type)
			},

			//当 uploader 被重置的时候触发。
			'reset': function (file) {


			},

			//某个文件开始上传前触发，一个文件只会触发一次。
			'uploadStart': function (file) {


			},

			//当某个文件的分块在发送前触发，主要用来询问是否要添加附带参数，大文件在开起分片上传的前提下此事件可能会触发多次。
			'uploadBeforeSend': function (object, data, headers) {


			},

			//当某个文件上传到服务端响应后，会派送此事件来询问服务端响应是否有效。如果此事件handler返回值为false, 则此文件将派送server类型的uploadError事件。
			'uploadAccept': function (object, ret) {


			},

			//当文件上传出错时触发。
			'uploadError': function (file, reason) {


			},


			//当文件上传成功时触发。
			'uploadSuccess': function (file, response) {
				var oLi = $('#' + file.id);


				//等于2或1
				if (response.sign)
				{
					if (response.is_finished == 1)
					{
						oLi.append('<span class="success">上传成功</span>');
						window.upload_file.push(response);
					}
					else
					{
						//分片上传完成
					}
				}
				else
				{
					//服务器处理出错
					oLi.append('<span class="uploaded">' + result.msg + '</span>');
				}

			},

			//不管成功或者失败，每个文件上传完成时触发。
			'uploadComplete': function (file) {


			},


//阻止此事件可以拒绝某些类型的文件拖入进来。目前只有 chrome 提供这样的 API，且只能通过 mime-type 验证。
			'dndAccept': function (items) {
				console.log(items)

				// 拖拽时不接受 js, txt 文件。
				var denied = false,
					len = items.length,
					i = 0,
					// 修改js类型
					unAllowed = 'text/plain;application/javascript ';

				for (; i < len; i++)
				{
					// 如果在列表里面
					if (~unAllowed.indexOf(items[i].type))
					{
						denied = true;
						break;
					}
				}

				return !denied;
			},

		};



		//自定义事件覆盖默认事件
		if(window.uploaderEventMap !== 'undefined' && typeof window.uploaderEventMap === 'object')
		{
			for (var key in window.uploaderEventMap)
			{
				eventMap[key] = window.uploaderEventMap[key];
			}
		}

		//自定义选项覆盖默认选项
		if(window.uploaderOptionMap !== 'undefined' && typeof window.uploaderOptionMap  === 'object')
		{
			for (var key in window.uploaderOptionMap)
			{
				options[key] = window.uploaderOptionMap[key];
			}
		}


		/**
		 *
		 *
		 *
		 *
		 *
		 * 实例化
		 *
		 *
		 *
		 */

		uploader = WebUploader.create(options);

		// 添加“添加文件”的按钮，
		uploader.addButton({
			id   : '#filePicker2',
			label: '继续添加'
		});

		//注册事件

		for (var e in eventMap)
		{
			uploader.on(e, eventMap[e]);

		}


		$info.on('click', '.retry', function () {
			uploader.retry();
		});

		$info.on('click', '.ignore', function () {
			alert('todo');
		});

		$upload.on('click', function () {
			if ($(this).hasClass('disabled'))
			{
				return false;
			}

			if (state === 'ready')
			{
				uploader.upload();
			}
			else if (state === 'paused')
			{
				uploader.upload();
			}
			else if (state === 'uploading')
			{
				uploader.stop();
			}
		});

		$upload.addClass('state-' + state);
		updateTotalProgress();

		/**
		 *
		 *
		 *
		 *
		 *
		 * 函数申明
		 *
		 *
		 *
		 */

		// 当有文件添加进来时执行，负责view的创建
		function addFile(file)
		{
			var $li = $('<li id="' + file.id + '">' +
				'<p class="title">' + file.name + '</p>' +
				'<p class="imgWrap"></p>' +
				'<p class="progress"><span></span></p>' +
				'</li>'),

				$btns = $('<div class="file-panel">' +
					'<span class="cancel">删除</span>' +
					'<span class="rotateRight">向右旋转</span>' +
					'<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
				$prgress = $li.find('p.progress span'),
				$wrap = $li.find('p.imgWrap'),
				$info = $('<p class="error"></p>'),

				showError = function (code) {
					switch (code)
					{
						case 'exceed_size':
							text = '文件大小超出';
							break;

						case 'interrupt':
							text = '上传暂停';
							break;

						default:
							text = '上传失败，请重试';
							break;
					}

					$info.text(text).appendTo($li);
				};

			if (file.getStatus() === 'invalid')
			{
				showError(file.statusText);
			}
			else
			{
				// @todo lazyload
				$wrap.text('预览中');
				uploader.makeThumb(file, function (error, src) {
					var img;

					if (error)
					{
						$wrap.text('不能预览');
						return;
					}

					if (isSupportBase64)
					{
						img = $('<img src="' + src + '">');
						$wrap.empty().append(img);
					}
					else
					{
						$.ajax('../../server/preview.php', {
							method  : 'POST',
							data    : src,
							dataType: 'json'
						}).done(function (response) {
							if (response.result)
							{
								img = $('<img src="' + response.result + '">');
								$wrap.empty().append(img);
							}
							else
							{
								$wrap.text("预览出错");
							}
						});
					}
				}, thumbnailWidth, thumbnailHeight);

				percentages[file.id] = [file.size, 0];
				file.rotation = 0;
			}

			file.on('statuschange', function (cur, prev) {
				if (prev === 'progress')
				{
					$prgress.hide().width(0);
				}
				else if (prev === 'queued')
				{
					$li.off('mouseenter mouseleave');
					$btns.remove();
				}

				// 成功
				if (cur === 'error' || cur === 'invalid')
				{
					console.log(file.statusText);
					showError(file.statusText);
					percentages[file.id][1] = 1;
				}
				else if (cur === 'interrupt')
				{
					showError('interrupt');
				}
				else if (cur === 'queued')
				{
					percentages[file.id][1] = 0;
				}
				else if (cur === 'progress')
				{
					$info.remove();
					$prgress.css('display', 'block');
				}
				else if (cur === 'complete')
				{
					$li.append('<span class="success"></span>');
				}

				$li.removeClass('state-' + prev).addClass('state-' + cur);
			});

			$li.on('mouseenter', function () {
				$btns.stop().animate({height: 30});
			});

			$li.on('mouseleave', function () {
				$btns.stop().animate({height: 0});
			});

			$btns.on('click', 'span', function () {
				var index = $(this).index(),
					deg;

				switch (index)
				{
					case 0:
						uploader.removeFile(file);
						return;

					case 1:
						file.rotation += 90;
						break;

					case 2:
						file.rotation -= 90;
						break;
				}

				if (supportTransition)
				{
					deg = 'rotate(' + file.rotation + 'deg)';
					$wrap.css({
						'-webkit-transform': deg,
						'-mos-transform'   : deg,
						'-o-transform'     : deg,
						'transform'        : deg
					});
				}
				else
				{
					$wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
/*
					$({
					    rotation: rotation
					}).animate({
					    rotation: file.rotation
					}, {
					    easing: 'linear',
					    step: function( now ) {
					        now = now * Math.PI / 180;
					        var cos = Math.cos( now ),
					            sin = Math.sin( now );
					        $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
					    }
					});
					*/
				}


			});

			$li.appendTo($queue);
		}

		// 负责view的销毁
		function removeFile(file)
		{
			var $li = $('#' + file.id);

			delete percentages[file.id];
			updateTotalProgress();
			$li.off().find('.file-panel').off().end().remove();
		}

		function updateTotalProgress()
		{
			var loaded = 0,
				total = 0,
				spans = $progress.children(),
				percent;

			$.each(percentages, function (k, v) {
				total += v[0];
				loaded += v[0] * v[1];
			});

			percent = total ? loaded / total : 0;


			spans.eq(0).text(Math.round(percent * 100) + '%');
			spans.eq(1).css('width', Math.round(percent * 100) + '%');
			updateStatus();
		}

		function updateStatus()
		{
			var text = '', stats;

			if (state === 'ready')
			{
				text = '选中' + fileCount + '张图片，共' + WebUploader.formatSize(fileSize) + '。';
			}
			else if (state === 'confirm')
			{
				stats = uploader.getStats();
				if (stats.uploadFailNum)
				{
					text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
						stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
				}

			}
			else
			{
				stats = uploader.getStats();
				text = '共' + fileCount + '张（' +
					WebUploader.formatSize(fileSize) +
					'），已上传' + stats.successNum + '张';

				if (stats.uploadFailNum)
				{
					text += '，失败' + stats.uploadFailNum + '张';
				}
			}

			$info.html(text);
		}

		function setState(val)
		{
			var file, stats;

			if (val === state)
			{
				return;
			}

			$upload.removeClass('state-' + state);
			$upload.addClass('state-' + val);
			state = val;

			switch (state)
			{
				case 'pedding':
					$placeHolder.removeClass('element-invisible');
					$queue.hide();
					$statusBar.addClass('element-invisible');
					uploader.refresh();
					break;

				case 'ready':
					$placeHolder.addClass('element-invisible');
					$('#filePicker2').removeClass('element-invisible');
					$queue.show();
					$statusBar.removeClass('element-invisible');
					uploader.refresh();
					break;

				case 'uploading':
					$('#filePicker2').addClass('element-invisible');
					$progress.show();
					$upload.text('暂停上传');
					break;

				case 'paused':
					$progress.show();
					$upload.text('继续上传');
					break;

				case 'confirm':
					$progress.hide();
					$('#filePicker2').removeClass('element-invisible');
					$upload.text('开始上传');

					stats = uploader.getStats();
					if (stats.successNum && !stats.uploadFailNum)
					{
						setState('finish');
						return;
					}
					break;
				case 'finish':
					stats = uploader.getStats();
					if (stats.successNum)
					{
						showMessage('finish')
					}
					else
					{
						// 没有成功的图片，重设
						state = 'done';
						location.reload();
					}
					break;
			}

			updateStatus();
		}

		function isSupportBase64Code()
		{
			var data = new Image();
			var support = true;
			data.onload = data.onerror = function () {
				if (this.width != 1 || this.height != 1)
				{
					support = false;
				}
			}
			data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
			return support;
		}

		function getFlashVersion()
		{
			var version;

			try
			{
				version = navigator.plugins['Shockwave Flash'];
				version = version.description;
			} catch (ex)
			{
				try
				{
					version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version');
				} catch (ex2)
				{
					version = '0.0';
				}
			}
			version = version.match(/\d+/g);
			return parseFloat(version[0] + '.' + version[1], 10);
		}


		function isSupportTransition()
		{
			var s = document.createElement('p').style,
				r = 'transition' in s ||
					'WebkitTransition' in s ||
					'MozTransition' in s ||
					'msTransition' in s ||
					'OTransition' in s;
			s = null;
			return r;
		}

		function showMessage(code)
		{
			let text = '';
			switch (code)
			{
				case 'exceed_size':
				case 'F_EXCEED_SIZE':
					text = '文件大小超出限制';
					break;
				case 'interrupt':
					text = '上传暂停';
					break;
				case "Q_TYPE_DENIED":
					text = '不允许的文件类型';
					break;
				case "F_DUPLICATE":
					text = '有重复添加的文件，已忽略';
					break;
				case "Q_EXCEED_NUM_LIMIT":
					text = '上传文件数量超过限制';
					break;
				case "Q_EXCEED_SIZE_LIMIT":
					text = '单个文件大小超过限制';
					break;
				case "uploadComplete":
					text = '文件全部处理完成';
					break;
				default:
					text = code;
					break;
			}
			alertMassage(text)
			return false;
		}

		function alertMassage(text)
		{
			layer.alert(text);
		}

	});

})(jQuery);
