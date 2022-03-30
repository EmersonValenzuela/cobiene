<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        
        parent::__construct();
        check_login_user();
        
		
	}

	public function index()
	{
		
			$this->load->view('dace/pages/go');
		

	}
}
