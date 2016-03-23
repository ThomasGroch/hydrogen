<?php

/**
 * P_meta model file is the point to interact with the entity P_meta
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'p_meta_object.php';

/**
 * P_meta_model class are responsible about the interact with the entity Role
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class P_meta_model extends Entity_model {

    /**
     * The contruct of class P_meta_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'p_meta';
        //Contains the name of the single entity object
        $this->data_type = 'P_meta_object';
    }

}