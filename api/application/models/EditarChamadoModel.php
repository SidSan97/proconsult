<?php

class EditarChamadoModel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function editandoChamado($dados, $id)
	{
        $this->db->where('id', $id);
        
		if($this->db->update('chamados', $dados))
		{

            $json = array(
                'status'  => 200,
                'message' => 'Resposta enviada com sucesso.',
            );

        return $json;
			
		}
		else {

			$json = array(
				'status' => 500,
				'message' => 'Erro ao mandar resposta.'
			);
			
			return $json;
		}
	}

}
