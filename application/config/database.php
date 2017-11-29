<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#mysql -u paramireze -p -h mysql.madisonh3.com madison_hash_db_2017
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'mysql.madisonh3.com',
	'username' => 'paramireze',
	'password' => '212121sasa',
	'database' => 'madison_hash_db_2017',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

/*
  CREATE TABLE `madison_hash_db_2017`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(225) NULL,
  `slug` VARCHAR(45) NULL,
  `body` TEXT(500) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));
 */