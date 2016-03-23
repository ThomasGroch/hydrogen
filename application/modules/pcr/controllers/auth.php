<?php

/**
 * Company controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/base_controller.php';

/**
 * Company class
 *
 * Class to implements the actions to interact with the company entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Auth extends Base_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('cookie');
    }

    function login()
    {
        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('primary_email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ( $this->form_validation->run() == true )
        {
            ////check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            $this->load->model('Person_model', 'model');

            if ( $this->model->login($this->input->post('primary_email'), $this->input->post('password'), $remember) )
            {
                ////if the login is successful
                $this->msg_ok(lang('login_ok'));

                //to access previous url before login
                $url = $this->session->userdata('previous_url');
                if ( $this->session->userdata('previous_url') )
                {
                    $this->session->unset_userdata('previous_url');
                    redirect($url, 'refresh');
                }
                else
                {
                    //redirect them back to the home page
                    redirect('person/view/' . $this->session->userdata('person_id'), 'refresh');
                }
            }
            else
            {
                ////if the login was un-successful
                //redirect them back to the login page
                $this->msg_error(lang('login_nok'));
                redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else
        {  //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['primary_email'] = array('name' => 'primary_email',
                'id' => 'primary_email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('primary_email'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_view('login', $this->data);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('person_id');
        $this->session->sess_destroy();
        $this->msg_ok(lang('logout_ok'));
        //$this->session->unset_userdata('previous_url');
        redirect('auth/login', 'refresh');
    }

    function forgotten_password()
    {
        
    }

}
