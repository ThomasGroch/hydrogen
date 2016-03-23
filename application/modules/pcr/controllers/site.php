<?php

/**
 * Site controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Site class
 *
 * Class to implements the actions to interact with the Site entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Site extends CRUD_Controller {

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
        $this->form_validation->set_rules('url', lang('url'), 'callback_external_callbacks[site_model,url_validation]');
        parent::_set_create_rules();
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('name', lang('name'), 'required');
        $this->form_validation->set_rules('url', lang('url'), 'callback_external_callbacks[site_model,url_validation]');
        parent::_set_update_rules();
    }

    function edit_profile($id)
    {
        $item = $this->model->get($id);
        $this->load->model('Company_model', 'company');
        $this->load->model('Person_model', 'person');

        if ( $item )
        {
            if ( $item->can_edit() )
            {
                $this->data[$this->ctrlr_name] = $item;
                $this->data['l_sidebar'] = $this->_l_sidebar();
                $this->data['header']->title = sprintf(lang('edit_item_info'), $this->ctrlr_name);

                $data = $this->input->post(NULL, TRUE);
                if ( $this->model->update_by_id($id, $data) )
                {
                    $this->msg_ok(sprintf(lang('item_info_saved'), $this->class_name));
                    if ( $this->company->exists(array('p_id' => $item->p_id)) )
                    {
                        $company = $this->company->get_where_unique(array('p_id' => $item->p_id));
                        $url = 'company/admin_sites/' . $company->id;
                    }
                    else
                    {
                        $person = $this->person->get_where_unique(array('p_id' => $item->p_id));
                        $url = 'person/admin_sites/' . $person->id;
                    }
                    redirect($url, 'refresh');
                }
            }
            else
            {
                $this->msg_error(sprintf(lang('user_not_owns_item'), $this->ctrlr_name));
                redirect(plural($this->ctrlr_name));
            }
        }
        else
        {
            $this->msg_error(sprintf(lang('item_not_found'), $this->class_name));
            redirect(plural($this->ctrlr_name));
        }
    }

    function ajax_load_edit()
    {
        $this->output->enable_profiler(FALSE);

        if ( isAjax() )
        {
            $this->data['site'] = $this->model->get($this->input->post('id'));
            $this->load->view('site/site_profile_update_form', $this->data);
        }

        return FALSE;
    }

}