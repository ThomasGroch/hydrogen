<?php

/**
 * Resource controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Resource class
 *
 * Class to implements the actions to interact with the Resource entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Resource extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Role_has_resource_model');
    }

    function init_resource()
    {
        if ( $this->model->init_resource() )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}