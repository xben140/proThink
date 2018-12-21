<?php

/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace db;

	class Db
	{

		public static function exec($sql , callable $callback , &$err = null)
		{
			$res = true;
			try
			{
				$res = call_user_func_array($callback , [
					$sql ,
					&$err ,
				]);
			} catch (\Exception $e)
			{
				$res = false;
				$err = $e->getMessage();
			}

			return $res;

		}


		public static function parseSql($sql)
		{
			//读取SQL文件
			$sql = preg_replace('/(^[ \t]*|[ \t]*$)/im', '', $sql);
			$sql = str_replace("\r" , "\n" , $sql);
			$sql = preg_split('/;[\r\n]+/im' , $sql , -1 , PREG_SPLIT_NO_EMPTY);

			return $sql;
		}


	}