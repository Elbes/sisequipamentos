<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../view/css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../view/css/dist/sweetalert.css">
        <script src="../view/js/scripts.js"></script>     
        <link href="../view/css/bootstrap.css" rel="stylesheet">

        <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
        <title></title>

    </head>
    <body>
        <?php
//        include_once '../Model/session.php';
//        include_once '../control/validalogin2.php';
//        $objj = new Session();

        error_reporting(1);

        include_once '../Model/admin.php';

        $obj = new Admin();

        $obj->setEmail($_REQUEST["email"]);

//        $resultado = $obj->recuperaSenha();
        $resultado = $obj->recuperaSenha();

        if ($resultado >= 1) {
            echo $resultado;
            
          $id = 1;  
          $obj->alterarUsuario($id);
           
//           $novasenha = '4455';  
//        $novasenha = substr(md5(time()), 0, 6);
//        $novasenha_cripto = md5($novasenha);

//                 $obj = new Admin();
//                 $dados = array();
//                 $dados = $obj->dadosUsuario2($_REQUEST["email"]);
                
//                $id_user = $dados[0];
                
//                    $id_usuario = $dados[0];
//                    $matricula = $dados[1];
//                    $nome_usuario = $dados[2];
//                    $sobrenome_usuario = $dados[3];;
//                    $id_cargo = $dados[4];;
//                    $nivel = $dados[5];;
//                    $email = $dados[6];;
//                    $obj->setSenha(MD5($senha));
                    
//                    $obj->setSenha($_REQUEST[MD5("senha")]);
//                    $data_cadastro = $dados[7];;
//                    $status_usuario = $dados[8];
//                    $id_loja = $dados[9];
//                     
//                    $obj->setIdusuario = $id_usuario;
//                    $obj->setMatricula($matricula);
//                    $obj->setNomeusuario($nome_usuario);
//                    $obj->setSobrenomeusuario($sobrenome_usuario);
//                    $obj->setIdcargo($id_cargo);
//                    $obj->setNivel($nivel);
//                    $obj->setEmail($email);
//                    $senha = "5566";
//                    $obj->setSenha(MD5($senha));
//                    
//            //        $obj->setSenha($_REQUEST[MD5("senha")]);
//                    $obj->setDatacadastro($data_cadastro);
//                    $obj->setStatususuario($status_usuario);
//                    $obj->setIdloja($id_loja);
                
//                    
//                    echo $id_usuario . "<br>";
//                    echo $senha . "<br>";
//                    echo $matricula . "<br>";
//                    
//                    
//                    $obj->setMatricula($_REQUEST["matricula"]);
//                    $obj->setNomeusuario($_REQUEST["nome_usuario"]);
//                    $obj->setSobrenomeusuario($_REQUEST["sobrenome_usuario"]);
//                    $obj->setIdcargo($_REQUEST["id_cargo"]);
//                    $obj->setNivel($_REQUEST["nivel"]);
//                    $obj->setEmail($_REQUEST["email"]);
//                    $obj->setSenha(MD5($senha));
//                    
//            //        $obj->setSenha($_REQUEST[MD5("senha")]);
//                    $obj->setDatacadastro($_REQUEST["data_cadastro"]);
//                    $obj->setStatususuario($_REQUEST["status_usuario"]);
//                    $obj->setIdloja($_REQUEST["id_loja"]);
//                
//                    $id_usuario = $dados[0];
//                    $matricula = $dados[1];
                    
                    
//                    $resultado = $obj->alterarSenha();
                     
                     
                     
                     
//                     $resultado = $obj->alterarSenha($id_usuario, $matricula);
//                $senha = 
//                $obj->setNovasenha_cripto($novasenha_cripto);
                
                        
//                $resultado = $obj->alterarUsuario($id);
                 
//            } else {
//
//                echo "Ocorreu um erro ao envia Email!";
//            }
        }
        ?>
    </body>
</html>

---------------------------------------------------------------
        require 'conexao.php';

        $con = Conexao::conectar();
        $senha = '1234';
        $senha2 = md5($senha);
        
        $sql = "UPDATE usuario SET senha = $senha,  id_cargo = '5' , nivel = '1' WHERE id_usuario = '8'";
//        $sql = "UPDATE usuario SET nome_usuario = ? , matricula = ? , sobrenome_usuario = ? ,
//               id_cargo = ? , nivel = ?, email = ? , senha = ? , data_cadastro = ? , status_usuario = ?, id_loja = ?  WHERE id_usuario = ?";

        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(1, $senha);
       
//        $stmt->bindParam(1, $this->getNomeusuario());
//        $stmt->bindParam(2, $this->getMatricula());
//        $stmt->bindParam(3, $this->getSobrenomeusuario());
//        $stmt->bindParam(4, $this->getIdcargo());
//        $stmt->bindParam(5, $this->getNivel());
//        $stmt->bindParam(6, $this->getEmail());
//        $stmt->bindParam(7, $this->getSenha());
//        $stmt->bindParam(8, $this->getDatacadastro());
//        $stmt->bindParam(9, $this->getStatususuario());
//        $stmt->bindParam(10, $this->getIdloja());
//        $stmt->bindParam(11, $id_usuario);

        $result = $stmt->execute();

        if ($result == false) {
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }

------------------------------------------------------------------
//       $dados .="<font color='#ff0000'>ALTERAÇÃO DE DEMANDA</font> <br /><br />
       $dados .="<table>
                        <tr>
                            <td><b>NUMERO DA LINHA</b></td>
                            <td><b>TIPO DE DEMANDA</b></td>
                            <td><b>STATUS</b></td>
                        </tr>
                        <tr>
                            <td>61 9998-8777</td>
                            <td>Contestação</td>
                            <td>Pendente</td>
                        </tr>
                                           
                    </table> <br /> <a href='http://www.sdi.pe.hu' title='Acessar sistema'>Acessar o sistema</a>";
                


//                $nome_cliente = $_REQUEST['nome_cliente'];
//                $tipo_demanda = $_REQUEST['tipo_demanda'];
//                $obs_demanda = $_REQUEST['obs_demanda'];
//                $status = $_REQUEST['status'];
//                
//                $dados = "Cliente : " . $nome_cliente . "<br />" . 
//                         "Tipo da Demanda: " . $tipo_demanda . "<br />" .
//                        "Obs Demanda: " . $obs_demanda . "<br />" .
//                        "Status: " . $status . "<br />" .
                
//        echo $tabela;    
//$usuario = $_SESSION['username'];
                $usuario = $_SESSION['username'];
                $Name = "Jailson"; //senders name 
                $email = "contato@sdi.pe.hu"; //senders e-mail adress 
                $recipient = "contato@sdi.pe.hu"; //recipient
                $mail_body = "Teste de Envio de Email";  //mail body 
                $subject = "Demandas"; //subject 
                $headers = "contato@sdi.pe.hu" . "\r\n". 
                $headers .= "MIME-Version: 1.0" . "\r\n" . 
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n"; 
                
//                $header = "Content-type: text/html; charset=iso-8859-1\r\n From: . $Name . ' <' . $email . " > . "\r\n"; //optional headerfields 
//$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields;

                if (mail($recipient, $subject, $dados, $headers)) {
                    echo "Email enviado com sucesso !";
                } else {
                    echo "Ocorreu um erro durante o envio do email.";
                }

//mail($recipient, $subject, $mail_body, $header); //mail command :) 
            } else {
                //Lista os erros
                print_r($resultado);
                echo "Email informado não foi encontrado na base de Dados.";
            }
        

---------------------------------------------------------------------------------
<?php


$to      = 'jailson.oliveira@telefonica.com';
$subject = 'Mensagem de teste SDI';
//$message = "Line 1\nLine 2\nLine 3";
//$message = 'teste de email para ver se esta chegando blz enviado pelo sdi\n Agora usando SDI';

$headers = 'Content-Type:text/html; charset=UTF-8' . "\r\n" .    
           'From: jailson.oliveira@gmail.com' . "\r\n" .
           'Reply-To: contato@sdi.pe.hu' . "\r\n" .
           'X-Mailer: PHP/' . phpversion() .
        
