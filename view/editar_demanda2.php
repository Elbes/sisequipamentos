<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Demanda</title>
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <script src="js/scripts.js"></script>     
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script>
            jQuery(function ($) {
                //                       $("#campoData").mask("99/99/9999");
                //                $("#campoData").mask("9999/99/99");
                $("#campoTelefone").mask("(99) 9999-9999");
                //       $("#campoSenha").mask("***-****");
            });
        </script>

    </head>
    <body>
      
            <?php
            include_once '../Model/session.php';
            include_once '../control/validalogin2.php';
            include_once '../Model/demanda.php';
            include_once 'menu.php';

            $objj = new Session();
            $obj = new Demanda();
//            $objj->validamenu();

            $dados = array();
            $dados = $obj->dadosAdmin($_REQUEST["id"]);
            ?>

            <div class="container">
                <form action="../control/executar_edicao_demanda.php" method="post">
                    <input type="hidden" name="usuario" value="<?php echo $dados[5] ?>">
                    <input type="hidden" name="data_abertura" value="<?php echo $dados[6] ?>">
                    <input type="hidden" name="data_fechamento" value="<?php echo $dados[6] ?>">
                    <div class="breadcrumb"><h4>Responsável pela abertura da Demanda: <?php echo $dados[5] ?> </h4></div>
                
            <div class="panel panel-primary">
                    <div class="panel-heading">Editar Demanda</div>
                    <div class="panel-body">

                        <input type="hidden" name="id_demanda" value="<?php echo $dados[0] ?>">
                            </form>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label for="numero_linha">Linha</label>
                                        <input type="text" class="form-control" id=campoTelefone name="numero_linha" value="<?php echo $dados[2] ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label for="nome_cliente">Nome do Cliente</label>
                                        <input type="text" class="form-control" name="nome_cliente" value="<?php echo $dados[1] ?>">
                                    </div>
                                </div>


<!--                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nome_cliente">Tipo de Demanda</label>
                                        <input type="text" class="form-control" name="tipo_demanda" value="<?php // echo $dados[3] ?>">
                                    </div>    

                                </div>-->
                                
                                  <div class="col-md-3">
                                <div class="form-group">

                                    <label for="demanda">Tipo de Demanda</label>
                                    <select class="dropdown form-control" name="tipo_demanda">
                                        <option value="<?php echo $dados[3] ?>"><?php echo $dados[3] ?></option>
                                        <option value="migrar para o pre">1 - Migração Pós para o Pré</option>
                                        <option value="migra para o controle">2 - Migração Pós para o Controle</option>
                                        <option value="desmembramento">3 - Desmembramento de Contas</option>
                                        <option value="Unir Contas">4 - Unir Contas</option>
                                        <option value="Alterar Carteira">5 - Alterar Carteira</option>
                                        <option value="Contestação">6 - Contestação</option>
                                        <option value="Desbloqueio por FRD">7 - Desbloqueio por FRD</option>
                                        <option value="Abrir Chamado">8 - Abrir Chamado</option>

                                    </select>

                                </div>

                            </div>

                                
                    <!--            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gerente">Gerente ou Responsável</label>
                                        <input type="text" class="form-control" name="gerente" value="<?php echo $dados[6] ?>">
                                    </div>    


                                </div> -->
                    
                    <div class="col-md-3">
                                <div class="form-group">

                                    <label for="gerente">GERENTE RESPONSÁVEL  </label>
                                    <select class="dropdown form-control" name="gerente">
                                        <option value="<?php echo $dados[6] ?>"><?php echo $dados[6] ?></option>
                                        <option value="Ivanilson">1 - Ivanilson</option>
                                        <option value="Acrizio">2 - Acrizio</option>
                                        <option value="Najara">3 - Najara</option>
                                    </select>

                                </div>

                            </div>
                    
                    
                    
                    

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao">Descrição da Demanda</label>
                                        <textarea class="form-control" name="obs_demanda" rows="6"><?php echo $dados[4] ?></textarea>
                                    </div>
                                </div>

                                <!---------------------------------  RESPOSTA DO GERENTE ------------------------------------------>
                                <?php
