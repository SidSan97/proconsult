<?php 
	session_start();

	if($_SESSION['logado'] == false or $_SESSION['nivel'] != "Colaborador") {

		header('location: index.php?q=nao_autorizado');
	}

	$url   = 'http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']).'/listar-chamados';
	$json  = file_get_contents($url);
	$dados = json_decode($json);
	
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

    <title>Resposta Chamado</title>
</head>
<body>

	<div class="container">
		<h2 align="center">Listar chamados</h2> <br>

		<?php if (isset($json_result) && $json_data !== null): ?>
			<?php if($json_data->status == 200): ?>
				<div class="mt-4 alert alert-success" role="alert">
					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>

			<?php if($json_data->status == 405): ?>
				<div class="mt-4 alert alert-danger" role="alert">
					<span class="text-dark"><?= $json_data->message ?></span>
				</div>
			<?php endif; ?>
		<?php endif ?>

		<button type="button" class="btn btn-secondary"><a href="home" class="text-light">Voltar</a></button>

		<br>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Titulo</th>
					<th scope="col">Descrição</th>
					<th scope="col">Status</th>
					<th scope="col">Opções</th>
				</tr>
			</thead>

			<tbody> 

		<?php  
			if($dados->status != 404):
				for($i=0; $i<count($dados->dados); $i++):
		?>
			<tr>
				<td>
					<?= $dados->dados[$i]->titulo ?>
				</td>

				<td>
					<?= $dados->dados[$i]->descricao ?>
				</td>

				<td>
					<?php 
						if($dados->dados[$i]->status == "Aberto")
							echo '<span class="text-success">'.$dados->dados[$i]->status.'</span>';

						else if($dados->dados[$i]->status == "Em andamento")
							echo '<span class="text-warning">'.$dados->dados[$i]->status.'</span>';

						else
							echo '<span class="text-danger">'.$dados->dados[$i]->status.'</span>';
					?>
				</td>

				<!--td>
					<?php 
						echo $dados->anexo[$i]->nome_anexo .'<br>';
					?>
				</td-->

				<td>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $dados->dados[$i]->id ?>">
						Ver chamado
					</button>
				</td>
			</tr>

			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop<?= $dados->dados[$i]->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Detalhes do chamado</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">
							<form action="http://<?= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) ?>/editar-chamado" method="post">
								<strong>STATUS: <?= $dados->dados[$i]->status ?></strong>
								<div class="mb-3">
									<label for="titulo" class="form-label">Titulo</label>
									<input type="text" class="form-control" id="titulo" name="titulo" readonly value="<?= $dados->dados[$i]->titulo ?>">
								</div>

								<input type="hidden" name="valor" value="<?= $dados->dados[$i]->id ?>">

								<div class="mb-3">
									<label for="descricao" class="form-label">Descrição</label>
									<textarea type="text" class="form-control" id="descricao" name="descricao" rows="2" readonly>
										<?= $dados->dados[$i]->descricao ?>
									</textarea>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label">Resposta para o chamado</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="resposta" required <?php if($dados->dados[$i]->status == "Finalizado"):?> readonly <?php endif?>>
										<?=	$dados->dados[$i]->resposta ?>
									</textarea>
								</div>

								<div class="mb-3">
									<span>Anexos:</span>
									<?php 
										$anexos = $this->db->get_where('anexos', array('chamado_id' => $dados->dados[$i]->id));
										if($anexos->num_rows() > 0)
										{
											$dado = $anexos->result();
											
											foreach($dado as $valor)
											{
												if($dado[0]->nome_anexo !== "") {
													$dir =  $_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']);
													$dir = str_replace("api", "uploads/", $dir);
													echo ' <p><a href="http://'.$dir.$dado[0]->nome_anexo.'">Ver anexo</a></p>';
												}
											}
											
										}										
									?>
								</div>

								<?php if($dados->dados[$i]->status != "Finalizado"):?>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="finalizado" name="finalizado" id="defaultCheck1">

										<strong>
											<label class="form-check-label text-danger" for="defaultCheck1">
												Finalizar chamado
											</label>
										</strong>
									</div>
								<?php endif ?>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

									<?php if($dados->dados[$i]->status != "Finalizado"):?>
										<button type="submit" class="btn btn-primary" name="enviar">Responder</button>
									<?php endif ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php 
			endfor; 
		endif;
		?>

			</tbody>
		</table>

	</div>
	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
