<?php

/**
 * State model file is the point to interact with the entity State
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'state_object.php';

/**
 * State_model class are responsible about the interact with the entity State
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class State_model extends Entity_model {

    /**
     * The contruct of class State_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'state';
        //Contains the name of the single entity object
        $this->data_type = 'State_object';
    }

}