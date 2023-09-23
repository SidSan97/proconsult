<?php 
	session_start();

	if(isset($json_result)){
		$json_data = json_decode($json_result);

		if($json_data->status == 200) {
			$_SESSION['logado'] = true;
			$_SESSION['nome']   = $json_data->nome;
			$_SESSION['nivel']  = $json_data->nivel;
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inicio</title>

    <style>
        .oi {
            color: red;
        }
    </style>
</head>
<body>
	
	<?php 	
		if(isset($_GET['q']))
		{
			if($_GET['q'] == "nao_autorizado")
				echo '<script>alert("Você não tem permissão para acessar esta página")</script>';
		}
	?>

    <div class="container">
        <h2>Escolha uma opção:</h2> <br>

		<?php if (isset($json_result) && $json_data !== null): ?>
			<?php if($json_data->status == 200): ?>
				<div class="mt-4 alert alert-success" role="alert">
					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>

			<?php if($json_data->status == 201): ?>
				<div class="mt-4 alert alert-info" role="alert">
					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<?php if(!isset($_SESSION['logado'])):?>

			<p>Você deve estar logado para usar o sistema</p>

			<p><a href="login-view">Faça login</a></p> ou 
			<p><a href="cadastro-view">Cadastre-se</a></p>

		<?php else: ?>

			<p>Olá <?= $_SESSION['nome'] ?></p>  
			<p>Nivel: <strong><?= $_SESSION['nivel'] ?></strong></p>
			<p><a href="deslogar"> Fazer Logout </a></p>
		
		<?php endif ?>

		<br><br><br>

        <ul>
            <li><a href="abrir-chamado">Abrir chamado</a></li>
            <li><a href="responder-chamado">Responder chamado</a></li>
        </ul>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