$message = '<html> 
          <body>
          <table>
                    <tr>
                    <td>NUMERO DA LINHA</td>
                    <td>TIPO DE DEMANDA</td>
                    <td>STATUS</td>
                    
                </tr>
                                           
                    <tr>
                    <td>(61) 9999 - 5644</td>
                    <td>Migrar para o Pre pago</td>
                    <td>Nova</td>
                    
                </tr>
                </table>
            

          </body>
        
        
            ';


    
$envio = mail($to, $subject, $message, $headers);

if ($envio){
//mail($to, $subject, $message, $headers);

    echo 'Email enviado com sucesso!';
}

else{

    echo 'Houve um erro ao Tentar enviar Email!';
}


?>
--------------------------------------
<?php

require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';

//$mail->Host = 'smtp.hostinger.com.br';  // Specify main and backup SMTP servers

$mail = new PHPMailer;

$mail->setLanguage('pt');
$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
$mail->Username = 'jailsonjpo@hotmail.com'; 
$mail->Password = 'civilwar';   
$mail->SMTPAuth = true;                               // Enable SMTP authentication
                // SMTP username
                        // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('jailsonjpo@hotmail.com', 'Jailson');
$mail->addAddress('jailsonjpo@gmail.com', 'Jailson');     // Add a recipient
//$mail->addAddress('jailsonjpo@hotmail.com', 'Jailson');               // Name is optional
$mail->addReplyTo('jailsonjpo@hotmail.com', 'Information');
//$mail->addCC('jailsonjpo@hotmail.com', 'jailson');
//$mail->addBCC('tiago.dares@gmail.com', 'jailson');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$enviado = $mail->send();
if($enviado) {
   
    echo 'Message has been sent';
    
} else {
     echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    
}
?>

----------------------------------------------






---------------------------------------------------------------------------------------------
//1 – Definimos Para quem vai ser enviado o email
  $para = "contato@sdi.pe.hu";
  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = "Jailson";
  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = "Teste";
   //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem2 = "Teste de Email";
  
  $mensagem = "<strong>Nome:  </strong>".$nome;
  $mensagem .= "<br>  <strong>Mensagem: </strong>. $mensagem2";

//5 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  jailsonjpo@gmail.com <contato@sdi.pe.pu>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <contato@sdi.pe.pu>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <contato@sdi.pe.pu>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";

mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.
// $mail->SMTPDebug = 2; 






-----------------------------------------------------------------------------------
$quebra_linha = "\n";
        $emailsender = "u256718828@srv26.main-hosting";
        $nomeremetente = "Jailson";
        $emaildestinatario = "jailsonjpo@gmail.com";        
        $assunto = "Teste PHP";
        $mensagem = "Conteudo";
                
        $headers = "MIME-Version: 1.0" . $quebra_linha;
        $headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha;
        $headers .= "From: $emailsender".$quebra_linha;
        $headers .= "Return-Path: .$emailsender".$quebra_linha;
        $headers .= "Replay-to: $emailsender".$quebra_linha;
        
                
        mail($emaildestinatario, $assunto, $mensagem, $headers, $emailsender);
        print "Mensagem enviada com sucesso";
        
        
//        $senha = $_REQUEST["senha"];
//        $obj->setIdusuario($_REQUEST["id_usuario"]);
//        $obj->setMatricula($_REQUEST["matricula"]);
//        $obj->setNomeusuario($_REQUEST["nome_usuario"]);
//        $obj->setSobrenomeusuario($_REQUEST["sobrenome_usuario"]);
//        $obj->setIdcargo($_REQUEST["id_cargo"]);
//        $obj->setSenha(MD5($senha));
//        $obj->setStatususuario($_REQUEST["status_usuario"]);
 
//        $email = $_REQUEST["email"];

//            $resultado = $obj->recuperaSenha($_REQUEST["email"]);
//
//            if ($resultado == 1) {
               
//    ------------------------------------------------ Tentativa de envio de email ---------------------------------------
//   $id = $_REQUEST["id"];
//   $resultado = $obj->cadastrarDemanda();
//   dadosAdmin($id);
//     $obj = new Demanda();
//   $usuario = $_SESSION['username'];
//   $conteudo = $obj->dadosAdmin();
//
//                        if ($_SESSION['nivel'] == 1) {
//
//                            include_once '../Model/demanda.php';
//                            $obj = new Demanda();
//                            $obj->listarDemanda3();
//                        } else {
//
//                            include_once '../Model/demanda.php';
//                            $obj = new Demanda();
//                            $obj->listarDemanda4();
//                        }
//                       
////
//        
//        "<table class='table table-bordered'>
//                <tr class='success'>
//                    <td class='text-center'>NUMERO DA LINHA</td>
//                    <td class='text-center'>TIPO DE DEMANDA</td>
//                    <td class='text-center'>STATUS</td>
//                    
//                </tr>
//
//                <tr class='danger'>
//                    <td class='text-center'>".$_REQUEST["numero_linha"]."</td>
//                    <td class='text-center'>".$_REQUEST["tipo_demanda"]."</td>
//                    <td class='text-center'>".$_REQUEST["status"]."</td>
//                    
//                </tr>
//                </table>
//                
//                <br /> <a href='http://www.sdi.pe.hu' title='Acessar sistema'>Acessar o sistema</a>";

        
        
//                $dados ="<table class='table table-bordered'>
//                    <tr class='success'>
//                    <td class='text-center'>NUMERO DA LINHA</td>
//                    <td class='text-center'>TIPO DE DEMANDA</td>
//                    <td class='text-center'>STATUS</td>
//                    
//                </tr>
//                                           
//                    <tr class='danger'>
//                    <td class='text-center'>(61) 9999 - 5644</td>
//                    <td class='text-center'>Migrar para o Pre pago</td>
//                    <td class='text-center'>Nova</td>
//                    
//                </tr>
//                </table>";     
//                        
                        
//                
//                
//                $nome_cliente = $_REQUEST['nome_cliente'];
//                $tipo_demanda = $_REQUEST['tipo_demanda'];
//                $obs_demanda = $_REQUEST['obs_demanda'];
//                $status = $_REQUEST['status'];
//                
//                $dados = "Cliente : " . $nome_cliente . "<br />" . 
//                         "Tipo da Demanda: " . $tipo_demanda . "<br />" .
//                        "Obs Demanda: " . $obs_demanda . "<br />" .
//                        "Status: " . $status . "<br />" .
                
//        echo $tabela;    
//$usuario = $_SESSION['username'];
//                $usuario = $_SESSION['username'];
//                $name = "Jailson"; //senders name 
//                $email = "contato@sdi.pe.hu"; //senders e-mail adress 
//                $recipient = "jailson.oliveira@telefonica.com"; //recipient
//                $mail_body = "Teste de Envio de Email";  //mail body 
//                $subject = "Demandas"; //subject 
//                $headers = "X-MSMail-Priority: High \r\n" .
//
//                $headers .= "From: $usuario <$recipient >\r\n". 
//               "MIME-Version: 1.0" . "\r\n" . 
//               "Content-type: text/html; charset=UTF-8" . "\r\n" . 
//                
//                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n From: . $Name . ' <' . $email . " > . "\r\n" . //optional headerfields 
//                $headers .= "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields;
//
//                if (mail($recipient, $subject, $dados, $headers)) {
//                    echo "Email enviado com sucesso !";
//                } else {
//                    echo "Ocorreu um erro durante o envio do email.";
//                }

//mail($recipient, $subject, $mail_body, $header); //mail command :) 
//            } else {
//                //Lista os erros
//                print_r($resultado);
//            }
//        }         


//       teste ----------------------------------------- 
        
// multiple recipients
$to  = 'jailsonjpo@gmail.com'; // note the comma
//$to .= 'jailsonjpo@hotmail.com';

// subject
$subject = 'Teste de Envio de Email';

// message
$message = '
<html>
<head>
 <title>Birthday Reminders for August</title>
</head>
<body>
<p>Here are the birthdays upcoming in August!</p>
<table>
 <tr>
  <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
 </tr>
 <tr>
  <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
 </tr>
 <tr>
  <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
 </tr>
