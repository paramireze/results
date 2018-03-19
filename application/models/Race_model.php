<?php

/*
CREATE TABLE `madison_hash_db_2017`.`races` (
	`race_id` INT NOT NULL AUTO_INCREMENT,
	`race_type_id` INT NOT NULL,
	`race_title` VARCHAR(100) NOT NULL,
	`race_description` VARCHAR(1000) NULL,
	`race_registration_time` DATETIME NULL,
	`race_start_time` DATETIME NULL,
	`race_cost` VARCHAR(45) NULL,
	`race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`race_deleted_at` DATETIME NULL,
  PRIMARY KEY (`race_id`),
  FOREIGN KEY (race_type_id) REFERENCES race_types(rt_id));

insert into races values (default, 'Finnish Five', 'This is a hash tradition.', now(), now(), default );
 */

class Race_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_races() {

        $this->db->select('races.*, race_types.*');
        $this->db->from('races');
        $this->db->join('race_types', 'races.race_rt_id = race_types.rt_id');
        $this->db->order_by('races.race_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function describe_races() {
        $fields = $this->db->list_fields('races');
        return $fields;
    }

    public function get_races_by_type($race_type_slug) {
        $this->db->select('races.*, race_types.*');
        $this->db->from('races');
        $this->db->join('race_types', 'races.race_rt_id = race_types.rt_id');
        $this->db->where('race_types.rt_slug', $race_type_slug);

        $this->db->order_by('races.race_id', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_race($race_type_slug, $race_slug) {
        $this->db->select('*');
        $this->db->from('races');
        $this->db->join('race_types', 'races.race_rt_id = race_types.rt_id');
        $this->db->where('race_types.rt_slug', $race_type_slug);
        $this->db->where('races.race_slug', $race_slug);
        $this->db->order_by('races.race_id', 'DESC');
        $query = $this->db->get();

        $result = $query->result_array();
        return $result[0];

    }

    /*
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