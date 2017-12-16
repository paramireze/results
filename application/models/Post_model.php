<?php
/*
 ALTER TABLE `madison_hash_db_2017`.`posts`
//    ADD COLUMN `category_id` INT NULL AFTER `id`;
*/
    class Post_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_posts($slug = FALSE) {
            if ($slug === FALSE) {
                $this->db->select('*');
                $this->db->from('posts');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $this->db->order_by('posts.id', 'DESC');
                $query = $this->db->get();

                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post() {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' =>$this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );
            return $this->db->insert('posts', $data);
        }

        public function update_post() {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' =>$this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );

            $this->db->where('id', $this->input->post('id'));

            return $this->db->update('posts', $data);
        }


        public function delete_posts($id) {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
    }