<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListarChamadosController extends CI_Controller {

	public function listarChamados()
	{
		$this->load->model('ListarChamadosModel');
		$result = $this->ListarChamadosModel->obterChamados();

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
}
