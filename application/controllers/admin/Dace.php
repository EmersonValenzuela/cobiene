<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dace extends CI_Controller {

	public function __construct()
	{
        
        parent::__construct();
        check_login_user();
		$this->load->model('Dace_model');
		
	}

	public function formDace()
	{
			$data['title'] = 'Formulario Dace';
			$data['range1'] = $this->Dace_model->get_ranges(array('category_range' => '1'));
			$data['range2'] = $this->Dace_model->get_ranges(array('category_range' => '2'));
			$data['range3'] = $this->Dace_model->get_ranges(array('category_range' => '3'));

			$this->template->load('dace/template', 'dace/pages/formDace', $data);

	}

	public function addForm(){
		
		/* data user */
		
		$name_user = $this->input->post('name_user');
		$last_name_user = $this->input->post('last_name_user');
		$cip_user = $this->input->post('cip_user');
		$range_user = $this->input->post('range_user');
		$email_user = $this->input->post('email_user');
		$phone_user = $this->input->post('phone_user');
		$tel_user = $this->input->post('tel_user');
		
		/* data spouse */

		$name_spouse = $this->input->post('name_spouse');


		/* data sons */



	}
	
}
