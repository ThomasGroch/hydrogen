<?php

/**
 * Base file to implement a model for a line of an entity.
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/crud_object.php';

class Person_object extends Crud_object {

    function __construct()
    {
        parent::__construct();
    }

    function get_full_name()
    {
        return $this->first_name . nbs() . $this->last_name;
    }

    function get_name()
    {
        return $this->username;
    }

    /**
     * Function that implements the logic to see if a user can view this data.
     * 
     * @return boolean Returns if a user can view this data.
     */
    function can_view()
    {
        return TRUE;
    }

    /**
     * Function that implements the logic to see if a user can create this data.
     * 
     * @return boolean Returns if a user can create this data.
     */
    function can_create()
    {
        return TRUE;
    }

    /**
     * Function that implements the logic to see if a user can edit this data.
     * 
     * @return boolean Returns if a user can edit this data.
     */
    function can_edit()
    {
        return TRUE;
    }

    /**
     * Function that implements the logic to see if a user can delete this data.
     * 
     * @return boolean Returns if a user can delete this data.
     */
    function can_delete()
    {
        return TRUE;
    }

}