</table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'contato@sdi.pe.hu' . "\r\n";
$headers .= 'contato@sdi.pe.hu' . "\r\n";
//$headers .= 'Cc: jailsonjpo@hotmail.com' . "\r\n";
//$headers .= 'Bcc: jailsonjpo@gmail.com' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
//    if (mail($recipient, $subject, $dados, $headers)) {
                     ?>
                <script>recuperaSenha();</script>

                <?php
//                    echo "Email enviado com sucesso !";
                } else {
                    
                    echo "Ocorreu um erro durante o envio do email.";
                }

// Mail it

//}
-------------------------script envio de email dando certo
                // multiple recipients
            $to = 'contato.sdidf@gmail.com' . ', '; // note the comma
//            $to .= 'jailsonjpo@yahoo.com.br';

// subject
            $subject = 'Alteração de Senha - SDI';

// message
            $message = '
                       <h3><center>ALTERAÇÃO DE SENHA</center></h3><br>
                       
                       <h2>Nova Senha:' . $novasenha . '</h2>
                        ';

// To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0\n';
            $headers .= 'Content-type: text/html; charset=iso-8859-1\n';

// Additional headers
            $headers .= 'To: Jailson <jailson.oliveira@telefonica.com>, <jailsonjpo@gmail.com>\n';
            $headers .= 'From: Jailson <contato@sdi.pe.hu>\n';
            
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
//$headers .= 'To: Ivanilson <jailson.oliveira@telefonica.com>, <jailsonjpo@gmail.com>' . "\r\n";
//$headers .= 'From: Jailson <contato@sdi.pe.hu>' . "\r\n";
//$headers .= 'Cc: jailsonjpo@gmail.com' . "\r\n";
//$headers .= 'Bcc: jailsonjpo@gmail.com' . "\r\n";
// Mail it
//            $envio = mail($to, $subject, $message, $headers);
//
//            if ($envio) {
//
//                echo "Email enviado com sucesso";
//                 $obj = new Admin();

-----------------------------------------------------
$obj = new Admin();
            $dados_user = array();

            $dados_user = $obj->dadosUsuario2($_REQUEST['email']);
         
                  $dados ="<table class='table table-bordered'>
                <tr class='success'>
                
                    <td class='text-center'>NOME DO USUARIO</td>
                    <td class='text-center'>EMAIL</td>
                    <td class='text-center'>TOKEN</td>
                                        
                </tr>

                <tr class='danger'>
                                    
                    <td class='text-center'>' . $dados_user[1] .'</td>
                    <td class='text-center'>'. $dados_user[5] .'</td>
                    <td class='text-center'>'. $dados_user[9] .'</td>
                    
                </tr>
                </table>
                
                <br /> <a href='http://www.sdi.pe.hu' title='Acessar sistema'>Acessar o sistema</a>";

                $usuario = $dados_user[1];
//                $usuario = $_SESSION['username'];
                
//                $name = $usuario; //senders name 
                $name = Jailson; //senders name 
                $email = "jailsonjpo@hotmail.com"; //senders e-mail adress 
                $recipient = "jailson.oliveira@telefonica.com"; //recipient
                $mail_body = "Teste de Envio de Email";  //mail body 
                $subject = "Demandas"; //subject 
                $headers = "X-MSMail-Priority: High \r\n";

                if (mail($recipient, $subject, $dados, $headers)) {
                     ?>
                <script>recuperaSenha();</script>

                <?php
//                    echo "Email enviado com sucesso !";
                } else {
                    echo "Ocorreu um erro durante o envio do email.";
                }
                
                
            } 
                          
            else {
                //Lista os erros

//                print_r($resultado);

                 ?>
                <script>emailInexistente();</script>

                <?php
            }
      



---------------------------------------------------------------------------------------------------------------   
//    $obj->setMatricula($_REQUEST["matricula"]);
//       
//       $matricula = $this->getMatricula();
       $stmt = $con->query("Select * from usuario where matricula ='$matricula'");
        
        if ($count >= 1) {
       
       
//       if ($id_usuario = $matricula)
       
       
        $stmt->execute();
        $count = $stmt->rowCount();
        $obj = $stmt->fetchObject();
        $dados = array(
            $obj->id_usuario,
            $obj->matricula,
            
            );
//        return $dados;
              $id_usuario = $this->getIdusuario();
              $id_usubanco = $obj->id_usuario;
              
         
             
              echo $id_usuario . "<br>";
              echo $id_usubanco . "<br>";
              
              
              
//              if($id_usuario == $id_usubanco){
                 
     
--------------------------------------------------------------------------------
//            echo substr($texto, 11);     // bobo pra tirar onda de herói
//            echo "<br>\\n";
//            echo substr($texto, 11, 9);  // bobo pra
//            echo "<br>\\n";
//            echo substr($texto, -5);     // herói
//            echo "<br>\\n";
//            
//            echo substr($texto, 0, 2);  // eu não sou bobo
//            echo "<br>\\n";
//            echo substr($texto, 11);     // bobo pra tirar onda de herói
//            echo "<br>\\n";
//            echo substr($texto, 11, 9);  // bobo pra
//            echo "<br>\\n";
//            echo substr($texto, -5);     // herói
//            echo "<br>\\n";

            
            
            
            
//            function Mask($mask,$str){
//
//    $str = str_replace(" ","",$str);
//
//    for($i=0;$i<strlen($str);$i++){
//        $mask[strpos($mask,"#")] = $str[$i];
//    }
//
//    return $mask;
//
//}
            
            
            
            
//            $telefone = $obj->numero_linha;
//          $telefone->Mask((##)####-####,$telefone);
//            echo 
            
            
//            $cnpjMask = "%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s";
//            echo format($cnpjMask,'11622112000109');
            
//            $cnpjMask = "%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s";
//            echo format($cnpjMask,'11622112000109');
            
            


<!------------------------------------------------------------------------------------------------------------------------->
<?php

//$itens_por_pagina = 10;
//$pagina = intval($_GET['pagina']);

// puxar produtos do banco
//$sql_code = "select nome_cliente, numero_linha from demanda LIMIT $pagina, $itens_por_pagina";
//$execute = $mysqli->query($sql_code) or die($mysqli->error);
//$produto = $execute->fetch_assoc();
//$num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
//$num_total = $mysqli->query("select nome_cliente, numero_linha from demanda")->num_rows;

// definir numero de páginas
//$num_paginas = ceil($num_total/$itens_por_pagina);
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
  				<?php // if($num > 0){ ?>
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
						<?php
                                   include_once '../Model/demanda.php';
                                  

                                               
                                                
                                  
                                    ?>

					</tbody>
				</table>

				<nav>
				  <ul class="pagination">
				    <li>
                                        <a href="datepicker.php?pagina=0" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php 
                                    $obj = new Demanda();
                                    $num_total = $obj->contNum();
                                    
                                    $itens_por_pagina = 10;
                                    $num_paginas = ceil($num_total/$itens_por_pagina); 
				    ?>
                                
				    <li>
				      <a href="index.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
                                    
                                    <?php
                                    for($i=0;$i<$num_paginas;$i++){
				    
                                        $estilo = "";
                                    
				    if($pagina == $i)
				    	$estilo = "class=\"active\"";
				    ?>
                                    <li <?php echo $estilo; ?> ><a href="datepicker.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                                    
					<?php $pagina = intval($_GET['pagina']); 
                                          $obj = new Demanda();
                                    $obj->listarDemanda33($itens_por_pagina, $pagina);
//                                    $num = $obj->contNum();            
                                              
                                        
                                                                                
                                    } ?>    
                                    
                                    
                                    
				  </ul>
				</nav>
  				<?php // } ?>
  			</div>
  		</div>
  	</div>


  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="js/bootstrap.min.js"></script>
  </body>
  </html>

----------------------------------------------------------------------------------------------------
<?php

$itens_por_pagina = 10;

$pagina = intval($_GET['pagina']);

//$num_total = 

$num_paginas = ceil($num_total/$itens_por_pagina);

?>

<?php
//include("conexao.php");

// definir o numero de itens por pagina
//$itens_por_pagina = 10;

// pegar a pagina atual
//$pagina = intval($_GET['pagina']);

// puxar produtos do banco
//$sql_code = "select pro_nome, pro_preco from produto LIMIT $pagina, $itens_por_pagina";
//$execute = $mysqli->query($sql_code) or die($mysqli->error);
//$produto = $execute->fetch_assoc();
//$num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
//$num_total = $mysqli->query("select pro_nome, pro_preco from produto")->num_rows;

// definir numero de pÃ¡ginas

?>

















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
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

    </head>
    <body>
                
        <?php
        
        include '../Model/session.php';
        include_once '../control/validalogin2.php';
        include 'menu.php';
        
        
        $obj = new Session();
//        $obj->validamenu();
        $usuario = $_SESSION['username'];
        ?>
        
        
                            <!---------------------------------------- ----------------------------------------->
                            
        <div class="container">


            <form action="datepicker.php" method="post">


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
                        <table class="table table-bordered table-striped text-center" id="minhaTabela">
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
                                    $obj->listarDemanda3($palavra, $opcao, $data_inicial, $data_final, $status, $pagina, $itens_por_pagina);
                                }
                            }
                            ?>

                        </table>
                        
                        <nav>
				  <ul class="pagination">
				    <li>
				      <a href="index.php?pagina=0" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php 
				    for($i=0;$i<$num_paginas;$i++){
				    $estilo = "";
				    if($pagina == $i)
				    	$estilo = "class=\"active\"";
				    ?>
				    <li <?php echo $estilo; ?> ><a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
					<?php } ?>
				    <li>
				      <a href="index.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
                        
                        
                        
                        
                        
