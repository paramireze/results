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
        $config = array(
            'upload_path' => FCPATH . 'uploads/' ,
            'allowed_types' => 'xls'
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            @chmod($data['full_path'], 0777);
            $this->load->library('Spreadsheet_Excel_Reader');
            $this->spreadsheet_excel_reader->setOutputEncoding('CP1251');
            $this->spreadsheet_excel_reader->read($data['full_path']);
            error_reporting(0);

            $sheets = $this->spreadsheet_excel_reader->sheets[0];

            $data_excel = array();
            for ($i = 1; $i <= $sheets['numRows']; $i++) {
                if ($sheets['cells'][$i][1] == '') break;
                $data_excel[$i - 1]['Name'] = $sheets['cells'][$i][1];
                $data_excel[$i - 1]['Phone'] = $sheets['cells'][$i][2];
                $data_excel[$i - 1]['Address'] = $sheets['cells'][$i][3];

                 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                    echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                }
                echo "\n";

            }
            echo '<pre>';
            print_r($data_excel);
            echo '</pre>';
            @unlink($data['full_path']);
            die();
        }
    }
}