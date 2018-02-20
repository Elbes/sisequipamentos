<!DOCTYPE html>
<html lang="pt-br">

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
        <script src="../js/bootstrap.min.js"></script> 

    </head>

    <body>

        <?php
        include '../../Model/session.php';
        include_once '../../Model/RegiaoDAO.php';
        include '../menu.php';

        
        $daoReg = new RegiaoDAO();
        foreach ($daoReg->pesquisar($_REQUEST['id_regiao']) as $reg){
        	$id_reg = $reg['id_regiao'];
        	$nome_regiao = utf8_decode($reg['nome_regiao']);
        	$numero_regiao = $reg['numero_regiao'];
        	$sigla = $reg['sigla_regiao'];
        	$descricao = utf8_decode($reg['descricao_regiao']);
        	
        }
        
        ?>

       <div class="container">
            <div class="row-fluid">

                <div class="panel panel-primary">
                <div class="panel-heading">Editar Região de Saúde</div>
                <div class="panel-body">

                          <form action="../../control/regiao/editar_regiao.php" method="post">      
                             <input type="hidden" name="id_regiao" value="<?php echo $id_reg; ?>"/>
		                      <div class="row">
		                           <div class="col-md-6">
		                                <div class="form-group">
		                                     <label for="nome_regiao">Nome da Região</label>
		                                     <input type="text" class="form-control" name="nome_regiao" required title="Por Favor informe o nome da Região de Saúde" placeholder="Insira o nome da Região de Saúde" value="<?php echo $nome_regiao;?>">
		                                 </div>
		
		                             </div>

                                	<div class="col-md-1">

                                        <div class="form-group">
                                              <label for="numero_regiao">NÚMERO</label>
                                              <input type="text" class="form-control text-center" name="numero_regiao" placeholder="Número" value='<?php echo $numero_regiao;?>'>
                                          </div>

                                      </div>
                                      
                                      <div class="col-md-2">

                                        <div class="form-group">
                                              <label for="sigla_regiao">Sigla</label>
                                              <input type="text" class="form-control text-center" name="sigla_regiao" placeholder="Sigla" value='<?php echo $sigla;?>'>
                                          </div>

                                      </div>  
                                  </div>
                                   
	                              <div class="row">
			                            <div class="col-md-6">
			                                <label for="descricao">Descrição da Região</label>
			                                <textarea class="form-control" name="descricao_regiao" rows="6" placeholder="Descrição breve da região, se nevessário"><?php echo $descricao;?></textarea>
			                            </div>
			                       </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'homeRegiao.php'">
                                <input type="submit" class=" btn btn-primary" value=ALTERAR>
                            </div>
                            
                        </div>

                    </form>

			  </div>
				<?php $rodape = new Session(); $rodape->footer();?>
            </div>
			</div>
        </div>

    </body>

</html>