<!--                        <div class="pagination">
  <ul>
    <li><a href="#">Prev</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>-->
                        
                        
                        
                        
                        
                        
                        <script>
        $(document).ready(function(){
            $('#minhaTabela').dataTable();
        });
        </script>

                        
                    </div>
                      
                    <!--</div>  Fim Panel Body -->

                    <div class="panel-footer"><?php echo 'Data ' . date('d/m/Y'); ?><h5 class="pull-right" id="demo"></h5></div>

                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </body>
</html>

<!----------------------------------------------------------------------------------------------------->

<!--

    public function listarDemanda3() {

        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();

        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where gerente = '$usuario' and status = 'Novo' or gerente = '$usuario' and status = 'Pendente' or gerente = '$usuario' and status = 'Em progresso'");

        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
                 
                   <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td>    
                   <td>$obj->numero_linha</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td> 
                 <form method='post' action='editar_demanda.php'>
                   <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}>
                    <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                 </form>
                <form method='post' action='../control/executar_exclusao_demanda.php'>
                   <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}> 
                    <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                </form>";
//                        
//                                               <td><input type='submit' class='btn btn-primary vertical'><span class='glyphicon glyphicon-pencil' aria-hidden='true' title='Editar Demanda'></span></td>                                           
//                       <td><input class='btn btn-default ' type='submit' value='class='glyphicon glyphicon-pencil'>'</td>
//                        
//        <td><a href='excluir_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-danger vertical'><span class='glyphicon  glyphicon-remove-circle btn-danger' title='Excluir Demanda' aria-hidden='true'></span></button></a></td></tr>
        }
        //                   <td><a href='editar_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-primary vertical'><span class='glyphicon glyphicon-pencil' aria-hidden='true' title='Editar Demanda'></span></button></a></td>
        //inserir formulario em todas a paginas para evitar que o id seja mostrado na url

        unset($con);
    }

    public function listarDemanda4() {

//          $categoria = $_POST['categoria'];
//
//        $pesquisa = $_POST['pesquisa'];
//         $id_demanda = $_POST['id_demanda'];
//         $numero_linha = $_POST['numero_linha'];        
//         $gerente = $_POST['gerente'];       
//         $status = $_POST['status'];         
//        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();

        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where usuario = '$usuario' and status = 'Novo' or usuario = '$usuario' and status = 'Pendente' or usuario = '$usuario' and status = 'Em progresso'");
//        $stmt = $con->query("Select * from demanda where usuario = '$usuario' and status = 'Novo' or usuario = '$usuario' and status = 'Pendente' or usuario = '$usuario' and status = 'Em progresso'");
//        $stmt = $con->query("Select * from demanda where usuario = '$usuario' and status='Novo'");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
               <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td>    
                   <td>$obj->numero_linha</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td>    
                       
                   <form method='post' action='editar_demanda.php'>
                   <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}>
                    <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                 </form>
                <form method='post' action='../control/executar_exclusao_demanda.php'>
                   <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}> 
                    <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                </form>";
        }
        unset($con);-->
    <!--}-->  

----------------------------------------------------------------------------------------------  
//    public function listarDemandateste2() {
//
//        $con = Conexao::conectar();
//        $stmt = $con->query("Select * from demanda where status = 'Novo'");
//
//        while ($obj = $stmt->fetchObject()) {
//
//            $data = $obj->data_abertura;
//            $data = implode("/", array_reverse(explode("-", $data)));
//
//            echo "
//               <tr>
//                   <td>$obj->id_demanda</td>
//                   <td>$obj->nome_cliente</td>    
//                   <td>$obj->numero_linha</td>
//                   <td>$obj->tipo_demanda</td>    
//                   <td>$obj->obs_demanda</td>
//                   <td>$obj->usuario</td>             
//                   <td>$obj->gerente</td>    
//                   <td>$data</td>
//                   <td>$obj->obs_demanda_gerente</td>        
//                   <td>$obj->status</td>    
//                   <td><a href='editar_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";
//        }
//        unset($con);
//    }


---------------------------------------------------------------------------------------------------------------
<?php
              error_reporting(1);
              require '../Model/demanda.php';
                
              
              $obj = new Demanda();
               
              $obj->setCategoria($_REQUEST["categoria"]);
              $obj->setPesquisa($_REQUEST["pesquisa"]);
//              $obj->setStatus($_REQUEST["status"]);
              
//              $resultado = $obj->listarDemanda4();
              
//              if($resultado == 1){
//                  ?>
              
            
<!--               
                 

                </div>
                       <div class="panel-footer"><?php // echo 'Data ' . date('d/m/Y'); ?></div>
            </div>
        </div>
        
                  
                  <?php

//              }
//              else{
                  //Lista os erros
//                  print_r($resultado);
//              }
                ?>
        -->
        

<!--------------------------------------------------------------------------------------------->
<option value="<?php echo $dados[3] ?>"><?php echo $dados[3] ?></option>
                                        <?php 
                                        $obj = new Admin();
                                          $obj->dadosCargo($id);
                                          ?>
<!----------------------------------------------------------------------------------------------->

//                    <tr>
//                   <td>$obj->id_usuario</td>
//                   <td>$obj->nome_usuario $obj->sobrenome_usuario</td>
//                   <td>$obj->cargo</td>
//                   <td>$obj->nivel</td>    
//                   <td>$obj->email</td>
//                   <td>$obj->senha</td>             
//                   <td>$data</td>
//                   <td>$obj->status_usuario</td>        
//                   <td><a href='editar_usuario.php?id=$obj->id_usuario'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";

<!----------------------------------------------------------------------------------------------->
//        $num_rows = mysql_num_rows($result);
//        return $count;
//        echo "$num_rows";
//      <?php
//$del = $dbh->prepare('DELETE FROM fruit');
//$del->execute();
//$count = $del->rowCount();
//print("Deleted $count rows.\n");
//        return $; 

//-------------------------------------------------------------------------------------------
//    public function validamenu() {
//        session_start();
//      
//        $adm = 1;
//
//        if ($_SESSION['nivel'] == $adm) {
//
//            $menu = include '../view/menu.php';
////         '../view/menu.php';
//            return $menu;
//
////    echo $_SESSION['nivel'] . " ";
////    echo '<br><br>';
//        } else {
//            $menu = include '../view/menu2.php';
//            return $menu;
//
////    include 'menu2.php';
////    echo '<br><br>';
//        }
//    }
//    
//}


//-------------------------------------------------------------------------------------------
//        SELECT * FROM tab1 
//INNER JOIN tab2 ON (tab1.campo = tab2.campo) 
//INNER JOIN tab3 ON (tab3.campo = tab2.campo) 
//WHERE tab1.campo = 'valor' 
//        
        
        
        
