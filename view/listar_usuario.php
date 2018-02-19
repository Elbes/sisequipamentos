<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Usuário</title>
        <!--<link href="css/layout.css" rel="stylesheet" type="text/css">-->
        <!--<link href="/view/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="/view/css/bootstrap.css" rel="stylesheet">
        <link href="/view/css/style.css" rel="stylesheet">
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
                    <div class="panel-heading">Listar Usuário</div>
                    <!--<div class="panel-body">-->

                    <!--<table class="table table-bordered text-center">-->
                    <div class="table-responsive">
                    <table class="table table-bordered  table-striped text-center">
                        <tr class="success">    

                            <!--<td>ID USUÁRIO</td>-->
                            <td>MATRÍCULA</td>
                            <td>NOME COMPLETO</td>
                            <td>CARGO</td>
                            <td>NÍVEL</td>
                            <td>EMAIL</td>
                            <td>LOJA</td>
                            <td>DATA CADASTRO</td>
                            <td>STATUS USUÁRIO</td>
                            <td>EDITAR</td>
                            <td>EXCLUIR</td>
                     
                        <?php
                        
                          include_once '../Model/admin.php';
                            $obj = new Admin();
                            $obj->listarDadosUsuario();
                        ?>

                    </table>
                            </div>

                    <!--</div>  Fim Panel Body -->

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>     
        <script src="js/jquery.maskedinput.js"></script>
    </body>
</html>
