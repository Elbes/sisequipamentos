<!DOCTYPE html>
<html>
    <head>
        <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../view/css/bootstrap.css" rel="stylesheet">
        <link href="../../view/css/style.css" rel="stylesheet">
        <script src="../../view/css/dist/sweetalert.min.js"></script>
        <script src="../../view/js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../../view/css/dist/sweetalert.css">
        
        <title>Cadastrar Usuário</title>
        
    </head>
    <body>
        <?php
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../validalogin2.php';
              require '../../Model/UsuarioVO.php';
              require '../../Model/UsuarioDAO.php';
              
              $cont = 0;
              $daoPesq = new UsuarioDAO();
              foreach ($daoPesq->verificaExistente($_REQUEST['matricula']) as $key1){
			  	$cont++;
			  	
			  }
              	
              		if($cont >= 1){
              			?>
	                    	<script>verificaMatricula()</script>
	                   <?php
              			exit();
              		}
              
              $obj = new Usuario();
              
              $obj->setMatricula($_REQUEST["matricula"]);
              $obj->setNome_usuario(utf8_decode($_REQUEST["nome_usuario"]));
              $obj->setSobrenome_usuario(utf8_decode($_REQUEST["sobrenome_usuario"]));
              $obj->setEmail($_REQUEST["email"]);
              $obj->setSenha(md5($_REQUEST["senha"]));
              $obj->setStatus_usuario($_REQUEST["status_usuario"]);
              $obj->setId_perfil($_REQUEST['id_perfil']);
              $obj->setData_cadastro($_REQUEST["data_cadastro"]);
              $obj->setId_estabelecimento($_REQUEST["id_estabelecimento"]);
              
              $dao = new UsuarioDAO();
              
              $dao->inserir($obj);
              
              if($dao){
                  ?>
                  
                    <script>cadastroUsuario()</script>
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($dao);
              }
        ?>
                
        <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
                
    </body>
</html>
