<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../constant.php';?>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../js/jquery.maskmoney.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
        <link href="../imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" /> 

    <script type="text/javascript">
		    $(document).ready(function(){
		        $('#id_regiao').change(function(){
		            $('#estabelecimento').load('../equipamento/equipEdit.php?id_regiao='+$('#id_regiao').val());
		        });
		    });
		    
    	</script>
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        include_once '../../control/validalogin2.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../../Model/EquipamentoDAO.php';
        include_once '../../Model/ManutencaoDAO.php';
        include_once '../menu.php';
        
        $tipo_perfil = $_SESSION['tipo_perfil'];
      
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Relatório de Equipamentos por período</div>

                <div class="panel-body">

                    <form action="../../control/equipamento/relatorioEquipPeriodo.php" method="post">
						<div class="row">

		                    <div class="col-md-3 col-md-offset-1">
		                        <div class="form-group">
		                            <label for="data_inicial">Data Inicial </label>
		                            <input type="date" class="datepicker form-control" id="datepicker" required name="data_inicial" title="Escolha a data Inicial" />
		                        </div>
		                    </div>
		
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label for="data_final">Data Final </label>
		                            <input type="date" class="datepicker form-control" id="datepicker" required name="data_final" title="Escolha a data Final" />
		                        </div>
		                    </div>		                    
		                </div>  
                        <hr>
   
		
		                <div class="row">
		
		                    <div class="col-md-3 col-md-offset-1">
		                        <div class="form-group">
		                            <br>   
		                            <input type="submit" class="btn btn-primary" value="Buscar"/>  
		                        </div>
		                    </div>
		                </div>
                	</form>
                </div> <!-- Fim Panel Body -->
   
                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
