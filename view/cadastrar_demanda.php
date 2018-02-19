<!DOCTYPE html>
<html lang="pt-br">

    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->

    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Demanda</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/bootstrap.min.js"></script>     
        
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
        
        include '../Model/session.php';
        include_once '../control/validalogin2.php';
        include 'menu.php';
        
        
        $obj = new Session();
//        $obj->validamenu();
        $usuario = $_SESSION['username'];
        $id_usuario = $_SESSION['id_usuario'];
        ?>
        
        <div class="container">

            <div class="panel panel-primary">

                <div class="panel-heading">Criar Demanda</div>
                <div class="panel-body">

                    <form action="../control/executar_cadastro_demanda.php" method="post">

                        <div class="row">

                            <div class="col-md-3 col-md-offset-3">

                                <div class="form-group">
                                    <label for="nome_cliente">Nome do Cliente</label>
                                    <input type="text" class="form-control" name="nome_cliente" placeholder="Insira o nome completo do Cliente">
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="numero_linha">Linha</label>
                                    <input type="text" class="form-control" id="campoTelefone" name="numero_linha" placeholder="Numero da Linha">
                                </div>
                            </div>   

                        </div>  

                        <div class="row">

                            <div class="col-md-3 col-md-offset-3">
                                <div class="form-group">

                                    <label for="demanda">Tipo de Demanda</label>
                                    <select class="dropdown form-control" name="id_tipoDemanda">
                                        
                                        <option value="selecione">Selecione...</option>
                                        
                                        <?php 
                                        
                                        $obj = new Demanda();
                                        $obj->listar_TipoDemanda();
                                        
                                        ?>
                                        
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="gerente">GERENTE RESPONSÁVEL  </label>
                                    <select class="dropdown form-control" name="gerente">
                                        <option value="selecione">Selecione...</option>
                                        <option value="Ivanilson">1 - Ivanilson</option>
                                        <option value="Acrizio">2 - Acrizio</option>
                                        <option value="Najara">3 - Najara</option>
                                    </select>

                                </div>

                            </div>
                        </div>

                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                        <!--<input type="hidden" name="usuario" value="<?php // echo $usuario; ?>">-->

                        <?php // echo $id_usuario; ?>
                        
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <label for="descricao">Descrição da Demanda</label>
                                <textarea class="form-control" name="obs_demanda" rows="6"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="Novo">

                        <input type="hidden" name="obs_demanda_gerente" value="">

                        <br>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <?php
                                //Recebe a data atual, definimos como Sao paulo para que seja pegada a data do Brasil, para nao correr o risco de pegar do Japao
//	 date_default_timezone_set('America/Sao_Paulo');
// //Joga a data em uma variavel Chamada data 
//         $data = date('d/m/Y H:i:s');
                                ?>

                                <label for="data_abertura">Data de Abertura</label>  
                                <?php $data = date('Y/m/d'); ?>

                                <input type="text" class="form-control text-center" value="<?php echo date('d/m/Y'); ?>" readonly>

                                <input type="hidden" class="text-center" name="data_abertura" value="<?php echo $data; ?>">
                            </div>
                        </div>
                        <input type="hidden" name="data_fechamento" value="">
                        <input type="text" class="invisible" name="numero_chamado" value="">

                        <hr>
                        <div class="row">

                            <div class="col-md-6">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'home.php'">
                                <!--<input type="reset" class="btn btn-primary" value="LIMPAR">-->
                                <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                                <!--<button type="submit" class="btn btn-primary" value="CADASTRAR DEMANDA">Cadastrar</button>-->        
                            </div>
                        </div>

                    </form>

                </div>

                <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>
            </div>

        </div>

        <!--                
                                        <div class="form-group">
                                            <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                                            <input type="file" id="ejemplo_archivo_1">
                                            <p class="help-block">Ejemplo de texto de ayuda.</p>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Activa esta casilla
                                            </label>
                                        </div>
        -->

    </body>

</html>
