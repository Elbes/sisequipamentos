<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <head>

         <?php include 'constant.php' ?>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" />
        
    </head>

    <body class="body_login">

        <div class="fundo2">
            <div class="container">

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel2 panel-default">
                            <!--<div class="breadcrumb2"><strong class="">Login</strong></div>-->
                            <div class="breadcrumb"><strong class="">Login</strong></div>


                            <div class="panel-body">
                                <form action="../control/autenticar.php" method="post" class="form-horizontal" role="form">

                                    <div class="form-group">
                                        <label for="matricula" class="col-sm-3 control-label">Matrícula</label>

                                        <div class="col-sm-9">
                                            <!--<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required="">-->
                                            <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matricula" required title="Insira a Matr�cula incluindo">
                                            <!--<input type="text" name="nome_usuario" class="form-control" id="inputEmail3" placeholder="Matricula com A00" required title="Insira a Matrícula incluindo o A00">-->
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Senha</label>
                                        <div class="col-sm-9">
                                            <input type="password"  name="senha"  class="form-control" id="inputPassword3" placeholder="Senha" required title="Por Favor insira a Senha.">
                                        </div>
                                    </div>

                                    <div class="row" id="linhamenu"></div>

                                        <div class="col-xs-3 col-sm-9 col-xs-offset-3 col-sm-offset-3">

                                            <!--<ul class="nav nav-tabs" >-->

                                                <a href="" data-toggle="modal" data-target="#myModal">Esqueceu sua senha?</a>
                                                <br><br>

                                        <!--</ul>-->

                                        </div>

                                                    <div class="form-group last">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-success2 btn-sm">Entrar</button>
                                                            <button type="reset" class="btn btn-default btn-sm">Limpar</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                               
                                            </div>
                            
                           
                             <div class="breadcrumb2 text-center"> <strong class="">Solicite Registro ao seu Gerente</strong> </div>        
                                                    <!--<div class="breadcrumb">Solicite Registro ao seu Gerente</div>-->
                                                    <!--<a href="#" class="">Registre-se Aqui</a>-->
                               

                                    </div>
                            </div>
                            </div>
                            </div>
                            
                
                   <!-- Modal -->

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="breadcrumb2 bg-info text-center" id="myModalLabel">Recuperação de Senha</h4>

                                                    </div>
                                                     
                                                    <div class="modal-body">
                                                        
                                                         <form action="../control/executar_recuperacao_senha.php" method="post">            

                                                        <div class="col-md-6">

                                                                  
                                                            <div class="form-group">

                                                                <!--<form action="../control/executar_recuperacao_senha.php" method="post">-->                 
                                                         
                                                                    <label for="email">Informe seu Email cadastrado</label>
                                                                    <input type="email" class="form-control" name="email" required title="Por Favor informe o email do Usuario" placeholder="Email">
                                                                       
                                                                    
                                                                    <!--<input type="submit" class="btn btn-primary" value="Enviar">-->
                                                                    
                                                                
                                                                    </div>

                                                                    </div>    
                                                                        
                                                                <div class="modal-footer">
                                                                  
                                                               <input type="submit" class="btn btn-primary" value="Enviar">
                                                                    <!--<button type="submit" class="btn btn-default" data-dismiss="modal">ENVIAR</button>-->

                                                                </div>   
                                                                        
                                                                </form>     
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--modal modal--> 

                            <script src="js/jquery-1.11.3.min.js"></script>
                            <!-- Include all compiled plugins (below), or include individual files as needed -->
                            <script src="js/bootstrap.min.js"></script>
                            </body>
                            </html>