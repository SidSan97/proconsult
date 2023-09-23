<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChamadoController extends CI_Controller {

	public function envioChamado()
	{
		if(isset($_POST['enviar'])) {

			$arquivos = $_FILES;

			if($_FILES['file']['name'][0] == '') {
				$arquivos = null;
			}			

			$dados = array(
				'titulo'    => $_POST['titulo'],
				'descricao' => $_POST['descricao'],
				'status'    => "Aberto"
			);
			
			$this->load->model('CriarChamadoModel');
			$result = $this->CriarChamadoModel->inserirChamado($dados, $arquivos);

			$data['json_result'] = json_encode($result);
        	$this->load->view('abrir-chamado', $data);

			//$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		else {
			
			$json = array(
				'status' => 405,
				'message' => 'Método não permitido. Use o formulário para abrir um novo chamado por favor'
			);

			$data['json_result'] = json_encode($json);
        	$this->load->view('abrir-chamado', $data);

			//exibiçao em json (comente as duas linhas acima)
			//$this->output->set_content_type('application/json')->set_output(json_encode($json));
			
		}
	}
}
