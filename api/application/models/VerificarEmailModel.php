<?php

class VerificarEmailModel extends CI_Model
{
	public function verificaExistenciaEmail($email) {

		$acharEmail = $this->db->get_where('usuario', array('email' => $email));

		if($acharEmail->num_rows() > 0) {

			$json = array(
				'status' => 408,
				'message' => 'E-mail já cadastrado'
			);

			return $json;
			exit();

		} else {
			
			return true;
		}

	}
}
