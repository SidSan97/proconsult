<?php
if(isset($json_result)){
	$json_data = json_decode($json_result);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>cadastro</title>
</head>
<body>

	<div class="container">

	<?php if (isset($json_result) && $json_data !== null): ?>

		<?php if($json_data->status == 200): ?>
			<div class="mt-4 alert alert-success" role="alert">
				<span class="text-dark"><?= $json_data->message ?></span>
			</div>
		<?php endif; ?>

		<?php if($json_data->status == 406): ?>
			<div class="mt-4 alert alert-warning" role="alert">
				<span class="text-dark"><?= $json_data->message ?></span>
			</div>
		<?php endif; ?>

		<?php if($json_data->status == 407): ?>
			<div class="mt-4 alert alert-warning" role="alert">
				<span class="text-dark"><?= $json_data->message ?></span>
			</div>
		<?php endif; ?>

		<?php if($json_data->status == 408): ?>
			<div class="mt-4 alert alert-warning" role="alert">
				<span class="text-dark"><?= $json_data->message ?></span>
			</div>
		<?php endif; ?>

		<?php if($json_data->status == 500): ?>
			<div class="mt-4 alert alert-danger" role="alert">
				<span class="text-dark"><?= $json_data->message ?></span>
			</div>
		<?php endif; ?>
			
	<?php endif; ?>


		<br> <h2 align="center">Cadastro de Usuário</h2> <br>

		<form action="http://<?= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) ?>/cadastrar" method="post">
			<label for="">Digite seu nome</label>
			<input type="text" name="nome" class="form-control" required placeholder="Digite seu nome"><br>
			<label for="">Digite seu email</label>
			<input type="email" name="email" class="form-control" required placeholder="digite seu email"><br>
			<label for="">Digite seu CPF</label>
			<input type="text" name="cpf" class="form-control" required placeholder="digite seu cpf"><br>
			<label for="">Digite sua senha</label>
			<input type="password" name="senha" class="form-control" required placeholder="senha"><br>
			<label for="">Confirme sua senha</label>
			<input type="password" name="senha2" class="form-control" required placeholder="senha"><br>
			<label for="">Escolha o nivel do usuario</label>
			<select name="nivel" id="" class="form-control" required>
				<option value=""></option>
				<option value="Cliente">Cliente</option>
				<option value="Colaborador">Colaborador</option>
			</select>

			<br>
			<button type="submit" class="btn btn-primary" name="enviar">enviar</button>
    	</form>

		<br>
		<button type="submit" class="btn btn-warning" name="enviar"><a href="home">Voltar</a></button>
	</div>
   
	<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
