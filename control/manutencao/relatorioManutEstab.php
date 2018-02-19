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
        <script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
        
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

$id_regiao = $_REQUEST['id_regiao'];
$id_estabelecimento = $_REQUEST['id_estabelecimento'];
$status_manutencao = $_REQUEST['status_manutencao'];
$data_inicial = $_REQUEST['data_inicial'];
$data_final = $_REQUEST['data_final'];

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Sao_Paulo');

$arquivo = "Manutenções_Estabelecimento";
if (PHP_SAPI == 'cli')
	die('Relatório de Manutenções por Estabelecimento');

	/** Include PHPExcel */
	require_once '../../resources/PHPExcel/Classes/PHPExcel.php';
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	//Propriedades do documento
	$objPHPExcel->getProperties()->setCreator("SIGEP")
	->setTitle("Manutenções por estabelecimento e status")
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
	$objPHPExcel->getActiveSheet()->SetCellValue('H2', "STATUS")->getStyle('H2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('I2', "ESTABELECIMENTO")->getStyle('I2')->getFont()->setBold(true)->setSize(11);
	
	try{
		$obj = new ManutencaoDAO();
		$daoEstab = new EstabelecimentoDAO();
		$daoEquip = new EquipamentoDAO();
		
		$cont=3;
		$contador = 0;
	
		foreach ($daoEquip->listarEstab($id_estabelecimento) as $equip){
			$id_equipamento = $equip['id_equipamento'];
			foreach ($daoEstab->pesquisar($equip['id_estabelecimento']) as $estab){
				$nome_estab = $estab['nome_estabelecimento'];
			}
	    if($data_inicial == '' || $data_final == '')
	    {
	    	if($status_manutencao == 'Todas'){
	    		$funcao = $obj->relatorioManutEquipSemData($id_equipamento);
	    	}
	    	else{
	    		$funcao = $obj->relatorioManutEquip($id_equipamento, $status_manutencao);
	    	}
	    	
	    }
	    else{
	    	if($status_manutencao == 'Todas')
	    	{
	    		$funcao = $obj->relatorioSemStatus($id_equipamento, $data_inicial, $data_final);
	    	}
	    	else {
	    		$funcao = $obj->relatorioManutEquipData($status_manutencao, $id_equipamento, $data_inicial, $data_final);
	    	}
	    }
	    
		foreach ($funcao as $key){
			
			$data_envio = $key['data_envio'];
			$envio = date('d/m/Y', strtotime($data_envio));
			
	            //RECEBE OS DADOS E DEFINE A LARGURA DAS COLUNAS
			    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, $equip['nome_equipamento'])->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, $key['servico_solicitado'])->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont,$key['numero_chamado'])->getColumnDimension('C')->setWidth(12);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont,$key['local_falha'])->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont,$key['acessorios'])->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont,$key['local_manutencao'])->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont,$envio)->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('H'.$cont,$key['status_manutencao'])->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont,$nome_estab)->getColumnDimension('I')->setAutoSize(true);
				
				$cont++;
			    $contador ++;
				
			}
		}
	}catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	if ($contador < 1) {
		
		 ?>
                  
            <script>relatorioVazio();</script>
                      
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
		<script src="../../view/js/jquery-1.11.3.min.js"></script>
        <script src="../../view/js/bootstrap.min.js"></script>
</body>
</html>



		