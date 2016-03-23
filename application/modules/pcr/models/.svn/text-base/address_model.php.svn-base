<?php

/**
 * Address model file is the point to interact with the entity Address
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'address_object.php';

/**
 * Address_model class are responsible about the interact with the entity Address
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class Address_model extends Entity_model {

    /**
     * The contruct of class Address_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'address';
        //Contains the name of entity/view
        $this->table_view = 'addresses_view';
        //Contains the name of the single entity object
        $this->data_type = 'Address_object';
    }

    public function insert($data)
    {
        if ( !isset($data['p_id']) )
            $data['p_id'] = $this->session->userdata('p_id');
        return parent::insert($data);
    }

}