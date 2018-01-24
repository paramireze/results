<?php
class Race_participant_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_participants($race_id) {
        $this->db->select('*');
        $this->db->from('race_participants');
        $this->db->join('people', 'people.p_id = race_participants.rp_p_id');
        $this->db->where('race_participants.rp_race_id', $race_id);
        $this->db->order_by('race_participants.rp_time', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_participants_top_finishers($race_id, $limit, $gender = "M") {
        $this->db->select('*');
        $this->db->from('race_participants');
        $this->db->join('people', 'people.p_id = race_participants.rp_p_id');
        $this->db->where('race_participants.rp_race_id', $race_id);
        $this->db->limit($limit);
        $this->db->order_by('race_participants.rp_time', 'asc');

        if (!empty($gender)) {
            $this->db->where('people.p_gender = "' . $gender . '"');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

}