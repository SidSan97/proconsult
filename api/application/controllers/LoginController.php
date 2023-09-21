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
				
			} else {
				
				$data['erro'] = 'Credenciais inválidas';
				$this->load->view('login-view', $data);
			}
		} else {

			$this->load->view('login-view');
		}
	}


}
