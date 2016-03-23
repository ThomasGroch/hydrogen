<?php

/**
 * Phone model file is the point to interact with the entity Phone
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'phone_object.php';

/**
 * Phone_model class are responsible about the interact with the entity Phone
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class Phone_model extends Entity_model {

    /**
     * The contruct of class Phone_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'phone';
        $this->table_view = 'phones_view';
        //Contains the name of the single entity object
        $this->data_type = 'phone_object';
    }
    
    public function insert($data)
    {
        if ( !isset($data['p_id']) )
            $data['p_id'] = $this->session->userdata('p_id');
        return parent::insert($data);
    }
}