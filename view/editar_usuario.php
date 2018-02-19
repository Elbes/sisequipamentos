<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<meta charset="UTF-8">-->
        <title>Editar Usuário</title>
        
         <link href="css/bootstrap.css" rel="stylesheet">
         <link href="css/style.css" rel="stylesheet">
         <script src="css/dist/sweetalert.min.js"></script>
         <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
         <script src="js/jquery-1.11.3.min.js"></script>
         <script src="js/jquery.maskedinput.js"></script>
         <script src="js/bootstrap.min.js"></script>    
         <script src="js/scripts.js"></script> 
                
        <script>
            jQuery(function ($) {
                //                       $("#campoData").mask("99/99/9999");
                //                $("#campoData").mask("9999/99/99");
                $("#campoTelefone").mask("(99) 9999-9999");
                $("#campoChamado").mask("9999999");
                //       $("#campoSenha").mask("***-****");
            });
        </script>

        <script>
            function confirmExcluir($id_usuario)
            {
                swal({
                    title: "Excluir",
                    text: "Confirma a exclusão?",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!',
                    closeOnConfirm: false
                }, function () {
                    window.location.href = 'executar_exclusao_usuario.php?id_usuario=' + $id_usuario;
                });
            }
        </script>

    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once '../Model/admin.php';
        include_once 'menu.php';

        $objj = new Session();
        $obj = new Admin();
        $dados = array();
        $dados = $obj->dadosAdmin($_REQUEST["id_usuario"]);
        ?>

        <div class="container">
            <form action="../control/executar_edicao_usuario.php" method="post">

                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Usuário</div>
                    <div class="panel-body">

                        <input type="hidden" name="id_usuario" value="<?php echo $dados[0] ?>">
                        <input type="hidden" name="data_cadastro" value="<?php echo $dados[7] ?>">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Nome Usuario">Nome</label>
                                    <input type="text" class="form-control" name="nome_usuario" value="<?php echo $dados[1] ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="sobrenome_usuario">Sobrenome</label>
                                    <input type="text" class="form-control" name="sobrenome_usuario" value="<?php echo $dados[2] ?>">
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <!--<input type="text" class="form-control" name="cargo" placeholder="Cargo">-->
                                    <?php
//                                          
                                    ?>
                                    <select class="dropdown form-control" name="id_cargo">

                                        <?php
                                        $obj2 = new Admin();
                                        $cargo = $dados[3];

                                        $obj2->listar_CargoAtual($cargo);
                                        ?>


                                        <?php
                                        $obj->listarCargo();
                                        ?>

                                    </select>

                                </div> 
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Matrícula</label>
                                        
                                  <input type="text" class="form-control" name="matricula" placeholder="Matricula com A00" value="<?php echo $dados[10] ?>">

                                </div>   

                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $dados[5] ?>">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="text" class="form-control" name="senha" placeholder="Senha" value="<?php echo $dados[6] ?>">
                                </div>

                            </div>
                            <!-----------------------inserir a loja aqui-------------------------->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_loja">Loja</label>

                                    <select class="dropdown form-control" name="id_loja">

                                        <?php
                                        $obj = new Admin();
                                        $id_loja = $dados[9];

                                        $obj2->listar_LojaAtual($id_loja);
                                        ?>

                                        <?php
                                        $obj->listarLoja();
                                        ?>

                                    </select>

                                </div>    

                            </div>
                            <!-----------------------inserir a loja aqui-------------------------->

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="data_cadastro">Data Cadastro</label>
                                    <?php
                                    $data = $dados[7];
                                    $data = implode("/", array_reverse(explode("-", $data)));
                                    ?>

                                    <input type="text" class="form-control" readonly placeholder="data do cadastro" value="<?php echo $data ?>">
                                </div>

                            </div>

                            <div class="col-md-3">
                                <!--<div class="form-group">-->
                                <label for="descricao">Alterar Status</label><br>
                                <select class="dropdown form-control" name="status_usuario">
                                    <option value=<?php echo $dados[8]; ?>><?php echo $dados[8]; ?></option>
                                    <option value="0">Selecione o Status...</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Desativo">Desativo</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Nivel</label>

                                    <select class="dropdown form-control" name="nivel">
                                        <option><?php echo $dados[4] ?></option>
                                        <option>Selecione...</option>
                                        <option value="1">1 - Administrador</option>
                                        <option value="2">2 - Usuário</option>

                                    </select>

                                </div>   

                            </div>
                            
                                                        
                            <!--</div>-->
                            <br><br><br><br><br>
                            <div class="col-md-3">
                                <label for="descricao">Status Atual : </label>
                                <span class="breadcrumb" readonly><?php echo $dados[8] ?></span>

                            </div>

                            <br><br><br><br><br><br><br><br><br>

                        </div>
                        <!-----------------------BOTOES CANCELAR SALVAR EXCLUIR --------------------------------->
                        <div class="row">
                            <div class="col-md-5">
                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listar_usuario.php'">
                                <input type="submit" class=" btn btn-primary" name="salvar" value="SALVAR">

                            </div>

                            </form>

                            <form action="../control/executar_exclusao_usuario.php" method="post">     

                                <?php $id_usuario = $dados[0]; ?>
                                <input type="hidden" class="btn btn-primary" name="id_usuario" value="<?php echo $id_usuario ?>">

                                <div class="col-md-2 col-md-offset-5">

                                    <input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR">
                                </div> 

                            </form>

                        </div>   

                    </div>

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>
                </div>
        </div>

    </body>
</html>
