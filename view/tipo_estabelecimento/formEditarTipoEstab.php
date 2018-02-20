<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
        <?php include '../constant.php';?>
        <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script src="../css/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
<!--<script src="js/jquery.js" type="text/javascript"></script>-->
<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery.maskedinput.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>

<body>

        <?php
								include '../../Model/session.php';
								include '../../Model/RegiaoDAO.php';
								include '../../Model/TipoEstabDAO.php';
								include_once '../../control/validalogin2.php';
								include '../menu.php';
								
								$daoEstab = new TipoEstabDAO ();
								foreach ( $daoEstab->pesquisar ( $_REQUEST ['id_tipo_estabelecimento'] ) as $key ) {
									$id_tipo_estabelecimento = $key ['id_tipo_estabelecimento'];
									$tipo = utf8_decode ( $key ['tipo'] );
									$obs = utf8_decode ( $key ['obs_tipo'] );
								}
								
								?>

        <div class="container">

		<div class="panel panel-primary">

			<div class="panel-heading">Editar Tipo de Estabelecimento</div>
			<div class="panel-body">

				<form action="../../control/tipo_estabelecimento/editar_tipo.php"
					method="post">
					<input type="hidden" name="tipo_estabelecimento"
						value="<?php echo $id_tipo_estabelecimento;?>">
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo_estabelecimento">Tipo</label> <input
									type="text" class="form-control" value="<?php echo $tipo;?>"
									name="tipo" placeholder="Tipo de Estabelecimento">
							</div>

						</div>

					</div>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="obs">Obs</label>
								<textarea rows="6" class="form-control" name="obs"
									placeholder="Observação"><?php echo $obs;?></textarea>
							</div>
						</div>

					</div>

					<hr>
					<div class="row">

						<div class="col-md-6">
							<input type="button" class="btn btn-primary" value="CANCELAR"
								accesskey=""
								onclick="window.location = 'listaTipoEstabelecimento.php'"> <input
								type="submit" class=" btn btn-primary" value="ALTERAR">
						</div>
					</div>

				</form>

			</div>
		</div>
				<?php $rodape = new Session(); $rodape->footer();?>
	</div>

</body>

</html>
