<?php

class ListarChamadosModel extends CI_Model
{
	public function obterChamados()
    {
       
		$dados = $this->db->get('chamados')->result_array();
		$anexo = $this->db->get('anexos')->result_array();

		if($dados) {

			$json = array(
				'status' => 200,
				'dados'  => $dados,
				'anexo'  => $anexo
			);

			return $json;
		}
		else {

			$json = array(
				'status'  => 404,
				'dados'   => 'Nenhum chamado encontrado',
			);

			return $json;
		}

    }
}
