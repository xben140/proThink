<?php

	namespace rbac;

	/**
	 * Class entity
	 * @package rbac
	 */
	abstract class entityBase
	{
		/**
		 * @var array 此表的字段
		 */
		public $field = [];

		/**
		 * @var array 当前对象每个字段数据
		 */
		public $data = [];


		/**
		 * @return array
		 */
		public function getField(): array
		{
			return array_keys($this->getData());
		}

		/**
		 * @param $key
		 *
		 * @return string
		 */
		public function getDataByKey($key): string
		{
			return isset($this->data[$key]) ? $this->data[$key] : null;
		}

		/**
		 * @param array $data
		 */
		public function setData(array $data): void
		{
			$this->data = $data;
		}

		/**
		 * @return array
		 */
		public function getData(): array
		{
			return $this->data;
		}

	}






















