<?php

/*
  CREATE TABLE `madison_hash_db_2017`.`races` (
  `race_id` INT NULL,
  `race_title` VARCHAR(100) NOT NULL,
  `race_description` VARCHAR(1000) NULL,
  `race_date` DATETIME NULL,
  `race_start_time` DATETIME NULL,
  `race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`race_id`));


insert into races values (default, 'Finnish Five', 'This is a hash tradition.', now(), now(), default );
 */

class Race_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_races() {
        $this->db->order_by('race_id', 'DESC');
        $query = $this->db->get('races');
        return $query->result_array();
    }

}