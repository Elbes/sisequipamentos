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
        
        <title>Cadastrar Estabelecimento</title>
        
        
    </head>
    <body>
        <?php
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../validalogin2.php';
              $objj = new Session();
              
              require '../../Model/EstabelecimentoVO.php';
              require '../../Model/EstabelecimentoDAO.php';
              
              $cont = 0;
              $daoPesqEst = new EstabelecimentoDAO();
              foreach ($daoPesqEst->pesquisarIdRegiao($_REQUEST['id_regiao']) as $key1){
			  	$cont++;
			  	
			  }
              	if($cont >=1){
              		$cont2 = 0;
              		$daoPesqEst2 = new EstabelecimentoDAO();
              		foreach ($daoPesqEst2->pesquisarEstab($_REQUEST["nome_estabelecimento"], $_REQUEST["numero_estabelecimento"]) as $key){
              			 $cont2++;
              		}
              		if($cont2 >= 1){
              			?>
	                    	<script>estabErro()</script>
	                   <?php
              			exit();
              		}
              	}
              
              
              
              
              $estab = new EstabelecimentoVO();
              
              
              $estab->setNome_estabelecimento(utf8_encode($_REQUEST["nome_estabelecimento"]));
              $estab->setNumero_estabelecimento($_REQUEST["numero_estabelecimento"]);
              $estab->setCidade_estabelecimento(utf8_encode($_REQUEST["cidade_estabelecimento"]));
              $estab->setId_tipo_estabelecimento($_REQUEST["id_tipo_estabelecimento"]);
              $estab->setId_regiao($_REQUEST["id_regiao"]);
              //print_r($estab);exit();
              $daoEstab = new EstabelecimentoDAO();
              
              $daoEstab->inserir($estab);
              
              if($daoEstab){
                  ?>
                  
                    <script>
                      swal({title: 'Muito Bem..!', type: 'success', text: 'Estabelecimento Cadastrado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                        window.location.href = '../../view/estabelecimento/listaEstabelecimento.php';
                      });
                    </script>
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($daoEstab);
              }
        ?>
                
        <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
                
    </body>
</html>
