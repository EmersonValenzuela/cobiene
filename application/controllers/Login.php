<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
        
        parent::__construct();
        $this->load->model('admin_model');
		
	}

	public function index()
	{
		$data = array();

        if($this->session->userdata('is_login') == TRUE){
            redirect(base_url() . 'admin/dashboard', 'refresh');
        }

        $data['page_title'] = "Registrarte";
        $this->load->view('login', $data);

	}

	public function login()
	{

		$data=array();
		$data['page_title']= "DACE";
		$data['Current_page']= "Formulario";

		$this->load->view('register');

	}

	public function register()
    {

		$this->load->view('register');

        $this->form_validation->set_rules('user_name', $this->lang->line('name_place_lbl'), 'trim|required');
        $this->form_validation->set_rules('user_email', $this->lang->line('email_place_lbl'), 'trim|required');
        $this->form_validation->set_rules('user_email', $this->lang->line('email_place_lbl'), 'trim|required');
        $this->form_validation->set_rules('user_email', $this->lang->line('email_place_lbl'), 'trim|required');
        $this->form_validation->set_rules('user_email', $this->lang->line('email_place_lbl'), 'trim|required');


		
    }
}
