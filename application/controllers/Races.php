<?php

class Races extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }


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

                /* get top three male participants for each race */
                $participantsTopMales = $this->race_participant_model->get_participants_top_finishers($race['race_id'], 3, "M");
                $participantsTopMalesArray = null;
                foreach ($participantsTopMales as $participantTopMale) {
                    $participantsTopMalesArray[$participantTopMale['p_slug']] = array('p_first_name' => $participantTopMale['p_first_name'], 'p_last_name' => $participantTopMale['p_last_name'],'rp_age' => $participantTopMale['rp_age'], 'rp_time' => $participantTopMale['rp_time']);
                }

                /* get top three female participants for each race */
                $participantsTopFemales = $this->race_participant_model->get_participants_top_finishers($race['race_id'], 3, "F");
                $ParticipantsTopFemalesArray = null;
                foreach ($participantsTopFemales as $participantsTopFemale) {
                    $ParticipantsTopFemalesArray[$participantsTopFemale['p_slug']] = array('p_first_name' => $participantsTopFemale['p_first_name'], 'p_last_name' => $participantsTopFemale['p_last_name'],'rp_age' => $participantsTopFemale['rp_age'], 'rp_time' => $participantsTopFemale['rp_time']);
                }

                $raceArray[$race['race_name']] = array('race_id' => $race['race_id'], 'race_slug' => $race['race_slug'], 'participants_top_males' => $participantsTopMalesArray, 'participants_top_females' => $ParticipantsTopFemalesArray);
            }

            if (!empty($raceArray)) {
                $raceTypes[$race_type['rt_name']] = array('rt_id' => $race_type['rt_id'], 'rt_description' => $race_type['rt_description'], 'rt_name' => $race_type['rt_name'],'rt_slug' => $race_type['rt_slug'], 'rt_image_url' => $race_type['rt_image_url'], 'races' => $raceArray );
            }


        }

        $data['race_types'] = $raceTypes;

        $this->load->template('races/index', $data);
    }

    public function create() {
        $this->data['title'] = 'Create Race';

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $this->form_validation->set_rules('txtName', 'Name', 'trim|required|min_length[5]|max_length[60]');
        $this->form_validation->set_rules('txtSlug', 'Slug', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('txtImageUrl', 'Image Url', 'trim|max_length[40]');
        $this->form_validation->set_rules('txtDescription', 'Description', 'trim|max_length[2000]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->template('races/create', $this->data);
        } else {
            $this->session->set_flashdata('success', 'Race Type Created');
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            die();
            redirect('races');
        }

    }

    public function save() {
        // do we have a valid request?
        if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
        {
            show_error($this->lang->line('error_csrf'));
        }


    }

    public function listRaces($race_type_slug) {
        $this->load->model('race_type_model');
        $this->load->model('race_model');
        $this->load->model('race_participant_model');
        /* get races for race type */
        $races = $this->race_model->get_races_by_type($race_type_slug);

        $raceArray = null;

        if (!empty($races)) {


            foreach($races as $race) {

                /* get top three male participants for each race */
                $participantsTopMales = $this->race_participant_model->get_participants_top_finishers($race['race_id'], 3, "M");
                $participantsTopMalesArray = null;
                foreach ($participantsTopMales as $participantTopMale) {
                    $participantsTopMalesArray[$participantTopMale['p_slug']] = array('p_first_name' => $participantTopMale['p_first_name'], 'p_last_name' => $participantTopMale['p_last_name'], 'p_display_name' => $participantTopMale['p_display_name'],'rp_age' => $participantTopMale['rp_age'], 'rp_time' => $participantTopMale['rp_time']);
                }

                /* get top three female participants for each race */
                $participantsTopFemales = $this->race_participant_model->get_participants_top_finishers($race['race_id'], 3, "F");
                $ParticipantsTopFemalesArray = null;
                foreach ($participantsTopFemales as $participantsTopFemale) {
                    $ParticipantsTopFemalesArray[$participantsTopFemale['p_slug']] = array('p_first_name' => $participantsTopFemale['p_first_name'], 'p_last_name' => $participantsTopFemale['p_last_name'], 'p_display_name' => $participantsTopFemale['p_display_name'], 'rp_age' => $participantsTopFemale['rp_age'], 'rp_time' => $participantsTopFemale['rp_time']);
                }
                $raceArray[$race['race_name']] = array('race_id' => $race['race_id'], 'rt_slug' => $race['rt_slug'], 'race_slug' => $race['race_slug'], 'participants_top_males' => $participantsTopMalesArray, 'participants_top_females' => $ParticipantsTopFemalesArray);
            }



        }

        $data['races'] = $raceArray;

        $this->load->template('races/listRaces', $data);
    }

    public function results($race_type_slug, $race_slug = null) {
        $this->load->model('race_model');
        $this->load->model('race_participant_model');

        $data['race'] = $this->race_model->get_race($race_type_slug, $race_slug);
        $race_id = $data['race']['race_id'];

        $data['race_participants'] = $this->race_participant_model->get_participants($race_id);

        $this->load->template('races/results', $data);


    }

    /**
     * @return array A CSRF key-value pair
     */
    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }


    /**
     * @return bool Whether the posted CSRF token matches
     */
    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


}