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
              
           
              $obj = new Usuario();
              
              $obj->setMatricula($_REQUEST["matricula"]);
              $obj->setNome_usuario($_REQUEST["nome_usuario"]);
              $obj->setSobrenome_usuario($_REQUEST["sobrenome_usuario"]);
              $obj->setEmail($_REQUEST["email"]);
              $obj->setSenha(md5($_REQUEST["senha"]));
              $obj->setStatus_usuario($_REQUEST["status_usuario"]);
              $obj->setId_perfil($_REQUEST['id_perfil']);
              
              $dao = new UsuarioDAO();
              
              $dao->atualizar($obj, $id_usuario);
              
              if($dao){
                  ?>
                  
                    <script>
                        swal({title: 'Muito Bem..!', type: 'success', text: 'Usuário Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                        window.location.href = '../../view/usuario/listaUsuario.php';
                        });
                        event.preventDefault();
                    </script>
                      
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
