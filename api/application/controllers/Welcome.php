<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function paginaLogin()
	{
		$this->load->view('login-view');
	}

	public function paginaCadastro() 
	{
		$this->load->view('cadastro-view');
	}

	public function paginaAbrirChamado()
	{
		$this->load->view('abrir-chamado');
	}

	public function paginaResponderChamado()
	{
		$this->load->view('responder-chamado');
	}
}
