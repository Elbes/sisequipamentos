<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Usuário</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="js/scripts.js"></script>     
        
    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once 'menu.php';
        include_once '../Model/admin.php';
        
            
        $obj = new Session();
       
        ?>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">Cadastrar Usuário</div>

                <div class="panel-body">

                    <form action="../control/executar_cadastro.php" method="post">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Nome do Gerente">Nome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o nome do Usuario" name="nome_usuario" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" required title="Por Favor informe o sobrenome do Usuario" name="sobrenome_usuario" placeholder="Sobrenome">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="matricula">Matrícula</label>
                                    <input type="text" class="form-control" name="matricula" required title="Por Favor informe a Matrícula do Usuario" placeholder="Informe a Matrícula">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Nivel</label>

                                    <select class="dropdown form-control" name="nivel" required title="Por Favor informe o Nível do Usuário">
                                        <option>Selecione...</option>
                                        <option value="1">1 - Administrador</option>
                                        <option value="2">2 - Usuário</option>

                                    </select>

                                </div>    

                            </div>
                        </div>       

                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required title="Por Favor informe o email do Usuario" placeholder="Email">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="senha_usuario">Senha</label>
                                    <input type="password" class="form-control" name="senha" required title="Por Favor informe a senha do Usuario" placeholder="Senha">
                                </div>    

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <!--<input type="text" class="form-control" name="cargo" placeholder="Cargo">-->

                                    <select class="dropdown form-control" name="id_cargo" required title="Por Favor informe o cargo do Usuario">
                                        <?php 
                                        
                                        $obj = new Admin();
                                        $obj->listarCargo();
                                        
                                        ?>

                                    </select>

                                </div>    

                            </div>

                            <input type="hidden" name="status_usuario" value="Ativo" />
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_loja">Estabelecimento</label>
                                    
                                    <select class="dropdown form-control" name="id_loja">
                                        <?php 
//                                        include_once '../Model/loja.php';
//                                        $obj = new Admin();
                                        $obj->listarLoja();
                                        
                                        ?>

                                    </select>

                                </div>    

                            </div>
                                                        
                             </div>
                        
                        
                        <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                            <label for="data_cadastro">Data Cadastro</label>
                            
                            <?php $data = date('Y/m/d'); ?>
                            
                            <input type="text" class="form-control text-center" value="<?php echo date('d/m/Y');?>" readonly>

                            <input type="hidden" name="data_cadastro" value="<?php echo $data; ?>"/>

                       </div>
                             </div>
                      
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-12">

                                <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'home.php'">    
                                <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                            </div>            
                        </div>                    

                    </form>

                </div> <!-- Fim Panel Body -->

                <?php $rodape = new Session(); $rodape->footer();?>
            </div>

        </div>
        
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>     
        <script src="js/jquery.maskedinput.js"></script>

    </body>
</html>
