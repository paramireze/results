<?php

class Race_types extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('language'));
    }

    public function create() {
        $this->data['title'] = 'Create Race Type';

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $this->form_validation->set_rules('txtName', 'Name', 'trim|required|min_length[5]|max_length[60]');
        $this->form_validation->set_rules('txtSlug', 'Slug', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('txtImageUrl', 'Image Url', 'trim|max_length[40]');
        $this->form_validation->set_rules('txtDescription', 'Description', 'trim|max_length[2000]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->template('race_types/create', $this->data);
        } else {
            $this->session->set_flashdata('success', 'Race Type Created');
            $data = array(
                'rt_name' => $_POST['txtName'],
                'rt_description' => $_POST['txtDescription'],
                'rt_slug' => $_POST['txtSlug'],
                'rt_image_url' => $_POST['txtImageUrl']
            );

            $this->db->insert('race_types', $data);
            redirect('races');
        }

    }

}