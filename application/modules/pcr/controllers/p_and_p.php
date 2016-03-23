<?php

/**
 * Email controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Email class
 *
 * Class to implements the actions to interact with the relation entity 
 * (p_and_p)
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class P_and_p extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('dropdown');
        $this->load->model('Company_model');
        $this->load->model('Person_model');
        $this->load->model('Role_model');
    }

    function _set_create_rules()
    {
        $this->form_validation->set_rules('p_id', lang('company'), 'required');
        $this->form_validation->set_rules('p_id1', lang('person'), 'required');
        $this->form_validation->set_rules('role_id', lang('role'), 'required');
        $this->form_validation->set_rules('start_date', lang('start_date'), 'required|callback_external_callbacks[p_and_p_model,datetime_validation]');
        $this->form_validation->set_rules('end_date', lang('end_date'), 'callback_external_callbacks[p_and_p_model,datetime_validation]');
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('p_id', lang('company'), 'required');
        $this->form_validation->set_rules('p_id1', lang('person'), 'required');
        $this->form_validation->set_rules('role_id', lang('role'), 'required');
        $this->form_validation->set_rules('start_date', lang('start_date'), 'required|callback_external_callbacks[p_and_p_model,datetime_validation]');
        $this->form_validation->set_rules('end_date', lang('end_date'), 'callback_external_callbacks[p_and_p_model,datetime_validation]');
    }

    function _set_extra_create_data()
    {
        $this->data['companies'] = array_to_dropdown($this->Company_model->get_all(),'p_id','username');
        $this->data['people'] = array_to_dropdown($this->Person_model->get_all(),'p_id','username');
        $this->data['roles'] = array_to_dropdown($this->Role_model->get_all());
        parent::_set_extra_create_data();
    }

    function _set_extra_edit_data()
    {
        $this->data['companies'] = array_to_dropdown($this->Company_model->get_all(),'p_id','username');
        $this->data['people'] = array_to_dropdown($this->Person_model->get_all(),'p_id','username');
        $this->data['roles'] = array_to_dropdown($this->Role_model->get_all());
        parent::_set_extra_edit_data();
    }

}