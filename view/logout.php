<?php
session_start(); //Inicializa a sessoes
$_SESSION = array ();  //Verifica as variaveis de sessoes criadas
session_unset ();  //Apaga as variaveis de sessao
session_destroy (); //Destroi as variaveis de sessao
echo"<script> location.href = ('../index.php') </script>"; //Retorna para o index
?>