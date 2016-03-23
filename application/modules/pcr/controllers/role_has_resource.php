<?php

/**
 * Resource controller
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/controllers/crud_controller.php';

/**
 * Role_has_resource class
 *
 * Class to implements the actions to interact with the Role_has_resource entity
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
class Role_has_resource extends CRUD_Controller {

    /**
     * The construct of this class to call the construct of the class 
     * CRUD_Controller and load any models, helpers, librarys and etc.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('dropdown');
        $this->load->model('role_model', 'role');
        $this->load->model('resource_model', 'resource');
    }

    function _set_change_permissions_rules()
    {
        return true;
    }

    function change_permissions($role_id = NULL)
    {
        $roles = $this->role->get_all();
        if ( isset($role_id) )
        {
            $role = $this->role->get($role_id);
            $role_name = $role->name;
            $this->data['header']->title = sprintf(lang('change_permissions'), $role->name);
        }
        else
        {
            $role_id = $roles[0]->id;
            $role_name = $roles[0]->name;
            if ( $roles )
                $this->data['header']->title = sprintf(lang('change_permissions'), $roles[0]->name);
            else
                $this->data['header']->title = lang('change_permissions');
        }

        $this->_set_change_permissions_rules();

        $this->data['role_id'] = $role_id;
        $this->data['role_name'] = $role_name;
        $this->data['roles'] = array_to_dropdown($roles);

        $resources = $this->convert_resources_array($this->resource->get_controllers(array('id', 'controller', 'method')));

        $this->data['resources'] = $resources;
        $permission_resources = $this->convert_permission_array($this->model->get_where(array('role_id' => $role_id)));
        $this->data['permission_resources'] = $permission_resources;

        $this->_view($this->ctrlr_name);
    }

    function save_permissions()
    {

        if ( $this->model->save_permissions() )
        {
            $this->msg_ok(lang('permission_changed'));
            $url = '/role_has_resource/change_permissions/' . $this->input->post('role_id');
            redirect($url, 'refresh');
        }
        else
        {
            $this->msg_error(lang('permission_not_changed'));
            $url = '/role_has_resource/change_permissions/' . $this->input->post('role_id');
            redirect($url, 'refresh');
        }
    }

    function convert_permission_array($data)
    {
        $new_array = array();
        foreach ( $data as $line )
        {
            $new_array[$line->role_name][$line->controller][$line->method] = $line->permission;
        }
        return $new_array;
    }

    function convert_resources_array($data)
    {
        $new_array = array();
        foreach ( $data as $line )
        {
            $new_array[$line->controller][$line->method] = $line->id;
        }
        return $new_array;
    }

}