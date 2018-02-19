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
        <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
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
        include_once '../menu.php';
        $tipo_perfil = $_SESSION['tipo_perfil'];
        
       
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Cadastrar Equipamento</div>

                <div class="panel-body">

                    <form action="../../control/equipamento/cadastrar_equip.php" method="post">

                        <div class="row">
                          <div class="col-md-5">
                                <div class="form-group">
                                    <label>Equipamento</label>
                                    <input type="text" class="form-control" required title="Informe o nome do equipamento" name="nome_equipamento" placeholder="Nome Equipamento">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nº do patrimônio</label>
                                    <input type="text" class="form-control" required title="Informe o número de patrimônio" name="num_patrimonio" placeholder="Patrimônio">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nº de série</label>
                                    <input type="text" class="form-control" required title="Informe o número de patrimônio" name="num_serie" placeholder="Nº Série">
                                </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Fabricante</label>
                                    <input type="text" class="form-control" required title="Informe o nome do fabricante" name="fabricante" placeholder="Fabricante">
                                </div>
                            </div>

                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="text" class="form-control" title="Informe o modelo do equipamento" name="modelo_equip" placeholder="Modelo Equipamento">
                                  </div>
                             </div>
                          </div>
                          
                          <div class="row">
                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" required title="Informe a marca do equipamento" name="marca_equip" placeholder="Marca Equipamento">
                                  </div>
                             </div>
                             
                             <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tensão (volts)</label>
									<input type="text" class="form-control" title="Informe a tensão"  name="tensao_equip" placeholder="Tensão do equipamento">
                                 </div>
                            </div>
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Potência (watts)</label>
									<input type="text" class="form-control" title="Informe a potência"  name="potencia_equip" placeholder="Potência do equipamento">
                                 </div>
                             </div>
                            
                             <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Executor Contrato</label>
                                    <input type="text" class="form-control" title="Informe o executor" name="executor_contrato" placeholder="Executor do contrato">
                                  </div>
                             </div>    
                        </div>       

                        <div class="row">
	                        <?php if ($tipo_perfil == 'ADMG'){?>
	                        	<div class="col-md-5">
	                                <div class="form-group">
	                                    <label for="cargo">Região de instalação</label>
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
	                                    <label for="id_estabelecimento">Estabelecimento de Instalação</label>
	                                    <div id="estabelecimento"></div>
	                                </div>    
	
	                            </div>
	                                
	                            <?php }
	                            	else{
	                            ?>
	                           
	                            <div class="col-md-5">
	                                <div class="form-group">
	                                    <label for="id_estabelecimento">Estabelecimento de Instalação</label>
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
      

                        <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Setor</label>
                                    <input type="text" class="form-control" required title="Informe o setor de instalação" name="setor_instalacao" placeholder="Setor de instalação">
                                  </div>
                             </div>
                             
                              <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Responsável pelo setor</label>
                                    <input type="text" class="form-control" title="Informe o nome do responsável pelo setor" name="responsavel_setor" placeholder="Responsável pelo setor">
                                  </div>
                             </div>
                         </div>
                         
                         <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" title="Informe o telefone do setor" name="telefone_setor" placeholder="Telefone do setor">
                                  </div>
                             </div>
                             
                              <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Ramal</label>
                                    <input type="text" class="form-control" title="Informe o ramal do setor" name="ramal_setor" placeholder="Ramal do setor">
                                  </div>
                             </div>
                         </div>
                         
                         <div class="row">
                            <div class="col-md-5">
                                   <div class="form-group">
                                    <label>Assistência técnica </label>
                                    <input type="text" class="form-control" title="Informe a assitência técnica" name="assistencia_tec" placeholder="Assitência Téc.">
                                  </div>
                             </div>
                             
                              <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Tel. Assist. técnica </label>
                                    <input type="text" class="form-control" title="Informe o telefone da assistência técnica" name="tel_assistencia_tec" placeholder="Telefone da assistência">
                                  </div>
                             </div>
                         </div>          

                         <div class="row">
                         	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Recursos</label><br />
                                    <label class="radio-inline"><input type="radio" name="recursos" value="Próprio">Próprio</label>
									<label class="radio-inline"><input type="radio" name="recursos" value="Comodato">Comodato</label>
									<label class="radio-inline"><input type="radio" name="recursos" value="Doação">Doação</label>
                                  </div>
                             </div>
                               
                             <div class="col-md-3">
                                   <div class="form-group">
                                    <label>Valor de Aquisição</label>
                                    <input type="text" class="form-control" title="Informe o valor de aquisição" id="valor_aquisicao" name="valor_aquisicao" placeholder="Valor">
                                  </div>
                             </div>   
                        </div> 
                        
                        <div class="row">
                        	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Vencimento da garantia </label>
                                    <input type="date" class="form-control" title="Informe da tada de vencimento da garantia"  name="vencimento_garantia">
                                  </div>
                             </div> 
                             
                         	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Contrato de Manutenção</label><br />
                                    <label class="radio-inline"><input type="radio" name="contrato_manutencao" value="Sim">Sim</label>
									<label class="radio-inline"><input type="radio" name="contrato_manutencao" value="Não">Não</label>
                                  </div>
                             </div>
                        </div> 
                        
						<div class="row">
                        	<div class="col-md-5">
                                   <div class="form-group">
                                    <label>Nº da nota fiscal</label>
                                    <input type="text" class="form-control" title="Informe o número da nota fiscal"  name="numero_nota_fiscal" placeholder="Número da nota fiscal">
                                  </div>
                             </div> 
                             
                         	<div class="col-md-3">
                                   <div class="form-group">
                                    <label>Data da Aquisição </label>
                                    <input type="date" class="form-control" title="Informe a data de aquisição"  name="data_aquisicao">
                                  </div>
                             </div>
                        </div> 
                        
                        <div class="row">
                        	<div class="col-md-5">
                                <div class="form-group">
                                    <label>Possui Manual técnico?</label>
									<select class="dropdown form-control" name="manual_tecnico" title="Informe se possui manual técnico">
                                        <option value="">Selecione...</option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                 </div>
                            </div>
                           
	                        <div class="col-md-3">
	                            <div class="form-group">
		                            <label for="data_cadastro">Data Cadastro</label>
		                            
		                            <?php $data = date('Y/m/d'); ?>
		                            
		                            <input type="text" class="form-control text-center" value="<?php echo date('d/m/Y');?>" readonly>
		
		                            <input type="hidden" name="data_cadastro" value="<?php echo $data; ?>"/>
		
		                       	 </div>
	                         </div>
                        </div>
                        <hr />
                        
                        <div class="row">
                        	<div class="col-lg-10">
	                            <div class="form-group" style="text-align: center">
	                            	<label>RELAÇÃO DO MATERIAL ENTREGUE COM O EQUIPAMENTO</label>
	                                <textarea class="form-control" name="material_entregue" rows="5" placeholder="Material / Quantidade / Código / Descrição do material"></textarea>
	                            </div> 
                           </div>           
                        </div> 
                        <hr />
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey="" onclick="window.location = 'homeEquipamento.php'">    
                                <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
    </body>
</html>
