<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404 extends MY_Controller {

    const VIEW_PATH = 'pages/error';

    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    
    public function index()
    {
        $data['page'] = self::VIEW_PATH . '/404';

        $data['pageTitle'] = '404 Error Page';

        $data['pageAction'] = null;

        $this->appView($data);
    }
    
}

/* End of file Custom404 Kerja.php */
    