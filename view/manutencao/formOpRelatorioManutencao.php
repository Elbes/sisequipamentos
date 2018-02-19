<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../constant.php';?>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../js/jquery.maskmoney.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
        <link href="../imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" /> 
        <script src="../css/dist/sweetalert.min.js"></script>
        <script src="../js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">

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
                <div class="panel-heading">Opções de Relatórios de Manutenções</div>

                <div class="panel-body">
                	<br />
                    <form action="../../control/relatorios/relatorioManutencao.php" method="post">
						<div class="row">

		                    <div class="col-md-2 col-md-offset-1">
		                        <div class="form-group">
		                            <label><a href="formRelManuPeriodo.php" class="btn btn-info"> Por período</a></label>
		                        </div>
		                    </div>
		
		                    <div class="col-md-2">
		                        <div class="form-group">
		                            <label><a href="formRelManuEstab.php" class="btn btn-info"> Por estabelecimento</a></label>
		                        </div>
		                    </div>  
		  
		                  </div>  
                        <hr>
                	</form>
                </div> <!-- Fim Panel Body -->
   
                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
