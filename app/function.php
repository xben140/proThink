<?php

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
	 * 通过闭包控制缓存
	 *
	 * @param          $key
	 * @param callable $func
	 * @param array    $params
	 * @param int      $time
	 * @param bool     $isForce
	 *
	 * @return mixed
	 */
	function autoCache($key , callable $func , $params = [] , $time = 3600 , $isForce = false)
	{
		$result = cache($key);
		if((!$result) || $isForce)
		{
			$result = call_user_func_array($func , $params);
			!empty($result) && cache($key , $result , $time);
		}

		return $result;
	}


	/**
	 * 闭包事物构造器
	 *
	 * @param array  $list           事物列表
	 * @param string $err            当事物执行失败时返回的错误信息
	 * @param null   $globalVariable 每个事物都可以作用到的共享变量，会push到每个事物元素的参数上
	 *
	 * @return bool
	 */
	function execClosureList($list = [] , &$err = null , &$globalVariable = null)
	{
		return \auth\Auth::execClosureList(function() {

			Db::startTrans();

		} , function() {

			Db::commit();

		} , function() {

			Db::rollback();

		} , $list , $err , $globalVariable);
	}


	/**
	 * 格式化字节大小
	 *
	 * @param  number $size 字节数
	 * @param string  $de
	 *
	 * @return string|int            格式化后的带单位的大小
	 */
	function formatBytes($size , $de = '2')
	{
		return \file\FileTool::byteFormat($size , $de);
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
	 * 匹配出命名空间
	 * ithinkphp\tool\permission\Rule
	 *
	 * @param object|string $class
	 *
	 * @return string
	 */
	function getNamespace($class)
	{
		preg_match('%^(.+)(?=[\\\\/][^\//]+$)%im' , $class , $result);

		return $result[1];
	}


	/*
	 *
	 *
	 * 						路径和url 相关
	 *
	 *
	 *
	 * */

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
		return replaceToSysSeparator(PATH_FILE . $path);
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

		return replaceToSysSeparator(PATH_PICTURE . $path);
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
		return replaceToUrlSeparator(URL_FILE . $path);
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

		return replaceToUrlSeparator(URL_PICTURE . $path);
	}


	/**
	 * 自动计算头像url
	 *
	 * @param      $path 20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt
	 * @param int  $isThumb
	 *
	 * @return string 'http://local15.cc/upload/file/20180717\a514e349fbb9233b3dc47d5ce2e0a82e.txt'
	 */
	function generateProfilePicPath($path , $isThumb = 1)
	{
		$profile_pic = isImgExists($path , $isThumb) ? $path : config('default_profile_pic');

		return makeImgUrl($profile_pic , $isThumb);
	}

	/*
	 *
	 *
	 * 通用
	 *
	 *
	 *
	 * */


	/**
	 *    根据路径删除图片和缩略图
	 *
	 * @param      $path
	 */
	function delImg($path)
	{
		isImgExists($path , 0) && unlink(makeImgPath($path , 0));
		isImgExists($path , 1) && unlink(makeImgPath($path , 1));
	}


	/**
	 *    根据路径删除文件
	 *
	 * @param      $path
	 */
	function delFile($path)
	{
		isFileExists($path) && unlink(makeFilePath($path));
	}


	/**
	 *    根据路径判断指定图片文件在不在
	 *
	 * @param      $path
	 * @param bool $isThumb
	 *
	 * @return bool
	 */
	function isImgExists($path , $isThumb = false)
	{
		return is_file(makeImgPath($path , $isThumb));
	}

	/**
	 *    根据路径判断指定文件在不在
	 *
	 * @param      $path
	 *
	 * @return bool
	 */
	function isFileExists($path)
	{
		return is_file(makeFilePath($path));
	}

	/**
	 * 地址里的分隔符替换为url里的符号
	 *
	 * @param      $path
	 *
	 * @return string 'http://local15.cc/upload/file/20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png'
	 */
	function replaceToUrlSeparator($path)
	{
		return \file\FileTool::replaceToUrlSeparator($path);
	}

	/**
	 * 地址里的分隔符替换为系统分隔符
	 *
	 * @param      $path
	 *
	 * @return string 'http://local15.cc/upload/file/20180717\a514e349fbb9233b3dc47d5ce2e0a82e.png'
	 */
	function replaceToSysSeparator($path)
	{
		return \file\FileTool::replaceToSysSeparator($path);
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
	 * session
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
		return isGlobalManagerId(getAdminSessionInfo(SESSOIN_TAG_USER , 'id'));
	}

	/**
	 * 指定平台是否登录
	 * @return array|string|bool
	 */
	function isAdminLogin()
	{
		return getAdminSessionInfo(SESSOIN_TAG_USER);
	}

	/**
	 * 获取用户session
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
		return \auth\permission\Auth::getInstance()::addLevel($data , $id , $level , $parentField);

	}

	/**统一格式化菜单
	 *
	 * @param $a
	 * @param $b
	 * @param $c
	 *
	 * @return string
	 */
	function formatMenu($a , $b , $c)
	{
		return \auth\permission\Auth::getInstance()::formatMenu($a , $b , $c);
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

	/**是否为默认菜单
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	function isDefault($data)
	{
		return strtolower($data['action']) == 'none';
	}

	/**
	 * 返回是否为菜单@param $data
	 * @return mixed
	 */
	function isMenu($data)
	{
		return $data['is_menu'];
	}


	/**
	 *        数据备份相关
	 */

	/**
	 * 根据表名，生成备份表语句
	 *
	 * @param $tableName
	 * @param $err
	 *
	 * @return array
	 */
	function makeSqlByTableName($tableName , &$err = null)
	{
		$installSqls = [];
		//显示表结构的sql
		$createTableSql = 'SHOW CREATE TABLE  ' . $tableName;
		\db\Db::exec($createTableSql , function($sql , &$err) use (&$installSqls , $tableName) {
			$res = null;
			if($res = querySql($sql))
			{
				//先删除表
				$installSqls[] = 'DROP TABLE IF EXISTS `' . $tableName . "`;";
				//表结构
				$installSqls[] = $res[0]['Create Table'] . ";";

				//构造插入数据sql
				$data = \think\Db::table($tableName)->select()->toArray();
				$insertSql = \think\Db::table($tableName)->fetchSql(1)->insertAll($data);
				if(is_string($insertSql))
				{
					$installSqls[] = $insertSql . ";\r\n";
				}

				$installSqls[] = "\r\n";
			}

			return $res;
		} , $err);

		return $installSqls;
	}

	/**
	 * 执行sql数组
	 *
	 * @param array $sqls
	 * @param null  $err
	 *
	 * @return bool|mixed
	 */
	function execSqlBySqlArray(array $sqls , &$err = null)
	{
		$flag = true;
		foreach ($sqls as $k => $sql)
		{
			$flag && $flag = \db\Db::exec($sql , function($sql , &$err) {
				return (querySql($sql) !== false);
			} , $err);

			if(!$flag) break;
		}

		return $flag;
	}

	/**
	 *        杂项
	 */


	/**权限列表里使用
	 *
	 * @param     $data
	 * @param int $level
	 *
	 * @return string
	 */
	function indentationByLevel($data , $level = 0)
	{
		$s = '';
		$margin = (($level - 1) * 30);
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


	/**
	 *        工具函数
	 */

	/**
	 * formatTime 格式化时间
	 *
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
	 * 返回毫秒时间戳
	 * @return float
	 */
	function msTime()
	{
		list($t1 , $t2) = explode(' ' , microtime());

		return (float)sprintf('%.0f' , (floatval($t1) + floatval($t2)) * 1000);
	}

	/**
	 * 计算时间间隔
	 *
	 * @param $timestamp
	 *
	 * @return false|string
	 */
	function humandate($timestamp)
	{
		$seconds = $_SERVER['REQUEST_TIME'] - $timestamp;
		if($seconds > 31536000)
		{
			return date('Y-n-j' , $timestamp);
		}
		elseif($seconds > 2592000)
		{
			return floor($seconds / 2592000) . '月前';
		}
		elseif($seconds > 86400)
		{
			return floor($seconds / 86400) . '天前';
		}
		elseif($seconds > 3600)
		{
			return floor($seconds / 3600) . '小时前';
		}
		elseif($seconds > 60)
		{
			return floor($seconds / 60) . '分钟前';
		}
		else
		{
			return $seconds . '秒前';
		}
	}

	/**
	 *     * 计算时间间隔
	 *
	 * @param $timestamp
	 *
	 * @return false|string
	 */
	function humandateA($timestamp)
	{
		$seconds = $_SERVER['REQUEST_TIME'] - $timestamp;
		if($seconds > 31536000)
		{
			return date('Y年m月d日' , $timestamp);
		}
		elseif($seconds > 2592000)
		{
			return floor($seconds / 2592000) . '月前';
		}
		elseif($seconds > 86400)
		{
			return floor($seconds / 86400) . '天前';
		}
		elseif($seconds > 3600)
		{
			return floor($seconds / 3600) . '小时前';
		}
		elseif($seconds > 60)
		{
			return floor($seconds / 60) . '分钟前';
		}
		else
		{
			return $seconds . '秒前';
		}
	}


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


	//汉字转unicode
	function toUnicode($subject , $encoding = 'utf-8')
	{
		$result = preg_replace_callback('/[\x{4e00}-\x{9fff}]/ium' , function($group) use ($encoding) {
			$hex = ($group[0]);
			$t = iconv($encoding , 'UCS-2' , $hex);
			preg_match_all('/[\s\S]/' , $t , $res);

			$tmp = array_map(function($v) {
				return sprintf("%'02s" , base_convert(ord($v) , 10 , 16));
			} , $res[0]);

			return '\\u' . implode('' , $tmp);
		} , $subject);

		return $result;
	}


	//unicode转汉字
	function formUnicode($subject)
	{
		$result = preg_replace_callback('/\\\\u([a-z\d]{4})/im' , function($group) {
			$hex = $group[1];
			$a = base_convert($hex[0] . $hex[1] , 16 , 10);
			$b = base_convert($hex[2] . $hex[3] , 16 , 10);
			$c = chr($a) . chr($b);
			$c = iconv('UCS-2' , 'UTF-8' , $c);

			return $c;
		} , $subject);

		return $result;
	}


	/**
	 * 钩子
	 *
	 * @param string $tag
	 * @param array  $params
	 */
	function hook($tag = '' , &$params = [])
	{
		\think\Hook::listen($tag , $params);
	}


	/**
	 * 是否安装
	 * @return bool
	 */
	function isInstalled()
	{
		return is_file(APP_PATH . 'database.php');
	}




	/**
	 * 更可靠的pathinfo函数代替
	 *
	 * @param $path
	 *
	 * @return mixed
	 */


	function pathinfo_($path)
	{
		preg_match("%^(?'dirname'.*?(?=[^.]+\.[^.]+$))(?'filename'[^\\\\/]*?)\.(?'extension'[a-z\d]*?)$%im" , $path , $res);
		$res['basename'] = $res['filename'] . '.' . $res['extension'];

		return $res;
	}
