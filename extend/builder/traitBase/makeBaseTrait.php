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



	namespace builder\traitBase;

	/**
	 * Trait makeBaseTrait
	 * 生成器基类
	 * @package builder\lib
	 */
	trait makeBaseTrait
	{

		/*
		 *
		 *
		 *
		 * 方法
		 *
		 *
		 *
		 *
		 * */

		/**
		 * 内容追加到指定标签里待替换
		 *
		 * @param $tag
		 * @param $contents
		 */
		public function append($tag, $contents)
		{
			$this->contentsNodes[$tag] .= $contents . "\r\n\r\n";
		}

		/**
		 *
		 * @param string $tag 标签
		 * @param array  $map 数组对应要要追加的内容
		 */
		public function appends($tag, $map)
		{
			foreach ($map as $k => $v)
			{
				$this->append($tag, $v);
			}
		}


		/**
		 * 标签和替换内容键值对形式的数组
		 *
		 * @param array $map
		 *
		 * @return string
		 */
		public function replaceTags(array $map)
		{
			foreach ($map as $k => $v)
			{
				$this->replaceTag($k, $v);
			}
		}


		/**
		 * 同一个标签，对应内容数组替换
		 *
		 * @param string $tag 标签名字
		 * @param string|array $contents 要替换的内容
		 */
		public function multiReplaceTag($tag, $contents)
		{
			if(is_string($contents))
			{
				$this->replaceTag($tag, $contents);
			}
			elseif(is_array($contents))
			{
				foreach ($contents as $v)
				{
					$this->replaceTag($tag, $v);
				}
			}
		}


		/**
		 *自动指定标签替换为内容
		 */
		public function autoReplaceStr()
		{
			$this->replaceTags($this->contentsNodes);
		}

		/**
		 * 获取自己属性路径下的内容 (没用)
		 *
		 * @return bool|string
		 */
		public function getContentsFromTemplate()
		{
			return is_dir($this->path) ? file_get_contents($this->path) : '';
		}

		/**
		 *
		 * 设置自己路径属性地址
		 *
		 * @param $path
		 *
		 * @return $this
		 */
		public function setTemplatePath($path)
		{
			$this->path = $path;

			return $this;
		}

		/**
		 * 返回已经处理好的内容
		 *
		 * @return string
		 */
		public function getContents()
		{
			$this->beforeGetContents($this);

			return $this->contents;
		}

		/**
		 * 返回内容之前的回调，在子类实现
		 *
		 * @param $obj
		 */
		public function beforeGetContents($obj)
		{

		}

		/**
		 * 设置此类的文本
		 * 构造方法里调
		 *
		 * @param $contents
		 *
		 * @return mixed
		 */
		public function setContents($contents)
		{
			return $this->contents = $contents;
		}

		/**
		 * 指定标签替换为内容
		 *
		 * @param $tag (~~~TAG~~~)
		 * @param $contents
		 *
		 * @return string
		 */
		public function replaceTag($tag , $contents)
		{
			 $this->contents=  static::replaceTagBase($tag , $contents, $this->contents);
		}

		public static function replaceTagBase($tag , $contents, $subject)
		{
			$regex = '/<!--\s*(\S)?\s*'.$tag.'\s*(\S)?\s*-->/i';

			//构造匹配那个tag的正则
			preg_match($regex, $subject, $res);

			//如果有分组1或者分组2则需要追加
			if(isset($res[1]) || isset($res[2]) )
			{
				$contents .= "\r\n<!-- ! " . $tag . " -->\r\n";
			}

			return $subject = preg_replace($regex , $contents  , $subject);
		}

		/**
		 * 添加tag到模板里替换
		 *
		 * @param string|array $tag      标签名字，会自动转为 ~~~tag~~~
		 * @param string $contents 要替换的内容
		 *
		 * @return $this
		 */
		public function setNodeValue($tag, $contents = '')
		{
			//替换表单里需要替换的变量

			if(is_string($tag))
			{
				$tag = self::makeNodeName($tag);
				$this->contentsNodes[$tag] = $contents;
			}
			elseif(is_array($tag))
			{
				foreach ($tag as $k =>$v) {
					$tag = self::makeNodeName($k);
					$this->contentsNodes[$tag] = $v;
				}
			}

			return $this;
		}


		/**
		 * 构造方法里的的回调
		 * 子类里实现
		 *
		 *
		 */
		protected function _init()
		{

		}


		/**
		 * 替换自己自己添加脚本的替换项
		 * @return string
		 */
		protected  function replaceCustomJsCssTag()
		{
			foreach ($this->contentsNodes as $k => $v)
			{
				$this->customCss = static::replaceTagBase($k , $v, $this->customCss);
				$this->customJs = static::replaceTagBase($k , $v, $this->customJs);
			}
		}


		/**
		 * 用户标签转换为模板里的替换tag
		 *
		 * @param $tag
		 *
		 * @return string
		 */
		protected static function makeNodeName($tag)
		{
			return '~~~' . ($tag) . '~~~';
		}

	}