<?php

	namespace app\common\model;

	use think\Loader;

	class Privilegeresource extends ModelBase
	{
		public $name = 'privilege_resource';

		/**
		 *  初始化模型
		 * @access public
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		/**
		 *  用户id  --> 菜单
		 *
		 * @param $userId
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getMenusByUserId($userId)
		{
			//权限id
			$privilegesId = $this->getPrivilegeIdByUserId($userId);

			//动态id
			//TODO

			//根据权限id和资源索引查资源
			$data = $this->getReourceByResourceIndexAndPrivilegeId($privilegesId , RESOURCE_INDEX_MENU);

			return $data;
		}


		/**
		 *  用户id  --> 权限ids
		 *
		 * @param $id
		 *
		 * @return array
		 */
		public function getPrivilegeIdByUserId($id)
		{
			$rolesId = $this->model__common_role->getRoleIdByUserId($id);
			$data = $this->getPrivilegeIdByroleid($rolesId);

			return $data;
		}


		/**
		 *  权限ids + 对应类型 --> 资源
		 *
		 * @param array $PrivilegeresourceId
		 * @param       $index
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getReourceByResourceIndexAndPrivilegeId($PrivilegeresourceId = [] , $index)
		{
			$PrivilegeresourceId = array_flip(array_flip($PrivilegeresourceId));

			$resourceId = $this->getReourceIdByResourceIndexAndPrivilegeId($PrivilegeresourceId , $index);
			$data = $this->getReourceByResourceIndexAndId($resourceId , $index);

			return $data;
		}


		/**
		 *  权限ids + 对应类型 --> 资源ids
		 *
		 * @param array $PrivilegeresourceId
		 * @param       $index
		 *
		 * @return array
		 */
		public function getReourceIdByResourceIndexAndPrivilegeId($PrivilegeresourceId = [] , $index)
		{
			$PrivilegeresourceId = array_flip(array_flip($PrivilegeresourceId));
			$where = [
				self::makeSelfAliasField('id') => [
					'in' ,
					$PrivilegeresourceId ,
				] ,

				self::makeSelfAliasField('resource_type') => [
					'=' ,
					$index ,
				] ,
			];

			$condition = [
				'where' => $where ,
				//'field' => self::makeSelfAliasField('resource_id') ,
				'alias' => self::$currentTableAlias ,
			];

			$this->setCondition($condition);

			$data = $this->fetchSql(0)->column(self::makeSelfAliasField('resource_id'));
			$data = array_flip(array_flip($data));

			return $data;
		}


		/**
		 *  资源ids + 对应类型 --> 权限ids
		 *
		 * @param array $resourceId
		 * @param       $index
		 *
		 * @return array
		 */
		public function getPrivilegesIdByResourceIndexAndResourceId($resourceId = [] , $index)
		{
			$resourceId = array_flip(array_flip($resourceId));
			$where = [
				self::makeSelfAliasField('resource_id') => [
					'in' ,
					$resourceId ,
				] ,

				self::makeSelfAliasField('resource_type') => [
					'=' ,
					$index ,
				] ,
			];

			$condition = [
				'where' => $where ,
				//'field' => self::makeSelfAliasField('resource_id') ,
				'alias' => self::$currentTableAlias ,
			];

			$this->setCondition($condition);

			$data = $this->fetchSql(0)->column(self::makeSelfAliasField('id'));
			$data = array_flip(array_flip($data));

			return $data;
		}


		/**
		 *  资源ids + 对应类型 --> 资源
		 *
		 * @param array  $ids   ithink_privilege_resource表的id
		 * @param string $index 资源类型
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getReourceByResourceIndexAndId($ids = [] , $index)
		{
			$ids = array_flip(array_flip($ids));
			$model = $this->{'model__common_' . Loader::parseName(strtr(RESOURCE_MAP[$index] , ['_' => '']) , 1)};;

			$where = [
				self::makeSelfAliasField('status') => [
					'=' ,
					'1' ,
				] ,
			];

			$condition = [
				'field' => '*' ,
				'alias' => self::$currentTableAlias ,
				'where' => $where ,
			];

			$model->setCondition($condition);

			$model->setCondition([
				'where' => function($query) use ($ids) {
					$query->whereOr([
						self::makeSelfAliasField('is_common') => [
							'=' ,
							'1' ,
						] ,
					])->whereOr([
						self::makeSelfAliasField('id') => [
							'in' ,
							$ids ,
						] ,

					]);
				} ,
			]);

			$data = $model->fetchSql(0)->select();

			return $data;
		}


		/**
		 *  角色ids --> 权限ids
		 * @access public
		 *
		 * @param array $rolesId
		 *
		 * @return array
		 */
		public function getPrivilegeIdByroleid($rolesId = [])
		{
			$rolesId = array_flip(array_flip($rolesId));
			$where = [
				'role_id' => [
					'in' ,
					$rolesId ,
				] ,
			];

			$data = db('role_privilege')->where($where)->column('privilege_id');
			$data = array_flip(array_flip($data));

			return $data;
		}


	}











	