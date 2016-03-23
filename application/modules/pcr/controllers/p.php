<?php

/**
 * Person controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Person class
 *
 * Class to implements the actions to interact with the person entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class P extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();

        $this->_add_to_l_sidebar($this->ctrlr_name . '/admin_address', lang('admin_address'));
        $this->_add_to_l_sidebar($this->ctrlr_name . '/admin_emails', lang('admin_emails'));
        $this->_add_to_l_sidebar($this->ctrlr_name . '/admin_sites', lang('admin_sites'));
        $this->_add_to_l_sidebar($this->ctrlr_name . '/admin_phones', lang('admin_phones'));
    }

    function _set_create_rules()
    {
        /*
          //callback_external_callbacks[person_model,password_strength_validation]
          $this->form_validation->set_rules('username', lang('username'), 'required|min_length[5]|max_length[12]|is_unique[p.username]');
          $this->form_validation->set_rules('primary_email', lang('primary_email'), 'required|valid_email|matches[primary_email_conf]|is_unique[p.primary_email]');
          $this->form_validation->set_rules('primary_email_conf', lang('primary_email_conf'), 'required');
         */

        $this->form_validation->set_rules('username', lang('username'), '');
        $this->form_validation->set_rules('primary_email', lang('primary_email'), '');
        $this->form_validation->set_rules('primary_email_conf', lang('primary_email_conf'), '');
        $this->form_validation->set_rules('birthday', lang('birthday'), '');

        parent::_set_create_rules();
    }

    function _set_update_rules()
    {
        
          $this->form_validation->set_rules('username', lang('username'), 'required|min_length[5]|max_length[12]|callback_external_callbacks[person_model,is_unique_username_validation]');
          $this->form_validation->set_rules('primary_email', lang('primary_email'), 'required|valid_email|matches[primary_email_conf]|callback_external_callbacks[person_model,is_unique_primary_email_validation]');
          $this->form_validation->set_rules('primary_email_conf', lang('primary_email_conf'), 'required');
          $this->form_validation->set_rules('birthday', lang('birthday'), 'required|callback_external_callbacks[person_model,datetime_validation]');
         /*

        $this->form_validation->set_rules('username', lang('username'), '');
        $this->form_validation->set_rules('primary_email', lang('primary_email'), '');
        $this->form_validation->set_rules('primary_email_conf', lang('primary_email_conf'), '');
        $this->form_validation->set_rules('birthday', lang('birthday'), '');
           */
        parent::_set_update_rules();
    }

    /**
     * Function that shows the edit form of an object and updates the info.     
     */
    public function admin_sites($id)
    {
        $item = $this->model->get($id);

        if ( $item )
        {
            if ( $item->can_edit() )
            {
                $this->data[$this->ctrlr_name] = $item;
                $this->data['l_sidebar'] = $this->_l_sidebar();
                $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_site' => lang('add_site'));
                $this->data['header']->title = lang('admin_sites');

                $this->data['items'] = $item->sites;

                $this->_view('site_show', NULL, 'pcr/site');
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

    public function add_site($id)
    {
        $this->load->model('Site_model', 'site');
        $item = $this->model->get($id);

        if ( $item )
        {
            if ( $item->can_create() )
            {
                
                $this->data['p_id'] = $item->p_id;
                
                $this->form_validation->set_rules('name', lang('name'), 'required');
                $this->form_validation->set_rules('url', lang('url'), 'required');

                if ( $this->form_validation->run() == FALSE )
                {
                    $this->data[$this->ctrlr_name] = $item;
                    $this->data['l_sidebar'] = $this->_l_sidebar();
                    $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_site' => lang('add_site'));
                    $this->data['header']->title = lang('add_site');

                    $this->data['items'] = $item;

                    $this->_view('site_profile_create', NULL, 'pcr/site');
                }
                else
                {
                    if ( ($this->site->insert($_POST)) > 0 )
                    {
                        // TODO correct lang
                        $this->msg_ok(sprintf(lang('site_created'), $this->class_name));
                        redirect($this->ctrlr_name . '/admin_sites/' . $item->id, 'refresh');
                    }
                    else
                    {
                        debug($_POST);
                        $this->msg_error(sprintf(lang('item_not_created'), $this->ctrlr_name));
                        redirect($this->ctrlr_name . '/add_site/' . $item->id, 'refresh');
                    }
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

    /**
     * Function that shows the edit form of an object and updates the info.     
     */
    public function admin_emails($id)
    {
        $item = $this->model->get($id);

        if ( $item )
        {
            if ( $item->can_edit() )
            {
                $this->data[$this->ctrlr_name] = $item;
                $this->data['l_sidebar'] = $this->_l_sidebar();
                $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_email' => lang('add_email'));
                $this->data['header']->title = lang('admin_emails');

                $this->data['items'] = $item->emails;

                $this->_view('email_show', NULL, 'pcr/email');
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

    public function add_email($id)
    {
        $this->load->model('pcr/Email_model', 'email');
        $item = $this->model->get($id);
        $this->load->model('pcr/Type_email_model', 'type_emails');

        if ( $item )
        {
            if ( $item->can_create() )
            {
                $this->data['p_id'] = $item->p_id;
                
                $this->form_validation->set_rules('email', lang('email'), 'required');
                $this->form_validation->set_rules('type_email_id', lang('type_email'), 'required');

                if ( $this->form_validation->run() == FALSE )
                {
                    $this->data[$this->ctrlr_name] = $item;
                    $this->data['l_sidebar'] = $this->_l_sidebar();
                    $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_email' => lang('add_email'));
                    $this->data['header']->title = lang('add_email');

                    $this->data['ctrlr_name'] = $this->ctrlr_name;
                    
                    $this->data['items'] = $item;
                    $this->data['type_emails'] = array_to_dropdown($this->type_emails->get_all());

                    $this->_view('email_profile_create', NULL, 'pcr/email');
                }
                else
                {
                    if ( ($this->email->insert($_POST)) > 0 )
                    {
                        // TODO correct lang
                        $this->msg_ok(sprintf(lang('email_created'), $this->class_name));
                        redirect($this->ctrlr_name . '/admin_emails/' . $item->id, 'refresh');
                    }
                    else
                    {
                        $this->msg_error(sprintf(lang('item_not_created'), $this->ctrlr_name));
                        redirect($this->ctrlr_name . '/add_email/' . $item->id, 'refresh');
                    }
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

    public function add_phone($id)
    {
        $this->load->model('Phone_model', 'phone');
        $item = $this->model->get($id);
        $this->load->model('Type_phone_model', 'type_phones');

        if ( $item )
        {
            if ( $item->can_create() )
            {
                $this->data['p_id'] = $item->p_id;
                
                $this->form_validation->set_rules('number', lang('number'), 'required');
                $this->form_validation->set_rules('type_phone_id', lang('type_phone'), 'required');

                if ( $this->form_validation->run() == FALSE )
                {
                    $this->data[$this->ctrlr_name] = $item;
                    $this->data['l_sidebar'] = $this->_l_sidebar();
                    $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_phone' => lang('add_phone'));
                    $this->data['header']->title = lang('add_phone');

                    $this->data['items'] = $item;
                    $this->data['type_phones'] = array_to_dropdown($this->type_phones->get_all());

                    $this->_view('phone_profile_create', NULL, 'pcr/phone');
                }
                else
                {
                    if ( ($this->phone->insert($_POST)) > 0 )
                    {
                        // TODO correct lang
                        $this->msg_ok(sprintf(lang('phone_created'), $this->class_name));
                        redirect($this->ctrlr_name . '/admin_phones/' . $item->id, 'refresh');
                    }
                    else
                    {
                        debug($_POST);
                        $this->msg_error(sprintf(lang('item_not_created'), $this->ctrlr_name));
                        redirect($this->ctrlr_name . '/add_phone/' . $item->id, 'refresh');
                    }
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

    public function admin_phones($id)
    {
        $item = $this->model->get($id);

        if ( $item )
        {
            if ( $item->can_edit() )
            {
                $this->data[$this->ctrlr_name] = $item;
                $this->data['l_sidebar'] = $this->_l_sidebar();
                $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_phone' => lang('add_phone'));

                $this->data['header']->title = lang('admin_phones');

                $this->data['items'] = $item->phones;

                $this->_view('phone_show', NULL, 'pcr/phone');
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

    public function add_address($id)
    {
        $item = $this->model->get($id);
        $this->load->model('pcr/Address_model', 'address');
        $this->load->model('pcr/Country_model', 'country');
        $this->load->model('pcr/State_model', 'state');
        $this->load->model('pcr/City_model', 'city');

        if ( $item )
        {
            if ( $item->can_create() )
            {
                $this->data['p_id'] = $item->p_id;
                
                $this->form_validation->set_rules('country_id', lang('country'), 'required');
                $this->form_validation->set_rules('state_id', lang('state'), 'required');
                $this->form_validation->set_rules('city_id', lang('city'), 'required');
                $this->form_validation->set_rules('zipcode', lang('zipcode'), 'required');
                $this->form_validation->set_rules('address1', lang('address1'), 'required');
                $this->form_validation->set_rules('address2', lang('address2'), '');
                $this->form_validation->set_rules('address3', lang('address3'), 'required');

                if ( $this->form_validation->run() == FALSE )
                {
                    $this->data[$this->ctrlr_name] = $item;
                    $this->data['l_sidebar'] = $this->_l_sidebar();
                    $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_address' => lang('add_address'));
                    $this->data['header']->title = lang('add_address');

                    $this->data['items'] = $item;
                    
                    //$this->data['js_files'][] = 'address/change_city.js';
                    $this->data['country'] = array_to_dropdown($this->country->get_all());
                    $this->data['state'] = array_to_dropdown($this->state->get_all());
                    if ( isset($_POST['state_id']) )
                        $this->data['city'] = array_to_dropdown($this->city->get_where(array('state_id' => $this->input->post('state_id'))));
                    else
                        $this->data['city'] = array_to_dropdown($this->city->get_where(array('state_id' => 1)));

                    $this->_view('address_profile_create', NULL, 'pcr/address');
                }
                else
                {
                    if ( ($this->address->insert($_POST)) > 0 )
                    {
                        // TODO correct lang
                        $this->msg_ok(sprintf(lang('address_created'), $this->class_name));
                        redirect($this->ctrlr_name . '/admin_address/' . $item->id, 'refresh');
                    }
                    else
                    {
                        debug($_POST);
                        $this->msg_error(sprintf(lang('item_not_created'), $this->ctrlr_name));
                        redirect($this->ctrlr_name . '/add_address/' . $item->id, 'refresh');
                    }
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

    public function admin_address($id)
    {
        $item = $this->model->get($id);

        if ( $item )
        {
            if ( $item->can_edit() )
            {
                $this->data[$this->ctrlr_name] = $item;
                $this->data['l_sidebar'] = $this->_l_sidebar();
                $this->data['r_sidebar'] = array($this->ctrlr_name . '/add_address' => lang('add_address'));
                $this->data['header']->title = lang('admin_address');

                $this->data['items'] = $item->address;

                $this->_view('address_show', NULL, 'pcr/address');
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

}