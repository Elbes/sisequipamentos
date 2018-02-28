<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Cadastrar Estabelecimento</title>
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script src="../css/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>

<body>

    <?php
		include_once '../../Model/session.php';
		include_once '../../Model/RegiaoDAO.php';
		include_once '../../Model/TipoEstabDAO.php';
		include_once '../menu.php';
								
	?>


<div class="container">
		<div class="row-fluid">
			<div class="panel panel-primary">
				<div class="panel-heading">Cadastrar Estabelecimento</div>

				<div class="panel-body">
					<form action="../../control/estabelecimento/cadastrar_estab.php"
						method="post">
						<div class="row">

							<div class="col-md-4">
								<div class="form-group">
									<label for="cidade">Cidade</label> <input type="text"
										class="form-control" name="cidade_estabelecimento"
										placeholder="Insira a cidade do estabelecimento" value=''>
								</div>
							</div>


							<div class="col-md-2">
								<div class="form-group">
									<label for="estado">NÚMERO</label> <input type="text"
										class="form-control text-center" name="numero_estabelecimento"
										placeholder="Número" value=''>
								</div>
							</div>

						</div>



						<div class="row">
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="nome_cliente">Nome do Estabelecimento</label> <input
										type="text" class="form-control" name="nome_estabelecimento"
										required title="Por Favor informe o nome do estabelecimento"
										placeholder="Insira o nome do estabelecimento">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="gerente">Tipo de Estabelecimento</label>
									 <select class="dropdown form-control" name="id_tipo_estabelecimento" required>
										<option value="selecione">Selecione...</option>
                                             <?php
												$tipoEstab = new TipoEstabDAO ();
												foreach ( $tipoEstab->listar () as $estab ) {
													echo "<option value=" . $estab ['id_tipo_estabelecimento'] . ">" . utf8_encode($estab ['tipo']) . "</option>";
												}
											?>
                                        </select>
								</div>
							</div>

						</div>

						<div class="row">
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="gerente">Região</label>
									 <select class="dropdown form-control" name="id_regiao" required>
										<option value="selecione">Selecione...</option>
                                            <?php
												$regiaoDao = new RegiaoDAO ();
												foreach ( $regiaoDao->listar () as $regiao ) {
													echo "<option value=" . $regiao ['id_regiao'] . ">" . $regiao ['numero_regiao'] . "-" . utf8_decode($regiao ['nome_regiao']) . "</option>";
												}
											?>
                                        </select>
								</div>
							</div>

						</div>

						<hr>
						<div class="row">

							<div class="col-md-6">
							<input type="submit" class=" btn btn-primary" value="CADASTRAR">
							<input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'listaEstabelecimento.php'"> 
							</div>
						</div>

					</form>

				</div>
			</div>
				<?php $rodape = new Session(); $rodape->footer();?>
</div>
	</div>

</body>

</html>
