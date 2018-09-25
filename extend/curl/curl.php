<?php

	namespace curl;

	class curl
	{
		//主配置，构造后发请求用
		private static $options = null;
		//默认配置
		private static $defaultOptions = null;
		//mem.72da.com:5110
		private static $host = null;
		//72da.com
		private static $TLD = null;
		//mem.72da.com
		private static $domain = null;
		//是否为手机代理
		private static $isMoible = false;
		//服务器返回的cookie保存文件
		private static $cookieFile = null;
		//自己定义的cookie字符，写到文件里
		private static $customCookie = '';
		//请求url
		private static $url = null;
		//是否为post请求
		private static $isPost = false;
		//上传文件地址和字段名
		private static $uploadFile = null;
		//get请求键值
		private static $getData = null;
		//post请求键值
		private static $postData = null;
		//登陆用户名
		private static $user = '';
		//代理地址127.0.0.1:8888
		private static $proxy = '';

		/*
		*
		 *
		 *
		 *公共请求方法
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
		 *
		 *
		 *
		 *
		 *
		 *
		 */

		public static function G()
		{
			$res = func_get_args();
			$res = self::G_($res[0]);

			return $res['content'];
		}

		public static function P()
		{
			$res = func_get_args();
			$res = self::P_($res[0]);

			return $res['content'];
		}

		public static function G_()
		{
			$prar = func_get_args();
			$prar[0]['method'] = 'get';
			if(isset($prar[0]['upload'])) unset($prar[0]['upload']);

			return self::doRequest($prar[0]);
		}

		public static function P_()
		{
			$prar = func_get_args();
			$prar[0]['method'] = 'post';

			return self::doRequest($prar[0]);
		}


		//获取cookie参数
		public static function getCookie($url, $user = '')
		{
			self::$url = $url;
			self::$user = $user;
			$cookieArr = [];
			self::_getHost();
			self::_getTLD();
			if(is_file(self::buildCookieFileName(self::$user, self::$host)))
			{
				$cookie = file_get_contents(self::buildCookieFileName(self::$user, self::$host));
				preg_match_all('/\d\s*(\S+)\s*(\S+)(?:$|\r|\n)/sm', $cookie, $result, PREG_SET_ORDER);
				foreach ($result as $k => $v) $cookieArr[$v[1]] = $v[2];
			}

			return $cookieArr;
		}

		//删除域名cookie
		public static function delCookieFile($url, $user = '')
		{
			self::$url = $url;
			self::$user = $user;
			self::_getHost();
			self::_getTLD();
			$res = true;

			if(is_file(self::buildCookieFileName(self::$user, self::$host)))
			{
				$res = unlink(self::buildCookieFileName(self::$user, self::$host));
				self::$TLD = self::$host = self::$url = null;
				self::$user = '';
			}

			return $res;
		}

		//保存图片
		public static function saveImg()
		{
			$prar = func_get_args();
			$prar[0]['method'] = 'get';
			if(isset($prar[0]['upload'])) unset($prar[0]['upload']);

			$result = self::doRequest($prar[0]);
			$bin = $result['content'];
			$path = isset($prar[0]['path']) ? $prar[0]['path'] : "./images/";
			$url = $prar[0]['url'];
			(!strrchr($url, ".") && ($fn = '.gif')) || ($fn = strrchr($url, "."));
			isset($prar[0]['suffix']) && $fn = $prar[0]['suffix'];
			$fileName = date("Ymd") . '/' . date("YmdHis") . str_replace('.', '', uniqid('', 1)) . $fn;
			$path .= $fileName;

			//检测文件夹在不在，不在就创建，创建好以后保存图
			!is_dir(dirname($path)) && mkdir(dirname($path), 0777, 1);

			//保存成功返回图片名，失败返回false
			return (file_put_contents($path, $bin)) ? $fileName : false;
		}

		//输出抓取配置
		public static function getOption($k = '')
		{
			return isset(self::$options[$k]) ? self::$options[$k] : self::$options;
		}

		/*
		 *
		 * 工具方法
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
		 *
		 *
		 *
		 * */



		//设置cookie参数
		private static function _setCookie()
		{
			self::$cookieFile = self::buildCookieFileName(self::$user, self::$host);
			!is_dir(dirname(self::$cookieFile)) && mkdir(dirname(self::$cookieFile), 0777, 1);
			self::setOption(array(CURLOPT_COOKIEJAR => self::$cookieFile));

			self::setOption(array(CURLOPT_COOKIEFILE => self::$cookieFile))
			&& file_put_contents(self::$cookieFile, self::$customCookie, FILE_APPEND | LOCK_EX);;
		}

		//整理配置
		private static function _init(array $config)
		{
			self::_initParams($config);
			self::_initOptions();
			self::_getHost();
			self::_getTLD();
			self::_getDomain();
			self::_initConfig($config);
			self::_setCookie();
			self::_setAgent();
			self::_setReferer();
			self::_integrate();
		}

		//初始化配置
		private static function _initConfig($config)
		{
			foreach ($config as $k1 => $v1)
			{
				switch (strtolower($k1))
				{
					//cookie写入文件
					case 'cookie' :
					{
						$c = '';
						if(is_array($v1))
						{
							//.youku.com    TRUE    /   FALSE   0   ykss    1184a258e4120f016c781fd5
							foreach ($v1 as $k2 => $v2) $c .=   self::$domain . "\tTRUE\t/\tFALSE\t0\t" . $k2 . "\t" . $v2 . "\r\n";
						}
						elseif(is_string($v1))
						{
							preg_match_all('#([^\s;]+)\s*=\s*([^;\s]+)#', $v1, $res, PREG_SET_ORDER);
							foreach ($res as $k => $v) $c .=  self::$domain . "\tTRUE\t/\tFALSE\t0\t" . $v[1] . "\t" . $v[2] . "\r\n";
						}
						self::$customCookie = $c;
					}
						break;
					case 'data' :
					{
						self::$getData = $v1;
					}
						break;
					case 'get_data' :
					{
						self::$getData = $v1;
					}
						break;
					case 'post_data' :
					{
						self::$postData = $v1;
					}
						break;
					case 'method' :
					{
						self::$isPost = strtolower($v1) == 'post' ? 1 : 0;
					}
						break;
					case 'ismoible' :
					{
						self::$isMoible = $v1;
					}
						break;
					case 'options' :
					{
						//option里的header
						$heads = [];
						if(isset($v1[CURLOPT_HTTPHEADER]))
						{
							$heads = $v1[CURLOPT_HTTPHEADER];
						}
						unset($v1[CURLOPT_HTTPHEADER]);

						//已经设置过的header
						$heads_ = self::getOption(CURLOPT_HTTPHEADER);
						self::setOption(array(CURLOPT_HTTPHEADER => array_merge($heads, $heads_)));
						self::setOption($v1);
					}
						break;
					case 'upload' :
					{
						self::$uploadFile = $v1;
					}
						break;
					case 'proxy' :
					{
						self::$proxy = $v1;
					}
						break;
					case 'headers' :
					{
						if(is_array($v1))
						{
							$heads = self::getOption(CURLOPT_HTTPHEADER);
							self::setOption(array(CURLOPT_HTTPHEADER => array_merge($heads, $v1)));
						}
						elseif(is_string($v1))
						{
							$heads_ = [];
							$result = preg_split('/[\r\n]/im', $v1);
							foreach ($result as $k => $v) (trim($v) && preg_match('/^[^:]+\s*:\s*\S+/im', $v1)) && $heads_[] = trim($v);
							$heads = self::getOption(CURLOPT_HTTPHEADER);
							count($heads) && self::setOption(array(CURLOPT_HTTPHEADER => array_merge($heads, $heads_)));
						}
					}
						break;
					case 'forge_ip' :
					{
						if(is_array($v1))
						{
							$heads = self::getOption(CURLOPT_HTTPHEADER);
							self::setOption(array(CURLOPT_HTTPHEADER => array_merge($heads, $v1)));
						}
						elseif(is_string($v1))
						{
							$heads = self::getOption(CURLOPT_HTTPHEADER);
							self::setOption(array(CURLOPT_HTTPHEADER => array_merge($heads, ['X-FORWARDED-FOR:' . $v1])));
						}
					}
						break;
				}
			}
		}

		//整合配置
		private static function _integrate()
		{
			//设置请求类型
			self::setOption(array(CURLOPT_POST => self::$isPost));


			//设置代理服务器
			isset(self::$proxy['url']) && preg_match_all('%[^/]+:\d{2,5}%im', self::$proxy['url'], $result, PREG_SET_ORDER);
			if(isset($result[0][0]))
			{
				//设置了url没设置类型，默认使用http
				!isset(self::$proxy['type']) && (self::$proxy['type'] = 'http');

				//不是CURLPROXY_HTTP (默认值) 就是CURLPROXY_SOCKS5
				strtolower(self::$proxy['type']) == 'http' ? self::setOption(array(CURLOPT_PROXYTYPE => CURLPROXY_HTTP)) : self::setOption(array(CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5));

				//CURLAUTH_BASIC和CURLAUTH_NTLM
				self::setOption(array(CURLOPT_PROXYAUTH => CURLAUTH_BASIC));

				//统一在地址里设置
				//self::setOption(array(CURLOPT_PROXYPORT => 8080));

				//启用时会通过HTTP代理来传输。
				self::setOption(array(CURLOPT_HTTPPROXYTUNNEL => 1));

				//一个用来连接到代理的"[username]:[password]"格式的字符串,传递一个形如[username]:[password] 格式的字符串去连接HTTP代理。。
				//self::setOption(array(CURLOPT_PROXYUSERPWD => ''));

				//代理服务器地址
				self::setOption(array(CURLOPT_PROXY => $result[0][0]));
			}

			//get请求整合参数
			if(!self::$isPost)
			{
				//数组形式参数
				if(is_array(self::$getData))
				{
					self::$url = self::buildParameter(self::$url, self::$getData);
				}
				//键值对形式参数
				elseif(is_string(self::$getData))
				{
					preg_match_all('/([^=&]+?(?<=\b|&))\s*=\s*([^=&]+?(?<=\b|&))/', self::$getData, $result, PREG_SET_ORDER);
					$d = [];
					foreach ($result as $k => $v) $d[$result[$k][1]] = $result[$k][2];
					self::$url = self::buildParameter(self::$url, $d);
				}
			}
			else //post请求整合参数
			{
				//数组形式参数
				if(is_array(self::$getData))
				{
					self::$url = self::buildParameter(self::$url, self::$getData);
				}
				//键值对形式参数
				elseif(is_string(self::$getData))
				{
					preg_match_all('/([^=&]+?(?<=\b|&))\s*=\s*([^=&]+?(?<=\b|&))/', self::$getData, $result, PREG_SET_ORDER);
					$d = [];
					foreach ($result as $k => $v) $d[$result[$k][1]] = $result[$k][2];
					self::$url = self::buildParameter(self::$url, $d);
				}

				$tempData = [];
				//数组形式参数
				if(is_array(self::$postData))
				{
					//如果有文件上传
					if(self::$uploadFile)
					{
						$file = new \CURLFile(self::$uploadFile['path']);
						self::$postData[self::$uploadFile['name']] = $file;
					}
					$tempData = self::$postData;
				}
				//键值对形式参数
				elseif(is_string(self::$postData))
				{
					preg_match_all('/([^=&]+?(?<=\b|&))\s*=\s*([^=&]+?(?<=\b|&))/', self::$postData, $result, PREG_SET_ORDER);
					$d = [];
					foreach ($result as $k => $v) $d[$result[$k][1]] = $result[$k][2];
					//如果有文件上传
					if(self::$uploadFile)
					{
						$file = new \CURLFile(self::$uploadFile['path']);
						$d[self::$uploadFile['name']] = $file;
					}
					$tempData = $d;
				}
				//设置参数
				self::setOption(array(CURLOPT_POSTFIELDS => $tempData));
			}
			//设置请求地址
			self::setOption(array(CURLOPT_URL => self::$url));
		}

		//核心请求方法
		private static function doRequest($config)
		{
			self::_init($config);
			//print_r(self::getOption());exit;;

			//如果未设置url返回 - 1
			if(empty(self::$options[CURLOPT_URL])) return -1;
			$ch = curl_init();
			//导入当前抓取配置，未设置使用默认配置
			curl_setopt_array($ch, self::$options);

			$result['content'] = curl_exec($ch);
			$result['info'] = curl_getinfo($ch);
			$result['cookie_file'] = self::$cookieFile;
			$result['options'] = self::$options;

			curl_close($ch);

			//所有抓取配置恢复默认
			self::_regainOptions();

			return $result;
		}

		//如果不设置referer，自动设置referer为当前网站域
		private static function _setReferer()
		{
			if(!self::getOption(CURLOPT_REFERER)) self::setOption(array(CURLOPT_REFERER => self::$host));
		}

		//设置抓取配置
		private static function setOption(array $options)
		{
			foreach ($options as $k => $v) self::$options[$k] = $v;
			return true;
		}

		//初始化url
		private static function _initParams($config)
		{
			self::$url = $config['url'];
			isset($config['user']) && self::$user = trim($config['user']);
		}

		//初始化请求代理
		private static function _setAgent()
		{
			if(!self::getOption(CURLOPT_USERAGENT))
			{
				$agent = self::$isMoible ? 'Mozilla/5.0 (iPad; CPU OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53' : 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36';
				self::setOption(array(CURLOPT_USERAGENT => $agent));
			}
		}

		//请求完成恢复默认配置
		private static function _regainOptions()
		{
			self::$options = self::$defaultOptions;
			self::$host = null;
			self::$TLD = null;
			self::$isMoible = false;
			self::$cookieFile = null;
			self::$url = null;
			self::$isPost = false;
			self::$uploadFile = false;
			self::$user = '';
		}

		//匹配出url里的host
		private static function _getHost()
		{
			preg_match_all("#(?i)(?:https?://|^)([^/]+)#", self::$url, $res);
			self::$host = $res[1][0];
		}

		//匹配出url里的顶级域名
		private static function _getTLD()
		{
			preg_match_all("#[^.]+\.[^.]+$#", self::$host, $res);
			self::$TLD = $res[0][0];
		}
		//获取域名，不要端口
		private static function _getDomain()
		{
			preg_match_all('/^[^:]+/im', self::$host, $result);
			self::$domain = $result[0][0];
		}

		//为get请求url加参数
		private static function buildParameter($url, $parameters = array())
		{
			$urlQuery = parse_url($url);
			//print_r($urlQuery);exit;;
			$parStr = '?';
			$tmp = array();
			foreach ($parameters as $k => $v) $tmp[] = $k . '=' . $v;
			isset($urlQuery['query']) && ($tempArr = explode('&', $urlQuery['query'])) && ($tmp = array_merge($tempArr, $tmp));
			foreach ($tmp as $k => $v) $parStr .= $v . "&";
			$port = isset($urlQuery['port']) ? ':' . $urlQuery['port'] : '';
			$path = isset($urlQuery['path']) ? $urlQuery['path'] : '';
			$res = $urlQuery['scheme'] . '://' . $urlQuery['host'] . $port . $path . $parStr;

			return substr($res, 0, -1);
		}


		//构造cookie文件地址
		private static function buildCookieFileName($user, $tld)
		{
			return __DIR__ . '/cookie/cookie_' . substr(md5($user), 0, 12) . '_' . strtr($tld, [
				":" => "-",
				"." => "#",
			]) . '.txt';
		}

		//解析url里参数为关联数组
		private static function urlParams($url, $tmp = [])
		{
			$urlQuery = parse_url($url);
			$parArr = $tempArr = array();
			isset($urlQuery['query']) && ($tempArr = explode('&', $urlQuery['query']));
			foreach ($tempArr as $k => $v)
			{
				$t = explode('=', $v);
				$parArr[$t[0]] = $t[1];
			}

			return array_merge($tmp, $parArr);
		}

		/*
		 *
		 *
		 *
		 *
		 * 初始化抓取配置
		 *
		 *
		 *
		 *
		 *
		 *
		 * */

		private static function _initOptions()
		{
			self::$defaultOptions = self::$options = array(

				/*
				 *
				 *
				 *
				 *
				 * 对于下面的这些option，value应该被设置成 bool
				 *
				 *
				 *
				 *
				 *
				 *
				 * */

				//TRUE 时将根据 Location: 重定向时，自动设置 header 中的Referer:信息。
				CURLOPT_AUTOREFERER => 1,

				//设为 TRUE ，将在启用 CURLOPT_RETURNTRANSFER 时，返回原生的（Raw）输出。  从 PHP 5.1.3 开始，此选项不再有效果：使用 CURLOPT_RETURNTRANSFER 后总是会返回原生的（Raw）内容。
				CURLOPT_BINARYTRANSFER => 0,

				//设为 TRUE 时将开启新的一次 cookie 会话。它将强制 libcurl 忽略之前会话时存的其他 cookie。 libcurl 在默认状况下无论是否为会话，都会储存、加载所有 cookie。会话 cookie 是指没有过期时间，只存活在会话之中。
				CURLOPT_COOKIESESSION => 0,

				//TRUE 将在安全传输时输出 SSL 证书信息到 STDERR。  在 cURL 7.19.1 中添加。 PHP 5.3.2 后有效。 需要开启 CURLOPT_VERBOSE 才有效。
				//CURLOPT_CERTINFO                => '',

				//TRUE 将让库执行所有需要的代理、验证、连接过程，但不传输数据。此选项用于 HTTP、SMTP 和 POP3。  在 7.15.2 中添加。 PHP 5.5.0 起有效。
				//CURLOPT_CONNECT_ONLY            => '',

				//启用时将Unix的换行符转换成回车换行符。
				//CURLOPT_CRLF                    => '',

				//TRUE 会启用一个全局的DNS缓存。此选项非线程安全的，默认已开启。
				//CURLOPT_DNS_USE_GLOBAL_CACHE    => '',

				//当 HTTP 状态码大于等于 400，TRUE 将将显示错误详情。 默认情况下将返回页面，忽略 HTTP 代码。
				//CURLOPT_FAILONERROR             => '',

				//TRUE 开启 TLS False Start （一种 TLS 握手优化方式）  cURL 7.42.0 中添加。自 PHP 7.0.7 起有效。
				//CURLOPT_SSL_FALSESTART          => '',

				//TRUE 时，会尝试获取远程文档中的修改时间信息。 信息可通过curl_getinfo()函数的CURLINFO_FILETIME 选项获取。
				//CURLOPT_FILETIME                => '',

				//TRUE 时将会根据服务器返回 HTTP 头中的 "Location: " 重定向。（注意：这是递归的，"Location: " 发送几次就重定向几次，除非设置了 CURLOPT_MAXREDIRS，限制最大重定向次数。）。
				//CURLOPT_FOLLOWLOCATION          => '',

				//TRUE 在完成交互以后强制明确的断开连接，不能在连接池中重用。
				//CURLOPT_FORBID_REUSE            => '',

				//TRUE 强制获取一个新的连接，而不是缓存中的连接。
				//CURLOPT_FRESH_CONNECT           => '',

				//TRUE 时，当 FTP 下载时，使用 EPRT (和 LPRT)命令。 设置为 FALSE 时禁用 EPRT 和 LPRT，仅仅使用PORT 命令。
				//CURLOPT_FTP_USE_EPRT            => '',

				//TRUE 时，在FTP传输过程中，回到 PASV 模式前，先尝试 EPSV 命令。设置为 FALSE 时禁用 EPSV。
				//CURLOPT_FTP_USE_EPSV            => '',

				//TRUE 时，当 ftp 操作不存在的目录时将创建它。
				//CURLOPT_FTP_CREATE_MISSING_DIRS => '',

				//TRUE 为追加写入文件，而不是覆盖。
				//CURLOPT_FTPAPPEND               => '',

				//TRUE 时禁用 TCP 的 Nagle 算法，就是减少网络上的小包数量。  PHP 5.2.1 有效，编译时需要 libcurl 7.11.2 及以上。
				//CURLOPT_TCP_NODELAY             => '',

				//CURLOPT_TRANSFERTEXT 的别名。
				//CURLOPT_FTPASCII                => '',

				//TRUE 时只列出 FTP 目录的名字。
				//CURLOPT_FTPLISTONLY             => '',

				//启用时会将头文件的信息作为数据流输出。
				CURLOPT_HEADER => 0,

				//TRUE 时追踪句柄的请求字符串。  从 PHP 5.1.3 开始可用。CURLINFO_ 的前缀是有意的(intentional)。
				//CURLINFO_HEADER_OUT             => '',

				//TRUE 时会设置 HTTP 的 method 为 GET，由于默认是 GET，所以只有 method 被修改时才需要这个选项。
				//CURLOPT_HTTPGET                 => '',

				//TRUE 会通过指定的 HTTP 代理来传输。
				//CURLOPT_HTTPPROXYTUNNEL         => '',

				//TRUE 时将完全静默，无论是何 cURL 函数。  在 cURL 7.15.5 中移出（可以使用 CURLOPT_RETURNTRANSFER 作为代替）
				//CURLOPT_MUTE                    => '',

				//TRUE 时，在连接建立时，访问~/.netrc文件获取用户名和密码来连接远程站点。
				//CURLOPT_NETRC                   => '',

				//TRUE 时将不输出 BODY 部分。同时 Mehtod 变成了 HEAD。修改为 FALSE 时不会变成 GET。
				//CURLOPT_NOBODY                  => '',

				//TRUE 时关闭 cURL 的传输进度。 PHP 默认自动设置此选项为 TRUE，只有为了调试才需要改变设置。
				//CURLOPT_NOPROGRESS              => '',


				//TRUE 时忽略所有的 cURL 传递给 PHP 进行的信号。在 SAPI 多线程传输时此项被默认启用，所以超时选项仍能使用。  cURL 7.10时被加入。
				//CURLOPT_NOSIGNAL                => '',

				//TRUE 不处理 dot dot sequences （即 ../ ）  cURL 7.42.0 时被加入。 PHP 7.0.7 起有效。
				//CURLOPT_PATH_AS_IS              => '',

				//TRUE 则等待 pipelining/multiplexing。  cURL 7.43.0 时被加入。 PHP 7.0.7 起有效。
				//CURLOPT_PIPEWAIT                => '',

				//TRUE 时会发送 POST 请求，类型为：application/x-www-form-urlencoded，是 HTML 表单提交时最常见的一种。
				//CURLOPT_POST                    => '',

				//TRUE 时允许 HTTP 发送文件。要被 PUT 的文件必须在 CURLOPT_INFILE和CURLOPT_INFILESIZE 中设置。
				//CURLOPT_PUT                     => '',

				//TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
				CURLOPT_RETURNTRANSFER => 1,

				//TRUE 禁用 @ 前缀在 CURLOPT_POSTFIELDS 中发送文件。 意味着 @ 可以在字段中安全得使用了。 可使用 CURLFile 作为上传的代替。  PHP 5.5.0 中添加，默认值 FALSE。 PHP 5.6.0 改默认值为 TRUE。. PHP 7 删除了此选项， 必须使用 CURLFile interface 来上传文件。
				//CURLOPT_SAFE_UPLOAD             => '',

				//TRUE 开启，收到首包(first packet)后发送初始的响应(initial response)。  cURL 7.31.10 中添加，自 PHP 7.0.7 起有效。
				//CURLOPT_SASL_IR                 => '',

				//FALSE 禁用 SSL 握手中的 ALPN (如果 SSL 后端的 libcurl 内建支持) 用于协商到 http2。  cURL 7.36.0 中增加， PHP 7.0.7 起有效。
				//CURLOPT_SSL_ENABLE_ALPN         => '',

				//FALSE 禁用 SSL 握手中的 NPN(如果 SSL 后端的 libcurl 内建支持)，用于协商到 http2。  cURL 7.36.0 中增加， PHP 7.0.7 起有效。
				//CURLOPT_SSL_ENABLE_NPN          => '',

				//FALSE 禁止 cURL 验证对等证书（peer's certificate）。要验证的交换证书可以在 CURLOPT_CAINFO 选项中设置，或在 CURLOPT_CAPATH中设置证书目录。  自cURL 7.10开始默认为 TRUE。从 cURL 7.10开始默认绑定安装。
				CURLOPT_SSL_VERIFYPEER => '',

				//TRUE 验证证书状态。  cURL 7.41.0 中添加， PHP 7.0.7 起有效。
				//CURLOPT_SSL_VERIFYSTATUS        => '',

				//TRUE 开启 TCP Fast Open。  cURL 7.49.0 中添加， PHP 7.0.7 起有效。
				//CURLOPT_TCP_FASTOPEN            => '',

				//TRUE 不发送 TFTP 的 options 请求。  自 cURL 7.48.0 添加， PHP 7.0.7 起有效。
				//CURLOPT_TFTP_NO_OPTIONS         => '',

				//TRUE 对 FTP 传输使用 ASCII 模式。对于LDAP，它检索纯文本信息而非 HTML。在 Windows 系统上，系统不会把 STDOUT 设置成二进制 模式。
				//CURLOPT_TRANSFERTEXT            => '',

				//TRUE 在使用CURLOPT_FOLLOWLOCATION重定向 header 中的多个 location 时继续发送用户名和密码信息，哪怕主机名已改变。
				//CURLOPT_UNRESTRICTED_AUTH       => '',

				//TRUE 准备上传。
				//CURLOPT_UPLOAD                  => '',

				//TRUE 会输出所有的信息，写入到STDERR，或在CURLOPT_STDERR中指定的文件。
				//CURLOPT_VERBOSE                 => '',


				/*
				 *
				 *
				 *
				 *
				 * 对于下面的这些option，value应该被设置成 integer
				 *
				 *
				 *
				 *
				 *
				 *
				 * */

				//每次读入的缓冲的尺寸。当然不保证每次都会完全填满这个尺寸。  在cURL 7.10中被加入。
				//CURLOPT_BUFFERSIZE              => '',

				//CURLCLOSEPOLICY_* 中的一个。
				//CURLOPT_CLOSEPOLICY             => '',

				//在尝试连接时等待的秒数。设置为0，则无限等待。
				CURLOPT_CONNECTTIMEOUT => 8,

				//尝试连接等待的时间，以毫秒为单位。设置为0，则无限等待。 如果 libcurl 编译时使用系统标准的名称解析器（ standard system name resolver），那部分的连接仍旧使用以秒计的超时解决方案，最小超时时间还是一秒钟。  在 cURL 7.16.2 中被加入。从 PHP 5.2.3 开始可用。
				//CURLOPT_CONNECTTIMEOUT_MS       => '',

				//设置在内存中缓存 DNS 的时间，默认为120秒（两分钟）。
				//CURLOPT_DNS_CACHE_TIMEOUT       => '',

				//超时预计： 100毫秒内的 continue 响应 默认为 1000 毫秒。  cURL 7.36.0 中添加，自 PHP 7.0.7 有效。
				//CURLOPT_EXPECT_100_TIMEOUT_MS   => '',

				//FTP验证方式（启用的时候）：CURLFTPAUTH_SSL (首先尝试SSL)，CURLFTPAUTH_TLS (首先尝试TLS)或CURLFTPAUTH_DEFAULT (让cURL 自个儿决定)。  在 cURL 7.12.2 中被加入。
				//CURLOPT_FTPSSLAUTH              => '',

				//How to deal with headers. One of the following constants: CURLHEADER_UNIFIED: the headers specified in CURLOPT_HTTPHEADER will be used in requests both to servers and proxies. With this option enabled, CURLOPT_PROXYHEADER will not have any effect.  CURLHEADER_SEPARATE: makes CURLOPT_HTTPHEADER headers only get sent to a server and not to a proxy. Proxy headers must be set with CURLOPT_PROXYHEADER to get used. Note that if a non-CONNECT request is sent to a proxy, libcurl will send both server headers and proxy headers. When doing CONNECT, libcurl will send CURLOPT_PROXYHEADER headers only to the proxy and then CURLOPT_HTTPHEADER headers only to the server.   Defaults to CURLHEADER_SEPARATE as of cURL 7.42.1, and CURLHEADER_UNIFIED before.   Added in cURL 7.37.0. Available since PHP 7.0.7.
				//CURLOPT_HEADEROPT               => '',

				//CURL_HTTP_VERSION_NONE (默认值，让 cURL 自己判断使用哪个版本)，CURL_HTTP_VERSION_1_0 (强制使用 HTTP/1.0)或CURL_HTTP_VERSION_1_1 (强制使用 HTTP/1.1)。
				//CURLOPT_HTTP_VERSION            => '',

				//使用的 HTTP 验证方法。选项有： CURLAUTH_BASIC、 CURLAUTH_DIGEST、 CURLAUTH_GSSNEGOTIATE、 CURLAUTH_NTLM、 CURLAUTH_ANY和 CURLAUTH_ANYSAFE。 可以使用 | 位域(OR)操作符结合多个值，cURL 会让服务器选择受支持的方法，并选择最好的那个。 CURLAUTH_ANY是 CURLAUTH_BASIC | CURLAUTH_DIGEST | CURLAUTH_GSSNEGOTIATE | CURLAUTH_NTLM 的别名。 CURLAUTH_ANYSAFE 是 CURLAUTH_DIGEST | CURLAUTH_GSSNEGOTIATE | CURLAUTH_NTLM 的别名。
				//CURLOPT_HTTPAUTH                => '',

				//希望传给远程站点的文件尺寸，字节(byte)为单位。 注意无法用这个选项阻止 libcurl 发送更多的数据，确切发送什么取决于 CURLOPT_READFUNCTION。
				//CURLOPT_INFILESIZE              => '',

				//传输速度，每秒字节（bytes）数，根据CURLOPT_LOW_SPEED_TIME秒数统计是否因太慢而取消传输。
				//CURLOPT_LOW_SPEED_LIMIT         => '',

				//当传输速度小于CURLOPT_LOW_SPEED_LIMIT时(bytes/sec)，PHP会判断是否因太慢而取消传输。
				//CURLOPT_LOW_SPEED_TIME          => '',

				//允许的最大连接数量。达到限制时，会通过CURLOPT_CLOSEPOLICY决定应该关闭哪些连接。
				//CURLOPT_MAXCONNECTS             => '',

				//指定最多的 HTTP 重定向次数，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的。
				//CURLOPT_MAXREDIRS               => '',

				//用来指定连接端口。
				//CURLOPT_PORT                    => '',

				//位掩码， 1 (301 永久重定向), 2 (302 Found) 和 4 (303 See Other) 设置 CURLOPT_FOLLOWLOCATION 时，什么情况下需要再次 HTTP POST 到重定向网址。  cURL 7.19.1 中添加，PHP 5.3.2 开始可用。
				//CURLOPT_POSTREDIR               => '',

				//CURLPROTO_*的位掩码。启用时，会限制 libcurl 在传输过程中可使用哪些协议。 这将允许你在编译libcurl时支持众多协议，但是限制只用允许的子集。默认 libcurl 将使用所有支持的协议。
				// 参见CURLOPT_REDIR_PROTOCOLS。
				// 可用的协议选项为： CURLPROTO_HTTP、 CURLPROTO_HTTPS、 CURLPROTO_FTP、 CURLPROTO_FTPS、 CURLPROTO_SCP、 CURLPROTO_SFTP、 CURLPROTO_TELNET、 CURLPROTO_LDAP、 CURLPROTO_LDAPS、 CURLPROTO_DICT、 CURLPROTO_FILE、 CURLPROTO_TFTP、 CURLPROTO_ALL。 在 cURL 7.19.4 中被加入。
				//CURLOPT_PROTOCOLS               => '',

				//HTTP 代理连接的验证方式。使用在CURLOPT_HTTPAUTH中的位掩码。 当前仅仅支持 CURLAUTH_BASIC和CURLAUTH_NTLM。  在 cURL 7.10.7 中被加入。
				//CURLOPT_PROXYAUTH               => '',

				//代理服务器的端口。端口也可以在CURLOPT_PROXY中设置。
				//CURLOPT_PROXYPORT               => '',

				//可以是 CURLPROXY_HTTP (默认值) CURLPROXY_SOCKS4、 CURLPROXY_SOCKS5、 CURLPROXY_SOCKS4A 或 CURLPROXY_SOCKS5_HOSTNAME。  在 cURL 7.10 中被加入。
				//CURLOPT_PROXYTYPE               => '',

				//CURLPROTO_* 值的位掩码。如果被启用，位掩码会限制 libcurl 在 CURLOPT_FOLLOWLOCATION开启时，使用的协议。 默认允许除 FILE 和 SCP 外所有协议。 这和 7.19.4 前的版本无条件支持所有支持的协议不同。关于协议常量，请参照CURLOPT_PROTOCOLS。  在 cURL 7.19.4 中被加入。
				//CURLOPT_REDIR_PROTOCOLS         => '',

				//在恢复传输时，传递字节为单位的偏移量（用来断点续传）。
				//CURLOPT_RESUME_FROM             => '',

				//Set SSL behavior options, which is a bitmask of any of the following constants: CURLSSLOPT_ALLOW_BEAST: do not attempt to use any workarounds for a security flaw in the SSL3 and TLS1.0 protocols.  CURLSSLOPT_NO_REVOKE: disable certificate revocation checks for those SSL backends where such behavior is present.   Added in cURL 7.25.0. Available since PHP 7.0.7.
				//CURLOPT_SSL_OPTIONS             => '',

				//设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。译者注：公用名(Common Name)一般来讲就是填写你将要申请SSL证书的域名 (domain)或子域名(sub domain)。 设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。 0 为不检查名称。 在生产环境中，这个值应该是 2（默认值）。  值 1 的支持在 cURL 7.28.1 中被删除了。
				CURLOPT_SSL_VERIFYHOST => '',

				//CURL_SSLVERSION_DEFAULT (0), CURL_SSLVERSION_TLSv1 (1), CURL_SSLVERSION_SSLv2 (2), CURL_SSLVERSION_SSLv3 (3), CURL_SSLVERSION_TLSv1_0 (4), CURL_SSLVERSION_TLSv1_1 (5) ， CURL_SSLVERSION_TLSv1_2 (6) 中的其中一个。 你最好别设置这个值，让它使用默认值。 设置为 2 或 3 比较危险，在 SSLv2 和 SSLv3 中有弱点存在。
				//CURLOPT_SSLVERSION              => '',

				//设置 stream weight 数值 ( 1 和 256 之间的数字).  cURL 7.46.0 中添加，自 PHP 7.0.7 起有效。
				//CURLOPT_STREAM_WEIGHT           => '',

				//设置如何对待 CURLOPT_TIMEVALUE。 使用 CURL_TIMECOND_IFMODSINCE，仅在页面 CURLOPT_TIMEVALUE 之后修改，才返回页面。没有修改则返回 "304 Not Modified" 头，假设设置了 CURLOPT_HEADER 为 TRUE。CURL_TIMECOND_IFUNMODSINCE则起相反的效果。 默认为 CURL_TIMECOND_IFMODSINCE。
				//CURLOPT_TIMECONDITION           => '',

				//允许 cURL 函数执行的最长秒数。
				CURLOPT_TIMEOUT => 8,

				//设置cURL允许执行的最长毫秒数。 如果 libcurl 编译时使用系统标准的名称解析器（ standard system name resolver），那部分的连接仍旧使用以秒计的超时解决方案，最小超时时间还是一秒钟。  在 cURL 7.16.2 中被加入。从 PHP 5.2.3 起可使用。
				//CURLOPT_TIMEOUT_MS              => '',

				//秒数，从 1970年1月1日开始。这个时间会被 CURLOPT_TIMECONDITION使。默认使用CURL_TIMECOND_IFMODSINCE。
				//CURLOPT_TIMEVALUE               => '',

				//如果下载速度超过了此速度(以每秒字节数来统计) ，即传输过程中累计的平均数，传输就会降速到这个参数的值。默认不限速。  cURL 7.15.5 中添加， PHP 5.4.0 有效。
				//CURLOPT_MAX_RECV_SPEED_LARGE    => '',

				//如果上传的速度超过了此速度(以每秒字节数来统计)，即传输过程中累计的平均数 ，传输就会降速到这个参数的值。默认不限速。  cURL 7.15.5 中添加， PHP 5.4.0 有效。
				//CURLOPT_MAX_SEND_SPEED_LARGE    => '',

				//A bitmask consisting of one or more of CURLSSH_AUTH_PUBLICKEY, CURLSSH_AUTH_PASSWORD, CURLSSH_AUTH_HOST, CURLSSH_AUTH_KEYBOARD. Set to CURLSSH_AUTH_ANY to let libcurl pick one.  cURL 7.16.1 中添加。
				//CURLOPT_SSH_AUTH_TYPES          => '',

				//允许程序选择想要解析的 IP 地址类别。只有在地址有多种 ip 类别的时候才能用，可以的值有： CURL_IPRESOLVE_WHATEVER、 CURL_IPRESOLVE_V4、 CURL_IPRESOLVE_V6，默认是 CURL_IPRESOLVE_WHATEVER。  cURL 7.10.8 中添加。
				//CURLOPT_IPRESOLVE               => '',

				//告诉 curl 使用哪种方式来获取 FTP(s) 服务器上的文件。可能的值有： CURLFTPMETHOD_MULTICWD、 CURLFTPMETHOD_NOCWD 和 CURLFTPMETHOD_SINGLECWD。  cURL 7.15.1 中添加， PHP 5.3.0 起有效。
				//CURLOPT_FTP_FILEMETHOD          => '',


				/*
				 *
				 *
				 *
				 *
				 * 对于下面的这些option，value应该被设置成 string
				 *
				 *
				 *
				 *
				 *
				 *
				 * */


				//一个保存着1个或多个用来让服务端验证的证书的文件名。这个参数仅仅在和CURLOPT_SSL_VERIFYPEER一起使用时才有意义。 .  可能需要绝对路径。
				//CURLOPT_CAINFO                  => '',

				//一个保存着多个CA证书的目录。这个选项是和CURLOPT_SSL_VERIFYPEER一起使用的。
				//CURLOPT_CAPATH                  => '',

				//设定 HTTP 请求中"Cookie: "部分的内容。多个 cookie 用分号分隔，分号后带一个空格(例如， "fruit=apple; colour=red")。
				CURLOPT_COOKIE => '',

				//包含 cookie 数据的文件名，cookie 文件的格式可以是 Netscape 格式，或者只是纯 HTTP 头部风格，存入文件。如果文件名是空的，不会加载 cookie，但 cookie 的处理仍旧启用。
				CURLOPT_COOKIEFILE => '',

				//连接结束后，比如，调用 curl_close 后，保存 cookie 信息的文件。
				CURLOPT_COOKIEJAR => '',

				//HTTP 请求时，使用自定义的 Method 来代替"GET"或"HEAD"。对 "DELETE" 或者其他更隐蔽的 HTTP 请求有用。 有效值如 "GET"，"POST"，"CONNECT"等等；也就是说，不要在这里输入整行 HTTP 请求。例如输入"GET /index.html HTTP/1.0\r\n\r\n"是不正确的。 不确定服务器支持这个自定义方法则不要使用它。
				//CURLOPT_CUSTOMREQUEST           => '',

				//URL不带协议的时候，使用的默认协议。  cURL 7.45.0 中添加，自 PHP 7.0.7 起有效。
				//CURLOPT_DEFAULT_PROTOCOL        => '',

				//Set the name of the network interface that the DNS resolver should bind to. This must be an interface name (not an address).  Added in cURL 7.33.0. Available since PHP 7.0.7.
				//CURLOPT_DNS_INTERFACE           => '',

				//Set the local IPv4 address that the resolver should bind to. The argument should contain a single numerical IPv4 address as a string.  Added in cURL 7.33.0. Available since PHP 7.0.7.
				//CURLOPT_DNS_LOCAL_IP4           => '',

				//Set the local IPv6 address that the resolver should bind to. The argument should contain a single numerical IPv6 address as a string.  Added in cURL 7.33.0. Available since PHP 7.0.7.
				//CURLOPT_DNS_LOCAL_IP6           => '',

				//类似CURLOPT_RANDOM_FILE，除了一个Entropy Gathering Daemon套接字。
				//CURLOPT_EGDSOCKET               => '',

				//HTTP请求头中"Accept-Encoding: "的值。 这使得能够解码响应的内容。 支持的编码有"identity"，"deflate"和"gzip"。如果为空字符串""，会发送所有支持的编码类型。  在 cURL 7.10 中被加入。
				//CURLOPT_ENCODING                => '',

				//这个值将被用来获取供FTP"PORT"指令所需要的IP地址。 "PORT" 指令告诉远程服务器连接到我们指定的IP地址。这个字符串可以是纯文本的IP地址、主机名、一个网络接口名（UNIX下）或者只是一个'-'来使用默认的 IP 地址。
				//CURLOPT_FTPPORT                 => '',

				//发送的网络接口（interface），可以是一个接口名、IP 地址或者是一个主机名。
				//CURLOPT_INTERFACE               => '',

				//使用 CURLOPT_SSLKEY 或 CURLOPT_SSH_PRIVATE_KEYFILE 私钥时候的密码。  在 cURL 7.16.1 中添加。
				//CURLOPT_KEYPASSWD               => '',

				//KRB4 (Kerberos 4) 安全级别。下面的任何值都是有效的(从低到高的顺序)："clear"、"safe"、"confidential"、"private".。如果字符串以上这些，将使用"private"。 这个选项设置为 NULL 时将禁用 KRB4 安全认证。目前 KRB4 安全认证只能用于 FTP 传输。
				//CURLOPT_KRB4LEVEL               => '',

				//Can be used to set protocol specific login options, such as the preferred authentication mechanism via "AUTH=NTLM" or "AUTH=*", and should be used in conjunction with the CURLOPT_USERNAME option.  Added in cURL 7.34.0. Available since PHP 7.0.7.
				//CURLOPT_LOGIN_OPTIONS           => '',

				//Set the pinned public key. The string can be the file name of your pinned public key. The file format expected is "PEM" or "DER". The string can also be any number of base64 encoded sha256 hashes preceded by "sha256//" and separated by ";".  Added in cURL 7.39.0. Available since PHP 7.0.7.
				//CURLOPT_PINNEDPUBLICKEY         => '',

				//全部数据使用HTTP协议中的 "POST" 操作来发送。 要发送文件，在文件名前面加上@前缀并使用完整路径。 文件类型可在文件名后以 ';type=mimetype' 的格式指定。 这个参数可以是 urlencoded 后的字符串，类似'para1=val1&para2=val2&...'，也可以使用一个以字段名为键值，字段数据为值的数组。 如果value是一个数组，Content-Type头将会被设置成multipart/form-data。   从 PHP 5.2.0 开始，使用 @ 前缀传递文件时，value 必须是个数组。   从 PHP 5.5.0 开始, @ 前缀已被废弃，文件可通过 CURLFile 发送。 设置 CURLOPT_SAFE_UPLOAD 为 TRUE 可禁用 @ 前缀发送文件，以增加安全性。
				//CURLOPT_POSTFIELDS              => '',

				//Any data that should be associated with this cURL handle. This data can subsequently be retrieved with the CURLINFO_PRIVATE option of curl_getinfo(). cURL does nothing with this data. When using a cURL multi handle, this private data is typically a unique key to identify a standard cURL handle.  Added in cURL 7.10.3.
				//CURLOPT_PRIVATE                 => '',

				//HTTP 代理通道。
				//CURLOPT_PROXY                   => '',

				//代理验证服务的名称。  cURL 7.34.0 中添加，PHP 7.0.7 起有效。
				//CURLOPT_PROXY_SERVICE_NAME      => '',

				//一个用来连接到代理的"[username]:[password]"格式的字符串。
				//CURLOPT_PROXYUSERPWD            => '',

				//一个被用来生成 SSL 随机数种子的文件名。
				//CURLOPT_RANDOM_FILE             => '',

				//以"X-Y"的形式，其中X和Y都是可选项获取数据的范围，以字节计。HTTP传输线程也支持几个这样的重复项中间用逗号分隔如"X-Y,N-M"。
				//CURLOPT_RANGE                   => '',

				//在HTTP请求头中"Referer: "的内容。
				CURLOPT_REFERER => '',

				//验证服务的名称  cURL 7.43.0 起添加，自 PHP 7.0.7 有效。
				//CURLOPT_SERVICE_NAME            => '',

				//包含 32 位长的 16 进制数值。这个字符串应该是远程主机公钥（public key） 的 MD5 校验值。在不匹配的时候 libcurl 会拒绝连接。 此选项仅用于 SCP 和 SFTP 的传输。  cURL 7.17.1 中添加。
				//CURLOPT_SSH_HOST_PUBLIC_KEY_MD5 => '',

				//The file name for your public key. If not used, libcurl defaults to $HOME/.ssh/id_dsa.pub if the HOME environment variable is set, and just "id_dsa.pub" in the current directory if HOME is not set.  Added in cURL 7.16.1.
				//CURLOPT_SSH_PUBLIC_KEYFILE      => '',

				//The file name for your private key. If not used, libcurl defaults to $HOME/.ssh/id_dsa if the HOME environment variable is set, and just "id_dsa" in the current directory if HOME is not set. If the file is password-protected, set the password with CURLOPT_KEYPASSWD.  Added in cURL 7.16.1.
				//CURLOPT_SSH_PRIVATE_KEYFILE     => '',

				//一个SSL的加密算法列表。例如RC4-SHA和TLSv1都是可用的加密列表。
				//CURLOPT_SSL_CIPHER_LIST         => '',

				//一个包含 PEM 格式证书的文件名。
				//CURLOPT_SSLCERT                 => '',

				//使用CURLOPT_SSLCERT证书需要的密码。
				//CURLOPT_SSLCERTPASSWD           => '',

				//证书的类型。支持的格式有"PEM" (默认值), "DER"和"ENG"。  在 cURL 7.9.3中 被加入。
				//CURLOPT_SSLCERTTYPE             => '',

				//用来在CURLOPT_SSLKEY中指定的SSL私钥的加密引擎变量。
				//CURLOPT_SSLENGINE               => '',

				//用来做非对称加密操作的变量。
				//CURLOPT_SSLENGINE_DEFAULT       => '',

				//包含 SSL 私钥的文件名。
				//CURLOPT_SSLKEY                  => '',

				//在 CURLOPT_SSLKEY中指定了的SSL私钥的密码。 由于这个选项包含了敏感的密码信息，记得保证这个PHP脚本的安全。
				//CURLOPT_SSLKEYPASSWD            => '',

				//CURLOPT_SSLKEY中规定的私钥的加密类型，支持的密钥类型为"PEM"(默认值)、"DER"和"ENG"。
				//CURLOPT_SSLKEYTYPE              => '',

				//使用 Unix 套接字作为连接，并用指定的 string 作为路径。  cURL 7.40.0 中添加， PHP 7.0.7 起有效。
				//CURLOPT_UNIX_SOCKET_PATH        => '',

				//需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。
				//CURLOPT_URL                     => '',

				//在HTTP请求中包含一个"User-Agent: "头的字符串。
				CURLOPT_USERAGENT => '',

				//验证中使用的用户名。  cURL 7.19.1 中添加，PHP 5.5.0 起有效。
				//CURLOPT_USERNAME                => '',

				//传递一个连接中需要的用户名和密码，格式为："[username]:[password]"。
				//CURLOPT_USERPWD                 => '',

				//指定 OAuth 2.0 access token。  cURL 7.33.0 中添加，自 PHP 7.0.7 添加。
				//CURLOPT_XOAUTH2_BEARER          => '',


				//以下option，value应该被设置成数组：


				//连接到指定的主机和端口，替换 URL 中的主机和端口。接受指定字符串格式的数组： HOST:PORT:CONNECT-TO-HOST:CONNECT-TO-PORT。  cURL 7.49.0 中添加， PHP 7.0.7 起有效。
				//CURLOPT_CONNECT_TO              => '',

				//HTTP 200 响应码数组，数组中的响应码被认为是正确的响应，而非错误。  在 cURL 7.10.3 中被加入。
				//CURLOPT_HTTP200ALIASES          => '',

				//设置 HTTP 头字段的数组。格式： array('Content-type: text/plain', 'Content-length: 100')
				//CURLOPT_HTTPHEADER              => '',

				//在 FTP 请求执行完成后，在服务器上执行的一组array格式的 FTP 命令。
				//CURLOPT_POSTQUOTE               => '',

				//传给代理的自定义 HTTP 头。  cURL 7.37.0 中添加，自 PHP 7.0.7 添加。
				//CURLOPT_PROXYHEADER             => '',

				//一组先于 FTP 请求的在服务器上执行的FTP命令。
				//CURLOPT_QUOTE                   => '',

				//提供自定义地址，指定了主机和端口。 包含主机、端口和 ip 地址的字符串，组成 array 的，每个元素以冒号分隔。格式： array("example.com:80:127.0.0.1")   在 cURL 7.21.3 中添加，自 PHP 5.5.0 起可用。
				//CURLOPT_RESOLVE                 => '',


				/*
				 *
				 *
				 *
				 *
				 * 以下 option，value应该被设置成流资源 （例如使用fopen()）：
				 *
				 *
				 *
				 *
				 *
				 *
				 * */


				//设置输出文件，默认为STDOUT (浏览器)。
				//CURLOPT_FILE                    => '',

				//上传文件时需要读取的文件。
				//CURLOPT_INFILE                  => '',

				//错误输出的地址，取代默认的STDERR。
				//CURLOPT_STDERR                  => '',

				//设置 header 部分内容的写入的文件地址。
				//CURLOPT_WRITEHEADER             => '',


				/*
				 *
				 *
				 *
				 *
				 * 以下option 的 value应该是有效的函数或者闭包：
				 *
				 *
				 *
				 *
				 *
				 *
				 * */


				//设置一个回调函数，这个函数有两个参数，第一个是cURL的资源句柄，第二个是输出的 header 数据。header数据的输出必须依赖这个函数，返回已写入的数据大小。
				//CURLOPT_HEADERFUNCTION          => '',

				//设置一个回调函数，有三个参数，第一个是cURL的资源句柄，第二个是一个密码提示符，第三个参数是密码长度允许的最大值。返回密码的值。
				//CURLOPT_PASSWDFUNCTION          => '',

				//设置一个回调函数，有五个参数，第一个是cURL的资源句柄，第二个是预计要下载的总字节（bytes）数。第三个是目前下载的字节数，第四个是预计传输中总上传字节数，第五个是目前上传的字节数。 只有设置 CURLOPT_NOPROGRESS 选项为 FALSE 时才会调用这个回调函数。 返回非零值将中断传输。 传输将设置 CURLE_ABORTED_BY_CALLBACK 错误。
				//CURLOPT_PROGRESSFUNCTION        => '',

				//回调函数名。该函数应接受三个参数。第一个是 cURL resource；第二个是通过选项 CURLOPT_INFILE 传给 cURL 的 stream resource；第三个参数是最大可以读取的数据的数量。回 调函数必须返回一个字符串，长度小于或等于请求的数据量（第三个参数）。一般从传入的 stream resource 读取。返回空字符串作为 EOF（文件结束） 信号。
				//CURLOPT_READFUNCTION            => '',

				//回调函数名。该函数应接受两个参数。第一个是 cURL resource；第二个是要写入的数据字符串。数 据必须在函数中被保存。 函数必须准确返回写入数据的字节数，否则传输会被一个错误所中 断。
				//CURLOPT_WRITEFUNCTION           => '',


				//以下option 的 value应该是其他值：
				//设置 value 为 curl_share_init() 返回的结果。 使 cURL 可以处理共享句柄里的数据。
				//CURLOPT_SHARE                   => '',


			);
		}
	}


