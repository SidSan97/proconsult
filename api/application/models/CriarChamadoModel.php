<?php

class CriarChamadoModel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function inserirChamado($dados, $arquivos)
	{
        print_r($arquivos);
        die;
		if($this->db->insert("chamados", $dados)) {
			
			$json = array(
				'status' => 201,
				'message' => 'Chamado criado com sucesso.'
			);

			return $json;
		}
		else {

			$json = array(
				'status' => 500,
				'message' => 'Erro ao criar chamado.'
			);
			
			return $json;
		}
	}
}
