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
                <div class="panel-heading">Editar Manutenção de Equipamento</div>

                <div class="panel-body">

                    <form action="../../control/manutencao/editar_manutencao.php" method="post">
						<input type="hidden" name="id_manutencao" value="<?php echo $_REQUEST['id_manutencao']?>">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#first-tab" data-toggle="tab">Informações do equipamento</a></li>
							<li><a href="#second-tab" data-toggle="tab">Informações da Manutenção </a></li>
						</ul>
						<br />
						<div class="tab-content">
							<div class="tab-pane active in" id="first-tab">
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
		                                    <label>Serviço Solicitado</label>
		                                    <select class="dropdown form-control" name="servico_solicitado" id="servico_solicitado" title="Informe o tipo de serviço solicitado">
		                                      	<option value="<?php echo $manu['servico_solicitado'];?>"><?php echo $manu['servico_solicitado'];?></option>
		                                      	<option value="Manutenção Corretiva">Manutenção Corretiva</option>
		                                      	<option value="Manutenção Preventiva">Manutenção Preventiva</option>
		                                      	<option value="Instalação">Instalação</option>
		                                      	<option value="Calibração">Calibração</option>
											</select>
		                                  </div>
		                             </div>
		                             <div class="col-md-2">
		                                   <div class="form-group">
		                                    <label>Nº Chamado</label>
		                                    <input type="text" class="form-control" required title="Informe número do chamado" name="numero_chamado" value="<?php echo $manu['numero_chamado'];?>" placeholder="Nº Chamado/OS">
		                                  </div>
		                             </div>    
		                        </div>          
		
		                        <div class="row">
		                            <div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Local Falha</label>
		                                   <select class="dropdown form-control" name="local_falha" id="local_falha" title="Selecione onde ocorre a falha">
		                                      	<option value="<?php echo $manu['local_falha'];?>"><?php echo $manu['local_falha'];?></option>
		                                      	<option value="No Equipamento">No Equipamento</option>
		                                      	<option value="No acessório">No acessório</option>
											</select>
		                                  </div>
		                             </div>
		                             
		                              <div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Acessórios Acompanhados</label>
		                                    <input type="text" class="form-control" required title="Informe os acessórios que acompanham o equipamento" name="acessorios" value="<?php echo $manu['acessorios'];?>" placeholder="Acessórios que acompanham o equipamento">
		                                  </div>
		                             </div>
		                         </div>
		                         
	                         </div>
	                         
                             <div class="tab-pane" id="second-tab">
								<div class="row">
		                        	<div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Local da Manutenção</label>
		                                    <input type="text" class="form-control" required title="Informe o local da manutenção"  name="local_manutencao" value="<?php echo $manu['local_manutencao'];?>" placeholder="Local da manutenção">
		                                  </div>
		                             </div> 
		                             
		                         	<div class="col-md-2">
		                                   <div class="form-group">
		                                    <label>Envio a Manutenção</label>
		                                    <input type="date" class="form-control" required title="Informe da tada de envio para manutenção"  name="data_envio" value="<?php echo $manu['data_envio'];?>">
		                                  </div>
		                             </div>
		                             
		                             <div class="col-md-2">
		                                 <div class="form-group">
		                                    <label>Telefone</label>
		                                    <input type="text" class="form-control" title="Informe telefone da manutenção"  name="telefone_manutencao" value="<?php echo $manu['telefone_manutencao'];?>">
		                                  </div>
		                             </div>
		                        </div> 
		
		                        <div class="row">
		                        	<div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Nº Contrato de Manutenção</label>
		                                    <input type="text" class="form-control" required title="Informe o número do contratom de manutenção"  name="contrato_manutencao" value="<?php echo $manu['contrato_manutencao'];?>" placeholder="Número do contrato de manutenção">
		                                  </div>
		                             </div>
			                        <div class="col-md-5">
			                            <div class="form-group">
				                            <label>Grau de Necessidade</label><br />
				                            <label class="radio-inline"><input type="radio" name="grau_necessidade" value="Normal" <?php if($manu['grau_necessidade']=='Normal'){echo 'checked';}?>>Normal</label>
				                            <label class="radio-inline"><input type="radio" name="grau_necessidade" value="Urgente" <?php if($manu['grau_necessidade']=='Urgente'){echo 'checked';}?>>Urgente</label>
 				                       	 </div>
			                         </div>
		                        </div>
		                        
		                        <div class="row">
		                        	<div class="col-md-5">
		                                   <div class="form-group">
		                                    <label>Origem da Falha</label>
		                                    <select class="dropdown form-control" name="origem_falha" id="origem_falha" title="Selecione a origem da falha">
		                                      	<option value="<?php echo $manu['origem_falha'];?>"><?php echo $manu['origem_falha'];?></option>
		                                      	<option value="Erro de operação">Erro de operação</option>
		                                      	<option value="Abuso na utilização">Abuso na utilização</option>
		                                      	<option value="Falha de componente">Falha de componente</option>
		                                      	<option value="Outro">Outro (descrever abaixo) </option>
											</select>
		                                  </div>
		                             </div>
			                        <div class="col-md-5">
			                            <div class="form-group">
				                            <label>Outra Origem da Falha</label>
				                            <input type="text" class="form-control" title="Informe a origem da falha"  name="origem_falha_outro" value="<?php echo $manu['origem_falha_outro'];?>" placeholder="Origem da Falha">
				                       	 </div>
			                         </div>
		                        </div>
		                        
		                        <div class="row">
		                        	<div class="col-md-2">
			                            <div class="form-group">
				                            <label>Previsão de entrega</label>
				                            <input type="date" class="form-control" title="Informe a data prevista de entrega" value="<?php echo $manu['previsao_entrega'];?>" name="previsao_entrega">
				                       	 </div>
			                         </div>
		                        	<div class="col-lg-8">
			                            <div class="form-group" style="text-align: center">
			                            	<label>Observação</label>
			                                <textarea class="form-control" name="observacao_manutencao" rows="5" placeholder="Observações importantes"><?php echo $manu['observacao_manutencao'];?></textarea>
			                            </div> 
		                           </div>           
		                        </div>
                                 <hr />
		                        <div class="row">
			                       <div class="col-lg-12">
			                             <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'listaManutencao.php'">    
			                             <input type="submit" class=" btn btn-primary" value="ALTERAR">
			                       </div>            
			                    </div>
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
