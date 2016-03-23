<?php

/**
 * Crud_controller Class to extends in a Base_Controller class
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

include_once APPPATH . 'modules/base/controllers/base_controller.php';

class Access_error extends Base_Controller {

    function __construct()
    {
        parent::__construct();

    }
    
    function access_denied()
    {
        echo lang('access_denied');
    }
    
}