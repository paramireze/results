<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $this->load->view('pages/excel_import');
    }

    public function import_data() {
        $this->load->helper('excel');
        getExcelData($this);
    }
}