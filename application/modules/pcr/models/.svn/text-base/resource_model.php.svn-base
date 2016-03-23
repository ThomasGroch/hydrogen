<?php

/**
 * Resource_model file is the point to interact with the entity Resource
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'resource_object.php';

/**
 * Resource_model class are responsible about the interact with the entity 
 * Resource
 *
 * @copyright  2011 ARQABS
 * @version    Release: @package_version@
 */
Class Resource_model extends Entity_model {

    /**
     * The contruct of class Resource_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'resource';
        //Contains the name of the single entity object
        $this->data_type = 'resource_object';
    }

    function get_controllers($fields, $groupby = NULL)
    {
        $this->db->select($fields);
        if ( !empty($groupby) )
            $this->db->group_by($groupby);
        return $this->get_all();
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
    function init_resource()
    {
        $this->db->trans_begin();
        log_message("info", "Transação aberta: " . $this->router->class . "/" . $this->router->method . " Linha: " . __LINE__);

        $actual_resources = array();
        $persisted_resources = array();

        $persisted_resources = $this->convert_resources_array($this->model->get_all());

        $this->load->helper('directory');
        $map_modules = directory_map('./modules/', TRUE, TRUE);

        $key = array_search(".svn", $map_modules);
        if ( isset($map_modules[$key]) )
            unset($map_modules[$key]);

        foreach ( $map_modules as $module )
        {
            $map_controllers_module = directory_map('./modules/' . $module . '/controllers/', TRUE, TRUE);

            foreach ( $map_controllers_module as $controller )
            {
                list($file, $ext) = explode('.', $controller);

                if ( $ext == 'php' )
                {

                    $controllers_path = APPPATH . 'modules/' . $module . '/controllers/';

                    if ( $file != 'crud_controller'
                            && $file != 'base_controller'
                            && $file != 'resource'
                            && $file != 'p' )
                    {
                        include($controllers_path . $controller);
                    }

                    $class_methods = get_class_methods(ucfirst($file));
                    foreach ( $class_methods as $method )
                    {
                        if ( strpos($method, '_') !== 0
                                && strpos($method, 'msg') !== 0
                                && $method != 'g'
                                && $method != 'get_instance'
                                && $method != 'init_resource'
                                && $method != 'external_callbacks'
                                && $method != 'ajax_delete'
                                && $method != 'save'
                                && $method != 'get_city' )
                        {
                            $data['controller'] = $controller = strtolower($file);
                            $data['method'] = $method = strtolower($method);

                            $actual_resources[$controller][$method] = TRUE;

                            if ( !isset($persisted_resources[$controller][$method]) )
                            {
                                $this->model->insert($data);
                            }
                        }
                    }
                }
            }
        }

        $resources_to_delete = array_diff_key($persisted_resources, $actual_resources);
        foreach ( $resources_to_delete as $resource )
        {
            foreach ( $resource as $resource_id )
            {
                $this->Role_has_resource_model->delete(array('resource_id' => $resource_id));
                $this->model->delete_by_id($resource_id);
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