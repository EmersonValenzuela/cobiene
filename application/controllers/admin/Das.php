<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Das extends CI_Controller {

	public function __construct()
	{
        
        parent::__construct();
        check_login_user();
        
		
	}

	public function index()
	{
		
		
			$this->template->load('dace/template','dace/pages/dataDas');
		

	}
    	
	public function form1()
	{
		
		
			$this->template->load('dace/template','dace/pages/hola');
		

	}
}
