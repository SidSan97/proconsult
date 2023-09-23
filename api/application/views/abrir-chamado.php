<?php
session_start();

if($_SESSION['logado'] == false or $_SESSION['nivel'] != "Cliente") {

	header('location: index.php?q=nao_autorizado');
}

if(isset($json_result))
	$json_data = json_decode($json_result);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Abrir Chamado</title>
</head>
<body>
    <div class="container">

		<?php if (isset($json_result) && $json_data !== null): ?>

			<?php if($json_data->status == 405): ?>
				<div class="mt-4 alert alert-warning" role="alert">
  					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>

			<?php if($json_data->status == 200): ?>
				<div class="mt-4 alert alert-success" role="alert">
  					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>

			<?php if($json_data->status == 500): ?>
				<div class="mt-4 alert alert-danger" role="alert">
  					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>
				
		<?php endif; ?>

        <h2 align="center">Abertura de chamado</h2> <br>

        <form action="http://<?= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) ?>/enviar-chamado" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Titulo do chamado</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Insira um nome para o chamado" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="file">Escolher arquivos</label> <br>
                <input type="file" class="form-control-file" name="file[]" multiple id="file">
            </div>

            <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
        </form>

		<br>
		<button type="submit" class="btn btn-warning"><a href="home" class="text-dark">Voltar</a></button>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
