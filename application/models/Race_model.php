<?php

/*
CREATE TABLE `madison_hash_db_2017`.`races` (
  `race_id` INT NOT NULL AUTO_INCREMENT,
  `race_title` VARCHAR(100) NOT NULL,
  `race_description` VARCHAR(1000) NULL,
  `race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`race_id`));

insert into races values (default, 'Finnish Five', 'This is a hash tradition.', now(), now(), default );
 */

class Race_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_races() {

        $this->db->order_by('race_id', 'DESC');
        $query = $this->db->get('races');
        return $query->result_array();
    }
    /*

        public function create_post() {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' =>$this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );
            return $this->db->insert('posts', $data);
        }

        public function update_post() {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' =>$this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
        );

            $this->db->where('id', $this->input->post('id'));

            return $this->db->update('posts', $data);
        }


        public function delete_posts($id) {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
     */

}