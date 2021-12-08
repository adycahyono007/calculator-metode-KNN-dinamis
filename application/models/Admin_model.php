<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    protected $fillable = [
        'username', 'nama', 'password'
    ];
    
    public function getDefaultValues()
    {
        return [
            'username' => '',
            'password' => '',
            'nama' => ''
        ];
    }

    public function getValidationRules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|max_length[255]|callback_usernameCheck'
            ],
            [
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => 'required|max_length[255]|callback_oldPasswordCheck'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'max_length[255]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[255]'
            ],
        ];
    }

}

/* End of file Admin_model.php */
