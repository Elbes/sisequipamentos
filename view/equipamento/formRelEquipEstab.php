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
                <div class="panel-heading">Relatório de Equipamentos por Estabelecimento</div>

                <div class="panel-body">

                    <form action="../../control/equipamento/relatorioequipEstab.php" method="post">
		                <div class="row">

		                    <div class="col-md-3 col-md-offset-1">
		                        <div class="form-group">
		                            <label for="data_inicial">Data Inicial </label>
		                            <input type="date" class="datepicker form-control" id="datepicker" name="data_inicial" title="Escolha a data Inicial" />
		                        </div>
		                    </div>
		
		                    <div class="col-md-3">
		                        <div class="form-group">
		                            <label for="data_final">Data Final </label>
		                            <input type="date" class="datepicker form-control" id="datepicker" name="data_final" title="Escolha a data Final" />
		                        </div>
		                    </div>
		                </div>
		                <div class="row">
	                        <?php if ($tipo_perfil == 'ADMG'){?>
	                        	<div class="col-md-5 col-md-offset-1">
	                                <div class="form-group">
	                                    <label for="cargo">Região do Equipamento</label>
	                                    <select class="dropdown form-control" name="id_regiao" id="id_regiao" required title="Por Favor informe o Estabelecimento">
	                                        <option selected="selected" value="">--Selecione--</option>
	                                            <?php 
												$regiaoDao = new RegiaoDAO();
													foreach ($regiaoDao->listar() as $regiao){
														echo "<option value=".$regiao['id_regiao'].">". $regiao['numero_regiao'] ."-". utf8_encode($regiao['nome_regiao'])."</option>";
													}
			              						 ?>
	                                        </select>
	                                </div>    
	                            </div>
	                            
	                            <div class="col-md-5">
	                                <div class="form-group">
	                                    <label for="id_estabelecimento">Estabelecimento do Equipamento</label>
	                                    <div id="estabelecimento"></div>
	                                </div>    
	
	                            </div>
	                                
	                            <?php }
	                            	else{
	                            ?>
	                           
	                            <div class="col-md-5">
	                                <div class="form-group">
	                                    <label for="id_estabelecimento">Estabelecimento do Equipamento</label>
	                                    <select class="dropdown form-control" name="id_estabelecimento" id="id_estabelecimento" required title="Por Favor informe o estabelecimento">
	                                        <option selected="selected" value="">--Selecione--</option>
	                                            <?php 
	                                            $id_estab_sessao = $_SESSION['id_estabelecimento'];
	                                            $estab = new EstabelecimentoDAO();
	                                            foreach ($estab->pesquisar($id_estab_sessao) as $key){
	                                            	$id_regiao_usuario = $key['id_regiao'];
	                                            }
	                                            $estab_regiao = new EstabelecimentoDAO();
	                                            foreach ($estab_regiao->pesquisarIdRegiao($id_regiao_usuario) as $estab_usuario){
														echo "<option value=".$estab_usuario['id_estabelecimento'].">". utf8_encode($estab_usuario['nome_estabelecimento'])."</option>";
													}
			              						 ?>
	                                     </select>
	                                </div>    
	                            </div>
	                            <?php }?>
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
