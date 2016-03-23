<?php

/**
 * P model file is the central point to interact with the entity Person_model
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'person_login_object.php';

/**
 * P_model class are responsible about the interact with the entity Person_model
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
Class Person_login_model extends Entity_model {

    /**
     * The contruct of class P_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     *
     * @param  array  $array  Description of array
     * @param  string $string Description of string
     * @return boolean
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'person_login';
        //Contains the name of the set entity object
        $this->data_type = 'Person_login_object';
        $this->date_fields[] = 'date';
    }

}