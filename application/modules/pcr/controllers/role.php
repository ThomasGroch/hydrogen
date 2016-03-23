<?php

/**
 * Role controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Role class
 *
 * Class to implements the actions to interact with the Role entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Role extends CRUD_Controller {

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
        $this->form_validation->set_rules('name', lang('name'), 'required');
        $this->form_validation->set_rules('description', lang('description'), '');
        parent::_set_create_rules();
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('name', lang('name'), 'required');
        $this->form_validation->set_rules('description', lang('description'), '');
        parent::_set_update_rules();
    }

}