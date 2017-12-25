<?php
class Categories extends CI_Controller {
    public function index() {


        $data['title'] = "latest posts";
        $this->load->model('category_model');
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }


}