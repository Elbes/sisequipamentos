<!DOCTYPE html>
<html lang="pt-br">

    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->

    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Loja</title>
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
        include '../Model/session.php';
        include_once '../control/validalogin2.php';
        include 'menu.php';

        $obj = new Session();
//        $obj->validamenu();
        $usuario = $_SESSION['username'];
        ?>

        <div class="container">

            <div class="panel panel-primary">

                <div class="panel-heading">Cadastrar Loja</div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-offset-2">

                            <div class="form-group">

                                <form action="" method="get">
                                    <label for="cep">Cep</label>
                                    <?php $cep = "" ?>
                                    <input type="text" name="cep" id="campoCep" required title="Insira um CEP" placeholder=" Informe o cep"/>&nbsp;<input type="submit" class="btn-primary" value="Buscar" />
                                    <!--<input type="text" class="form-control" name="cep" placeholder="Informe o cep" value="<?php // echo $cep  ?>"><input type="submit" class="btn-primary" value="Buscar" />-->
<!--                                     <input type="text" class="form-control" id="campoCep" name="cep" placeholder="Informe o cep">-->

                            </div>

                        </div>

                        <!--                                        <div class="col-md-2">
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <input class="blockquote-reverse" type="submit" value=" Buscar CEP" />
                                                                        <label for="estado">Cep</label>
                                                                        <input type="text" class="form-control" id="campoCep" name="cep_loja" placeholder="Informe o cep">
                                                                        <input type="submit" value="Buscar CEP" />
                                                                    </div>
                        
                                                                </div>-->
                        </form>

                    </div>

                    <?php
                    if (isset($_GET['cep'])) {

                        $cep = filter_input(INPUT_GET, 'cep');

//                                  $cep = preg_replace( '#[^0-9]#', '', $cep );
                        $cep = str_replace("-", "", $cep);

                        if (empty($cep)) {
                            echo 'informe o CEP';
                        } else {

                            if (is_numeric($cep) && strlen($cep) == 8) {
                                $xml = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?cep={$cep}&formato=xml");
                                if ($xml->resultado > 0) {
                                    ?>

                                    <form action="../control/executar_cadastro_loja.php" method="post">      

                                        <div class="row">

                                            <div class="col-md-5 col-md-offset-2">

                                                <div class="form-group">
                                                    <label for="estado">Endereço</label>
                                                    <input type="text" class="form-control text-center" name="logradouro_loja" placeholder="Logradouro" value='<?php echo "$xml->logradouro"; ?>'>

                                                </div>

                                            </div>   

                                            <div class="col-md-2">

                                                <div class="form-group">
                                                    <label for="estado">NÚMERO</label>
                                                    <input type="text" class="form-control text-center" name="numero" placeholder="Número" value='<?php echo "$xml->numero"; ?>'>

                                                </div>

                                            </div>       

                                        </div>  

                                        <div class="row">

                                            <div class="col-md-3 col-md-offset-2">

                                                <div class="form-group">

                                                    <label for="cidade">Cidade</label>

                                                    <input type="text" class="form-control" name="cidade_loja" readonly placeholder="Insira a Cidade" value='<?php echo "$xml->cidade"; ?>'>

                                                </div>

                                            </div>

                                            <div class="col-md-2">

                                                <div class="form-group">

                                                    <label for="estado">UF</label>


                                                    <input type="text" class="form-control" name="estado_loja" readonly value='<?php echo "$xml->uf"; ?>'>

                                                </div>

                                            </div>

                                            <div class="col-md-2">

                                                <div class="form-group">

                                                    <label for="estado">CEP</label>


                                                    <input type="text" class="form-control" name="estado_loja" readonly value='<?php echo $cep ?>'>

                                                </div>

                                            </div>

                                        </div>
                                        <?php
//                                                echo "Estado: <strong>" . $xml->uf . "</strong> \n";
//                                                echo "Cidade: <strong>" . $xml->cidade . "</strong> \n";
//                                                echo "Bairro: <strong>" . $xml->bairro . "</strong> \n";
//                                                echo "Rua: <strong>" . $xml->logradouro . "</strong> \n";
                                    } else {
                                        echo "O CEP <strong>{$cep}</strong> não foi encontrado!";
                                    }
                                } else {
                                    echo "O CEP <strong>{$cep}</strong> é inválido!";
                                }
                            }
                            
                            @$logradouro_loja = $xml->logradouro;
                            @$numero = $xml->numero;
                            @$cidade_loja = $xml->cidade;
                            @$uf_loja = $xml->uf;
                            ?>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">

                                    <div class="form-group">
                                        <label for="nome_cliente">Nome da loja</label>
                                        <input type="text" class="form-control" name="nome_loja" required title="Por Favor informe o nome da loja" placeholder="Insira o nome da loja">
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="gerente">Tipo da Loja </label>
                                        <select class="dropdown form-control" name="tipo_loja">
                                            <option value="selecione">Selecione...</option>
                                            <option value="Loja Própria">1 - Loja Própria</option>
                                            <option value="Revenda">2 - Revenda</option>
                                            <option value="Varejo">3 - Varejo</option>
                                        </select>

                                    </div>

                                </div>

                            </div>  
                    <?php } ?>

                        <br>

                        <input type="hidden" name="logradouro_loja" value='<?php echo @"$xml->logradouro"; ?>'>
                        <input type="hidden" name="cidade_loja" value='<?php echo @"$xml->cidade"; ?>'>
                        <input type="hidden" name="estado_loja" value='<?php echo @"$xml->uf"; ?>'>
                        <input type="hidden" name="cep_loja" value='<?php echo "$cep"; ?>'>
                        <!--<input type="hidden" name="numero" value='<?php // echo "$numero"; ?>'>-->                               
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

    </body>

</html>
