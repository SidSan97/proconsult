<?php
session_start();

if(isset($json_result)){
	$json_data = json_decode($json_result);
}

if(isset($_SESSION['logado']))
	header('location: index.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>

	<div class="container">
		<h2 class="mt-4" align="center">LOGIN</h2> <br>

		<?php if (isset($json_result) && $json_data !== null): ?>

			<?php if($json_data->status == 404): ?>
				<div class="mt-4 alert alert-danger" role="alert">
					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>

		<?php endif; ?>

		<form action="http://<?= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) ?>/login" method="post">
			<input type="text" name="email" class="form-control" placeholder="email"><br>
			<input type="password" name="senha" class="form-control" placeholder="senha"><br>

			<button type="submit" class="btn btn-primary" name="enviar">enviar</button>
		</form>
	</div>

	<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
