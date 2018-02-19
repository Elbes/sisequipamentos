<?php


# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*
$hostname_conexao = "localhost";
$database_conexao = "suprimart";
$username_conexao = "suprimart";
$password_conexao = "5upr1m4r7";
*/

$hostname_conexao = "localhost";
$database_conexao = "sdi";
$username_conexao = "root";
$password_conexao = "091190";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//include("../Model/conexao.php");
//include_once '../Model/conexao.php';
// definir o numero de itens por pagina
$itens_por_pagina = 4;

// pegar a pagina atual
@$pagina = intval($_GET['pagina']);

$sql_code = "Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) LIMIT $pagina, $itens_por_pagina";
//$sql_code = "select nome_cliente, numero_linha from demanda LIMIT $pagina, $itens_por_pagina";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
$num_total = $mysqli->query("select * from demanda")->num_rows;

// definir numero de páginas
$num_paginas = ceil($num_total/$itens_por_pagina);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Paginação</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>

  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-lg-4">
  				<h1>Demanda</h1>
  				<?php if($num > 0){ ?>
				<table class="table table-bordered table-striped text-center">
				<!--<table class="table table-bordered table-hover">-->
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
						<?php do{ ?>
						<tr>
							<td><?php echo $produto['id_demanda']; ?></td>
							<td><?php echo $produto['nome_cliente']; ?></td>
                                                        <td><?php echo $produto['numero_linha']; ?></td>
                                                        <td><?php echo $produto['tipo_demanda']; ?></td>
                                                        <td><?php echo $produto['obs_demanda']; ?></td>
                                                        <td><?php echo $produto['usuario']; ?></td>
                                                        <td><?php echo $produto['gerente']; ?></td>
                                                        <td><?php echo $produto['data_abertura']; ?></td>
                                                        <td><?php echo $produto['obs_demanda_gerente']; ?></td>
                                                        <td><?php echo $produto['status']; ?></td>
                                                        <td><?php echo $produto['data_fechamento']; ?></td>
                                                
						<?php } while($produto = $execute->fetch_assoc()); ?>
					</tbody>
				</table>

				<nav>
				  <ul class="text-center pagination pagination-sm">
				    <li>
                                        <a href="datepicker.php?pagina=0" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php 
				    for($i=0;$i<$num_paginas;$i++){
				    $estilo = "";
				    if($pagina == $i)
				    	$estilo = "class=\"active\"";
				    ?>
                                    <li <?php echo $estilo; ?> ><a href="datepicker.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
					<?php } ?>
				    <li>
                                        <a href="datepicker.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
  				<?php } ?>
  			</div>
  		</div>
  	</div>


  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="js/bootstrap.min.js"></script>
  </body>
  </html>