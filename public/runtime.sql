SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT COUNT(*) AS tp_count FROM ( SELECT count(*) FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ) `_group_count_` LIMIT 1
SELECT curr_tab.*, GROUP_CONCAT(c.`name`) as role FROM `ithink_user` `curr_tab` LEFT JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`user_id` LEFT JOIN `ithink_role` `c` ON `c`.`id`=`b`.`role_id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 GROUP BY `curr_tab`.`id` ORDER BY `id` ASC LIMIT 0,20
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 5
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 6
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 7
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 8
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 10
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
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
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
UPDATE `ithink_config`  SET `value`='0'  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SELECT * FROM `ithink_config` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
UPDATE `ithink_config`  SET `value`='1'  WHERE  `id` IN (1)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_address`
SELECT COUNT(*) AS tp_count FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.*,prov.area_name prov_name,city.area_name city_name,county.area_name county_name FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 6 LIMIT 1
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'manage' LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'manager' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'manager' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1537837499,`login_count`=14  WHERE  `user` = 'manager'
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (2)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (3,7,8,9,10,11,12,13,14,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,61,62,66,73,75)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (3,7,8,9,10,11,12,13,14,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,59,60,62,64,65,66,73,75) ) ORDER BY `order` DESC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 2
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (2)
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'manager' LIMIT 1
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (2 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1537837499 , '127.0.0.1')
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
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 13
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 14
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'caibian' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (4)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (41,42,43,44,45,46,53,54,55,56,57,58,59,61,62,66,67,68,69,70,71,72,73)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (42,43,44,45,46,47,54,55,56,57,59,60,62,64,65,66,67,68,69,70,71,72,73) ) ORDER BY `order` DESC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (4)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'bianji' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (3)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (41,43,44,45,46,53,54,55,56,57,58,59,61,62,66,75)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (42,44,45,46,47,54,55,56,57,59,60,62,64,65,66,75) ) ORDER BY `order` DESC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (3)
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
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = 'bcaf9ac2bfdded626228fa9bb8943770' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('小议群众文化活动如何顺利开展' , 4 , '1P--夏洪均--小议群众文化活动如何顺利开展.docx' , '夏洪均' , '20180925\\84360a360a690f8d05b5bd09412ace34.docx' , 'docx' , 'bcaf9ac2bfdded626228fa9bb8943770' , 1 , 1 , 1537837589)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '22cb11acf871f38e63132563e2407733' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('群众文化活动的特点解读' , 4 , '1P--熊艳红--群众文化活动的特点解读.docx' , '熊艳红' , '20180925\\8057be1fac1dba3ad0d3ff369a0aed22.docx' , 'docx' , '22cb11acf871f38e63132563e2407733' , 1 , 1 , 1537837590)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '32d4f64dfde4b1e4a790ea9ab6692d2e' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('浅议法人的意思表示' , 4 , '1P--杨彩霞--浅议法人的意思表示.docx' , '杨彩霞' , '20180925\\7c59251736d0e398922f5706dfd78ddd.docx' , 'docx' , '32d4f64dfde4b1e4a790ea9ab6692d2e' , 1 , 1 , 1537837591)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = 'af484e847b6de0e8b5f15aa0248c1ddc' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('如何提高高校图书管理人员的综合素质' , 4 , '1P--周素勤--如何提高高校图书管理人员的综合素质.docx' , '周素勤' , '20180925\\0ab54d89376fd805957724e97ef5b3ed.docx' , 'docx' , 'af484e847b6de0e8b5f15aa0248c1ddc' , 1 , 1 , 1537837592)
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
SHOW COLUMNS FROM `ithink_doc_attachment`
SELECT `curr_tab`.`id` FROM `ithink_doc_attachment` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `curr_tab`.`doc_id` = '1'
SELECT * FROM `ithink_doc_attachment` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN ('')
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
UPDATE `ithink_doc`  SET `status`=2  WHERE  `id` IN (1,2,3,4)
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
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '7122f1b047987b4ef85ccdbd3f87a2a3' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('大众传播对少数民族地区青少年世界观影响的调查与思考' , 4 , '1P--马玲--大众传播对少数民族地区青少年世界观影响的调查与思考.docx' , '马玲' , '20180925\\e6bbc12f647ebc9ffcce0370bfff5708.docx' , 'docx' , '7122f1b047987b4ef85ccdbd3f87a2a3' , 1 , 1 , 1537837653)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '6cdc3123bfcaec8c57dc68a2ce18a886' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('浅谈考试焦虑的对高三学生的危害、成因及克服策略' , 4 , '1P--冉华蓉--浅谈考试焦虑的对高三学生的危害、成因及克服策略.docx' , '冉华蓉' , '20180925\\7a7f0323c06a85bdd2075581d972d0cf.docx' , 'docx' , '6cdc3123bfcaec8c57dc68a2ce18a886' , 1 , 1 , 1537837654)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '6ec0ca387f6cd78f006bb3dc5c01d53f' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('增强高职院校学生思想政治教育主体性的基本途径docx' , 4 , '1P--王艺--增强高职院校学生思想政治教育主体性的基本途径docx.docx' , '王艺' , '20180925\\406815e1dd3a2d98b136ef96d2167061.docx' , 'docx' , '6ec0ca387f6cd78f006bb3dc5c01d53f' , 1 , 1 , 1537837655)
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_address`
SELECT COUNT(*) AS tp_count FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.*,prov.area_name prov_name,city.area_name city_name,county.area_name county_name FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
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
SHOW COLUMNS FROM `ithink_address`
SELECT COUNT(*) AS tp_count FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.*,prov.area_name prov_name,city.area_name city_name,county.area_name county_name FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_area`
SELECT * FROM `ithink_area` `curr_tab` WHERE  `curr_tab`.`pid` = '1'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_area`
SELECT * FROM `ithink_area` `curr_tab` WHERE  `curr_tab`.`pid` = '3'
SHOW COLUMNS FROM `ithink_area`
SELECT * FROM `ithink_area` `curr_tab` WHERE  `curr_tab`.`pid` = '40'
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_address`
INSERT INTO `ithink_address` (`name` , `tel` , `province_id` , `city_id` , `county_id` , `address` , `remark` , `user_id` , `time`) VALUES ('联系人' , '13322562235' , 3 , 40 , 427 , '详细地址' , '备注' , 4 , 1537837728)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_address`
SELECT COUNT(*) AS tp_count FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.*,prov.area_name prov_name,city.area_name city_name,county.area_name county_name FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
UPDATE `ithink_doc`  SET `address_id`=1  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_address`
SELECT COUNT(*) AS tp_count FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT `curr_tab`.*,prov.area_name prov_name,city.area_name city_name,county.area_name county_name FROM `ithink_address` `curr_tab` LEFT JOIN `ithink_area` `prov` ON `curr_tab`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `curr_tab`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `curr_tab`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` = 1 LIMIT 1
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
SHOW COLUMNS FROM `ithink_doc`
UPDATE `ithink_doc`  SET `is_pending`=2  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
UPDATE `ithink_doc`  SET `is_pending`=1  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
UPDATE `ithink_doc`  SET `is_pending`=0  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
UPDATE `ithink_doc`  SET `is_pending`=1  WHERE  `id` IN (1)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '24e6f48d2e7c87dd979be42b0249ef87' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('基层动物防疫管理有关问题的建议研究' , 4 , '1P--程胜杰--基层动物防疫管理有关问题的建议研究.docx' , '程胜杰' , '20180925\\374e45886ef053ea4184b3558015be8e.docx' , 'docx' , '24e6f48d2e7c87dd979be42b0249ef87' , 1 , 1 , 1537837823)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '42efd3141f844568281d07fff1543fc5' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('航班延误谁之过' , 4 , '1P--季灵--航班延误谁之过.docx' , '季灵' , '20180925\\1c612a5e678aac444b88aa6190e20310.docx' , 'docx' , '42efd3141f844568281d07fff1543fc5' , 1 , 1 , 1537837824)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT * FROM `ithink_doc` `curr_tab` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` <> '2' )  AND `hash` = '8a06e82ad3c93fb14c5ad42f648dc392' LIMIT 1
INSERT INTO `ithink_doc` (`title` , `uid` , `file_name` , `author` , `path` , `ext` , `hash` , `page` , `status` , `time`) VALUES ('基建档案在高校建设中的作用及管理策略分析  ' , 4 , '1P--巩淑芳--基建档案在高校建设中的作用及管理策略分析  .docx' , '巩淑芳' , '20180925\\5021862e359a3017892da3db565faae1.docx' , 'docx' , '8a06e82ad3c93fb14c5ad42f648dc392' , 1 , 1 , 1537837825)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
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
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_journal_type`
SELECT COUNT(*) AS tp_count FROM `ithink_journal_type` `curr_tab` WHERE  `curr_tab`.`status` <> '2' LIMIT 1
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_user`
UPDATE `ithink_user`  SET `nickname`='采编1111'  WHERE  `id` IN (4)
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'caibian' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (4)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (41,42,43,44,45,46,53,54,55,56,57,58,59,61,62,66,67,68,69,70,71,72,73)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (42,43,44,45,46,47,54,55,56,57,59,60,62,64,65,66,67,68,69,70,71,72,73) ) ORDER BY `order` DESC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 4
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (4)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'bianji' LIMIT 1
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SHOW COLUMNS FROM `ithink_role_privilege`
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (3)
SHOW COLUMNS FROM `ithink_privilege_resource`
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (41,43,44,45,46,53,54,55,56,57,58,59,61,62,66,75)  AND `curr_tab`.`resource_type` = '0'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (42,44,45,46,47,54,55,56,57,59,60,62,64,65,66,75) ) ORDER BY `order` DESC
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (3)
SHOW COLUMNS FROM `ithink_role`
SELECT * FROM `ithink_role` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999 ORDER BY `id` ASC
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
SHOW COLUMNS FROM `ithink_journal_type`
SELECT `b`.`type_id` FROM `ithink_journal_type` `curr_tab` LEFT JOIN `ithink_user_juornaltype` `b` ON `curr_tab`.`id`=`b`.`type_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 3
SELECT * FROM `ithink_journal_type` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `id` ASC
SHOW COLUMNS FROM `ithink_doc`
SELECT COUNT(*) AS tp_count FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 LIMIT 1
SELECT `curr_tab`.*,`b`.`nickname`,prov.area_name prov_name,city.area_name city_name,county.area_name county_name,`address`.`address`,address.name contacts,`address`.`tel` FROM `ithink_doc` `curr_tab` LEFT JOIN `ithink_user` `b` ON `curr_tab`.`uid`=`b`.`id` LEFT JOIN `ithink_address` `address` ON `curr_tab`.`address_id`=`address`.`id` LEFT JOIN `ithink_area` `prov` ON `address`.`province_id`=`prov`.`id` LEFT JOIN `ithink_area` `county` ON `address`.`county_id`=`county`.`id` LEFT JOIN `ithink_area` `city` ON `address`.`city_id`=`city`.`id` WHERE  `curr_tab`.`status` <> '2'  AND `curr_tab`.`time` BETWEEN 0 AND 99999999999999  AND `curr_tab`.`page` BETWEEN 0 AND 50 ORDER BY `id` ASC LIMIT 0,20
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_config`
SELECT * FROM `ithink_config` `curr_tab` LEFT JOIN `ithink_config_group` `b` ON `curr_tab`.`group_id`=`b`.`id` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' )  AND `b`.`status` = 1
SHOW COLUMNS FROM `ithink_user`
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
UPDATE `ithink_user`  SET `last_login_ip`='127.0.0.1',`last_login_time`=1537837994,`login_count`=79  WHERE  `user` = 'qq123456'
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  ( `curr_tab`.`status` = '1' AND `curr_tab`.`status` <> '2' ) ORDER BY `order` DESC
SHOW COLUMNS FROM `ithink_role`
SELECT `b`.`role_id` FROM `ithink_role` `curr_tab` INNER JOIN `ithink_user_role` `b` ON `curr_tab`.`id`=`b`.`role_id` WHERE  ( `curr_tab`.`status` <> '2' AND `curr_tab`.`status` = '1' )  AND `b`.`user_id` = 1
SELECT * FROM `ithink_role` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `id` IN (1)
SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq123456' LIMIT 1
SHOW COLUMNS FROM `ithink_login_log`
INSERT INTO `ithink_login_log` (`uid` , `type` , `user_agent` , `remark` , `res` , `time` , `ip`) VALUES (1 , 2 , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.26 Safari/537.36 Core/1.63.5221.400 QQBrowser/10.0.1125.400' , '登陆成功' , 1 , 1537837994 , '127.0.0.1')
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
SHOW COLUMNS FROM `ithink_resource_menu`
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` <> '2' ORDER BY `order` DESC
