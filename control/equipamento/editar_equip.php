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
        
        <title>Editar Equipamento</title>
        
        
    </head>
    <body>
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
              
              $obj = new EquipamentoVO();
              
              $obj->setNomeEquipamento(utf8_encode($_REQUEST['nome_equipamento']));
              $obj->setNumPatrimonio($_REQUEST['num_patrimonio']);
              $obj->setNumSerie($_REQUEST['num_serie']);
              $obj->setFabricante(utf8_encode($_REQUEST['fabricante']));
              $obj->setModeloEquip(utf8_encode($_REQUEST['modelo_equip']));
              $obj->setMarcaEquip(utf8_encode($_REQUEST['marca_equip']));
              $obj->setExecutorContrato(utf8_encode($_REQUEST['executor_contrato']));
              $obj->setSetorInstalacao(utf8_encode($_REQUEST['setor_instalacao']));
              $obj->setResponsavelSetor(utf8_encode($_REQUEST['responsavel_setor']));
              $obj->setTelefoneSetor(utf8_encode($_REQUEST['telefone_setor']));
              $obj->setRamalSetor($_REQUEST['ramal_setor']);
              $obj->setAssistenciaTec(utf8_encode($_REQUEST['assistencia_tec']));
              $obj->setTelAssistenciaTec($_REQUEST['tel_assistencia_tec']);
              $obj->setRecursos(utf8_encode($_REQUEST['recursos']));
              $obj->setValorAquisicao($_REQUEST['valor_aquisicao']);
              $obj->setVencimentoGarantia($_REQUEST['vencimento_garantia']);
              $obj->setContratoManutencao(utf8_encode($_REQUEST['contrato_manutencao']));
              $obj->setNumeroNotaFiscal($_REQUEST['numero_nota_fiscal']);
              $obj->setDataInstalacao($_REQUEST['data_instalacao']);
              $obj->setManualTecnico(utf8_encode($_REQUEST['manual_tecnico']));
              $obj->setTensaoEquip($_REQUEST['tensao_equip']);
              $obj->setPotenciaEquip($_REQUEST['potencia_equip']);
              $obj->setMaterialEntregue(utf8_encode($_REQUEST['material_entregue']));
              $obj->setDhsAtualizacao(date('Y-m-d H:i:s'));	
              //var_dump($obj);exit();
              $dao = new EquipamentoDAO();
              
              $dao->update($obj, $_REQUEST['id_equipamento']);
              
              if($dao){
                  ?>
                  
                    <script>swal({title: 'Muito Bem..!', type: 'success', text: 'Equipamento Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
                        window.location.href = '../../view/equipamento/listaEquipamento.php';
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
