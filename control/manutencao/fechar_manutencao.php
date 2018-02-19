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
             
              $obj->setFalhaRelatada($_REQUEST['falha_relatada']);
              $obj->setDataEntrega($_REQUEST['data_entrega']);
              $obj->setRecebidoPor($_REQUEST['recebido_por']);
              $obj->setServicoRealizado($_REQUEST['servico_realizado']);
              $obj->setPendencia($_REQUEST['pendencia']);
              $obj->setDescricaoPendencia($_REQUEST['descricao_pendencia']);
              $obj->setTrocaPeca($_REQUEST['troca_peca']);
              $obj->setPecaTrocada($_REQUEST['peca_trocada']);
              $obj->setValorTotal($_REQUEST['valor_total']);
              $obj->setVencGarantiaServico($_REQUEST['venc_garantia_servico']);
              $obj->setObservacaoFechamento($_REQUEST['observacao_fechamento']);
              $obj->setIdUsuarioFechamneto($_SESSION['id_usuario']);
              $obj->setDhsFechamento(date('Y-m-d H:i:s'));
              $obj->setStatusManutencao('Fechada');
              
              $daoManut = new ManutencaoDAO();
              
              $daoManut->fecharManutencao($obj, $_REQUEST['id_manutencao']);
             
              if($daoManut){
              	
                  ?>
                  
                    <script>
                      swal({title: 'Muito Bem..!', type: 'success', text: 'Manutenção fechada com sucesso!A partir de agora ela ficará visível nos relatórios de Mautenções Fechadas', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                          window.location.href = '../../view/manutencao/listaManutencao.php';
                        });
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