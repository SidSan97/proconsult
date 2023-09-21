<?php

class LoginModel extends CI_Model
{
	public function logar($email)
    {
        $query = $this->db->get_where('usuario', array('email' => $email));

        return $query->row();
    }
}
