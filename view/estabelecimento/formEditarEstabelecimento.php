<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Editar Estabelecimento</title>
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
        <script>
            jQuery(function ($) {
                //   $("#campoData").mask("99/99/9999");
                //   $("#campoData").mask("9999/99/99");
                $("#campoTelefone").mask("(99) 9999-9999");
                $("#campoCep").mask("99999-999");
            });
        </script>

    </head>

    <body>

        <?php
        include '../../Model/session.php';
        include '../../Model/RegiaoDAO.php';
        include_once '../../control/validalogin2.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../../Model/TipoEstabDAO.php';
        include_once '../../resources/funcoes.php';
        include '../menu.php';

        $obj = new Session();
//        $obj->validamenu();
       //$usuario = $_SESSION['nome'];
        
        
        $obj = new EstabelecimentoDAO();
        foreach ($obj->pesquisar($_REQUEST['id_estabelecimento']) as $key){
        	$id_estabelecimento = $key['id_estabelecimento'];
        	$nome_estabelecimento = $key['nome_estabelecimento'];
        	$numero_estabelecimento = $key['numero_estabelecimento'];
        	$id_tipo_estabelecimento = $key['id_tipo_estabelecimento'];
        	$id_regiao = $key['id_regiao'];
        	$cidade = $key['cidade_estabelecimento'];
        }
       
        $tipo_estab = tipoEstab($id_tipo_estabelecimento);
        ?>

        <div class="container">

            <div class="panel panel-primary">

                <div class="panel-heading">Editar Estabelecimento</div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-offset-2">

                            </div>

                                    <form action="../../control/estabelecimento/editar_estab.php" method="post">      
										<input type="hidden" name="id_estabelecimento" value="<?php echo $id_estabelecimento; ?>"/>
                                        <div class="row">
                                        	
                                        	<div class="col-md-5 col-md-offset-2">
                                                <div class="form-group">
                                                    <label for="cidade_estabelecimento">Cidade</label>
                                                    <input type="text" class="form-control" name="cidade_estabelecimento" placeholder="Insira a cidade do estabelecimento" value='<?php echo $cidade; ?>'>
                                                </div>

                                            </div>


                                            <div class="col-md-2">

                                                <div class="form-group">
                                                    <label for="numero_estabelecimento">NÚMERO</label>
                                                    <input type="text" class="form-control text-center" name="numero_estabelecimento" placeholder="Número" value='<?php echo $numero_estabelecimento; ?>'>
                                                </div>

                                            </div>       

                                        </div>  

                                        
                                        
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">

                                    <div class="form-group">
                                        <label for="nome_estabelecimento">Nome do Estabelecimento</label>
                                        <input type="text" class="form-control" name="nome_estabelecimento" required title="Por Favor informe o nome do estabelecimento" placeholder="Insira o nome do estabelecimento" value="<?php echo $nome_estabelecimento;?>">
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipo_estabelecimento">Tipo de Estabelecimento</label>
                                        <select class="dropdown form-control" name="id_tipo_estabelecimento" required>
                                            <option value="<?php echo $id_tipo_estabelecimento;?>"><?php echo $tipo_estab;?></option>
                                            <?php 
												$tipoEstab= new TipoEstabDAO();
												foreach ($tipoEstab->listar() as $estab){
													echo "<option value=".$estab['id_tipo_estabelecimento'].">". $estab['tipo']."</option>";
												}
		              						 ?>
                                        </select>
                                    </div>

                                </div>

                            </div> 
                            
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">

                                    <div class="form-group">                                     
                                        <label for="regiao_estabelecimento">Região</label>
                                        <select class="dropdown form-control" name="id_regiao" required>
                                            <option value="<?php echo $id_regiao;?>"><?php echo utf8_encode(regEstab($id_regiao)); ?></option>
                                            <?php 
											$regiaoDao = new RegiaoDAO();
												foreach ($regiaoDao->listar() as $regiao){
													echo "<option value=".$regiao['id_regiao'].">". $regiao['numero_regiao'] ."-". utf8_encode($regiao['nome_regiao'])."</option>";
												}
		              						 ?>
                                        </select>
                                    </div>

                                </div>

                            </div> 
                
                        <hr>
                        <div class="row">

                            <div class="col-md-6">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listaEstabelecimento.php'">
                                <input type="submit" class=" btn btn-primary" value="ALTERAR">
                            </div>
                        </div>

                    </form>

                	</div>
				</div>
				<?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>

    </body>

</html>
