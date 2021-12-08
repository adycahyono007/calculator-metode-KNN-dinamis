<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Variabel_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDefaultValues()
    {
        return [
            'nama' => '',
            'id_status_variabel' => '',
            'keterangan' => ''
        ];
    }

    public function validationRules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[255]'
            ],
            [
                'field' => 'id_status_variabel',
                'label' => 'Status',
                'rules' => 'required|callback_variabelExists'
            ],
            [
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'max_length[255]'
            ],
        ];
    }

}

/* End of file Variabel_model.php */
