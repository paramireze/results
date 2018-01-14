<?php


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