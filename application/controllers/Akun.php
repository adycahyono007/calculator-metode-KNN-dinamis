<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MY_Controller {
    
    const VIEW_PATH = 'pages/akun';

    public function __construct()
    {
        parent::__construct();
        adminAccess();
        $this->load->model('Admin_model', 'admin', true);
    }
    

    public function index()
    {
        $data['page'] = self::VIEW_PATH . '/index';

        $data['pageTitle'] = 'Dashboard';

        $data['akun'] = $this->admin
                            ->where('id', $this->session->id)
                            ->firstArray();

        $data['pageAction'] = null;

        if (!$_POST) {
            $data['input'] = $data['akun'];
        } else {
            $data['input'] = $this->input->post(null, true);
        }

        if (!$this->admin->validate(
                    'PUT', 
                    $this->admin->getValidationRules()
                )
            ) {
            $this->appView($data);
            return;
        }

        // Input Password Check
        if ($data['input']['password'] == '') {
            $data['input']['password'] = $data['akun']['password'];
        } else {
            // Encrypt new kata sandi
            $data['input']['password'] = hashEncrypt($data['input']['password']);
        }

        $data['input'] = $this->admin->inputFilter($data['input']);

        if ($this->admin->update($data['input'], $this->session->id)) {

            $this->session->set_flashdata('success', 'Data berhasil disimpan');

            $sess_data = [
                'id' => $this->session->id,
                'nama' => $data['input']['nama'],
                'username' => $data['input']['username'],
                'is_login' => true
            ];

            $this->session->set_userdata($sess_data);

        } else {
            $this->session->set_flashdata('error', 'Terjadi suatu kesalahan.');
        }
        
        redirect('akun');
    }

    public function usernameCheck($input = null)
    {
        if (!$_POST) {
            show_404();
            return;
        }

        if (empty($input)) {
            return true;
        }

        $this->load->library('form_validation');

        if(!preg_match('/^[a-zA-Z0-9_-]{1,}$/', $input)) {
            // valid username, alphanumeric & longer than or equals 1 chars
            $this->form_validation->set_message('checkUsername', 'Username is not valid.');
            return false;
        }

        $data = $this->admin->where('username', $input)
                            ->where('id', $this->session->id)
                            ->count();

        if ($data > 1) {
            $this->form_validation->set_message(
                'inputCheck', 
                "$value->nama value maximum length of 10 characters."
            );
            
            return false;
        }

        return true;
    }

    public function oldPasswordCheck($input = null)
    {
        if (!$_POST || $input === null) {
            show_404();
            return;
        }

        $data = $this->admin->where('id', $this->session->id)
                            ->first();

        // check encrypt
        if(hashEcryptVerify($input, $data->password)) { 
            // valid password
            return true;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_message('oldPasswordCheck', 'Old Password is not valid.');
        return false;
    }   

}

/* End of file Akun.php */
