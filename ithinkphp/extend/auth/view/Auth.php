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



	namespace auth\view;

	use auth\BaseAuth;
	use auth\Auth as AuthTool;

	class Auth extends BaseAuth
	{
		public static $instance = null;

		//组标识
		//角色，状态，类型。。。
		public static $tagMap = 'tagMap';

		//元素标识
		//每个元素
		public static $elementsMap = 'elementsMap';

		public $status = [];
		public $currentUri = null;


		public static function getInstance($options = [])
		{
			is_null(static::$instance) && (static::$instance = new static($options));

			return static::$instance;
		}

		public function __construct($options)
		{

		}

		/**
		 * **********************************************************************************************************************
		 *                               元素处理
		 * **********************************************************************************************************************
		 **/


		/**
		 * 注册标识
		 *
		 * @param  array $val
		 */
		public function registerElementsMark($val)
		{
			//角色枚举标识
			static::registerTag($val , static::$elementsMap);
		}


		/**
		 * **********************************************************************************************************************
		 *                               标识处理
		 * **********************************************************************************************************************
		 **/


		/**
		 * 指定标识赋值
		 *
		 * @param $key
		 * @param $val
		 */
		public function setTagMapMark($key , $val)
		{
			//添加角色数据
			$this->setProperties(static::getTag($key , static::$tagMap) , $val);
		}

		/**
		 * 指定标识取值
		 *
		 * @param $key
		 *
		 * @return array
		 */
		public function getTagMapMark($key)
		{
			//添加角色数据
			return $this->getProperties(static::getTag($key , static::$tagMap));
		}


		/**
		 * 自动注册标识
		 *
		 * @param  string     $key
		 * @param  array      $val
		 * @param  string|int $label
		 */
		public function autoRegisterTagMark($key , $val , $label)
		{
			//枚举标识
			$this->registerTagMark([$key => $label]);
			//数据
			$this->setTagMapMark($key , $val);
		}


		/**
		 * 批量自动注册标识
		 *
		 * @param array $data
		 */
		public function autoRegisterTagMarkArray($data = [])
		{
			foreach ($data as $k => $v)
			{
				//枚举标识
				$this->registerTagMark([$v['key'] => $v['label']]);
				//数据
				$this->setTagMapMark($v['key'] , $v['value']);
			}
		}


		/**
		 * 注册标识
		 *
		 * @param  array $val
		 */
		public function registerTagMark($val)
		{
			//角色枚举标识
			static::registerTag($val , static::$tagMap);
		}


		/**
		 * **********************************************************************************************************************
		 *                               验证
		 * **********************************************************************************************************************
		 */


		/**
		 * 注册标识
		 *
		 * @param string $element 对应验证的元素
		 * @param string $type    元素对应的属性值，是否显示，是否启用等
		 *
		 * @return mixed
		 */
		public function checkRule($element , $type)
		{
			$obj = controller(static::makeRuleClassName());

			AuthTool::addRule('setRules' , [
				static::callDynamic($obj , 'setRules') ,
				[
					config('rule') ,
				] ,
				'规则文件读取出错' ,
			]);

			AuthTool::addRule('getRule' , [
				static::callDynamic($obj , 'getRule') ,
				[
					$this->currentUri ,
					$this->status ,
					$element ,
				] ,
				'规则获取出错' ,
			]);

			AuthTool::pushGroup('setRules' , 'calcRules');
			AuthTool::pushGroup('getRule' , 'calcRules');

			$rules = AuthTool::execGroup('calcRules');

			$res = $rules[1]['result'][$type];

			return $res;

		}

		/**
		 * 设置状态
		 *
		 * @param array $status 各个状态值
		 *
		 * @return Auth
		 */
		public function setStatus($status)
		{
			$this->status = $status;

			return $this;
		}


		/**
		 * 设置当前uir，那个方法
		 *
		 * @param null $currentUri
		 *
		 * @return Auth
		 */
		public function setCurrentUri($currentUri)
		{
			$this->currentUri = $currentUri;

			return $this;
		}




		/**
		 * **********************************************************************************************************************
		 *                               标识管理
		 * **********************************************************************************************************************
		 */


		/**
		 * @param array  $tags
		 * @param string $group
		 */
		public static function registerTag($tags = [] , $group = 'base')
		{
			foreach ($tags as $k => $v)
			{
				\auth\Auth::setGlobalParams($k , $v , $group);
			}
		}

		/**
		 * @param        $key
		 * @param string $group
		 *
		 * @return array|bool
		 */
		public static function getTag($key , $group = 'base')
		{
			return \auth\Auth::getGlobalParams($key , $group);
		}

		/**
		 * @param string $group
		 *
		 * @return array|bool
		 */
		public static function getGroupTag($group = 'base')
		{
			return \auth\Auth::getGlobalParamsByGroupName($group);
		}

		/**
		 * **********************************************************************************************************************
		 *                               其他
		 * **********************************************************************************************************************
		 */


	}