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



	namespace app\blog\logic;


	class Blogarticle extends Base
	{

		public function __construct()
		{
			//$this->model_ = $this->{static::makeClassName(static::class , 'model')};
			//$this->validate_ = $this->{static::makeClassName(static::class , 'validate')};
			$this->initBaseClass();
		}

		/**
		 * 博文id获取当前博文所有的tagID
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getArticleTagsId($param)
		{
			$id = $param['id'];
			$tags = $this->model__blog_Blogtag->getTagsIdByArticleId($id);

			return $tags;
		}

		/**
		 * 博文id获取当前博文所有的tag
		 *
		 * @param $param
		 *
		 * @return mixed
		 */
		public function getArticleTags($param)
		{
			$id = $param['id'];
			$tags = $this->model__blog_Blogtag->getTagsByArticleId($id);

			return $tags;
		}


		/**
		 * @param $param
		 *
		 * @return array
		 */
		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$whereOr = [];

			$order_filed = 'id';
			$order_ = 'asc';

			$add_time_begin = 0;
			$add_time_end = 99999999999999;

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'title' :
					case 'abstruct' :
						if($v != '')
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'like' ,
								"%" . $v . "%" ,
							];
						}

						break;

					case 'id' :
						if($v != '')
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;

					case 'order_filed' :
						$v != '' && $order_filed = $v;
						break;

					case 'order' :
						$v != '' && $order_ = $v;
						break;

					case 'type' :
					case 'category' :
					case 'source_type' :
					case 'is_published' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;

					case 'add_time_begin' :
						$v != '' && $add_time_begin = strtotime($v);
						break;

					case 'add_time_end' :
						$v != '' && $add_time_end = strtotime($v);
						break;

					case 'tags' :
						if($v != -1)
						{
							$where['b.id'] = [
								'=' ,
								$v ,
							];
						}
						break;

					case 'keyword' :
						if($v)
						{
							$where[
								$this->model_::makeSelfAliasField('title') . '|'
								. $this->model_::makeSelfAliasField('content') . '|'
								. $this->model_::makeSelfAliasField('abstruct')
							] = [
								'like' ,
								"%" . $v . "%" ,
							];
						}
						break;


					default :
						#...
						break;
				}
			}
			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$add_time_begin ,
					$add_time_end ,
				] ,
			];

			$join[] = [
				'ithinkphp_blog_article_tag a' ,
				$this->model_::makeSelfAliasField('id') . ' = a.article_id' ,
				'left' ,
			];

			$join[] = [
				'ithinkphp_blog_tag b' ,
				'a.tag_id = b.id' ,
				'left' ,
			];
			$join[] = [
				'ithinkphp_user u' ,
				$this->model_::makeSelfAliasField('uid') . ' = u.id' ,
				'left' ,
			];


			$field[] = $this->model_::makeSelfAliasField('*');
			$field[] = 'GROUP_CONCAT(b.`name`) as tags';
			$field[] = 'u.nickname as user';

			$order[$order_filed] = $order_;

			return $condition = [
				'group'   => $this->model_::makeSelfAliasField('id') ,
				'where'   => $where ,
				'whereOr' => $whereOr ,
				'order'   => $order ,
				'join'    => $join ,
				'field'   => implode(', ' , $field) ,
			];
		}

	}