<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function cadastroUsuario()
	{
		if(isset($_POST['enviar'])) {

			$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
			
			$dados = array(
				'nome'  => $_POST['nome'],
				'email' => $_POST['email'],
				'cpf'   => $_POST['cpf'],
				'senha' => $senha,
				'nivel' => $_POST['nivel']
			);
			
			$this->load->model('CadastroUsuarioModel');
			$cad = $this->CadastroUsuarioModel->inserirUsuario($dados);

			$this->output->set_content_type('application/json')->set_output(json_encode($cad));
		}
		else {
			
			$json = array(
				'status' => 405,
				'message' => 'Método não permitido. Use POST para inserir novos usuários'
			);

			$this->output->set_content_type('application/json')->set_output(json_encode($json));
		}
	}
}
