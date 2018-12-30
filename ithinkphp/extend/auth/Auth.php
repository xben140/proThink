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



	namespace auth;

	/**
	 * Class Auth
	 * @package auth
	 */
	class Auth
	{
		/**
		 * @var array 验证规则集合
		 */
		public static $func = [];

		/**
		 * @var array 组集合
		 */
		public static $funcGroup = [];

		/**
		 * @var array 全局参数集合
		 */
		public static $globalParams = [];

		/**
		 * @var string 错误信息
		 */
		public static $error = '';

		/**
		 * **********************************************************************************************************************
		 *                               验证规则
		 * **********************************************************************************************************************
		 */


		/**
		 * 添加验证规则
		 *
		 * @param string $key
		 * @param array  $func
		 */
		public static function addRule($key , array $func)
		{
			/*
				[
					function() {
						//执行成功返回真
						return false;
					} ,
					array(
						1 ,
						2 ,
					) ,
					'error massage'
				]
			 * */

			static::$func[static::makeKey($key)] = $func;
		}

		/**
		 * 删除验证规则
		 *
		 * @param $key
		 */
		public static function delRule($key)
		{
			unset(static::$func[static::makeKey($key)]);
		}

		/**
		 * 获取验证规则
		 *
		 * @param $key
		 *
		 * @return mixed
		 */
		public static function getRule($key)
		{
			return isset(static::$func[static::makeKey($key)]) ? (static::$func[static::makeKey($key)]) : false;
		}

		/**
		 * 执行指定键的规则
		 *
		 * @param $key
		 *
		 * @return mixed
		 */
		public static function execRule($key)
		{
			$closure = static::getRule($key);

			//没传参数设置参数为空数组
			!is_array($closure[1]) && $closure[1] = [];

			//执行闭包
			$flag = call_user_func_array($closure[0] , $closure[1]);

			return [
				'key'    => $key ,
				'result' => $flag ,
				'msg'    => isset($closure[2]) ? $closure[2] : null ,
			];
		}

		/**
		 * 清空所有规则
		 * @return mixed
		 */
		public static function clearRule()
		{
			static::$func = [];
		}

		/**
		 * **********************************************************************************************************************
		 *                               规则组
		 * **********************************************************************************************************************
		 */


		/**
		 * 添加规则组
		 *
		 * @param string $key   对应规则的键
		 * @param string $group 将键添加到对应组
		 */
		public static function pushGroup($key , $group = 'base')
		{
			static::$funcGroup[static::makeKey($group)][] = $key;
		}

		/**
		 * 查看规则组里有哪些规则
		 *
		 * @param string $group 将键添加到对应组
		 *
		 * @return array
		 */
		public static function getGroup($group = 'base')
		{
			return isset(static::$funcGroup[static::makeKey($group)]) ? (static::$funcGroup[static::makeKey($group)]) : [];

		}

		/**
		 * 删除指定规则组里的指定规则
		 *
		 * @param string $key   规则名
		 * @param string $group 组名
		 */
		public static function delGroupRule($key , $group = 'base')
		{
			$rules = static::getGroup($group);

			$t = array_flip($rules);
			unset($t[$key]);
			static::$funcGroup[static::makeKey($group)] = array_flip($t);
		}

		/**
		 * 删除指定规则组
		 *
		 * @param string $group 组名
		 */
		public static function delGroup($group = 'base')
		{
			unset(static::$funcGroup[static::makeKey($group)]);
		}

		/**
		 * 执行组规则
		 *
		 * @param string $group 组名
		 *
		 * @return bool|mixed
		 */
		public static function execGroup($group = 'base')
		{
			$list = static::getGroup($group);

			$result = [];

			while (($ruleName = array_shift($list)) && ($result[] = static::execRule($ruleName))) ;

			return $result;
		}


		/**
		 * 或逻辑执行组规则
		 *
		 * @param string $group 组名
		 *
		 * @return bool|mixed
		 */
		public static function execGroupOr($group = 'base')
		{
			$list = static::execGroup($group);
			$flag = false;
			foreach ($list as $k => $v)
			{
				if($v['result'] !== false)
				{
					$flag = true;
					Auth::setError($v['msg']);
					break;
				}
			}

			return $flag;
		}


		/**
		 * 并且逻辑执行组规则
		 *
		 * @param string $group 组名
		 *
		 * @return bool|mixed
		 */
		public static function execGroupAnd($group = 'base')
		{
			$list = static::execGroup($group);
			$flag = true;
			foreach ($list as $k => $v)
			{
				if($v['result'] === false)
				{
					$flag = false;
					Auth::setError($v['msg']);
					break;
				}
			}

			return $flag;
		}


		/**
		 * 清空所有组
		 * @return mixed
		 */
		public static function clearGroup()
		{
			static::$funcGroup = [];
		}


		/**
		 * **********************************************************************************************************************
		 *                               全局变量
		 * **********************************************************************************************************************
		 */

		/**
		 * 取值
		 *
		 * @param string $key
		 * @param string $group
		 *
		 * @return array|bool
		 */
		public static function getGlobalParams($key = null , $group = 'base')
		{
			$res = [];
			//没传key
			if(is_null($key))
			{
				if(is_null($group))
				{
					$res = static::$globalParams;
				}
				elseif(isset(static::$globalParams[$group]))
				{
					$res = static::$globalParams[$group];
				}
			}
			else
			{
				if(isset(static::$globalParams[$group]) && isset(static::$globalParams[$group][static::makeKey($key)]))
				{
					$res = static::$globalParams[$group][static::makeKey($key)];
				}
				else
				{
					$res = false;
				}
			}

			return $res;
		}

		/**
		 * 赋值
		 *
		 * @param string $key
		 * @param mixed  $value
		 * @param string $group
		 */
		public static function setGlobalParams($key , $value , $group = 'base')
		{
			!isset(static::$globalParams[$group]) && (static::$globalParams[$group] = []);
			static::$globalParams[$group][static::makeKey($key)] = $value;
		}


		/**
		 * 获取所有数据
		 * @return mixed
		 */
		public static function getAllGlobalParams()
		{
			return static::getGlobalParams(null , null);
		}


		/**
		 * 获取指定组所有数据
		 *
		 * @param string $group
		 *
		 * @return mixed
		 */
		public static function getGlobalParamsByGroupName($group = 'base')
		{
			return static::getGlobalParams(null , $group);
		}


		/**
		 *清空所有变量
		 * string 清空对应组
		 * null 清空所有
		 *
		 * @param string|null $group
		 *
		 * @return mixed
		 */
		public static function clearGlobalParams($group = 'base')
		{
			is_null($group) ? static::$funcGroup = [] : (static::$funcGroup[$group] = []);
		}



		/**
		 * **********************************************************************************************************************
		 *                               报错
		 * **********************************************************************************************************************
		 */

		/**
		 * @return string
		 */
		public static function getError()
		{
			return static::$error;
		}

		/**
		 * @param string $error
		 */
		public static function setError(string $error)
		{
			static::$error = $error;
		}

		/**
		 * **********************************************************************************************************************
		 *                               其他
		 * **********************************************************************************************************************
		 */


		/**
		 * @param string $key
		 *
		 * @return string
		 */
		public static function makeKey(string $key)
		{
			return md5($key);
		}


		/**
		 * 重置类
		 */
		public static function reset()
		{
			static::clearGroup();
			static::clearRule();
			static::clearGlobalParams(null);
		}


		/**
		 * 通过类创建逻辑闭包
		 * 通过函数创建逻辑闭包
		 *
		 * @param       $func
		 * @param array $parameter
		 *
		 * @return \Closure
		 */
		public static function createClosure($func , $parameter = [])
		{
			return function() use ($func , $parameter) {
				return call_user_func_array($func , $parameter);
			};
		}


		/**
		 * 闭包事物构造器
		 *
		 * @param callable $startTrans     启动事物注册方法
		 * @param callable $commit         提交事物注册方法
		 * @param callable $rollback       回滚事物注册方法
		 * @param array    $list           事物列表
		 * @param string   $err            当事物执行失败时返回的错误信息
		 * @param null     $globalVariable 每个事物都可以作用到的共享变量，会push到每个事物元素的参数上
		 *
		 * @return bool
		 */
		public static function execClosureList(callable $startTrans , callable $commit , callable $rollback , $list = [] , &$err = null , &$globalVariable = null)
		{
			/*	参数和错误信息可不传
			 * 		[
						[
							function($a, $b) {
								//执行成功返回真
							} ,
							array(
								1 ,
								2 ,
							) ,
							'error massage'
						] ,
						[
							function($a, $b) {
								//执行成功返回真
							} ,
							array(
								1 ,
								2 ,
							) ,
						] ,
					];

			 * */
			call_user_func($startTrans);
			try
			{
				$flag = true;

				while (($flag !== false) && ($closure = array_shift($list)))
				{
					//没传参数设置参数为空数组
					!is_array($closure[1]) && $closure[1] = [];
					//传全局全局变量吧全局变量push到参数列表
					!is_null($globalVariable) && $closure[1][] = &$globalVariable;

					//执行闭包
					$flag = call_user_func_array($closure[0] , $closure[1]);

					($flag === false) && is_string($closure[2]) && ($err = $closure[2]);
				}

				($flag !== false) ? call_user_func($commit) : call_user_func($rollback);

				return $flag;
			} catch (\Exception $e)
			{
				call_user_func($rollback);
				$err = $e->getMessage();

				return false;
			}
		}


	}





	/*

							Auth::addRule('test1' , [
								function() {
									Auth::setGlobalParams('test1' , 'group1');

									return true;
								} ,
								array(
									1 ,
									2 ,
								) ,
								'error massage111' ,
							]);

							Auth::addRule('test2' , [
								function() {
									$n = Auth::getGlobalParams('test1');

									return false;
								} ,
								array(
									1 ,
									2 ,
								) ,
								'error massage222' ,
							]);

							Auth::pushGroup('test1' , 'group1');
							Auth::pushGroup('test2' , 'group1');

							Auth::pushGroup('test1' , 'group2');
							Auth::pushGroup('test2' , 'group2');

							$a = Auth::getGroup('group1');
							$a = Auth::getGroup('group2');

							Auth::delGroupRule('test1' , 'group1');
							Auth::delGroup('group2');

							$a = Auth::getGroup('group2');

							$a = Auth::execRule('test1');
							$a = Auth::execRule('test2');

							$a = Auth::getError();
				*/