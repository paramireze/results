<?php
/*
  CREATE TABLE `madison_hash_db_2017`.`race_events` (
`re_id` INT NOT NULL AUTO_INCREMENT,
`re_date` DATE NULL,
`re_registration_time` DATETIME NULL,
`re_start_time` DATETIME NULL,
`re_cost` VARCHAR(45) NULL,
`re_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`re_deleted_at` DATETIME NULL,
PRIMARY KEY (`re_id`));

insert into race_events values(default, now(), now(), now(), '$10.00', default, null);

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

insert into people values(default, 'Paul', 'Ramirez', 'paramireze@gmail.com', '608-445-3478', '16n bassett st.', '04/06/1981', now(), null);
*/

class Race_event_model extends CI_Model {
        public function __construct() {
        $this->load->database();
    }

    public function get_race_events() {
        $this->db->order_by('re_id', 'DESC');
        $query = $this->db->get('race_events');
        return $query->result_array();
    }

}