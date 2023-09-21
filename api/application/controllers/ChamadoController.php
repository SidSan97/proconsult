<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChamadoController extends CI_Controller {

	public function envioChamado()
	{
		if(isset($_POST['enviar'])) {

			$arquivos = $_FILES;
			
			if($_FILES['img']['name'][0] == '') {
				$arquivos = null;
			}			

            $arquivos = $_FILES;
			$dados = array(
				'titulo'    => $_POST['titulo'],
				'descricao' => $_POST['descricao'],
				'status'    => "aberto"
			);
			
			$this->load->model('CriarChamadoModel');
			$cad = $this->CriarChamadoModel->inserirChamado($dados, $arquivos);

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
