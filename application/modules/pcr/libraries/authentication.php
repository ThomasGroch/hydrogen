<?php

if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

class Authentication {

    var $CI;

    /**
     * Constructor
     */
    function __construct()
    {
        // Obtain a reference to the ci super object
        $this->CI = & get_instance();

        $this->CI->load->library('session');
    }

    // --------------------------------------------------------------------

    /**
     * Check user signin status
     *
     * @access public
     * @return bool
     */
    function is_signed_in()
    {
        return $this->CI->session->userdata('person_id') ? TRUE : FALSE;
    }

}

/* End of file Authentication.php */
/* Location: ./application/modules/account/libraries/Authentication.php */