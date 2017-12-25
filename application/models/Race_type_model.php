<?php

/*
 CREATE TABLE `madison_hash_db_2017`.`race_types` (
  `rt_id` INT NOT NULL AUTO_INCREMENT,
  `rt_name` VARCHAR(100) NOT NULL,
  `rt_slug` VARCHAR(100) NOT NULL,
  `race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rt_id`));

insert	into race_types values (default, 'Finnish Five', default, 'finnish-five');
insert into race_types values (default, 'Fifty Furlong', default, 'fifty-furlong');
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