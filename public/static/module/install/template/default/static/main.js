/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/

/*====================================================
  TABLE OF CONTENT
  1. function declearetion
  2. Initialization
====================================================*/

/*===========================
 1. function declearetion
 ==========================*/
var themeApp = {
	featuredMedia   : function () {
		$(".post").each(function () {
			var thiseliment = $(this);
			var media_wrapper = $(this).find('featured');
			var media_content_image = media_wrapper.find($('img'));
			var media_content_embeded = media_wrapper.find('iframe');
			if (media_content_image.length > 0)
			{
				$(media_content_image).insertAfter(thiseliment.find('.post-head')).wrap("<div class='featured-media'></div>");
				thiseliment.addClass('post-type-image');
				media_wrapper.remove();
			}
			else if (media_content_embeded.length > 0)
			{
				$(media_content_embeded).insertAfter(thiseliment.find('.post-head')).wrap("<div class='featured-media'></div>");
				thiseliment.addClass('post-type-embeded');
			}
		});
	},
	responsiveIframe: function () {
		$('.post').fitVids();
	},
	sidebarConfig   : function () {
		if (sidebar_left == true)
		{
			$('.main-content').addClass('col-md-push-4');
			$('.sidebar').addClass('col-md-pull-8');
		}
	},
	highlighter     : function () {
		$('pre code').each(function (i, block) {
			hljs.highlightBlock(block);
		});
	},
	searchForm      : function () {
		$('.search-form').on({
			'submit': function () {
				let value = $(this).find('.keyword').val();
				if (!value)
				{
					return false;
				}
			}
		});
	},
	backToTop       : function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100)
			{
				$('#back-to-top').fadeIn();
			}
			else
			{
				$('#back-to-top').fadeOut();
			}
		});
		$('#back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({scrollTop: 0}, 1000);
			return false;
		});
	},
	init            : function () {
		themeApp.featuredMedia();
		themeApp.responsiveIframe();
		// themeApp.sidebarConfig();
		themeApp.highlighter();
		themeApp.backToTop();
		themeApp.searchForm();
	}
}

/*===========================
2. Initialization
==========================*/
$(document).ready(function () {
	themeApp.init();

	$('.post-content img').each(function (item) {
		var src = $(this).attr('src');
		$(this).wrap('<a href="' + src + '" class="mfp-zoom" style="display:block;"></a>');
	});
	$('.post-content').magnificPopup({
		delegate: 'a',
		type    : 'image'
	});
});