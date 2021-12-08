<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index()
    {
        if ($this->input->method() != 'post') {
            $this->output->set_status_header(405);
            return;
        }

        if (empty($this->session->is_login)) {
            $this->output->set_status_header(401);
            return;
        }

        
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Berhasil keluar akun.');
        redirect(base_url());
    }

}

/* End of file Logout.php */
