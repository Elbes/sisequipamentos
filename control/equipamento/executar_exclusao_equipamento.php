		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
        <link href="../../view/css/bootstrap.css" rel="stylesheet">
        <link href="../../view/css/style.css" rel="stylesheet">
        <script src="../../view/css/dist/sweetalert.min.js"></script>
        <script src="../../view/js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../../view/css/dist/sweetalert.css">
        
<?php
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../../resources/funcoes.php';
              include_once '../validalogin2.php';
              $objj = new Session();
              
              require '../../Model/EstabelecimentoVO.php';
              require '../../Model/EstabelecimentoDAO.php';
              require '../../Model/EquipamentoVO.php';
              require '../../Model/EquipamentoDAO.php';
              require '../../Model/ManutencaoDAO.php';

              $dao = new EquipamentoDAO();
              $daoManut = new ManutencaoDAO();
              
              $dao->deleteEquip($_REQUEST['id_equipamento']);
              $daoManut->deleteManutEquip($_REQUEST['id_equipamento']);
              if($dao && $daoManut){
                  ?>
                  
                    <script>exclusaoEquipa()</script>
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($dao);
              }
        ?>