<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Lojas</title>

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
                $("#campoCep").mask("99999-999");
            });
        </script>

        
        
    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once 'menu.php';

        $obj = new Session();
        ?>

        <div class="container">

            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Listar Lojas</div>
                   
                    <div class="table-responsive">          
                        <table class="table table-bordered  table-striped text-center">
                            <thead>
                                <tr class="success">    

                                    
                                    <td>NOME LOJA</td>
                                    <td>LOGRADOURO</td>
                                    <td>NUMERO</td>
                                    <td>TIPO LOJA</td>
                                    <td>CIDADE</td>
                                    <td>ESTADO</td>
                                    <td>CEP</td>
                                    <td>EDITAR</td>
                                    <td>EXCLUIR</td>
                                    
                                </tr>
                            </thead>

                            <?php
                            include_once '../Model/loja.php';
                            $obj = new Loja();                            
                            $obj->listarLoja()
                            ?>
                            
                            <!--<input type='text' id='campoCep' value='<?php // echo $obj->listarLoja() ?>'>-->
                           <!--<input type="text" class="form-control" id="campoTelefone" name="numero_linha" value="<?php // echo $dados[2] ?>">-->        
                        </table>

                    </div>

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>

    </body>
</html>
