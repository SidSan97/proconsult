<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarChamadoController extends CI_Controller {

	public function editarChamado()
	{
		if(isset($_POST['enviar'])) {

            
            if(isset($_POST['finalizado']) && $_POST['finalizado'] == "finalizado")
                $status = "Finalizado";
            else
                $status = "Em andamento";

			$dados = array(
				'titulo'    => $_POST['titulo'],
				'descricao' => $_POST['descricao'],
                'resposta'  => $_POST['resposta'],
				'status'    => $status
			);

            $id = $_POST['valor'];
			
			$this->load->model('EditarChamadoModel');
			$result = $this->EditarChamadoModel->editandoChamado($dados, $id);

			$data['json_result'] = json_encode($result);
        	$this->load->view('responder-chamado', $data);

			//$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		else {
			
			$json = array(
				'status' => 405,
				'message' => 'Método não permitido. Use o formulário para responder um chamado por favor'
			);

			$data['json_result'] = json_encode($json);
        	$this->load->view('responder-chamado', $data);

			//$this->output->set_content_type('application/json')->set_output(json_encode($json));
		}
	}
}
