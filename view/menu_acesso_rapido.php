<?php
$usuario = $_SESSION['nome_usuario'];
$tipo_perfil = $_SESSION['tipo_perfil'];
?>
<br>


<!--</div>-->

<div class="row">
	<!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
	<div class="col-xs-6 col-md-3 col-md-offset-3">

		<a href="relatorio.php"><div class="thumbnail">
				<!--<p><span class="badge pull-right">23</span></p>-->
				<img src="imagens/listar.png" class="img-responsive"
					alt="Relatório">
				<div class="caption">
					<h4 class="textobranco">Relatório</h4>
				</div>
			</div></a>
		<!--</div>-->
	</div>

	<!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
	<div class="col-xs-6 col-md-3">

		<!--<div class="panel panel-primary">-->
		<!--<div class="panel-heading">Adicionar Usuário</div>-->
		<a href="equipamento/formEquipamento.php"><div class="thumbnail">
				<!--<p><span class="badge pull-right">23</span></p>-->
				<img src="imagens/editar.png" class="img-responsive "
					alt="Cadastro de Equipamento">
				<div class="caption">
					<h4 class="textobranco">Cadastrar Equipamentos</h4>
				</div>
			</div></a>

		<!--</div>-->
	</div>

</div>

<div class="row">

	<!--<div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
	<div class="col-xs-6 col-md-3 col-md-offset-3">
	
		<a href="manutencao/listaManutencao.php"><div class="thumbnail">
				<!--<p><span class="badge pull-right"></span></p>-->
				<img src="imagens/manutencao.png" class="img-responsive"
					alt="Manutenções">
				<div class="caption">
					<h4 class="textobranco">Manutenção</h4>
				</div>
			</div></a>
	</div>
	<?php if ($tipo_perfil == 'ADMG'){?>
	<div class="col-xs-6 col-md-3">

		<a href="usuario/listaUsuario.php"><div class="thumbnail">
				<!--<p><span class="badge pull-right"></span></p>-->
				<img src="imagens/usuario.png" class="img-responsive"
					alt="Usuários">
				<div class="caption">
					<h4 class="textobranco">Usuários</h4>
				</div>
			</div></a>
	</div>

<?php }?>

</div>

