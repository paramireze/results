<?php
class Race_participant_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_participants($race_id) {
        $this->db->select('*');
        $this->db->from('race_participants');
        $this->db->where('race_participants.rp_race_id', $race_id);

//        $this->db->order_by('race_participants.race_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}