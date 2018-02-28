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
         <script type="text/JavaScript">
			<!--
			function abrejan(theURL,winName,features) { //v2.0
			 window.open(theURL,winName,features);
			}
			//-->
		</script> 
        <script type="text/javascript">
		    $(document).ready(function(){
		        $('#id_regiao').change(function(){
		            $('#estabelecimento').load('usuarioEdit.php?id_regiao='+$('#id_regiao').val());
		        });
		    });
    	</script>
    
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        include_once '../../control/validalogin2.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/PerfilDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../menu.php';
        include_once '../../resources/funcoes.php';
        require '../../Model/UsuarioDAO.php';
        
        
        
        $id_usuario = $_REQUEST['id_usuario'];
        $dao = new UsuarioDAO();
        $daoEst = new EstabelecimentoDAO();
        $daoReg = new RegiaoDAO();
        
        foreach ($dao->pesqId($id_usuario) as $usuario){
        	$matricula = $usuario['matricula'];
        	$nome_usuario = utf8_decode($usuario['nome_usuario']);
        	$sobrenome_usuario = utf8_decode($usuario['sobrenome_usuario']);
        	$id_perfil = $usuario['id_perfil'];
        	$email = $usuario['email'];
        	$id_estabelecimento = utf8_encode($usuario['id_estabelecimento']);
        	$status = $usuario['status_usuario'];
        	$data_cadastro = dataBancoParaForm($usuario['data_cadastro']); 
        	
        	foreach ($daoEst->pesquisar($id_estabelecimento) as $est){
        		$id_regiao = $est['id_regiao'];
        		$nome_estab = utf8_decode($est['nome_estabelecimento']);
        	}
        	foreach ($daoReg->pesquisar($id_regiao) as $reg){
        		$nome_reg = utf8_decode($reg['nome_regiao']);
        		$num_reg = $reg['numero_regiao'];
        	}
        	
        	$perfilDados = new PerfilDAO();
        	foreach ($perfilDados->pesquisar($id_perfil) as $dados_perfil){
        		$nome_perfil = $dados_perfil['nome_perfil'];
        		$tipo_perfil = $dados_perfil['tipo_perfil'];
        	}
        	
        }
       // $altEst = "'formAlteraEstab.php?id_usuario=".$id_usuario."', 'Envio', 'width=550,height=550,left=165,top=80'";
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Editar Usuário</div>

                <div class="panel-body">

                    <form action="../../control/usuario/editar_usuario.php" method="post">
					<input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">
                        <div class="row">
                          <div class="col-md-3">
                                <div class="form-group">
                                    <label for="matricula">Matrícula</label>
                                    <input type="text" class="form-control" name="matricula" value="<?php echo $matricula;?>" required title="Por Favor informe a Matrícula do Usuario" placeholder="Informe a Matrícula">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Nome do Gerente">Nome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o nome do Usuario" name="nome_usuario" value="<?php echo $nome_usuario;?>" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o sobrenome do Usuario" name="sobrenome_usuario" value="<?php echo $sobrenome_usuario;?>" placeholder="Sobrenome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Perfil</label>

                                    <select class="dropdown form-control" name="id_perfil" required title="Por Favor informe o perfil do Usuário">
                                        <option selected="selected" value="<?php echo $id_perfil;?>"><?php echo $tipo_perfil. " - ".$nome_perfil;?></option>
                                        <?php $perfil = new PerfilDAO();
                                        
                                        foreach ($perfil->listar() as $perf){
                                        	echo "<option value=".$perf['id_perfil'].">". $perf['tipo_perfil'] ." - ". $perf['nome_perfil']."</option>";
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
                                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required title="Por Favor informe o email do Usuario" placeholder="Email">
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cargo">Região</label>
                                    <input type="text" class="form-control" value="<?php echo $nome_reg;?>" readonly name="nome_regiao" id="nome_regiao">
                                </div>    

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome_estab">Estabelecimento</label>
                                    <input type="text" class="form-control" value="<?php echo $nome_estab;?>" readonly name="nome_regiao" id="nome_regiao">
                                </div>    

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
	                                <!-- <input type="button" class="btn btn-primary" value="Alterar Estabelecimento" accesskey="" onclick="window.location = 'formAlteraEstab.php?id_usuario=<?php echo  $id_usuario?>'" title="Alterar o Estabelecimento"> -->
                               <a data-toggle="modal"  class="btn btn-primary" href="formAlteraEstab.php?id_usuario=<?php echo  $id_usuario?>" data-target="#myModal" title="Alterar o Estabelecimento"><i class="icon-zoom-in"></i> Alterar o Estabelecimento</a>
                                </div>    
                            </div>
                     </div>
                        
                     <div class="row">
                     	<div class="col-md-3">
                              <div class="form-group">
                                  <label for="status_usuario">Status</label>
                                   <select class="dropdown form-control" name="status_usuario" required title="Por Favor informe o Status do Usuário">
                                        <option selected="selected" value="<?php echo $status;?>"><?php echo $status;?></option>
                                        <option value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                   </select>
                               </div>    
                         </div>
                         
                         <div class="col-md-3">
                            <div class="form-group">
	                            <label for="data_cadastro">Data Cadastro</label>
	                            
	                            <input type="text" class="form-control" value="<?php echo $data_cadastro;?>" readonly>
	
	                       	    </div>
                             </div>
                             
                             
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-12">
                                <input type="submit" class=" btn btn-primary" value="ALTERAR">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'listaUsuario.php'">    
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
        <!-- Janela Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-body">
                
                
                <div class="te"></div></div>
    
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    </body>
</html>
