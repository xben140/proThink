SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1534232704,`login_count`=8  WHERE  `user` = 'qq1234567'
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (2 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1534232704 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `nickname`='user22233',`email`='1234522226@qq.cc',`phone`='15826544417'  WHERE  `id` = 2
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `nickname`='HELLO',`email`='1234522226@qq.cc',`phone`='15826544417'  WHERE  `id` = 2
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 2 LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = '4'
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=0  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=1  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=0  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=1  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1534234103,`login_count`=9  WHERE  `user` = 'qq1234567'
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21) ) ORDER BY `order` ASC
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (2 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1534234103 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
