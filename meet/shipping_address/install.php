<?php

$CI->db->query('SET foreign_key_checks = 0');
//create customer_sites_info table
if (!$CI->db->table_exists(db_prefix().'customer_shipping_address')) {
    $CI->db->query('CREATE TABLE `'.db_prefix().'customer_shipping_address` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
    `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
     PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET='.$CI->db->char_set.';');
}

?>