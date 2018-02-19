<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Relatório</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
        <script src="css/dist/sweetalert.min.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/bootstrap.min.js"></script>    
        
    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once 'menu.php';

        $obj = new Session();
        ?>

        <div class="container">


            <form action="relatorio.php" method="post">


                <div class="row">

                    <div class="col-md-3 col-md-offset-1">

                        <div class="form-group">
                            <label for="data_inicial">Data Inicial </label>
                            <input type="date" class="datepicker form-control" id="datepicker" required name="data_inicial" title="Escolha a data Inicial" />

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="data_final">Data Final </label>
                            <input type="date" class="datepicker form-control" id="datepicker" required name="data_final" title="Escolha a data Final" />

                        </div>
                    </div>   

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="dropdown form-control" name="status">
                                <option value="selecione">Selecione...</option>
                                <option value="Novo">Novo</option>
                                <option value="Em progresso">Em progresso..</option>
                                <option value="Pendente">Pendente</option>
                                <option value="Concluído">Concluído</option>
                            </select>
                        </div>
                    </div>

                </div>  

                <div class="row">

                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group">
                            <label for="opcao">Pesquisar Demanda por </label>

                            <select class="dropdown form-control" name="opcao">
                                <option value="todos">Selecione...</option>
                                <option value="id_demanda">Número da Demanda</option>
                                <option value="nome_cliente">Nome do Cliente</option>
                                <option value="numero_linha">Número da Linha</option>
                                <option value="usuario">Responsável Abertura</option>
                                <option value="gerente">Gerente</option>

                            </select> 

                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="opcao" class="invisible"> Digite o Valor a ser procurado</label>

                            <input type="text" class="form-control" name="palavra" title="Escolha uma categoria e insira algum dado para realizar a busca" placeholder="Insira uma palavra" />&nbsp;

                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="opcao" class="invisible">Botao Buscar</label>
                            <br>   
                            <input type="submit" class="btn btn-primary" value="Buscar" />  

                        </div>
                    </div>
                </div>

            </form>

            <div class="row-fluid">
                <div class="panel panel-primary">
                                        
                    <div class="panel-heading">Relatório</div>
                   
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center" id="example">
                            <tr class="success">    

                                <td>DEMANDA</td>
                                <td>NOME DO CLIENTE</td>
                                <td>NUMERO DA LINHA</td>
                                <td>TIPO DE DEMANDA</td>
                                <td>DESCRIÇÃO DA DEMANDA</td>
                                <td>RESPONSAVEL ABERTURA</td>
                                <td>GERENTE</td>
                                <td>DATA ABERTURA</td>
                                <!--<td>DATA FECHAMENTO</td>-->
                                <td>RESPOSTA GERENTE</td>
                                <td>STATUS</td>
                                <td>DATA FECHAMENTO</td>
                            </tr>

                            <?php
//                            if ($_SESSION['nivel'] == 1) {

//                            $usuario = $_SESSION['nivel'];
                            if (isset($_POST['palavra']) and ( $_POST['opcao']) and ( $_POST['data_inicial']) and ( $_POST['data_final']) and ( $_POST['status'])) {
                                
                                include_once '../Model/demanda.php';

                                $data_inicial = $_POST['data_inicial'];
                                $data_final = $_POST['data_final'];
                                $palavra = $_POST['palavra'];
                                $opcao = $_POST['opcao'];
                                $status = $_POST['status'];

                                if ($opcao <> 'todos' and $palavra == "") {
                                    ?>

                                    <script> buscaerro();</script>

                                    <?php
                                } else {

                                    $obj = new Demanda();
                                    $obj->listarDemanda3($palavra, $opcao, $data_inicial, $data_final, $status);
                                }
                            }
                            ?>

                        </table>
                    </div>
                    

                    <!--</div>  Fim Panel Body -->

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>
                
    </body>
</html>
