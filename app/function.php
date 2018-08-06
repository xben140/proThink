<?php
	/**
	 * 应用拓展方法
	 */


// +---------------------------------------------------------------------+
// | 其他函数
// +---------------------------------------------------------------------+
	use think\Db;


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
	function createClosure($class , $method , $parameter = [])
	{
		/**
		 * @return Closure
		 */
		$func = function() use ($class , $method , $parameter) {

			return \think\App::invokeMethod([
				\think\App::invokeClass($class) ,
				$method ,
			] , $parameter);

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






