<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'welcome';

$route['cadastrar']      = 'usuariocontroller/cadastroUsuario';

$route['login']          = 'logincontroller/login';
$route['login-view']     = 'welcome/paginaLogin';

$route['cadastro-view']  = 'welcome/paginaCadastro';
$route['abrir-chamado']  = 'welcome/paginaAbrirChamado';
$route['responder-chamado']  = 'welcome/paginaResponderChamado';

$route['enviar-chamado'] = 'chamadocontroller/envioChamado';
$route['resposta-chamado'] = 'chamadocontroller/respostaChamado';

$route['listar-chamados'] = 'listarchamadoscontroller/listarChamados';
$route['editar-chamado']  = 'editarchamadocontroller/editarChamado';

$route['deslogar'] = 'deslogarcontroller/logout';