/*
	print_r(Curl::G_(array(
		//设置cookie
		'cookie'    => array(
			'cookiek1' => 'cookiev1',
			'cookiek2' => 'cookiev2',
		),

		//设置post参数
		'post_data' => array(
			'iid' => 123,
			'_t_' => 456,
		),

		//设置get参数
		'get_data'  => array(
			'get1' => 123,
			'get2' => 456,
		),

		//设置原生头部数组
		'headers'   => array(
			'User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
			//'Accept-Encoding: gzip',
		),

		//伪造客户端ip
		'forge_ip'  => array(
			'CLIENT-IP:58.68.44.111',
			'X-FORWARDED-FOR:58.68.44.222',
		),

		//设置原生curl配置
		'options'   => array(
			//CURLOPT_REFERER    => $url,
			CURLOPT_HTTPHEADER => array(
				'X-FORWARDED-FOR:58.68.44.222',
			),
		),

		//设置文件上传
		'upload'    => array(
			//'path' => 'F:\localWeb\local3\kugou\1.png',
			//'name' => 'image',
		),

		//设置是否手机代理
		'isMoible'  => 0,
		//指定用户名
		//'user'      => 'bbb',
		//设置代理服务
		'proxy'     => array(
			'type' => 'http',
			//'type' => 'socket',
			'url'  => '127.0.0.1:8888',
		),

		//请求地址
		//'url'       => 'http://local4.com/test.php',
		'url'       => 'http://mem.72da.com:5110/test.php',
	)));*/

