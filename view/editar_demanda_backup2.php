<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <head>
        <meta charset="UTF-8">
        <title>Editar Demanda</title>
        <link href="css/layout.css" rel="stylesheet" type="text/css">

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

        <!--<h2 align="center"> ALTERAR DEMANDA </h2>-->
        <br>
        <form action="../control/executar_edicao_demanda.php" method="post">
            <?php
//            include_once 'menu.php';
//             include_once '../Model/demanda.php';
//        $objj = new Demanda();
//        $objj->validamenu();
//        

//            include      '../Model/admin.php';
            include_once '../Model/demanda.php';
            include_once '../Model/Session.php';
            $objj = new Session();
            $obj = new Demanda();
            $sobrenomeusuario = new Session();
//            echo $sobrenomeusuario->sobrenomeusuario();

            $objj->validamenu();
            $dados = array();
            $dados = $obj->dadosAdmin($_REQUEST["id"]);
            ?>

            <div class="container">

                <div class="row">
                    <div class="col-sm-9  col-md-10 main">
                        <h1 class="page-header">Editar Demanda</h1>
                    </div>
                    <!--<div class="btn btn-primary btn-block" href="#"></div>-->
                </div>       


                <!--<h2 class="text-left text-danger"> CADASTRAR DEMANDA </h2>-->
                <!--<hr>-->  
                <div class="container">
                    <form action="../control/executar_cadastro_demanda.php" method="post">

                        <input type="hidden" name="id_demanda" value="<?php echo $dados[0] ?>">

                        <div class="row">


                            <div class="breadcrumb">
                                <?php // echo $sobrenomeusuario
                            
//                                $dadosUsuario->dadosUsuario($dados[0]);
                                
                                
                                ?>
                                <h4>Funcionário Responsável pela abertura da Demanda: <?php echo $dados[5]?> </h4>
                                <?php // echo $usuario_completo ?>
                            </div>            

                            <div class="">

                                <div class="well-sm">
                                    <div class="col-md-6">
                                        <h4>Linha : <?php echo $dados[2] ?> </h4>
                                        <h4>Nome do Cliente : <?php echo $dados[1] ?> </h4>

                                    </div>

                                    <div class="col-md-6">
                                        <h4>Tipo de Demanda: <?php echo $dados[3] ?> </h4>
                                        <h4>Gerente Responsável : <?php echo $dados[6] ?> </h4>

                                    </div>

                                </div>
                            </div>


                        </div>


                        <div class="breadcrumb">

                            <h4>Descrição da Demanda : <?php echo $dados[4] ?> </h4>

                        </div>

                        <br>
                        Alterar Status <select name="status">
                            <option value="Em progresso">Em progresso..</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Concluído">Concluído</option>
                        </select>

                        <br><br>

                        <?php
                        if ($dados[9] == "") {
                            $usuario = $_SESSION['username'];

                            if ($usuario == $dados[6]) {
                                ?>

                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="descricao">Resposta Gerente</label>
                                        <textarea class="form-control" name="obs_demanda_gerente" rows="6"><?php echo $dados[9] ?></textarea>

                                    </div>
                                </div>   
                        </div>
                        <?php
                    }
                }

//<?php
                Else {
                    ?>

                    <div class="row">
                        <div class="col-md-7">
                            <label for="descricao">Resposta Gerente</label>
                            <textarea class="form-control" name="obs_demanda_gerente" rows="6" disabled><?php echo $dados[9] ?></textarea>

                        </div>
                    </div>
                    
                <?php
                
                
                
                } ?>




                <hr>  
                <input type="cancel" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listar_demanda.php'">
                <input type="submit" class=" btn btn-primary" value="EDITAR DEMANDA">
                <!--<button type="submit" class="btn btn-primary" value="CADASTRAR DEMANDA">Cadastrar</button>-->

                </form>

            </div>

        </div>

</body>
</html>
