<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Usuários</title>

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <script src="../js/bootstrap.min.js"></script>    
        <script src="../js/filtro.js"></script>
        <link href="../imagens/bisturi.png" rel="shortcut icon" type="image/x-icon" /> 

	<style type="text/css">
	
	/* " Para o input */
    .input-search{
        border:1px solid #CCC;
        padding:5px 40px;
        font-size:12px;
        margin:10px 0;
        position:relative;
		left:50%;
 
        -webkit-border-radius:15px;
           -moz-border-radius:15px;
            -ms-border-radius:15px;
             -o-border-radius:15px;
                border-radius:15px;
    }
     .input-search::-webkit-input-placeholder{ font-style:italic }
        .input-search:-moz-placeholder          { font-style:italic }
        .input-search:-ms-input-placeholder     { font-style:italic }
	</style>
        
        
    </head>
    <body>

        <?php
        include_once '../../Model/session.php';
        include_once '../../Model/RegiaoDAO.php';
        include_once '../../Model/UsuarioDAO.php';
        include_once '../../Model/EstabelecimentoDAO.php';
        include_once '../../control/validalogin2.php';
        include_once '../menu.php';
        
        $itens_por_pagina = 10;
        // pegar a pagina atual
        @$pagina = intval($_GET['pagina']);
        
        $dao = new UsuarioDAO();
        
        foreach ($dao->listar() as $key){
        	$num ++;
        }
        // definir numero de páginas
        $num_paginas = ceil($num/$itens_por_pagina);
        ?>

        <div class="container">
			<input type="button" class="btn btn-primary" value="CADASTRO" accesskey=""onclick="window.location = 'formUsuario.php'" title="Cadastrar novo Usuário">
            <div class="row-fluid">

                <div class="panel panel-primary">
                    <div class="panel-heading">Usuários Cadastrados
                    	<input type="text" style="color: black;" size="35" class="input-search" alt="table-responsive" placeholder="Buscar" />
                    	
                     </div>
                   
                    <div class="table-responsive">
                           <?php if($num > 0){ ?>   
                        <table class="table table-bordered  table-striped text-center" >
                            <thead>
                                <tr class="success">    
                                    
                                    <th width="40px" style="text-align: center">MATRICULA</th>
                                    <th style="text-align: center">NOME</th>
                                    <th style="text-align: center">EMAIL</th>
                                    <th style="text-align: center">ESTABELECIMENTO</th>
                                    <th style="text-align: center">STATUS</th>
                                    <th style="text-align: center">EDITAR</th>
                                    <th style="text-align: center">EXCLUIR</th>
                                    
                                </tr>
                           
                            </thead>
                            <tbody>

                            <?php
                           
                            
                            $obj = new UsuarioDAO(); 
                            foreach ($obj->listarPag($pagina, $itens_por_pagina) as $key){
                            	$id_usuario = $key['id_usuario'];
                            	$matricula = $key['matricula'];
                            	$nome = $key['nome_usuario'];
                            	$email = $key['email'];
                            	$id_estabelecimento = $key['id_estabelecimento'];
                            	$status = $key['status_usuario'];
                            	
                            	
                            	$estabelecimento = nomeEstab($id_estabelecimento);
                            	
                            	echo "
                            	<tr>
                            	 
                            	<td width='30px'>$matricula</td>
                            	<td width='200px'>$nome</td>
                            	<td width='100px'>$email</td>
                            	<td>$estabelecimento</td>
                            	<td width='30px'>$status</td>
                            	 
                            	 
                            	<form method='post' action='formEditarUsuario.php'>
                            		<input type='hidden' class='btn btn-primary' name='id_usuario' value='$id_usuario'>
                            		<td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                            	</form>
                            	<form method='post' action='../control/usuario/executar_exclusao_usuario.php'>
                            		<input type='hidden' class='btn btn-primary' name='id_regiao' value=>
                            		<td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
                            	</form>";
                            	
                            	}
                            	?>
                       </tbody>
                        </table>
						  
                    <nav>
				  			<ul class="text-center pagination pagination-sm">
						    	<li>
				                   <a href="listaUsuario.php?pagina=0" aria-label="Previous">
								        <span aria-hidden="true">&laquo;</span>
								      </a>
								    </li>
								    <?php 
								    for($i=0;$i<$num_paginas;$i++){
								    $estilo = "";
								    if($pagina == $i)
								    	$estilo = "class=\"active\"";
								    ?>
				                                    <li <?php echo $estilo; ?> ><a href="listaUsuario.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
									<?php } ?>
								    <li>
				                                        <a href="listaUsuario.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
								        <span aria-hidden="true">&raquo;</span>
								      </a>
								    </li>
							  </ul>
						</nav>
						<?php } ?>
                    </div>
                 
					
                    <?php $rodape = new Session(); $rodape->footer();?> 

                </div>
            </div>
        </div>

    </body>
</html>
