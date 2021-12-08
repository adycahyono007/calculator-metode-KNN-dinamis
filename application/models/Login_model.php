<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model {

    protected $table = 'admin';

    public function getDefaultValues()
    {
        return [
            'username'  => '',
            'password'  => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function run($input)
    {
        $query = $this->where('username', $input->username)
                        ->first();
        
        if (!empty($query) && hashEcryptVerify($input->password, $query->password)) {
            
            $sess_data = [
                'id' => $query->id,
                'nama' => $query->nama,
                'username' => $query->username,
                'is_login' => true
            ];

            $this->session->set_userdata($sess_data);

            return true;
        }

        return false;
    }

}

/* End of file Login_model.php */
