<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    const VIEW_PATH = 'pages';
    const CONTROLLER_PATH = '';
    
    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    

    public function index()
    {
        $data['page'] = self::VIEW_PATH . '/dashboard';

        $data['pageTitle'] = 'Dashboard';

        $data['pageAction'] = null;

        $this->appView($data);
    }

}

/* End of file Dashboard.php */
