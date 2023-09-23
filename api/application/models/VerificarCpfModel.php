<?php

class VerificarCpfModel extends CI_Model
{
	function verificaExistenciaCpf($cpf) {

		$validacao = $this->validaCPF($cpf);

		if($validacao == true) {

			$acharCpf = $this->db->get_where('usuario', array('cpf' => $cpf));

			if($acharCpf->num_rows() > 0) {

				$json = array(
					'status' => 407,
					'message' => 'CPF ja cadastrado'
				);

				return $json;
				exit();

			} else {

				return true;
				exit();
			}

		}
		else {

			$json = array(
				'status' => 407,
				'message' => 'CPF inválido'
			);

			return $json;
			exit();
		}
	}

	function validaCPF($cpf) {
 
		// Extrai somente os números
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
		 
		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
			return false;
			exit();
		}
	
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
			exit();
		}
	
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
				exit();
			}
		}

		return true;
	}
}