//        $stmt = $con->query("Select * from usuario INNER JOIN cargo (id_cargo = id_cargo)  where id_cargo = '$id_cargo'");
//        $stmt = $con->query("Select * from usuario, cargo where id_cargo = '$id_cargo'");
                               
        
//        $stmt = $con->query("Select * from usuario union all select * from cargo");
//--------------------------------------------------------------------------------
                           <form action="../control/executar_exclusao_usuario.php" method="post">     

                                <input type="hidden" class="btn btn-primary" name="id_usuario" value="<?php echo $dados[0] ?>">
<!--<td><a href='editar_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";-->
                                <!--onclick="swal({   title: 'Sair?', type: 'warning', text:'Tem certeza que deseja realmente Sair?',  showCancelButton: true,   confirmButtonColor: '#DD6B55',confirmButtonText: 'SAIR', cancelButtonText: 'CANCELAR', closeOnConfirm: false}, function(){window.location.href = 'logout.php';});">Encerrar Sessão</a></li>-->
                                <div class="col-md-2 col-md-offset-5">
                                    <input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR">
                                    <!--<input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR" onclick="swal({   title: 'Excluir?', type: 'warning', text:'Tem certeza que deseja excluir o Usuário?',  showCancelButton: true,   confirmButtonColor: '#DD6B55',confirmButtonText: 'EXCLUIR', cancelButtonText: 'CANCELAR', closeOnConfirm: false, function(){window.location.href = 'logout.php';}});">>-->
                                    <!--<input type="submit" class=" btn btn-danger" name="excluir" value="EXCLUIR" onclick='return confirm(\"Deseja realmente deletar?\")'>-->                                           
                                </div> 
                            </form>


------------------------------------------------------------------------------
<!--    <div class="masthead">
        <h3 class="text-muted">SDI - Sistema de Demandas Internas</h3>
        <nav>
            <ul class="nav nav-justified">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Downloads</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>-->
 
-----------------------------------------------------------
<ul class="nav nav-tabs">
                    <li class="dropdown">
                      <a class="dropdown-toggle"
                         data-toggle="dropdown"
                         href="#">
                          Dropdown
                          <b class="caret"></b>
                        </a>
                      <ul class="dropdown-menu">
                       <li><a href="listar_usuario.php">Listar Usuário</a></li>

                      </ul>
                    </li>
                  </ul>'




//                          <ul>
//                          
//                          <li><a href="cadastrar_admin.php">Cadastrar Usuário</a></li>
//                          <li><a href="listar_usuario.php">Listar Usuário</a></li>
//
//
//                            </ul></li>'
//           

-----------------------------------

<span class='glyphicon glyphicon-pencil'></span>

-------------------------------------------------
require_once 'conexao.php';
       
       $con = Conexao::conectar();  
       
       $id = $this->getIdusuario();
        
       $stmt = $con->query("DELETE FROM usuario WHERE id_usuario = $id");
       
       $result =  $stmt->execute();
        if($result == false){
           return $stmt->errorInfo();    
        }
        else{
           unset($con);
           return $result;
       }


-------------------------------------------------------------------------------------------------------------
public function listarDadosUsuario(){
       //        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario where usuario = '$usuario'");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
                   <td>$obj->id_usuario</td>
                   <td>$obj->nome_usuario</td>    
                   <td>$obj->cargo</td>
                   <td>$obj->nivel</td>    
                   <td>$obj->email</td>
                   <td>$obj->senha</td>             
                   <td>$data</td>
                   <td>$obj->status_usuario</td>        
                  <td><a href='editar_demanda.php?id=$obj->id_usuario'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";
        unset($con);
    }
    }
    
       
----------------------------------------------------------
//        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from demanda where gerente = '$usuario'");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
               <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td>    
                   <td>$obj->numero_linha</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td>    
                   <td><a href='editar_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";
        }
        unset($con);
    }
        
        
//       $con = Conexao::conectar();  
//       $stmt = $con->query('Select * from admin');
       // Percorrento um resultset com while
//       while ($obj = $stmt->fetchObject()) {
//         echo "
//               <tr>
//                   <td>$obj->id_usuario</td>
//                   <td>$obj->nome_usuario</td>    
//                   <td>$obj->cargo</td>
//                   <td>$obj->nivel</td>
//                   <td>$obj->email</td>
//                   <td>$obj->senha</td>
//                   <td>$obj->data_cadastro</td>
//                   <td>$obj->status_usuario</td>    
//                   <td><a href='alterar_admin.php?id=$obj->id_admin'>ALTERAR</a>--<a>EXCLUIR</a></td>    
//               </tr> 
//              "; 
//       }   
//       unset($con); 
//     }
//    


-----------------------------------------------------------------------------------------------------------------------
                       "<font color='#ff0000'>ALTERAÇÃO DE DEMANDA</font> <br /><br />
                   <table width='100%' border='1'>
                        <tr bgcolor='#dff0d8' text-align='center'>
                            <td width='150'><b>NUMERO DA LINHA</b></td>
                            <td width='150'><b>TIPO DE DEMANDA</b></td>
                            <td width='100'><b>STATUS</b></td>
                        </tr>
                        <tr>
                            <td width='150'>".$_REQUEST["numero_linha"]."</td>
                            <td width='150'>".$_REQUEST["tipo_demanda"]."</td>
                            <td width='100'>".$_REQUEST["status"]."</td>
                        </tr>
                                           -->
                    </table> <br /> <a href='http://www.sdi.pe.hu' title='Acessar sistema'>Acessar o sistema</a>";



-----------------------------------------------------------------------------------------



 $tabela = "<table class='table table-bordered text-center'>
                        <tr class='success'>    

                            <td>DEMANDA</td>
                            <td>NOME DO CLIENTE</td>
                            <td>NUMERO DA LINHA</td>
                            <td>TIPO DE DEMANDA</td>
                            <td>OBSERVAÇOES</td>
                            <td>RESPONSAVEL ABERTURA</td>
                            <td>GERENTE</td>
                            <td>DATA ABERTURA</td>
                            <!--<td>DATA FECHAMENTO</td>-->
                            <td>RESPOSTA GERENTE</td>
                            <td>STATUS</td>
                            <td>AÇÃO</td>
                        </tr>";
            
//     include_once '../Model/demanda.php';
 
                 $obj = new Demanda();
                 $obj->listarDemanda3();
                 
                         
// $tabela.="<tr>
//<td ><strong>$var_id</strong></td>
//<td ><strong>$var_produto</strong></td>
//<td ><strong>$var_preco</strong></td>
//<td ><strong>$var_qtd</strong></td>
//<td ><strong>$var_subtotal</strong></td>
//</tr>";
//}

$tabela.="</table>;</td>";
//$tabela.="</table>Total: $obj->listarDemanda3();</td>":
//}



-----------------------------------------------------------------------------------------------------

//        if (isset($_POST['buscar'])){
                            

//        $categoria = $this->getCategoria();     
//        $pesquisa = $this->getPesquisa();     
//         $categ = $obj->categoria;
//         
//         $pes = $obj->pesquisa;        
//         $this->categoria = $categoria;    
//         $this->pesquisa = $pesquisa;    
//        if (isset($_POST['buscar'])){
//            
//        
//          $categoria = $_POST['categoria'];
////         
//         $pesquisa = $_POST['pesquisa'];
//        session_start();
//        $categoria = $this->categoria;
//        $pesquisa = $this->pesquisa;
//        $categoria = this->categoria;     
//        $pesquisa->pesquisa;     

        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar
//        $status = 
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from demanda where gerente = '$usuario' and status ='Novo'");
//         $stmt = $con->query("Select * from demanda where gerente = '$usuario' and status='Novo' or gerente='$usuario' and status='Em progresso' or gerente='$usuario' and status='Pendente' ");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {



            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
               <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td>    
                   <td>$obj->numero_linha</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td>    
                   <td><a href='editar_demanda.php?id=$obj->id_demanda'><button type='button' class='btn btn-primary vertical'>ALTERAR</button></a></td></tr>";
        }
        unset($con);
       }
//    echo "Nao foi encontrado nenhum dado";
----------------------------------------------------------------------------------------------------         

          <?php
