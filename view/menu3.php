
        <div class="container">
            
            <header class="toposdi">
                <div class="row">
                    <div class="col-md-6">
                        <!--<div class="container">-->
                            <h3 class="textobranco text-left text-center">SIGEP - SISTEMA DE GERENCIAMENTO DE EQUIPAMENTO</h3>
                        <!--</div>-->
                    </div>
                    <div class="col-md-5 col-xs-5">
                        <?php
                         //include_once '../Model/demanda.php';
                         //include_once '../Model/session.php';
        
                       // session_start();
                        $usuario = $_SESSION['nome_usuario'];
                        $tipo_perfil = $_SESSION['tipo_perfil'];

                        ?>

                        <h4 class="textobranco pull-right">Bem Vindo(a), <?php echo strtoupper($usuario); ?></h4>
                    </div>

                </div>
        <!--</div>-->
    </header>


<!--Fixed navbar--> 
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                
            </div>
            <div id="navbar" class="navbar-collapse collapse pull-left">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/view/home.php">Home</a></li>
                <?php
                if ($tipo_perfil == 'ADMG'){
                 ?>   
                         <li><a href="/sisequipamentos/view/usuario/listaUsuario.php">Usuário</a></li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="/sisequipamentos/view/regiao/listaRegiao.php"><span class="glyphicon glyphicon-plus" title="Cadastrar Região" aria-hidden="true"></span> Região</a></li>
                                   <li role="separator" class="divider"></li>
        						   <li><a href="/sisequipamentos/view/tipo_estabelecimento/listaTipoEstabelecimento.php"><span class="glyphicon glyphicon-plus" title="Cadastrar Tipo de Estabelecimento" aria-hidden="true"></span> Tipo de Estabelecimento</a></li>
                                   <li role="separator" class="divider"></li>
                                   <li><a href="/sisequipamentos/view/estabelecimento/listaEstabelecimento.php"><span class="glyphicon glyphicon-plus" title="Cadastrar Estabelecimento" aria-hidden="true"></span> Estabelecimento</a></li>
        						   <li role="separator" class="divider"></li>
        						   <li><a href="/sisequipamentos/view/equipamento/listaEquipamento.php"><span class="glyphicon glyphicon-plus" title="Cadastrar Equipamento" aria-hidden="true"></span> Equipamento</a></li>
                               </ul>
                           </li>
                    
                	<?php 	} 	if ($tipo_perfil == 'NUCLEO'){  ?>
                           <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                                <ul class="dropdown-menu">
        							<li><a href="/sisequipamentos/view/equipamento/listaEquipamento.php"><span class="glyphicon glyphicon-plus" title="Cadastrar Equipamento" aria-hidden="true"></span> Equipamento</a></li>
                                </ul>
                           </li>
                	<?php	}  ?>
                           
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manutenção <span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                   <li><a href="/sisequipamentos/view/manutencao/listaManutencao.php"><span class="glyphicon glyphicon-search" title="Cadastrar Demanda" aria-hidden="true"></span> Manutenções Abertas</a></li>
                               </ul>
                           </li>
                           
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="/sisequipamentos/view/manutencao/formOpRelatorioManutencao.php"><span class="glyphicon glyphicon-download" title="" aria-hidden="true"></span> Manutenções</a></li>
                                   <li role="separator" class="divider"></li>
        						               <li><a href="/view/equipamento/formRelatorioEquip.php"><span class="glyphicon glyphicon-download" title="" aria-hidden="true"></span> Equipamentos</a></li>
                                   <li role="separator" class="divider"></li>
                                   <li><a href="/sisequipamentos/view/usuario/formRelatorioUsuario.php"><span class="glyphicon glyphicon-download" title="" aria-hidden="true"></span> Usuário</a></li>
        						   
                               </ul>
                           </li>
                
                   <li><a href="#" onclick="swal({   title: 'Sair?', type: 'warning', text:'Tem certeza que deseja realmente Sair?',  showCancelButton: true,   confirmButtonColor: '#DD6B55',confirmButtonText: 'SAIR', cancelButtonText: 'CANCELAR', closeOnConfirm: false}, function(){window.location.href = '/sisequipamentos/view/logout.php';});">Encerrar Sessão</a></li>
                
              </ul>
                
            </div> 
              
          </div>
        </nav>
        <br> 
           
        </div>