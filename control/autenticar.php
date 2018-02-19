<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

    </head>
    <body>
<?php

echo "<script src='../view/css/dist/sweetalert.min.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='../view/css/dist/sweetalert.css'>";
echo "<script src='../view/js/scripts.js'></script>";


require_once '../Model/UsuarioDAO.php';
require_once '../Model/UsuarioVO.php';
require_once '../resources/funcoes.php';
require_once '../Model/PerfilDAO.php';

//Recebe variáveis de acesso ao sistema
$matricula = $_POST['matricula'];
$senha = md5($_POST['senha']);

$cont = 0;
$aut = new UsuarioDAO();

foreach ($aut->fazerLogin($matricula) as $login){
	$id_usuario = $login['id_usuario'];
	$nome = $login['nome_usuario'];
	$sobrenome = $login['sobrenome_usuario'];
	$matricula_banco = $login['matricula'];
	$senha_banco = $login['senha'];
	$id_perfil = $login['id_perfil'];
	$id_estabelecimento = $login['id_estabelecimento'];

	$cont ++;
}

$perfil = new PerfilDAO();
foreach ($perfil->pesquisar($id_perfil) as $dados_perfil){
	$id_perfil = $dados_perfil['id_perfil'];
	$nome_perfil = $dados_perfil['nome_perfil'];
	$tipo_perfil = $dados_perfil['tipo_perfil'];
	
}

if($cont == 1){
	if ($matricula == $matricula_banco){
		
		if($senha == $senha_banco){
			session_start();
			$_SESSION['nome_usuario'] = $nome;
			$_SESSION['sobrenome_usuario'] = $sobrenome; 
			$_SESSION['id_usuario'] = $id_usuario;
			$_SESSION['tipo_perfil'] = $tipo_perfil;
			$_SESSION['nome_perfil'] = $nome_perfil;
			$_SESSION['id_perfil'] = $id_perfil;
			$_SESSION['id_estabelecimento'] = $id_estabelecimento;
			
			if ($tipo_perfil != ''){
				echo "<script language='javascript'>";
				echo "window.location.href='../view/home.php'";
				echo "</script>";
			}else
			{
				echo "Sem perfil";
			}
	
		   }else {
                ?>
                <script>
                    
                    senhaInvalida();
//                    alert("Senha Inválida");
//                    window.location = "../index.php";
                </script>
                <?php

            } 
		
			}
		else {
			    ?>
			 <script>
                 loginInvalido();
//                alert("Login Inválido");
//                window.location = "../index.php";
            </script>
			       <?php
			
			        }
			}
	else{
	   ?>
	   <script>
            usuarioNaoCadastrado();
//            alert("Usuario não cadastrado");
//            window.location = "../index.php";
        </script>
		<?php
 }
?>

    </body>
</html>
