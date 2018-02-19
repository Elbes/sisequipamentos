<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../view/css/bootstrap.css" rel="stylesheet">
        <link href="../../view/css/style.css" rel="stylesheet">
        <script src="../../view/css/dist/sweetalert.min.js"></script>
        <script src="../../view/js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../../view/css/dist/sweetalert.css">
        
        <title>Editar Tipo Estabelecimento</title>
        
    </head>
    <body>
        <?php
              error_reporting(1);
              include_once '../../Model/session.php';
              
              require '../../Model/TipoEstabVO.php';
              require '../../Model/TipoEstabDAO.php';
                                               
		              $obj = new TipoEstabVO();
		              
		              $obj->setTipo(utf8_decode($_REQUEST["tipo"]));
		              $obj->setObs(utf8_decode($_REQUEST["obs"]));
		             
		              $dao = new TipoEstabDAO();
		              
		              $dao->update($obj, $_REQUEST['tipo_estabelecimento']);
		              
		              if($dao){
		                  ?>
		                    <script>swal({title: 'Muito Bem..!', type: 'success', text: 'Tipo de Estabelecimento editado com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                            window.location.href = '../../view/tipo_estabelecimento/listaTipoEstabelecimento.php';
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
