<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/session.php';
        include_once '../../control/validalogin2.php';
        include_once '../menu.php';

        $obj = new Session();
        
        ?>

        <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Regiões Cadastradas
                    	<input type="button" style="float: right;" class="btn btn-default" value="NOVO" accesskey=""onclick="window.location = 'formRegiao.php'" title="Cadastrar nova Região">
                     </div>
                   
                    <div class="panel-body">
                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-usuario">
                            <thead>
                                <tr>    
                                    
                                    <th width="40px" style="text-align: center">NÚMERO</th>
                                    <th style="text-align: center">NOME REGIÃO</th>
                                    <th style="text-align: center">SIGLA</th>
                                    <th style="text-align: center">DESCRIÇÃO</th>
                                    <th width="150px" style="text-align: center">OPÇÕES</th>
                                    
                                </tr>
                           
                            </thead>
							<tbody>
                            <?php
                            
                            $obj = new RegiaoDAO(); 
                            foreach ($obj->listar() as $key){
                            	$id_regiao = $key['id_regiao'];
                            	$numero_regiao = $key['numero_regiao'];
                            	$nome_regiao = utf8_decode($key['nome_regiao']);
                            	$sigla = $key['sigla_regiao'];
                            	$descricao = utf8_decode($key['descricao_regiao']);
                            		
                            	echo "
                            	<tr>
                            	 
                            	<td width='30px'>$numero_regiao</td>
                            	<td>$nome_regiao</td>
                            	<td>$sigla</td>
                            	<td>$descricao</td>
                            	 <td width='150px' style='text-align: center'>
                            		<a title='Alterar' href='formEditarRegiao.php?id_regiao=$id_regiao' class='btn btn-success mgn-btn-dt'><i class='glyphicon glyphicon-pencil'></i></a>
                            	 	<a title='Excluir' href='../control/executar_exclusao_regiao.php?id_regiao=$id_regiao' class='btn btn-danger mgn-btn-dt'><i class='glyphicon glyphicon-trash'></i></a>
                            	 </td>
                            	</tr>";
                            	 
                            	
                            	}
                            	?>
                       		</tbody>
                        </table>

                    </div>

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

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
