<?php

	namespace auth\permission;

	use auth\BaseRule;

	class Rule extends BaseRule
	{

		/**
		 *    验证是否访问的地址有没有权限
		 *
		 * @param $currentAction
		 * @param $menuMap
		 *
		 * @return bool
		 */
		public static function authPrivilege($currentAction , $menuMap)
		{
			return in_array($currentAction , $menuMap);
		}

	}