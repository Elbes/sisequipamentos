<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Demanda</title>
       
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
         
         include_once '../Model/session.php';
         include_once '../control/validalogin2.php';
         include_once 'menu.php';
       

        $obj = new Session();
//        $obj->validamenu();
        ?>

        <div class="container">
            
                <div class="row-fluid">
                   
                    <div class="panel panel-primary">
                                                                                                                                                                                                                                 
                        <div class="panel-heading">Listar Demandas com STATUS <span class='glyphicon  glyphicon glyphicon-arrow-right' title='Listar Demanda' aria-hidden='true'></span> NOVA <span class='glyphicon glyphicon glyphicon-minus' title='Listar Demanda' aria-hidden='true'></span> EM PROGRESSO OU PENDENTE</div>
                    <!--<div class="panel-body">-->
             
                    <div class="table-responsive">          
                    <table class="table table-bordered  table-striped text-center">
                        <thead>
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
                            <td>EDITAR</td>
                            <td>EXCLUIR</td>
                        </tr>
                        </thead>

                        <?php
                        
                       
//                        ----------------------------teste ---------------------------
                        if ($_SESSION['nivel'] == 1) {

                            include_once '../Model/demanda.php';
                            $obj = new Demanda();
                            $obj->listarDemanda();
                        } else {

                            include_once '../Model/demanda.php';
                            $obj = new Demanda();
                            $obj->listarDemanda2();
                        }
//                        ----------------------------teste ---------------------------                        
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

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
<!--                    <form action="../control/executar_listagem_demanda.php" method="post">
                    
                      <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Pesquisar Por: </label>

                                    <select class="dropdown form-control" name="categoria">
                                        
                                        <option>Selecione...</option>
                                        <option value="id_demanda">1 - Número da Demanda</option>
                                        <option value="numero_linha">2 - Número da Linha</option>
                                        <option value="gerente">3 - Gerente Responsável</option>
                                        <option value="status">4 - Status</option>
                                        
                                    </select>

                                </div>    

                            </div>
                    
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label for="Pesquisa">Pesquisa</label>
                                    <input type="text" class="form-control" name="pesquisa">
                                </div>
                            </div>

                    
                    <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">Status </label>

                                    <select class="dropdown form-control" name="status">
                                        
                                        <option>Selecione...</option>
                                        <option value="Novo">1 - Novo</option>
                                        <option value="Em Progresso">2 - Em Progresso</option>
                                        <option value="Pendente">3 - Pendente</option>
                                        <option value="Concluido">4 - Concluído</option>
                                        <option value="Todos">4 - Todos</option>
                                        
                                    </select>

                                </div>    

                            </div>
                    
                    
                     <div class="col-md-2">
                                <div class="form-group">

                                    <label for="Sobrenome">Buscar</label>
                                    <input type="submit" class="form-control btn btn-primary" name="buscar" placeholder="Buscar">Buscar</button>
                                </div>
                            </div>
                    
                        
                        </form>
                    
                        </div>  
            
            <br><br>
            <div class="row-fluid">
                <div class="panel panel-primary">
                    <div class="panel-heading">Listar Demanda</div>
                    <div class="panel-body">

                    <table class="table table-bordered text-center">
                        <tr class="success">    

                            <td>DEMANDA</td>
                            <td>NOME DO CLIENTE</td>
                            <td>NUMERO DA LINHA</td>
                            <td>TIPO DE DEMANDA</td>
                            <td>OBSERVAÇOES</td>
                            <td>RESPONSAVEL ABERTURA</td>
                            <td>GERENTE</td>
                            <td>DATA ABERTURA</td>
                            <td>DATA FECHAMENTO</td>
                            <td>RESPOSTA GERENTE</td>
                            <td>STATUS</td>
                            <td>AÇÃO</td>
                        </tr>-->

<!--
                        <?php
                                                
//                        $buscar = $_POST['buscar'];
                        
//                        $usuario = $_SESSION['nivel'];
//
//                        if ($_SESSION['nivel'] == 1) {
//
//                            include_once '../Model/demanda.php';
//                            $obj = new Demanda();
//                            $obj->listarDemanda4();
//                            
//                        } else {
//
//                            include_once '../Model/demanda.php';
//                            $obj = new Demanda();
//                            $obj->listarDemanda4();
//                        }
////                        }
                        
                        
                        ?>

                    </table>


                     </div>  Fim Panel Body 


 </div>-->
        
    </body>
</html>
