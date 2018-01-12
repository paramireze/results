<?php

class Races extends CI_Controller {
    public function index() {

        $data['title'] = "List of Races";

        $this->load->model('race_model');

        $data['race_types'] = $this->race_model->get_races();

        $this->load->template('races/index', $data);
    }

    public function listRaces($race_type_slug) {
        $this->load->model('race_model');


        $data['races'] = $this->race_model->get_races_by_type($race_type_slug);

        $data['title'] = 'All ' . $data['races'][0]['rt_name'] . ' Race Events';

        $this->load->template('races/listRaces', $data);

        return 'hi';
    }

    public function results($race_type_slug, $race_slug = null) {
        $this->load->model('race_model');
        $this->load->model('race_participant_model');

        $data['race'] = $this->race_model->get_race($race_type_slug, $race_slug);
        $race_id = $data['race'][0]['race_id'];

        $data['race_participants'] = $this->race_participant_model->get_participants($race_id);

        $this->load->template('races/results', $data);


    }

}