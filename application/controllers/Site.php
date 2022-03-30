<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data = array();

		if ($this->session->userdata('is_user_login') == TRUE) {
			redirect(base_url() . 'admin/dashboard', 'refresh');
		}
		$data['title'] = "";
		$data['text'] = "";
		$data['LoaderBg'] = "";
		$data['hideAfter'] = "";
		$data['icon'] = "";
		$data['page_title'] = "Registrarte";
		$this->load->view('login', $data);
	}

	public function login()
	{

		$this->form_validation->set_rules('cip', 'Su CIP es requerido', 'required');
		$this->form_validation->set_rules('password', 'Su Contraseña es requerido', 'required');

		if ($this->form_validation->run()) {

			if ($_POST) {
				$cip = md5($this->input->post('cip'));

				$rowData = $this->Admin_model->auth_user_login(array('rol' => '2', 'encrypt_cip' => $cip));

				if ($rowData) {
					if ($rowData->password_user == md5($this->input->post('password'))) {
						if ($rowData->condition_user == '1') {
							$data = array(
								'user_id' => $rowData->id_user,
								'user_type' => $rowData->rol,
								'user_name' => $rowData->name_user,
								'user_email' => $rowData->email_user,
								'user_phone' => $rowData->phone_user,
								'user_cip' => $rowData->cip_user,
								'user_dni' => $rowData->dni_user,
								'is_user_login' => TRUE
							);

							$this->session->set_userdata($data);

							redirect('/', 'refresh');
						} else {
							$title = "Advertencia";
							$text = "¡Su cuenta está actualmente desactivada! <br> <a href='" . base_url('autenticacion/'.$this->input->post('cip')) . "'>Enviar nuevamente el correo.</a>";
							$LoaderBg = "#ff6849";
							$hideAfter = "FALSE";
							$icon = "warning";
						}
					} else {
						$title = "Error";
						$text = "¡La contraseña no es válida!";
						$LoaderBg = "#ff6849";
						$hideAfter = "5000";
						$icon = "error";
					}
				} else {
					$title = "Error";
					$text = "¡Lo sentimos, el CIP no se encuentra!";
					$LoaderBg = "#ff6849";
					$hideAfter = "5000";
					$icon = "error";
				}
			}
		} else {
			$title = "Error";
			$text = "¡Ingrese todos los campos requeridos!";
			$LoaderBg = "#ff6849";
			$hideAfter = "5000";
			$icon = "error";
		}

		$data['title'] = $title;
		$data['text'] = $text;
		$data['LoaderBg'] = $LoaderBg;
		$data['hideAfter'] = $hideAfter;
		$data['icon'] = $icon;
		$this->load->view('login', $data);
	}

	public function register()
	{
		if ($_POST) {

			if ($_FILES['img_cip']['name'] != "") {

				$config['upload_path'] = 'assets/images/cip/';
				$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';

				$image_cip = date('dmYhis') . '_' . rand(0, 99999) . "." . pathinfo($_FILES['img_cip']['name'], PATHINFO_EXTENSION);

				$config['file_name'] = $image_cip;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('img_cip')) {
					$error = array('error' => $this->upload->display_errors());

					var_dump($error) . "<br>";
				}
			}

			if ($_FILES['img_dni']['name'] != "") {

				$config['upload_path'] = 'assets/images/cip/';
				$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';

				$image_dni = date('dmYhis') . '_' . rand(0, 99999) . "." . pathinfo($_FILES['img_dni']['name'], PATHINFO_EXTENSION);

				$config['file_name'] = $image_dni;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('img_dni')) {
					$error = array('error' => $this->upload->display_errors());

					var_dump($error) . "<br>";
				}
			}

			$cip = $this->encryption->encrypt($this->input->post('cip'));
			$encrypt_cip = md5($this->input->post('cip'));


			$rowData = $this->Admin_model->auth_user_login(array('rol' => '2', 'cip_user' => $cip));

			if (empty($rowData)) {
				$data = array(
					'rol' => '2',
					'cip_user' => $cip,
					'password_user' => md5($this->input->post('password')),
					'encrypt_cip' => $encrypt_cip,
					'dni_user' => $this->encryption->encrypt($this->input->post('dni')),
					'name_user' => $this->input->post('name'),
					'email_user' => $this->input->post('email'),
					'phone_user' => $this->input->post('phone'),
					'cip_image_user' => $image_cip,
					'dni_image_user' => $image_dni,
					'create_user' => date(DATE_W3C),
					'condition_user' => '0',
					'cod_validation_user' => ""
				);

				$data = $this->security->xss_clean($data);
				$result = $this->Admin_model->insert($data, 'tbl_users');

				if ($result) {


					$data['cip'] =  $cip;
					$data['phone_user'] =  $this->input->post('phone');
					$this->load->view('authentication', $data);
					$data = "";
				}
			} else {
			}
		} else {
			$this->load->view('register');
		}
	}

	public function authentication($data)
	{
		$rowData = $this->Admin_model->auth_user_login(array('rol' => '2', 'encrypt_cip' => md5($data)));
		$Data['phone_user'] = $rowData->phone_user;
		$this->load->view('authentication',$Data);

	}

	public function FunctionName()
	{
		echo $_GET['phone'];
	}

	public function confirm_mail($data)
	{
		$this->load->view('confirm', $data);
	}

	public function resend_mail()
	{
		$data['cip'] =  $this->input->post('cip');
		$data['code'] = $this->input->post('code');

		$this->load->view('confirm', $data);
	}


	public function reception($code = null)
	{

		$this->load->view('email');
	}

	public function check_mail($code)
	{
		$data['code'] =  $code;

		$rowData = $this->Admin_model->auth_user_login(array('rol' => '2', 'cod_validation_user' => $code));

		if (!empty($rowData)) {

			$data = array(
				'user_id' => $rowData->id_user,
				'user_type' => $rowData->rol,
				'user_name' => $rowData->name_user,
				'user_email' => $rowData->email_user,
				'user_phone' => $rowData->phone_user,
				'user_cip' => $rowData->cip_user,
				'user_dni' => $rowData->dni_user,
				'is_user_login' => TRUE
			);

			$this->session->set_userdata($data);

			redirect('/', 'refresh');
		} else {
			echo "No encontramos nada";
		}
	}
	public function logout(){

        $array_items = array('user_id', 'user_type', 'user_name', 'user_email', 'user_phone', 'user_cip', 'user_dni', 'is_user_login');

        $this->session->unset_userdata($array_items);

        if (isset($_SERVER['HTTP_REFERER']))
            redirect($_SERVER['HTTP_REFERER']);
        else
            redirect('/', 'refresh');
    }



	public function validateCip()
	{

		$cip    = md5($_GET['cip']);
		$jsonData = array();
		$rowData = $this->Admin_model->validate(array('encrypt_cip' => $cip));

		//Validamos que la consulta haya retornado información
		if ($rowData <= 0) {
			$jsonData['success'] = 0;
			// $jsonData['message'] = 'No existe Cédula ' .$cedula;
			$jsonData['message'] = '';
		} else {
			//Si hay datos entonces retornas algo
			$jsonData['success'] = 1;
			$jsonData['message'] = '<p style="color:red;">Ya esta en uso el CIP  <strong>(' . $_GET['cip'] . ')<strong></p>';
		}

		//Mostrando mi respuesta en formato Json
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}
	public function validateMail()
	{

		$mail  = $_GET['mail'];
		$jsonData = array();
		$rowData = $this->Admin_model->validate(array('email_user' => $mail));

		//Validamos que la consulta haya retornado información
		if ($rowData <= 0) {
			$jsonData['success'] = 0;
			// $jsonData['message'] = 'No existe Cédula ' .$cedula;
			$jsonData['message'] = '';
		} else {
			//Si hay datos entonces retornas algo
			$jsonData['success'] = 1;
			$jsonData['message'] = '<p style="color:red;">Ya esta en uso el Correo <strong>(' . $_GET['mail'] . ')<strong></p>';
		}

		//Mostrando mi respuesta en formato Json
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}
	public function validatePhone()
	{

		$phone    = $_GET['phone'];
		$jsonData = array();
		$rowData = $this->Admin_model->validate(array('phone_user' => $phone));

		//Validamos que la consulta haya retornado información
		if ($rowData <= 0) {
			$jsonData['success'] = 0;
			// $jsonData['message'] = 'No existe Cédula ' .$cedula;
			$jsonData['message'] = '';
		} else {
			//Si hay datos entonces retornas algo
			$jsonData['success'] = 1;
			$jsonData['message'] = '<p style="color:red;">Ya esta en uso el Número  <strong>(' . $_GET['phone'] . ')<strong></p>';
		}

		//Mostrando mi respuesta en formato Json
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}	
	public function validateDni()
	{

		$dni    = $_GET['dni'];
		$jsonData = array();
		$rowData = $this->Admin_model->validate(array('dni_user' => $dni));

		//Validamos que la consulta haya retornado información
		if ($rowData <= 0) {
			$jsonData['success'] = 0;
			// $jsonData['message'] = 'No existe Cédula ' .$cedula;
			$jsonData['message'] = '';
		} else {
			//Si hay datos entonces retornas algo
			$jsonData['success'] = 1;
			$jsonData['message'] = '<p style="color:red;">Ya esta en uso el DNI  <strong>(' . $_GET['dni'] . ')<strong></p>';
		}

		//Mostrando mi respuesta en formato Json
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}
	public function existsMail()
	{

		$mail  = $_GET['mail'];
		$jsonData = array();
		$rowData = $this->Admin_model->validate(array('email_user' => $mail));

		//Validamos que la consulta haya retornado información
		if ($rowData <= 0) {
			$jsonData['success'] = 0;
			// $jsonData['message'] = 'No existe Cédula ' .$cedula;
			$jsonData['message'] = '<p style="color:red;"><strong>Correo no registrado<strong></p>';
		} else {
			//Si hay datos entonces retornas algo
			$jsonData['success'] = 1;
			$jsonData['message'] = '';
		}

		//Mostrando mi respuesta en formato Json
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}
}