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
        
        <script>
            jQuery(function ($) {
                $("#valor_total").maskMoney({prefix:'R$ ', thousands:'.',decimal:','});

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
        
        $daoManu = new ManutencaoDAO();
        $daoEquip = new EquipamentoDAO();
        
       foreach ($daoManu->pesquisar($_REQUEST['id_manutencao']) as $manu){
       	$id_equipamento = $manu['id_equipamento'];
       	foreach ($daoEquip->pesquisar($id_equipamento) as $equip){
       	}
       
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Fechar Manutenção de Equipamento</div>

                <div class="panel-body">

                    <form action="../../control/manutencao/fechar_manutencao.php" method="post">
						<input type="hidden" name="id_manutencao" value="<?php echo $_REQUEST['id_manutencao']?>">
						<br />
		                        <div class="row">
		                          <div class="col-md-5">
		                                <div class="form-group">
		                                    <label>Equipamento</label>
		                                    <input type="text" class="form-control" disabled name="nome_equipamento" value="<?php echo $equip['nome_equipamento'];?>">
		                                </div>
		                            </div>
		
		                            <div class="col-md-2">
		                                <div class="form-group">
		                                    <label>Nº do patrimônio</label>
		                                    <input type="text" class="form-control" disabled  name="num_patrimonio" value="<?php echo $equip['num_patrimonio'];?>">
		                                </div>
		                            </div>
		                            <div class="col-md-2">
		                                <div class="form-group">
		                                    <label>Nº de série</label>
		                                    <input type="text" class="form-control" disabled name="num_serie" value="<?php echo $equip['num_serie'];?>">
		                                </div>
		                            </div>
		                          </div>
		                          
		                          <div class="row">
		                            <div class="col-md-5">
		                                <div class="form-group">
		                                    <label>Fabricante</label>
		                                    <input type="text" class="form-control" disabled name="fabricante" value="<?php echo $equip['fabricante'];?>">
		                                </div>
		                            </div>
		
		                             <div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Modelo</label>
		                                    <input type="text" class="form-control" disabled  name="modelo_equip" value="<?php echo $equip['modelo_equip'];?>">
		                                  </div>
		                             </div>
		                          </div>
		                          
		                          <div class="row">
		                          	<div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Falha relatada</label>
		                                    <input type="text" class="form-control" required title="Informe a falha relatada pela manutenção" name="falha_relatada" placeholder="Falha relatada pela manutenção">
		                                  </div>
		                             </div>
		                             
		                         	<div class="col-md-2">
		                                <div class="form-group">
		                                    <label>Data de entraga</label>
		                                    <input type="date" class="form-control" required title="Informe a data da devolução do equipamento" name="data_entrega" placeholder="Data de entrega">
		                                  </div>
		                             </div>
		                             <div class="col-md-4">
		                                   <div class="form-group">
		                                    <label>Recebido por</label>
		                                    <input type="text" class="form-control" required title="Informe nome de quem recebeu" name="recebido_por" placeholder="Nome de quem recebeu">
		                                  </div>
		                             </div>    
		                        </div>          
		
		                        <div class="row">
		                            <div class="col-md-4">
		                               <div class="form-group">
		                                    <label>Serviço realizado</label>
		                                    <select class="dropdown form-control" name="servico_realizado" id="servico_realizado" title="Selecione o serviço realizado na manutenção">
		                                      	<option value="">--Selecione--</option>
		                                      	<option value="Integral">Integral</option>
		                                      	<option value="Parcial">Parcial</option>
		                                      	<option value="Não atendido">Não atendido </option>
											</select>
		                                  </div>
		                             </div>
		                             
		                             <div class="col-md-3" style="left: 100px;">
			                            <div class="form-group">
				                            <label>Pendência</label><br />
				                            <label class="radio-inline"><input type="radio" name="pendencia" onclick="$('#pendencia').show();"  value="Sim">Sim</label>
				                            <label class="radio-inline"><input type="radio" name="pendencia" onclick="$('#pendencia').hide();" value="Não">Não</label>
 				                       	 </div>
			                         </div>
			                         
			                         <div id="pendencia" style="display:none;">
				                         <div class="col-md-4">
			                                 <div class="form-group">
			                                    <label>Descrição da Pendência</label>
			                                    <input type="text" class="form-control" title="Informe qual a pendência" name="descricao_pendencia" placeholder="Descrição da Pendência">
			                                  </div>
			                             </div>
			                         </div>
		                         </div>
		                         
		                         <div class="row">
		                             <div class="col-md-4">
			                            <div class="form-group">
				                            <label>Houve troca de peça?</label><br />
				                            <label class="radio-inline"><input type="radio" name="troca_peca" onclick="$('#peca').show();"  value="Sim">Sim</label>
				                            <label class="radio-inline"><input type="radio" name="troca_peca" onclick="$('#peca').hide();" value="Não">Não</label>
 				                       	 </div>
			                         </div>
			                         
			                         <div id="peca" style="display:none;">
				                         <div class="col-md-4" style="left: 100px;">
			                                 <div class="form-group">
			                                    <label>Peça trocada</label>
			                                    <input type="text" class="form-control" title="Informe a peça trocada"  name="peca_trocada" placeholder="Peça trocada">
			                                  </div>
			                             </div>
			                         </div>
		                         </div>
		                         
		                         <div class="row">
		                             <div class="col-md-3">
                                   		<div class="form-group">
                                    		<label>Valor de total da manuteção</label>
                                    		<input type="text" class="form-control" required title="Informe o valor da manutenção" id="valor_total" name="valor_total" placeholder="Valor manutenção">
                                  		</div>
                             		</div>
                             		
                             		<div class="col-md-3">
			                            <div class="form-group">
				                            <label>Vencimento Garantia do(s) Serviço(s)</label>
				                            <input type="date" class="form-control" title="Informe a data de vencimento da garantia"  name="venc_garantia_servico">
				                       	 </div>
			                         </div>
		                         </div>
		                         
		                        <div class="row">
		                        	<div class="col-lg-10">
			                            <div class="form-group" style="text-align: center">
			                            	<label>Observação</label>
			                                <textarea class="form-control" name="observacao_fechamento" rows="5" placeholder="Observações importantes / Número de série da nova peça"></textarea>
			                            </div> 
		                           </div>           
		                        </div>
                                 <hr />
		                        <div class="row">
			                       <div class="col-lg-12">
			                             <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'listaManutencao.php'">    
			                             <input type="submit" class="btn btn-primary" value="ENVIAR" />
			                       </div>            
			                    </div>	                      
                    </form>
				<?php }?>
                </div> <!-- Fim Panel Body -->
   
                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
