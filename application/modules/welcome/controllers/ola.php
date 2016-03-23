<?php

if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

// include_once APPPATH . 'modules/base/controllers/base_controller.php';

class Ola extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->enable_profiler(TRUE);

        $this->show();
    }

    function show()
    {
        //echo 'bem vindo ao code base';
        // parent::page();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
