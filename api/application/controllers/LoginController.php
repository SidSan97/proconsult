<?php
session_start();

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
				$_SESSION['nivel']  = $usuario->nivel;
				$_SESSION['nome'] = $usuario->nome;

				$json = array(
					'status' => 200,
					'message' => 'Logado com sucesso!'
				);

				$data['json_result'] = json_encode($json);
				$this->load->view('index', $data);
				
			} else {
				
				$json = array(
					'status'  => 404,
					'message' => 'Credenciais Inválidas'
				);

				$data['json_result'] = json_encode($json);
				$this->load->view('login-view', $data);
			}
		} else {

			$this->load->view('login-view');
		}
	}


}
