<?php

/**
 * Person model file is the central point to interact with the entity Person
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
// include_once APPPATH . 'modules/base/models/entity_model.php';
// include_once 'person_object.php';
// include_once 'p_model.php';

/**
 * Person_model class are responsible about the interact with the entity Person
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
Class Person extends Base_Model {
  
  // Indicates that model persists in MongoDB
	protected $_mongodb = TRUE;

	protected $_fields = array(
			'title'  => 'No title set',
			'status' => 'open',
			'body'   => '',
			// Keys other than these ones are not allowed to be inserted.
	);
    /**
     * The contruct of class Person_model
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
        // //Contains the name of entity/table
        // $this->table = 'person';
        // $this->table_view = 'people_view';
        // //Contains the name of the single entity object
        // $this->data_type = 'Person_object';
        // $this->load->helper(array('pcr/password', 'pcr/validation'));
        // $this->load->model('pcr/Phone_model', 'phones');
        // $this->load->model('pcr/Email_model', 'emails');
        // $this->load->model('pcr/Site_model', 'sites');
        // $this->load->model('pcr/Address_model', 'address');
    }

//     /**
//      * get all phones, emails and sites associated with a company
//      *
//      * This method takes the id of the company, seeking all the phones and emails associated with that company and returns an object with an array of company phones and emails.
//      *
//      * Esse método recebe o id da company, busca todos os telefones, emails e sites associados a essa company e retorna um objeto company com um array de phones e emails.
//      *
//      * @param  int  $id
//      * @return object
//      */
//     function get($id)
//     {
//         $person = parent::get($id);
//
//         if ( $person )
//         {
//             $person->address = $this->address->get_where(array('p_id' => $person->p_id));
//             $person->phones = $this->phones->get_where(array('p_id' => $person->p_id));
//             $person->emails = $this->emails->get_where(array('p_id' => $person->p_id));
//             $person->sites = $this->sites->get_where(array('p_id' => $person->p_id));
//         }
//
//         return $person;
//     }
//
//     function get_all_by_role($role_name, $company_id)
//     {
//         //role_id
//         $this->load->model('pcr/Role_model', 'Role');
//         $role = $this->Role->get_where_unique(array('name' => $role_name));
//         $role ? $role_id = $role->id : $role_id = NULL;
//
//         //company_p_id
//         $this->load->model('pcr/Company_model', 'Company');
//         $company = $this->Company->get($company_id);
//         $company ? $company_p_id = $company->p_id : $company_p_id = NULL;
//
//         $sql = <<< FIM
//             select P.*
//             FROM p_and_p AS PP JOIN people_view AS P
//             ON PP.p_id = P.p_id
//             WHERE PP.p_id1 = ?
//             AND PP.role_id = ?;
// FIM;
//         $query = $this->db->query($sql, array($company_p_id, $role_id));
//         return $query->result('Person_object');
//     }
//
//     /**
//      * Short description for the function
//      *
//      * Long description for the function (if any)...
//      *
//      * @param array $array Description of array
//      * @param string $string Description of string
//      * @return boolean
//      */
//     function insert($data)
//     {
//         $this->db->trans_begin();
//         log_message("info", "Transação aberta: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);
//
//         $id = FALSE;
//
//         // for insert Person
//         $data['password'] = hash_password($data['password'], $this->config->item('encryption_key'));
//         $data['ip_address'] = sprintf('%u', ip2long($this->input->ip_address()));
//         $id = parent::insert($data);
//
//         if ( $this->db->trans_status() === FALSE )
//         {
//             //trans error - Rollback
//             $this->db->trans_rollback();
//             log_message("info", "Transação rollback: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);
//             return FALSE;
//         }
//         else
//         {
//             //trans success - commit
//             $this->db->trans_commit();
//             log_message("info", "Transação commit: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);
//             return $id;
//         }
//     }
//
//     public function get_search_columns()
//     {
//         return array('first_name', 'username');
//     }
//
//     function password_strength_validation($pass)
//     {
//         if ( !empty($pass) )
//         {
//             if ( password_strength($pass) == TRUE )
//             {
//                 return TRUE;
//             }
//             else
//             {
//                 $this->form_validation->set_message('external_callbacks', lang('enter_password_with_letters_numbers'));
//                 return FALSE;
//             }
//         }
//         else
//         {
//             $this->form_validation->set_message('external_callbacks', lang('the_field') . nbs() . '%s' . nbs() . lang('is_required'));
//             return FALSE;
//         }
//     }
//
//     function is_unique_username_validation($value)
//     {
//         $table = 'p';
//         $field_name = 'username';
//         $record = $this->db->get_where($table, array($field_name => $value))->row();
//         $person = $this->get($_POST['id']);
//         if ( !isset($record->id) || $record->id == $person->p_id )
//         {
//             return TRUE;
//         }
//         else
//         {
//             $this->form_validation->set_message('external_callbacks', lang('this') . nbs() . lang($field_name) . nbs() . lang('is_not_available'));
//             return FALSE;
//         }
//     }
//
//     function is_unique_primary_email_validation($value)
//     {
//         $table = 'p';
//         $field_name = 'primary_email';
//         $record = $this->db->get_where($table, array($field_name => $value))->row();
//         $person = $this->get($_POST['id']);
//         if ( !isset($record->id) || $record->id == $person->p_id )
//         {
//             return TRUE;
//         }
//         else
//         {
//             $this->form_validation->set_message('external_callbacks', lang('this') . nbs() . lang($field_name) . nbs() . lang('is_not_available'));
//             return FALSE;
//         }
//     }
//
//     function login($primary_email, $password, $remember = FALSE)
//     {
//
//         if ( empty($primary_email) || empty($password) )
//         {
//             return FALSE;
//         }
//
//         //pegar person
//
//         $person = $this->get_where_unique(array('primary_email' => $primary_email));
//
//         if ( !$person )
//         {
//             return FALSE;
//         }
//
//         $hashed_password = hash_password($password, $this->config->item('encryption_key'));
//
//         if ( $person->password === $hashed_password )
//         {
//             $session_data = array(
//                 'person_id' => $person->id,
//                 'p_id' => $person->p_id//everyone likes to overwrite id so we'll use person_id
//             );
//
//             //inserir login na tabela de logins
//             $this->update_last_login($person->id);
//
//             $this->session->set_userdata($session_data);
//
//             if ( $remember )
//             {
//                 //TODO persistir cookie caso remember esteja marcado
//                 //$this->remember_user($user->id);
//             }
//
//             return TRUE;
//         }
//         return FALSE;
//     }
//
//     function update_last_login($id)
//     {
//         $this->load->model('Person_login_model', 'login_model');
//         $this->login_model->insert(array('ip_address' => $this->input->ip_address(),
//             'date' => timestamp_to_mysqldatetime(time()),
//             'person_id' => $id));
//     }

}
