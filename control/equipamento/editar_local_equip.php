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
              //include_once '../validalogin2.php';
              require '../../Model/EquipamentoVO.php';
              require '../../Model/EquipamentoDAO.php';
              
              $id_equipamento = $_REQUEST['id_equipamento'];
              $obj = new EquipamentoVO();
              
              $obj->setIdEstabelecimento($_REQUEST["id_estabelecimento"]);
              
              $dao = new EquipamentoDAO();
              
              $dao->updateEstab($obj, $id_equipamento);
              
              if($dao){
                header('Location: ../../view/equipamento/formEditarEquipamento.php?id_equipamento='.$id_equipamento);
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
