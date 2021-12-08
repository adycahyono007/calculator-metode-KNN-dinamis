<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $model = get_class($this);

        if (file_exists(APPPATH . 'models/'. $model . '_model.php')) {
            $this->load->model($model . '_model', strtolower($model), true);
        }
    }

    /**
     * Load view with default layouts
     *
     * @param [type] $data
     * @return void
     */
    public function appView($data)
    {
        $data['csrf'] = [
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        ];

        $this->load->view('layouts/app', $data);
    }

    public function authView($data)
    {
        $data['csrf'] = [
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        ];

        $this->load->view('layouts/auth', $data);
    }
}

/* End of file MY_Contorller.php */
