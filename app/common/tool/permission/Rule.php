<?php

	namespace app\common\tool\permission;

	use app\common\tool\BaseRule;

	class Rule extends BaseRule
	{

		/**
		 *	验证是否访问的地址有没有权限
		 * @param $currentAction
		 * @param $menuMap
		 *
		 * @return bool
		 */
		public static function authPrivilege($currentAction , $menuMap)
		{
			return in_array($currentAction , $menuMap);
		}


		/**
		 *	验证是否访问的地址有没有权限
		 * @param $currentAction
		 * @param $menuMap
		 *
		 * @return bool
		 */
		public function authPrivilege_($currentAction , $menuMap)
		{
			return in_array($currentAction , $menuMap);
		}

	}