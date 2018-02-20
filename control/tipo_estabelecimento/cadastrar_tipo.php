<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../view/css/bootstrap.css" rel="stylesheet">
        <link href="../../view/css/style.css" rel="stylesheet">
        <script src="../../view/css/dist/sweetalert.min.js"></script>
        <script src="../../view/js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../../view/css/dist/sweetalert.css">
        
        <title>Cadastrar Tipo Estabelecimento</title>
        
    </head>
    <body>
        <?php
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../validalogin2.php';
              $objj = new Session();
              
              require '../../Model/TipoEstabVO.php';
              require '../../Model/TipoEstabDAO.php';
              
              $cont = 0;
              $daoPesq = new TipoEstabDAO();
              foreach ($daoPesq->pesqTipo($_REQUEST['tipo']) as $key1){
			  	$cont++;
			  	
			  }
              	if($cont >=1){
              	  ?>
	                 <script>tipoEstabErro()</script>
	              <?php
              	   exit();
              	}
                    
		              $obj = new TipoEstabVO();
		              
		              $obj->setTipo(utf8_encode($_REQUEST["tipo"]));
		              $obj->setObs(utf8_encode($_REQUEST["obs"]));
		             
		              $dao = new TipoEstabDAO();
		              
		              $dao->inserir($obj);
		              
		              if($dao){
		                  ?>
  		                  <script>swal({title: 'Muito Bem..!', type: 'success', text: 'Tipo de Estabelecimento cadastrado com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
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
