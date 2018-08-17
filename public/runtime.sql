SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 9 LIMIT 1
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`action` = 'none'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`group_id` = '7' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`group_id` = '7' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT COUNT(*) AS tp_count FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1534492440,`login_count`=17  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1534492440 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:15'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:5'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:5'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,15
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:8'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,8
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:6'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,6
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 6,6
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,6
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
UPDATE `ithink_config`  SET `value`='type:bootstrap\nvar_page:page\nlist_rows:5'  WHERE  `id` IN (3)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
UPDATE `ithink_config`  SET `value`='0'  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
UPDATE `ithink_config`  SET `value`='1'  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,51
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
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
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1534496582,`login_count`=18  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1534496582 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 5,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SELECT COUNT(*) AS tp_count FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_config_group`
SELECT * FROM `ithink_config_group` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,5
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
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
