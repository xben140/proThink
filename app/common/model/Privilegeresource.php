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
		 *  根据用id查权限id
		 * @access public
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
		 *  根据角色id查权限id
		 * @access public
		 *
		 * @param array $rolesId
		 *
		 * @return array
		 */
		public function getPrivilegeIdByroleid($rolesId = [])
		{

			/*
SELECT
    a.privilege_id
FROM
    `ithink_role_privilege` a
WHERE role_id IN (1, 5)
			*/

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


		/**
		 *  用户id查菜单
		 * @access public
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
		 *  根据权限id和对应类型查 资源表的id
		 *
		 * @param array  $PrivilegeresourceId
		 * @param string $index 资源类型
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getReourceIdByResourceIndexAndPrivilegeId($PrivilegeresourceId = [] , $index)
		{

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

			return $data;
		}


		/**
		 *  根据资源id和对应类型查 资源
		 *
		 * @param array  $id    ithink_privilege_resource表的id
		 * @param string $index 资源类型
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getReourceByResourceIndexAndId($id = [] , $index)
		{
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
				'where' => function($query) use ($id) {
					$query->whereOr([
						self::makeSelfAliasField('is_common') => [
							'=' ,
							'1' ,
						] ,
					])->whereOr([
						self::makeSelfAliasField('id') => [
							'in' ,
							$id ,
						] ,

					]);
				} ,
			]);

			$data = $model->fetchSql(0)->select();

			return $data;
		}


		/**
		 *  根据权限id和对应类型查资源
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

			$resourceId = $this->getReourceIdByResourceIndexAndPrivilegeId($PrivilegeresourceId , $index);
			$data = $this->getReourceByResourceIndexAndId($resourceId , $index);

			return $data;
		}


	}











	