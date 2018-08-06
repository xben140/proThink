<?php

	namespace rbac;

	/**
	 * Class entity
	 * @package rbac
	 */
	class rbac
	{
		public static $class = [
			'map'    => [
				'roleToPrivilege' => \rbac\map\roleToPrivilege::class ,
				'userToRole'      => \rbac\map\userToRole::class ,
			] ,
			'entity' => [
				'privilege' => \rbac\entity\privilege::class ,
				'role'      => \rbac\entity\role::class ,
				'user'      => \rbac\entity\user::class ,
			] ,
		];

		public $objMap = [];


		/**
		 * @param $key
		 *
		 * @return entityBase mixed
		 */
		public function getEntityObj($key)
		{
			if(!isset($this->objMap[$key]))
			{
				$this->objMap[$key] = new self::$class['entity'][$key];
			}

			return $this->objMap[$key];
		}

		public function __get($name)
		{
			return $this->getEntityObj($name);
		}
	}






















