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
                $("#campoData").mask("99/99/9999");
                $("#valor_aquisicao").maskMoney({prefix:'R$ ', thousands:'.',decimal:','});
                //$("#valor_aquisicao").mask('', {reverse: true});
                
                //                $("#campoData").mask("9999/99/99");
                //$("#campoTelefone").mask("(99) 9999-9999");
                //       $("#campoSenha").mask("***-****");
            });
            
        </script>
        <script type="text/javascript">
		    $(document).ready(function(){
		        $('#id_regiao').change(function(){
		            $('#estabelecimento').load('equipamento.php?id_regiao='+$('#id_regiao').val());
		        });
		    });
    	</script>
    
    </head>
    <body>

        <?php
        include_once '../../resources/funcoes.php';
        include_once '../../Model/session.php';
        include_once '../../control/validalogin2.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../../Model/EquipamentoDAO.php';
        include_once '../menu.php';
        
        $id_equipamento = $_REQUEST['id_equipamento'];
                
        $daoEst = new EstabelecimentoDAO();
        $daoReg = new RegiaoDAO();
        $daoEquip = new EquipamentoDAO();
        foreach ($daoEquip->pesquisar($id_equipamento) as $equip){
        	$id_estabelecimento = $equip['id_estabelecimento'];
        	$cadastro = $equip['dhs_cadastro'];
        	$date = new DateTime($cadastro);
        	
        	
        	foreach ($daoEst->pesquisar($id_estabelecimento) as $est){
        		$id_regiao = $est['id_regiao'];
        		$nome_estab = $est['nome_estabelecimento'];
        		$num_estab = $est['numero_estabelecimento'];
        	}
        	foreach ($daoReg->pesquisar($id_regiao) as $reg){
        		$nome_reg = $reg['nome_regiao'];
        		$num_reg = $reg['numero_regiao'];
        	}
        
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Editar Equipamento</div>

                <div class="panel-body">

                    <form action="../../control/equipamento/editar_equip.php" method="post">
                    <input type="hidden" name="id_equipamento" value="<?php echo $id_equipamento;?>">
                        <div class="row">
                          <div class="col-md-5">
                                <div class="form-group">
                                    <label>Equipamento</label>
                                    <input type="text" class="form-control" required title="Informe o nome do equipamento" value="<?php echo utf8_decode($equip['nome_equipamento']); ?>" name="nome_equipamento" placeholder="Nome Equipamento">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nº do patrimônio</label>
                                    <input type="text" class="form-control" required title="Informe o número de patrimônio" value="<?php echo $equip['num_patrimonio']; ?>" name="num_patrimonio" placeholder="Patrimônio">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nº de série</label>
                                    <input type="text" class="form-control" required title="Informe o número de patrimônio" value="<?php echo $equip['num_serie']; ?>" name="num_serie" placeholder="Nº Série">
                                </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Fabricante</label>
                                    <input type="text" class="form-control" required title="Informe o nome do fabricante" value="<?php echo utf8_decode($equip['fabricante']); ?>" name="fabricante" placeholder="Fabricante">
                                </div>
                            </div>

                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="text" class="form-control" title="Informe o modelo do equipamento" value="<?php echo utf8_decode($equip['modelo_equip']); ?>" name="modelo_equip" placeholder="Modelo Equipamento">
                                  </div>
                             </div>
                          </div>
                          
                          <div class="row">
                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" required title="Informe a marca do equipamento" value="<?php echo utf8_decode($equip['marca_equip']); ?>" name="marca_equip" placeholder="Marca Equipamento">
                                  </div>
                             </div>
                             
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tensão (volts)</label>
									<input type="text" class="form-control" title="Informe a tensão" value="<?php echo $equip['tensao_equip'];?>" name="tensao_equip" placeholder="Tensão do equipamento">
                                 </div>
                            </div>
                        </div>
                        
                        <div class="row">
                             <div class="col-md-5">
                                <div class="form-group">
                                    <label>Potência (watts)</label>
									<input type="text" class="form-control" title="Informe a potência" value="<?php echo $equip['potencia_equip'];?>" name="potencia_equip" placeholder="Potência do equipamento">
                                 </div>
                            </div>
                            
                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Executor Contrato</label>
                                    <input type="text" class="form-control" title="Informe o executor" value="<?php echo $equip['executor_contrato']; ?>" name="executor_contrato" placeholder="Executor do contrato">
                                  </div>
                             </div>    
                        </div>        

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Estabelecimento Instalação</label>
                                    <input type="text" class="form-control" required title="Estabeleciemnto" disabled value="<?php echo $num_estab." - ".$nome_estab; ?>">
                                </div>
                            </div>        

                            <div class="col-md-5">
                                <div class="form-group">
                               <a data-toggle="modal"  class="btn btn-primary" href="formAlteraLocalEquip.php?id_equipamento=<?php echo  $id_equipamento?>" data-target="#modalEstab" title="Alterar o Estabelecimento"><i class="icon-zoom-in"></i> Alterar o Estabelecimento</a>
                                </div>    
                            </div>
                         </div>       

                        <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Setor</label>
                                    <input type="text" class="form-control" required title="Informe o setor de instalação" value="<?php echo utf8_decode($equip['setor_instalacao']);?>" name="setor_instalacao" placeholder="Setor de instalação">
                                  </div>
                             </div>
                             
                              <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Responsável pelo setor</label>
                                    <input type="text" class="form-control" title="Informe o nome do responsável pelo setor" value="<?php echo utf8_decode($equip['responsavel_setor']);?>" name="responsavel_setor" placeholder="Responsável pelo setor">
                                  </div>
                             </div>
                         </div>
                         
                         <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" title="Informe o telefone do setor" value="<?php echo $equip['telefone_setor'];?>" name="telefone_setor" placeholder="Telefone do setor">
                                  </div>
                             </div>
                             
                              <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Ramal</label>
                                    <input type="text" class="form-control" title="Informe o ramal do setor" value="<?php echo $equip['ramal_setor'];?>" name="ramal_setor" placeholder="Ramal do setor">
                                  </div>
                             </div>
                         </div>
                         
                         <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Assistência técnica </label>
                                    <input type="text" class="form-control" title="Informe a assitência técnica" value="<?php echo $equip['assistencia_tec'];?>" name="assistencia_tec" placeholder="Assitência Téc.">
                                  </div>
                             </div>
                             
                              <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Tel. Assist. técnica </label>
                                    <input type="text" class="form-control" title="Informe o telefone da assistência técnica" value="<?php echo $equip['tel_assistencia_tec'];?>" name="tel_assistencia_tec" placeholder="Telefone da assistência">
                                  </div>
                             </div>
                         </div>          

                         <div class="row">
                         	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Recursos</label><br />
                                    <label class="radio-inline"><input type="radio" name="recursos" value="Próprio" <?php if($equip['recursos']=='Próprio'){echo 'checked';}?>>Próprio</label>
									<label class="radio-inline"><input type="radio" name="recursos" value="Comodato" <?php if($equip['recursos']=='Comodato'){echo 'checked';}?>>Comodato</label>
									<label class="radio-inline"><input type="radio" name="recursos" value="Doação" <?php if($equip['recursos']=='Doação'){echo 'checked';}?>>Doação</label>
                                  </div>
                             </div>
                               
                             <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Valor de Aquisição</label>
                                    <input type="text" class="form-control" title="Informe o valor de aquisição" value="<?php echo $equip['valor_aquisicao'];?>" id="valor_aquisicao" name="valor_aquisicao" placeholder="Valor">
                                  </div>
                             </div>   
                        </div> 
                        
                        <div class="row">
                        	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Vencimento da garantia </label>
                                    <input type="date" class="form-control" title="Informe da tada de vencimento da garantia" value="<?php echo $equip['vencimento_garantia'];?>" name="vencimento_garantia">
                                  </div>
                             </div> 
                             
                         	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Contrato de Manutenção</label><br />
                                    <label class="radio-inline"><input type="radio" name="contrato_manutencao" value="Sim" <?php if($equip['contrato_manutencao']=='Sim'){echo 'checked';}?>>Sim</label>
									<label class="radio-inline"><input type="radio" name="contrato_manutencao" value="Não" <?php if($equip['contrato_manutencao']=='Não'){echo 'checked';}?>>Não</label>
                                  </div>
                             </div>
                        </div> 
                        
						<div class="row">
                        	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Nº da nota fiscal</label>
                                    <input type="text" class="form-control" title="Informe o número da nota fiscal" value="<?php echo $equip['numero_nota_fiscal'];?>" name="numero_nota_fiscal" placeholder="Número da nota fiscal">
                                  </div>
                             </div> 
                             
                         	<div class="col-md-3">
                                   <div class="form-group">
                                    <label>Data da Aquisicao </label>
                                    <input type="date" class="form-control" title="Informe da Aquisição" value="<?php echo $equip['data_aquisicao'];?>" name="data_aquisicao">
                                  </div>
                             </div>
                        </div> 
                        
                        <div class="row">
                        	<div class="col-md-5">
                                <div class="form-group">
                                    <label>Possui Manual técnico?</label>
									<select class="dropdown form-control" name="manual_tecnico" title="Informe se possui manual técnico">
                                        <option value="<?php echo $equip['manual_tecnico'];?>"><?php echo $equip['manual_tecnico'];?></option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                 </div>
                            </div>
                            
                           <div class="col-md-3">
	                            <div class="form-group">
		                            <label>Data Cadastro</label>
		                            <input type="text" disabled class="form-control" name="dhs_cadastro" value="<?php echo $date->format('d/m/Y H:i:s');?>"/>
		                       	 </div>
	                         </div>
                         </div> 

                        <hr />
                        
                        <div class="row">
                        	<div class="col-lg-10">
	                            <div class="form-group" style="text-align: center">
	                            	<label>RELAÇÃO DO MATERIAL ENTREGUE COM O EQUIPAMENTO</label>
	                                <textarea class="form-control" name="material_entregue" rows="5" placeholder="Material / Quantidade / Código / Descrição do material"><?php echo $equip['material_entregue'];?></textarea>
	                            </div> 
                           </div>           
                        </div> 
                        <hr />
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'listaEquipamento.php'">    
                                <input type="submit" class=" btn btn-primary" value="ALTERAR">
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php } $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
        
                <!-- Janela Modal -->
    <div class="modal fade" id="modalEstab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-body">
                
                
                <div class="te"></div></div>
    
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    </body>
</html>
