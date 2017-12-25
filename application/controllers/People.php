<?php
class People extends CI_Controller {
    public function index() {

        $data['title'] = 'list of people';

        $this->load->model('people_model');

        $data['people'] = $this->people_model->get_people();

        $this->load->view('templates/header');
        $this->load->view('people/index', $data);
        $this->load->view('templates/footer');
    }
}