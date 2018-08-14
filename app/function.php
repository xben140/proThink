<?php

	use think\App;
	use think\Db;

	/*
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
			 *	工具方法
			 *	其他函数需要调用的公共方法
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


	/**
	 * 原生查询
	 *
	 * @param $sql
	 *
	 * @return mixed
	 */
	function querySql($sql)
	{
		return Db::query($sql);
	}

	/**
	 * 原生执行
	 *
	 * @param $sql
	 *
	 * @return int
	 */
	function executeSql($sql)
	{
		return Db::execute($sql);
	}

	/**
	 * 通过类创建逻辑闭包
	 *
	 * @param null   $class
	 * @param string $method
	 * @param array  $parameter
	 *
	 * @return Closure
	 */
	function createClosureClass($class , $method , $parameter = [])
	{
		$func = function() use ($class , $method , $parameter) {
			return App::invokeMethod([
				App::invokeClass($class) ,
				$method ,
			] , $parameter);
		};

		return $func;
	}

	/**
	 * 通过函数创建逻辑闭包
	 *
	 * @param callable $func
	 * @param array    $parameter
	 *
	 * @return Closure
	 */
	function createClosureFunc(callable $func , $parameter = [])
	{
		$func = function() use ($func , $parameter) {
			return call_user_func_array($func , $parameter);
		};

		return $func;
	}

	/**
	 * 通过闭包控制缓存
	 *
	 * @param          $key
	 * @param callable $func
	 * @param array    $params
	 * @param int      $time
	 *
	 * @return mixed
	 */
	function authCache($key , callable $func , $params = [] , $time = 3)
	{
		$result = cache($key);
		if(empty($result))
		{
			$result = call_user_func_array($func , $params);
			!empty($result) && cache($key , $result , $time);
		}

		return $result;
	}


	/**
	 * 闭包事物构造器
	 *
	 * @param array $list
	 * @param       $err
	 *
	 * @return bool
	 */
	function execClosureList($list = [] , &$err = null)
	{
		/*
		 * 		[
					[
						function() {
							//执行成功返回真
						} ,
						array(
							1 ,
							2 ,
						) ,
					] ,
					[
						function() {
							//执行成功返回真
						} ,
						array(
							1 ,
							2 ,
						) ,
					] ,
				];

		 * */
		Db::startTrans();
		try
		{
			$flag = true;

			while ($flag && ($closure = array_shift($list)))
			{
				!isset($closure[1]) && $closure[1] = [];
				$flag = call_user_func_array($closure[0] , $closure[1]);
			}

			$flag ? Db::commit() : Db::rollback();

			return $flag;
		} catch (\Exception $e)
		{
			Db::rollback();
			$err = $e->getMessage();

			return false;
		}
	}


	/**
	 * 格式化字节大小
	 *
	 * @param  number $size      字节数
	 * @param  string $delimiter 数字和单位分隔符
	 *
	 * @return string            格式化后的带单位的大小
	 */
	function formatBytes($size , $delimiter = '')
	{

		$units = array(
			'B' ,
			'KB' ,
			'MB' ,
			'GB' ,
			'TB' ,
			'PB' ,
		);

		for ($i = 0; $size >= 1024 && $i < 5; $i++)
		{
			$size /= 1024;
		}

		return round($size , 2) . $delimiter . $units[$i];
	}


	/**
	 * 从带命名空间的类名类把类名提取出来
	 *
	 * @param object|string $class
	 *
	 * @return string
	 */
	function getClassBase($class)
	{
		$class = is_object($class) ? get_class($class) : $class;

		return basename(str_replace('\\' , '/' , $class));
	}


	/**
	 * 生成图片缩略图路径
	 *
	 * @param $path 20180717\a514e349fbb9233b3dc47d5ce2e0a82e.jpg
	 *
	 * @return null|string 20180717\thumb_a514e349fbb9233b3dc47d5ce2e0a82e.jpg
	 */
	function makeImgThumbName($path)
	{
		return preg_replace('%([^\\\\/]+$)%m' , 'thumb_$1' , $path);
	}

	/*
	 *
	 *
	 * 计算路径
	 *
	 *
	 *
	 * */
	/**
	 * 计算文件路径
	 * 以常量为基础
	 *
	 * @param $path 20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt
	 *
	 * @return string 'F:\\localWeb\\public_local15\\public\\upload\\file\\20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt'
	 */
	function makeFilePath($path)
	{
		return PATH_FILE . $path;
	}


	/**
	 * 计算图片路径
	 * 以常量为基础
	 *
	 * @param      $path    20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png
	 * @param bool $isThumb 是否为缩略图路基
	 *
	 * @return string 'F:\\localWeb\\public_local15\\public\\upload\\file\\20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png'
	 */
	function makeImgPath($path , $isThumb = false)
	{
		$path = $isThumb ? makeImgThumbName($path) : $path;

		return PATH_PICTURE . $path;
	}

	/*
	 *
	 *
	 * 计算url
	 *
	 *
	 *
	 * */

	/**
	 * 计算文件url
	 * 以常量为基础
	 *
	 * @param      $path 20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt
	 *
	 * @return string 'http://local15.cc/upload/file/20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt'
	 */
	function makeFileUrl($path)
	{

		return URL_FILE . $path;
	}


	/**
	 * 计算图片url
	 * 以常量为基础
	 *
	 * @param      $path 20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png
	 * @param bool $isThumb
	 *
	 * @return string 'http://local15.cc/upload/file/20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png'
	 */
	function makeImgUrl($path , $isThumb = false)
	{
		$path = $isThumb ? makeImgThumbName($path) : $path;

		return URL_PICTURE . $path;
	}

	/*
	 *
	 *
	 * 密码相关
	 *
	 *
	 *
	 * */


	/**
	 * 构造用户密码
	 *
	 * @param string $pwd 用户密码
	 *
	 * @return array
	 */
	function buildPwd($pwd)
	{
		$salt = substr(md5(microtime()) , rand(0 , 10) , 6);
		$nwePwd = makePwd($pwd , $salt);

		return array(
			'salt' => $salt ,
			'pwd'  => $nwePwd ,
		);
	}


	/**
	 * 密码验证
	 *
	 * @param string $userPwd 库里密码
	 * @param string $pwd     输入密码
	 * @param string $salt    库里盐
	 *
	 * @return bool
	 */
	function checkPwd($userPwd , $pwd , $salt)
	{
		return makePwd($pwd , $salt) == $userPwd;
	}

	/**
	 * @param  string $pwd  输入密码
	 * @param string  $salt 盐
	 *
	 * @return string
	 */
	function makePwd($pwd , $salt)
	{
		return md5(md5($pwd) . md5($salt));
	}


	/*
	 *
	 *
	 * 读session
	 *
	 *
	 *
	 * */


	/**
	 * 是否为全站管理员id
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	function isGlobalManagerId($id)
	{
		return $id == ADMIN_ID;
	}


	/**
	 * 是否为全站管理员登陆
	 * @return array|string|bool
	 */
	function isGlobalManager()
	{
		return isGlobalManagerId(getAdminSessionInfo('user' , 'id'));
	}

	/**
	 * 指定平台是否登录
	 * @return array|string|bool
	 */
	function isAdminLogin()
	{
		return getAdminSessionInfo('user');
	}

	/**
	 * 构造用户密码
	 *
	 * @param string $tag sesion 信息标签
	 * @param        $key
	 *
	 * @return array|string|bool
	 */
	function getAdminSessionInfo($tag , $key = null)
	{
		$info = session(SESSION_TAG_ADMIN . $tag);

		return isset($info[$key]) ? $info[$key] : $info;
	}


	/*
	 *
	 *
	 * 菜单相关
	 *
	 *
	 *
	 * */


	//传入id，获取所有子级id
	/**
	 * @param     $data
	 * @param int $id
	 *
	 * @return array
	 */
	function getSonId($data , $id = 0)
	{
		static $ids = [];
		foreach ($data as $k => $v)
		{
			if($v['pid'] == $id)
			{
				$ids[] = $v['id'];
				getSonId($data , $v['id']);
			}
		}

		return $ids;
	}

	//添加等级段
	/**
	 * @param        $data
	 * @param int    $id
	 * @param int    $level
	 * @param string $parentField
	 *
	 * @return array
	 */
	function makeTree($data , $id = 0 , $level = 1 , $parentField = 'pid')
	{
		static $result = [];
		foreach ($data as $k => $v)
		{
			if($v[$parentField] == $id)
			{
				$v['level'] = $level;
				$result[] = $v;
				makeTree($data , $v['id'] , $level + 1 , $parentField);
			}
		}

		return $result;
	}

	//传入数组和id，获取返回所有子级
	/**
	 * @param $data
	 * @param $id
	 *
	 * @return array
	 */
	function getSon($data , $id)
	{
		$result = [];
		foreach ($data as $k => $v)
		{
			if($v['pid'] == $id)
			{
				$result[] = $v;
			}
		}

		return $result;
	}

	//生成菜单树
	/**
	 * @param     $items
	 * @param int $id
	 *
	 * @return array
	 */
	function makeTreeMenu($items , $id = 0)
	{
		$tree = array();
		foreach ($items as $k1 => $v1)
		{
			if($v1['pid'] == $id)
			{
				$v1['path'] = formatMenu($v1['module'] , $v1['controller'] , $v1['action']);
				$v1['son'] = makeTreeMenu($items , $v1['id']);
				$tree[] = $v1;
			}
		}

		return $tree;
	}

	//统一格式化菜单
	/**
	 * @param $a
	 * @param $b
	 * @param $c
	 *
	 * @return string
	 */
	function formatMenu($a , $b , $c)
	{
		return strtolower($a . '/' . $b . '/' . $c);
	}

	//获取用户拥有的菜单
	/**
	 * @param $data
	 *
	 * @return array
	 */
	function getMenu($data)
	{
		$menu = [];
		foreach ($data as $k => $v) $menu[] = (formatMenu($v['module'] , $v['controller'] , $v['action']));

		return $menu;
	}

	//构造菜单的路径
	/**
	 * @param $data
	 *
	 * @return string
	 */
	function buildPath($data)
	{
		return strtolower($data['action']) == 'none' ? '#' : url($data['path']);
	}

	//是否为默认菜单
	/**
	 * @param $data
	 *
	 * @return bool
	 */
	function isDefault($data)
	{
		return strtolower($data['action']) == 'none';
	}

	//返回是否为菜单
	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	function isMenu($data)
	{
		return $data['is_menu'];
	}

	/**
	 *        杂项
	 */


	//权限列表里使用
	/**
	 * @param     $data
	 * @param int $level
	 *
	 * @return string
	 */
	function indentationByLevel($data , $level = 0)
	{
		$s = '';
		$margin = (($level) * 30);
		($level > 1) && $s = '╘══ ';

		return "<span style='margin-left: " . $margin . "px;'>" . $s . $data . '</span>';
	}

	//option选项里使用
	/**
	 * @param     $data
	 * @param int $level
	 *
	 * @return string
	 */
	function indentationOptionsByLevel($data , $level = 0)
	{
		$s = '';
		($level > 0) && $s = '╘══ ';

		return str_repeat('&nbsp;' , ($level) * 8) . $s . $data;
	}

	//formatTime
	/**
	 * @param      $time
	 * @param bool $isTime
	 *
	 * @return false|string
	 */
	function formatTime($time , $isTime = true)
	{
		$format = 'Y-m-d';
		$isTime && $format .= ' H:i:s';

		return date($format , $time);
	}


	/**
	 * 钩子
	 */
	function hook($tag = '' , $params = [])
	{
		\think\Hook::listen($tag , $params);
	}



