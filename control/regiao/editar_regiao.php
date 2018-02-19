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
         <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
        <title>Editar Usuário</title>
        
    </head>
    <body>
        <?php
        	  $id_regiao= $_REQUEST['id_regiao'];
              error_reporting(1);
              include_once '../../Model/session.php';
              require '../../Model/RegiaoVO.php';
              require '../../Model/RegiaoDAO.php';
              
           
              $obj = new Regiao();
              
              $obj->setNumero_regiao($_REQUEST["numero_regiao"]);
              $obj->setNome_regiao(utf8_encode($_REQUEST["nome_regiao"]));
              $obj->setSigla_regiao(utf8_encode($_REQUEST["sigla_regiao"]));
              $obj->setDescricao(utf8_encode($_REQUEST["descricao_regiao"]));
              
              
              $dao = new RegiaoDAO();
              
              $dao->atualizar($obj, $id_regiao);
              
              if($dao){
                  ?>
                  <script type="text/javascript">
                    swal({title: 'Muito Bem..!', type: 'success', text: 'Região editada com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                    	window.location.href = '../../view/regiao/listaRegiao.php';
                    });
                    
                    </script>
                  
                    <!-- <script type="text/javascript">editarRegiao()</script> -->
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($dao);
              }
        ?>
                
       
                
    </body>
</html>
