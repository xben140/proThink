SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 20,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 20,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 20,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 20,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 40,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`user` = 'qq123456'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`user` = 'qq123456'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`user` = 'qq123456'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`user` = 'qq123456'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 80,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%ello%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `b`.`nickname` LIKE '%h%'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT COUNT(*) AS tp_count FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.* FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` WHERE  `id` = 89 LIMIT 1
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`action` = 'none'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
UPDATE `ithink_resource_menu`  SET `pid`=1,`name`='回收站',`module`='admin',`controller`='recovery',`action`='none',`order`=90,`ico`='-',`remark`=''  WHERE  `id` IN (89)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
UPDATE `ithink_resource_menu`  SET `order`=90  WHERE  `id` IN (98)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` WHERE  `id` = 98 LIMIT 1
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`action` = 'none'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
UPDATE `ithink_resource_menu`  SET `pid`=1,`name`='登陆日志',`module`='admin',`controller`='Loginlog',`action`='none',`order`=90,`ico`='-',`remark`=''  WHERE  `id` IN (98)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT COUNT(*) AS tp_count FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.* FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT COUNT(*) AS tp_count FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT COUNT(*) AS tp_count FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT COUNT(*) AS tp_count FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.* FROM `ithink_recovery` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
