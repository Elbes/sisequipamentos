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
	<style type="text/css">
	
	/* " Para o input */
    .input-search{
        border:1px solid #CCC;
        padding:5px 40px;
        font-size:12px;
        margin:10px 0;
        position:relative;
		left:50%;
 
        -webkit-border-radius:15px;
           -moz-border-radius:15px;
            -ms-border-radius:15px;
             -o-border-radius:15px;
                border-radius:15px;
    }
     .input-search::-webkit-input-placeholder{ font-style:italic }
        .input-search:-moz-placeholder          { font-style:italic }
        .input-search:-ms-input-placeholder     { font-style:italic }
	</style>
        
        
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
			<input type="button" class="btn btn-primary" value="CADASTRO" accesskey=""onclick="window.location = 'formRegiao.php'" title="Cadastrar nova Região">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Regiões Cadastradas
                    	<input type="text" style="color: black;" size="35" class="input-search" alt="table-responsive" placeholder="Buscar" />
                    	
                     </div>
                   
                    <div class="table-responsive">
                              
                        <table class="table table-bordered  table-striped text-center" >
                            <thead>
                                <tr class="success">    
                                    
                                    <th width="40px" style="text-align: center">NÚMERO</th>
                                    <th style="text-align: center">NOME REGIÃO</th>
                                    <th style="text-align: center">SIGLA</th>
                                    <th style="text-align: center">DESCRIÇÃO</th>
                                    <th style="text-align: center">EDITAR</th>
                                    <th style="text-align: center">EXCLUIR</th>
                                    
                                </tr>
                           
                            </thead>

                            <?php
                            
                            $obj = new RegiaoDAO(); 
                            foreach ($obj->listar() as $key){
                            	$id_regiao = $key['id_regiao'];
                            	$numero_regiao = $key['numero_regiao'];
                            	$nome_regiao = utf8_encode($key['nome_regiao']);
                            	$sigla = $key['sigla_regiao'];
                            	$descricao = utf8_encode($key['descricao_regiao']);
                            		
                            	echo "
                            	<tr>
                            	 
                            	<td width='30px'>$numero_regiao</td>
                            	<td>$nome_regiao</td>
                            	<td>$sigla</td>
                            	<td>$descricao</td>
                            	 
                            	 
                            	<form method='post' action='formEditarRegiao.php'>
                            		<input type='hidden' class='btn btn-primary' name='id_regiao' value='$id_regiao'>
                            		<td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                            	</form>
                            	<form method='post' action='../control/executar_exclusao_regiao.php'>
                            		<input type='hidden' class='btn btn-primary' name='id_regiao' value=>
                            		<td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
                            	</form>";
                            	
                            	}
                            	?>
                       
                        </table>

                    </div>

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>

    </body>
</html>