//                                if ($dados[9] == "") {
//                                if (!empty($dados[9])) {

                                $usuario = $_SESSION['username'];

                                if ($usuario == $dados[6]) {
                                    ?>

                                    <!--<div class="row">-->
                                        <div class="col-md-6">
                                            <label for="descricao">Resposta Gerente</label>
                                            <textarea class="form-control" name="obs_demanda_gerente" rows="6"><?php echo $dados[9] ?></textarea>

                                        </div>
                                    <!--</div>-->
                                   
                                <!--<div class="row">-->
                                  <div class="col-md-3">
                                    <!--Alterar Status--> 
                                    <label for="descricao">Alterar Status</label><br>
                                    <select class="dropdown form-control" name="status">
                                        <option value="0">Altere o Status..</option>
                                        <option value="Em progresso">Em progresso..</option>
                                        <option value="Pendente">Pendente</option>
                                        <option value="Concluído">Concluído</option>
                                    </select>

                                </div>
                                    
                                  <?php
                                if ($dados[3] == 'Abrir Chamado') {
                                    ?> 
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <label for="numero_chamado">Numero do Chamado</label>
                                            <input type="text" class="form-control" name="numero_chamdado" value="">
                                        </div>
                                    </div>

                                <?php } ?>   
                                    
                                    
                                    <!--</div>-->
                                

                                    <?php
                                } Else {
                                    ?>
                                    <div class="col-md-6">
                                        <label for="descricao">Resposta Gerente</label>
                                        <textarea class="form-control" name="obs_demanda_gerente" rows="6" readonly> <?php echo $dados[9] ?></textarea>

                                    </div>

                                    <?php }
                                ?>      

                                <!-------------------------------------------- RESPOSTA DO GERENTE ---------------------------------------------->                 

                            <!--<div class="row">-->
                            <br><br><br><br><br><br><br><br><br>
                                <div class="col-md-4">
                                    <!--<span class="breadcrumb text-center">Status Atual :-->
                                   <label for="descricao">Status Atual : </label>
                                    <!--<div class="bg-info text-center">-->
                                    
                                    <?php $statusAtual = $dados[10] ?>
                                    <input type="text" class="breadcrumb text-center" readonly value="<?php echo $statusAtual ?>">
                                 
                                   <!--<span class="breadcrumb" name="status" readonly><?php // echo $dados[10] ?></span>-->

                                    <!--</div>-->
                                     
                                </div>
 
                              </div> <!--fim da linha Descricao demanda -->

                            <hr>
                            <!--<a href="../control/executar_exclusao_demanda.php'><button type='button' class='btn btn-primary vertical'>EXCLUIR</button></a>"-->
                              
                            <!--<input type="button" class="btn btn-danger" value="EXCLUIR" accesskey=""onclick="window.location = '../control/executar_exclusao_demanda.php'">-->        
                            <!--<div class="row">-->
                                <div class="col-md-3">
                            <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listar_demanda.php'">
                            <input type="submit" class=" btn btn-primary" name="salvar" value="SALVAR">
                            </div>
                                         
                        <div class="col-md-8 pull-right">
                        <form action="../control/executar_exclusao_demanda.php" method="post">
                            
                            <input type="hidden" class="btn btn-primary" name="id_demanda" value="<?php echo $dados[0] ?>">
                            
                           <input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR" onclick='return confirm(\"Deseja realmente deletar?\")'>                                           

                            
                            <!--//<?php // echo "<a href='../control/executar_exclusao_demanda.php?acao=deletar&id=" . $dados[0]; ?> </a>";-->
                            
                          <?php // echo "<a href='#' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                            <?php // echo "<a href='../control/executar_exclusao_demanda.php?acao=deletar&id=" . $dados[0] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                            <!--<a href='../control/executar_exclusao_demanda.php?id=$id'><button type='button' class='btn btn-primary vertical'>EXCLUIR</button></a>";-->   
                            </form>
                            
                            
                            </div>
                    </div>
                            <!--</div>-->
                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>
                </div>
                
            </div>

        <!--</div>-->

</body>
</html>
