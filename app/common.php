<?php
	/**
	 * 应用公共方法
	 * 上传，下载，导出excel。。。。
	 */

	/**
	 * 上传文件主方法
	 *
	 * @param string        $fieldName 字段名字
	 * @param  string       $toDir     上传到哪个文件夹
	 * @param callable|null $callback  文件移动成功后的回调
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function upload($fieldName , $toDir , callable $callback = null)
	{
		//文件一共分了几块
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
		//当前是第几块
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;

		$result = [];
		try
		{
			//实例化文件上传类
			//第一个参数为input的name值
			$chunkUpload = new \upload\uploader($fieldName , $chunks , $chunk);

			$result = $chunkUpload//设置分块文件临时保存文件夹
			//'PATH_TEMP'           => 'F:\\localWeb\\public_local15\\public\\temp\\',
			->setTempDir(PATH_TEMP)//接口是否允许跨域上传
			->isAllowCors(1)//临时分块文件的保存时间
			->setMaxFileAge(600)//脚本执行最大时间,没用
			//->setMaxExecutionTime(52)
			//保存文件的命名方式
			->rule(function() {
				//return sha1(uniqid('', 1));
			})//最终文件夹要保存的位置
			->moveTo($toDir);

		} catch (\think\exception\ErrorException $exception)
		{
			$result = [
				'error' => $exception->getMessage() ,
				'sign'  => 0 ,
			];
		}

		if(is_callable($callback) && $result['is_finished'])
		{
			$result = $callback($result);
		}

		return $result;

	}

	/**
	 * 上传图片专用
	 *
	 * @param               $fieldName 图片字段
	 * @param callable|null $callback
	 * @param array         $thumbSize 数组，三个参数，为$image->thumb 的三个参数
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 * @throws \think\image\Exception
	 */
	function uploadImg($fieldName , callable $callback = null , $thumbSize = null)
	{
		$result = upload($fieldName , PATH_PICTURE , $callback);

		if($result['is_finished'])
		{
			if($thumbSize)
			{
				$isMakeThumb = (function() use ($result , $thumbSize) {
					return //图片的mime
						(preg_match('#^image#' , $result['mime']) //不是图片mime但是后缀是jpg或者jpeg的
							|| (preg_match('#^application/octet-stream#' , $result['mime']) && preg_match('#(?:jpg|jpeg)$#i' , $result['basename']))) //参数是array
						//参数正确
						&& is_array($thumbSize) && is_numeric($thumbSize[0]) && is_numeric($thumbSize[1]);
				})();

				$imgPath = makeImgPath($result['savename']);
				$imgThumbPath = makeImgPath($result['savename'] , 1);
				//传了就生缩略图
				if($isMakeThumb)
				{
					//没传第三个参数默认为等比
					!in_array($thumbSize[2] , range(1 , 6)) && ($thumbSize[2] = 1);
					$image = \think\Image::open($imgPath);

					try
					{
						$image->thumb(... $thumbSize)->save($imgThumbPath);
					} catch (\think\exception\ErrorException $exception)
					{
						$a = $exception->getMessage();
					} catch (\Exception $exception)
					{
						$b = $exception->getMessage();
					}

				}
				if(!is_file($imgThumbPath)) copy($imgPath , $imgThumbPath);
				$result['thumb_url'] = makeImgUrl($result['savename'] , 1);
			}


		}


		return $result;
	}

	/**
	 *     * 上传文件专用
	 *
	 * @param   string      $fieldName 文件字段
	 * @param callable|null $callback
	 *
	 * @return array
	 * @throws LogicException
	 * @throws RuntimeException
	 */
	function uploadFile($fieldName , callable $callback = null)
	{
		return upload($fieldName , PATH_FILE , $callback);
	}


	/**
	 *导出excel信息
	 */
	function exportExcel()
	{

	}

	/**
	 *导入excel信息
	 */
	function importExcel()
	{

	}

	/**
	 *发送邮件
	 */
	function sendEmail()
	{

	}

	/**
	 *生成条形码
	 */
	function generateBrcode()
	{

	}

	/**
	 *生成二维码
	 */
	function generateQrcode()
	{

	}


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

	//生成树
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

	function formatMenu($a , $b , $c)
	{
		return strtolower($a . '/' . $b . '/' . $c);
	}

	//获取用户拥有的菜单
	function getMenu($data)
	{
		$menu = [];
		foreach ($data as $k => $v) $menu[] = (formatMenu($v['module'] , $v['controller'] , $v['action']));

		return $menu;
	}

	function buildPath($data)
	{
		return strtolower($data['action']) == 'none' ? '#' : url($data['path']);
	}

	function isDeftule($data)
	{
		return strtolower($data['action']) == 'none';
	}

	function isMeun($data)
	{
		return $data['is_menu'];
	}

	function indentationByLevel($data , $level = 0)
	{
		$s = '';
		$margin = (($level - 1) * 30);
		($level>1)&& $s = '╘══ ';

		return "<span style='margin-left: " . $margin . "px;'>".$s . $data . '</span>';
	}

	function indentationOptionsByLevel($data , $level = 0)
	{
		return str_repeat('&nbsp;' , ($level - 1) * 6) . $data;
	}