//                                if ($name == '0'){
//                                
//                                    echo "Por Favor Altere o Status";
//                                
//                                }

                                ?>
                                    
                                    <?php
//                                $status == $dados[10];
//                                echo $status;

//                                if ($dados[10] == 'Concluído') {
//                                //                                    $data_fechamento == $dados[8];
//                                    $data_fechamento = date('Y/m/d');
//                                    ?>

                                    <!--<input type="hidden" class="text-center" name="data_fechamento" value="<?php // echo $data_fechamento; ?>">-->

                                    <?php
//                                }
                                ?>   


                               

                            <!--</div>--> 

                            <!--</div>-->





                                    <input type="text" class="breadcrumb text-center" name="status" disabled value="<?php echo $dados[10] ?>">
                                    <?php // $status_atual = $dados[10]; ?>
                                    
                                    <!--<div class="breadcrumb" name="status" readonly><?php // echo $dados[10] ?></div>-->
                                    <!--<span class="breadcrumb"><?php // echo $dados[10] ?></span>-->

                                    <!--</div>-->
                                        
----------------------------------------------------------------------------------

//        else {
            ?>
                
           
      <?php

//        }
       
//       else{
//        ?>
<!--        <script>
//            usuarioNaoCadastrado();
//            alert("Usuario não cadastrado");
//            window.location = "../index.php";
        </script>-->
        
//       }
        
//       }
    }


--------------------------------------------------------------------------------------------------------

     //    return false;
//   
//   window.history.go(-1);
//    history.back();

//     header("Location:../view/editar_demanda.php"); 
//    echo "<script>window.history.go(-1);</script>"; 
    
//
//$cadastro.addEventListener('submit', function(event) {
//    var $origem = event.target;

//    
//               

        
//    };
//});
        
           
          
           
//           echo "<script>window.history.go(-1);</script>";
//           if ($status == "0"){
//               
//              
//                invalido();
//               
//               function status_branco(){
//               echo "swal({   title: 'Sweet!',   text: 'Here's a custom image.',   imageUrl: 'images/thumbs-up.jpg' });";
//               echo "<script>window.history.go(-1);</script>";
//           }
//               
//               echo "<script>alert('Por Favor Altere o Status')</script>";
//               
//               
//           }
//                                        
//          


<!---------------------------------  RESPOSTA DO GERENTE ------------------------------------------>
                                <?php
//                                if ($dados[9] == "") {
                                if (empty($dados[9])) {

                                    $usuario = $_SESSION['username'];

                                    if ($usuario == $dados[6]) {
                                        ?>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="descricao">Resposta Gerente</label>
                                                <textarea class="form-control" name="obs_demanda_gerente" rows="6"><?php echo $dados[9] ?></textarea>

                                            </div>
                                        </div>   

        <?php
    }
} Else {

//                                    $resp = $dados[9];
    ?>

                                    <div class="col-md-6">
                                        <label for="descricao">Resposta Gerente</label>
                                        <textarea class="form-control" rows="6"><?php echo $dados[9] ?></textarea>

                                    </div>

<?php } ?>

                 
                 
<!-------------------------------------------- RESPOSTA DO GERENTE ---------------------------------------------->                 


                                <?php
                                
//                                if ($dados[9] == "") {
                                if (empty($dados[9])) {
                                    $usuario = $_SESSION['username'];
                                    
                                    if ($usuario == $dados[6]) {
                                        ?>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="descricao">Resposta Gerente</label>
                                                <textarea class="form-control" name="obs_demanda_gerente" rows="6"></textarea>

                                            </div>
                                        </div>   

                                        <?php
                                    }
                                } Else {
                                    
                                    $resp = $dados[9];
                                    ?>

                                    <div class="col-md-6">
                                        <label for="descricao">Resposta Gerente</label>
                                        <textarea class="form-control" rows="6" disabled><?php echo $resp ?></textarea>

                                    </div>

<?php } ?>









<!------------------------------------------------- editar demanda ------------------------------------------>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--<link href="css/layout.css" rel="stylesheet" type="text/css">-->
        <!--<link href="/view/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="/view/css/bootstrap.css" rel="stylesheet">
        <link href="/view/css/style.css" rel="stylesheet">
    </head>
    <body>

        <?php
        
         include_once '../Model/session.php';
        
        $obj = new Session();
        $obj->validamenu();
        
        ?>
        
        <div class="container">


            <div class="row">
                <div class="col-sm-9  col-md-10 main">
                    <h1 class="page-header">Listar Demanda</h1>
                </div>
                <!--<div class="btn btn-primary btn-block" href="#"></div>-->
            </div>       

            <br>
            <!--<table align="center">-->
            <div class="fundo">   
                <table class="table table-bordered text-center">
                    <tr class="success">    

 <!--<tr>-->
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
                    </tr>


                    <?php
//                    session_start();
                    $usuario = $_SESSION['nivel'];

                    if ($_SESSION['nivel'] == 1) {
                       
                        include_once '../Model/demanda.php';
                        $obj = new Demanda();
                        $obj->listarDemanda();  
                    }
                    //elseif ($_SESSION['nivel'] <> $adm){
                    else {
                       
                         include_once '../Model/demanda.php';
                        $obj = new Demanda();
                        $obj->listarDemanda2();
                        
                        
                    }
                    ?>

                                    </table>

                                </div>
                            </div>       
                        </body>
                    </html>








<!--- - - - - - - - - - - - - - Fim Listar Demanda Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->

<!--- - - - - - - - - - - - - - Inicio cadastrar Demanda Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->

<!DOCTYPE html>
<html lang="pt-br">

    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">

        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
            <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
            <script src="js/jquery-1.11.3.min.js"></script>
            <script src="js/jquery.maskedinput.js"></script>

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
            include '../Model/session.php';

            $obj = new Session();
            $obj->validamenu();


            $usuario = $_SESSION['username'];

//        include_once '../Model/demanda.php';
//        
//        $obj = new Demanda();
//        $obj->validamenu();
//        
//        
//        
//        
//        
//        
//        
//        $usuario->usuariomenu();
//        session_start();
//                    $usuario = $_SESSION['nivel'];
//                       
//if ($_SESSION['nivel'] == $adm) {
//  // Destrói a sessão por segurança
// include 'menu.php';
//  // Redireciona o visitante de volta pro login
////  header("Location: index.php"); exit;
////    echo "VOCE É ADMINISTRADOR";
//    echo $_SESSION['nivel'] . " ";
////     session_destroy();
//    echo '<br><br>';
//}
////
////// <botom role="presentation"><a href="#" accesskey=""onclick="session_destroy();'">Sair</a></li>
//////elseif ($_SESSION['nivel'] <> $adm){
//else{
//    include 'menu2.php';
////    echo "Voce é usuario normal" . " - ";
////    echo $_SESSION['nivel'] . " ";
////       session_destroy();
//    echo '<br><br>';
//}
//        include_once 'menu.php';
//        session_start();
//        $responsavel_abertura = $_SESSION['resp_abertura'];
//        echo $resp_abertura;
            ?>

            <div class="container">

                <div class="row">
                    <div class="col-sm-9  col-md-12">
                        <h1 class="page-header">Nova Demanda</h1>
                    </div>
                    <!--<div class="btn btn-primary btn-block" href="#"></div>-->
                </div>       


                <!--<h2 class="text-left text-danger"> CADASTRAR DEMANDA </h2>-->
                <!--<hr>-->  
                <!--<div class="container">-->
                <form action="../control/executar_cadastro_demanda.php" method="post">

                    <div class="row">

                        <div class="col-md-3 col-md-offset-3">

                            <div class="form-group">
                                <label for="nome_cliente">Nome do Cliente</label>
                                <input type="text" class="form-control" name="nome_cliente" placeholder="Nome do Cliente">
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="numero_linha">Linha</label>
                                <input type="text" class="form-control" id="campoTelefone" name="numero_linha" placeholder="Numero da Linha">
                            </div>
                        </div>   

                    </div>


                    <!--<div class="row">-->
                    <!--                     <div class="form-group">
                                            <div class="col-md-3">
                                               
                                                    <label for="nome_cliente">Numero Conta</label>
                                                    <input type="text" class="form-control" name="numero_conta" placeholder="Conta">
                                                </div>    
                    
                                            </div>-->

                    <div class="row">

                        <div class="col-md-3 col-md-offset-3">
                            <div class="form-group">

                                <label for="demanda">Tipo de Demanda</label>
                                <select class="dropdown form-control" name="tipo_demanda">
                                    <option value="selecione">Selecione...</option>
                                    <option value="migrar para o pre">1 - Migração Pós para o Pré</option>
                                    <option value="migra para o controle">2 - Migração Pós para o Controle</option>
                                    <option value="desmembramento">3 - Desmembramento de Contas</option>
                                    <option value="Unir Contas">4 - Unir Contas</option>
                                    <option value="Alterar Carteira">5 - Alterar Carteira</option>
                                    <option value="Contestação">6 - Contestação</option>
                                    <option value="Desbloqueio por FRD">7 - Desbloqueio por FRD</option>
                                    <option value="Contestação">8 - Contestação</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="gerente">GERENTE RESPONSÁVEL  </label>
                                <select class="dropdown form-control" name="gerente">
                                    <option value="selecione">Selecione...</option>
                                    <option value="Ivanilson">1 - Ivanilson</option>
                                    <option value="Acrizio">2 - Acrizio</option>
                                    <option value="Najara">3 - Najara</option>
                                </select>

                            </div>

                        </div>
                    </div>


                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <label for="descricao">Descrição da Demanda</label>
                            <textarea class="form-control" name="obs_demanda" rows="6"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="status" value="Novo">

                    <input type="hidden" name="obs_demanda_gerente" value="">

                    <!--                     <div class="row">
                                            <div class="col-md-7">
                                                <label for="descricao">Resposta Gerente</label>
                                                <textarea class="form-control" name="obs_demanda_gerente" rows="6"></textarea>
                                            </div>
                                        </div>
                    -->

                    <!--</div>-->


                    <?php
