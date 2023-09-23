<?php
session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class DeslogarController extends CI_Controller {

	public function logout() {

		unset($_SESSION['logado']);
		unset($_SESSION['nome']);
		unset($_SESSION['nivel']);
		session_destroy();

		$json = array(
			'status'  => 201,
			'message' => 'Deslogado com sucesso'
		);

		$data['json_result'] = json_encode($json);
		$this->load->view('index', $data);
	}
}
