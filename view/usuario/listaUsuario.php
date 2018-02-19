<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php include '../constant.php';?>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script src="../js/bootstrap.min.js"></script>    
        
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/UsuarioDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../menu.php';
             
        ?>

        <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Usuários Cadastrados
                    	<input type="button" style="float: right;" class="btn btn-default" value="NOVO" accesskey=""onclick="window.location = 'formUsuario.php'" title="Cadastrar novo Usuário">
                     </div>
                   
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-usuario">
                            <thead>
                                <tr>    
                                    
                                    <th width="35px" style="text-align: center">MATRICULA</th>
                                    <th style="text-align: center">NOME</th>
                                    <th style="text-align: center">EMAIL</th>
                                    <th style="text-align: center">ESTABELECIMENTO</th>
                                    <th style="text-align: center">STATUS</th>
                                    <th width="150px" style="text-align: center">OPÇÕES</th>
                                    
                                </tr>
                            </thead>
							<tbody>
                            <?php
                            $obj = new UsuarioDAO(); 
                            foreach ($obj->listar() as $key){
                            	$id_usuario = $key['id_usuario'];
                            	$matricula = $key['matricula'];
                            	$nome = $key['nome_usuario'];
                            	$sobrenome_usuario = $key['sobrenome_usuario'];
                            	$email = $key['email'];
                            	$id_estabelecimento = $key['id_estabelecimento'];
                            	$status = $key['status_usuario'];
                            	
                            	$estabelecimento = nomeEstab($id_estabelecimento);
                            	                            		
                            	echo "
                            	<tr>
                            	 
                            	<td >$matricula</td>
                            	<td >$nome $sobrenome_usuario</td>
                            	<td >$email</td>
                            	<td>$estabelecimento</td>
                            	<td>$status</td>
                            	
                            	 <td width='150px' style='text-align: center'>
                            	 	<a title='Alterar' href='formEditarUsuario.php?id_usuario=$id_usuario' class='btn btn-success mgn-btn-dt'><i class='glyphicon glyphicon-pencil'></i></a>
                            	 	<a title='Alterar' href='#' onclick='swal({   title: 'Sair?', type: 'warning', text:'Tem certeza que deseja realmente Sair?',  showCancelButton: true,   confirmButtonColor: '#DD6B55',confirmButtonText: 'SAIR', cancelButtonText: 'CANCELAR', closeOnConfirm: false}, function(){window.location.href = '../../control/usuario/excluir_usuario?id_usuario=$id_usuario';});' class='btn btn-danger mgn-btn-dt'><i class='glyphicon glyphicon-trash'></i></a>
                            	</td>
                            	</tr>";
                            	 
                            	
                            	}
                            	?>
                       </tbody>
                        </table>
						
    					</div>
                    <div id="smart-paginator">  </div>

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