//                       
//                        $data = date('Y-m-d');
//                        echo $data;
//                         setlocale(LC_ALL, 'portuguese');
//                        echo strftime('%Y-%m-%d');
//                         echo strftime('%Y-%m-%d %T');
//                         echo 'teste' 
//                         $dt = strftime('%d-%m-%Y');
//                         $hr = date('H:i:s e');
//                         
//                         $data = $dt . " " . $hr;
                    ?>

                    <br>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            Data de Abertura <input type="date" name="data_abertura" value="<?php echo date('d/m/Y'); ?>">
                        </div>
                    </div>
                    <input type="hidden" name="data_fechamento" value="">

                    <hr>
                    <div class="row">

                        <div class="col-md-6">
                            <input type="cancel" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'home.php'">
                            <input type="reset" class="btn btn-primary" value="LIMPAR">
                            <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                            <!--<button type="submit" class="btn btn-primary" value="CADASTRAR DEMANDA">Cadastrar</button>-->        
                        </div>
                    </div>


                </form>

                <!--                
                                                <div class="form-group">
                                                    <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                                                    <input type="file" id="ejemplo_archivo_1">
                                                    <p class="help-block">Ejemplo de texto de ayuda.</p>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Activa esta casilla
                                                    </label>
                                                </div>
                -->

            </div>


        </body>

    </html>



<!--- - - - - - - - - - - - - - Fim cadastrar Demanda Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->

<!--- - - - - - - - - - - - - - Inicio cadastrar Admin Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/layout.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        
         include_once '../Model/session.php';
        
        $obj = new Session();
        $obj->validamenu();
        
        
//        include_once 'menu.php';
        ?>
        <div class="container">
        <div class="container fundo">
            <div class="row">
                <div class="col-sm-12  col-md-12 main">
                    <h1 class="page-header">Cadastrar Usuário</h1>
                </div>
                <!--<div class="btn btn-primary btn-block" href="#"></div>-->
            </div>       

            <!--<form action="../control/executar_cadastro_demanda.php" method="post">-->
            <form action="../control/executar_cadastro.php" method="post">       

                <!--<div class="row">-->

                <div class="form-group">
                    <div class="col-md-3">
                        <label for="Nome do Gerente">Nome</label>
                        <input type="text" class="form-control" name="nome_usuario" placeholder="Nome">
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label for="Sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome_usuario" placeholder="Sobrenome">
                    </div>

                </div>

                 <div class="form-group">
                    <div class="col-md-3">
                        <label for="matricula">Matrícula</label>
                        <input type="text" class="form-control" name="matricula" placeholder="Informe a Matrícula com o A00...">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nivel">Nivel</label>

                        <select class="dropdown form-control" name="nivel">
                            <option>Selecione...</option>
                            <option value="1">1 - Administrador</option>
                            <option value="2">2 - Usuário</option>

                        </select>

                    </div>    

                </div>
                
               


                <div class="col-md-3">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label for="senha_usuario">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>    

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cargo">cargo</label>
                        <!--<input type="text" class="form-control" name="cargo" placeholder="Cargo">-->

                        <select class="dropdown form-control" name="cargo">
                            <option value="selecione">Selecione...</option>
                            <option value="Gerente_Geral">1 - Gerente Geral</option>
                            <option value="Gerente_Negocios">2 - Gerente de Negócios</option>
                            <option value="Consultor Tecnológico">3 - Guru Tecnológico</option>
                            <option value="Consultor de Relacionamento">4 - Consultor de Relacionamento</option>
                            <option value="Consultor de Negócios">5 - Consultor de Negócios</option>
                            <option value="Analista">6 - Analista</option>
                            <option value="outro">7 - Outro</option>

                        </select>

                    </div>    

                </div>

                <!--</div>-->

                <input type="hidden" name="status_usuario" value="Ativo">
                <input type="hidden" name="data_cadastro">

                <hr>  

                <div class="row">
                    <div class="col-lg-12">
                <!--<input type="reset" class="btn btn-primary" value="LIMPAR">-->
                        <input type="cancel" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'home.php'">    
                        <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                    </div>            
                </div>              
            </form>

        </div>
            </div>
    </body>
</html>


 <!--- - - - - - - - - - - - - - Fim cadastrar Admin Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->
 <!--- - - - - - - - - - - - - - Inicio Editar Demanda Backup - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Demanda</title>
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        
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

        <!--<h2 align="center"> ALTERAR DEMANDA </h2>-->
        <br>
        <form action="../control/executar_edicao_demanda.php" method="post">
            <?php
