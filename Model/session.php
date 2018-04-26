<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');
class Session {
	
     public function validamenu() {
      
        $adm = 1;

        if ($_SESSION['nivel'] == $adm) {

            $menu = include '../view/menu.php';
            return $menu;

        } else {
            $menu = include '../view/menu2.php';
            return $menu;
        }
    }
        
 public function usuarioMenu(){
     
        $usuario = $_SESSION['nome_usuario'];
        
       return $usuario; 
    }
    
  public function nivelUsuario(){
//        $nivel = $tabela->nivel;
        $nivel = $_SESSION['nivel'];
        
       return $nivel; 
    }
      
    public function nomeusuario(){
     
        $nomeusuario = $_SESSION['nome_usuario'];
        
       return $nomeusuario; 
    }
    
    public function sair(){
        $_SESSION = array ();  //Verifica as variaveis de sessoes criadas
        session_unset ();  //Apaga as variaveis de sessao
        session_destroy (); //Destroi as variaveis de sessao
        
        session_write_close(); 

	echo"<script> location.href = ('../index.php') </script>"; //Retorna para o index
        
    }
    
    public function boasVindas(){
        
        $usuario = $_SESSION['nome_usuario'];
        $sobrenome = $_SESSION['sobrenome_usuario'];
        //// Formato 24 horas (de 1 a 24)
        date_default_timezone_set('America/Sao_Paulo');
$hora = date('G');
if (($hora >= 0) AND ($hora < 6)) {
$mensagem = " Boa madrugada!!";
} else if (($hora >= 6) AND ($hora < 12)) {
$mensagem = " Bom dia!!";
} else if (($hora >= 12) AND ($hora < 18)) {
$mensagem = " Boa tarde!";
} else {
$mensagem = " Boa noite!!";
}
setlocale(LC_ALL, 'portuguese');
//echo strftime('%A');
echo "Brasília, " . utf8_encode(strftime('%A' . ", " . '%d ' . "de " . '%B ' . "de " . '%Y' . " - "));
                  
echo $mensagem . ", " . utf8_decode($usuario) . " " . utf8_decode($sobrenome);

        
    }    
      public function footer(){
      	date_default_timezone_set('America/Sao_Paulo');
      	echo "<div class='panel-footer'> Data ". date("d/m/Y")." <h5 class='pull-right' id='demo'></h5></div> ";
      }
          
} 

function regiaoId($regiao){
	$regiaoId = new RegiaoDAO();
	foreach ($regiaoId->pesquisar($regiao) as $valor){
		return $nome_regiao = $valor['nome_regiao'];
	}
}

function nomeEstab($estab){
	$estabDao = new EstabelecimentoDAO();
	foreach ($estabDao->pesquisar($estab) as $valor){
		return $nome_estabelecimento = $valor['nome_estabelecimento'];
	}
}