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
         
            $dados = array();
            $dados = $obj->dadosUsuario2($_REQUEST["email"]);
        
        $obj = new Admin();
        
        
        echo $dados[0] . "<br>";
        echo $dados[1] . "<br>";
        echo $dados[2] . "<br>";
        echo $dados[3] . "<br>";
        echo $dados[4] . "<br>";
        echo $dados[5] . "<br>";
        echo $dados[6] . "<br>";
        echo $dados[7] . "<br>";
        echo $dados[8] . "<br>";
        echo $dados[9] . "<br>";
        echo $dados[10] . "<br>";
        echo $dados[11] . "<br>";
        
        
        $senha = md5('123');
                
        
       $obj->setIdusuario($dados[0]);
        
        $obj->setMatricula($dados[1]);
        $obj->setNomeusuario($dados[2]);
        $obj->setSobrenomeusuario($dados[3]);
        $obj->setIdcargo($dados[4]);
        $obj->setNivel($dados[5]);
        $obj->setEmail($dados[6]);
        $obj->setSenha($senha);
        $obj->setDatacadastro($dados[8]);
        $obj->setStatususuario($dados[9]);
        $obj->setIdloja($dados[10]);
        $obj->setIdcargo($dados[11]);
// }
 
//        $status_usuario = $_REQUEST["status_usuario"];
        
       

            $resultado = $obj->alterarUsuario($dados[0], $dados[1]);

            if ($resultado == 1) {
                ?>
                <script>edicaoUsuario();</script>

                <?php
            } else {
                //Lista os erros

                print_r($resultado);
//                echo "<script>alert ('Erro ao Editar usuario') </script>";
                 ?>
                <script>verificaMatricula();</script>

                <?php
                
                
            }
        }

        ?>
    </body>
</html>
