<?php

/**
 * Type_email controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Type_email class
 *
 * Class to implements the actions to interact with the type_email entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Type_email extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    function _set_create_rules()
    {
        $this->form_validation->set_rules('type_email', lang('type_email'), 'required|alpha');
        $this->form_validation->set_rules('description', lang('description'), '');
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('type_email', lang('type_email'), 'required|alpha');
        $this->form_validation->set_rules('description', lang('description'), '');
    }

}