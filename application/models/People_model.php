<?php

/*
CREATE TABLE `madison_hash_db_2017`.`people` (
  `p_id` INT NOT NULL AUTO_INCREMENT,
  `p_first_name` VARCHAR(45) NULL,
  `p_last_name` VARCHAR(45) NULL,
  `p_email` VARCHAR(85) NULL,
  `p_phone` VARCHAR(45) NULL,
  `p_address` VARCHAR(100) NULL,
  `p_dob` DATE NULL,
  `p_created_at` DATETIME NULL DEFAULT NOW(),
  `p_deleted_at` DATETIME NULL,
  PRIMARY KEY (`p_id`));


 */

class People_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_people() {

        $this->db->order_by('p_id', 'DESC');
        $query = $this->db->get('people');
        return $query->result_array();
    }

}