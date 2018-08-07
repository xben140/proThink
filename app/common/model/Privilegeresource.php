<?php

	namespace app\common\model;

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
			$privilegesId = $this->getPrivilegeIdByUserId($userId);

			return $this->getReourceByResourceIndexAndPrivilegeId($privilegesId , RESOURCE_INDEX_ELEMENT);
		}


		/**
		 *  根据权限id和对应类型查资源
		 *
		 * @param array  $PrivilegeresourceId
		 * @param string $index 资源类型
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getReourceByResourceIndexAndPrivilegeId($PrivilegeresourceId = [] , $index)
		{
			/*
			SELECT
				b.*
			FROM
				`ithink_privilege_resource` a
				LEFT JOIN `ithink_resource_menu` b
					ON a.`resource_id` = b.id
			WHERE a.`resource_type` = 1
				AND a.id IN (1, 2, 4, 6) ;
			*/


			$join = [

				[
					'ithink_resource_menu b' ,
					self::makeSelfAliasField('resource_id') . ' = b.id ' ,
					'left' ,
				] ,

			];

			$where = [
				'b.status' => [
					'=' ,
					'1' ,
				] ,

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
				'join'  => $join ,
				'where' => $where ,
				'field' => 'b.*' ,
				'alias' => self::$currentTableAlias
			];

			$this->setCondition($condition);

			$data = $this->fetchSql(0)->select();

			return $data;
		}


	}











	