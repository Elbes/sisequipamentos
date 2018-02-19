<html>
    <head>
       <title>Listar Demanda</title>

       <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DataTables example - Zero configuration</title>
	<!--        
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
        <script src="css/dist/sweetalert.min.js"></script>
        <script src="js/bootstrap.min.js"></script>   
     -->
        
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<!--	<style type="text/css" class="init">
	
	</style>-->
	<script type="text/javascript" src="/media/js/site.js?_=1d77a229585e4e41d9224d51ea376cc6"></script>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	
    </head>
    <body>
          <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';
        include_once 'menu.php';
//
//        $obj = new Session();
        ?>
        
        <script type="text/javascript" class="init">

        $(document).ready(function() {
                $('#example').DataTable();
        } );

	</script>
        <div class="container">

            <form action="datepicker2.php" method="post">

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
        
        <table id="example" class="table table-bordered table-striped table-condensed text-center">
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
                                <td>DATA FECHAMENTO</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
//                          
                             include_once '../Model/demanda.php';
                            $obj = new Demanda();
                            $obj->listarDemanda33();
                            
                            ?>
                                </tbody>
            
    </table>
     </div>
                      

                    <!--</div>  Fim Panel Body -->

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>   
</body>
</html>
