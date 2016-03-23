<?php

/**
 * Person controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once 'p.php';

/**
 * Person class
 *
 * Class to implements the actions to interact with the person entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Person extends P {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('dropdown');
        $this->load->model('pcr/Company_model', 'Company');
        $this->load->model('pcr/P_and_p_model', 'P_and_p');
        $this->load->model('pcr/Role_model', 'Role');
    }

    public function _remap($method, $params = array())
    {
        if ( method_exists($this, $method) )
        {
            return call_user_func_array(array($this, $method), $params);
        }

        $re1 = '(invite)';  # Word 1
        $re2 = '(_)';   # Any Single Character 1
        $re3 = '((?:[a-z][a-z]+))'; # Word 2
        $re4 = '(_)';   # Any Single Character 2
        $re5 = '(to)';  # Word 3
        $re6 = '(_)';   # Any Single Character 3
        $re7 = '(company\b)';   # Word 4

        if ( $c = preg_match_all("/" . $re1 . $re2 . $re3 . $re4 . $re5 . $re6 . $re7 . "/is", $method, $matches) )
        {
            $word1 = $matches[1][0];
            $c1 = $matches[2][0];
            $word2 = $matches[3][0];
            $c2 = $matches[4][0];
            $word3 = $matches[5][0];
            $c3 = $matches[6][0];
            $word4 = $matches[7][0];
            //print "($word1) ($c1) ($word2) ($c2) ($word3) ($c3) ($word4) \n";
            //prepare call function
            $params[] = $word2;
            $new_method = $word1 . '_' . $word3 . '_' . $word4;

            return call_user_func_array(array($this, $new_method), $params);
        }
        else
        {
            show_404();
        }
    }

    function _set_create_rules()
    {

        //callback_external_callbacks[person_model,password_strength_validation]
        $this->form_validation->set_rules('first_name', lang('first_name'), 'required');
        $this->form_validation->set_rules('last_name', lang('last_name'), 'required');
        $this->form_validation->set_rules('cpf', lang('cpf'), 'required|is_natural|exact_length[11]|is_unique[person.cpf]|callback_external_callbacks[person_model,cpf_validation]');
        $this->form_validation->set_rules('gender', lang('gender'), 'required');
        $this->form_validation->set_rules('password', lang('password'), 'required|matches[passconf]|min_length[8]|callback_external_callbacks[person_model,password_strength_validation]');
        $this->form_validation->set_rules('passconf', lang('password_confirmation'), 'required');

        /*
          $this->form_validation->set_rules('first_name', lang('first_name'), '');
          $this->form_validation->set_rules('last_name', lang('last_name'), '');
          $this->form_validation->set_rules('cpf', lang('cpf'), '');
          $this->form_validation->set_rules('gender', lang('gender'), '');
          $this->form_validation->set_rules('password', lang('password'), '');
          $this->form_validation->set_rules('passconf', lang('password_confirmation'), '');
         */
        parent::_set_create_rules();
    }

    function _set_update_rules()
    {

        $this->form_validation->set_rules('first_name', lang('first_name'), 'required');
        $this->form_validation->set_rules('last_name', lang('last_name'), 'required');
        $this->form_validation->set_rules('cpf', lang('cpf'), 'required|is_natural|exact_length[11]|callback_cpf_validation|callback_external_callbacks[person_model,is_unique_validation,cpf]');
        $this->form_validation->set_rules('gender', lang('gender'), 'required');
        /*
          $this->form_validation->set_rules('first_name', lang('first_name'), '');
          $this->form_validation->set_rules('last_name', lang('last_name'), '');
          $this->form_validation->set_rules('cpf', lang('cpf'), '');
          $this->form_validation->set_rules('gender', lang('gender'), '');
          parent::_set_update_rules();
         */
    }

    function create()
    {
        $this->url_return = 'person/create_success';
        parent::create();
    }

    function create_success()
    {
        $this->_view($this->ctrlr_name . '_create_success');
    }

    /**
     * To invite any people to my companies
     *
     * @param  string  $role  This parameter is populated by the function
     */
    function invite_to_company($role)
    {
        $this->data['header']->title = sprintf(lang('invite_to_company'));
        $this->form_validation->set_rules('p_id1', lang('emp_admin'), 'required');
        $this->form_validation->set_rules('people_invited', lang('select_people'), 'required');
        $this->form_validation->set_rules('person_to_invite', lang('person_to_invite'), '');

        //jquery-autocomplete - Load the default js files
        $this->data['js_files'][] = 'jquery-autocomplete/lib/jquery.js';
        $this->data['js_files'][] = 'jquery-autocomplete/lib/jquery.bgiframe.min.js';
        $this->data['js_files'][] = 'jquery-autocomplete/lib/jquery.ajaxQueue.js';
        $this->data['js_files'][] = 'jquery-autocomplete/lib/thickbox-compressed.js';
        $this->data['js_files'][] = 'jquery-autocomplete/jquery.autocomplete.js';
        $this->data['js_files'][] = 'jquery-selectboxes/jquery.selectboxes.js';

        //jquery-autocomplete - Load the default css files
        $this->data['css_files'][] = 'jquery-autocomplete/jquery.autocomplete.css';
        $this->data['css_files'][] = 'jquery-autocomplete/lib/thickbox.css';

        if ( $this->form_validation->run() == FALSE )
        {
            $p_id = $this->session->userdata('p_id');

            $this->data['p_id'] = $p_id;

            $role_admin = $this->Role->get_where_unique(array('name' => 'admin'))->id;

            $this->data['role_name'] = $role;

            $role_id = $this->Role->get_where_unique(array('name' => $role));
            if ( !empty($role_id) )
            {
                $this->data['role_id'] = $role_id->id;
            }
            else
            {
                $this->data['role_id'] = NULL;
            }

            $this->data['emp_admin'] = array_to_dropdown($this->Company->get_companies_admin($role_admin, $p_id), 'p_id');
            $this->data['select_persons'] = array('first' => lang('select_people'));

            $this->_view($this->ctrlr_name . '_invite');
        }
        else
        {
            if ( ($this->P_and_p->save_invites($this->input->post(NULL, TRUE))) > 0 )
            {
                $this->msg_ok(lang('invites_success'));
                redirect(plural($this->ctrlr_name), 'refresh');
            }
            else
            {
                $this->msg_error(lang('invites_error'));
                $url = $this->ctrlr_name . '/invite_' . $role . '_to_company/';
                redirect($url, 'refresh');
            }
        }
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
    function auto_complete()
    {
        $q = strtolower($_GET["q"]);
        $people = $this->model->search($q);
        $print = NULL;

        foreach ( $people as $person )
        {
            $print = $person->first_name . " " . $person->last_name . " - " . $person->username . "\n";
            echo $print;
        }
    }

}