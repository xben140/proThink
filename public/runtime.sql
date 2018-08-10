SELECT * FROM `ithink_user` `curr_tab` WHERE  `curr_tab`.`status` <> '2'  AND `user` = 'qq1234567' LIMIT 1
SELECT `role_id` FROM `ithink_user_role` WHERE  `user_id` = 2
SELECT `privilege_id` FROM `ithink_role_privilege` WHERE  `role_id` IN (1,2)
SELECT `curr_tab`.`resource_id` FROM `ithink_privilege_resource` `curr_tab` WHERE  `curr_tab`.`id` IN (3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)  AND `curr_tab`.`resource_type` = '0'
SELECT * FROM `ithink_resource_menu` `curr_tab` WHERE  `curr_tab`.`status` = '1'  AND (  `curr_tab`.`is_common` = '1'  OR `curr_tab`.`id` IN (1,2,3,4,5,6,7,8,9,10,11,12,13,14) )
