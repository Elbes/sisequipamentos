<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Local do Equipamento</title>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
        <link href="../imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" /> 
         <script language="JavaScript" type="text/JavaScript">
			<!--
			function abrejan(theURL,winName,features) { //v2.0
			 window.open(theURL,winName,features);
			}
			//-->
		</script> 
        <script type="text/javascript">
		    $(document).ready(function(){
		        $('#id_regiao').change(function(){
		            $('#estabelecimento').load('equipEdit.php?id_regiao='+$('#id_regiao').val());
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
        require '../../Model/UsuarioDAO.php';
        
        $tipo_perfil = $_SESSION['tipo_perfil'];
        
        $id_equipamento = $_REQUEST['id_equipamento'];
        $dao = new EquipamentoDAO();
        $daoEst = new EstabelecimentoDAO();
        $daoReg = new RegiaoDAO();
        
        foreach ($dao->pesquisar($id_equipamento) as $equip){
        		$id_estabelecimento = $equip['id_estabelecimento'];
        	
        	foreach ($daoEst->pesquisar($id_estabelecimento) as $est){
        		$id_regiao = $est['id_regiao'];
        		$nome_estab = $est['nome_estabelecimento'];
        	}
        	foreach ($daoReg->pesquisar($id_regiao) as $reg){
        		$nome_reg = $reg['nome_regiao'];
        		$num_reg = $reg['numero_regiao'];
        	}
        	
        }
        
        ?>

            <div class="panel panel-primary">
                <div class="panel-heading">Editar Local do Equipamento</div>

                <div class="panel-body">
                  Atual Região do Equipamento:<?php echo "<b> ".utf8_encode($nome_reg)."</b>"; ?> <br />Atual Estabelecimento do Equipamento:<?php echo "<b> ".utf8_encode($nome_estab)."</b>"; ?><br /><br />
                    <form action="../../control/equipamento/editar_local_equip.php" method="post">
						<input type="hidden" class="btn btn-primary" name="id_equipamento" value="<?php echo $id_equipamento?>">
                        <div class="row">
                        <?php if ($tipo_perfil == 'ADMG'){?>
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Nova Região</label>
                                    <select class="dropdown form-control" name="id_regiao" id="id_regiao" required title="Por Favor informe o Estabelecimento">
                                        <option selected="selected" value="">--Selecione--</option>
                                            <?php 
											$regiaoDao = new RegiaoDAO();
												foreach ($regiaoDao->listar() as $regiao){
													echo "<option value=".$regiao['id_regiao'].">". $regiao['numero_regiao'] ."-". utf8_decode($regiao['nome_regiao'])."</option>";
												}
		              						 ?>
                                        </select>
                                </div>    
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_estabelecimento">Novo Estabelecimento</label>
                                    <div id="estabelecimento"></div>
                                </div>    

                            </div>
                                
                            <?php }
                            	else{
                            ?>
                           
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="id_estabelecimento">Novo Estabelecimento</label>
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
													echo "<option value=".$estab_usuario['id_estabelecimento'].">". utf8_decode($estab_usuario['nome_estabelecimento'])."</option>";
												}
		              						 ?>
                                        </select>
                                </div>    
                            </div>
                            <?php }?>
                           </div>    
                        </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-10">

                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'formEditarEquipamento.php?id_equipamento=<?php echo  $id_equipamento;?>'">    
                                <input type="submit" class=" btn btn-primary" value="ALTERAR">
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>
        
    </body>
</html>
