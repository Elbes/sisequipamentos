<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuário</title>
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
    
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        include_once '../../control/validalogin2.php';
        include_once '../menu.php';
        require '../../Model/UsuarioDAO.php';
        
        $id_usuario = $_REQUEST['id_usuario'];
        
        $dao = new UsuarioDAO();
        
        foreach ($dao->pesqId($id_usuario) as $usuario){
        	$matricula = $usuario['matricula'];
        	$nome_usuario = $usuario['nome_usuario'];
        	$sobrenome_usuario = $usuario['sobrenome_usuario'];
        	
        }
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Excluir Usuário</div>

                <div class="panel-body" align="center">

                    <form action="../../control/usuario/excluir_usuario.php" method="post">
							<input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">
							<br />
							<h3>
								Tem certeza que deseja exluir o usuário:
								<br/>Nome: <b><?php echo $nome_usuario." ".$sobrenome_usuario; ?></b>&nbsp;-&nbsp;
								Matrícula: <b><?php echo $matricula; ?></b><br />
							</h3>
							<h1><b>?</b></h1>
							
	                        <div class="row">
	
	                            <div class="col-lg-12">
	                            	<input type="submit" class=" btn btn-primary" value="SIM">
	                                <input type="button" class="btn btn-primary" value="NÃO" accesskey=""onclick="window.location = 'listaUsuario.php'">    
	                                
	                            </div>            
	                        </div>                    
							
                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
