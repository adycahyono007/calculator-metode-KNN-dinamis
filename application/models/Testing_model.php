<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testing_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDefaultValues($variabel = null)
    {
        $testing = $this->get();

        if (empty($testing)) {
            if (empty($variabel)) {
                return null;
            }

            foreach ($variabel as $key => $value) {
                $default['nilai'][$value->id] = '';
            }

            return $default;
        }

        foreach ($testing as $key => $value) {
            $default['nilai'][$value->id_variabel] = $value->nilai;
        }

        // var_dump($default);die;

        return $default;

    }

    public function validationRules()
    {
        return [
            [
                'field' => 'nilai[]',
                'label' => 'Nilai',
                'rules' => 'callback_inputCheck'
            ]
        ];
    }

}

/* End of file Testing_model.php */
