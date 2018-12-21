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



	namespace base64;

	//https://github.com/conzi/php-base64

	/*
	$base64 = Base64_::getInstance('ABCDEFGHIJKLnopqrstuvwxyz012345MNOPQRSTUVWXYZabcdefghijklm6789+/' , '-');
	$a = $base64->encode('你红扥零三扥HLKJLGksdfsd234234aaaf');
	$b = $base64->decode('mLjNm7XPmVTS60bjmLPJmVTStEeLtReH1koR0UoRnQnhnQnhzxFO0N--');


	$base64 = Base64_::getInstance('ABCDEFGHIJKLnopqrsVWXYZabcdefghijklm6789+/tuvwxyz012345MNOPQRSTU' , '%');
	$a = $base64->encode('你红扥零三扥HLKJLGksdfsd234234aaaf');
	$b = $base64->decode('OL5jOQtlO+87Pcx5OLlJO+87VE0LV60HdMo6c9o6nmn3nmn3bZFkcj%%');
	*/


	/**
	 * Class Base64
	 * @package base64
	 */
	class Base64
	{
		/**
		 * @var string
		 */
		private $key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
		/**
		 * @var string
		 */
		private $paddingChar = '=';

		/**
		 * @var array
		 */
		private static $instance = [];

		/**
		 * @param string $_alpha
		 * @param string $paddingChar
		 *
		 * @return mixed
		 */
		public static function getInstance($_alpha = '' , $paddingChar = '')
		{
			$key = self::makeKey($_alpha . $paddingChar);
			!isset(self::$instance[$key]) && self::$instance[$key] = new static($_alpha , $paddingChar);

			return self::$instance[$key];
		}


		/**
		 * Base64 constructor.
		 *
		 * @param string $_alpha
		 * @param string $paddingChar
		 */
		private function __construct($_alpha = '' , $paddingChar = '')
		{
			(strlen($_alpha) == 64) && self::setKey($_alpha);
			(strlen($paddingChar) == 1) && self::setPaddingChar($paddingChar);
		}

		/**
		 * @param string $key
		 */
		private function setKey($key = '')
		{
			(strlen($key) == 64) && $this->key = $key;
		}

		/**
		 * @param string $paddingChar
		 */
		private function setPaddingChar(string $paddingChar)
		{
			(strlen($paddingChar) == 1) && $this->paddingChar = $paddingChar;
		}

		/**
		 * @param $str
		 * @param $i
		 *
		 * @return bool|int
		 */
		private function _getbyte64($str , $i)
		{
			$idx = strpos($this->key , $str[$i]);

			return $idx;
		}

		/**
		 * @param $s
		 * @param $i
		 *
		 * @return int
		 */
		private function _getbyte($s , $i)
		{
			$x = ord($s[$i]);
			if($x > 255)
			{
				trigger_error(" 输入的不是有效的 Base-64 字符串，因为它包含非 Base-64 字符、两个以上的填充字符，或者填充字符间包含非法字符" , E_USER_ERROR);
			}

			return $x;
		}

		/**
		 * @param string $s
		 *
		 * @return string
		 */
		public function encode($s = '')
		{
			$s = (string)$s;
			$x = array();
			$imax = strlen($s) - strlen($s) % 3;
			$b10 = 0;
			if(strlen($s) === 0)
			{
				return $s;
			}
			for ($i = 0; $i < $imax; $i += 3)
			{
				$b10 = ($this->_getbyte($s , $i) << 16) | ($this->_getbyte($s , $i + 1) << 8) | $this->_getbyte($s , $i + 2);
				$x[] = ($this->key[($b10 >> 18)]);
				$x[] = ($this->key[(($b10 >> 12) & 0x3F)]);
				$x[] = ($this->key[(($b10 >> 6) & 0x3f)]);
				$x[] = ($this->key[($b10 & 0x3f)]);
			}
			switch (strlen($s) - $imax)
			{
				case 1:
					$b10 = $this->_getbyte($s , $i) << 16;
					$x[] = ($this->key[($b10 >> 18)] . $this->key[(($b10 >> 12) & 0x3F)] . $this->paddingChar . $this->paddingChar);
					break;
				case 2:
					$b10 = ($this->_getbyte($s , $i) << 16) | ($this->_getbyte($s , $i + 1) << 8);
					$x[] = ($this->key[($b10 >> 18)] . $this->key[(($b10 >> 12) & 0x3F)] . $this->key[(($b10 >> 6) & 0x3f)] . $this->paddingChar);
					break;
			}

			return implode('' , $x);
		}

		/**
		 * @param string $s
		 *
		 * @return string
		 */
		public function decode($s = '')
		{

			$s = (string)$s;
			$pads = 0;
			$imax = strlen($s);
			$x = array();
			$b10 = 0;
			if($imax === 0)
			{
				return $s;
			}
			if($imax % 4 !== 0)
			{
				trigger_error(" 输入的不是有效的 Base-64 字符串，因为它包含非 Base-64 字符、两个以上的填充字符，或者填充字符间包含非法字符" , E_USER_ERROR);
			}
			if($s[$imax - 1] === $this->paddingChar)
			{
				$pads = 1;
				if($s[$imax - 2] === $this->paddingChar)
				{
					$pads = 2;
				}
				// either way, we want to ignore this last block
				$imax -= 4;
			}
			for ($i = 0; $i < $imax; $i += 4)
			{
				$b10 = ($this->_getbyte64($s , $i) << 18) | ($this->_getbyte64($s , $i + 1) << 12) | ($this->_getbyte64($s , $i + 2) << 6) | $this->_getbyte64($s , $i + 3);
				$x[] = (chr($b10 >> 16) . chr(($b10 >> 8) & 0xff) . chr($b10 & 0xff));
			}
			switch ($pads)
			{
				case 1:
					$b10 = ($this->_getbyte64($s , $i) << 18) | ($this->_getbyte64($s , $i + 1) << 12) | ($this->_getbyte64($s , $i + 2) << 6);
					$x[] = (chr($b10 >> 16) . chr(($b10 >> 8) & 0xff));
					break;
				case 2:
					$b10 = ($this->_getbyte64($s , $i) << 18) | ($this->_getbyte64($s , $i + 1) << 12);
					$x[] = (chr($b10 >> 16));
					break;
			}

			return implode('' , $x);
		}

		/**
		 * @param string $key
		 *
		 * @return string
		 */
		public static function makeKey(string $key)
		{
			return md5($key);
		}

	}
