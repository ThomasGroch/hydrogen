<?php

/**
 * Site model file is the point to interact with the entity site
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
include_once APPPATH . 'modules/base/models/entity_model.php';
include_once 'site_object.php';

/**
 * site_model class are responsible about the interact with the entity site
 *
 * @copyright  2011 ARQABS
 * @version    Release: $Id$
 */
Class Site_model extends Entity_model {

    /**
     * The contruct of class site_model
     *
     * In the construc of this class is necessary that you configure the name 
     * of the table and the data_type of your entity
     * 
     */
    public function __construct()
    {
        parent::__construct();
        //Contains the name of entity/table
        $this->table = 'site';
        //Contains the name of the single entity object
        $this->data_type = 'Site_object';
        $this->load->helper(array('pcr/favicon', 'pcr/validation'));
    }

    function insert($data)
    {
        $id = FALSE;

        $image = save_site_favicon($data['url'], $data['name'], 'upload/site/');
        if ( $image )
            $data['image'] = $image;
        else
            $data['image'] = NULL;

        $data['url'] = prep_url($data['url']);

        if ( !isset($data['p_id']) )
            $data['p_id'] = $this->session->userdata('p_id');
        
        $id = parent::insert($data);
        return $id;
    }

    function update_by_id($id, $data)
    {
        $site = $this->get($id);
        if ( file_exists($site->image) )
        {
            unlink($site->image);
        }

        $image = save_site_favicon($data['url'], $data['name'], 'upload/site/');
        if ( $image )
            $data['image'] = $image;
        else
            $data['image'] = NULL;

        $data['url'] = prep_url($data['url']);

        $afected_rows = parent::update_by_id($id, $data);
        return $afected_rows;
    }

    function delete_by_id($id)
    {
        $site = $this->get($id);
        $afected_rows = parent::delete_by_id($id);

        if ( !$this->exists(array('image' => $site->image)) )
        {
            if ( file_exists($site->image) )
            {
                unlink($site->image);
            }
        }
        return $afected_rows;
    }

}