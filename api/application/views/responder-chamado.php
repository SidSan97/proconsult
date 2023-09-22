<?php 

	$url   = 'http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']).'/listar-chamados';
	$json  = file_get_contents($url);
	$dados = json_decode($json);
	/*$anexo = $this->db->get_where('anexos', array('chamado_id' => 5));

	for($i=0; $i<$anexo->num_rows(); $i++) {
		$arquivo = $anexo->result();
		print_r($arquivo[$i]->nome_anexo);
	}
die;*/
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

		<?php  for($i=0; $i<count($dados->dados); $i++):?>
			<tr>
				<td>
					<?= $dados->dados[$i]->titulo ?>
				</td>

				<td>
					<?= $dados->dados[$i]->descricao ?>
				</td>

				<td>
					<?php 
						if($dados->dados[$i]->status == "aberto")
							echo '<span class="text-success">'.$dados->dados[$i]->status.'</span>';

						else if($dados->dados[$i]->status == "pendente")
							echo '<span class="text-warning">'.$dados->dados[$i]->status.'</span>';

						else
							echo '<span class="text-danger">'.$dados->dados[$i]->status.'</span>';
					?>
				</td>

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
							<form action="" method="post">
								<strong>STATUS: <?= $dados->dados[$i]->status ?></strong>
								<div class="mb-3">
									<label for="titulo" class="form-label">Titulo</label>
									<input type="text" class="form-control" id="titulo" name="titulo" readonly value="<?= $dados->dados[$i]->titulo ?>">
								</div>

								<div class="mb-3">
									<label for="descricao" class="form-label">Descrição</label>
									<textarea type="text" class="form-control" id="descricao" name="descricao" rows="2" readonly>
										<?= $dados->dados[$i]->descricao ?>
									</textarea>
								</div>

								<div class="mb-3">
									<?php
										$anexo   = $this->db->get_where('anexos', array('chamado_id' => $dados->dados[$i]->id));
										$arquivo = $anexo->result();
										$tam     = sizeof($arquivo);
										
										if($tam > 0) {
											echo '<p><img href="'.$arquivo[0]->nome_anexo.'">Ver Anexo</a></p>';
										}
										
											/*$arquivo = $anexo->result();
											print_r($arquivo[0]->nome_anexo);*/
											//for($i=0; $i<5; $i++)
											//	print_r($arquivo[$i]->nome_anexo);
										
									?>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
							</form>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
							<button type="button" class="btn btn-primary">Responder</button>
						</div>
					</div>
				</div>
			</div>
		<?php endfor; ?>

			</tbody>
		</table>

			<!--form action="http://<?= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) ?>/listar-chamados" method="post">
			<label for="tipo_chamado">Selecione o tipo de chamado</label>
			<select name="tipo_chamado" id="tipo_chamado" class="form-control mb-4" required>
				<option value=""></option>
				<option value="aberto">Aberto</option>
				<option value="fechado">Fechado</option>
				<option value="pendente">Em atendimento</option>
			</select>

			<button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
		</form-->
	</div>
	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
