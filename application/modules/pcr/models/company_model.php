<?php

/**
 * Company model file is the central point to interact with the entity Person
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'company_object.php';
include_once 'p_model.php';

/**
 * Company_model class are responsible about the interact with the entity Company
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
Class Company_model extends P_model {

    /**
     * The contruct of class Company_model
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
        $this->table = 'company';
        $this->table_view = 'companies_view';
        //Contains the name of the single entity object
        $this->data_type = 'Company_object';
        $this->load->model('pcr/P_and_p_model', 'P_and_p');
        $this->load->model('pcr/Role_model', 'Role');
        $this->load->helper(array('pcr/password', 'pcr/validation'));
        $this->load->model('pcr/Phone_model', 'phones');
        $this->load->model('pcr/Email_model', 'emails');
        $this->load->model('pcr/Site_model', 'sites');
        $this->load->model('pcr/Address_model', 'address');

        //$this->date_fields[] = 'birthday';
    }

    /**
     * get all phones and emails associated with a company
     * 
     * This method takes the id of the company, seeking all the phones and emails associated with that company and returns an object with an array of company phones and emails.
     *
     * Esse método recebe o id da company, busca todos os telefones e emails associados a essa company e retorna um objeto company com um array de phones e emails.
     *
     * @param  int  $company_id
     * @return object
     */
    function get($company_id)
    {
        $company = parent::get($company_id);

        if ( $company )
        {
            $company->address = $this->address->get_where(array('p_id' => $company->p_id));
            $company->phones = $this->phones->get_where(array('p_id' => $company->p_id));
            $company->emails = $this->emails->get_where(array('p_id' => $company->p_id));
            $company->sites = $this->sites->get_where(array('p_id' => $company->p_id));
        }

        return $company;
    }

    function insert($data)
    {
        $this->db->trans_begin();
        log_message("info", "Transação aberta: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);

        $id = FALSE;
        $id = parent::insert($data);

        // insert the relation
        $company = $this->model->get($id);
        $role = $this->Role->get_where_unique(array('name' => 'admin'));
        $p_and_p = array(
            'p_id' => $this->session->userdata('p_id'),
            'p_id1' => $company->p_id,
            'role_id' => $role->id,
            'start_date' => date("Y-m-d", time())
        );
        $this->P_and_p->insert($p_and_p);

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
            return $id;
        }
    }

    function get_companies_admin($role_id, $p_id)
    {
        $sql = <<< FIM
            SELECT C.*
            FROM companies_view AS C JOIN p_and_p AS PP
            ON C.p_id = PP.p_id1
            WHERE PP.role_id = ?
            AND PP.p_id = ?;
FIM;
        $result = $this->db->query($sql, array($role_id, $p_id));
        if ( $this->data_type )
            return $result->result($this->data_type);
        return $result->result();
    }
    
    function set_company($company_id)
    {
        $company = $this->get($company_id);
        $this->session->set_userdata(
                array(
                    'company_id' => $company->id,
                    'company_name' => $company->name
        ));
    }

}