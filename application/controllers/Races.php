<?php

class Races extends CI_Controller {
    public function index() {

        $data['title'] = "List of Races";

        $this->load->model('race_type_model');

        $data['race_types'] = $this->race_type_model->get_race_types();

        $this->load->view('templates/header');
        $this->load->view('races/index', $data);
        $this->load->view('templates/footer');
    }

    public function listAll($race) {
        die($race);
        return 'hi';
    }
/*
    public function view() {
        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $data['title'] = "create Post";
        $data['categories'] = $this->category_model->get_categories();


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->post_model->create_post();
            redirect('posts');
        }

    }

    public function update() {
        $this->post_model->update_post();
        redirect('posts');
    }


    public function delete($id) {
        $this->post_model->delete_posts($id);
        redirect('posts');
    }

    public function edit($slug) {
        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = 'Edit Posts';

        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    } */
}