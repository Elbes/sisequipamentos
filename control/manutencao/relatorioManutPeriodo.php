<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base  />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
         <meta charset="UTF-8">
         <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../../view/css/bootstrap.css" rel="stylesheet">
        <link href="../../view/css/style.css" rel="stylesheet">
        <script src="../../view/css/dist/sweetalert.min.js"></script>
        <script src="../../view/js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../../view/css/dist/sweetalert.css">   
        
        <?php include '../../view/constant.php';?>
<style type="text/css">
<!--
#sb-body-inner{background-color:#fff;}
-->
</style>
</head>
<body>

<?php


include_once '../../Model/session.php';
include_once '../../Model/RegiaoDAO.php';
include_once '../../Model/UsuarioDAO.php';
include_once '../../Model/EstabelecimentoDAO.php';
include_once '../../Model/EquipamentoDAO.php';
include_once '../../Model/ManutencaoDAO.php';
include_once '../../control/validalogin2.php';
include_once '../../resources/funcoes.php';

$data_inicial = $_REQUEST['data_inicial'];
$data_final = $_REQUEST['data_final'];
$status_manutencao = $_REQUEST['status_manutencao'];

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Sao_Paulo');

$arquivo = "Manutenções_Período";
if (PHP_SAPI == 'cli')
	die('Relatório de Manutenções');

	/** Include PHPExcel */
	require_once '../../resources/PHPExcel/Classes/PHPExcel.php';
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	//Propriedades do documento
	$objPHPExcel->getProperties()->setCreator("SIGEP")
	->setTitle("Manutenções por período e status")
	->setCategory("Relatório");
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Relatório de Manutenções - SIGEP");
	//MESCLA AS COLUNAS
	$objPHPExcel->getActiveSheet()->mergeCells("A1:G1");
	
	// Define o título da planilha, seria o nome da aba
	$objPHPExcel->getActiveSheet()->setTitle('Manutenções');
	
	//ALINHAMENTO CENTRAL
	$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()
	->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)
	->setSize(18);
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A2', "NOME EQUIPAMENTO")->getStyle('A2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('B2', "SERVIÇO SOLICITADO")->getStyle('B2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('C2', "CHAMADO")->getStyle('C2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('D2', "LOCAL DA FALHA")->getStyle('D2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('E2', "LOCAL DA FALHA")->getStyle('E2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('F2', "LOCAL DA MANUTENÇÃO")->getStyle('F2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('G2', "DATA DO ENVIO")->getStyle('G2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('H2', "TELEFONE DA MANUTENÇÃO")->getStyle('H2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('I2', "CONTRATO DA MANUTENÇÃO")->getStyle('I2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('J2', "GRAU DE NECESSIDADE")->getStyle('J2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('K2', "ORIGEM DA FALHA")->getStyle('K2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('L2', "OUTRA ORIGEM DA FALHA")->getStyle('L2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('M2', "OBSERVAÇÃO")->getStyle('M2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('N2', "PREVISÃO DE ENTREGA")->getStyle('N2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('O2', "TIPO DE MANUTENÇÃO")->getStyle('O2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('P2', "RESPONSÁVEL PELA MANUTENÇÃO")->getStyle('P2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q2', "FALHA RELATADA")->getStyle('Q2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('R2', "SERVIÇO REALIZADO")->getStyle('R2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('S2', "DATA DA ENTREGA")->getStyle('S2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('T2', "RECEBIDO POR")->getStyle('T2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('U2', "PENDÊNCIAS")->getStyle('U2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('V2', "DESCRIÇÃO DAS PENDÊNCIAS")->getStyle('V2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('W2', "TROCA DA PEÇA")->getStyle('W2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('X2', "PEÇA TROCADA")->getStyle('X2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y2', "VALOR TOTAL")->getStyle('Y2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z2', "VENCIMENTO GARANTIA DO SERVIÇO")->getStyle('Z2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('AA2', "OBSERVAÇÃO DO FECHAMENTO")->getStyle('AA2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('AB2', "DATA ABERTURA")->getStyle('AB2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('AC2', "DATA FECHAMENTO")->getStyle('AC2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('AD2', "STATUS DA MANUTENÇÃO")->getStyle('AD2')->getFont()->setBold(true)->setSize(11);

	
	try{
		$obj = new ManutencaoDAO();
		
		$cont=3;
		$contador = 0;
		if ($status_manutencao == "Todas"){ $funcao = $obj->relatorioManutPeriodo($data_inicial, $data_final);}
		else { $funcao = $obj->relatorioManutPeriodoStatus($data_inicial, $data_final, $status_manutencao);}
		foreach ($funcao as $key){
			$id_manutencao = $key['id_manutencao'];
			
			$data_envio = $key['data_envio'];
			$cadastro = $key['dhs_abertura'];
			$envio = date('d/m/Y', strtotime($data_envio));
			
				$id_equipamento = $key['id_equipamento'];
				$daoEquip = new EquipamentoDAO();
		       	foreach ($daoEquip->pesquisar($id_equipamento) as $equip){
		       	}
				
	            //RECEBE OS DADOS E DEFINE A LARGURA DAS COLUNAS
			    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, $equip['nome_equipamento'])->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, $key['servico_solicitado'])->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont,$key['numero_chamado'])->getColumnDimension('C')->setWidth(12);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont,$key['local_falha'])->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont,$key['acessorios'])->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont,$key['local_manutencao'])->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont,$envio)->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('H'.$cont,$key['telefone_manutencao'])->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont,$key['contrato_manutencao'])->getColumnDimension('I')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('J'.$cont,$key['grau_necessidade'])->getColumnDimension('J')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('K'.$cont,$key['origem_falha'])->getColumnDimension('K')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('L'.$cont,$key['origem_falha_outro'])->getColumnDimension('L')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('M'.$cont,$key['observacao_manutencao'])->getColumnDimension('M')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('N'.$cont,$key['previsao_entrega'])->getColumnDimension('N')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('O'.$cont,$key['tipo_manutencao'])->getColumnDimension('O')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('P'.$cont,$key['responsavel_manutencao'])->getColumnDimension('P')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$cont,$key['falha_relatada'])->getColumnDimension('Q')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('R'.$cont,$key['servico_realizado'])->getColumnDimension('R')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('S'.$cont,$key['data_entrega'])->getColumnDimension('S')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('T'.$cont,$key['recebido_por'])->getColumnDimension('T')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('U'.$cont,$key['pendencia'])->getColumnDimension('U')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('V'.$cont,$key['descricao_pendencia'])->getColumnDimension('V')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('W'.$cont,$key['troca_peca'])->getColumnDimension('W')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('X'.$cont,$key['peca_trocada'])->getColumnDimension('Y')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$cont,$key['valor_total'])->getColumnDimension('X')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$cont,$key['venc_garantia_servico'])->getColumnDimension('Z')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$cont,$key['observacao_fechamento'])->getColumnDimension('AA')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$cont,$key['dhs_abertura'])->getColumnDimension('AB')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$cont,$key['dhs_fechamento'])->getColumnDimension('AC')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$cont,$key['status_manutencao'])->getColumnDimension('AD')->setAutoSize(true);





				
				$cont++;
			    $contador ++;
		}
	}catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	if ($contador < 1) {
		 ?>
                  
            <script>
            	swal({title: 'Oops..!', type: 'warning', text: 'Dados não encontrados. Redefina sua consulta!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		    		window.history.go(-1);
		    	});
            </script>
                      
         <?php
         exit();
	}

	// Define a planilha como ativa sendo a primeira, assim quando abrir o arquivo será a que virá aberta como padrão
	$objPHPExcel->setActiveSheetIndex(0);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// DADOS DO ARQUIVO
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="'.$arquivo.'.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	ob_end_clean();
	$objWriter->save('php://output');
	exit;

?>

</body>
</html>



		