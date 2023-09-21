<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function paginaLogin()
	{
		$this->load->view('login-view');
	}

	public function cadastroView() 
	{
		$this->load->view('cadastro-view');
	}
}
