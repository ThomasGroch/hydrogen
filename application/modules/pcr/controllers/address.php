<?php

/**
 * Address controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Address class
 *
 * Class to implements the actions to interact with the Address entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Address extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('dropdown');
        $this->load->model('Country_model');
        $this->load->model('State_model');
        $this->load->model('City_model');
    }

    function _set_create_rules()
    {
        $this->form_validation->set_rules('country_id', lang('country'), 'required');
        $this->form_validation->set_rules('state_id', lang('state'), 'required');
        $this->form_validation->set_rules('city_id', lang('city'), 'required');
        $this->form_validation->set_rules('zipcode', lang('zipcode'), 'required');
        $this->form_validation->set_rules('address1', lang('address1'), 'required');
        $this->form_validation->set_rules('address2', lang('address2'), '');
        $this->form_validation->set_rules('address3', lang('address3'), 'required');
    }

    function _set_update_rules()
    {
        $this->form_validation->set_rules('country_id', lang('country'), 'required');
        $this->form_validation->set_rules('state_id', lang('state'), 'required');
        $this->form_validation->set_rules('city_id', lang('city'), 'required');
        $this->form_validation->set_rules('zipcode', lang('zipcode'), 'required');
        $this->form_validation->set_rules('address1', lang('address1'), 'required');
        $this->form_validation->set_rules('address2', lang('address2'), '');
        $this->form_validation->set_rules('address3', lang('address3'), 'required');
    }

    function _set_extra_create_data()
    {
        //$this->data['js_files'][] = 'address/change_city.js';
        $this->data['country'] = array_to_dropdown($this->Country_model->get_all());
        $this->data['state'] = array_to_dropdown($this->State_model->get_all());

        if ( isset($_POST['state_id']) )
            $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $this->input->post('state_id'))));
        else
            $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => 1)));
    }

    function _set_extra_edit_data()
    {
        //$this->data['js_files'][] = 'address/change_city.js';
        $this->data['country'] = array_to_dropdown($this->Country_model->get_all());
        $this->data['state'] = array_to_dropdown($this->State_model->get_all());

        if ( isset($_POST['state_id']) )
            $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $this->input->post('state_id'))));
        else
            $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $this->data['address']->state_id)));
    }

    function get_city()
    {
        $this->output->enable_profiler(FALSE);

        if ( isAjax() )
        {
            $this->load->model('City_model', 'city');
            // Which state to load?
            $state_id = $this->input->post('state_id');
            $data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $state_id)));
            $this->load->view('address/address_city_list', $data);
        }

        return FALSE;
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
                        $url = 'company/admin_address/' . $company->id;
                    }
                    else
                    {
                        $person = $this->person->get_where_unique(array('p_id' => $item->p_id));
                        $url = 'person/admin_address/' . $person->id;
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
            $this->data['address'] = $this->model->get($this->input->post('id'));
            $this->data['country'] = array_to_dropdown($this->Country_model->get_all());
            $this->data['state'] = array_to_dropdown($this->State_model->get_all());

            if ( isset($_POST['state_id']) )
                $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $this->input->post('state_id'))));
            else
                $this->data['city'] = array_to_dropdown($this->City_model->get_where(array('state_id' => $this->data['address']->state_id)));

            // Which state to load?
            $id = $this->input->post('id');
            $this->load->view('address/address_profile_update_form', $this->data);
        }

        return FALSE;
    }

}