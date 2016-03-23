<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->load->model('Person', 'person');

		$this->person->insert(array(
		    'status' => 'open',
		    'title' => "I'm too sexy for my shirt"
		));


		// Get all records/documents
		$p = $this->person->get_all();

		echo '<pre>';
		print_r($p);

		$this->load->view('site');
	}
}
