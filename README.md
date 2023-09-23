# Projeto Proconsult

<h2>Sobre o projeto</h2>

<br>

<p>
  O projeto foi desenvolvivo com o framework PHP Codeigniter 3 visando sua facil instalação e configuração, além de sua ampla compatibilidade com o PHP 7.3 que é a versão usada neste
  projeto. O Projeto é uma API REST que retorna os dados em formato JSON. Dentro do projeto há templates HTML que consomem dados da API. Há uma posta chamada database, onde há o
  arquivo de banco de dados do projeto.
</p>

<strong>OBS: </strong> <br>

<span>Se você não usa as credenciais default no seu banco de dados será preciso alterar o arquivo: <strong> proconsult\api\application\config\database.php</strong></span>

<br>

<strong>Instalação e uso</strong>

<br>

<span>
  Para usar o projeto basta clona-lo e abri-lo com algum pacote de servidor que você usar. 

  Por exemplo, se você usa o XAMPP:

  Clone o projeto na pasta htdocs do seu XAMPP e depois no seu navegador digite:

  http://localhost/proconsult
</span>

<br>

<p>Características do projeto</p>

<ul>
  <li>API REST</li>
  <li>MVC</li>
  <li>Sanitização e validação de POST</li>
  <li>Autenticação por sessões</li>
  <li>Validação de CPF</li>
  <li>
    Projeto procura seguir os principios de SOLID e PSR como:

    <ul>
      <li>Single Responsiblity Principle (Princípio da responsabilidade única)</li>
      <li>Open-Closed Principle (Princípio Aberto-Fechado)</li>
      <li>PSR-1</li>
      <li>PSR-4</li>
    </ul>
  </li>
  <li>Verificação de duplicidade de dados cadastrados</li>
</ul>

<br>

<h4>Endpoints</h4>

<p>Alguns endpoints para poder testar o funcionamento da api</p>

<ul>
  <li> Cadastrar chamado: <strong> http://localhost/proconsult/api/enviar-chamado </strong></li>
  <li> Cadastrar usuario: <strong> http://localhost/proconsult/api/cadastrar </strong> </li>
  <li> Responder um chamado aberto: <strong> http://localhost/proconsult/api/editar-chamado </strong> </li>
  <li> Login: <strong> http://localhost/proconsult/api/login </strong> </li>
  <li> Logout: <strong>http://localhost/proconsult/api/deslogar</strong></li>
</ul>
