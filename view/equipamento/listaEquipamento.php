<!DOCTYPE HTML>
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
                //$("#campoData").mask("99/99/9999");
                //$("#campoData").mask("9999/99/99");
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
        include_once '../../control/validalogin2.php';
        include_once '../../resources/funcoes.php';
        include_once '../menu.php';
        
        ?>

        <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Estabelecimentos Cadastrados
                    	<input type="button" style="float: right;" class="btn btn-default" value="NOVO" accesskey=""onclick="window.location = 'formEquipamento.php'" title="Cadastrar nova Região">
                     </div>
                   
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>      
                                    
                                    <th style="text-align: center">NOME</th>
                                    <th style="text-align: center">PATRIMÔNIO</th>
                                    <th style="text-align: center">FABRICANTE</th>
                                    <th style="text-align: center">EXECUTOR CONTRATO</th>
                                    <th style="text-align: center">ESTABELECIMENTO INST.</th>
                                    <th style="text-align: center">SETOR</th>
                                    <!--  <th style="text-align: center">CADASTRO</th>-->
                                    <th style="text-align: center">OPÇÕES</th>
                                    
                                </tr>
                           
                            </thead>

                            <?php
                            $id_estab_usuario = $_SESSION['id_estabelecimento'];
                            $tipo_perfil = $_SESSION['tipo_perfil'];
                            $obj = new EquipamentoDAO(); 
                            if ($tipo_perfil=="NUCLEO"){
                            	$funcao = $obj->listarEstab($id_estab_usuario);
                            }
                            else{
                            	$funcao = $obj->listar();
                            }
                            foreach ($funcao as $key){
                            	
                            	$id_equipamento = $key['id_equipamento'];
                            	$nome_equipamento = utf8_decode(strtoupper($key['nome_equipamento']));
                            	$num_patrimonio = $key['num_patrimonio'];
                            	$fabricante = utf8_decode($key['fabricante']);
                            	$setor_instalacao = utf8_decode($key['setor_instalacao']);
                            	$executor_contrato= utf8_decode(strtoupper($key['executor_contrato']));
                            	$id_estabelecimento = $key['id_estabelecimento'];
                            	
                            	$estabelecimento = utf8_decode(nomeEstab($id_estabelecimento));
                            	                            		
                            	echo "
                            	<tr>
                            	 
                            	<td width='100px'>$nome_equipamento</td>
                            	<td >$num_patrimonio</td>
                            	<td >$fabricante</td>
                            	<td>$executor_contrato</td>
                            	<td >$estabelecimento</td>
                            	<td>$setor_instalacao</td>
                            	
                            	 
                            	 <td width='150px' style='text-align: center'>
                            		<a title='Alterar' href='formEditarEquipamento.php?id_equipamento=$id_equipamento' class='btn btn-success mgn-btn-dt'><i class='glyphicon glyphicon-pencil'></i></a>";?>
                            		<a href="#" class='btn btn-danger mgn-btn-dt' onclick="swal({   title: 'EXCLUIR?', type: 'warning', text:'Excluindo este equipamento você também estará excluindo todos os registros do mesmo!\nTem certeza que deseja realmente Excluir este equipamento?',  showCancelButton: true,   confirmButtonColor: '#DD6B55',confirmButtonText: 'EXCLUIR', cancelButtonText: 'CANCELAR', closeOnConfirm: false}, function(){window.location.href = '../../control/equipamento/executar_exclusao_equipamento.php?id_equipamento=<?php echo $id_equipamento;?>';});"><i class='glyphicon glyphicon-trash'></i></a>
                            		<?php echo "
                            	    <a title='Registrar Manutenção' href='../manutencao/formManutencao.php?id_equipamento=$id_equipamento' class='btn btn-info mgn-btn-dt'><i class='glyphicon glyphicon-list-alt'></i></a>
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
