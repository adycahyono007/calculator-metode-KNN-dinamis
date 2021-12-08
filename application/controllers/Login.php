<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();

        guestAccess();
    }

    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title']  = 'Login';
            $data['input']  = $input;
            $data['page']   = 'pages/auth/login';

            $this->authView($data);
            return;
        }

        if ($this->login->run($input)) {

            $this->session->set_flashdata('success', 'Berhasil melakukan login!');

            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah.');
            redirect('');
        }
    }

}

/* End of file Login.php */
