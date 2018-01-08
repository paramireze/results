<?php
class People extends CI_Controller {
    public function index() {

        $data['title'] = 'list of people';

        $this->load->model('people_model');

        $data['people'] = $this->people_model->get_people();

        $this->load->template('people/index', $data);
    }
}