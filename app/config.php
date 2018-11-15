<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

	return [

		// +----------------------------------------------------------------------
		// | 应用设置
		// +----------------------------------------------------------------------

		// 应用调试模式
		'app_debug'           => true ,

		// 应用Trace
		'app_trace'           => false ,

		//后台页面构造器页面是否缓存
		'enable_static_cache' => 0 ,

		/*

		//email配置
		//邮件服务器
		'email_host'          => 'smtp.yeah.net' ,
		//邮件服务器端口
		'email_port'          => '25' ,
		//邮件用户名
		'email_username'      => '' ,
		//邮件用户登陆秘钥
		'email_password'      => '' ,
		//对方显示发件人
		'email_user'          => '来自iThink的邮件' ,
		*/

		// 扩展函数文件
		'extra_file_list'     => [
			THINK_PATH . 'helper' . EXT ,
			APP_PATH . 'function' . EXT ,
			APP_PATH . 'extend' . EXT ,
			APP_PATH . 'rule' . EXT ,
		] ,

		// 管理自定义模块时候，忽略的模块，即系统模块
		'system_module'       => [
			'admin' ,
			'install' ,
			//'doc' ,
			//'blog' ,
			'demo' ,
			'extra' ,
			'common' ,
		] ,

		'captcha'      => [
			// 验证码字符集合
			'codeSet'  => '0123456789' ,
			// 验证码字体大小(px)
			'fontSize' => 24 ,
			// 是否画混淆曲线
			'useCurve' => false ,

			// 验证码图片高度
			'imageH'   => 50 ,
			// 验证码图片宽度
			'imageW'   => 280 ,
			// 验证码位数
			'length'   => 4 ,
			// 验证成功后是否重置
			'reset'    => true ,
		] ,


		//分页配置
		'paginate'     => [
			'type'      => 'bootstrap' ,
			'var_page'  => 'page' ,
			'list_rows' => 50 ,
		] ,

		//模板元素映射表
		'elements_map' => [

			//form
			'form'               => \builder\elements\form\form::class ,
			'inlineCheckbox'     => \builder\elements\form\inlineCheckbox::class ,
			'blockCheckbox'      => \builder\elements\form\blockCheckbox::class ,
			'inlineRadio'        => \builder\elements\form\inlineRadio::class ,
			'blockRadio'         => \builder\elements\form\blockRadio::class ,
			'text'               => \builder\elements\form\text::class ,
			'linkage'            => \builder\elements\form\linkage::class ,
			'staticText'         => \builder\elements\form\staticText::class ,
			'password'           => \builder\elements\form\password::class ,
			'switchery'          => \builder\elements\form\switchery::class ,
			'uediter'            => \builder\elements\form\uediter::class ,
			'summernote'         => \builder\elements\form\summernote::class ,
			'singleSelect'       => \builder\elements\form\singleSelect::class ,
			'singleDate'         => \builder\elements\form\singleDate::class ,
			'betweenDate'        => \builder\elements\form\betweenDate::class ,
			'textarea'           => \builder\elements\form\textarea::class ,
			'uploadSingleImg'    => \builder\elements\form\uploadSingleImg::class ,
			'uploadSingleFile'   => \builder\elements\form\uploadSingleFile::class ,
			'uploadMultiImg'     => \builder\elements\form\uploadMultiImg::class ,
			'uploadMultiFile'    => \builder\elements\form\uploadMultiFile::class ,

			//table
			'staticTable'        => \builder\elements\table\staticTable::class ,
			'tr'                 => \builder\elements\table\tr::class ,
			'td'                 => \builder\elements\table\td::class ,
			'rowCheckbox'        => \builder\elements\table\rowCheckbox::class ,
			'select'             => \builder\elements\table\select::class ,
			'button'             => \builder\elements\table\button::class ,
			'switcher'           => \builder\elements\table\switcher::class ,
			'searchForm'         => \builder\elements\table\searchForm::class ,
			'searchFormCol'      => \builder\elements\table\searchFormCol::class ,
			'searchFormRadio'    => \builder\elements\table\searchFormRadio::class ,
			'searchFormCheckbox' => \builder\elements\table\searchFormCheckbox::class ,
			'searchFormText'     => \builder\elements\table\searchFormText::class ,
			'searchFormRange'    => \builder\elements\table\searchFormRange::class ,
			'searchFormDate'     => \builder\elements\table\searchFormDate::class ,
			'searchFormSelect'   => \builder\elements\table\searchFormSelect::class ,

			//frame
			'baseFrameWork'      => \builder\elements\frame\baseFrameWork::class ,
			'basicFrame'         => \builder\elements\frame\basicFrame::class ,
			'row'                => \builder\elements\frame\row::class ,
			'rowBlock'           => \builder\elements\frame\rowBlock::class ,
			'rowButton'          => \builder\elements\frame\rowButton::class ,
		] ,


		'admin_id'             => 1 ,
		'global_admin_role_id' => 1 ,

		'app_namespace'          => 'app' ,

		//默认没登陆的跳转页面
		'admin_none_login_index'          => 'admin/login/login' ,
		//默认登陆后的跳转页面
		'admin_login_index'          => 'admin/index/index' ,

		//默认头像
		//'default_profile_pic'    => '/static/image/default_pic.gif' ,
		'default_profile_pic'    => '/static/image/default-logo.jpg' ,
		//上传默认占位图
		'default_img'            => '/static/image/timg.jpg' ,


		// 应用模式状态
		'app_status'             => '' ,
		// 是否支持多模块
		'app_multi_module'       => true ,
		// 入口自动绑定模块
		'auto_bind_module'       => false ,
		// 注册的根命名空间
		'root_namespace'         => [] ,
		// 默认输出类型
		'default_return_type'    => 'html' ,
		// 默认AJAX 数据返回格式,可选json xml ...
		'default_ajax_return'    => 'json' ,
		// 默认JSONP格式返回的处理方法
		'default_jsonp_handler'  => 'jsonpReturn' ,
		// 默认JSONP处理方法
		'var_jsonp_handler'      => 'callback' ,
		// 默认时区
		'default_timezone'       => 'PRC' ,
		// 是否开启多语言
		'lang_switch_on'         => false ,
		// 默认全局过滤方法 用逗号分隔多个
		'default_filter'         => 'addslashes,htmlentities,htmlspecialchars' ,
		// 默认语言
		'default_lang'           => 'zh-cn' ,
		// 应用类库后缀
		'class_suffix'           => false ,
		// 控制器类后缀
		'controller_suffix'      => false ,

		// +----------------------------------------------------------------------
		// | 模块设置
		// +----------------------------------------------------------------------

		// 默认模块名
		'default_module'         => 'Admin' ,
		// 默认控制器名
		'default_controller'     => 'login' ,
		// 默认操作名
		'default_action'         => 'login' ,

		// 禁止访问模块
		'deny_module_list'       => ['common'] ,
		// 默认验证器
		'default_validate'       => '' ,
		// 默认的空控制器名
		'empty_controller'       => 'Error' ,
		// 操作方法后缀
		'action_suffix'          => '' ,
		// 自动搜索控制器
		'controller_auto_search' => false ,

		// +----------------------------------------------------------------------
		// | URL设置
		// +----------------------------------------------------------------------

		// PATHINFO变量名 用于兼容模式
		'var_pathinfo'           => 's' ,
		// 兼容PATH_INFO获取
		'pathinfo_fetch'         => [
			'ORIG_PATH_INFO' ,
			'REDIRECT_PATH_INFO' ,
			'REDIRECT_URL' ,
		] ,
		// pathinfo分隔符
		'pathinfo_depr'          => '/' ,
		// URL伪静态后缀
		'url_html_suffix'        => 'html' ,
		// URL普通方式参数 用于自动生成
		'url_common_param'       => false ,
		// URL参数方式 0 按名称成对解析 1 按顺序解析
		'url_param_type'         => 0 ,
		// 是否开启路由
		'url_route_on'           => true ,
		// 路由使用完整匹配
		'route_complete_match'   => false ,
		// 路由配置文件（支持配置多个）
		'route_config_file'      => [
			'route' ,
		] ,
		// 是否强制使用路由
		'url_route_must'         => false ,
		// 域名部署
		'url_domain_deploy'      => false ,
		// 域名根，如thinkphp.cn
		'url_domain_root'        => '' ,
		// 是否自动转换URL中的控制器和操作名
		'url_convert'            => true ,
		// 默认的访问控制器层
		'url_controller_layer'   => 'controller' ,
		// 表单请求类型伪装变量
		'var_method'             => '_method' ,
		// 表单ajax伪装变量
		'var_ajax'               => '_ajax' ,
		// 表单pjax伪装变量
		'var_pjax'               => '_pjax' ,
		// 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
		'request_cache'          => false ,
		// 请求缓存有效期
		'request_cache_expire'   => null ,
		// 全局请求缓存排除规则
		'request_cache_except'   => [] ,

		// +----------------------------------------------------------------------
		// | 模板设置
		// +----------------------------------------------------------------------

		'template'              => [
			// 模板引擎类型 支持 php think 支持扩展
			'type'         => 'Think' ,
			// 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写
			'auto_rule'    => 1 ,
			// 模板路径
			'view_path'    => '' ,
			// 模板后缀
			'view_suffix'  => 'php' ,
			// 模板文件名分隔符
			'view_depr'    => DS ,
			// 模板引擎普通标签开始标记
			'tpl_begin'    => '{' ,
			// 模板引擎普通标签结束标记
			'tpl_end'      => '}' ,
			// 标签库标签开始标记
			'taglib_begin' => '{' ,
			// 标签库标签结束标记
			'taglib_end'   => '}' ,
		] ,

		// 视图输出字符串内容替换
		'view_replace_str'      => [] ,
		// 默认跳转页面对应的模板文件
		'dispatch_success_tmpl' => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl' ,
		'dispatch_error_tmpl'   => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl' ,

		// +----------------------------------------------------------------------
		// | 异常及错误设置
		// +----------------------------------------------------------------------

		// 异常页面的模板文件
		//'exception_tmpl'        => APP_PATH . 'common' . DS . 'view' . DS . 'think_exception.php' ,
		'exception_tmpl'        => THINK_PATH . 'tpl' . DS . 'think_exception.tpl' ,

		//F:\localWeb\public_local14\thinkphp\tpl\think_exception.tpl
		//F:\localWeb\public_local14\public/../app/common\view\think_exception.php


		// 错误显示信息,非调试模式有效
		'error_message'         => '页面错误！请稍后再试～' ,
		// 显示错误信息
		'show_error_msg'        => false ,
		// 异常处理handle类 留空使用 \think\exception\Handle
		'exception_handle'      => '' ,

		// +----------------------------------------------------------------------
		// | 日志设置
		// +----------------------------------------------------------------------

		'log'   => [
			// 日志记录方式，内置 file socket 支持扩展
			'type'  => 'File' ,
			// 日志保存目录
			'path'  => LOG_PATH ,
			// 日志记录级别
			'level' => [] ,
		] ,

		// +----------------------------------------------------------------------
		// | Trace设置 开启 app_trace 后 有效
		// +----------------------------------------------------------------------
		'trace' => [
			// 内置Html Console 支持扩展
			'type' => 'Html' ,
		] ,

		// +----------------------------------------------------------------------
		// | 缓存设置
		// +----------------------------------------------------------------------

		'cache' => [
			// 驱动方式
			'type'   => 'File' ,
			// 缓存保存目录
			'path'   => CACHE_PATH ,
			// 缓存前缀
			'prefix' => '' ,
			// 缓存有效期 0表示永久缓存
			'expire' => 0 ,
		] ,

		// +----------------------------------------------------------------------
		// | 会话设置
		// +----------------------------------------------------------------------

		'session' => [
			'id'             => '' ,
			// SESSION_ID的提交变量,解决flash上传跨域
			'var_session_id' => '' ,
			// SESSION 前缀
			'prefix'         => 'think' ,
			// 驱动方式 支持redis memcache memcached
			'type'           => '' ,
			// 是否自动开启 SESSION
			'auto_start'     => true ,
		] ,

		// +----------------------------------------------------------------------
		// | Cookie设置
		// +----------------------------------------------------------------------
		'cookie'  => [
			// cookie 名称前缀
			'prefix'    => '' ,
			// cookie 保存时间
			'expire'    => 0 ,
			// cookie 保存路径
			'path'      => '/' ,
			// cookie 有效域名
			'domain'    => '' ,
			//  cookie 启用安全传输
			'secure'    => false ,
			// httponly设置
			'httponly'  => '' ,
			// 是否使用 setcookie
			'setcookie' => true ,
		] ,

	];
