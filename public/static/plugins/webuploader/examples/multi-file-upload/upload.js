(function ($) {
	// 当domReady的时候开始初始化
	$(function () {

		//返回信息的所有信息
		window.upload_file = [];

		window.uploaderEvent = function (event) {

			return event
		}

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
		let formData = {},

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

			// 可能有pedding, ready, uploading, confirm, done.
			state = 'pedding',

			// 所有文件的进度信息，key为file id
			percentages = {},

			// 检测是否已经安装flash，检测flash的版本
			flashVersion = getFlashVersion(),

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
		 * 设置参数
		 *
		 *
		 */

		let otions = {
			fileVal : 'file',
			pick    : {
				id       : '#filePicker',
				multiple : true,
				innerHTML: '点击选择文档（可同时选择多个文件）'
			},
			formData: formData,
			dnd     : '#dndArea',
			paste   : '#uploader',
			swf     : '../static/plugins/webuploader/dist/Uploader.swf',

			server: '/admin/common/upload',
			// runtimeOrder: 'flash',

			accept             : {
				// extensions: 'docx,doc,wps',
				// mimeTypes : 'application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword, application/vnd.ms-works'
			},
			// 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
			disableGlobalDnd   : true,
			// compress           : true,
			fileSizeLimit      : 1024 * 1024 * 1024 * 5,    // 5 G
			fileSingleSizeLimit: 1024 * 1024 * 1024 * 5,    // 5 G
			prepareNextFile    : true,
			fileNumLimit       : 300,
			chunked            : true,
			chunkRetry         : 10,
			chunkSize          : 1024 * 1024 * 2,
			threads            : 5,
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
				var oLi = $('#' + file.id);
				oLi.append('<span class="failure">上传出错</span>');
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
				var oLi = $('#' + file.id);
				// oLi.append('<span class="failure">上传出错</span>');
			},

//阻止此事件可以拒绝某些类型的文件拖入进来。目前只有 chrome 提供这样的 API，且只能通过 mime-type 验证。
			'dndAccept': function (items) {

				/*
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

								*/
			},

			'dialogOpen': function (file) {
				console.log('dialogOpen');
			},

			'ready': function (file) {

				window.uploader = uploader;
			},

		};


		//自定义事件处理
		window.uploaderEvent !== 'undefined'
		&& typeof window.uploaderEvent === 'function'
		&& (eventMap = window.uploaderEvent(eventMap));


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

		uploader = WebUploader.create(otions);

		// 添加“添加文件”的按钮，
		uploader.addButton({
			id   : '#filePicker2',
			label: '继续添加'
		});

		for (var event in eventMap)
		{
			//注册事件
			uploader.on(event, eventMap[event]);
		}

		$info.on('click', '.retry', function () {
			uploader.retry();
		});

		$info.on('click', '.ignore', function () {
			alertMassage('todo')
		});

		$upload.on('click', function () {
			$('.del').remove();

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


		function updateStatus()
		{
			var text = '', stats;
			if (state === 'ready')
			{
				text = '选中<span style="color: #f00;" >' + fileCount + '</span>个文件，共<span style="color: #f00;" >' + WebUploader.formatSize(fileSize);
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
				text = '共' + fileCount + '个文件（' +
					WebUploader.formatSize(fileSize) +
					'），已上传' + stats.successNum + '个文件';

				if (stats.uploadFailNum)
				{
					text += '，失败' + stats.uploadFailNum + '个文件';
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
console.dir(state)
			switch (state)
			{
				case 'pedding':
					$placeHolder.removeClass('element-invisible');
					$queue.parent().removeClass('filled');
					$queue.hide();
					$statusBar.addClass('element-invisible');
					uploader.refresh();
					break;

				case 'ready':
					$placeHolder.addClass('element-invisible');
					$('#filePicker2').removeClass('element-invisible');
					$queue.parent().addClass('filled');
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
					$upload.text('开始上传').addClass('disabled');
					$("#filePicker2").remove();
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
						layer.msg('文件上传完成', {icon: 1});
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

		// 当有文件添加进来时执行，负责view的创建
		function addFile(file)
		{
			var $li = $('<li id="' + file.id + '"><p class="progress"><span></span></p>' +
				'<span class="title">' + file.name + '</span>' +
				'<span class="del btn btn-sm btn-xs">移除</span>' +
				'</li>')
				, $btns = $li.find('.del');

			console.dir(file.statusText)

			if (file.getStatus() === 'invalid')
			{
				showMessage(file.statusText);
			}
			else
			{
				percentages[file.id] = [file.size, 0];
			}

			file.on('statuschange', function (cur, prev) {

				if (prev === 'progress')
				{
//							$prgress.hide().width(0);
				}
				else if (prev === 'queued')
				{
//							$li.off('mouseenter mouseleave');
//							$btns.remove();
				}


				// 成功
				if (cur === 'error' || cur === 'invalid')
				{
					showMessage(file.statusText);
					percentages[file.id][1] = 1;
				}
				else if (cur === 'interrupt')
				{
					showMessage('interrupt');
				}
				else if (cur === 'queued')
				{
					percentages[file.id][1] = 0;
				}
				else if (cur === 'progress')
				{
//							$info.remove();
//							$prgress.css('display', 'block');
				}
				else if (cur === 'complete')
				{
//							$li.append('<span class="success">上传成功</span>');
				}

				$li.removeClass('state-' + prev).addClass('state-' + cur);
			});

			$li.on('mouseenter', function () {
				// $btns.stop().animate({height: 30});
			});

			$li.on('mouseleave', function () {
				// $btns.stop().animate({height: 0});
			});

			$btns.on('click', function () {
				uploader.removeFile(file);
			});

			$li.appendTo($queue);
		}


		// 负责view的销毁
		function removeFile(file)
		{
			var $li = $('#' + file.id);

			delete percentages[file.id];
			updateTotalProgress();
			$li.off().remove();
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
