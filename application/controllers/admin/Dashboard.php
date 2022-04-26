	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Dashboard extends CI_Controller
	{

		public function __construct()
		{

			parent::__construct();
			check_login_user();
		}

		public function index()
		{
			$data['title'] = 'Inicio';

			$this->template->load('dace/template', 'dace/pages/home', $data);
		}
	}
