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
              
              require '../../Model/EstabelecimentoVO.php';
              require '../../Model/EstabelecimentoDAO.php';
              
             
              
              $obj = new EstabelecimentoVO();
              
              $obj->setNome_estabelecimento(utf8_encode($_REQUEST["nome_estabelecimento"]));
              $obj->setCidade_estabelecimento(utf8_encode($_REQUEST["cidade_estabelecimento"]));
              $obj->setNumero_estabelecimento($_REQUEST["numero_estabelecimento"]);
              $obj->setId_tipo_estabelecimento($_REQUEST["id_tipo_estabelecimento"]);
              $obj->setId_regiao($_REQUEST["id_regiao"]);

              $dao = new EstabelecimentoDAO();
              
              $dao->update($obj, $_REQUEST['id_estabelecimento']);
              
              if($dao){
                  ?>
                  
                    <script>swal({title: 'Muito Bem..!', type: 'success', text: 'Estabelecimento Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                        window.location.href = '../../view/estabelecimento/listaEstabelecimento.php';
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
