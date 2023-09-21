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
		if($this->db->insert("chamados", $dados))
		{

			if($arquivos !== null)
			{
				$erroUpload = 0;
				$id = $this->db->insert_id();
				
				for($i=0; $i<count($arquivos['file']['size']); $i++)
				{
					$extensao = pathinfo($arquivos['file']['name'][$i], PATHINFO_EXTENSION);
					if ($arquivos['file']['error'][$i] === UPLOAD_ERR_OK) {

						//echo $arquivos['file']['name'][$i].'<br>';
						//$nomeImg   = $arquivos['file']['name'][$i];
						//$nomeImg   = uniqid() . "." . $extensao;
						//echo $nomeImg.'<br>';
						$uploadDir =  __DIR__; 
						$uploadDir = str_replace("models", "files\\", $uploadDir);
						$uploadFile = $uploadDir . basename($arquivos['file']['name'][$i]); 

						if (move_uploaded_file($arquivos['file']['tmp_name'][$i], $uploadFile)) {

							$arq = array (
								'chamado_id' => $id,
								'nome_anexo' => $arquivos['file']['name'][$i]
							);

							if(!$this->db->insert("anexos", $arq)) {

								$erroUpload++;
							}
						}
						else {
							
							$erroUpload++;
						}
					}
					else {
					
						$erroUpload++;
					} 
				}

				if($erroUpload == 0) {

					$json = array(
						'status'  => 201,
						'message' => 'Chamado criado com sucesso.',
					);
	
					return $json;
				}
				else {

					$json = array(
						'status'  => 201,
						'message' => 'Chamado criado com sucesso. Alguns anexos não puderam ser enviados',
					);
	
					return $json;
				}
			}
			else {
			
				$json = array(
					'status'  => 201,
					'message' => 'Chamado criado com sucesso.',
				);

				return $json;
			}
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
