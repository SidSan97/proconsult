<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {

	public function cadastroUsuario()
	{
		if(isset($_POST['enviar'])) {

			$validacao = true;

			if($_POST['senha'] != $_POST['senha2']) {

				$validacao = false;
				
				$json = array(
					'status' => 406,
					'message' => 'As senhas são diferentes'
				);

				$data['json_result'] = json_encode($json);
        		$this->load->view('cadastro-view', $data);
			} 
			$cpf = preg_replace( '/[^0-9]/is', '', $_POST['cpf']);


			$this->load->model('VerificarCpfModel');
			$verCpf = $this->VerificarCpfModel->verificaExistenciaCpf($cpf);

		
			$this->load->model('VerificarEmailModel');
			$email = $this->VerificarEmailModel->verificaExistenciaEmail($_POST['email']);
			

			if($verCpf !== true) {

				$validacao = false;
				$data2['json_result'] = json_encode($verCpf);
				$this->load->view('cadastro-view', $data2);

			} else if($email !== true) {

				$validacao = false;
				$data['json_result'] = json_encode($email);
				$this->load->view('cadastro-view', $data);
			}
				
			$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
			
			$dados = array(
				'nome'  => $_POST['nome'],
				'email' => $_POST['email'],
				'cpf'   => $cpf,
				'senha' => $senha,
				'nivel' => $_POST['nivel']
			);
			
			if($validacao === true) {

				$this->load->model('CadastroUsuarioModel');
				$json = $this->CadastroUsuarioModel->inserirUsuario($dados);

				//die(print_r($json));
				$data['json_result'] = json_encode($json);
        		$this->load->view('index', $data);

				//$this->output->set_content_type('application/json')->set_output(json_encode($json));
			}

		} else {
			
			$json = array(
				'status' => 405,
				'message' => 'Método não permitido. Use POST para inserir novos usuários'
			);

			$data['json_result'] = json_encode($json);
        	$this->load->view('cadastro-view', $data);

			//$this->output->set_content_type('application/json')->set_output(json_encode($json));
		}
	}
}
