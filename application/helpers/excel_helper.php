<?php

function getExcelData($that) {
    $config = array(
        'upload_path' => FCPATH . 'uploads/' ,
        'allowed_types' => 'xls'
    );
    $that->load->library('upload', $config);
    if ($that->upload->do_upload('file')) {
        $data = $that->upload->data();
        @chmod($data['full_path'], 0777);
        $that->load->library('Spreadsheet_Excel_Reader');
        $that->spreadsheet_excel_reader->setOutputEncoding('CP1251');
        $that->spreadsheet_excel_reader->read($data['full_path']);
        error_reporting(0);

        $sheets = $that->spreadsheet_excel_reader->sheets[0];

        $data_excel = array();
        for ($i = 1; $i <= $sheets['numRows']; $i++) {
            if ($sheets['cells'][$i][1] == '') break;
            $data_excel[$i - 1]['Name'] = $sheets['cells'][$i][1];
            $data_excel[$i - 1]['Age'] = $sheets['cells'][$i][2];
            $data_excel[$i - 1]['Time'] = $sheets['cells'][$i][3];

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