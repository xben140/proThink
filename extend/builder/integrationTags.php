<?php

	namespace builder;

	/**
	 * Class integrationTags
	 * @package builder
	 */
	class integrationTags
	{
		/**
		 * ********************************************************************************************************************************************************************
		 * ********************************************************************************************************************************************************************
		 *                                                表格段
		 * ********************************************************************************************************************************************************************
		 * ********************************************************************************************************************************************************************
		 */

		/**
		 * 生成一个td
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function td($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::td()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}

		/**
		 * 生成一个tr
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function tr($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::tr()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}


		/**
		 * 生成每个表格前的复选框
		 * @return array
		 */
		public static function tdCheckbox()
		{
			$doms = elementsFactory::rowCheckbox()->make(function(&$doms , $_this) { $_this->setNodeValue([]); });

			return $doms;
		}

		/**
		 * 生成一个简单的td，里面一个字段用span标签
		 * 'name'     => 'name:' ,
		 * 'value'    => '234' ,
		 * 'editable' => '1' ,
		 * 'field'    => 'fieldname' ,
		 * 'reg'      => '/^\d{1,4}$/' ,
		 * 'msg'      => '请填写合法手机号码' ,
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function tdSimple($params)
		{
			$doms = [];
			//如果设置标签名字
			isset($params['name']) && ($doms[] = elementsFactory::doubleLabel('span' , function(&$doms) use ($params) {
				$doms[] = $params['name'];
			} , ['class' => 'name' ,]));

			$attr = [];
			//如果可以编辑
			if(isset($params['editable']) && $params['editable'])
			{
				$attr['class'] = "td-modify name";
				$attr['data-field'] = $params['field'];
				isset($params['reg']) && $attr['data-reg'] = $params['reg'];
				isset($params['msg']) && $attr['data-msg'] = $params['msg'];
			}
			else
			{
				$attr['class'] = " name";
			}

			$doms[] = elementsFactory::doubleLabel('span' , function(&$doms) use ($params) {
				$doms[] = $params['value'];
			} , $attr);

			return $doms;
		}

		/**
		 * 生成一个简单的td，里面一个字段里面加textarea
		 * 'style'     => 'width:80%' ,
		 * 'name'     => 'name:' ,
		 * 'value'    => '234' ,
		 * 'editable' => '1' ,
		 * 'field'    => 'fieldname' ,
		 * 'reg'      => '/^\d{1,4}$/' ,
		 * 'msg'      => '请填写合法手机号码' ,
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function tdTextarea($params)
		{
			$doms = [];
			//如果设置标签名字
			isset($params['name']) && ($doms[] = elementsFactory::doubleLabel('span' , function(&$doms) use ($params) {
				$doms[] = $params['name'];
			} , ['class' => 'name' ,]));

			$attr = [];
			//如果可以编辑
			if(isset($params['editable']) && $params['editable'])
			{
				$attr['class'] = "td-modify";
				$attr['data-field'] = $params['field'];
				isset($params['reg']) && $attr['data-reg'] = $params['reg'];
				isset($params['msg']) && $attr['data-msg'] = $params['msg'];
			}
			else
			{
				$attr['disabled'] = "disabled";
				$attr['class'] = " name";
			}

			isset($params['style']) && $attr['style'] = $params['style'];


			$doms[] = elementsFactory::doubleLabel('textarea' , function(&$doms) use ($params) {
				$doms[] = $params['value'];
			} , $attr);

			return $doms;
		}

		/**
		 * 生成一个简单的td，里面加编辑删除详情等按钮
		 *
		 * @param array $buttons
		 *
		 * @return array
		 */
		public static function tdButton($buttons)
		{
			$doms = [];

			$doms[] = elementsFactory::button()->make(function(&$doms , $_this) use ($buttons) {
				$_this->setNodeValue($buttons);
			});

			return $doms;

		}


		/**
		 * 生成一个简单的td，里面加switcher
		 *
		 * @param $params
		 *
		 * @return array
		 */
		public static function tdSwitcher($params)
		{
			$doms = [];

			isset($params['name']) && ($doms[] = elementsFactory::doubleLabel('span' , function(&$doms) use ($params) {
				$doms[] = $params['name'];
			} , []));

			$doms[] = elementsFactory::switcher()->make(function(&$doms , $_this) use ($params) {
				$_this->isAuto($params['is_auto']);
				$_this->setNodeValue($params['params']);
			});

			return $doms;
		}

		/**
		 * 生成一个简单的td，里面加switcher
		 *
		 * @param $params
		 *
		 * @return array
		 */
		public static function tdSelect($params)
		{
			$doms = [];

			isset($params['field_name']) && ($doms[] = elementsFactory::doubleLabel('span' , function(&$doms) use ($params) {
				$doms[] = $params['field_name'];
			} , ['class' => 'name',]));

			$doms[] = elementsFactory::select()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue(['field' => $params['name']]);
				$_this->setOptions($params['options'] , $params['selected']);
			});

			return $doms;
		}


		/**
		 * *****************************
		 * *****************************
		 *                              表单段搜索框
		 * *****************************
		 * *****************************
		 */

		/**
		 * searchFormCol
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function searchFormCol($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormCol()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}


		/**
		 * searchFormRadio
		 *
		 * @param array  $options
		 * @param        $name
		 * @param string $field_name
		 * @param string $selected
		 *
		 * @return array
		 */
		public static function searchFormRadio($options , $name , $field_name = '' , $selected = '')
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormRadio()->make(function(&$doms , $_this) use ($options , $name , $field_name , $selected) {
				$_this->setOption($options , $name , $field_name , $selected);
			});

			return $doms;
		}

		/**
		 * searchFormCheckbox
		 *
		 * @param        $options
		 * @param        $name
		 * @param string $field_name
		 * @param array  $selected
		 *
		 * @return array
		 */
		public static function searchFormCheckbox($options , $name , $field_name = '' , $selected = [])
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormCheckbox()->make(function(&$doms , $_this) use ($options , $name , $field_name , $selected) {
				$_this->setOption($options , $name , $field_name , $selected);
			});

			return $doms;
		}


		/**
		 * searchFormSelect
		 *
		 * @param array  $options
		 * @param        $name
		 * @param        $field_name
		 * @param array  $selected
		 *
		 * @return array
		 */
		public static function searchFormSelect($options , $name , $field_name , $selected = [])
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormSelect()->make(function(&$doms , $_this) use ($options , $name , $field_name , $selected) {
				$_this->setOption($options , $name , $field_name , $selected);
			});

			return $doms;
		}

		/**
		 * searchFormText
		 *
		 * @param        $params
		 *
		 * @return array
		 */
		public static function searchFormText($params)
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormText()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});


			return $doms;
		}


		/**
		 * searchFormRange
		 *
		 * @param        $params
		 *
		 * @return array
		 */
		public static function searchFormRange($params)
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormRange()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});


			return $doms;
		}

		/**
		 * searchFormDate
		 *
		 * @param        $params
		 *
		 * @return array
		 */
		public static function searchFormDate($params)
		{
			$doms = [];
			$doms[] = elementsFactory::searchFormDate()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}



		/**
		 * ********************************************************************************************************************************************************************
		 * ********************************************************************************************************************************************************************
		 *                                                表单段
		 * ********************************************************************************************************************************************************************
		 * ********************************************************************************************************************************************************************
		 */

		/**
		 * basicFrame
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function basicFrame($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::basicFrame()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}

		/**
		 * 生成一个row
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function row($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::row()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}

		/**
		 * 生成一个rowBlock
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function rowBlock($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::rowBlock()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}

		/**
		 * 生成一个form
		 *
		 * @param string $contents
		 * @param        $params
		 *
		 * @return array
		 */
		public static function form($contents = null , $params = null)
		{
			$doms = [];
			$doms[] = elementsFactory::form()->make(function(&$doms , $_this) use ($contents , $params) {
				$_this->setNodeValue($params);

				foreach ($contents as $k => $v)
				{
					if(is_string($contents[$k]))
					{
						$doms[] = $contents[$k];
					}
					elseif(is_array($contents[$k]))
					{
						$doms = array_merge($doms , $contents[$k]);
					}
				}
			});

			return $doms;
		}


		/**
		 * 静态字段
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function staticText($params)
		{
			$doms = [];

			$doms[] = elementsFactory::staticText()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * 静态字段
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function text($params)
		{
			$doms = [];

			$doms[] = elementsFactory::text()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}

		/**
		 * 密码字段
		 *
		 * @param array $params
		 * @param int   $isNeedConfirm
		 *
		 * @return array
		 */
		public static function password($params , $isNeedConfirm = 0)
		{
			$doms = [];

			$doms[] = elementsFactory::password()->make(function(&$doms , $_this) use ($params , $isNeedConfirm) {
				$_this->isNeedConfirm($isNeedConfirm);
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * inlineCheckbox
		 *
		 * @param        $options
		 * @param        $name
		 * @param        $fieldName
		 * @param string $tips
		 * @param array  $selected
		 *
		 * @return array
		 */
		public static function inlineCheckbox($options , $name , $fieldName , $tips = '' , $selected = [])
		{
			$doms = [];

			$doms[] = elementsFactory::inlineCheckbox()->make(function(&$doms , $_this) use ($options , $name , $fieldName , $tips , $selected) {
				$_this->setOption($options , $name , $fieldName , $tips , $selected);
			});

			return $doms;
		}


		/**
		 * inlineRadio
		 *
		 * @param        $options
		 * @param        $name
		 * @param        $fieldName
		 * @param string $tips
		 * @param string $selected
		 *
		 * @return array
		 */
		public static function inlineRadio($options , $name , $fieldName , $tips = '' , $selected = '')
		{
			$doms = [];

			$doms[] = elementsFactory::inlineRadio()->make(function(&$doms , $_this) use ($options , $name , $fieldName , $tips , $selected) {
				$_this->setOption($options , $name , $fieldName , $tips , $selected);
			});

			return $doms;
		}


		/**
		 * blockCheckbox
		 *
		 * @param        $options
		 * @param        $name
		 * @param        $fieldName
		 * @param string $tips
		 * @param array  $selected
		 *
		 * @return array
		 */
		public static function blockCheckbox($options , $name , $fieldName , $tips = '' , $selected = [])
		{
			$doms = [];

			$doms[] = elementsFactory::blockCheckbox()->make(function(&$doms , $_this) use ($options , $name , $fieldName , $tips , $selected) {
				$_this->setOption($options , $name , $fieldName , $tips , $selected);
			});

			return $doms;
		}


		/**
		 * blockRadio
		 *
		 * @param        $options
		 * @param        $name
		 * @param        $fieldName
		 * @param string $tips
		 * @param string $selected
		 *
		 * @return array
		 */
		public static function blockRadio($options , $name , $fieldName , $tips = '' , $selected = '')
		{
			$doms = [];

			$doms[] = elementsFactory::blockRadio()->make(function(&$doms , $_this) use ($options , $name , $fieldName , $tips , $selected) {
				$_this->setOption($options , $name , $fieldName , $tips , $selected);
			});

			return $doms;
		}


		/**
		 * singleSelect
		 *
		 * @param        $options
		 * @param        $name
		 * @param        $fieldName
		 * @param string $tips
		 * @param string $selected
		 *
		 * @return array
		 */
		public static function singleSelect($options , $name , $fieldName , $tips = '' , $selected = '')
		{
			$doms = [];

			$doms[] = elementsFactory::singleSelect()->make(function(&$doms , $_this) use ($options , $name , $fieldName , $tips , $selected) {
				$_this->setOption($options , $name , $fieldName , $tips , $selected);
			});

			return $doms;
		}


		/**
		 * switchery
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function switchery($params)
		{
			$doms = [];

			$doms[] = elementsFactory::switchery()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * singleDate
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function singleDate($params)
		{
			$doms = [];

			$doms[] = elementsFactory::singleDate()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * betweenDate
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function betweenDate($params)
		{
			$doms = [];

			$doms[] = elementsFactory::betweenDate()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * textarea
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function textarea($params)
		{
			$doms = [];

			$doms[] = elementsFactory::textarea()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}


		/**
		 * uediter
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function uediter($params)
		{
			$doms = [];

			$doms[] = elementsFactory::uediter()->make(function(&$doms , $_this) use ($params) {
				$_this->setNodeValue($params);
			});

			return $doms;
		}

		/**
		 * 隐藏域
		 *
		 * @param array $params
		 *
		 * @return array
		 */
		public static function hidden($params)
		{
			$doms = [];
			$str = tagConstructor::buildKV($params);

			$doms[] = elementsFactory::singleLabel('<input type="hidden" ' . $str . '>');

			return $doms;
		}


		/**
		 * 文件上传
		 *
		 * @param string $type 上传类型 0 单文件，1 多文件，2 单图片（default），3 多图片，
		 * @param array  $params
		 * @param array  $eventMap
		 * @param array  $optionMap
		 *
		 * @return array
		 */
		public static function upload($type , $params = [] , $eventMap = [] , $optionMap = [])
		{
			$map = [
				'uploadSingleFile',
				'uploadMutilFile',
				'uploadSingleImg',
				'uploadMutilImg',
			];

			$class = isset($map[$type]) ? $map[$type]:$map[2];
			$doms[] = elementsFactory::{$class}()->make(function(&$doms , $_this) use($params, $eventMap, $optionMap) {
				$_this->setOption($params);
				$_this->setEventMap($eventMap);
				$_this->setOptionMap($optionMap);
			});

			return $doms;
		}


	}

