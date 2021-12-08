<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampel_model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDefaultValues()
    {
        $variabel = getVariabelRepo();

        if (empty($variabel)) {
            return null;
        }

        $data = [];

        foreach ($variabel as $key => $value) {
            $data['nilai'][$value->id] = '';
        }

        return $data;
    }

    public function validationRules()
    {
        return [
            [
                'field' => 'nilai[]',
                'label' => 'Nilai',
                'rules' => 'callback_inputCheck'
            ],
        ];
    }

}

/* End of file Sampel_model.php */
