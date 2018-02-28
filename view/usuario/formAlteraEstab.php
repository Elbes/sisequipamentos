<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Estabelecimento do Usuário</title>
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
         <script language="JavaScript" type="text/JavaScript">
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
        include_once '../../Model/EstabelecimentoDAO.php';
        require '../../Model/UsuarioDAO.php';
        
        $id_usuario = $_REQUEST['id_usuario'];
        $dao = new UsuarioDAO();
        $daoEst = new EstabelecimentoDAO();
        $daoReg = new RegiaoDAO();
        
        foreach ($dao->pesqId($id_usuario) as $usuario){
        	$matricula = $usuario['matricula'];
        	$nome_usuario = $usuario['nome_usuario'];
        	$sobrenome_usuario = $usuario['sobrenome_usuario'];
        	$email = $usuario['email'];
        	$id_estabelecimento = $usuario['id_estabelecimento'];
        	
        	foreach ($daoEst->pesquisar($id_estabelecimento) as $est){
        		$id_regiao = $est['id_regiao'];
        		$nome_estab = $est['nome_estabelecimento'];
        	}
        	foreach ($daoReg->pesquisar($id_regiao) as $reg){
        		$nome_reg = $reg['nome_regiao'];
        		$num_reg = $reg['numero_regiao'];
        	}
        	
        }
        
        ?>

            <div class="panel panel-primary">
                <div class="panel-heading">Editar Estabelecimento do Usuário</div>

                <div class="panel-body">
                  Atual Região do servidor:<?php echo "<b> ".utf8_encode($nome_reg)."</b>"; ?> <br />Atual Estabelecimento do servidor:<?php echo "<b> ".utf8_encode($nome_estab)."</b>"; ?><br /><br />
                    <form action="../../control/usuario/editar_estab_usuario.php" method="post">
						<input type="hidden" class="btn btn-primary" name="id_usuario" value="<?php echo $id_usuario;?>">
                        <div class="row">
                           <div class="col-md-4">
                                <div class="form-group">

                                    <label for="Nome do Usuário">Nome</label>
                                    <input type="text" class="form-control" required readonly name="nome_usuario" value="<?php echo utf8_decode($nome_usuario).' '.utf8_decode($sobrenome_usuario);?>" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cargo">Nova Região</label>
                                    <select class="dropdown form-control" name="id_regiao" id="id_regiao" required title="Por Favor informe o cargo do Usuario">
                                        <option selected="selected" value="">--Selecione--</option>
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
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="id_estabelecimento">Novo Estabelecimento</label>
                                    
                                    <div id="estabelecimento"></div>

                                </div>    

                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-10">

                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'formEditarUsuario.php?id_usuario=<?php echo  $id_usuario?>'">    
                                <input type="submit" class=" btn btn-primary" value="ALTERAR">
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        
    </body>
</html>
