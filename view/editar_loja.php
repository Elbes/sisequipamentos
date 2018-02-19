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
        <title>Editar Loja</title>
       
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
                $("#campoCep").mask("99999-999");
            });
        </script>

    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once '../Model/loja.php';
        include_once 'menu.php';

        $objj = new Session();
        $obj = new Loja();

        $dados = array();
        $dados = $obj->dadosLoja($_REQUEST["id_loja"]);
        ?>

        <div class="container">
            
                <div class="panel panel-primary">

                    <div class="panel-heading">Editar Loja</div>
                    <div class="panel-body">

                        <form action="../control/executar_edicao_loja.php" method="post">
                               
                            <input type="hidden" class="btn btn-primary" name="id_loja" value="<?php echo $dados[0] ?>">
                                
                            <div class="row">

                                <div class="col-md-3 col-md-offset-2">

                                    <div class="form-group">
                                        <label for="nome_cliente">Nome da loja</label>
                                        <input type="text" class="form-control" name="nome_loja" value="<?php echo $dados[1] ?>">
                                        
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="gerente">Tipo da Loja </label>
                                        <select class="dropdown form-control" name="tipo_loja">
                                             <option value="<?php echo $dados[4] ?>"><?php echo $dados[4] ?></option>
                                            <option value="Loja Própria">1 - Loja Própria</option>
                                            <option value="Revenda">2 - Revenda</option>
                                            <option value="Varejo">3 - Varejo</option>
                                        </select>

                                    </div>

                                </div>

                            </div>  

                            <div class="row">

                                <div class="col-md-5 col-md-offset-2">

                                    <div class="form-group">
                                        <label for="estado">Endereço</label>
                                        <input type="text" class="form-control text-center" name="logradouro_loja" value="<?php echo $dados[2] ?>" placeholder="Logradouro">

                                    </div>

                                </div>
                                
                                   <div class="col-md-2">

                                        <div class="form-group">
                                            <label for="estado">NÚMERO</label>
                                            <input type="text" class="form-control text-center" name="numero" value="<?php echo $dados[3] ?>" placeholder="Número">

                                        </div>

                                    </div>     
                                
                            </div>

                            <div class="row">

                                <div class="col-md-2 col-md-offset-2">

                                    <div class="form-group">
                                        <label for="estado">Cep</label>
                                        <input type="text" class="form-control" id="campoCep" name="cep_loja" value="<?php echo $dados[7] ?>" placeholder="Informe o cep">

                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="form-group">

                                        <label for="demanda">Cidade</label>

                                        <select class="dropdown form-control" name="cidade_loja">
                                            <option value="<?php echo $dados[4] ?>"><?php echo $dados[4] ?></option>
                                            <option value="Asa Norte">1 - Asa Norte</option>
                                            <option value="Asa Sul">2 - Asa Sul</option>
                                            <option value="Lago Norte">3 - Lago Norte</option>
                                            <option value="Lago Sul">4 - Lago Sul</option>
                                            <option value="Parkshopping I">5 - Parkshopping I</option>
                                            <option value="Parkshopping II">6 - Parkshopping II</option>
                                            <option value="Taguatinga">7 - Taguatinga</option>
                                            <option value="Gama">8 - Gama</option>
                                        </select>
                                     
                                    </div>

                                </div>

                                <div class="col-md-2">

                                    <div class="form-group">

                                        <label for="estado">UF</label>

                                        <select class="dropdown form-control" name="estado_loja">
                                            <option value="<?php echo $dados[5] ?>"><?php echo $dados[5] ?></option>
                                            <option value="DF">DF</option>
                                            <option value="GO">GO</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                        </select>

                                    </div>

                                </div>

                            </div>

                            <br>

                            <hr>
                            <div class="row">

                                <!-----------------------BOTOES CANCELAR SALVAR EXCLUIR --------------------------------->
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="button" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listar_loja.php'">
                                        <input type="submit" class=" btn btn-primary" name="salvar" value="SALVAR">

                                    </div>
                                      </form>
                                    <form action="../control/executar_exclusao_loja.php" method="post">     

                                        <input type="hidden" class="btn btn-primary" name="id_loja" value="<?php echo $dados[0] ?>">

                                        <div class="col-md-2 col-md-offset-5">
                                            <input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR" onclick='return confirm(\"Deseja realmente deletar?\")'>                                           
                                        </div> 
                                    </form>

                                </div>   

                                <!-----------------------BOTOES CANCELAR SALVAR EXCLUIR ---------------------------------> 

                            </div>

                      

                    </div>

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>
                </div>


        </div>

    </body>
</html>
