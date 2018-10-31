<?php


	/**
	 * 应用建表
	 */


	return [
		//安装应用执行的sql
		//每个sql结尾的分号必须独占一行
		'install' => <<<SQL
DROP TABLE IF EXISTS `ithink_blog_article`;
CREATE TABLE `ithink_blog_article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `category` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '类型,1:文章;2:单页',
  `source_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内容来源;1:模板页面;2:文本编辑器',
  `content` longtext COMMENT '文章内容',
  `type` int(11) NOT NULL COMMENT '博文分类',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表者用户id',
  `is_published` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态;1:已发布;0:未发布;',
  `is_allow_comments` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '评论状态;1:允许;0:不允许',
  `is_top` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶;1:置顶;0:不置顶',
  `Viewing_times` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '查看数',
  `favorites` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_count` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `published_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `keywords` varchar(150) NOT NULL DEFAULT '' COMMENT 'seo keywords',
  `abstruct` varchar(500) NOT NULL DEFAULT '' COMMENT '摘要',
  `source` varchar(150) NOT NULL DEFAULT '' COMMENT '转载文章的来源',
  `thumbnail` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `more` text COMMENT '扩展属性,如缩略图;格式为json',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `del_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `status` tinyint(4) NOT NULL COMMENT '0:禁用, 1:正常, 2:已删除',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`category`,`is_published`,`time`,`id`),
  KEY `user_id` (`uid`),
  KEY `create_time` (`time`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章表';


DROP TABLE IF EXISTS `ithink_blog_article_tag`;
CREATE TABLE `ithink_blog_article_tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '标签 id',
  `article_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '文章 id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='标签文章对应表';




DROP TABLE IF EXISTS `ithink_blog_tag`;
CREATE TABLE `ithink_blog_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名称',
  `articel_numbers` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '标签文章数',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0:禁用, 1:正常, 2:已删除',
  `time` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章标签表';
insert  into `ithink_blog_tag`(`id`,`name`,`articel_numbers`,`status`,`time`,`order`,`remark`) values (1,'php',0,1,1539223839,1,''),(2,'javaScript',0,1,1539223944,1,''),(3,'正则表达式',0,1,1539940417,1,''),(4,'jquery',0,1,1539940425,1,'');



DROP TABLE IF EXISTS `ithink_blog_type`;
CREATE TABLE `ithink_blog_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `pid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类父id',
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `articel_numbers` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类文章数',
  `order` int(11) NOT NULL DEFAULT '10000' COMMENT '排序',
  `del_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `remark` text NOT NULL COMMENT '分类描述',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类表';
insert  into `ithink_blog_type`(`id`,`pid`,`name`,`articel_numbers`,`order`,`del_time`,`time`,`remark`,`status`) values (1,0,'经验',0,1,0,1539224230,'',1),(2,0,'带',0,1,0,1539224282,'',1),(3,2,'类型名',0,1,0,1539935104,'',1),(4,3,'上级分类',0,1,0,1539935339,'',1);

SQL
		,
	];