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
include_once '../../Model/PerfilDAO.php';
include_once '../../Model/UsuarioDAO.php';
include_once '../../Model/EstabelecimentoDAO.php';
include_once '../../Model/EquipamentoDAO.php';
include_once '../../Model/ManutencaoDAO.php';
include_once '../../control/validalogin2.php';
include_once '../../resources/funcoes.php';

//$data_inicial = $_REQUEST['data_inicial'];
//$data_final = $_REQUEST['data_final'];
//$status_manutencao = $_REQUEST['status_manutencao'];
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Sao_Paulo');

$arquivo = "Usuários";
if (PHP_SAPI == 'cli')
	die('Relatório de Usuários');

	/** Include PHPExcel */
	require_once '../../resources/PHPExcel/Classes/PHPExcel.php';
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	//Propriedades do documento
	$objPHPExcel->getProperties()->setCreator("SIGEP")
	->setTitle("Usuários")
	->setCategory("Relatório");
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Relatório de Usuários - SIGEP");
	//MESCLA AS COLUNAS
	$objPHPExcel->getActiveSheet()->mergeCells("A1:G1");
	
	// Define o título da planilha, seria o nome da aba
	$objPHPExcel->getActiveSheet()->setTitle('Usuários');
	
	//ALINHAMENTO CENTRAL
	$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()
	->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)
	->setSize(18);
	
	//$objPHPExcel->getActiveSheet()->SetCellValue('A2', "ID DO USUÁRIO")->getStyle('A2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('A2', "MATRÍCULA")->getStyle('A2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('B2', "NOME DO USUÁRIO")->getStyle('B2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('C2', "E-MAIL")->getStyle('C2')->getFont()->setBold(true)->setSize(11);
	//$objPHPExcel->getActiveSheet()->SetCellValue('E2', "SENHA")->getStyle('E2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('D2', "STATUS USUÁRIO")->getStyle('D2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('E2', "DATA CADASTRO")->getStyle('E2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('F2', "ESTABELECIMENTO")->getStyle('F2')->getFont()->setBold(true)->setSize(11);
	$objPHPExcel->getActiveSheet()->SetCellValue('G2', "PERFIL")->getStyle('G2')->getFont()->setBold(true)->setSize(11);

	
	try{
		$obj = new UsuarioDAO();
		

		$cont=3;
		$contador = 0;
		foreach ($obj->listar() as $key){
			$id_usuario = $key['id_usuario'];
			$id_estabelecimento = $key['id_estabelecimento'];
			$id_perfil = $key['id_perfil'];

			$estab = new EstabelecimentoDAO();

				foreach ($estab->pesquisar($id_estabelecimento) as $value) {
						$nome_estabelecimento = $value['nome_estabelecimento'];
					}

			$perfil = new PerfilDAO();

				foreach ($perfil->pesquisar($id_perfil) as $value1) {
					$nome_perfil = $value1['nome_perfil'];
				}
				
	            //RECEBE OS DADOS E DEFINE A LARGURA DAS COLUNAS
			    //$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont,$key['id_usuario'])->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont,$key['matricula'])->getColumnDimension('A')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont,utf8_decode($key['nome_usuario'] . " " . $key['sobrenome_usuario']))->getColumnDimension('B')->setWidth(12);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cont,$key['email'])->getColumnDimension('C')->setAutoSize(true);
				//$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont,$key['senha'])->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cont,$key['status_usuario'])->getColumnDimension('D')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cont,$key['data_cadastro'])->getColumnDimension('E')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cont,utf8_decode($nome_estabelecimento))->getColumnDimension('F')->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont,utf8_decode($nome_perfil))->getColumnDimension('G')->setAutoSize(true);

				
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