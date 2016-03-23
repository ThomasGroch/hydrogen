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
 * Class to implements the actions to interact with the e-mail entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Email extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Type_email_model', 'type_emails');
        $this->load->helper('dropdown');
    }

    function _set_create_rules()
    {
        $this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique[email.email]');
        $this->form_validation->set_rules('type_email', lang('type_email'), '');
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
        $this->form_validation->set_rules('type_email', lang('type_email'), '');
    }

    function _set_extra_create_data()
    {
        parent::_set_extra_create_data();
        $this->data['type_emails'] = array_to_dropdown($this->type_emails->get_all());
    }

    function _set_extra_edit_data()
    {
        parent::_set_extra_edit_data();
        $this->data['type_emails'] = array_to_dropdown($this->type_emails->get_all());
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
                        $url = 'company/admin_emails/' . $company->id;
                    }
                    else
                    {
                        $person = $this->person->get_where_unique(array('p_id' => $item->p_id));
                        $url = 'person/admin_emails/' . $person->id;
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
            $this->data['email'] = $this->model->get($this->input->post('id'));
            $this->data['type_emails'] = array_to_dropdown($this->type_emails->get_all());
            $this->load->view('email/email_profile_update_form', $this->data);
        }

        return FALSE;
    }

}