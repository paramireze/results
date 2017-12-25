<?php

/*
CREATE TABLE `madison_hash_db_2017`.`race_types` (
  `rt_id` INT NOT NULL AUTO_INCREMENT,
  `rt_name` VARCHAR(100) NOT NULL,
  `race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`race_id`));

insert into races values (default, 'Finnish Five', 'This is a hash tradition.', now(), now(), default );
 */

class Race_type_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_race_types() {

        $this->db->order_by('rt_id', 'DESC');
        $query = $this->db->get('race_types');
        return $query->result_array();
    }

}