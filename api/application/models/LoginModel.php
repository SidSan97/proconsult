<?php

class LoginModel extends CI_Model
{
	public function logar($email, $senha)
	{
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);

		$user = $this->db->get('usuario')->row_array();

		return $user;
	}
}
