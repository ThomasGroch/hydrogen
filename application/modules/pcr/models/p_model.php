<?php

/**
 * P model file is the central point to interact with the entity Person_model
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'person_object.php';

/**
 * P_model class are responsible about the interact with the entity Person_model
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
Class P_model extends Entity_model {

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
        $this->table = 'p';
        //Contains the name of the set entity object
        $this->data_type = 'P_object';
        $this->date_fields[] = 'birthday';
    }

    /**
     * Inserts a row into a table in the database
     *
     * The param "$data" accept 2 types of variable, array or object, if the 
     * param is an object, the function filterInputArray() will transform 
     * this for array.
     *
     * @param  array  $data  array of data for insert
     * @return integer
     */
    function insert($data)
    {
        $id = FALSE;
        $p_data = $this->filterInputArray($data, TRUE, 'p');
        $this->db->insert('p', $p_data);
        $data['p_id'] = $this->db->insert_id();
        $id = parent::insert($data);
        return $id;
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
    function update_by_id($id, $data)
    {
        $item = $this->get($id);

        if ( $item )
        {
            $this->db->trans_begin();
            log_message("info", "Transação aberta: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);

            $date_time = date("Y-m-d H:i:s", time());
            $data['update_time'] = $date_time;
            $new_data = $this->filterInputArray($data, TRUE, 'p');
            unset($new_data['id']);
            $this->db->where($this->id, $item->p_id);
            $this->db->update('p', $new_data);
            $affected_rows = $this->db->affected_rows();

            $updated = parent::update_by_id($id, $data);

            if ( $this->db->trans_status() === FALSE )
            {
                //trans error - Rollback
                $this->db->trans_rollback();
                log_message("info", "Transação rollback: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);
                return FALSE;
            }
            else
            {
                //trans success - commit
                $this->db->trans_commit();
                log_message("info", "Transação commit: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);
                return $affected_rows || $updated ? TRUE : FALSE;
            }
        }
        return FALSE;
    }

}