<?php

/**
 * Company create view
 *
 * call functions necessary to load create_view
 *
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */

$this->load->view('header');

echo validation_errors();

$this->load->view('company/company_create_form');

$this->load->view('footer');

?>
