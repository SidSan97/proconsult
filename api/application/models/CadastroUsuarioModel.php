<?php

class CadastroUsuarioModel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function inserirUsuario($dados)
	{
		if($this->db->insert("usuario", $dados)) {
			
			$json = array(
				'status' => 201,
				'message' => 'Usuário cadastrado com sucesso.'
			);

			return $json;
		}
		else {

			$json = array(
				'status' => 500,
				'message' => 'Erro ao cadastrar usuário.'
			);
			
			return $json;
		}
	}
}
