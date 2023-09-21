<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cadastrar']      = 'usuariocontroller/cadastroUsuario';
$route['login']          = 'logincontroller/login';
$route['login-view']     = 'welcome/paginaLogin';
$route['cadastro-view']  = 'welcome/paginaCadastro';
$route['abrir-chamado']  = 'welcome/paginaAbrirChamado';
$route['enviar-chamado'] = 'chamadocontroller/envioChamado';