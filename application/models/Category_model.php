<?php

/*
 CREATE TABLE `madison_hash_db_2017`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));
 */

    class Category_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_categories() {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

    }