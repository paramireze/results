<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages extends CI_Controller {
        public function view($page = 'home') {
            $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
            $this->load->library('ion_auth');
            if(!file_exists(APPPATH.'views/pages/' . $page . '.php')) {
                show_404();
            }

            $this->load->model('race_type_model');
            $this->load->model('race_model');
            $this->load->model('race_participant_model');
            $race_types = $this->race_type_model->get_race_types();

            $data['race_types'] = $race_types;


            $data['title'] = ucfirst($page);

            $this->load->template('pages/'.$page, $data);

        }
    }