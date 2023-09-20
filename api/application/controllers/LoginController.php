<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function login()
	{
		$this->load->model('LoginModel');
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$user  = $this->LoginModel->logar($email, $senha);

		if($user && password_verify($senha, $user['senha'])) {

			$this->session->set_userdata("logado", $user);

			echo 'logado';
			//print_r($user['senha']);
		}
		else
			echo 'n logado';
	
	}

	/*public function login()
	{
		// Verifique se a solicitação é um POST
		if ($this->input->post()) {
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');

			// Carregue o modelo de usuário
			$this->load->model('LoginModel');

			// Consulte o banco de dados para verificar se o usuário existe
			$usuario = $this->LoginModel->logar($email);

			if ($usuario && password_verify($senha, $usuario->senha)) {
				// Login bem-sucedido
				// Defina uma sessão de usuário ou gere um token JWT, dependendo da sua autenticação
				// Redirecione para a página de dashboard ou retorne uma resposta JSON de sucesso
				// Exemplo de redirecionamento:
				redirect('dashboard');
			} else {
				// Login falhou
				// Exiba uma mensagem de erro ou retorne uma resposta JSON de erro
				// Exemplo de exibição de mensagem de erro:
				$data['erro'] = 'Credenciais inválidas';
				$this->load->view('login_view', $data);
			}
		} else {
			// Se a solicitação não for POST, exiba o formulário de login
			$this->load->view('login_view');
		}
	}*/


}
