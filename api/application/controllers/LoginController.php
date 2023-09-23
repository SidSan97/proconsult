<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {


	public function login()
	{
		if ($this->input->post()) {
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');

			$this->load->model('LoginModel');

			$usuario = $this->LoginModel->logar($email);

			if ($usuario && password_verify($senha, $usuario->senha)) {

				$_SESSION['logado'] = true;
				$_SESSION['nivel']  = $usuario['nivel'];
				$_SESSION['nome'] = $usuario['nome'];

				$json = array(
					'status' => 200,
					'message' => 'Logado com sucesso!'
				);

				$this->load->view('login-view', $json);
				
			} else {
				
				$json = array(
					'status' => 404,
					'message' => 'Credenciais Inválidas'
				);

				$this->load->view('login-view', $json);
			}
		} else {

			$this->load->view('login-view');
		}
	}


}
