<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Valida Login Paginas</title>
        <!--<link href="../view/css/layout.css" rel="stylesheet" type="text/css">-->
         <script src="../view/css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../view/css/dist/sweetalert.css">
        <script src="../view/js/scripts.js"></script>     
        
    </head>
    <body>
       
        <div class="container">
            
            <?php
            
            if (isset ($_SESSION["nome_usuario"])) {

            }else{
           
                
            ?>  
                <script> validalogin();</script>;    
            <?php }
            
        
//            <!--echo "<script> alert ('Voce nao esta logado!') </script>";-->
//            <!--echo "<script> location.href = ('../index.php') </script>";-->

            ?>

        </div>
        
        <script src="../view/js/jquery-1.11.3.min.js"></script>
        <script src="../view/js/bootstrap.min.js"></script>     
            
    </body>
</html>
