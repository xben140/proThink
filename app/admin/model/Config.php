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



	namespace app\admin\model;

	use app\common\model\ModelBase;

	class Config extends ModelBase
	{
		//public $name = 'config';
		public $type = [
			[
				'value' => '2' ,
				'field' => 'text' ,
			] ,
			[
				'value' => '1' ,
				'field' => 'array' ,
			] ,
			[
				'value' => '3' ,
				'field' => 'switch' ,
			] ,
			[
				'value' => '4' ,
				'field' => 'option' ,
			] ,
			[
				'value' => '5' ,
				'field' => 'image' ,
			] ,
		];

		/**
		 *  初始化模型
		 * @access protected
		 * @return void
		 */
		protected function initialize()
		{
			parent::initialize();
		}

		//自动完成[新增和修改时都会执行]
		protected $auto = [

		];

		//新增时自动验证
		protected $insert = [
			'status'   => 1 ,
			'is_const' => 0 ,
		];

		protected $update = [
			//'is_common' ,
			//'status' ,
			//'is_menu' ,
		];


		/*
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 *
		 * */


		/**
		 *  获取当前有用的配置，分配到系统
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getAvailableConfig()
		{
			$where = [
				'b.status' => [
					'=' ,
					1 ,
				] ,
			];

			$join = [
				[
					'ithink_config_group b ' ,
					self::makeSelfAliasField('group_id') . '  = b.id ' ,
					'LEFT' ,
				] ,
			];

			$condition = [
				'where' => $where ,
				'join'  => $join ,
			];

			$this->getActivedOnly();
			$data = $this->selectData($condition);

			return $data;
		}

		/**
		 *  获取所有类型为options的key
		 */
		public function getOptionsKey()
		{
			$where = [
				self::makeSelfAliasField('type') => [
					'=' ,
					4 ,
				] ,
			];

			$condition = [
				'alias' => self::$currentTableAlias ,
				'where' => $where ,
			];

			$this->setCondition($condition);
			$data = $this->fetchSql(false)->column(self::makeSelfAliasField('type'));

			return $data;
		}


		public function setIsConstAttr($val)
		{
			return !is_null($val) ? $val : 0;
		}


	}











	