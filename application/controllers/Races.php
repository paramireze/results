<?php

class Races extends CI_Controller {
    public function index() {

        $data['title'] = "List of Races";

        $this->load->model('race_type_model');
        $this->load->model('race_model');
        $this->load->model('race_participant_model');

        /* get race types */
        $race_types = $this->race_type_model->get_race_types();
        $raceTypes = null;
        foreach ($race_types as $race_type) {

            /* get races for race type */
            $races = $this->race_model->get_races_by_type($race_type['rt_slug']);

            $raceArray = null;
            foreach($races as $race) {

                /* get participants for each race */
                $raceParticipants = $this->race_participant_model->get_participants($race['race_id']);
                $raceParticipantsArray = null;
                foreach ($raceParticipants as $raceParticipant) {
                    $raceParticipantsArray[$raceParticipant['p_slug']] = array('p_first_name' => $raceParticipant['p_first_name'], 'p_last_name' => $raceParticipant['p_last_name'],'rp_age' => $raceParticipant['rp_age']);
                }

                $raceArray[$race['race_name']] = array('race_id' => $race['race_id'], 'race_slug' => $race['race_slug'], 'participants' => $raceParticipantsArray);
            }

            $raceTypes[$race_type['rt_name']] = array('rt_id' => $race_type['rt_id'], 'rt_description' => $race_type['rt_description'], 'rt_name' => $race_type['rt_name'],'rt_slug' => $race_type['rt_slug'], 'rt_image_url' => $race_type['rt_image_url'], 'races' => $raceArray );

        }

        $data['race_types'] = $raceTypes;

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