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
        
    </head>
    <body>
        <?php
        include_once '../../Model/session.php';
        include_once '../menu.php';
        
        ?>

        <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Tipos de Estabelecimentos Cadastrados
                    	<input type="button" style="float: right;" class="btn btn-default" value="NOVO" accesskey=""onclick="window.location = 'formTipoEstabelecimento.php'" title="Cadastrar nova Região">
                     </div>
                   
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-usuario">
                            <thead>
                                <tr>       
                                    
                                    <th width="300" style="text-align: center">TIPO</th>
                                    <th width="550" style="text-align: center">OBSERVAÇÃO</th>
                                    <th style="text-align: center">OPÇÕES</th>
                                    
                                </tr>
                           
                            </thead>

                            <?php
                            include_once '../../Model/TipoEstabDAO.php';
                            $obj = new TipoEstabDAO(); 
                            foreach ($obj->listar() as $key){
                            	$id_tipo_estabelecimento = $key['id_tipo_estabelecimento'];
                            	$tipo = utf8_encode($key['tipo']);
                            	$obs = utf8_encode($key['obs_tipo']);
                            	
                            	echo "
                            	<tr>
                            	 
                            	<td>$tipo</td>
                            	<td>$obs</td>
                            	 
                            	<td width='150px' style='text-align: center'>
                            		<a title='Alterar' href='formEditarTipoEstab.php?id_tipo_estabelecimento=$id_tipo_estabelecimento' class='btn btn-success mgn-btn-dt'><i class='glyphicon glyphicon-pencil'></i></a>
                            	 	<a title='Excluir' href='../../control/executar_exclusao_tipo_estabelecimento.php?id_tipo_estabelecimento=$id_tipo_estabelecimento' class='btn btn-danger mgn-btn-dt'><i class='glyphicon glyphicon-trash'></i></a>
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

    $("#dataTables-usuario").dataTable({
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
