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
			include '../menu.php';
								
	   ?>

        <div class="container">

		<div class="panel panel-primary">

			<div class="panel-heading">Cadastrar Tipo de Estabelecimento</div>
			<div class="panel-body">

				<form action="../../control/tipo_estabelecimento/cadastrar_tipo.php"
					method="post">

					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo_estabelecimento">Tipo</label> <input
									type="text" class="form-control" name="tipo"
									placeholder="Tipo de Estabelecimento">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="obs">Obs</label>
								<textarea rows="6" class="form-control" name="obs"
									placeholder="Observação"></textarea>
							</div>

						</div>

					</div>
					<hr>
					<div class="row">

						<div class="col-md-6">
							<input type="submit" class=" btn btn-primary" value="CADASTRAR">
							<input type="button" class="btn btn-primary" value="CANCELAR"
								accesskey=""
								onclick="window.location = 'listaTipoEstabelecimento.php'">
						</div>

					</div>

				</form>

			</div>
		</div>
				<?php $rodape = new Session(); $rodape->footer();?>
            </div>

</body>

</html>
