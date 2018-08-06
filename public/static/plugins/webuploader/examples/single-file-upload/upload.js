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
			// WebUploader实例
			uploader;

		/**
		 * 设置参数
		 *
		 *
		 */

		let otions = {
			fileVal : 'file',
			pick    : {
				id      : '#filePicker',
				label   : '点击选择文件',
				multiple: 0,
			},
			formData: formData,
			// dnd     : '#dndArea',
			// paste   : '#uploader',
			swf     : '../../dist/Uploader.swf',

			// 自动上传。
			auto  : true,
			server: '/admin/common/upload',
			// runtimeOrder: 'flash',

			accept             : {
				// title     : 'Images',
				// extensions: 'gif,jpg,jpeg,bmp,png',
				// mimeTypes : 'image/*'
			},
			// 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
			disableGlobalDnd   : true,
			// compress           : true,
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
				let progress = parseInt(percentage * 100) + '%';
				$('.progress-bar').css('width', progress);
				$(".status-box-progess").text(progress);
			},

			//当文件被加入队列以后触发。
			'fileQueued': function (file) {

			},

			//当文件被移除队列后触发。
			'fileDequeued': function (file) {


			},

			//当一批文件添加进队列以后触发。
			'filesQueued': function () {

			},

			//当所有文件上传结束时触发。
			'uploadFinished': function () {
				console.dir(window.upload_file)
				layer.msg('处理完成');

			},

			//当开始上传流程时触发。
			'startUpload': function () {


			},

			//当开始上传流程暂停时触发。
			'stopUpload': function () {


			},

			//当validate不通过时，会以派送错误事件的形式通知调用者。通过upload.on('error', handler)可以捕获到此类错误，目前有以下错误会在特定的情况下派送错来。
			// Q_EXCEED_NUM_LIMIT 在设置了fileNumLimit且尝试给uploader添加的文件数量超出这个值时派送。
			// Q_EXCEED_SIZE_LIMIT 在设置了Q_EXCEED_SIZE_LIMIT且尝试给uploader添加的文件总大小超出这个值时派送。
			// Q_TYPE_DENIED 当文件类型不满足时触发。。
			'error': function (type) {
				$("#filePicker").show();

				showMessage(type)
			},

			//当 uploader 被重置的时候触发。
			'reset': function (file) {


			},

			//某个文件开始上传前触发，一个文件只会触发一次。
			'uploadStart': function (file) {
				$("#filePicker").hide();
				$(".status-box-text").text('上传中，请勿刷新...');
			},

			//当某个文件的分块在发送前触发，主要用来询问是否要添加附带参数，大文件在开起分片上传的前提下此事件可能会触发多次。
			'uploadBeforeSend': function (object, data, headers) {


			},

			//当某个文件上传到服务端响应后，会派送此事件来询问服务端响应是否有效。如果此事件handler返回值为false, 则此文件将派送server类型的uploadError事件。
			'uploadAccept': function (object, ret) {


			},

			//当文件上传出错时触发。
			'uploadError': function (file, reason) {
				$("#filePicker").show();
			},


			//当文件上传成功时触发。
			'uploadSuccess': function (file, response) {

				//等于2或1
				if (response.sign)
				{
					if (response.is_finished == 1)
					{
						window.upload_file.push(response);
						$(".status-box-text").text('上传完成');

					}
					else
					{
					}
				}
				else
				{
					//服务器处理出错
				}
			},

			//不管成功或者失败，每个文件上传完成时触发。
			'uploadComplete': function (file) {

			},

//阻止此事件可以拒绝某些类型的文件拖入进来。目前只有 chrome 提供这样的 API，且只能通过 mime-type 验证。
			'dndAccept': function (items) {

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


		for (var event in eventMap)
		{
			//注册事件
			uploader.on(event, eventMap[event]);
		}

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
