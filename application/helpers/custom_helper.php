<?php


if (!function_exists('check_login_user')) {
	function check_login_user() {
		$ci = get_instance();
		if ($ci->session->userdata('is_user_login') != TRUE) {

			$array_items = array('user_id', 'user_type', 'user_name', 'user_email', 'user_phone', 'user_cip', 'user_dni', 'is_user_login');

			$ci->session->unset_userdata($array_items);

			redirect(base_url());
		}
	}
}

/* * formatea fecha   * */
if (!function_exists("fecha")) {
  function fecha($fecha)
  {
    $dia = substr($fecha, 8, 2);
    $mes = substr($fecha, 5, 2);
    $anio = substr($fecha, 0, 4);
    switch ($mes) {
      case '01':
        $mes = "Enero";
        break;
      case '02':
        $mes = "Febrero";
        break;
      case '03':
        $mes = "Marzo";
        break;
      case '04':
        $mes = "Abril";
        break;
      case '05':
        $mes = "Mayo";
        break;
      case '06':
        $mes = "Junio";
        break;
      case '07':
        $mes = "Julio";
        break;
      case '08':
        $mes = "Agosto";
        break;
      case '09':
        $mes = "Septiembre";
        break;
      case '10':
        $mes = "Octubre";
        break;
      case '11':
        $mes = "Noviembre";
        break;
      case '12':
        $mes = "Diciembre";
        break;
    }
    $fecha = $dia . " de " . $mes . " de " . $anio;
    return $fecha;
  }
}

function generate_string($input, $strength)
{
  $input_length = strlen($input);
  $random_string = '';
  for ($i = 0; $i < $strength; $i++) {
    $random_character = $input[mt_rand(0, $input_length - 1)];
    $random_string .= $random_character;
  }

  return $random_string;
}
