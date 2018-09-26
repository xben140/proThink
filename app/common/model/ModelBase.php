<?php

	namespace app\common\model;

	use app\common\common\set;
	use think\Model;

	class ModelBase extends Model
	{
		use set;

		//所有当前表的别名都统一
		public static $currentTableAlias = 'curr_tab';

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
		 * **********************************************************************************
		 * **********************************************************************************
		 *                                                增
		 * **********************************************************************************
		 * **********************************************************************************
		 */

		/**
		 * 添加数据
		 *
		 * @param array $data
		 *
		 * @return false|int
		 */
		final public function insertData($data = [])
		{
			$data[TIME_INSERT_FIELD_NAME] = TIME_NOW;

			$res = $this->allowField(true)->isUpdate(false)->save($data);

			return $res;
		}


		/**
		 * 批量添加数据
		 *
		 * @param array $data
		 *
		 * @return false|int
		 */
		final public function insertDataList($data = [])
		{
		}


		/**
		 * **********************************************************************************
		 * **********************************************************************************
		 *                                                删除
		 * **********************************************************************************
		 * **********************************************************************************
		 */


		/**
		 * 删除数据
		 *
		 * @param array $where
		 * @param int   $isTurlyDelete 0进回收站，1彻底删除
		 *
		 * @return ModelBase|int
		 */
		final protected function deleteData($where = [] , $isTurlyDelete = 0)
		{
			if($isTurlyDelete)
			{
				$this->setCondition(['where' => $where ,]);
				$res = $this->delete();

				return $res;
			}
			else
			{
				return $this->updateData(['status' => '2'] , $where);
			}
		}

		/**
		 * 彻底删除
		 *
		 * @param $where
		 *
		 * @return false|int
		 */
		public function del($where)
		{
			return $this->deleteData($where , 1);
		}

		/**
		 * 数据加入回收站
		 *
		 * @param $where
		 *
		 * @return false|int
		 */
		public function recycle($where)
		{
			$this->updateField(['del_time' => TIME_NOW ,] , $where);

			return $this->deleteData($where , 0);
		}



		/**
		 * **********************************************************************************
		 * **********************************************************************************
		 *                                                改
		 * **********************************************************************************
		 * **********************************************************************************
		 */


		/**
		 * 更新指定字段
		 *
		 * @param array $data
		 * @param array $where
		 *
		 * @return ModelBase
		 */
		final public function updateField($data , $where)
		{
			//每个添加的数据都加入时间字段
			$res = $this->update($data , $where);

			return $res;
		}


		/**
		 * 更新数据
		 *
		 * @param array $data
		 * @param array $where
		 * @param bool  $field
		 *
		 * @return ModelBase
		 */
		final public function updateData($data , $where , $field = true)
		{
			//每个添加的数据都加入时间字段
			$res = $this->update($data , $where , $field);

			return $res;
		}


		/**
		 * **********************************************************************************
		 * **********************************************************************************
		 *                                                查
		 * **********************************************************************************
		 * **********************************************************************************
		 */

		/**
		 * 按条件获取数据集不分页
		 *
		 * @param array $condition
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function selectData($condition = [])
		{
			$this->getAvailableOnly();
			$this->setCondition($condition);
			//每个添加的数据都加入时间字段
			$res = $this->fetchSql(0)->select();

			return $res;
		}

		/**
		 * 按条件获取数据集分页
		 *
		 * @param array $condition
		 * @param       $pagesize
		 * @param       $params
		 *
		 * @return \think\Paginator
		 * @throws \think\exception\DbException
		 */
		final public function selectDataWithPagination($condition , $pagesize , $params)
		{
			$this->getAvailableOnly();
			$this->setCondition($condition);
			//每个添加的数据都加入时间字段
			$res = $this->fetchSql(0)->paginate($pagesize , false , $params);

			return $res;
		}

		/**
		 * 按条件获取被删除数据
		 *
		 * @param array $condition
		 * @param       $pagesize
		 * @param       $params
		 *
		 * @return \think\Paginator
		 * @throws \think\exception\DbException
		 */
		final public function selectDeletedDataWithPagination($condition , $pagesize , $params)
		{
			$this->getDeletedOnly();
			$this->setCondition($condition);
			//每个添加的数据都加入时间字段
			$res = $this->fetchSql(0)->paginate($pagesize , false , $params);

			return $res;
		}

		/**
		 * 按条件获取单条数据
		 *
		 * @param array $condition
		 *
		 * @return array|false|\PDOStatement|string|Model
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		final public function findData($condition = [])
		{
			$this->setCondition($condition);
			//每个添加的数据都加入时间字段
			$res = $this->fetchSql(0)->find();

			return $res;
		}

		/**
		 *    根据id获取单条数据
		 *
		 * @param        $id
		 * @param string $field
		 *
		 * @return array|false|\PDOStatement|string|Model
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getRowById($id , $field = '*')
		{
			$where = [
				'id' => [
					'=' ,
					$id ,
				] ,
			];

			$condition = [
				'where' => $where ,
				'field' => $field ,
			];

			$data = $this->findData($condition);

			return $data;
		}


		/**
		 * **********************************************************************************
		 * **********************************************************************************
		 *                                                其他
		 * **********************************************************************************
		 * **********************************************************************************
		 */


		/**
		 * 设置所有表查询数据时候只返回回收站数据
		 **/
		public function getDeletedOnly()
		{
			$this->setCondition([
				'alias' => self::$currentTableAlias ,
				'where' => [
					self::makeSelfAliasField(DATA_STATUS_NAME) => [
						'=' ,
						'2' ,
					] ,
				] ,
			]);

			return $this;
		}

		/**
		 * 设置所有表查询数据时候不查回收站数据
		 **/
		public function getAvailableOnly()
		{
			$this->setCondition([
				'alias' => self::$currentTableAlias ,
				'where' => [
					self::makeSelfAliasField(DATA_STATUS_NAME) => [
						'<>' ,
						'2' ,
					] ,
				] ,
			]);

			return $this;
		}

		/**
		 * 设置所有表查询status等于1的数据
		 **/
		public function getActivedOnly()
		{
			$this->setCondition([
				'alias' => self::$currentTableAlias ,
				'where' => [
					self::makeSelfAliasField(DATA_STATUS_NAME) => [
						'=' ,
						'1' ,
					] ,
				] ,
			]);

			return $this;
		}

		/**
		 * 当前表生成带别名的字段名字，避免和其他表别名冲突
		 *
		 * @param $fieldName
		 *
		 * @return string
		 */
		public static function makeSelfAliasField($fieldName)
		{
			return self::$currentTableAlias . '.' . $fieldName;
		}

		/**
		 *    批量设置条件
		 *
		 * @param array $condition
		 *
		 * @return ModelBase
		 */
		public function setCondition(array $condition = [])
		{
			foreach ($condition as $k => $v) $this->$k($v);

			return $this;
		}

		/**
		 * 所有表添加时自动修正status字段
		 *
		 * @param $val
		 *
		 * @return int
		 */
		public function setStatusAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}

		/**
		 * 所有表添加时自动修正remark字段
		 *
		 * @param $val
		 *
		 * @return int
		 */
		public function getRemarkAttr($value)
		{
			$value = htmlspecialchars_decode($value);
			$value = html_entity_decode($value);
			$value = stripslashes($value);

			return $value;
		}
	}















