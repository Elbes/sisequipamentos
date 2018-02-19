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
        
        <title>Cadastrar Região</title>
        
        
    </head>
    <body>
        <?php
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../validalogin2.php';
              $objj = new Session();
              
              require '../../Model/RegiaoVO.php';
              require '../../Model/RegiaoDAO.php';
                
              $cont = 0;
              $daoPesq = new RegiaoDAO();
              foreach ($daoPesq->pesquisarRegi($_REQUEST["numero_regiao"], $_REQUEST["nome_regiao"], $_REQUEST["sigla_regiao"]) as $key){
              	$cont++;
              }
              if($cont >= 1){
              	?>
              	   <script>regiaoErro()</script>
              	<?php
                  exit();
              }
              
              
              $obj = new Regiao();
              
              $obj->setNumero_regiao($_REQUEST["numero_regiao"]);
              $obj->setNome_regiao(utf8_encode($_REQUEST["nome_regiao"]));
              $obj->setSigla_regiao($_REQUEST["sigla_regiao"]);
              $obj->setDescricao(utf8_encode($_REQUEST["descricao_regiao"]));
              
              $dao = new RegiaoDAO();
              
              $dao->inserir($obj);
              
              if($dao){
                  ?>
                  
                    <script>
                      swal({title: 'Muito Bem..!', type: 'success', text: 'Regiao Cadastrada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                        window.location.href = '../../view/regiao/listaRegiao.php';
                      });
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
