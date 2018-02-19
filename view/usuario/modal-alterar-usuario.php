
<!-- Modal -->

<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header2">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="breadcrumb2 bg-info text-center" id="myModalLabel">Editar da dados do usuário</h4>

			</div>

			<div class="modal-body">
				<form action="../../control/usuario/editar_usuario.php" method="post">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Informe seu Email cadastrado</label> <input
								type="email" class="form-control" name="email" required
								title="Por Favor informe o email do Usuario" placeholder="Email">
							<!--<input type="submit" class="btn btn-primary" value="Enviar">-->
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Enviar">
						<!--<button type="submit" class="btn btn-default" data-dismiss="modal">ENVIAR</button>-->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--modal modal-->