/*


	print_r(Curl::P_(array(
		//'cookie'    => 'fruit = ""; colour = ""',
		'get_data'  => 'get_data1=cc11&get_data2=dd11',
		'post_data' => 'post_data1=cc22&post_data2=dd22',


		//设置原生头部字符串
		'headers'   => <<<MSG_EOR
User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.104 Safari/537.36 Core/1.53.4882.400 QQBrowser/9.7.13059.400
Referer: http://www.thinkphp.cn/code/943.html
Accept-Language: zh-CN,zh;q=0.8
Accept55: 88888
MSG_EOR
,

		//伪造客户端ip
		'forge_ip' => '58.68.44.61',


		//设置原生curl配置
		'options'   => array(
			//CURLOPT_REFERER    => $url,
			CURLOPT_HTTPHEADER => array(
				'1:555',
			),
		),
		//设置文件上传
		'upload'    => array(
			//'path' => 'C:\Users\Administrator\Desktop\public_img\QQ截图20170622183511.png',
			//'name' => 'image',
		),

		//设置是否手机代理
		'isMoible'  => 0,

		//指定用户名
		'user'      => 'bbb',

		//设置代理服务
		'proxy'     => array(
			'type' => 'http',
			//'type' => 'socket',
			//'url'  => '127.0.0.1:8888',
			//'url'  => '58.19.14.222:18118',
			//'url'  => '180.122.151.44:29023',
		),

		//请求地址
		//'url'       => 'http://local4.com/test.php',
		'url'       => 'http://mem.72da.com:5110/test.php',
	)));

*/
