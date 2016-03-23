<?php

/**
 * Email model file is the point to interact with the entity Role
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'email_object.php';

/**
 * Email_model class are responsible about the interact with the entity Email
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class Email_model extends Entity_model {

    /**
     * The contruct of class Email_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'email';
        $this->table_view = 'emails_view';
        //Contains the name of the single entity object
        $this->data_type = 'Email_object';
        $this->load->model('pcr/Type_email_model', 'type_emails');
    }
    
    public function insert($data)
    {
        if ( !isset($data['p_id']) )
            $data['p_id'] = $this->session->userdata('p_id');
        return parent::insert($data);
    }

}