<?php

/**
 * P_and_p model file is the point to interact with the entity P_and_p
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'p_and_p_object.php';

/**
 * P_and_p_model class are responsible about the interact with the entity 
 * P_and_p
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class P_and_p_model extends Entity_model {

    /**
     * The contruct of class P_and_p_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'p_and_p';
        //Contains the name of the view
        $this->table_view = 'p_and_ps_view';
        //Contains the name of the single entity object
        $this->data_type = 'P_and_p_object';
        //set the date fields
        $this->date_fields = array('start_date', 'end_date');
    }

    function save_invites($data)
    {
        $this->load->model('Person_model', 'person');

        $this->db->trans_begin();
        log_message("info", "Transação aberta: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);

        $date = date("Y-m-d");
        $date_time = date("Y-m-d H:i:s", time());

        foreach ( $data['people_invited'] as $person_invited )
        {
            $username = trim(strrchr($person_invited, ' '));
            if ( $this->person->exists(array('username' => $username)) )
            {

                $new_data = array();
                $new_data['p_id'] = $this->person->get_where_unique(array('username' => $username))->p_id;
                $new_data['p_id1'] = $data['p_id1'];
                $new_data['role_id'] = $data['role_id'];
                $new_data['start_date'] = $date;
                $new_data['create_time'] = $date_time;
                $new_data['update_time'] = $date_time;

                $new_data = $this->filterInputArray($new_data);

                if ( !$this->exists(array('p_id' => $new_data['p_id'], 'p_id1' => $new_data['p_id1'], 'role_id' => $new_data['role_id'], 'end_date' => NULL)) )
                {
                    $this->insert($new_data);
                }
            }
        }

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
            return TRUE;
        }
    }

}