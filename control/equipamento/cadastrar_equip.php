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
        
        <title>Cadastrar Equipamento</title>
        
        
    </head>
    <body>
        <?php
           //date_default_timezone_set('America/Sao_Paulo');
              error_reporting(1);
              include_once '../../Model/session.php';
              include_once '../../resources/funcoes.php';
              //include_once '../validalogin2.php';
              $objj = new Session();
          
              require '../../Model/EquipamentoVO.php';
              require '../../Model/EquipamentoDAO.php';
             
              
              $daoPesq = new EquipamentoDAO();
              $cont = 0;
              foreach ($daoPesq->verificaExistente($_REQUEST['num_patrimonio']) as $key){
              	$cont ++;
              }
              
              if($cont >= 1){
              	?>
              	    <script>
	              	  swal({title: 'Oops..!', type: 'warning', text: 'Este Equipamento já existe!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
	              		window.history.go(-1);
	                  });
              	    </script>
              	<?php
                 exit();
               }
              
              $equip = new EquipamentoVO();
              
              $equip->setNomeEquipamento(utf8_encode($_REQUEST['nome_equipamento']));
              $equip->setNumPatrimonio($_REQUEST['num_patrimonio']);
              $equip->setNumSerie($_REQUEST['num_serie']);
              $equip->setFabricante(utf8_encode($_REQUEST['fabricante']));
              $equip->setModeloEquip(utf8_encode($_REQUEST['modelo_equip']));
              $equip->setMarcaEquip(utf8_encode($_REQUEST['marca_equip']));
              $equip->setExecutorContrato(utf8_encode($_REQUEST['executor_contrato']));
              $equip->setSetorInstalacao(utf8_encode($_REQUEST['setor_instalacao']));
              $equip->setResponsavelSetor(utf8_encode($_REQUEST['responsavel_setor']));
              $equip->setTelefoneSetor(utf8_encode($_REQUEST['telefone_setor']));
              $equip->setRamalSetor($_REQUEST['ramal_setor']);
              $equip->setAssistenciaTec(utf8_encode($_REQUEST['assistencia_tec']));
              $equip->setTelAssistenciaTec($_REQUEST['tel_assistencia_tec']);
              $equip->setRecursos(utf8_encode($_REQUEST['recursos']));
              $equip->setValorAquisicao($_REQUEST['valor_aquisicao']);
              $equip->setVencimentoGarantia($_REQUEST['vencimento_garantia']);
              $equip->setContratoManutencao(utf8_encode($_REQUEST['contrato_manutencao']));
              $equip->setNumeroNotaFiscal($_REQUEST['numero_nota_fiscal']);
              $equip->setDataAquisicao($_REQUEST['data_aquisicao']);
              $equip->setManualTecnico(utf8_encode($_REQUEST['manual_tecnico']));
              $equip->setTensaoEquip($_REQUEST['tensao_equip']);
              $equip->setPotenciaEquip($_REQUEST['potencia_equip']);
              $equip->setMaterialEntregue(utf8_encode($_REQUEST['material_entregue']));
              $equip->setDhsCadastro(date('Y-m-d H:i:s'));
              $equip->setIdEstabelecimento($_REQUEST['id_estabelecimento']);
              $equip->setIdUsuarioCadastro($_SESSION['id_usuario']);
           
              $daoEquip = new EquipamentoDAO();
              
              $daoEquip->inserir($equip);
             
              if($daoEquip){
              	
                  ?>
                  
                    <script>
	                    swal({title: 'Muito Bem..!', type: 'success', text: 'Equipamento Cadastrado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
	                		window.location.href = '../../view/equipamento/listaEquipamento.php';
	                    });
	
	                    event.preventDefault();
                    </script>
                      
                  <?php
              }
              else{
                  //Lista os erros
                  print_r($daoEquip);
              }
        ?>
                
        <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
                
    </body>
</html>
