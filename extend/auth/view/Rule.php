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



	namespace auth\view;

	use auth\BaseRule;

	class Rule extends BaseRule
	{

		public $rules = array();


		/**
		 *    验证是否访问的地址有没有权限
		 *
		 * @param string $uri     控制器里的方法 admin/index/index
		 * @param array  $status  验证规则
		 * @param string $element 对应那个元素
		 *
		 * @return array
		 */
		public function getRule($uri , $status , $element)
		{
			$rule = $this->getRules($uri);
			$results = $this->parseRules($rule , $status , $element);

			return $results;
		}

		/**
		 * 解析替换规则
		 *
		 * @param array $rules
		 * @param       $status
		 * @param       $element
		 *
		 * @return array
		 */
		public function parseRules($rules , $status , $element): array
		{

			$tempDatas = $rules['data'];
			//角色枚举标识
			foreach ($rules['order'] as $k => $v)
			{
				$value = $status[$v];
				$t = $tempDatas[$value];
				if(is_array($t))
				{
					$tempDatas = $t;
				}
				elseif(is_string($t))
				{
					$tempDatas = $rules['abbr'][$t];
				}
			}

			$t = $tempDatas[$element];

			$res = [];
			if(is_array($t))
			{
				$res = $t;
			}
			elseif(is_string($t))
			{
				$res = $rules['abbr'][$t];
			}

			return $res;
		}

		/**
		 * @param null $key
		 *
		 * @return array
		 */
		public function getRules($key = null): array
		{
			return isset($this->rules[$key]) ? $this->rules[$key] : $this->rules;
		}

		/**
		 * @param array $rules
		 *
		 * @return Rule
		 */
		public function setRules(array $rules)
		{
			$this->rules = $rules;

			return $this;
		}

	}