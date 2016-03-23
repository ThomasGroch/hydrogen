<?php

/**
 * Company controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
//include_once APPPATH . 'modules/base/controllers/crud_controller.php';
include_once 'p.php';

/**
 * Company class
 *
 * Class to implements the actions to interact with the company entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Company extends P {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('dropdown');
    }

    function _set_create_rules()
    {
        // Required data of company table
        $this->form_validation->set_rules('name', lang('name'), 'required|min_length[2]|max_length[50]|is_unique[company.name]');
        //  $this->form_validation->set_rules('cnpj', lang('cnpj'), 'required|is_natural|exact_length[14]|is_unique[company.cnpj]|callback_external_callbacks[company_model,cnpj_validation]');
        $this->form_validation->set_rules('cnpj', lang('cnpj'), 'required');
        //another data
        $this->form_validation->set_rules('username', lang('username'), 'required|min_length[5]|max_length[32]|is_unique[p.username]');
        $this->form_validation->set_rules('primary_email', lang('primary_email'), 'required|valid_email|matches[primary_email_conf]|is_unique[p.primary_email]');
        $this->form_validation->set_rules('primary_email_conf', lang('primary_email_conf'), 'required');
        $this->form_validation->set_rules('birthday', lang('birthday'), 'required|callback_external_callbacks[company_model,datetime_validation]');
    }

    function _set_update_rules()
    {
        // Required data of company table
        $this->form_validation->set_rules('name', lang('name'), 'required|min_length[2]|max_length[50]');
        //  $this->form_validation->set_rules('cnpj', lang('cnpj'), 'required|is_natural|exact_length[14]|callback_external_callbacks[company_model,cnpj_validation]');
        $this->form_validation->set_rules('cnpj', lang('cnpj'), 'required');
        //
        //another data
        $this->form_validation->set_rules('username', lang('username'), 'required|min_length[5]|max_length[32]');
        $this->form_validation->set_rules('primary_email', lang('primary_email'), 'required|valid_email');
        $this->form_validation->set_rules('birthday', lang('birthday'), 'required|callback_external_callbacks[company_model,datetime_validation]');
    }

    /**
     * Short description for the function
     *
     * Long description for the function (if any)...
     *
     * @param  array  $array  Description of array
     * @param  string $string Description of string
     * @return boolean
     */
    function my_companies()
    {
        $this->data['header']->title = lang('my_companies');
        $user = $this->session->userdata('p_id');
        $role = $this->Role->get_where_unique(array('name' => 'admin'));

        if ( $role )
            $role_id = $role->id;
        else
            $role_id = NULL;

        $this->data['companies'] = $this->model->get_companies_admin($role_id, $user);
        $this->_view('my_companies', NULL, 'company');
    }

    function use_as($company_id)
    {
        $this->load->model('role_model', 'role');
        $this->load->model('p_and_p_model', 'p_and_p');
        if ( isset($company_id) )
        {
            $company = $this->model->get($company_id);
            !empty($company) ? $company_p_id = $company->p_id : $company_p_id = NULL;
            $role = $this->role->get_where_unique(array('name' => 'admin'));
            !empty($role) ? $role_id = $role->id : $role_id = NULL;
            $user = $this->session->userdata('p_id');
            if ( $this->p_and_p->exists(array('p_id' => $user, 'p_id1' => $company_p_id, 'role_id' => $role_id)) )
            {
                $this->model->set_company($company_id);
                $this->msg_ok(lang('you_set_use_as_to company'));
                $url = '/company/view/' . $company_id;
                redirect($url, 'refresh');
            }
            else
            {
                $this->msg_error(lang('you_are_not_administrator_of_this_company'));
                $url = '/company/my_companies/';
                redirect($url, 'refresh');
            }
        }
        else
        {
            $this->msg_error(lang('incompatible_company_id'));
            $url = '/company/my_companies/';
            redirect($url, 'refresh');
        }
    }

}
