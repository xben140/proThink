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
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` DESC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
SELECT COUNT(*) AS tp_count FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT `curr_tab`.`id`,`curr_tab`.`ip`,`curr_tab`.`remark`,`curr_tab`.`time`,`b`.`user`,`b`.`nickname` FROM `ithink_login_log` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `curr_tab`.`id` DESC LIMIT 20,20
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `key`='exception_tmpl'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `name`='错误页面模板'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `type`=4  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `remark`='./app/commonviewthink_exception.php'  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `remark`='.'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../app/commonviewthink_exception.php\r\n..thinkphptplthink_exception.tpl',`remark`='.'  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
UPDATE `ithink_config`  SET `value`='../app/commonviewthink_exception.php\r\n..thinkphptplthink_exception.tpl!!--!!'  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
UPDATE `ithink_config`  SET `value`='../app/commonviewthink_exception.php!!--!!\r\n..thinkphptplthink_exception.tpl'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `is_const`=0  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `status`=1  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp\\tpl\\think_exception.tpl\r\n../app/common\\view\\think_exception.php\r\n\r\n',`remark`='.'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp\\tpl\\think_exception.tpl\r\n../app/common\\view\\think_exception.php\r\n\r\n',`remark`='.'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp\\tpl\\think_exception.tpl\r\n../app/common\\view\\think_exception.php\r\n\r\n',`remark`=''  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp\\tpl\\think_exception.tpl\r\n../app/common\\view\\think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
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
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/think_exception.php',`remark`='报错模板页面'  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/\\\\\\\\\\\\think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/\\\\think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view\\\\think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view\\\\\\\\think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_config`  SET `group_id`=1,`name`='错误页面模板',`key`='exception_tmpl',`type`=4,`value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/think_exception.php\r\n\r\n',`remark`='报错模板页面'  WHERE  `id` IN (14)
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
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
UPDATE `ithink_config`  SET `value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/think_exception.php!!--!!'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
UPDATE `ithink_config`  SET `value`='../thinkphp/tpl/think_exception.tpl!!--!!\r\n../app/common/view/think_exception.php'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 14 LIMIT 1
UPDATE `ithink_config`  SET `value`='../thinkphp/tpl/think_exception.tpl\r\n../app/common/view/think_exception.php!!--!!'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1538015550,`login_count`=91  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1538015550 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`group_id` = '1' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`group_id` = '1' ORDER BY `id` ASC LIMIT 0,20
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
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 3 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (3,7,8,9,10,11,12,13,14,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,61,62,66,73,75)  AND `curr_tab`.`resource_type` = '0'
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
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 11 LIMIT 1
UPDATE `ithink_config`  SET `value`='File\r\nMemcache!!--!!\r\nRedis'  WHERE  `id` IN (11)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 11 LIMIT 1
UPDATE `ithink_config`  SET `value`='File!!--!!\r\nMemcache\r\nRedis'  WHERE  `id` IN (11)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 11 LIMIT 1
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 16 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` WHERE  `id` = 18 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 11 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 11 LIMIT 1
UPDATE `ithink_user`  SET `profile_pic`='20180927\\81bbfb45def9647d25a3d71946e40cdc.jpg'  WHERE  `id` IN (11)
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
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
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = '4'
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `del_time`=1538016264  WHERE  `id` IN (14)
UPDATE `ithink_user`  SET `status`=2  WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=0  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `nickname`='lalala'  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=1  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `del_time`=1538016325  WHERE  `id` IN (14)
UPDATE `ithink_user`  SET `status`=2  WHERE  `id` IN (14)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` = '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 14 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_recovery`
SELECT * FROM `ithink_recovery` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user_role`
DELETE FROM `ithink_user_role`    WHERE  `user_id` IN (14)
SHOW COLUMNS FROM `ithink_user`
DELETE FROM `ithink_user`    WHERE  `id` IN (14)
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
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1538016739,`login_count`=92  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1538016739 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=0  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=1  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `email`='123zz226@qq.cc'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `gender`=1  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = '2'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = '3'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_role`  SET `status`=0  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
UPDATE `ithink_role`  SET `status`=1  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`id` <> '1'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 11
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 12
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 2 LIMIT 1
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
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
UPDATE `ithink_user`  SET `profile_pic`='20180927\\ba4d763c1d32d7e50bc7be782c6f2b4f.gif'  WHERE  `id` IN (1)
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `id` = 1 LIMIT 1
UPDATE `ithink_user`  SET `profile_pic`='20180927\\b328a101d77e73936e43589c58480e4d.jpg'  WHERE  `id` IN (1)
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` WHERE  `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
