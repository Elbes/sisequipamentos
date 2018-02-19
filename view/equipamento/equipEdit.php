<?php   
include_once '../../Model/RegiaoDAO.php';
include_once '../../Model/EstabelecimentoDAO.php';

$dao = new EstabelecimentoDAO();
$id_regiao = $_REQUEST['id_regiao'];
 
echo "<select class='dropdown form-control' required name='id_estabelecimento'>";
echo "<option value=''>--Selecione--</option>";
foreach ($dao->pesqReg($id_regiao) as $esp){
	echo "<option value=".$esp['id_estabelecimento'].">".strtoupper(utf8_encode($esp['nome_estabelecimento']))."</option>";
}
echo "</select>";
 
?>