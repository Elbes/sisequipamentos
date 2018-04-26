<!DOCTYPE html>
<html>
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
         <link href="../imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" /> 
        <script type="text/javascript">
		    $(document).ready(function(){
		        $('#id_regiao').change(function(){
		            $('#estabelecimento').load('usuario.php?id_regiao='+$('#id_regiao').val());
		        });
		    });
    	</script>
    
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        //include_once '../../control/validalogin2.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/PerfilDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../menu.php';
       
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Cadastrar Usuário</div>

                <div class="panel-body">

                    <form action="../../control/usuario/cadastrar_usuario.php" method="post">

                        <div class="row">
                          <div class="col-md-3">
                                <div class="form-group">
                                    <label for="matricula">Matrícula</label>
                                    <input type="text" class="form-control" name="matricula" required title="Por Favor informe a Matrícula do Usuario" placeholder="Informe a Matrícula">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Nome do Gerente">Nome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o nome do Usuario" name="nome_usuario" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o sobrenome do Usuario" name="sobrenome_usuario" placeholder="Sobrenome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_perfil">Perfil</label>

                                    <select class="dropdown form-control" name="id_perfil" required title="Por Favor informe o perfil do Usuário">
                                        <option>Selecione...</option>
                                        <?php $perfil = new PerfilDAO();
                                        
                                        foreach ($perfil->listar() as $perf){
                                        	echo "<option value=".$perf['id_perfil'].">". $perf['tipo_perfil'] ." - ". utf8_encode($perf['nome_perfil'])."</option>";
												}
		              						 ?>
                                    </select>

                                </div>    

                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required title="Por Favor informe o email do Usuario" placeholder="Email">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="senha_usuario">Senha</label>
                                    <input type="password" class="form-control" name="senha" required title="Por Favor informe a senha do Usuario" placeholder="Senha">
                                </div>    

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cargo">Região</label>
                                    <select class="dropdown form-control" name="id_regiao" id="id_regiao" required title="Por Favor informe o cargo do Usuario">
                                        <option value="selecione">Selecione...</option>
                                            <?php 
											$regiaoDao = new RegiaoDAO();
												foreach ($regiaoDao->listar() as $regiao){
													echo "<option value=".$regiao['id_regiao'].">". $regiao['numero_regiao'] ."-". utf8_decode($regiao['nome_regiao'])."</option>";
												}
		              						 ?>
                                        </select>
                                </div>    

                            </div>

                            <input type="hidden" name="status_usuario" value="Ativo" />
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_estabelecimento">Estabelecimento</label>
                                    
                                    <div id="estabelecimento"></div>

                                </div>    

                            </div>
                                                        
                     </div>
                        
                        
                     <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
	                            <label for="data_cadastro">Data Cadastro</label>
	                            
	                            <?php $data = date('Y-m-d'); ?>
	                            
	                            <input type="text" class="form-control text-center" value="<?php echo date('d/m/Y');?>" readonly>
	
	                            <input type="hidden" name="data_cadastro" value="<?php echo $data; ?>"/>
	
	                       	    </div>
                             </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-12">
								<input type="submit" class=" btn btn-primary" value="CADASTRAR">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listaUsuario.php'">    
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
