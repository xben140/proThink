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



	namespace app\blog\model;


	class Blogtag extends Base
	{
		public $name = 'blog_tag';

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
			'status' => 1 ,
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

		public function getFormatedData($isPushDefault = 0)
		{
			$roles = $this->getActivedData([
				//'no_global_admin' => 1 ,
			]);

			$roles_ = array_map(function($v) {
				return [
					'value' => $v['id'] ,
					'field' => $v['name'] ,
				];
			} , $roles);

			$isPushDefault && array_unshift($roles_ , [
				'value' => 0 ,
				'field' => '请选择' ,
			]);

			return $roles_;
		}


		/**
		 *  博文id  --> 标签
		 *
		 * @param $id
		 *
		 * @return false|\PDOStatement|string|\think\Collection
		 * @throws \think\db\exception\DataNotFoundException
		 * @throws \think\db\exception\ModelNotFoundException
		 * @throws \think\exception\DbException
		 */
		public function getTagsByArticleId($id)
		{
			$tagsId = $this->getTagsIdByArticleId($id);

			$data = $this->selectData([
				'where' => [
					'id' => [
						'in' ,
						$tagsId ,
					] ,
				] ,
			]);

			return $data;
		}


		/**
		 *  博文id  --> 标签ids
		 *
		 * @param $id
		 *
		 * @return mixed
		 */
		public function getTagsIdByArticleId($id)
		{
			$where = [
				'b.article_id' => [
					'=' ,
					$id ,
				] ,
			];

			$join = [
				[
					'ithinkphp_blog_article_tag b ' ,
					self::makeSelfAliasField('id') . '  = b.tag_id ' ,
					'left' ,
				] ,
			];
			$condition = [
				'where' => $where ,
				'join'  => $join ,
			];

			$this->getAvailableOnly();
			$this->getActivedOnly();
			$this->setCondition($condition);
			$data = $this->column('b.tag_id');
			$data = array_flip(array_flip($data));

			return $data;
		}

	}











