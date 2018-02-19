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
        
        <title>Editar Usuário</title>
        
    </head>
    <body>
        <?php
        	$id_usuario = $_REQUEST['id_usuario'];
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../validalogin2.php';
              require '../../Model/UsuarioVO.php';
              require '../../Model/UsuarioDAO.php';
              
           
              $dao = new UsuarioDAO();
              
              $dao->excluirUs($id_usuario);
              
              if($dao){
                  ?>
                  
                    <script>exclusaoUsuario()</script>
                      
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
