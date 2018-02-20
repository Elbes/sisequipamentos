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

$arquivo = "Equipamentos_Período";
if (PHP_SAPI == 'cli')
	die('Relatório de Manutenções');

	/** Include PHPExcel */
	require_once '../../resources/PHPExcel/Classes/PHPExcel.php';
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	//Propriedades do documento
	$objPHPExcel->getProperties()->setCreator("SIGEP")
	->setTitle("Esquipamentos por período")
	->setCategory("Relatório");
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Relatório de Equipamentos - SIGEP");
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
	$objPHPExcel->getActiveSheet()->SetCellValue('B2', "NÚMERO DO PATRIMONIO")->getStyle('B2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('C2', "NÚMERO DE SERIE")->getStyle('C2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('D2', "FABRICANTE")->getStyle('D2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('E2', "MODELO DO EQUIPAMENTO")->getStyle('E2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('F2', "MARCA DO EQUIPAMENTO")->getStyle('F2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('G2', "EXECUTOR DO CONTRATO")->getStyle('G2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('H2', "SETOR DE INSTALAÇÃO")->getStyle('H2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('I2', "RESPONSÁVEL PELO SETOR")->getStyle('I2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('J2', "TELEFONE DO SETOR")->getStyle('J2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('K2', "RAMAL DO SETOR")->getStyle('K2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('L2', "ASSISTÊNCIA TÉCNICA")->getStyle('L2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('M2', "TELEFONE ASSISTÊNCIA TÉCNICA")->getStyle('M2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('N2', "RECURSOS")->getStyle('N2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('O2', "VALOR DA AQUISIÇÃO")->getStyle('O2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('P2', "VENCIMENTO DA GARANTIA")->getStyle('P2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Q2', "CONTRATO DE MANUTENÇÃO")->getStyle('Q2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('R2', "NÚMERO DA NOTA FISCAL")->getStyle('R2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('S2', "DATA DA INSTALAÇÃO")->getStyle('S2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('T2', "MANUAL TÉCNICO")->getStyle('T2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('U2', "TENSÃO DO EQUIPAMENTO")->getStyle('U2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('V2', "POTÊNCIA DO EQUIPAMENTO")->getStyle('V2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('W2', "MATERIAL ENTREGUE")->getStyle('W2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('X2', "CADASTRO")->getStyle('X2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Y2', "ESTABELECIMENTO")->getStyle('Y2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('Z2', "USUÁRIO CADASTRO")->getStyle('Z2')->getFont()->setBold(true)->setSize(11);

	
	try{
		$obj = new EquipamentoDAO();
		

		$cont=3;
		$contador = 0;
		foreach ($obj->relatorioEquipPeriodo($data_inicial, $data_final) as $key){
			$id_equipamento = $key['id_equipamento'];
			$id_estabelecimento = $key['id_estabelecimento'];
			$id_usuario = $key['id_usuario_cadastro'];

			$estab = new EstabelecimentoDAO();
			$usuario = new UsuarioDAO();

				
				foreach ($estab->pesquisar($id_estabelecimento) as $value) {
					$nome_estabelecimento = $value['nome_estabelecimento'];
				}

				foreach ($usuario->pesqId($id_usuario) as $value1) {
					$nome_usuario = $value1['nome_usuario'];
				}
				
	            //RECEBE OS DADOS E DEFINE A LARGURA DAS COLUNAS
			    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont,utf8_decode($key['nome_equipamento']))->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont,$key['num_patrimonio'])->getColumnDimension('B')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont,$key['num_serie'])->getColumnDimension('C')->setWidth(12);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont,utf8_decode($key['fabricante']))->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont,utf8_decode($key['modelo_equip']))->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont,utf8_decode($key['marca_equip']))->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont,utf8_decode($key['executor_contrato']))->getColumnDimension('G')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('H'.$cont,utf8_decode($key['setor_instalacao']))->getColumnDimension('H')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont,utf8_decode($key['responsavel_setor']))->getColumnDimension('I')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('J'.$cont,$key['telefone_setor'])->getColumnDimension('J')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('K'.$cont,$key['ramal_setor'])->getColumnDimension('K')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('L'.$cont,utf8_decode($key['assistencia_tec']))->getColumnDimension('L')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('M'.$cont,$key['tel_assistencia_tec'])->getColumnDimension('M')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('N'.$cont,utf8_decode($key['recursos']))->getColumnDimension('N')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('O'.$cont,$key['valor_aquisicao'])->getColumnDimension('O')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('P'.$cont,$key['vencimento_garantia'])->getColumnDimension('P')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$cont,utf8_decode($key['contrato_manutencao']))->getColumnDimension('Q')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('R'.$cont,$key['numero_nota_fiscal'])->getColumnDimension('R')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('S'.$cont,$key['data_instalacao'])->getColumnDimension('S')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('T'.$cont,utf8_decode($key['manual_tecnico']))->getColumnDimension('T')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('U'.$cont,$key['tensao_equip'])->getColumnDimension('U')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('V'.$cont,$key['potencia_equip'])->getColumnDimension('V')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('W'.$cont,utf8_decode($key['material_entregue']))->getColumnDimension('W')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('X'.$cont,$key['dhs_cadastro'])->getColumnDimension('Y')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$cont,utf8_decode($nome_estabelecimento))->getColumnDimension('X')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$cont,utf8_decode($nome_usuario))->getColumnDimension('Z')->setAutoSize(true);
				





				
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