//            include_once 'menu.php';
//             include_once '../Model/demanda.php';
//        $objj = new Demanda();
//        $objj->validamenu();
//        


            include_once '../Model/demanda.php';
            include_once '../Model/session.php';
            $objj = new Session();
            $obj = new Demanda();
            
            $objj->validamenu();
            $dados = array();
            $dados = $obj->dadosAdmin($_REQUEST["id"]);
            ?>


            <div class="container">

                <div class="row">
                   
                    
                
                 <div class="panel-body">Panel Content</div>
                    
                                      
                    <!--<div class="col-sm-9  col-md-10 main">-->
                        
                        <div class="panel panel-primary">
                           
                            <div class="panel-heading">Editar Demanda</div>
                            
                        <!--<h1 class="page-header">Editar Demanda</h1>-->
                    </div>
                     
                    </div>
                
                
                
                
                <div class="breadcrumb">
                <h4>Funcionário Responsável pela abertura da Demanda: <?php echo $dados[5]?> </h4>
                </div>
                <!--<h2 class="text-left text-danger"> CADASTRAR DEMANDA </h2>-->
                <!--<hr>-->  
                <div class="container">
                    <form action="../control/executar_cadastro_demanda.php" method="post">

                        <input type="hidden" name="id_demanda" value="<?php echo $dados[0] ?>">

                        <div class="row">
                            
                            <div class="col-md-2">
                            <div class="form-group">
                                
                                    <label for="numero_linha">Linha</label>
                                    <input type="text" class="form-control" id=campoTelefone name="numero_linha" value="<?php echo $dados[2] ?>">
                                </div>
                            </div>

                             <div class="col-md-3">
                            <div class="form-group">
                               
                                    <label for="nome_cliente">Nome do Cliente</label>
                                    <input type="text" class="form-control" name="nome_cliente" value="<?php echo $dados[1] ?>">
                                </div>

                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome_cliente">Tipo de Demanda</label>
                                    <input type="text" class="form-control" name="tipo_demanda" value="<?php echo $dados[3] ?>">
                                </div>    


                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gerente">Gerente ou Responsável</label>
                                    <input type="text" class="form-control" name="gerente" value="<?php echo $dados[6] ?>">
                                </div>    


                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <label for="descricao">Descrição da Demanda</label>
                                <textarea class="form-control" name="obs_demanda" rows="6"><?php echo $dados[4] ?></textarea>
                            </div>
                        </div>

                        <br>
                        Alterar Status <select name="status">
                            <option value="Em progresso">Em progresso..</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Concluído">Concluído</option>
                        </select>

                        <br><br>
                        
                        <?php 
                        
                        if ($dados[9] == ""){
                             $usuario = $_SESSION['username'];
                             
                            if($usuario == $dados[6]){
                               
                            ?>
                                
                              <div class="row">
                            <div class="col-md-7">
                                <label for="descricao">Resposta Gerente</label>
                                <textarea class="form-control" name="obs_demanda_gerente" rows="6"><?php echo $dados[9] ?></textarea>

                            </div>
                        </div>   
                                
                           <?php } 
                            
                        } 
                        
                        //<?php
                        
                        Else{
                        
                        ?>
                        
                        <div class="row">
                            <div class="col-md-7">
                                <label for="descricao">Resposta Gerente</label>
                                <textarea class="form-control" name="obs_demanda_gerente" rows="6" disabled><?php echo $dados[9] ?></textarea>
                                   
                            </div>
                        </div>

                        <?php } ?>
                        
                        
                        
                        
                        <hr>  
                        <input type="cancel" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'listar_demanda.php'">
                        <input type="submit" class=" btn btn-primary" value="EDITAR DEMANDA">
                        <!--<button type="submit" class="btn btn-primary" value="CADASTRAR DEMANDA">Cadastrar</button>-->

                    </form>

                </div>

            </div>
            

    </body>
</html>

















   <!--- - - - - - - - - - -- - - - - - fim backup editar demanda-->
<!DOCTYPE html>
<html lang="pt-br">

    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">

        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
            <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
            <script src="js/jquery-1.11.3.min.js"></script>
            <script src="js/jquery.maskedinput.js"></script>

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
            include '../Model/session.php';

            $obj = new Session();
            $obj->validamenu();


            $usuario = $_SESSION['username'];

//        include_once '../Model/demanda.php';
//        
//        $obj = new Demanda();
//        $obj->validamenu();
//        
//        
//        
//        
//        
//        
//        
//        $usuario->usuariomenu();
//        session_start();
//                    $usuario = $_SESSION['nivel'];
//                       
//if ($_SESSION['nivel'] == $adm) {
//  // Destrói a sessão por segurança
// include 'menu.php';
//  // Redireciona o visitante de volta pro login
////  header("Location: index.php"); exit;
////    echo "VOCE É ADMINISTRADOR";
//    echo $_SESSION['nivel'] . " ";
////     session_destroy();
//    echo '<br><br>';
//}
////
////// <botom role="presentation"><a href="#" accesskey=""onclick="session_destroy();'">Sair</a></li>
//////elseif ($_SESSION['nivel'] <> $adm){
//else{
//    include 'menu2.php';
////    echo "Voce é usuario normal" . " - ";
////    echo $_SESSION['nivel'] . " ";
////       session_destroy();
//    echo '<br><br>';
//}
//        include_once 'menu.php';
//        session_start();
//        $responsavel_abertura = $_SESSION['resp_abertura'];
//        echo $resp_abertura;
            ?>

            <div class="container">

                <div class="row">
                    <div class="col-sm-9  col-md-10 main">
                        <h1 class="page-header">Nova Demanda</h1>
                    </div>
                    <!--<div class="btn btn-primary btn-block" href="#"></div>-->
                </div>       


                <!--<h2 class="text-left text-danger"> CADASTRAR DEMANDA </h2>-->
                <!--<hr>-->  
                <!--<div class="container">-->
                <form action="../control/executar_cadastro_demanda.php" method="post">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="nome_cliente">Nome do Cliente</label>
                                <input type="text" class="form-control" name="nome_cliente" placeholder="Nome do Cliente">
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="numero_linha">Linha</label>
                                <input type="text" class="form-control" id="campoTelefone" name="numero_linha" placeholder="Numero da Linha">
                            </div>
                        </div>

                        <!--<div class="row">-->
                        <!--                     <div class="form-group">
                                                <div class="col-md-3">
                                                   
                                                        <label for="nome_cliente">Numero Conta</label>
                                                        <input type="text" class="form-control" name="numero_conta" placeholder="Conta">
                                                    </div>    
                        
                                                </div>-->

                         <div class="col-md-3">
                        <div class="form-group">
                           
                                <label for="demanda">Tipo de Demanda</label>
                                <select class="dropdown form-control" name="tipo_demanda">
                                    <option value="selecione">Selecione...</option>
                                    <option value="migrar para o pre">1 - Migração Pós para o Pré</option>
                                    <option value="migra para o controle">2 - Migração Pós para o Controle</option>
                                    <option value="desmembramento">3 - Desmembramento de Contas</option>
                                    <option value="Unir Contas">4 - Unir Contas</option>
                                    <option value="Alterar Carteira">5 - Alterar Carteira</option>
                                    <option value="Contestação">6 - Contestação</option>
                                    <option value="Desbloqueio por FRD">7 - Desbloqueio por FRD</option>
                                    <option value="Contestação">8 - Contestação</option>
                                </select>

                            </div>

                        </div>

                        
                        <div class="col-md-3">
                        <div class="form-group">
                            
                                <label for="gerente">GERENTE RESPONSÁVEL  </label>
                                <select class="dropdown form-control" name="gerente">
                                    <option value="selecione">Selecione...</option>
                                    <option value="Ivanilson">1 - Ivanilson</option>
                                    <option value="Acrizio">2 - Acrizio</option>
                                    <option value="Najara">3 - Najara</option>
                                </select>

                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">

                    <div class="row">
                        <div class="col-md-7">
                            <label for="descricao">Descrição da Demanda</label>
                            <textarea class="form-control" name="obs_demanda" rows="6"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="status" value="Novo">
                    
                    <input type="hidden" name="obs_demanda_gerente" value="">
                    
<!--                     <div class="row">
                        <div class="col-md-7">
                            <label for="descricao">Resposta Gerente</label>
                            <textarea class="form-control" name="obs_demanda_gerente" rows="6"></textarea>
                        </div>
                    </div>
                    -->

                    <!--</div>-->


                    <?php
//                       
//                        $data = date('Y-m-d');
//                        echo $data;
//                         setlocale(LC_ALL, 'portuguese');
//                        echo strftime('%Y-%m-%d');
//                         echo strftime('%Y-%m-%d %T');
//                         echo 'teste' 
//                         $dt = strftime('%d-%m-%Y');
//                         $hr = date('H:i:s e');
//                         
//                         $data = $dt . " " . $hr;
                    ?>

                    <br>
                    Data de Abertura <input type="date" name="data_abertura" value="<?php echo date('d/m/Y'); ?>">

                    <input type="hidden" name="data_fechamento" value="">

                    <hr>
                    <div class="row">
                        
                        <div class="col-md-6">
                    <input type="cancel" class="btn btn-primary" value="CANCELAR" accesskey=""onclick="window.location = 'home.php'"><br><br>
                    <input type="reset" class="btn btn-primary" value="LIMPAR">
                    <input type="submit" class=" btn btn-primary" value="CADASTRAR">
                    <!--<button type="submit" class="btn btn-primary" value="CADASTRAR DEMANDA">Cadastrar</button>-->        
                    </div>
                        </div>


                </form>



<!--                
                                <div class="form-group">
                                    <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                                    <input type="file" id="ejemplo_archivo_1">
                                    <p class="help-block">Ejemplo de texto de ayuda.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Activa esta casilla
                                    </label>
                                </div>
                -->

            </div>


        </body>



    </html>
