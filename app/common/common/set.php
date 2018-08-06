<?php

	namespace app\common\common;

	trait set
	{
		//性别映射 性别;0:保密,1:男,2:女
		public static $sexMap = [
			'保密' ,
			'男' ,
			'女' ,
		];

		//status状态映射  0:禁用, 1:正常, 2:已删除
		public static $statusMap = [
			'禁用' ,
			'正常' ,
			'已删除' ,
		];

		/**
		 * @param string $name $this->model_User,
		 *
		 * @return \think\Model
		 * @throws \Exception
		 */
		public function __get($name)
		{
			$result = explode('__', $name);

			if(!isset($result[0]) || !isset($result[1]))
			{
				$msg = $result.'  -- 属性命名不规范,示例: model__Admin_User, logic__User, logic__common_UserType ...';
				exception($msg);
			}

			$layerName = $result[0];
			$modelName = strtr($result[1], ['_' => '/']);

			/** @var TYPE_NAME $modelName */
			return model($modelName, $layerName);
		}
	}