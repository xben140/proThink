SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `salt`='5136bd',`password`='b7da320966c766bce723772bbc777dd0'  WHERE  `id` = 1
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `salt`='200653',`password`='142ff18d05fd9a2f58f9322440ed580d'  WHERE  `id` = 1
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `salt`='315536',`password`='0ba1dea9aa7f11822dab6e77e2dd5d06'  WHERE  `id` = 2
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1533808016,`login_count`=15  WHERE  `user` = 'qq1234567'
SHOW COLUMNS FROM `ithink_user_role`
SELECT `role_id` FROM `ithink_user_role` WHERE  `user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT DISTINCT b.id,`b`.name,`b`.`pid`,`b`.`module`,`b`.`controller`,`b`.`action`,`b`.`ico`,`b`.`order`,`b`.`is_menu`,`b`.`is_common`,`b`.`remark`,`b`.`status`,`b`.`time` FROM `ithink_privilege_resource` `curr_tab` LEFT JOIN `ithink_resource_menu` `b` ON `curr_tab`.`resource_id`=`b`.`id` WHERE  `b`.`status` = '1'  AND `curr_tab`.`id` IN (3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)  AND `curr_tab`.`resource_type` = '0' OR `b`.`is_common` = '1' ORDER BY `b`.`order`
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (2 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1533808016 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1533808035,`login_count`=38  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1533808035 , '127.0.0.1')
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT COUNT(*) AS tp_count FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_role`
SELECT COUNT(*) AS tp_count FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (2)
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1)
SHOW COLUMNS FROM `ithink_role`
UPDATE `ithink_role`  SET `status`=0  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_role`
UPDATE `ithink_role`  SET `status`=1  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 5,5
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 10,5
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,5
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,50
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=0  WHERE  `id` IN (2)
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `status`=1  WHERE  `id` IN (2)
