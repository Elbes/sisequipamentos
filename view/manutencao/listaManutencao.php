<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../constant.php';?>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script src="../js/bootstrap.min.js"></script>  

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery.maskedinput.js"></script>
         <script>
            jQuery(function ($) {
                //                       $("#campoData").mask("99/99/9999");
                //                $("#campoData").mask("9999/99/99");
                $("#campoTelefone").mask("(99) 9999-9999");
                $("#campoCep").mask("99999-999");
            });
        </script>
        
        
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
        include_once '../menu.php';
        
        ?>

        <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Minhas Manutenções - Ordens de Serviço
                    	<input type="button" style="float: right;" class="btn btn-default" value="NOVO" accesskey=""onclick="window.location = 'formManutencao.php'" title="Registrar nova Manutenção">
                     </div>
                   
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>      
                                    
                                    <th style="text-align: center">SERVIÇO</th>
                                    <th style="text-align: center">CHAMADO</th>
                                    <th style="text-align: center">LOCAL FALHA</th>
                                    <th style="text-align: center">EXECUTOR CONTRATO</th>
                                    <th style="text-align: center">DATA ENVIO</th>
                                    <th style="text-align: center">GRAU NECESSIDADE</th>
                                    <th style="text-align: center">ABERTURA</th>
                                    <th style="text-align: center">OPÇÕES</th>
                                    
                                </tr>
                           
                            </thead>

                            <?php
                            $obj = new ManutencaoDAO(); 
                            $status = 'Aberta';
                            
                            $id_estab_usuario = $_SESSION['id_estabelecimento'];
                            $tipo_perfil = $_SESSION['tipo_perfil'];
                            $obj1 = new EquipamentoDAO();
                            if ($tipo_perfil=="NUCLEO"){
                            	foreach ($obj1->listarEstab($id_estab_usuario) as $estab){
                            	$id_equipamento = $estab['id_equipamento'];
                            	$funcao = $obj->listarStatusEquip($status, $id_equipamento);
                            }
                            }else {
                            	$funcao= $obj->listarStatus($status, $id_equipamento);
                            }
                            	
                            foreach ($funcao as $key){
                            	$id_manutencao = $key['id_manutencao'];
                            	$servico_solicitado = $key['servico_solicitado'];
                            	$num_patrimonio = $key['numero_chamado'];
                            	$local_falha = $key['local_falha'];
                            	$local_manutencao = utf8_encode($key['local_manutencao']);
                            	$data_envio = $key['data_envio'];
                            	$grau_necessidade = $key['grau_necessidade'];
                            	
                            	$cadastro = $key['dhs_abertura'];
                            	$reversed = date('d/m/Y H.i.s', strtotime($cadastro));
                            	//$estabelecimento = utf8_encode(nomeEstab($id_estabelecimento));
                            	                            		
                            	echo "
                            	<tr>
                            	 
                            	<td>$servico_solicitado</td>
                            	<td >$num_patrimonio</td>
                            	<td >$local_falha</td>
                            	<td>$local_manutencao</td>
                            	<td >$data_envio</td>
                            	<td>$grau_necessidade</td>
                            	<td width='30px'>".$reversed."</td>
                            	 
                            	 <td width='150px' style='text-align: center'>
                            		<a title='Alterar' href='formEditarManutencao.php?id_manutencao=$id_manutencao' class='btn btn-success mgn-btn-dt'><i class='glyphicon glyphicon-pencil'></i></a>
                            	 	<a title='Dar baixa na manutenção' href='formFecharManutencao.php?id_manutencao=$id_manutencao' class='btn btn-warning mgn-btn-dt'><i class='glyphicon glyphicon-ok'></i></a>
                            	 </td>
                            </tr>";

                            }
                            	
                            	?>
                       
                        </table>

                    </div>

                    <?php $rodape = new Session(); $rodape->footer();?> 

                </div>
            </div>
        </div>

    </body>
     <!-- DataTables JavaScript -->
    <script src="../../resources/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../resources/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../resources/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../../resources/datatables/js/scripts.js"></script>
    
    <!-- DataTables CSS -->
    <link href="../../resources/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../resources/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $("#dataTables").dataTable({
        "bJQueryUI": false,
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs float-right'l>r>"+
		"t"+
		"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"oLanguage": {
			"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		},
		"oLanguage": {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ Registros por página",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Carregando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar: ",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
			}
		},
    responsive: true
    })
    </script>
</html>
