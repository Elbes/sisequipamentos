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
        
        <?php include '../../view/constant.php';?>
        
        
    </head>
    <body>
        <?php
           //date_default_timezone_set('America/Sao_Paulo');
              //error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../../resources/funcoes.php';
              //include_once '../validalogin2.php';
              //$objj = new Session();
              
              require '../../Model/ManutencaoVO.php';
              require '../../Model/ManutencaoDAO.php';
              
              $obj = new ManutencaoVO();
             
              $obj->setServicoSolicitado($_REQUEST['servico_solicitado']);
              $obj->setNumeroChamado($_REQUEST['numero_chamado']);
              $obj->setLocalFalha($_REQUEST['local_falha']);
              $obj->setAcessorios($_REQUEST['acessorios']);
              $obj->setLocalManutencao($_REQUEST['local_manutencao']);
              $obj->setDataEnvio($_REQUEST['data_envio']);
              $obj->setTelefoneManutencao($_REQUEST['telefone_manutencao']);
              $obj->setContratoManutencao($_REQUEST['contrato_manutencao']);
              $obj->setNumContratoManutencao($_REQUEST['num_contrato_manutencao']);
              $obj->setGrauNecessidade($_REQUEST['grau_necessidade']);
              $obj->setOrigemFalha($_REQUEST['origem_falha']);
              $obj->setOrigemFalhaOutro($_REQUEST['origem_falha_outro']);
              $obj->setObservacaoManutencao($_REQUEST['observacao_manutencao']);
              $obj->setPrevisaoEntrega($_REQUEST['previsao_entrega']);
              
              $daoManut = new ManutencaoDAO();
              
              $daoManut->update($obj, $_REQUEST['id_manutencao']);
             
              if($daoManut){
              	
                  ?>
                  
                    <script>
                      swal({title: 'Muito Bem..!', type: 'success', text: 'Manutenção alterada com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                      window.location.href = '../../view/manutencao/listaManutencao.php';
                      });
                      event.preventDefault();
                    </script>
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($daoManut);
              }
        ?>
                
        <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
                
    </body>
</html>